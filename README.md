# PHP-POO-UserCRUD

{  
Un petit projet CRUD en PHP orienté objet pour gérer des utilisateurs (Create, Read, Update, Delete).  
Ce projet inclut : une simple API web via des pages PHP dans le dossier `public/`, un modèle `User` et un `UserRepository` pour accéder à la base de données.  
}

## Fonctionnalités

- Liste des utilisateurs (affichage, photo de profil si présente)
- Création d'un utilisateur (upload d'image possible)
- Édition d'un utilisateur
- Suppression d'un utilisateur

## Prérequis

- PHP 8+ avec PDO et extensions web courantes
- Composer
- MySQL (ou compatible)

## Installation

1. Cloner le dépôt / copier les fichiers dans votre répertoire de travail.
2. Installer les dépendances :

```sh
composer install
```

3. Configurer la base de données (voir section suivante).
4. Lancer le serveur PHP intégré pour développement :

```sh
php -S localhost:8000 -t public
```

Puis ouvrir http://localhost:8000

## Configuration de la base de données

Par défaut, les paramètres sont définis dans [`src/Config/Database.php`](src/Config/Database.php). Modifiez-les pour correspondre à votre environnement (host, username, password, dbname) ou adaptez le code pour utiliser `.env` via `vlucas/phpdotenv`.

Exemple de table `users` (MySQL) :

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  media_object VARCHAR(255) DEFAULT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  last_connection DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Structure du projet (fichiers importants)

- Interface web (pages publiques) :

  - [public/index.php](public/index.php) — liste des utilisateurs
  - [public/addUser.php](public/addUser.php) — formulaire d'ajout (+ upload)
  - [public/editUser.php](public/editUser.php) — formulaire d'édition
  - [public/deleteUser.php](public/deleteUser.php) — suppression

- Modèles et accès aux données :

  - [`App\Models\User`](src/Models/User.php) — modèle utilisateur
  - [`App\Models\UserRepository`](src/Models/UserRepository.php) — accès PDO à la table `users`
  - [`App\Config\Database`](src/Config/Database.php) — gestion de la connexion PDO

- Exemples POO pédagogiques : `exemplesPOO/` (héritage, encapsulation, polymorphisme, etc.)

## Sécurité & améliorations recommandées

- Hacher les mots de passe avant stockage : utilisez `password_hash()` pour créer le hash et `password_verify()` pour vérifier.
- Valider / assainir toutes les entrées utilisateurs (XSS/SQL).
- Limiter et contrôler les types et tailles de fichiers uploadés.
- Utiliser des requêtes préparées (déjà en place dans `UserRepository`) et gérer les erreurs.
- Externaliser la configuration (fichier `.env`) au lieu d'avoir les credentials en dur.
- Implémenter pagination, recherche, tri et gestion des sessions/authentification.

## Notes rapides

- Les uploads sont stockés dans `public/uploads` (assurez-vous que ce dossier est accessible en écriture).
- Le projet utilise l'autoload PSR-4 défini dans `composer.json`.

---

Pour lire ou modifier les fichiers mentionnés :

- [`App\Models\UserRepository`](src/Models/UserRepository.php) — [src/Models/UserRepository.php](src/Models/UserRepository.php)
- [`App\Models\User`](src/Models/User.php) — [src/Models/User.php](src/Models/User.php)
- [`App\Config\Database`](src/Config/Database.php) — [src/Config/Database.php](src/Config/Database.php)
- Pages publiques : [public/index.php](public/index.php), [public/addUser.php](public/addUser.php), [public/editUser.php](public/editUser.php), [public/deleteUser.php](public/deleteUser.php)

Si vous souhaitez, je peux appliquer un exemple de hashing de mot de passe, corriger l'upload dans `public/addUser.php` (il contient actuellement des variables non initialisées) ou ajouter un fichier `.env` et l'intégration `vlucas/phpdotenv`.
