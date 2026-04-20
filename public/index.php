<?php
declare(strict_types=1);

// Fallback route dispatcher for PHP built-in server when no router script is used.
$requestPath = $_SERVER['PATH_INFO'] ?? '';
if ($requestPath === '') {
    $requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
}
$requestPath = rawurldecode($requestPath);
if (str_starts_with($requestPath, '/index.php')) {
    $requestPath = substr($requestPath, strlen('/index.php'));
}
$requestPath = rtrim($requestPath, '/');
if ($requestPath === '') {
    $requestPath = '/';
}

$routeMap = [
    '/' => __DIR__ . '/../src/pages/index.php',
    '/about' => __DIR__ . '/../src/pages/about.php',
    '/services' => __DIR__ . '/../src/pages/services.php',
    '/products' => __DIR__ . '/../src/pages/products.php',
    '/formations' => __DIR__ . '/../src/pages/formations.php',
    '/contact' => __DIR__ . '/../src/pages/contact.php',
    '/admin' => __DIR__ . '/admin.php',
    '/admin-gallery' => __DIR__ . '/admin-gallery.php',
    '/sitemap' => __DIR__ . '/sitemap.php',
];

if (isset($routeMap[$requestPath])) {
    require $routeMap[$requestPath];
    exit;
}

require __DIR__ . '/../src/pages/index.php';
?>
