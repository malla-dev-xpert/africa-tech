<?php
/**
 * Gallery Section – Images depuis la BDD (admin) ou liste statique en fallback.
 * Même design : mosaïque / bento, hover, lightbox.
 */

// Images statiques (fallback si aucune image en BDD)
$galleryImagesStatic = [
    ['src' => '../assets/images/hero.jpeg', 'alt' => t('gallery.alt_1')],
    ['src' => '../assets/images/landing-about.jpeg', 'alt' => t('gallery.alt_2')],
    ['src' => '../assets/images/video-bg.jpeg', 'alt' => t('gallery.alt_3')],
    ['src' => '../assets/images/gallery-1.jpg', 'alt' => t('gallery.alt_4')],
    ['src' => '../assets/images/service-hero.jpeg', 'alt' => t('gallery.alt_5')],
    ['src' => '../assets/images/final-cta.jpeg', 'alt' => t('gallery.alt_6')],
    ['src' => '../assets/images/hero.jpeg', 'alt' => t('gallery.alt_7')],
    ['src' => '../assets/images/gallery-2.jpg', 'alt' => t('gallery.alt_8')],
    ['src' => '../assets/images/gallery-3.jpg', 'alt' => t('gallery.alt_9')],
    ['src' => '../assets/images/gallery-4.jpg', 'alt' => t('gallery.alt_10')],
    ['src' => '../assets/images/service-hero.jpeg', 'alt' => t('gallery.alt_11')],
    ['src' => '../assets/images/laanding-video-thumbail.jpeg', 'alt' => t('gallery.alt_12')],
];

$galleryImages = $galleryImagesStatic;
try {
    if (!isset($pdo)) {
        require_once __DIR__ . '/../../config/db.php';
    }
    $stmt = $pdo->query("SELECT imageUrl, alt_text FROM gallery_images ORDER BY sort_order ASC, created_at ASC");
    if ($stmt) {
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) > 0) {
            $prefix = isset($basePath) ? rtrim($basePath, '/') . '/' : '/';
            $galleryImages = [];
            foreach ($rows as $r) {
                $galleryImages[] = [
                    'src'  => $prefix . ltrim($r['imageUrl'], '/'),
                    'alt'  => $r['alt_text'] !== '' ? $r['alt_text'] : t('gallery.alt_1'),
                ];
            }
        }
    }
} catch (Throwable $e) {
    $galleryImages = $galleryImagesStatic;
}

/**
 * Configuration de la mosaïque (Grid Layout)
 * Nous définissons ici la taille de chaque image sur grand écran (md).
 * row-span-2 = Image haute (prend 2 étages)
 * col-span-2 = Image large (prend 2 colonnes)
 */
$layout = [
    0 => 'md:col-span-1 md:row-span-2', // Grande verticale (Gauche)
    1 => 'md:col-span-1 md:row-span-2', // Grande verticale (Milieu)
    2 => 'md:col-span-1 md:row-span-1', // Petite (Haut Droite 1)
    3 => 'md:col-span-1 md:row-span-1', // Petite (Haut Droite 2)
    4 => 'md:col-span-1 md:row-span-1', // Petite (Milieu Droite 1)
    5 => 'md:col-span-1 md:row-span-1', // Petite (Milieu Droite 2)
    6 => 'md:col-span-1 md:row-span-1', // Petite (Bas Gauche)
    7 => 'md:col-span-1 md:row-span-1', // Petite (Bas Milieu)
    8 => 'md:col-span-2 md:row-span-1', // Large Panorama (Bas Droite)
    9 => 'md:col-span-1 md:row-span-1', // Carré final
    10 => 'md:col-span-1 md:row-span-1', // Carré final
    11 => 'md:col-span-2 md:row-span-1', // Large finale pour équilibrer
];
?>

<section id="gallery" class="py-12 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="text-center mb-8 md:mb-12">
            <span class="text-yellow-400 uppercase text-sm font-bold tracking-wider"><?= t('gallery.badge') ?></span>
            <h2 class="text-3xl md:text-4xl font-black text-[#001c37] mt-2">
                <?= t('gallery.title') ?> <span class="text-yellow-400"><?= t('gallery.title_highlight') ?></span>
            </h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 auto-rows-[150px] md:auto-rows-[220px]">
            <?php foreach ($galleryImages as $i => $img): 
                $gridClass = isset($layout[$i]) ? $layout[$i] : 'md:col-span-1 md:row-span-1';
            ?>
            <button type="button" 
                    class="gallery-thumb group relative w-full h-full overflow-hidden cursor-pointer bg-gray-200 rounded-sm border-0 p-0 <?= $gridClass ?>" 
                    data-src="<?= htmlspecialchars($img['src']) ?>" 
                    data-alt="<?= htmlspecialchars($img['alt']) ?>" 
                    aria-label="<?= t('gallery.open_large') ?>">
                
                <img src="<?= htmlspecialchars($img['src']) ?>" 
                     alt="<?= htmlspecialchars($img['alt']) ?>" 
                     class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500 ease-out" 
                     loading="<?= $i < 4 ? 'eager' : 'lazy' ?>" />
                
                <div class="absolute inset-0 bg-black/0 transition-colors duration-300 pointer-events-none"></div>
            </button>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="gallery-lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/95 p-4 backdrop-blur-sm" role="dialog" aria-modal="true">
        <button type="button" id="gallery-lightbox-close" class="absolute top-6 right-6 z-10 w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
        <img id="gallery-lightbox-img" src="" alt="" class="max-w-full max-h-[90vh] w-auto h-auto object-contain rounded-md shadow-2xl" />
    </div>

    <script>
    (function() {
        var lightbox = document.getElementById('gallery-lightbox');
        var lightboxImg = document.getElementById('gallery-lightbox-img');
        var closeBtn = document.getElementById('gallery-lightbox-close');
        
        if (!lightbox || !lightboxImg) return;

        function openLightbox(src, alt) {
            lightboxImg.src = src;
            lightboxImg.alt = alt;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
        function closeLightbox() {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.gallery-thumb').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var src = this.getAttribute('data-src');
                var alt = this.getAttribute('data-alt') || '';
                if (src) openLightbox(src, alt);
            });
        });
        closeBtn.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lightbox.classList.contains('flex')) closeLightbox();
        });
    })();
    </script>
</section>