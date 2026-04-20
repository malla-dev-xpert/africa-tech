<?php
declare(strict_types=1);

/**
 * Routeur local pour le serveur PHP integre.
 * Usage: php -S localhost:8000 -t public public/router.php
 */

$uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($uri, PHP_URL_PATH) ?: '/';
$path = rawurldecode($path);
$publicDir = __DIR__;

// Laisser le serveur gerer les vrais fichiers statiques.
$directFile = realpath($publicDir . $path);
if ($directFile !== false && str_starts_with($directFile, $publicDir) && is_file($directFile)) {
    return false;
}

// Interdire l'acces aux logs.
if (preg_match('#^/logs(?:/|$)#', $path) === 1) {
    http_response_code(403);
    echo '403 Forbidden';
    exit;
}

// URL canonique sans extension: /about.php -> /about
if (preg_match('#^/(.+)\.php$#i', $path, $matches) === 1) {
    $script = $publicDir . '/' . $matches[1] . '.php';
    if (is_file($script) && !in_array(strtolower($matches[1]), ['index', 'admin', 'admin-gallery', 'sitemap'], true)) {
        $target = '/' . $matches[1];
        if (!empty($_SERVER['QUERY_STRING'])) {
            $target .= '?' . $_SERVER['QUERY_STRING'];
        }
        header('Location: ' . $target, true, 301);
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
echo '404 Not Found';
