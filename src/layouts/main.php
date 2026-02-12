<?php
require_once __DIR__ . '/../config/app.php';
?>
<!doctype html>
<html lang="fr">

<head>
    <?php require __DIR__ . '/../components/head.php'; ?>
</head>

<body class="font-sans text-gray-800 scroll-smooth">

    <?php
    $currentPage = isset($currentPage) ? $currentPage : 'accueil';
    require __DIR__ . '/../components/header.php';
    ?>

    <main id="main-content">
