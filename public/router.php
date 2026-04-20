<?php
declare(strict_types=1);

/**
 * Routeur local pour le serveur PHP intégré.
 * Reproduit le comportement .htaccess :
 * - /page.php  -> redirection vers /page
 * - /page      -> sert page.php si le fichier existe
 */

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH) ?: '/';
$path = rawurldecode($path);
$publicDir = __DIR__;

// Laisser le serveur intégré gérer les fichiers statiques existants.
$directFile = realpath($publicDir . $path);
if ($directFile !== false && str_starts_with($directFile, $publicDir) && is_file($directFile)) {
    return false;
}

// Bloquer l'accès au dossier logs.
if (preg_match('#^/logs(?:/|$)#', $path) === 1) {
    http_response_code(403);
    echo '403 Forbidden';
    exit;
}

// URL canonique sans extension: /about.php -> /about
if (preg_match('#^/(.+)\.php$#i', $path, $matches) === 1) {
    $targetScript = $publicDir . '/' . $matches[1] . '.php';
    if (is_file($targetScript)) {
        $targetPath = '/' . $matches[1];
        if ($matches[1] === 'index') {
            $targetPath = '/';
        }
        if (!empty($_SERVER['QUERY_STRING'])) {
            $targetPath .= '?' . $_SERVER['QUERY_STRING'];
        }
        header('Location: ' . $targetPath, true, 301);
        exit;
    }
}

// / -> index.php
if ($path === '/' || $path === '') {
    require $publicDir . '/index.php';
    exit;
}

// URL propre vers script PHP: /about -> /about.php
$candidate = $publicDir . $path . '.php';
if (is_file($candidate)) {
    require $candidate;
    exit;
}

http_response_code(404);
require $publicDir . '/index.php';
