#!/bin/bash

# Afficher un message d'accueil
echo "========================================"
echo "   Démarrage du script d'installation   "
echo "========================================"
echo ""

# Installer les dépendances PHP avec Composer
echo "🔄 Installation des dépendances PHP avec Composer..."
composer install
echo "✅ Dépendances PHP installées."
echo ""

# Installer les dépendances JavaScript avec npm
echo "🔄 Installation des dépendances JavaScript avec npm..."
npm install
echo "✅ Dépendances JavaScript installées."
echo ""

# Copier le fichier d'exemple d'environnement
echo "📄 Copie du fichier d'exemple d'environnement..."
cp .env.example .env
echo "✅ Fichier d'environnement copié."
echo ""

# Générer la clé d'application
echo "🔑 Génération de la clé d'application..."
php artisan key:generate
echo "✅ Clé d'application générée."
echo ""

# Exécuter les migrations de la base de données
echo "🏗️ Exécution des migrations de la base de données..."
php artisan migrate
echo "✅ Migrations exécutées."
echo ""

# Remplir la base de données avec des données de test
echo "🌱 Remplissage de la base de données avec des données de test..."
php artisan db:seed
echo "✅ Base de données remplie."
echo ""

# Afficher un message de fin
echo "========================================"
echo "   Installation terminée avec succès!   "
echo "========================================"
