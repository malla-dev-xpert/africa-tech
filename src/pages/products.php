<?php
require_once __DIR__ . '/../config/app.php';
$currentPage = 'products';
$pageTitleKey = 'page.products.title';
$pageDescriptionKey = 'page.products.description';
$productsSectionTitle = t('page_products.section_title');

$products = [];
$showFilters = true;
$productsShowAllLink = false;

try {
    require __DIR__ . '/../config/db.php';
    $q = isset($_GET['q']) ? trim((string) $_GET['q']) : '';
    $minPrice = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (int) $_GET['min_price'] : null;
    $maxPrice = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (int) $_GET['max_price'] : null;

    $sql = "SELECT id, name, description, price, imageUrl FROM products WHERE 1=1";
    $params = [];
    if ($q !== '') {
        $sql .= " AND name LIKE ?";
        $params[] = '%' . $q . '%';
    }
    $sql .= " ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($minPrice !== null || $maxPrice !== null) {
        $filtered = [];
        foreach ($products as $p) {
            $priceNum = (int) preg_replace('/\D/', '', $p['price'] ?? '0');
            if ($minPrice !== null && $priceNum < $minPrice) continue;
            if ($maxPrice !== null && $priceNum > $maxPrice) continue;
            $filtered[] = $p;
        }
        $products = $filtered;
    }

    // --- Logic for Open Graph Tags (WhatsApp Preview) ---
    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $prodId = (int) $_GET['product_id'];
        $stmtSingle = $pdo->prepare("SELECT name, description, imageUrl FROM products WHERE id = ?");
        $stmtSingle->execute([$prodId]);
        $singleProduct = $stmtSingle->fetch(PDO::FETCH_ASSOC);

        if ($singleProduct) {
            $ogTitle = $singleProduct['name'] . ' - ' . ($singleProduct['price'] ?? '');
            $ogDescription = mb_strimwidth($singleProduct['description'], 0, 150, "...");
            $ogImage = 'https://' . $_SERVER['HTTP_HOST'] . '/' . ltrim($singleProduct['imageUrl'], '/');
            $ogUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            
            // Override page title for better browser tab context
            $pageTitle = $singleProduct['name'] . ' - AFRICIA TECH';
        }
    }

} catch (Throwable $e) {
    $products = [];
}

require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="../assets/images/video-bg.jpeg" 
            alt="Produits solaires AFRICIA TECH" 
            width="1920" 
            height="1080"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= t('page_products.hero_badge') ?></span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4"><?= t('page_products.hero_title') ?> <span class="text-yellow-400"><?= t('page_products.hero_title_hl') ?></span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto"><?= t('page_products.hero_subtitle') ?></p>
    </div>
</section>

<?php
$productsSectionBadge = t('products.catalogue_badge');
$productsSectionSubtitle = t('products.catalogue_subtitle');
?>
<!-- Products Section Component -->
<?php require __DIR__ . '/../components/sections/products.php'; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
