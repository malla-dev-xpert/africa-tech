<?php
if (!isset($baseUrl)) {
    require_once __DIR__ . '/../config/app.php';
}
// Titre et description : clés de traduction (pageTitleKey / pageDescriptionKey) ou valeurs brutes
$pageTitle = isset($pageTitleKey) ? t($pageTitleKey) : (isset($pageTitle) ? htmlspecialchars($pageTitle) : t('site.name'));
$pageDescription = isset($pageDescriptionKey) ? t($pageDescriptionKey) : (isset($pageDescription) ? htmlspecialchars($pageDescription) : t('meta.default_description'));
$ogTitle = isset($ogTitle) ? htmlspecialchars($ogTitle) : $pageTitle;
$ogDescription = isset($ogDescription) ? htmlspecialchars($ogDescription) : $pageDescription;
$ogImage = isset($ogImage) ? $ogImage : ($baseUrl . '/assets/images/logo.png');
$reqUri = $_SERVER['REQUEST_URI'] ?? '';
$reqUriPath = preg_replace('#\?.*$#', '', $reqUri) ?: '/';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$isHome = ($scriptName === '/index.php' || $scriptName === 'index.php' || rtrim($reqUriPath, '/') === '' || $reqUriPath === '/');
$currentPageUrl = $baseUrl . ($isHome ? '/' : $reqUriPath) . ($currentLang !== 'fr' ? (strpos($isHome ? '/' : $reqUriPath, '?') !== false ? '&' : '?') . 'lang=' . $currentLang : '');
$ogUrl = isset($ogUrl) ? $ogUrl : $currentPageUrl;
$canonicalUrl = isset($canonicalUrl) ? $canonicalUrl : $currentPageUrl;
$metaRobots = isset($metaRobots) ? $metaRobots : 'index, follow';
$faviconUrl = $baseUrl . '/assets/images/faveicon.png';
// URLs alternates pour SEO multilingue (hreflang)
$hreflangPath = $isHome ? '/' : $reqUriPath;
$hreflangBase = $baseUrl . $hreflangPath . (strpos($hreflangPath, '?') !== false ? '&' : '?');
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

<!-- SEO multilingue : alternates hreflang -->
<link rel="alternate" hreflang="fr" href="<?= htmlspecialchars($hreflangBase . 'lang=fr') ?>" />
<link rel="alternate" hreflang="en" href="<?= htmlspecialchars($hreflangBase . 'lang=en') ?>" />
<link rel="alternate" hreflang="x-default" href="<?= htmlspecialchars($baseUrl . $hreflangPath . (strpos($hreflangPath, '?') !== false ? '&' : '?') . 'lang=fr') ?>" />

<!-- Theme color (mobile / PWA) -->
<meta name="theme-color" content="#001c37" />
<meta name="msapplication-TileColor" content="#001c37" />

<!-- Open Graph -->
<meta property="og:type" content="website" />
<meta property="og:locale" content="<?= $currentLang === 'en' ? 'en_US' : 'fr_FR' ?>" />
<meta property="og:site_name" content="<?= htmlspecialchars(t('site.name')) ?>" />
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
    'name' => t('site.name'),
    'description' => t('meta.default_description'),
    'url' => $baseUrl,
    'logo' => $baseUrl . '/assets/images/logo.png',
    'image' => $baseUrl . '/assets/images/logo.png',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => t('header.address'),
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
