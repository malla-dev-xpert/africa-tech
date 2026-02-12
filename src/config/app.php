<?php
/**
 * Configuration applicative – base URL, chemins et langue.
 * Charge la langue (GET ?lang=, session), définit t() et $currentLang.
 */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '/');
$basePath = ($scriptDir === '/' || $scriptDir === '' || $scriptDir === '.') ? '' : rtrim($scriptDir, '/');
$baseUrl = $protocol . '://' . $host . $basePath;
$assetsPath = $basePath . '/assets';
$imagesPath = $assetsPath . '/images';

// --- Langue : GET prioritaire, puis session, défaut "fr" ---
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$allowedLangs = ['fr', 'en'];
$langFromGet = isset($_GET['lang']) ? strtolower(trim($_GET['lang'])) : null;
if ($langFromGet !== null && in_array($langFromGet, $allowedLangs, true)) {
    $_SESSION['lang'] = $langFromGet;
}
$currentLang = isset($_SESSION['lang']) && in_array($_SESSION['lang'], $allowedLangs, true)
    ? $_SESSION['lang']
    : 'fr';

$langFile = __DIR__ . '/../lang/' . $currentLang . '.php';
if (!is_file($langFile) || !in_array($currentLang, $allowedLangs, true)) {
    $currentLang = 'fr';
    $langFile = __DIR__ . '/../lang/fr.php';
}
$GLOBALS['_translations'] = require $langFile;

if (!function_exists('t')) {
    /**
     * Retourne la traduction pour la clé donnée, ou la clé si absente.
     * @param string $key Clé de traduction (ex: nav.home)
     * @return string
     */
    function t($key) {
        $tr = $GLOBALS['_translations'] ?? [];
        return isset($tr[$key]) ? $tr[$key] : $key;
    }
}
