<?php
$currentPage = 'contact';
$pageTitleKey = 'page.contact.title';
$pageDescriptionKey = 'page.contact.description';
require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="../assets/images/final-cta.jpeg" 
            alt="<?= htmlspecialchars(t('page_contact.contact_alt')) ?>" 
            width="1920" 
            height="1080"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= t('page_contact.hero_badge') ?></span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4"><?= t('page_contact.hero_title') ?><span class="text-yellow-400"><?= t('page_contact.hero_title_hl') ?></span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto"><?= t('page_contact.hero_subtitle') ?></p>
    </div>
</section>

<?php
$contactSectionBadge = t('page_contact.section_badge');
$contactSectionTitle = t('page_contact.section_title');
$contactSectionSubtitle = t('page_contact.section_subtitle');
?>
<!-- Contact Section Component -->
<?php require __DIR__ . '/../components/sections/contact.php'; ?>

<!-- Office Hours Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <div class="slide-up">
                <h2 class="text-3xl font-black text-[#001c37] mb-6"><?= t('page_contact.hours_title') ?></h2>
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="font-bold text-[#001c37]"><?= t('page_contact.mon_fri') ?></span>
                            <span class="text-gray-600"><?= t('page_contact.mon_fri_hours') ?></span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="font-bold text-[#001c37]"><?= t('page_contact.saturday') ?></span>
                            <span class="text-gray-600"><?= t('page_contact.saturday_hours') ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-[#001c37]"><?= t('page_contact.sunday') ?></span>
                            <span class="text-gray-600"><?= t('page_contact.closed') ?></span>
                        </div>
                    </div>
                    <div class="mt-8 p-4 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
                        <p class="text-sm text-gray-700">
                            <span class="font-bold text-yellow-400"><?= t('page_contact.urgency_title') ?></span> <?= t('page_contact.urgency_desc') ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="slide-up">
                <h2 class="text-3xl font-black text-[#001c37] mb-6"><?= t('page_contact.why_title') ?></h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.quote_title') ?></h3>
                            <p class="text-gray-600 text-sm"><?= t('page_contact.quote_desc') ?></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.expert_title') ?></h3>
                            <p class="text-gray-600 text-sm"><?= t('page_contact.expert_desc') ?></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.fast_title') ?></h3>
                            <p class="text-gray-600 text-sm"><?= t('page_contact.fast_desc') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= t('page_contact.faq_badge') ?></span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6"><?= t('page_contact.faq_title') ?> <span class="text-yellow-400"><?= t('page_contact.faq_title_hl') ?></span></h2>
        </div>

        <div class="space-y-4">
            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.faq1_q') ?></h3>
                <p class="text-gray-600 text-sm"><?= t('page_contact.faq1_a') ?></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.faq2_q') ?></h3>
                <p class="text-gray-600 text-sm"><?= t('page_contact.faq2_a') ?></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.faq3_q') ?></h3>
                <p class="text-gray-600 text-sm"><?= t('page_contact.faq3_a') ?></p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2"><?= t('page_contact.faq4_q') ?></h3>
                <p class="text-gray-600 text-sm"><?= t('page_contact.faq4_a') ?></p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
