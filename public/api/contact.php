<?php

/**
 * Contact Form Handler
 * Envoi d'emails via mail() natif PHP - sans dépendances externes.
 * Rate limit: 3 soumissions / 15 minutes / IP
 * Protection contre header injection.
 */

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Seulement POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// --- Rate limiting (3 requêtes / 15 min / IP) ---
$rateLimitWindow = 900;
$rateLimitMax = 3;
$clientIp = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    ? trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0])
    : ($_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
$rateLimitFile = __DIR__ . '/../logs/contact_rate_limit.json';

$now = time();
$data = [];
if (file_exists($rateLimitFile)) {
    $raw = @file_get_contents($rateLimitFile);
    if ($raw !== false) {
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
            $data = $decoded;
        }
    }
}

if (!isset($data[$clientIp])) {
    $data[$clientIp] = [];
}
$data[$clientIp] = array_values(array_filter($data[$clientIp], function ($ts) use ($now, $rateLimitWindow) {
    return ($now - $ts) < $rateLimitWindow;
}));

if (count($data[$clientIp]) >= $rateLimitMax) {
    http_response_code(429);
    header('Retry-After: ' . $rateLimitWindow);
    echo json_encode([
        'success' => false,
        'message' => 'Trop de demandes. Veuillez réessayer dans 15 minutes ou nous contacter par téléphone / WhatsApp.'
    ]);
    exit;
}

$data[$clientIp][] = $now;
$logDir = dirname($rateLimitFile);
if (is_dir($logDir) && is_writable($logDir)) {
    $fp = @fopen($rateLimitFile, 'c+');
    if ($fp && flock($fp, LOCK_EX)) {
        ftruncate($fp, 0);
        fwrite($fp, json_encode($data));
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}
// --- Fin rate limiting ---

// Récupération et parsing JSON
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);

if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Données invalides.', 'errors' => ['Le format de la requête est invalide.']]);
    exit;
}

// Validation des champs obligatoires
$required = ['name', 'email', 'subject', 'message'];
$errors = [];

foreach ($required as $field) {
    if (!isset($input[$field]) || trim((string) $input[$field]) === '') {
        $errors[] = "Le champ $field est requis";
    }
}

// Validation email
$emailRaw = isset($input['email']) ? trim((string) $input['email']) : '';
if (!empty($emailRaw) && !filter_var($emailRaw, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'adresse email n'est pas valide";
}

// Validation longueurs
$nameTrimmed = isset($input['name']) ? trim((string) $input['name']) : '';
if (!empty($nameTrimmed) && mb_strlen($nameTrimmed) < 2) {
    $errors[] = "Le nom doit contenir au moins 2 caractères";
}

$messageTrimmed = isset($input['message']) ? trim((string) $input['message']) : '';
if (!empty($messageTrimmed) && mb_strlen($messageTrimmed) < 10) {
    $errors[] = "Le message doit contenir au moins 10 caractères";
}

// Sujets autorisés (whitelist)
$subjectLabels = [
    'devis' => 'Demande de devis',
    'installation' => 'Installation solaire',
    'maintenance' => 'Maintenance',
    'formation' => 'Formation',
    'produit' => 'Information sur un produit',
    'autre' => 'Autre'
];
$subjectCode = isset($input['subject']) ? trim((string) $input['subject']) : '';
if (!empty($subjectCode) && !isset($subjectLabels[$subjectCode])) {
    $errors[] = "Sujet invalide";
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors), 'errors' => $errors]);
    exit;
}

// Nettoyage sécurisé des entrées
$name = htmlspecialchars($nameTrimmed, ENT_QUOTES, 'UTF-8');
$email = filter_var($emailRaw, FILTER_SANITIZE_EMAIL);
$phone = !empty($input['phone']) ? htmlspecialchars(trim((string) $input['phone']), ENT_QUOTES, 'UTF-8') : '';
$subjectLabel = $subjectLabels[$subjectCode];
$message = htmlspecialchars($messageTrimmed, ENT_QUOTES, 'UTF-8');

// Protection contre header injection : retirer \r, \n et caractères de contrôle
$safeEmail = preg_replace('/[\x00-\x1F\x7F\r\n]/', '', $email);
$safeName = preg_replace('/[\x00-\x1F\x7F\r\n]/', '', $name);
$safeSubject = preg_replace('/[\x00-\x1F\x7F\r\n]/', '', $subjectLabel);

$to = 'africatech@gmail.com';
$emailSubject = 'Nouveau message de contact - ' . $safeSubject;

// Template HTML email professionnel (structure table pour compatibilité clients mail)
$emailBody = getEmailTemplate($safeName, $safeEmail, $phone, $safeSubject, $message);

// Adresses fixes pour From (délivrabilité)
$fromEmail = 'africatech@gmail.com';
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: AFRICIA TECH <' . $fromEmail . '>',
    'Reply-To: ' . $safeEmail,
    'X-Mailer: PHP/' . phpversion()
];

$mailSent = @mail($to, $emailSubject, $emailBody, implode("\r\n", $headers));

if ($mailSent) {
    $logDir = __DIR__ . '/../logs';
    if (is_dir($logDir) && is_writable($logDir)) {
        $logFile = $logDir . '/contact.log';
        $logEntry = date('Y-m-d H:i:s') . " - Contact from: $name ($email) - Subject: $subjectLabel\n";
        @file_put_contents($logFile, $logEntry, FILE_APPEND);
    }

    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Votre message a été envoyé avec succès. Nous vous répondrons bientôt.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Une erreur s\'est produite lors de l\'envoi. Veuillez réessayer ou nous contacter directement.'
    ]);
}

/**
 * Génère le template HTML de l'email (compatibilité clients mail).
 */
function getEmailTemplate($name, $email, $phone, $subject, $message)
{
    $phoneDisplay = $phone ?: 'Non renseigné';
    $messageEscaped = nl2br($message);

    return '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f3f4f6;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f3f4f6;">
        <tr>
            <td style="padding: 40px 20px;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #001c37 0%, #003366 100%); padding: 32px 40px; text-align: center;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td style="text-align: center;">
                                        <span style="display: inline-block; width: 40px; height: 2px; background-color: #facc15; margin-bottom: 8px;"></span>
                                        <span style="display: block; font-size: 11px; font-weight: bold; letter-spacing: 0.2em; color: #facc15; text-transform: uppercase;">Contact</span>
                                        <h1 style="margin: 8px 0 0; font-size: 24px; font-weight: bold; color: #ffffff;">AFRICIA <span style="color: #facc15;">TECH</span></h1>
                                        <p style="margin: 12px 0 0; font-size: 14px; color: #94a3b8;">Nouveau message depuis le formulaire de contact</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Contenu -->
                    <tr>
                        <td style="padding: 40px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td>
                                        <p style="margin: 0 0 24px; font-size: 15px; color: #334155;">Bonjour, vous avez reçu un nouveau message de contact.</p>
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f8fafc; border-radius: 8px; margin-bottom: 24px;">
                                            <tr>
                                                <td style="padding: 20px; border-left: 4px solid #facc15;">
                                                    <p style="margin: 0 0 8px; font-size: 13px; color: #64748b;"><strong style="color: #001c37;">Nom :</strong> ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</p>
                                                    <p style="margin: 0 0 8px; font-size: 13px; color: #64748b;"><strong style="color: #001c37;">Email :</strong> <a href="mailto:' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '" style="color: #001c37;">' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</a></p>
                                                    <p style="margin: 0 0 8px; font-size: 13px; color: #64748b;"><strong style="color: #001c37;">Téléphone :</strong> ' . htmlspecialchars($phoneDisplay, ENT_QUOTES, 'UTF-8') . '</p>
                                                    <p style="margin: 0; font-size: 13px; color: #64748b;"><strong style="color: #001c37;">Sujet :</strong> ' . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . '</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0 0 8px; font-size: 14px; font-weight: bold; color: #001c37;">Message :</p>
                                        <div style="padding: 20px; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; color: #475569; line-height: 1.6;">' . $messageEscaped . '</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #001c37; padding: 24px 40px; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #94a3b8;">Ce message a été envoyé depuis le formulaire de contact du site AFRICIA TECH.</p>
                            <p style="margin: 8px 0 0; font-size: 12px; color: #64748b;">© ' . date('Y') . ' AFRICIA TECH - Solutions solaires & énergies renouvelables</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
}
