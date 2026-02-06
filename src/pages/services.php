<?php
$currentPage = 'services';
$pageTitle = 'Nos Services - AFRICIA TECH';
$pageDescription = 'Découvrez nos services complets : installation solaire, électricité bâtiment, climatisation, maintenance, domotique et forage. Solutions sur mesure pour tous vos besoins énergétiques.';
require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
            alt="Services AFRICIA TECH" 
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Nos services</span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4">Nos <span class="text-yellow-400">Services</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Des solutions complètes et professionnelles pour tous vos besoins énergétiques</p>
    </div>
</section>

<!-- Services Section Component -->
<?php require __DIR__ . '/../components/sections/services.php'; ?>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Notre processus</span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6">Comment nous <span class="text-yellow-400">travaillons</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Un processus structuré pour garantir la réussite de votre projet</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center slide-up">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 relative">
                    <span class="text-3xl font-black text-white">1</span>
                    <div class="absolute -right-8 top-1/2 transform -translate-y-1/2 hidden md:block">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-3">Consultation</h3>
                <p class="text-gray-600 text-sm">Analyse de vos besoins et étude de faisabilité de votre projet énergétique.</p>
            </div>

            <div class="text-center slide-up">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 relative">
                    <span class="text-3xl font-black text-white">2</span>
                    <div class="absolute -right-8 top-1/2 transform -translate-y-1/2 hidden md:block">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-3">Dimensionnement</h3>
                <p class="text-gray-600 text-sm">Calcul précis de vos besoins et sélection des équipements adaptés.</p>
            </div>

            <div class="text-center slide-up">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 relative">
                    <span class="text-3xl font-black text-white">3</span>
                    <div class="absolute -right-8 top-1/2 transform -translate-y-1/2 hidden md:block">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-3">Installation</h3>
                <p class="text-gray-600 text-sm">Installation professionnelle par nos équipes certifiées et expérimentées.</p>
            </div>

            <div class="text-center slide-up">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-black text-white">4</span>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-3">Suivi</h3>
                <p class="text-gray-600 text-sm">Accompagnement et maintenance pour garantir la performance de vos installations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Advantages Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="slide-up">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-10 h-[2px] bg-yellow-400"></span>
                    <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Avantages</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6">Pourquoi choisir nos <span class="text-yellow-400">services</span></h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    AFRICIA TECH vous offre bien plus qu'une simple installation. Nous vous accompagnons de A à Z avec une approche professionnelle et personnalisée.
                </p>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2">Équipements certifiés</h3>
                            <p class="text-gray-600 text-sm">Nous utilisons uniquement des équipements certifiés et garantis par les fabricants.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2">Installation rapide</h3>
                            <p class="text-gray-600 text-sm">Nos équipes expérimentées réalisent vos installations dans les délais convenus.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2">Support 24/7</h3>
                            <p class="text-gray-600 text-sm">Une assistance technique disponible à tout moment pour répondre à vos besoins.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide-up">
                <div class="bg-[#001c37] rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-black mb-6">Garanties incluses</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Garantie matériel jusqu'à 25 ans sur les panneaux solaires</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Garantie main d'œuvre sur toutes nos installations</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Maintenance préventive incluse la première année</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Formation à l'utilisation de vos équipements</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section Component -->
<?php require __DIR__ . '/../components/sections/why-choose-us.php'; ?>

<!-- CTA Final Section Component -->
<?php require __DIR__ . '/../components/sections/cta-final.php'; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
