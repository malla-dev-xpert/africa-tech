<?php
/**
 * Contact Form Handler
 * Handles form submissions from the contact form
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

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

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
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Sanitize input
$name = htmlspecialchars(trim($input['name']), ENT_QUOTES, 'UTF-8');
$email = filter_var(trim($input['email']), FILTER_SANITIZE_EMAIL);
$phone = !empty($input['phone']) ? htmlspecialchars(trim($input['phone']), ENT_QUOTES, 'UTF-8') : '';
$subject = htmlspecialchars(trim($input['subject']), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars(trim($input['message']), ENT_QUOTES, 'UTF-8');

// Email configuration
$to = 'contact@africa-tech.com'; // Replace with your actual email
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

$headers = [
    'From: ' . $email,
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8'
];

// Send email
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
