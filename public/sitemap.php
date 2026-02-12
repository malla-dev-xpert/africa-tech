<?php
/**
 * Sitemap XML généré dynamiquement (domaine et base path corrects).
 * En production, configurer une réécriture : sitemap.xml -> sitemap.php
 * ou laisser les moteurs utiliser directement sitemap.php.
 */
header('Content-Type: application/xml; charset=utf-8');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '/');
$basePath = ($scriptDir === '/' || $scriptDir === '' || $scriptDir === '.') ? '' : rtrim($scriptDir, '/');
$base = $protocol . '://' . $host . $basePath;

$today = date('Y-m-d');

$urls = [
    ['loc' => $base . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['loc' => $base . '/about.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => $base . '/services.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => $base . '/products.php', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => $base . '/formations.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['loc' => $base . '/contact.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($urls as $u): ?>
    <url>
        <loc><?= htmlspecialchars($u['loc']) ?></loc>
        <lastmod><?= $today ?></lastmod>
        <changefreq><?= $u['changefreq'] ?></changefreq>
        <priority><?= $u['priority'] ?></priority>
    </url>
<?php endforeach; ?>
</urlset>
