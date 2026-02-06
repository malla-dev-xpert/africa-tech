<?php
/**
 * Administration – Gestion des produits (ajout, affichage, pagination)
 * Attributs alignés sur la section produits : nom, description, prix, imageUrl.
 */
require __DIR__ . '/../src/config/db.php';

const PER_PAGE = 20;
$uploadDir = __DIR__ . '/uploads/';
$uploadUrlPath = 'uploads/'; // chemin relatif stocké en BDD

// Création du dossier uploads si besoin
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Création de la table si elle n'existe pas (même structure que les produits statiques)
$pdo->exec("
    CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        price VARCHAR(100) NOT NULL,
        imageUrl VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
");

$message = '';
$error = '';

// ——— Traitement suppression ———
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'], $_POST['id'])) {
    $id = (int) $_POST['id'];
    if ($id > 0) {
        $stmt = $pdo->prepare("SELECT imageUrl FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        if ($row && $row['imageUrl'] && is_file(__DIR__ . '/' . $row['imageUrl'])) {
            @unlink(__DIR__ . '/' . $row['imageUrl']);
        }
        header('Location: admin.php?page=' . max(1, (int) ($_GET['page'] ?? 1)) . '&deleted=1');
        exit;
    }
}

// ——— Traitement modification ———
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'], $_POST['id'])) {
    $id = (int) $_POST['id'];
    $name = trim((string) ($_POST['name'] ?? ''));
    $description = trim((string) ($_POST['description'] ?? ''));
    $price = trim((string) ($_POST['price'] ?? ''));
    if ($id > 0 && $name !== '' && $price !== '') {
        $stmt = $pdo->prepare("SELECT imageUrl FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $current = $stmt->fetch(PDO::FETCH_ASSOC);
        $imageUrl = $current['imageUrl'] ?? '';
        if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['image']['tmp_name']);
            $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (in_array($mime, $allowed, true)) {
                $ext = match ($mime) {
                    'image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp', default => 'jpg',
                };
                $uniqueName = 'prod_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                $destination = $uploadDir . $uniqueName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    if ($current && $current['imageUrl'] && is_file(__DIR__ . '/' . $current['imageUrl'])) {
                        @unlink(__DIR__ . '/' . $current['imageUrl']);
                    }
                    $imageUrl = $uploadUrlPath . $uniqueName;
                }
            }
        }
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, imageUrl = ? WHERE id = ?");
        $stmt->execute([$name, $description, $price, $imageUrl, $id]);
        header('Location: admin.php?page=' . max(1, (int) ($_GET['page'] ?? 1)) . '&updated=1');
        exit;
    } else {
        $error = 'Nom et prix obligatoires pour la modification.';
    }
}

// ——— Traitement du formulaire d'ajout ———
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = trim((string) ($_POST['name'] ?? ''));
    $description = trim((string) ($_POST['description'] ?? ''));
    $price = trim((string) ($_POST['price'] ?? ''));

    if ($name === '' || $price === '') {
        $error = 'Le nom et le prix sont obligatoires.';
    } elseif (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        $error = 'Veuillez sélectionner une image.';
    } else {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['image']['tmp_name']);
        $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($mime, $allowed, true)) {
            $error = 'Type de fichier non autorisé. Utilisez JPG, PNG, GIF ou WebP.';
        } else {
            $ext = match ($mime) {
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp',
                default => 'jpg',
            };
            $uniqueName = 'prod_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
            $destination = $uploadDir . $uniqueName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $imageUrl = $uploadUrlPath . $uniqueName;
                $stmt = $pdo->prepare("INSERT INTO products (name, description, price, imageUrl) VALUES (?, ?, ?, ?)");
                $stmt->execute([$name, $description, $price, $imageUrl]);
                $message = 'Produit ajouté avec succès.';
                header('Location: admin.php?page=1&added=1');
                exit;
            }
            $error = 'Erreur lors de l\'enregistrement de l\'image.';
        }
    }
}

// ——— Pagination ———
$page = max(1, (int) ($_GET['page'] ?? 1));
$offset = ($page - 1) * PER_PAGE;

$countStmt = $pdo->query("SELECT COUNT(*) FROM products");
$totalProducts = (int) $countStmt->fetchColumn();
$totalPages = max(1, (int) ceil($totalProducts / PER_PAGE));
$page = min($page, $totalPages);
$offset = ($page - 1) * PER_PAGE;

$stmt = $pdo->prepare("SELECT id, name, description, price, imageUrl, created_at FROM products ORDER BY created_at DESC LIMIT " . PER_PAGE . " OFFSET " . $offset);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['added']) && $_GET['added'] === '1') {
    $message = 'Produit ajouté avec succès.';
}
if (isset($_GET['updated']) && $_GET['updated'] === '1') {
    $message = 'Produit modifié avec succès.';
}
if (isset($_GET['deleted']) && $_GET['deleted'] === '1') {
    $message = 'Produit supprimé.';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administration Produits – AFRICIA TECH</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-50 text-gray-800 min-h-screen font-sans">

    <header class="bg-[#001c37] text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-xl font-bold">Administration – Produits</h1>
            <a href="index.php" class="text-yellow-400 hover:text-yellow-300 text-sm font-medium">← Retour au site</a>
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

        <!-- Formulaire d'ajout -->
        <section class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-10">
            <h2 class="text-2xl font-bold text-[#001c37] mb-6 flex items-center gap-2">
                <svg class="w-7 h-7 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Ajouter un produit
            </h2>
            <form id="form-add-product" action="admin.php" method="post" enctype="multipart/form-data" class="space-y-5">
                <input type="hidden" name="add_product" value="1" />
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nom du produit *</label>
                            <input type="text" id="name" name="name" required
                                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                                   class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 outline-none" />
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Prix (ex: 85 000 FCFA) *</label>
                            <input type="text" id="price" name="price" required placeholder="85 000 FCFA"
                                   value="<?= htmlspecialchars($_POST['price'] ?? '') ?>"
                                   class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 outline-none" />
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                            <textarea id="description" name="description" rows="3" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-500 outline-none resize-none"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                        </div>
                        <div>
                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Image *</label>
                            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp" required
                                   class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-[#001c37] file:text-white file:font-semibold file:cursor-pointer hover:file:bg-[#003366]" />
                            <p class="mt-1 text-xs text-gray-500">JPG, PNG, GIF ou WebP. Nom unique généré automatiquement.</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="block text-sm font-semibold text-gray-700 mb-2">Aperçu de l'image</span>
                        <div id="image-preview" class="w-full max-w-sm aspect-video bg-gray-100 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                            <span id="image-preview-placeholder" class="text-gray-400 text-sm">Aucune image sélectionnée</span>
                            <img id="image-preview-img" src="" alt="" class="hidden w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
                <button type="submit" id="btn-submit-add" class="px-6 py-3 bg-[#001c37] text-white font-bold rounded-xl hover:bg-yellow-500 hover:text-[#001c37] transition-colors duration-300 inline-flex items-center gap-2 min-w-[200px] justify-center">
                    <span class="btn-add-text">Enregistrer le produit</span>
                    <span class="btn-add-loader hidden items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Enregistrement...
                    </span>
                </button>
            </form>
        </section>

        <!-- Liste des produits -->
        <section class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-bold text-[#001c37]">Liste des produits (<?= $totalProducts ?>)</h2>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Affichage :</span>
                    <button type="button" id="view-grid" aria-pressed="true" class="p-2 rounded-lg bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition-colors" title="Grille">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    </button>
                    <button type="button" id="view-list" aria-pressed="false" class="p-2 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors" title="Liste">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>

            <?php if (count($products) === 0): ?>
                <div id="products-empty" class="py-16 flex flex-col items-center justify-center text-gray-500">
                    <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <p class="text-lg font-medium">Aucun produit trouvé</p>
                    <p class="text-sm mt-1">Ajoutez un produit avec le formulaire ci-dessus.</p>
                </div>
                <div id="products-container" class="hidden"></div>
            <?php else: ?>
                <div id="products-empty" class="hidden"></div>
                <div id="products-container" class="products-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($products as $p): ?>
                        <article class="product-card bg-slate-50 rounded-xl border border-gray-200 overflow-hidden flex flex-col" data-id="<?= (int) $p['id'] ?>" data-name="<?= htmlspecialchars($p['name']) ?>" data-description="<?= htmlspecialchars($p['description'] ?? '') ?>" data-price="<?= htmlspecialchars($p['price']) ?>" data-imageurl="/<?= htmlspecialchars($p['imageUrl']) ?>">
                            <div class="relative h-44 overflow-hidden bg-gradient-to-br from-[#001c37] to-[#003366] flex-shrink-0">
                                <img src="/<?= htmlspecialchars($p['imageUrl']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="w-full h-full object-cover" loading="lazy" />
                            </div>
                            <div class="p-4 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-[#001c37] mb-1"><?= htmlspecialchars($p['name']) ?></h3>
                                <p class="text-sm text-gray-500 flex-1 line-clamp-2"><?= htmlspecialchars($p['description'] ?? '') ?></p>
                                <p class="text-lg font-bold text-yellow-600 mt-2"><?= htmlspecialchars($p['price']) ?></p>
                                <div class="flex flex-wrap gap-2 mt-3">
                                    <button type="button" class="btn-edit-product px-3 py-1.5 text-sm font-medium rounded-lg bg-[#001c37] text-white hover:bg-yellow-500 hover:text-[#001c37] transition-colors" data-id="<?= (int) $p['id'] ?>">Modifier</button>
                                    <button type="button" class="btn-delete-product px-3 py-1.5 text-sm font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors" data-id="<?= (int) $p['id'] ?>" data-name="<?= htmlspecialchars($p['name']) ?>">Supprimer</button>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($totalPages > 1): ?>
                <nav class="mt-8 flex flex-wrap items-center justify-center gap-2" aria-label="Pagination">
                    <a href="admin.php?page=<?= $page - 1 ?>" class="px-4 py-2 rounded-xl border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none <?= $page <= 1 ? 'invisible' : '' ?>">
                        Précédent
                    </a>
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="admin.php?page=<?= $i ?>" class="min-w-[2.5rem] px-3 py-2 rounded-xl border font-medium text-center <?= $i === $page ? 'bg-[#001c37] text-white border-[#001c37]' : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                    <a href="admin.php?page=<?= $page + 1 ?>" class="px-4 py-2 rounded-xl border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none <?= $page >= $totalPages ? 'invisible' : '' ?>">
                        Suivant
                    </a>
                </nav>
            <?php endif; ?>
        </section>

        <!-- Formulaire caché pour suppression (confirmée en JS) -->
        <form id="form-delete-product" action="admin.php" method="post" class="hidden">
            <input type="hidden" name="delete_product" value="1" />
            <input type="hidden" name="id" id="delete-product-id" value="" />
        </form>

        <!-- Modal Modifier un produit -->
        <div id="modal-edit" class="fixed inset-0 z-50 hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/50" id="modal-edit-backdrop"></div>
            <div class="relative flex min-h-full items-center justify-center p-4">
                <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-xl border border-gray-200 max-h-[90vh] overflow-y-auto">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-[#001c37] mb-4">Modifier le produit</h3>
                        <form id="form-edit-product" action="admin.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="update_product" value="1" />
                            <input type="hidden" name="id" id="edit-product-id" value="" />
                            <div class="space-y-4">
                                <div>
                                    <label for="edit-name" class="block text-sm font-semibold text-gray-700 mb-1">Nom *</label>
                                    <input type="text" id="edit-name" name="name" required class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 outline-none" />
                                </div>
                                <div>
                                    <label for="edit-price" class="block text-sm font-semibold text-gray-700 mb-1">Prix *</label>
                                    <input type="text" id="edit-price" name="price" required class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 outline-none" />
                                </div>
                                <div>
                                    <label for="edit-description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                                    <textarea id="edit-description" name="description" rows="3" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 focus:ring-2 focus:ring-yellow-400 outline-none resize-none"></textarea>
                                </div>
                                <div>
                                    <label for="edit-image" class="block text-sm font-semibold text-gray-700 mb-1">Nouvelle image (optionnel)</label>
                                    <input type="file" id="edit-image" name="image" accept="image/jpeg,image/png,image/gif,image/webp" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-[#001c37] file:text-white file:font-semibold" />
                                    <p class="mt-1 text-xs text-gray-500">Laisser vide pour garder l'image actuelle.</p>
                                </div>
                                <div>
                                    <span class="block text-sm font-semibold text-gray-700 mb-2">Aperçu</span>
                                    <div id="edit-image-preview" class="w-full max-w-xs aspect-video bg-gray-100 rounded-xl border border-gray-300 overflow-hidden flex items-center justify-center">
                                        <img id="edit-image-preview-img" src="" alt="" class="w-full h-full object-cover hidden" />
                                        <span id="edit-image-preview-placeholder" class="text-gray-400 text-sm">Image actuelle</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-6">
                                <button type="submit" id="btn-submit-edit" class="px-4 py-2.5 bg-[#001c37] text-white font-bold rounded-xl hover:bg-yellow-500 hover:text-[#001c37] transition-colors inline-flex items-center gap-2">
                                    <span class="btn-edit-text">Enregistrer</span>
                                    <span class="btn-edit-loader hidden items-center gap-2">
                                        <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        Enregistrement...
                                    </span>
                                </button>
                                <button type="button" id="modal-edit-close" class="px-4 py-2.5 border border-gray-300 rounded-xl font-medium text-gray-700 hover:bg-gray-50">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        (function () {
            // ——— Loader bouton Enregistrer (ajout) ———
            var formAdd = document.getElementById('form-add-product');
            var btnAdd = document.getElementById('btn-submit-add');
            if (formAdd && btnAdd) {
                formAdd.addEventListener('submit', function () {
                    var text = btnAdd.querySelector('.btn-add-text');
                    var loader = btnAdd.querySelector('.btn-add-loader');
                    if (text) text.classList.add('hidden');
                    if (loader) { loader.classList.remove('hidden'); loader.classList.add('inline-flex'); }
                    btnAdd.disabled = true;
                });
            }

            // ——— Aperçu image instantané (formulaire ajout) ———
            var input = document.getElementById('image');
            var placeholder = document.getElementById('image-preview-placeholder');
            var img = document.getElementById('image-preview-img');
            var box = document.getElementById('image-preview');

            if (input && box) {
                input.addEventListener('change', function () {
                    var file = this.files && this.files[0];
                    if (file && file.type.indexOf('image/') === 0) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            if (placeholder) placeholder.classList.add('hidden');
                            if (img) {
                                img.src = e.target.result;
                                img.alt = file.name;
                                img.classList.remove('hidden');
                            }
                        };
                        reader.readAsDataURL(file);
                    } else {
                        if (placeholder) placeholder.classList.remove('hidden');
                        if (img) {
                            img.src = '';
                            img.classList.add('hidden');
                        }
                    }
                });
            }

            // ——— Modal Modifier + aperçu image édition ———
            var modalEdit = document.getElementById('modal-edit');
            var editId = document.getElementById('edit-product-id');
            var editName = document.getElementById('edit-name');
            var editPrice = document.getElementById('edit-price');
            var editDesc = document.getElementById('edit-description');
            var editImageInput = document.getElementById('edit-image');
            var editPreviewImg = document.getElementById('edit-image-preview-img');
            var editPreviewPlaceholder = document.getElementById('edit-image-preview-placeholder');
            var formEdit = document.getElementById('form-edit-product');
            var btnSubmitEdit = document.getElementById('btn-submit-edit');

            function openEditModal(id, name, description, price, imageUrl) {
                if (editId) editId.value = id;
                if (editName) editName.value = name || '';
                if (editPrice) editPrice.value = price || '';
                if (editDesc) editDesc.value = description || '';
                if (editImageInput) editImageInput.value = '';
                if (editPreviewImg) {
                    editPreviewImg.src = imageUrl || '';
                    editPreviewImg.classList.toggle('hidden', !imageUrl);
                }
                if (editPreviewPlaceholder) editPreviewPlaceholder.classList.toggle('hidden', !!imageUrl);
                if (modalEdit) modalEdit.classList.remove('hidden');
            }

            function closeEditModal() {
                if (modalEdit) modalEdit.classList.add('hidden');
            }

            document.querySelectorAll('.btn-edit-product').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var card = this.closest('.product-card');
                    if (!card) return;
                    openEditModal(
                        card.getAttribute('data-id'),
                        card.getAttribute('data-name'),
                        card.getAttribute('data-description'),
                        card.getAttribute('data-price'),
                        card.getAttribute('data-imageurl')
                    );
                });
            });

            if (document.getElementById('modal-edit-backdrop')) document.getElementById('modal-edit-backdrop').addEventListener('click', closeEditModal);
            if (document.getElementById('modal-edit-close')) document.getElementById('modal-edit-close').addEventListener('click', closeEditModal);

            if (editImageInput && editPreviewImg && editPreviewPlaceholder) {
                editImageInput.addEventListener('change', function () {
                    var file = this.files && this.files[0];
                    if (file && file.type.indexOf('image/') === 0) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            editPreviewImg.src = e.target.result;
                            editPreviewImg.alt = file.name;
                            editPreviewImg.classList.remove('hidden');
                            editPreviewPlaceholder.classList.add('hidden');
                        };
                        reader.readAsDataURL(file);
                    } else {
                        editPreviewImg.src = '';
                        editPreviewImg.classList.add('hidden');
                        editPreviewPlaceholder.classList.remove('hidden');
                    }
                });
            }

            if (formEdit && btnSubmitEdit) {
                formEdit.addEventListener('submit', function () {
                    var text = btnSubmitEdit.querySelector('.btn-edit-text');
                    var loader = btnSubmitEdit.querySelector('.btn-edit-loader');
                    if (text) text.classList.add('hidden');
                    if (loader) { loader.classList.remove('hidden'); loader.classList.add('inline-flex'); }
                    btnSubmitEdit.disabled = true;
                });
            }

            // ——— Suppression avec alerte ———
            var formDelete = document.getElementById('form-delete-product');
            var deleteIdInput = document.getElementById('delete-product-id');
            document.querySelectorAll('.btn-delete-product').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    var name = this.getAttribute('data-name') || 'ce produit';
                    if (!confirm('Êtes-vous sûr de vouloir supprimer le produit « ' + name + ' » ?\n\nCliquez sur OK pour supprimer, ou Annuler pour garder le produit.')) return;
                    if (deleteIdInput) deleteIdInput.value = id;
                    if (formDelete) formDelete.submit();
                });
            });
            // ——— Toggle Grille / Liste ———
            var container = document.getElementById('products-container');
            var viewGrid = document.getElementById('view-grid');
            var viewList = document.getElementById('view-list');

            function setView(mode) {
                if (!container) return;
                if (mode === 'list') {
                    container.classList.remove('grid', 'sm:grid-cols-2', 'lg:grid-cols-3', 'xl:grid-cols-5', 'gap-6');
                    container.classList.add('flex', 'flex-col', 'gap-4');
                    container.classList.add('products-list');
                    var cards = container.querySelectorAll('.product-card');
                    cards.forEach(function (card) {
                        card.classList.remove('flex-col');
                        card.classList.add('flex-row');
                        card.querySelector('div:first-child').classList.add('w-32', 'h-32', 'flex-shrink-0');
                        card.querySelector('div:first-child').classList.remove('h-44');
                    });
                    if (viewList) viewList.classList.add('bg-yellow-100', 'text-yellow-700'), viewList.classList.remove('bg-gray-100', 'text-gray-600');
                    if (viewGrid) viewGrid.classList.remove('bg-yellow-100', 'text-yellow-700'), viewGrid.classList.add('bg-gray-100', 'text-gray-600');
                    if (viewList) viewList.setAttribute('aria-pressed', 'true');
                    if (viewGrid) viewGrid.setAttribute('aria-pressed', 'false');
                } else {
                    container.classList.add('grid', 'sm:grid-cols-2', 'lg:grid-cols-3', 'xl:grid-cols-5', 'gap-6');
                    container.classList.remove('flex', 'flex-col', 'gap-4', 'products-list');
                    var cards = container.querySelectorAll('.product-card');
                    cards.forEach(function (card) {
                        card.classList.add('flex-col');
                        card.classList.remove('flex-row');
                        card.querySelector('div:first-child').classList.remove('w-32', 'h-32', 'flex-shrink-0');
                        card.querySelector('div:first-child').classList.add('h-44');
                    });
                    if (viewGrid) viewGrid.classList.add('bg-yellow-100', 'text-yellow-700'), viewGrid.classList.remove('bg-gray-100', 'text-gray-600');
                    if (viewList) viewList.classList.remove('bg-yellow-100', 'text-yellow-700'), viewList.classList.add('bg-gray-100', 'text-gray-600');
                    if (viewGrid) viewGrid.setAttribute('aria-pressed', 'true');
                    if (viewList) viewList.setAttribute('aria-pressed', 'false');
                }
            }

            if (viewGrid) viewGrid.addEventListener('click', function () { setView('grid'); });
            if (viewList) viewList.addEventListener('click', function () { setView('list'); });
        })();
    </script>
</body>
</html>
