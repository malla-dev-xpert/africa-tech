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
    ['path' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['path' => '/about.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['path' => '/services.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['path' => '/products.php', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['path' => '/formations.php', 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['path' => '/contact.php', 'priority' => '0.8', 'changefreq' => 'monthly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
<?php foreach ($urls as $u):
    $path = $u['path'];
    $locFr = $path === '/' ? $base . '/' : $base . $path . '?lang=fr';
    $locEn = $path === '/' ? $base . '/?lang=en' : $base . $path . '?lang=en';
    $locDefault = $path === '/' ? $base . '/' : $base . $path;
?>
    <url>
        <loc><?= htmlspecialchars($locDefault) ?></loc>
        <lastmod><?= $today ?></lastmod>
        <changefreq><?= $u['changefreq'] ?></changefreq>
        <priority><?= $u['priority'] ?></priority>
        <xhtml:link rel="alternate" hreflang="fr" href="<?= htmlspecialchars($locFr) ?>" />
        <xhtml:link rel="alternate" hreflang="en" href="<?= htmlspecialchars($locEn) ?>" />
        <xhtml:link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($locFr) ?>" />
    </url>
<?php endforeach; ?>
</urlset>
