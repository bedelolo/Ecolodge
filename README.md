# 🌴 Éco-Lodge de la Lagune

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

> Système de gestion et de réservation pour un éco-lodge au Bénin, alliant tourisme durable et technologie moderne.

## 📋 Table des Matières

- [À Propos](#-à-propos)
- [Fonctionnalités](#-fonctionnalités)
- [Technologies](#-technologies)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Utilisation](#-utilisation)
- [Structure du Projet](#-structure-du-projet)
- [Améliorations Récentes](#-améliorations-récentes)
- [Captures d'Écran](#-captures-décran)
- [Contribution](#-contribution)
- [Licence](#-licence)
- [Contact](#-contact)

---

## 🌟 À Propos

**Éco-Lodge de la Lagune** est une application web complète développée avec Laravel pour gérer un éco-lodge situé au cœur du Bénin. Le projet vise à offrir une expérience de réservation moderne et intuitive tout en mettant en valeur l'authenticité et la beauté naturelle du site.

### 🎯 Objectifs du Projet

- **Promouvoir le tourisme durable** au Bénin
- **Faciliter les réservations** en ligne avec un système moderne
- **Valoriser la culture locale** à travers le contenu et le design
- **Offrir une expérience utilisateur premium** sur tous les appareils

---

## ✨ Fonctionnalités

### 🏠 Pour les Visiteurs

- **Navigation Moderne**
  - Carrousel interactif avec flèches horizontales élégantes
  - Navigation fluide entre les différents hébergements
  - Design responsive adapté à tous les écrans

- **Système de Réservation**
  - Modal de réservation professionnel avec animations
  - Pré-remplissage automatique pour les utilisateurs connectés
  - Validation intelligente des dates et des formulaires
  - Confirmation instantanée des réservations

- **Galerie & Contenu**
  - Galerie photo interactive des hébergements
  - Blog avec articles sur la culture béninoise
  - Témoignages clients authentiques
  - Présentation détaillée des équipements

### 👤 Pour les Utilisateurs Connectés

- **Gestion de Compte**
  - Inscription et connexion sécurisées
  - Profil utilisateur personnalisable
  - Historique des réservations

- **Tableau de Bord Personnel**
  - Vue d'ensemble des réservations en cours
  - Accès rapide aux informations de contact
  - Gestion des préférences

### 🔐 Pour les Administrateurs

- **Tableau de Bord Admin**
  - Vue d'ensemble des statistiques
  - Gestion des réservations en temps réel
  - Suivi des messages clients

- **Gestion des Réservations**
  - Validation/Annulation des réservations
  - Calendrier de disponibilité
  - Notifications automatiques

- **Gestion du Contenu**
  - Ajout/Modification des hébergements
  - Gestion des articles de blog
  - Mise à jour de la galerie photo

---

## 🛠️ Technologies

### Backend
- **[Laravel 12.x](https://laravel.com)** - Framework PHP moderne
- **PHP 8.2+** - Langage de programmation
- **SQLite** - Base de données légère (configurable pour MySQL/PostgreSQL)

### Frontend
- **HTML5 & CSS3** - Structure et style
- **JavaScript (jQuery)** - Interactivité
- **Bootstrap 5** - Framework CSS responsive
- **Owl Carousel** - Carrousel d'images
- **Magnific Popup** - Lightbox pour les images

### Outils de Développement
- **Composer** - Gestionnaire de dépendances PHP
- **NPM** - Gestionnaire de paquets JavaScript
- **Vite** - Build tool moderne
- **Git** - Contrôle de version

---

## 📦 Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **Git** (optionnel)

### Vérification des Versions

```bash
# Vérifier PHP
php -v

# Vérifier Composer
composer --version

# Vérifier Node.js
node -v

# Vérifier NPM
npm -v
```

---

## 🚀 Installation

### 1. Cloner le Projet

```bash
git clone https://github.com/bedelolo/Ecolodge.git
cd Ecolodge
```

### 2. Installer les Dépendances PHP

```bash
composer install
```

### 3. Installer les Dépendances JavaScript

```bash
npm install
```

### 4. Configuration de l'Environnement

```bash
# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé d'application
php artisan key:generate
```

### 5. Configuration de la Base de Données

Le projet utilise SQLite par défaut. Le fichier de base de données sera créé automatiquement.

```bash
# Créer le fichier de base de données (si nécessaire)
touch database/database.sqlite

# Exécuter les migrations
php artisan migrate

# (Optionnel) Remplir avec des données de test
php artisan db:seed
```

### 6. Compiler les Assets

```bash
# Pour le développement
npm run dev

# Pour la production
npm run build
```

### 7. Lancer le Serveur

```bash
# Serveur de développement PHP
php -S 127.0.0.1:8000 -t public

# OU utiliser Artisan
php artisan serve
```

Accédez à l'application : **http://127.0.0.1:8000**

---

## ⚙️ Configuration

### Configuration de Base

Éditez le fichier `.env` pour personnaliser votre installation :

```env
# Application
APP_NAME="Éco-Lodge de la Lagune"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Base de données (SQLite par défaut)
DB_CONNECTION=sqlite

# Email (pour les notifications)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="contact@ecolodge.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Configuration MySQL (Optionnel)

Si vous préférez utiliser MySQL :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecolodge
DB_USERNAME=root
DB_PASSWORD=your_password
```

Puis exécutez les migrations :

```bash
php artisan migrate:fresh --seed
```

---

## 💻 Utilisation

### Accès Public

- **Page d'accueil** : `http://127.0.0.1:8000`
- **Hébergements** : `http://127.0.0.1:8000/rooms`
- **Galerie** : `http://127.0.0.1:8000/gallery`
- **Blog** : `http://127.0.0.1:8000/blog`
- **Contact** : `http://127.0.0.1:8000/contact`

### Espace Utilisateur

- **Inscription** : `http://127.0.0.1:8000/register`
- **Connexion** : `http://127.0.0.1:8000/login`
- **Mes Réservations** : `http://127.0.0.1:8000/bookings/my`

### Espace Administrateur

- **Tableau de bord** : `http://127.0.0.1:8000/admin/dashboard`
- **Gestion des réservations** : `http://127.0.0.1:8000/admin/bookings`
- **Messages** : `http://127.0.0.1:8000/admin/messages`

**Compte Admin par défaut** (après seeding) :
- Email : `admin@ecolodge.com`
- Mot de passe : `password`

---

## 📁 Structure du Projet

```
Ecolodge/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Contrôleurs de l'application
│   │   └── Middleware/       # Middlewares personnalisés
│   ├── Models/               # Modèles Eloquent
│   └── Providers/            # Service providers
├── database/
│   ├── migrations/           # Migrations de base de données
│   ├── seeders/              # Seeders pour données de test
│   └── database.sqlite       # Base de données SQLite
├── public/
│   ├── css/                  # Fichiers CSS
│   │   ├── custom-carousel.css    # Styles du carrousel
│   │   └── carousel-fix.css       # Corrections CSS
│   ├── js/                   # Fichiers JavaScript
│   │   ├── booking-modal.js       # Gestion du modal
│   │   └── theme.js               # Scripts du thème
│   └── img/                  # Images et assets
├── resources/
│   ├── views/                # Templates Blade
│   │   ├── layouts/          # Layouts principaux
│   │   ├── partials/         # Composants réutilisables
│   │   ├── auth/             # Pages d'authentification
│   │   └── admin/            # Pages administrateur
│   └── css/                  # Sources CSS
├── routes/
│   └── web.php               # Routes de l'application
├── storage/                  # Fichiers générés
├── tests/                    # Tests automatisés
├── .env.example              # Exemple de configuration
├── composer.json             # Dépendances PHP
├── package.json              # Dépendances JavaScript
└── README.md                 # Ce fichier
```

---

## 🎨 Améliorations Récentes

### Version 1.1.0 (11 Février 2026)

#### ✨ Nouvelles Fonctionnalités

**1. Carrousel de Navigation Moderne**
- Flèches horizontales élégantes (← →) au lieu de verticales
- Design circulaire avec effet de survol doré
- Navigation 100% manuelle (autoplay désactivé)
- Responsive sur tous les appareils

**2. Modal de Réservation Professionnel**
- Interface élégante avec animations fluides
- Pré-remplissage automatique des données utilisateur
- Validation intelligente des dates
- Affichage complet des équipements
- Fermeture multiple (×, ESC, clic extérieur)

**3. Améliorations UX/UI**
- Animations CSS optimisées
- Meilleure accessibilité (navigation clavier)
- Design responsive amélioré
- Performance optimisée

#### 📚 Documentation Ajoutée

- `AMELIORATIONS_CARROUSEL.md` - Documentation technique
- `GUIDE_VISUEL_AMELIORATIONS.md` - Guide visuel avec diagrammes
- `GUIDE_DEPANNAGE_CARROUSEL.md` - Solutions aux problèmes
- `RECAPITULATIF_MODIFICATIONS.md` - Liste complète des changements
- `DEMARRAGE_RAPIDE.md` - Guide de démarrage rapide

#### 🔧 Fichiers Modifiés

- `public/js/theme.js` - Configuration du carrousel
- `resources/views/layouts/master.blade.php` - Inclusion des nouveaux assets
- `resources/views/home.blade.php` - Intégration du modal
- `resources/views/rooms.blade.php` - Simplification de l'interface

Pour plus de détails, consultez le fichier `RECAPITULATIF_MODIFICATIONS.md`.

---

## 📸 Captures d'Écran

### Page d'Accueil
![Page d'accueil](docs/screenshots/home.png)

### Carrousel des Hébergements
![Carrousel](docs/screenshots/carousel.png)

### Modal de Réservation
![Modal de réservation](docs/screenshots/booking-modal.png)

### Tableau de Bord Admin
![Dashboard Admin](docs/screenshots/admin-dashboard.png)

---

## 🧪 Tests

### Exécuter les Tests

```bash
# Tous les tests
php artisan test

# Tests spécifiques
php artisan test --filter=BookingTest

# Avec couverture de code
php artisan test --coverage
```

### Tests Manuels

Consultez le fichier `DEMARRAGE_RAPIDE.md` pour un guide de test en 2 minutes.

---

## 🚀 Déploiement

### Préparation pour la Production

```bash
# 1. Optimiser l'autoloader
composer install --optimize-autoloader --no-dev

# 2. Mettre en cache la configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Compiler les assets
npm run build

# 4. Configurer l'environnement
# Éditez .env et définissez :
APP_ENV=production
APP_DEBUG=false
```

### Serveurs Recommandés

- **Hébergement partagé** : Compatible avec la plupart des hébergeurs PHP
- **VPS** : Ubuntu 22.04+ avec Nginx/Apache
- **Cloud** : AWS, DigitalOcean, Heroku, Vercel

### Configuration Nginx (Exemple)

```nginx
server {
    listen 80;
    server_name ecolodge.example.com;
    root /var/www/ecolodge/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## 🤝 Contribution

Les contributions sont les bienvenues ! Voici comment vous pouvez aider :

### Comment Contribuer

1. **Fork** le projet
2. **Créez** une branche pour votre fonctionnalité (`git checkout -b feature/AmazingFeature`)
3. **Committez** vos changements (`git commit -m 'Add some AmazingFeature'`)
4. **Push** vers la branche (`git push origin feature/AmazingFeature`)
5. **Ouvrez** une Pull Request

### Standards de Code

- Suivez les conventions [PSR-12](https://www.php-fig.org/psr/psr-12/) pour PHP
- Utilisez des noms de variables et fonctions descriptifs en français
- Commentez le code complexe
- Écrivez des tests pour les nouvelles fonctionnalités

### Rapport de Bugs

Utilisez les [Issues GitHub](https://github.com/bedelolo/Ecolodge/issues) pour signaler des bugs. Incluez :
- Description détaillée du problème
- Étapes pour reproduire
- Comportement attendu vs actuel
- Captures d'écran si applicable

---

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

```
MIT License

Copyright (c) 2026 Éco-Lodge de la Lagune

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

## 📞 Contact

### Équipe de Développement

- **GitHub** : [@bedelolo](https://github.com/bedelolo)
- **Email** : contact@ecolodge.com
- **Site Web** : [www.ecolodge-lagune.com](https://www.ecolodge-lagune.com)

### Support

Pour toute question ou assistance :
- 📧 Email : support@ecolodge.com
- 📱 Téléphone : +229 21 00 00 00
- 💬 Issues GitHub : [github.com/bedelolo/Ecolodge/issues](https://github.com/bedelolo/Ecolodge/issues)

---

## 🙏 Remerciements

- **Laravel** - Framework PHP exceptionnel
- **Bootstrap** - Framework CSS responsive
- **Owl Carousel** - Plugin de carrousel
- **Font Awesome** - Icônes
- **Communauté Open Source** - Pour tous les outils et bibliothèques

---

## 🗺️ Roadmap

### Version 1.2.0 (À venir)

- [ ] Système de paiement en ligne (Mobile Money, Carte bancaire)
- [ ] Multi-langue (Français, Anglais, Fon)
- [ ] Système de notation et avis clients
- [ ] Intégration calendrier Google/Outlook
- [ ] Application mobile (React Native)

### Version 2.0.0 (Futur)

- [ ] Programme de fidélité
- [ ] Réalité virtuelle des chambres
- [ ] Chatbot d'assistance
- [ ] API REST publique
- [ ] Tableau de bord analytique avancé

---

## 📊 Statistiques du Projet

- **Lignes de code** : ~15,000+
- **Fichiers** : 400+
- **Commits** : 50+
- **Contributeurs** : 1
- **Dernière mise à jour** : 11 Février 2026

---

<div align="center">

**Fait avec ❤️ au Bénin 🇧🇯**

[⬆ Retour en haut](#-éco-lodge-de-la-lagune)

</div>
