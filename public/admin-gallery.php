<?php
/**
 * Administration – Galerie (images de la section galerie page d'accueil)
 * Ajout d'une ou plusieurs images, suppression.
 */
require __DIR__ . '/../src/config/db.php';

$uploadDir = __DIR__ . '/uploads/';
$uploadUrlPath = 'uploads/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$pdo->exec("
    CREATE TABLE IF NOT EXISTS gallery_images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        imageUrl VARCHAR(255) NOT NULL,
        alt_text VARCHAR(255) DEFAULT '',
        sort_order INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
");

$message = '';
$error = '';

// ——— Suppression ———
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_gallery_image'], $_POST['id'])) {
    $id = (int) $_POST['id'];
    if ($id > 0) {
        $stmt = $pdo->prepare("SELECT imageUrl FROM gallery_images WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $pdo->prepare("DELETE FROM gallery_images WHERE id = ?")->execute([$id]);
        if ($row && !empty($row['imageUrl']) && is_file(__DIR__ . '/' . $row['imageUrl'])) {
            @unlink(__DIR__ . '/' . $row['imageUrl']);
        }
        header('Location: admin-gallery.php?deleted=1');
        exit;
    }
}

// ——— Ajout (une ou plusieurs images) ———
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_gallery_images'])) {
    $files = $_FILES['images'] ?? [];
    if (empty($files['name']) || (is_array($files['name']) && count(array_filter($files['name'])) === 0)) {
        $error = 'Veuillez sélectionner au moins une image.';
    } else {
        // Normaliser en tableaux indexés (PHP envoie name, tmp_name, error, etc. par clé)
        $names = is_array($files['name']) ? array_values($files['name']) : [$files['name']];
        $tmpNames = is_array($files['tmp_name']) ? array_values($files['tmp_name']) : [$files['tmp_name']];
        $errors = isset($files['error']) && is_array($files['error']) ? array_values($files['error']) : (isset($files['error']) ? [(int) $files['error']] : []);
        $n = max(count($names), count($tmpNames));
        while (count($errors) < $n) {
            $errors[] = UPLOAD_ERR_OK;
        }

        $allowed = [
            'image/jpeg', 'image/pjpeg', 'image/png', 'image/gif', 'image/webp',
            'image/svg+xml', 'image/bmp', 'image/x-ms-bmp', 'image/x-icon', 'image/vnd.microsoft.icon',
            'image/tiff', 'image/avif', 'image/heic', 'image/x-heic',
        ];
        $mimeToExt = [
            'image/jpeg' => 'jpg', 'image/pjpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif',
            'image/webp' => 'webp', 'image/svg+xml' => 'svg', 'image/bmp' => 'bmp', 'image/x-ms-bmp' => 'bmp',
            'image/x-icon' => 'ico', 'image/vnd.microsoft.icon' => 'ico',
            'image/tiff' => 'tiff', 'image/avif' => 'avif', 'image/heic' => 'heic', 'image/x-heic' => 'heic',
        ];
        $added = 0;
        $skipped = 0;
        $maxOrder = (int) $pdo->query("SELECT COALESCE(MAX(sort_order), 0) FROM gallery_images")->fetchColumn();

        for ($i = 0; $i < $n; $i++) {
            $name = $names[$i] ?? '';
            $tmp = $tmpNames[$i] ?? '';
            $err = (int) ($errors[$i] ?? UPLOAD_ERR_OK);

            if ($name === '' && $tmp === '') continue;
            if ($err !== UPLOAD_ERR_OK) {
                $skipped++;
                continue;
            }
            if ($tmp === '' || !is_uploaded_file($tmp)) {
                $skipped++;
                continue;
            }

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($tmp);
            if (!in_array($mime, $allowed, true)) {
                $skipped++;
                continue;
            }

            $ext = $mimeToExt[$mime] ?? (pathinfo($name, PATHINFO_EXTENSION) ?: 'jpg');
            if ($ext === '') $ext = 'jpg';
            $uniqueName = 'gallery_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
            $destination = $uploadDir . $uniqueName;
            if (move_uploaded_file($tmp, $destination)) {
                $stmt = $pdo->prepare("INSERT INTO gallery_images (imageUrl, alt_text, sort_order) VALUES (?, ?, ?)");
                $stmt->execute([$uploadUrlPath . $uniqueName, '', $maxOrder + 1 + $added]);
                $added++;
            } else {
                $skipped++;
            }
        }

        if ($added > 0) {
            $query = 'added=' . $added;
            if ($skipped > 0) {
                $query .= '&skipped=' . (int) $skipped;
            }
            header('Location: admin-gallery.php?' . $query);
            exit;
        }
        if ($added === 0 && (count(array_filter($names)) > 0 || $skipped > 0)) {
            $error = 'Aucune image n\'a pu être enregistrée. Vérifiez les types (JPG, PNG, GIF, WebP, etc.) et les limites PHP (taille max, nombre de fichiers).';
        }
    }
}

$stmt = $pdo->query("SELECT id, imageUrl, alt_text, sort_order, created_at FROM gallery_images ORDER BY sort_order ASC, created_at ASC");
$galleryImages = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['added'])) {
    $n = (int) $_GET['added'];
    $skipped = (int) ($_GET['skipped'] ?? 0);
    $message = $n > 1 ? $n . ' images ajoutées à la galerie.' : 'Image ajoutée à la galerie.';
    if ($skipped > 0) {
        $message .= ' ' . $skipped . ' image(s) non enregistrée(s) (limite serveur ou type non accepté). Si beaucoup manquent, ajoutez par lots de 15–20.';
    }
}
if (isset($_GET['deleted']) && $_GET['deleted'] === '1') {
    $message = 'Image retirée de la galerie.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Administration Galerie – AFRICIA TECH</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/faveicon.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/faveicon.png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-50 text-gray-800 min-h-screen font-sans">

    <header class="bg-[#001c37] text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-2">
            <h1 class="text-xl font-bold">Administration – Galerie</h1>
            <nav class="flex items-center gap-4">
                <a href="admin.php" class="text-white/90 hover:text-yellow-400 text-sm font-medium">Produits</a>
                <a href="index.php" class="text-yellow-400 hover:text-yellow-300 text-sm font-medium">← Retour au site</a>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <?php if ($message): ?>
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-800 rounded-xl" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-800 rounded-xl" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'ajout (plusieurs images) -->
        <section class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-10">
            <h2 class="text-2xl font-bold text-[#001c37] mb-6 flex items-center gap-2">
                <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Ajouter des images à la galerie
            </h2>
            <form id="form-gallery-add" action="admin-gallery.php" method="post" enctype="multipart/form-data" class="space-y-5">
                <input type="hidden" name="add_gallery_images" value="1" />
                <div>
                    <label for="images" class="block text-sm font-semibold text-gray-700 mb-1">Images (une ou plusieurs) *</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple
                           class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-[#001c37] file:text-white file:font-semibold file:cursor-pointer hover:file:bg-[#003366]" />
                    <p class="mt-1 text-xs text-gray-500">Tous types d'images (JPG, PNG, GIF, WebP, SVG, BMP, ICO, TIFF, AVIF, HEIC…). Sélectionnez plusieurs fichiers si besoin.</p>
                </div>
                <!-- Aperçu des images sélectionnées : retirer avant d'enregistrer -->
                <div id="gallery-preview-wrap" class="hidden">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Aperçu — vous pouvez retirer une image avant d'enregistrer :</p>
                    <div id="gallery-preview-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3"></div>
                </div>
                <button type="submit" id="btn-submit-gallery" disabled class="px-6 py-3 bg-[#001c37] text-white font-bold rounded-xl hover:bg-yellow-500 hover:text-[#001c37] transition-colors duration-300 inline-flex items-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                    Enregistrer les images
                </button>
            </form>
        </section>

        <!-- Liste des images de la galerie -->
        <section class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h2 class="text-2xl font-bold text-[#001c37] mb-6">Images de la galerie (<?= count($galleryImages) ?>)</h2>

            <?php if (count($galleryImages) === 0): ?>
                <div class="py-16 flex flex-col items-center justify-center text-gray-500">
                    <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-lg font-medium">Aucune image dans la galerie</p>
                    <p class="text-sm mt-1">Les images ajoutées ci-dessus apparaîtront ici et sur la section Galerie de la page d'accueil.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    <?php foreach ($galleryImages as $img): ?>
                        <div class="relative group rounded-xl overflow-hidden border border-gray-200 bg-gray-50">
                            <img src="/<?= htmlspecialchars($img['imageUrl']) ?>" alt="<?= htmlspecialchars($img['alt_text']) ?>" class="w-full aspect-square object-cover" loading="lazy" />
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-2">
                                <form method="post" action="admin-gallery.php" class="inline" onsubmit="return confirm('Retirer cette image de la galerie ?');">
                                    <input type="hidden" name="delete_gallery_image" value="1" />
                                    <input type="hidden" name="id" value="<?= (int) $img['id'] ?>" />
                                    <button type="submit" class="px-3 py-1.5 text-sm font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors">
                                        Retirer de la galerie
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <script>
    (function() {
        var input = document.getElementById('images');
        var wrap = document.getElementById('gallery-preview-wrap');
        var list = document.getElementById('gallery-preview-list');
        var btnSubmit = document.getElementById('btn-submit-gallery');
        var form = document.getElementById('form-gallery-add');

        if (!input || !list) return;

        var selectedFiles = [];

        function isImageType(file) {
            return file.type && file.type.indexOf('image/') === 0;
        }

        function renderPreviews() {
            list.innerHTML = '';
            if (selectedFiles.length === 0) {
                wrap.classList.add('hidden');
                input.value = '';
                if (btnSubmit) btnSubmit.disabled = true;
                return;
            }
            wrap.classList.remove('hidden');
            if (btnSubmit) btnSubmit.disabled = false;

            selectedFiles.forEach(function(file, index) {
                var card = document.createElement('div');
                card.className = 'relative rounded-xl overflow-hidden border border-gray-200 bg-gray-100 aspect-square';
                var url = URL.createObjectURL(file);
                var img = document.createElement('img');
                img.src = url;
                img.alt = file.name;
                img.className = 'w-full h-full object-cover';
                img.onload = function() { URL.revokeObjectURL(url); };
                img.onerror = function() { URL.revokeObjectURL(url); };
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'absolute top-1 right-1 w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center hover:bg-red-700 transition-colors text-sm font-bold';
                btn.title = 'Retirer';
                btn.innerHTML = '×';
                btn.setAttribute('data-index', index);
                card.appendChild(img);
                card.appendChild(btn);
                list.appendChild(card);
            });

            list.querySelectorAll('button[data-index]').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var index = parseInt(btn.getAttribute('data-index'), 10);
                    selectedFiles.splice(index, 1);
                    syncInputToFiles();
                    renderPreviews();
                });
            });
        }

        function syncInputToFiles() {
            if (selectedFiles.length === 0) {
                input.value = '';
                return;
            }
            var dt = new DataTransfer();
            selectedFiles.forEach(function(f) { dt.items.add(f); });
            input.files = dt.files;
        }

        input.addEventListener('change', function() {
            var files = this.files;
            selectedFiles = [];
            for (var i = 0; i < files.length; i++) {
                if (isImageType(files[i])) selectedFiles.push(files[i]);
            }
            syncInputToFiles();
            renderPreviews();
        });

        form.addEventListener('submit', function(e) {
            if (selectedFiles.length === 0) {
                e.preventDefault();
                return false;
            }
            syncInputToFiles();
            // Laisser le navigateur mettre à jour input.files avant envoi (évite de perdre des fichiers)
            e.preventDefault();
            setTimeout(function() {
                form.submit();
            }, 50);
        });

        renderPreviews();
    })();
    </script>
</body>
</html>
