<?php
$basePrefix = isset($basePath) && $basePath !== '' ? $basePath . '/' : '';
$langParam = ($currentLang ?? 'fr') !== 'fr' ? '?lang=' . ($currentLang ?? 'fr') : '';
$scriptName = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$getParams = $_GET;
$getParams['lang'] = 'fr';
$urlLangFr = $basePrefix . $scriptName . '?' . http_build_query($getParams);
$getParams['lang'] = 'en';
$urlLangEn = $basePrefix . $scriptName . '?' . http_build_query($getParams);
?>
<div class="bg-[#001c37] text-gray-300 py-2 px-4 hidden lg:block border-b border-white/10 text-xs">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex gap-6">
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                africatech@gmail.com
            </span>
            <span class="flex items-center gap-2">
                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <?= htmlspecialchars(t('header.address')) ?>
            </span>
        </div>
        <div class="flex gap-4 items-center">
            <a href="https://www.facebook.com/profile.php?id=100071542517989" target="_blank" class="text-white hover:text-yellow-400 transition-colors duration-300" aria-label="Facebook">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
            </a>

            <a href="https://www.tiktok.com/@africa.tech4?is_from_webapp=1&sender_device=pc" target="_blank" class="text-white hover:text-yellow-400 transition-colors duration-300" aria-label="Tiktok">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.75 2h2.5c.2 1.8 1.4 3.3 3.2 3.7v2.6c-1.3-.1-2.6-.6-3.7-1.4v6.6c0 3.4-2.6 5.5-5.3 5.5-2.7 0-5.2-2-5.2-5 0-3 2.3-5 5-5 .4 0 .8 0 1.2.1v2.7c-.3-.1-.7-.2-1.1-.2-1.4 0-2.5 1.1-2.5 2.4s1.1 2.4 2.5 2.4c1.6 0 2.6-1.2 2.6-2.9V2z" />
                </svg>
            </a>
            <!-- Sélecteur de langue -->
            <span class="flex items-center gap-1 text-gray-400">|</span>
            <a href="<?= htmlspecialchars($urlLangFr) ?>" class="px-1.5 py-0.5 rounded <?= ($currentLang ?? 'fr') === 'fr' ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-400'; ?> transition-colors" hreflang="fr" aria-current="<?= ($currentLang ?? 'fr') === 'fr' ? 'true' : 'false' ?>"><?= t('lang.fr') ?></a>
            <span class="text-gray-500">|</span>
            <a href="<?= htmlspecialchars($urlLangEn) ?>" class="px-1.5 py-0.5 rounded <?= ($currentLang ?? 'fr') === 'en' ? 'text-yellow-400 font-bold' : 'text-white hover:text-yellow-400'; ?> transition-colors" hreflang="en" aria-current="<?= ($currentLang ?? 'fr') === 'en' ? 'true' : 'false' ?>"><?= t('lang.en') ?></a>
        </div>
    </div>
</div>

<header class="bg-[#001c37]/90 backdrop-blur-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="<?= $basePrefix ?>index.php<?= $langParam ?>" class="flex items-center gap-2 hover:opacity-90 transition-opacity">
            <img src="<?= $basePrefix ?>assets/images/logo.png" alt="<?= htmlspecialchars(t('site.name')) ?>" width="160" height="40" class="h-10 w-auto object-contain">
        </a>

        <nav class="hidden lg:flex items-center gap-8 text-white font-semibold text-sm">
            <a href="<?= $basePrefix ?>index.php<?= $langParam ?>" class="<?php echo ($currentPage === 'accueil') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.home') ?></a>
            <a href="<?= $basePrefix ?>about.php<?= $langParam ?>" class="<?php echo ($currentPage === 'about') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.about') ?></a>
            <a href="<?= $basePrefix ?>services.php<?= $langParam ?>" class="<?php echo ($currentPage === 'services') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.services') ?></a>
            <a href="<?= $basePrefix ?>products.php<?= $langParam ?>" class="<?php echo ($currentPage === 'products') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.products') ?></a>
            <a href="<?= $basePrefix ?>formations.php<?= $langParam ?>" class="<?php echo ($currentPage === 'formations') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.trainings') ?></a>
            <a href="<?= $basePrefix ?>contact.php<?= $langParam ?>" class="<?php echo ($currentPage === 'contact') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.contact') ?></a>
        </nav>

        <div class="hidden lg:flex items-center gap-6 text-white border-l border-white/20 pl-6">
            <!-- Sélecteur de langue desktop -->
            <div class="flex items-center gap-1 text-sm font-medium">
                <a href="<?= htmlspecialchars($urlLangFr) ?>" class="px-2 py-1 rounded <?= ($currentLang ?? 'fr') === 'fr' ? 'bg-yellow-400/20 text-yellow-400' : 'text-gray-300 hover:text-yellow-400'; ?> transition-colors" hreflang="fr"><?= t('lang.fr') ?></a>
                <span class="text-gray-500">|</span>
                <a href="<?= htmlspecialchars($urlLangEn) ?>" class="px-2 py-1 rounded <?= ($currentLang ?? 'fr') === 'en' ? 'bg-yellow-400/20 text-yellow-400' : 'text-gray-300 hover:text-yellow-400'; ?> transition-colors" hreflang="en"><?= t('lang.en') ?></a>
            </div>
            <div class="flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <div class="text-right">
                    <p class="text-[10px] text-gray-200 uppercase"><?= t('nav.call_us') ?></p>
                    <p class="font-bold text-sm">+223 95 20 55 56</p>
                </div>
            </div>
        </div>

        <button id="menu-btn" type="button" class="lg:hidden text-white" aria-label="<?= htmlspecialchars($currentLang === 'en' ? 'Open navigation menu' : 'Ouvrir le menu de navigation') ?>" aria-expanded="false" aria-controls="mobile-menu">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
</header>

<!-- Mobile menu moved outside header for proper fixed positioning -->
<!-- Fixed positioning requires the element to be positioned relative to viewport, not parent container -->
<div id="mobile-menu" class="fixed inset-0 bg-[#001c37] z-[100] flex flex-col translate-x-full transition-transform duration-500 ease-in-out">
    <!-- Close button -->
    <button id="close-btn" type="button" class="absolute top-6 right-6 text-5xl text-white z-10" aria-label="<?= $currentLang === 'en' ? 'Close menu' : 'Fermer le menu' ?>">&times;</button>

    <!-- Sélecteur de langue mobile -->
    <div class="absolute top-6 left-6 flex items-center gap-2 text-white">
        <a href="<?= htmlspecialchars($urlLangFr) ?>" class="px-3 py-1.5 rounded <?= ($currentLang ?? 'fr') === 'fr' ? 'bg-yellow-400 text-[#001c37] font-bold' : 'bg-white/10'; ?> transition-colors"><?= t('lang.fr') ?></a>
        <a href="<?= htmlspecialchars($urlLangEn) ?>" class="px-3 py-1.5 rounded <?= ($currentLang ?? 'fr') === 'en' ? 'bg-yellow-400 text-[#001c37] font-bold' : 'bg-white/10'; ?> transition-colors"><?= t('lang.en') ?></a>
    </div>

    <!-- Navigation links - centered vertically -->
    <nav class="flex-1 flex flex-col items-center justify-center gap-8 text-2xl text-white">
        <a href="<?= $basePrefix ?>index.php<?= $langParam ?>" class="<?php echo ($currentPage === 'accueil') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.home') ?></a>
        <a href="<?= $basePrefix ?>about.php<?= $langParam ?>" class="<?php echo ($currentPage === 'about') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.about') ?></a>
        <a href="<?= $basePrefix ?>services.php<?= $langParam ?>" class="<?php echo ($currentPage === 'services') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.services') ?></a>
        <a href="<?= $basePrefix ?>products.php<?= $langParam ?>" class="<?php echo ($currentPage === 'products') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.products') ?></a>
        <a href="<?= $basePrefix ?>formations.php<?= $langParam ?>" class="<?php echo ($currentPage === 'formations') ? 'text-yellow-400' : 'hover:text-yellow-400'; ?> transition-colors"><?= t('nav.trainings') ?></a>
    </nav>

    <!-- Contact button - fixed at bottom -->
    <div class="pb-8 px-4 w-full">
        <a href="<?= $basePrefix ?>contact.php<?= $langParam ?>" class="block w-full <?php echo ($currentPage === 'contact') ? 'bg-yellow-400 text-white' : 'bg-white text-[#001c37]'; ?> px-10 py-5 rounded font-bold uppercase text-sm hover:bg-yellow-400 hover:text-white transition-all text-center">
            <?= t('nav.contact') ?>
        </a>
    </div>
</div>