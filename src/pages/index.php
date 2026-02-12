<?php
$currentPage = 'accueil';
$pageTitleKey = 'page.home.title';
$pageDescriptionKey = 'page.home.description';

$products = [];
$productsShowAllLink = true;
try {
    require __DIR__ . '/../config/db.php';
    $stmt = $pdo->query("SELECT id, name, description, price, imageUrl FROM products ORDER BY created_at DESC LIMIT 6");
    if ($stmt) {
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Throwable $e) {
    $products = [];
}

require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section Component -->
<?php require __DIR__ . '/../components/sections/hero.php'; ?>

<!-- About Section Component -->
<?php require __DIR__ . '/../components/sections/about.php'; ?>

<!-- Why Choose Us Section Component -->
<?php require __DIR__ . '/../components/sections/why-choose-us.php'; ?>

<!-- Services Section Component -->
<?php require __DIR__ . '/../components/sections/services.php'; ?>

<!-- Products Section Component -->
<?php require __DIR__ . '/../components/sections/products.php'; ?>

<!-- Video Section Component with Parallax -->
<?php require __DIR__ . '/../components/sections/video.php'; ?>

<!-- Formations Section Component -->
<?php require __DIR__ . '/../components/sections/formations.php'; ?>

<!-- Testimonials Section Component -->
<?php require __DIR__ . '/../components/sections/testimonials.php'; ?>

<!-- CTA Final Section Component -->
<?php require __DIR__ . '/../components/sections/cta-final.php'; ?>

<!-- Contact Section Component -->
<?php require __DIR__ . '/../components/sections/contact.php'; ?>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
