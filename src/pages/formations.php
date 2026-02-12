<?php
$currentPage = 'formations';
$pageTitleKey = 'page.formations.title';
$pageDescriptionKey = 'page.formations.description';
require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="../assets/images/laanding-video-thumbail.jpeg" 
            alt="<?= htmlspecialchars(t('page_formations.formations_alt')) ?>" 
            width="1920" 
            height="1080"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= t('page_formations.hero_badge') ?></span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4"><?= t('page_formations.hero_title') ?> <span class="text-yellow-400"><?= t('page_formations.hero_title_hl') ?></span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto"><?= t('page_formations.hero_subtitle') ?></p>
    </div>
</section>

<?php
$formationsSectionBadge = t('page_formations.section_badge');
$formationsSectionTitle = t('page_formations.section_title');
$formationsSectionSubtitle = t('page_formations.section_subtitle');
?>
<!-- Formations Section Component -->
<?php require __DIR__ . '/../components/sections/formations.php'; ?>

<!-- Program Details Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= t('page_formations.program_badge') ?></span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6"><?= t('page_formations.program_title') ?> <span class="text-yellow-400"><?= t('page_formations.program_title_hl') ?></span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?= t('page_formations.program_subtitle') ?></p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-lg slide-up">
                <h3 class="text-2xl font-black text-[#001c37] mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center text-white font-bold">1</span>
                    <?= t('page_formations.solar_course') ?>
                </h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-bold text-[#001c37] mb-2">Module 1 : Fondamentaux</h4>
                        <ul class="text-gray-600 text-sm space-y-1 ml-4">
                            <li>• Principes de l'énergie solaire photovoltaïque</li>
                            <li>• Comprendre le rayonnement solaire</li>
                            <li>• Types de panneaux et technologies</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#001c37] mb-2">Module 2 : Dimensionnement</h4>
                        <ul class="text-gray-600 text-sm space-y-1 ml-4">
                            <li>• Calcul des besoins énergétiques</li>
                            <li>• Dimensionnement des systèmes</li>
                            <li>• Sélection des équipements</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#001c37] mb-2">Module 3 : Installation pratique</h4>
                        <ul class="text-gray-600 text-sm space-y-1 ml-4">
                            <li>• Montage et fixation des panneaux</li>
                            <li>• Câblage et connexions</li>
                            <li>• Mise en service et tests</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-8 shadow-lg slide-up">
                <h3 class="text-2xl font-black text-[#001c37] mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center text-white font-bold">2</span>
                    <?= t('page_formations.electric_course') ?>
                </h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-bold text-[#001c37] mb-2">Module 1 : Bases électriques</h4>
                        <ul class="text-gray-600 text-sm space-y-1 ml-4">
                            <li>• Notions de base en électricité</li>
                            <li>• Lecture de schémas électriques</li>
                            <li>• Normes et réglementations</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#001c37] mb-2">Module 2 : Installation résidentielle</h4>
                        <ul class="text-gray-600 text-sm space-y-1 ml-4">
                            <li>• Tableau électrique et protection</li>
                            <li>• Câblage et prises</li>
                            <li>• Éclairage et commandes</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-[#001c37] mb-2">Module 3 : Sécurité et maintenance</h4>
                        <ul class="text-gray-600 text-sm space-y-1 ml-4">
                            <li>• Mesures de sécurité</li>
                            <li>• Dépannage et diagnostic</li>
                            <li>• Maintenance préventive</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certification Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="slide-up">
                <div class="w-20 h-20 bg-yellow-400 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6"><?= t('page_formations.certification_title') ?> <span class="text-yellow-400"><?= t('page_formations.certification_title_hl') ?></span></h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    <?= t('page_formations.certification_p1') ?>
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    <?= t('page_formations.certification_p2') ?>
                </p>
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded">
                    <p class="text-gray-700 font-semibold">
                        <span class="text-yellow-400 font-black">85%</span> <?= t('page_formations.certification_stat') ?>
                    </p>
                </div>
            </div>

            <div class="slide-up">
                <div class="bg-gradient-to-br from-[#001c37] to-[#003366] rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-black mb-6"><?= t('page_formations.cert_advantages_title') ?></h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <h4 class="font-bold mb-1"><?= t('page_formations.cert_recognition_title') ?></h4>
                                <p class="text-gray-300 text-sm"><?= t('page_formations.cert_recognition_desc') ?></p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <h4 class="font-bold mb-1"><?= t('page_formations.cert_jobs_title') ?></h4>
                                <p class="text-gray-300 text-sm"><?= t('page_formations.cert_jobs_desc') ?></p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <h4 class="font-bold mb-1"><?= t('page_formations.cert_continuing_title') ?></h4>
                                <p class="text-gray-300 text-sm"><?= t('page_formations.cert_continuing_desc') ?></p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <h4 class="font-bold mb-1"><?= t('page_formations.cert_support_title') ?></h4>
                                <p class="text-gray-300 text-sm"><?= t('page_formations.cert_support_desc') ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section Component -->
<?php require __DIR__ . '/../components/sections/testimonials.php'; ?>

<!-- CTA Final Section Component -->
<?php require __DIR__ . '/../components/sections/cta-final.php'; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
