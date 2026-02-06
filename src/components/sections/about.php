<!-- About Section with modern design inspired by reference image -->
<section id="about" class="py-12 md:py-20 bg-white relative overflow-visible">
    <!-- Decorative background element (top-left) -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-gray-100 rounded-full opacity-30 -translate-x-1/2 -translate-y-1/2"></div>
    
    <div class="max-w-7xl mx-auto px-4 md:px-4 relative z-10 overflow-visible">
        <div class="grid lg:grid-cols-2 gap-12 items-stretch">
            <!-- Left Column - Image -->
            <div class="relative slide-up flex">
                <!-- Decorative rounded rectangle behind image -->
                <div class="absolute -top-6 -left-6 w-full h-full bg-gray-100 rounded-3xl -z-10"></div>
                
                <!-- Main image container with rounded corners and shadow -->
                <div class="relative rounded-3xl overflow-visible shadow-2xl w-full h-full group">
                    <div class="relative w-full h-full rounded-3xl overflow-hidden">
                        <img 
                            src="../assets/images/landing-about.jpeg" 
                            alt="Équipe AFRICIA TECH - Installation de panneaux solaires" 
                            class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                        >
                        <!-- Overlay gradient with hover effect -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#001c37]/20 to-transparent transition-opacity duration-300 group-hover:opacity-80"></div>
                        <!-- Hover overlay effect -->
                        <div class="absolute inset-0 bg-yellow-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Card 1 - Overflow on bottom-left -->
                    <div class="absolute -bottom-3 -left-3 md:-bottom-6 md:-left-6 bg-white rounded-lg md:rounded-xl shadow-xl md:shadow-2xl p-3 md:p-6 w-32 md:w-48 z-10 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center gap-2 md:gap-3 mb-1 md:mb-2">
                            <div class="w-8 h-8 md:w-12 md:h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="text-lg md:text-2xl font-black text-[#001c37]" data-counter="100">0+</div>
                                <div class="text-[10px] md:text-xs text-gray-600 font-semibold">Projets</div>
                            </div>
                        </div>
                        <p class="text-[10px] md:text-xs text-gray-500 leading-tight hidden md:block">Installations réalisées avec succès</p>
                    </div>

                    <!-- Card 2 - Overflow on top-right -->
                    <div class="absolute -top-3 -right-3 md:-top-6 md:-right-6 bg-[#001c37] text-white rounded-lg md:rounded-xl shadow-xl md:shadow-2xl p-3 md:p-6 w-32 md:w-48 z-10 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center gap-2 md:gap-3 mb-1 md:mb-2">
                            <div class="w-8 h-8 md:w-12 md:h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="text-lg md:text-2xl font-black text-yellow-400" data-counter="50">0+</div>
                                <div class="text-[10px] md:text-xs text-gray-300 font-semibold">Clients</div>
                            </div>
                        </div>
                        <p class="text-[10px] md:text-xs text-gray-400 leading-tight hidden md:block">Clients satisfaits et fidèles</p>
                    </div>
                </div>
            </div>

            <!-- Right Column - Content -->
            <div class="slide-up">
                <!-- Pre-headline -->
                <div class="text-yellow-400 uppercase text-sm font-bold tracking-wider mb-4">
                    Bienvenue, créons ensemble un avenir durable !
                </div>

                <!-- Main headline -->
                <h2 class="text-4xl font-black text-[#001c37] mb-6 leading-tight">
                    Une entreprise de confiance en <span class="text-yellow-400">solutions énergétiques</span>
                </h2>

                <!-- Description paragraph -->
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    AFRICIA TECH est une entreprise malienne de confiance spécialisée dans les solutions énergétiques durables. Notre mission est de créer un changement positif dans notre communauté en fournissant des solutions solaires de qualité et en offrant des formations professionnelles en énergies renouvelables.
                </p>

                <!-- Feature boxes (Icon + Text) -->
                <div class="grid sm:grid-cols-2 gap-6 mb-8">
                    <!-- Feature 1 -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] text-lg mb-1">Solutions Solaires</h3>
                            <p class="text-gray-600 text-sm">Installations professionnelles et durables</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center">
                                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] text-lg mb-1">Formations Professionnelles</h3>
                            <p class="text-gray-600 text-sm">Développez vos compétences en énergies renouvelables</p>
                        </div>
                    </div>
                </div>

                <!-- Bulleted list with custom icons -->
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-600 leading-relaxed">Fourniture d'équipements solaires de première qualité pour les particuliers et entreprises.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-600 leading-relaxed">Accompagnement technique et maintenance pour garantir la performance de vos installations.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-600 leading-relaxed">Programmes de formation pour développer les compétences locales en énergies renouvelables.</span>
                    </li>
                </ul>

                <!-- Main CTA Button -->
                <a 
                    href="#contact" 
                    class="inline-block bg-yellow-400 text-white px-10 py-4 rounded-lg font-bold uppercase text-sm hover:bg-yellow-500 transition-all shadow-lg hover:shadow-xl transform hover:scale-[1.02]"
                >
                    Nous contacter maintenant
                </a>
            </div>
        </div>
    </div>
</section>
