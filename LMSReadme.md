
# EXECUTION DU PROJET

## Récupération du projet
git clone git@github.com:Ashley-23/LMS.git
ou
dézipper le fichier envoyé

## Configuration de l'environnement

Exécuter la commande : cp .env.example .env

Le fichier .env.example contient toutes les informations nécessaires à la connexion avec la base de donnée.

Exécuter la commande : php artisan key:generate

Elle vous permettra de générer une clef d'application unique pour le chiffrement des données.

## Installation des dépendances PHP

composer install

## Installation des dependances fronts (vite & tailwind)

Exécuter les commandes
* npm install
  et
* npm run build 

## Lancement de l'application 

Il vous suffit de lancer la commance php artisan serve et de suivre le lien qui s'affiche dans la console






