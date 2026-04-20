# Africa Tech - Quickstart local

Projet PHP avec dossier public `public/` et connexion MySQL via `src/config/db.php`.

## 1) Prerequis

- PHP 8.x (`php -v`)
- MySQL/MariaDB demarre
- Extension PDO MySQL active (`php -m | rg pdo_mysql`)

## 2) Configuration environnement

Copier le fichier d'exemple puis adapter les valeurs:

```bash
cp .env.example .env
```

Variables attendues:

- `DB_HOST`
- `DB_NAME`
- `DB_USER`
- `DB_PASSWORD`
- `DB_CHARSET` (ex: `utf8mb4`)

## 3) Creer la base de donnees

Exemple minimal:

```sql
CREATE DATABASE africa_tech CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Puis verifier que `DB_NAME` dans `.env` correspond bien au nom de la base.

## 4) Lancer le projet en local

Depuis la racine du projet:

```bash
php -S localhost:8000 -t public public/router.php
```

Ouvrir ensuite:

- `http://localhost:8000`
- `http://localhost:8000/admin` (interface admin)

Le routeur local applique aussi les URLs propres:

- `http://localhost:8000/about` au lieu de `about.php`
- redirection automatique de `*.php` vers l'URL sans extension

## 5) Structure utile

- `public/` : point d'entree web (pages, assets, API)
- `src/config/app.php` : configuration app + langue
- `src/config/db.php` : chargement `.env` + connexion PDO MySQL

## 6) Depannage rapide

- **Erreur connexion BDD**: verifier MySQL, credentials `.env`, et existence de la base.
- **Page blanche / erreur PHP**: lancer le serveur dans un terminal et lire les logs d'erreur affiches.
- **Assets introuvables**: verifier l'URL utilisee (`localhost:8000`) et que le serveur pointe bien sur `public/`.
