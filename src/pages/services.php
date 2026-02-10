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
            src="../assets/images/service-hero.jpeg" 
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

<!-- Services List Section - Fond blanc, design moderne -->
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <!-- En-tête -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#001c37]/5 border border-[#001c37]/10 mb-6">
                <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-[#001c37]">Ce que nous proposons</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-5">Nos domaines <span class="text-yellow-400 relative"><span class="relative z-10">d'expertise</span><span class="absolute bottom-1 left-0 w-full h-3 bg-yellow-400/30 -z-0"></span></span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">De l'énergie solaire au forage, une expertise reconnue pour accompagner chaque projet</p>
        </div>

        <!-- Grille des services -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1: Installation solaire -->
            <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-yellow-400/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-400/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-xl bg-[#001c37] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#001c37] mb-3">Installation solaire</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Installation complète de systèmes photovoltaïques pour particuliers et entreprises. Étude, dimensionnement et installation sur mesure.</p>
                    <a href="https://wa.me/22395205556?text=Bonjour.%20Je%20suis%20int%C3%A9ress%C3%A9%20par%20l%27installation%20solaire%20pour%20en%20savoir%20plus." target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-[#001c37] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#001c37]/90 hover:gap-3 transition-all">
                        Demander un devis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </article>

            <!-- Service 2: Électricité bâtiment -->
            <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-yellow-400/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-400/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-xl bg-[#001c37] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#001c37] mb-3">Électricité bâtiment</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Installation électrique complète pour maisons, bureaux et bâtiments industriels. Conformité aux normes en vigueur.</p>
                    <a href="https://wa.me/22395205556?text=Bonjour.%20Je%20suis%20int%C3%A9ress%C3%A9%20par%20l%27%C3%A9lectricit%C3%A9%20b%C3%A2timent%20pour%20en%20savoir%20plus." target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-[#001c37] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#001c37]/90 hover:gap-3 transition-all">
                        Demander un devis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </article>

            <!-- Service 3: Climatisation -->
            <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-yellow-400/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-400/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-xl bg-[#001c37] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#001c37] mb-3">Climatisation</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Installation et maintenance de systèmes de climatisation adaptés au climat malien. Solutions économes en énergie.</p>
                    <a href="https://wa.me/22395205556?text=Bonjour.%20Je%20suis%20int%C3%A9ress%C3%A9%20par%20la%20climatisation%20pour%20en%20savoir%20plus." target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-[#001c37] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#001c37]/90 hover:gap-3 transition-all">
                        Demander un devis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </article>

            <!-- Service 4: Maintenance -->
            <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-yellow-400/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-400/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-xl bg-[#001c37] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#001c37] mb-3">Maintenance</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Maintenance préventive et corrective de vos installations solaires et électriques. Intervention rapide et efficace.</p>
                    <a href="https://wa.me/22395205556?text=Bonjour.%20Je%20suis%20int%C3%A9ress%C3%A9%20par%20la%20maintenance%20pour%20en%20savoir%20plus." target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-[#001c37] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#001c37]/90 hover:gap-3 transition-all">
                        Demander un devis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </article>

            <!-- Service 5: Domotique -->
            <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-yellow-400/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-400/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-xl bg-[#001c37] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#001c37] mb-3">Domotique</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Automatisation et contrôle intelligent de votre habitat. Éclairage, sécurité, climatisation et énergie connectés.</p>
                    <a href="https://wa.me/22395205556?text=Bonjour.%20Je%20suis%20int%C3%A9ress%C3%A9%20par%20la%20domotique%20pour%20en%20savoir%20plus." target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-[#001c37] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#001c37]/90 hover:gap-3 transition-all">
                        Demander un devis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </article>

            <!-- Service 6: Forage -->
            <article class="group relative bg-white rounded-2xl border border-gray-100 p-8 shadow-sm hover:shadow-xl hover:border-yellow-400/30 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-yellow-400/10 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-xl bg-[#001c37] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#001c37] mb-3">Forage</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed text-sm">Forage de puits et installation de pompes solaires pour l'accès à l'eau. Solutions autonomes et durables.</p>
                    <a href="https://wa.me/22395205556?text=Bonjour.%20Je%20suis%20int%C3%A9ress%C3%A9%20par%20le%20forage%20pour%20en%20savoir%20plus." target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-[#001c37] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#001c37]/90 hover:gap-3 transition-all">
                        Demander un devis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

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

<!-- CTA Final Section Component -->
<?php require __DIR__ . '/../components/sections/cta-final.php'; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
