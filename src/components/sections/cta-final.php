<!-- CTA Final Section -->
<section id="cta-final" class="relative py-20 text-white overflow-hidden">
    <!-- Background image -->
    <div class="absolute inset-0">
        <img src="../assets/images/final-cta.jpeg" 
             alt="<?= htmlspecialchars(t('cta.alt')) ?>" 
             width="1920" 
             height="1080"
             class="w-full h-full object-cover" 
             loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/85 to-[#003366]/90"></div>
    </div>
    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center fade-in">
        <h2 class="text-4xl md:text-6xl font-black mb-6">
            <?= t('cta.title') ?><span class="text-yellow-400"><?= t('cta.title_highlight') ?></span> ?
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-2xl mx-auto">
            <?= t('cta.subtitle') ?>
        </p>
        <a href="https://wa.me/22395205556?text=<?= rawurlencode(($currentLang ?? 'fr') === 'en' ? 'Hello, I would like to discuss my energy project' : 'Bonjour, je souhaite discuter de mon projet énergétique') ?>" target="_blank" rel="noopener" class="inline-block bg-yellow-400 text-white px-12 py-6 rounded-lg font-bold uppercase text-lg hover:bg-yellow-500 transition-all shadow-lg hover:shadow-xl">
            <?= t('cta.cta') ?>
        </a>
    </div>
</section>
