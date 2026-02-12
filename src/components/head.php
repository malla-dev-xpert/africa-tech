<?php
if (!isset($baseUrl)) {
    require_once __DIR__ . '/../config/app.php';
}
$pageTitle = isset($pageTitle) ? htmlspecialchars($pageTitle) : 'AFRICIA TECH';
$pageDescription = isset($pageDescription) ? htmlspecialchars($pageDescription) : 'AFRICIA TECH - Solutions solaires, électricité, domotique et formations en énergies renouvelables au Mali.';
$ogTitle = isset($ogTitle) ? htmlspecialchars($ogTitle) : $pageTitle;
$ogDescription = isset($ogDescription) ? htmlspecialchars($ogDescription) : $pageDescription;
$ogImage = isset($ogImage) ? $ogImage : ($baseUrl . '/assets/images/logo.png');
$ogUrl = isset($ogUrl) ? $ogUrl : ($baseUrl . ($_SERVER['REQUEST_URI'] ?? '/'));
$reqUri = $_SERVER['REQUEST_URI'] ?? '';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
if ($scriptName === '/index.php' || $scriptName === 'index.php' || rtrim($reqUri, '/') === '' || $reqUri === '/') {
    $canonicalUrl = isset($canonicalUrl) ? $canonicalUrl : ($baseUrl . '/');
} else {
    $canonicalUrl = isset($canonicalUrl) ? $canonicalUrl : $ogUrl;
}
$metaRobots = isset($metaRobots) ? $metaRobots : 'index, follow';
$faviconUrl = $baseUrl . '/assets/images/faveicon.png';
?>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php if (!empty($currentPage) && $currentPage === 'accueil'): ?>
<link rel="preload" href="<?= ($basePath ? $basePath . '/' : '/') ?>assets/images/hero.jpeg" as="image" />
<?php endif; ?>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin />
<meta name="description" content="<?= $pageDescription ?>" />
<meta name="robots" content="<?= htmlspecialchars($metaRobots) ?>" />
<title><?= $pageTitle ?></title>

<!-- Favicon (bonnes pratiques modernes) -->
<link rel="icon" type="image/png" sizes="32x32" href="<?= $faviconUrl ?>" />
<link rel="icon" type="image/png" sizes="16x16" href="<?= $faviconUrl ?>" />
<link rel="apple-touch-icon" href="<?= $faviconUrl ?>" />

<!-- Canonical URL -->
<link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>" />

<!-- Theme color (mobile / PWA) -->
<meta name="theme-color" content="#001c37" />
<meta name="msapplication-TileColor" content="#001c37" />

<!-- Open Graph -->
<meta property="og:type" content="website" />
<meta property="og:locale" content="fr_FR" />
<meta property="og:site_name" content="AFRICIA TECH" />
<meta property="og:title" content="<?= $ogTitle ?>" />
<meta property="og:description" content="<?= $ogDescription ?>" />
<meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>" />
<meta property="og:url" content="<?= htmlspecialchars($ogUrl) ?>" />

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?= $ogTitle ?>" />
<meta name="twitter:description" content="<?= $ogDescription ?>" />
<meta name="twitter:image" content="<?= htmlspecialchars($ogImage) ?>" />

<!-- Styles & Tailwind (preload CSS pour éviter le blocage du rendu) -->
<link rel="preload" href="<?= ($basePath ? $basePath . '/' : '/') ?>assets/css/animations.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript><link rel="stylesheet" href="<?= ($basePath ? $basePath . '/' : '/') ?>assets/css/animations.css" /></noscript>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<?php
// JSON-LD Organization / LocalBusiness (SEO structuré)
$jsonLd = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'AFRICIA TECH',
    'description' => 'Solutions solaires, électricité, domotique et formations en énergies renouvelables au Mali.',
    'url' => $baseUrl,
    'logo' => $baseUrl . '/assets/images/logo.png',
    'image' => $baseUrl . '/assets/images/logo.png',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Cité BMS face à la pharmacie Issaka SANOGO',
        'addressCountry' => 'ML',
    ],
    'telephone' => '+22395205556',
    'email' => 'africatech@gmail.com',
    'sameAs' => [
        'https://www.facebook.com/profile.php?id=100071542517989',
        'https://www.tiktok.com/@africa.tech4',
    ],
];
?>
<script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
