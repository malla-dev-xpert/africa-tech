<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'AFRICIA TECH - Solutions solaires, électricité, domotique et formations en énergies renouvelables au Mali.'; ?>" />
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'AFRICIA TECH'; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/animations.css">
</head>

<body class="font-sans text-gray-800 scroll-smooth">

    <?php 
    // Set default currentPage if not set
    $currentPage = isset($currentPage) ? $currentPage : 'accueil';
    require __DIR__ . '/../components/header.php'; 
    ?>
