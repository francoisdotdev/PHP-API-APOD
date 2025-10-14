# PHP-POO-UserCRUD

Petit projet CRUD en PHP orienté objet pour gérer des utilisateurs (Create, Read, Update, Delete).

## 🚀 Fonctionnalités

- Lister les utilisateurs (avec image de profil)
- Ajouter un utilisateur (upload d’image inclus)
- Modifier un utilisateur
- Supprimer un utilisateur
- Connexion / déconnexion basique via sessions

## 🧰 Prérequis

- PHP 8+
- MySQL
- Composer

## ⚙️ Installation

1. Cloner le dépôt :
   ```bash
   git clone
   cd PHP-POO-UserCRUD
   ```
2. Installer les dépendances :
   ```bash
   composer install
   ```
3. Configurer la base de données dans `Database.php`.
4. Lancer le serveur :
   ```bash
   php -S localhost:8000 -t public
   ```
5. Ouvrir [http://localhost:8000](http://localhost:8000)

## 🗄️ Exemple de table MySQL

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  image VARCHAR(255) DEFAULT NULL
);
```

## 📂 Structure du projet

- `/public` — pages accessibles via le navigateur
- `/app` — classes PHP (Auth, User, UserRepository, Database)
