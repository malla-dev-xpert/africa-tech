<?php
// Données produits : tableau passé par la page (accueil = 6, page Produits = tous, éventuellement filtrés)
if (!isset($products) || !is_array($products)) {
    $products = [];
}
$showFilters = !empty($showFilters);
$productsShowAllLink = !empty($productsShowAllLink);
$whatsappBase = 'https://wa.me/22395205556?text=' . rawurlencode('Bonjour. Je suis intéressé par ');
?>
<!-- Products Section - Modern card design -->
<section id="products" class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= isset($productsSectionBadge) ? htmlspecialchars($productsSectionBadge) : 'Nos produits' ?></span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-[#001c37] mb-6"><?php if (isset($productsSectionTitle)): ?><?= htmlspecialchars($productsSectionTitle) ?><?php else: ?>Nos <span class="text-yellow-400">Produits</span><?php endif; ?></h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?= isset($productsSectionSubtitle) ? htmlspecialchars($productsSectionSubtitle) : 'Équipements de qualité pour vos projets énergétiques' ?></p>
        </div>

        <?php if ($showFilters): ?>
        <form method="get" action="products.php" class="mb-10 slide-up flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[200px]">
                <label for="products-q" class="block text-sm font-semibold text-gray-700 mb-1">Recherche par nom</label>
                <input type="text" id="products-q" name="q" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
                       placeholder="Nom du produit..."
                       class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 outline-none" />
            </div>
            <div class="w-36">
                <label for="products-min" class="block text-sm font-semibold text-gray-700 mb-1">Min (FCFA)</label>
                <input type="number" id="products-min" name="min_price" value="<?= htmlspecialchars($_GET['min_price'] ?? '') ?>"
                       placeholder="0" min="0" step="1000"
                       class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 outline-none" />
            </div>
            <div class="w-36">
                <label for="products-max" class="block text-sm font-semibold text-gray-700 mb-1">Max (FCFA)</label>
                <input type="number" id="products-max" name="max_price" value="<?= htmlspecialchars($_GET['max_price'] ?? '') ?>"
                       placeholder="—" min="0" step="1000"
                       class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 outline-none" />
            </div>
            <button type="submit" class="px-5 py-2.5 bg-[#001c37] text-white font-bold rounded-xl hover:bg-yellow-500 hover:text-[#001c37] transition-colors duration-300" aria-label="Appliquer les filtres de recherche">
                Filtrer
            </button>
            <?php if (!empty($_GET['q']) || isset($_GET['min_price']) && $_GET['min_price'] !== '' || isset($_GET['max_price']) && $_GET['max_price'] !== ''): ?>
            <a href="products.php" class="px-5 py-2.5 border border-gray-300 rounded-xl font-medium text-gray-700 hover:bg-gray-50">Réinitialiser</a>
            <?php endif; ?>
        </form>
        <?php endif; ?>

        <?php if (count($products) === 0): ?>
            <div class="py-16 flex flex-col items-center justify-center text-gray-500 slide-up">
                <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <p class="text-lg font-medium">Pas de produits</p>
                <p class="text-sm mt-1">Aucun produit ne correspond pour le moment.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($products as $p): 
                    $prodUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/products.php?product_id=' . $p['id'];
                    $waMessage = "Bonjour. Je suis intéressé par " . ($p['name'] ?? '') . " (" . ($p['price'] ?? '') . ").\n\nVoici le lien du produit : " . $prodUrl;
                    $waLink = "https://wa.me/22395205556?text=" . rawurlencode($waMessage);
                ?>
                <article class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col slide-up border border-gray-100 hover:border-yellow-400/30">
                    <div class="relative h-44 overflow-hidden bg-gradient-to-br from-[#001c37] to-[#003366]">
                        <?php $imgUrl = !empty($p['imageUrl']) ? '/' . ltrim($p['imageUrl'], '/') : 'https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?w=800&q=80'; ?>
                        <img src="<?= htmlspecialchars($imgUrl) ?>" alt="<?= htmlspecialchars($p['name'] ?? '') ?>" width="400" height="280" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="text-lg font-bold text-[#001c37] mb-2"><?= htmlspecialchars($p['name'] ?? '') ?></h3>
                        <p class="text-sm text-gray-500 mb-4 flex-1 line-clamp-2"><?= htmlspecialchars($p['description'] ?? '') ?></p>
                        <p class="text-xl font-black text-yellow-500 mb-4"><?= htmlspecialchars($p['price'] ?? '') ?></p>
                        <a href="<?= htmlspecialchars($waLink) ?>" target="_blank" rel="noopener" class="block w-full bg-[#001c37] text-white py-3.5 rounded-xl font-bold text-sm hover:bg-yellow-400 hover:text-[#001c37] transition-all duration-300 text-center">
                            Je suis intéressé
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($productsShowAllLink): ?>
            <div class="text-center mt-12 slide-up">
                <a href="products.php" class="inline-flex items-center gap-2 px-8 py-4 bg-[#001c37] text-white font-bold rounded-xl hover:bg-yellow-500 hover:text-[#001c37] transition-all duration-300">
                    Voir tous les produits
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
