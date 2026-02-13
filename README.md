# MyFirstCRUD – Mini projet CRUD PHP/MySQL

Application web développée en PHP natif permettant la gestion de liens et de commentaires avec système d’authentification et backoffice administrateur.

## Contexte

Projet réalisé dans une phase d’apprentissage du PHP procédural et de MySQL.

L’objectif était de comprendre :
- Le fonctionnement d’un CRUD complet
- La gestion des sessions
- Les relations entre tables (1-N)
- L’utilisation de PDO et des requêtes préparées
- Mettre en pratique des "INNER JOIN"
- Réaliser un backoffice administrateur

## Installation

```

1. Cloner le projet :
git clone https://github.com/Hiskalab/MyFirstCRUD-Mini-projet-CRUD-PHP-MySQL.git

2. Importer le fichier SQL dans MySQL

3. Configurer le fichier pdo.php avec vos identifiants locaux

4. Lancer le projet via Apache (XAMPP / LAMP)

5. Comptes de démonstration :
   - Admin
       - Login : admin
       - Password : admin
   - User
       - Login : user
       - Password : user

```

## Base de données

- user_ → gestion des utilisateurs
- link → stocke les liens publiés
- link_comment → commentaires associés à chaque lien

Relation :
Un lien peut posséder plusieurs commentaires (1-N).

## Sécurité

- Requêtes préparées via PDO (prévention des injections SQL)
- Hashage des mots de passe avec password_hash()
- Vérification des sessions côté serveur
- Accès administrateur restreint via contrôle de session avec Backoffice

## Compétences mises en pratique

- Connexion sécurisée à la base de données via PDO
- Requêtes préparées (prévention injection SQL)
- Gestion des sessions PHP
- Relation 1-N entre tables (link / link_comment)
- Gestion dynamique de contenu

## Limites

Ce projet a été réalisé sans architecture MVC et sans framework afin de consolider les bases du PHP natif.
