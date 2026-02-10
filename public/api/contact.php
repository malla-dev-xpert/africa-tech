<?php
/**
 * Contact Form Handler
 * Handles form submissions from the contact form
 * Rate limit: 3 submissions per 15 minutes per IP
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// --- Rate limiting (3 requêtes / 15 min / IP) ---
$rateLimitWindow = 900;   // 15 minutes en secondes
$rateLimitMax = 3;
$clientIp = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]) : ($_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
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
// Garder seulement les timestamps dans la fenêtre
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

// Get JSON input
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);

// Ensure input is an array (invalid or empty JSON)
if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Données invalides.', 'errors' => ['Le format de la requête est invalide.']]);
    exit;
}

// Validate required fields
$required = ['name', 'email', 'subject', 'message'];
$errors = [];

foreach ($required as $field) {
    if (empty($input[$field])) {
        $errors[] = "Le champ $field est requis";
    }
}

// Validate email format
if (!empty($input['email']) && !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'adresse email n'est pas valide";
}

// If there are errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors), 'errors' => $errors]);
    exit;
}

// Sanitize input
$name = htmlspecialchars(trim($input['name']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($input['email']), FILTER_SANITIZE_EMAIL);
$phone = !empty($input['phone']) ? htmlspecialchars(trim($input['phone']), ENT_QUOTES, 'UTF-8') : '';
$subject = htmlspecialchars(trim($input['subject']), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($input['message']), ENT_QUOTES, 'UTF-8');

// Email configuration
$to = 'ouroayat@gmail.com'; // Replace with your actual email
$emailSubject = 'Nouveau message de contact - ' . $subject;
$emailBody = "
Nouveau message reçu depuis le formulaire de contact du site AFRICIA TECH

Nom: $name
Email: $email
Téléphone: " . ($phone ?: 'Non renseigné') . "
Sujet: $subject

Message:
$message

---
Ce message a été envoyé depuis le formulaire de contact du site web.
";

// From = adresse fixe (meilleure délivrabilité) ; Reply-To = visiteur pour répondre
$fromEmail = 'ouroayat@gmail.com';
$headers = [
    'From: AFRICIA TECH <' . $fromEmail . '>',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8'
];

$mailSent = @mail($to, $emailSubject, $emailBody, implode("\r\n", $headers));

if ($mailSent) {
    // Log the submission (optional)
    $logDir = __DIR__ . '/../logs';
    if (is_dir($logDir) && is_writable($logDir)) {
        $logFile = $logDir . '/contact.log';
        $logEntry = date('Y-m-d H:i:s') . " - Contact form submission from: $name ($email) - Subject: $subject\n";
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
?>
