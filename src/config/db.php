<?php
/**
 * Connexion PDO MySQL pour AFRICIA TECH
 * Charge les variables depuis .env à la racine du projet.
 */
$envPath = dirname(__DIR__, 2) . '/.env';
if (is_file($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (preg_match('/^([A-Za-z_][A-Za-z0-9_]*)=(.*)$/', $line, $m)) {
            $key = $m[1];
            $val = trim($m[2], " \t\"'");
            if (!array_key_exists($key, $_ENV)) $_ENV[$key] = $val;
            if (getenv($key) === false) putenv("$key=$val");
        }
    }
}

$dbHost     = getenv('DB_HOST') ?: $_ENV['DB_HOST'] ?? '127.0.0.1';
$dbName     = getenv('DB_NAME') ?: $_ENV['DB_NAME'] ?? 'africa_tech';
$dbUser     = getenv('DB_USER') ?: $_ENV['DB_USER'] ?? 'root';
$dbPassword = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : ($_ENV['DB_PASSWORD'] ?? '');
$dbCharset  = getenv('DB_CHARSET') ?: $_ENV['DB_CHARSET'] ?? 'utf8mb4';

$dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$dbCharset}";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword, $options);
} catch (PDOException $e) {
    $msg = 'Connexion BDD impossible. ';
    $msg .= $e->getMessage();
    $msg .= ' (vérifiez .env et que MySQL est démarré, base "' . $dbName . '" créée)';
    throw new PDOException($msg, (int) $e->getCode());
}
