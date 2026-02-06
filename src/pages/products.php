<?php
$currentPage = 'products';
$pageTitle = 'Nos Produits - AFRICIA TECH';
$pageDescription = 'Découvrez notre gamme de produits solaires : panneaux solaires, batteries, kits solaires, onduleurs et lampadaires solaires. Équipements de qualité pour vos projets énergétiques.';
require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" 
            alt="Produits solaires AFRICIA TECH" 
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Nos produits</span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4">Nos <span class="text-yellow-400">Produits</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Équipements solaires de première qualité pour votre indépendance énergétique</p>
    </div>
</section>

<!-- Products Section Component -->
<?php require __DIR__ . '/../components/sections/products.php'; ?>

<!-- Product Categories Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Catégories</span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6">Gamme complète de <span class="text-yellow-400">produits</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Tous les équipements nécessaires pour vos projets solaires</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-[#001c37] to-[#003366] rounded-xl p-8 text-white slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Panneaux Solaires</h3>
                <p class="text-gray-300 mb-4">Monocristallins et polycristallins, de 100W à 500W. Rendements optimaux adaptés au climat malien.</p>
                <ul class="space-y-2 text-sm text-gray-300">
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Garantie 25 ans
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Certifiés IEC
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Résistance aux intempéries
                    </li>
                </ul>
            </div>

            <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl p-8 text-white slide-up">
                <div class="w-16 h-16 bg-white/20 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Batteries</h3>
                <p class="text-white/90 mb-4">Lithium et plomb-acide pour stockage d'énergie. Capacités variées selon vos besoins.</p>
                <ul class="space-y-2 text-sm text-white/90">
                    <li class="flex items-center gap-2">
                        <span>✓</span> Longue durée de vie
                    </li>
                    <li class="flex items-center gap-2">
                        <span>✓</span> Charge rapide
                    </li>
                    <li class="flex items-center gap-2">
                        <span>✓</span> Maintenance réduite
                    </li>
                </ul>
            </div>

            <div class="bg-gray-50 rounded-xl p-8 slide-up border-2 border-gray-200">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-[#001c37] mb-4">Onduleurs</h3>
                <p class="text-gray-600 mb-4">Onduleurs solaires on-grid et off-grid. Puissances de 1kW à 10kW et plus.</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Haute efficacité
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Monitoring intelligent
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Protection intégrée
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Specifications Section -->
<section class="py-20 bg-[#001c37] text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <h2 class="text-4xl md:text-5xl font-black mb-6">Spécifications <span class="text-yellow-400">techniques</span></h2>
            <p class="text-gray-300 max-w-2xl mx-auto">Tous nos produits répondent aux normes internationales les plus strictes</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl slide-up">
                <div class="text-4xl font-black text-yellow-400 mb-2">100%</div>
                <h3 class="text-xl font-bold mb-4">Certifiés</h3>
                <p class="text-gray-300 text-sm">Tous nos équipements sont certifiés CE, IEC et répondent aux normes européennes et internationales.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl slide-up">
                <div class="text-4xl font-black text-yellow-400 mb-2">25 ans</div>
                <h3 class="text-xl font-bold mb-4">Garantie</h3>
                <p class="text-gray-300 text-sm">Garantie constructeur sur les panneaux solaires avec performance garantie à 80% après 25 ans.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl slide-up">
                <div class="text-4xl font-black text-yellow-400 mb-2">24/7</div>
                <h3 class="text-xl font-bold mb-4">Support</h3>
                <p class="text-gray-300 text-sm">Assistance technique disponible à tout moment pour vos questions et dépannages.</p>
            </div>
        </div>
    </div>
</section>

<!-- Video Section Component with Parallax -->
<?php require __DIR__ . '/../components/sections/video.php'; ?>

<!-- CTA Final Section Component -->
<?php require __DIR__ . '/../components/sections/cta-final.php'; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
