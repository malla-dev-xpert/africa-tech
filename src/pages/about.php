<?php
$currentPage = 'about';
$pageTitle = 'À propos - AFRICIA TECH';
$pageDescription = 'Découvrez AFRICIA TECH, votre partenaire de confiance en solutions énergétiques durables au Mali. Expertise technique, équipements de qualité, accompagnement personnalisé.';
require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="https://images.unsplash.com/photo-1509391366360-2e959784a276?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
            alt="Équipe AFRICIA TECH" 
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-green-500"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-green-500">Qui sommes-nous</span>
            <span class="w-10 h-[2px] bg-green-500"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4">À propos de <span class="text-green-500">AFRICIA TECH</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Votre partenaire de confiance pour l'indépendance énergétique au Mali</p>
    </div>
</section>

<!-- About Section Component -->
<?php require __DIR__ . '/../components/sections/about.php'; ?>

<!-- Mission & Vision Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="slide-up">
                <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-[#001c37] mb-4">Notre Mission</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Démocratiser l'accès à l'énergie solaire et à l'électricité de qualité pour tous les Maliens. Nous croyons que chaque foyer et chaque entreprise mérite une source d'énergie fiable, durable et économique.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Notre mission est de contribuer activement à la transition énergétique du Mali en proposant des solutions adaptées au contexte local, durables et économiquement viables.
                </p>
            </div>

            <!-- Vision -->
            <div class="slide-up">
                <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-[#001c37] mb-4">Notre Vision</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Devenir le leader des solutions énergétiques durables en Afrique de l'Ouest. Nous aspirons à un Mali où l'énergie solaire est accessible à tous, où les compétences locales sont développées et où l'autonomie énergétique devient une réalité.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Nous visons à former une nouvelle génération de techniciens et d'ingénieurs spécialisés en énergies renouvelables, créant ainsi des opportunités d'emploi et contribuant au développement économique du pays.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-green-500"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-green-500">Nos valeurs</span>
                <span class="w-10 h-[2px] bg-green-500"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6">Nos <span class="text-green-500">Valeurs</span></h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-xl slide-up">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4">Excellence</h3>
                <p class="text-gray-600">Nous visons l'excellence dans chaque projet, en utilisant uniquement des équipements de première qualité et en appliquant les meilleures pratiques du secteur.</p>
            </div>

            <div class="text-center p-8 bg-gray-50 rounded-xl slide-up">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4">Intégrité</h3>
                <p class="text-gray-600">La transparence et l'honnêteté guident toutes nos relations. Nous construisons des partenariats durables basés sur la confiance mutuelle.</p>
            </div>

            <div class="text-center p-8 bg-gray-50 rounded-xl slide-up">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4">Innovation</h3>
                <p class="text-gray-600">Nous restons à la pointe de la technologie solaire et électrique, adoptant les innovations qui apportent de la valeur à nos clients.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-[#001c37] text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-green-500"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-green-500">Notre équipe</span>
                <span class="w-10 h-[2px] bg-green-500"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black mb-6">Une équipe <span class="text-green-500">passionnée</span></h2>
            <p class="text-gray-300 max-w-2xl mx-auto">Des experts dévoués à votre succès énergétique</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl slide-up">
                <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-2">Ingénieurs</h3>
                <p class="text-gray-300 text-center text-sm">Nos ingénieurs certifiés conçoivent des solutions sur mesure adaptées à vos besoins spécifiques.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl slide-up">
                <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-2">Techniciens</h3>
                <p class="text-gray-300 text-center text-sm">Nos techniciens expérimentés réalisent des installations impeccables avec un souci du détail.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl slide-up">
                <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center mb-2">Formateurs</h3>
                <p class="text-gray-300 text-center text-sm">Nos formateurs qualifiés transmettent leur savoir-faire pour développer les compétences locales.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section Component -->
<?php require __DIR__ . '/../components/sections/why-choose-us.php'; ?>

<!-- Testimonials Section Component -->
<?php require __DIR__ . '/../components/sections/testimonials.php'; ?>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-[#001c37] to-[#003366] text-white">
    <div class="max-w-7xl mx-auto px-4 text-center fade-in">
        <h2 class="text-4xl md:text-5xl font-black mb-6">
            Rejoignez-nous dans la <span class="text-green-500">transition énergétique</span>
        </h2>
        <p class="text-xl text-gray-300 mb-12 max-w-2xl mx-auto">
            Ensemble, créons un avenir énergétique durable pour le Mali. Contactez-nous pour discuter de votre projet.
        </p>
        <a href="contact.php" class="inline-block bg-green-500 text-white px-12 py-6 rounded-lg font-bold uppercase text-lg hover:bg-green-600 transition-all shadow-lg hover:shadow-xl">
            Nous contacter
        </a>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
