<?php
/**
 * Configuration applicative – base URL et chemins pour le site.
 * Permet de faire fonctionner les assets et les URLs canoniques
 * même si le projet est déployé dans un sous-dossier.
 */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '/');
$basePath = ($scriptDir === '/' || $scriptDir === '' || $scriptDir === '.') ? '' : rtrim($scriptDir, '/');
$baseUrl = $protocol . '://' . $host . $basePath;
$assetsPath = $basePath . '/assets';
$imagesPath = $assetsPath . '/images';
