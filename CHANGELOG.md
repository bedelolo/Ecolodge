# Changelog

Tous les changements notables de ce projet seront documentés dans ce fichier.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/fr/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/lang/fr/).

## [Non publié]

### À venir
- Système de paiement en ligne (Mobile Money, Carte bancaire)
- Multi-langue (Français, Anglais, Fon)
- Application mobile React Native

---

## [1.1.0] - 2026-02-11

### ✨ Ajouté

#### Carrousel de Navigation Moderne
- Nouvelles flèches horizontales (← →) au lieu de verticales (↑↓)
- Design circulaire moderne avec cercles blancs élégants
- Effet de survol avec dégradé doré (#DAA520 → #B8860B)
- Animation de zoom au survol (scale 1.1x)
- Ombres portées dynamiques
- Responsive design (60px desktop, 50px tablette, 40px mobile)

#### Modal de Réservation Professionnel
- Interface modale élégante avec animations fluides
- En-tête avec dégradé doré affichant le nom et le prix de la chambre
- Pré-remplissage automatique des données utilisateur (si connecté)
- Validation intelligente des dates :
  - Date minimale = aujourd'hui
  - Date de départ après date d'arrivée
  - Réinitialisation automatique si dates invalides
- Affichage complet des équipements avec icônes de validation
- Fermeture multiple :
  - Bouton × avec rotation au survol
  - Touche Échap (ESC)
  - Clic en dehors du modal
- Prévention du scroll du body quand modal ouvert
- Focus automatique sur le premier champ vide
- Animations échelonnées des champs du formulaire

#### Fichiers CSS
- `public/css/custom-carousel.css` (8,432 octets)
  - Styles modernes pour les flèches de navigation
  - Styles complets pour le modal de réservation
  - Animations CSS optimisées
  - Design responsive
- `public/css/carousel-fix.css` (835 octets)
  - Corrections pour l'overflow du conteneur
  - Gestion du z-index pour la visibilité
  - Fixes de positionnement

#### Fichiers JavaScript
- `public/js/booking-modal.js` (8,702 octets)
  - Gestion complète du modal de réservation
  - Validation des formulaires côté client
  - Animations d'ouverture/fermeture
  - Gestion des événements (ESC, clic extérieur)

#### Documentation
- `README.md` - Documentation complète du projet
- `LICENSE` - Licence MIT
- `CONTRIBUTING.md` - Guide de contribution
- `CHANGELOG.md` - Historique des versions
- `AMELIORATIONS_CARROUSEL.md` - Documentation technique des améliorations
- `GUIDE_VISUEL_AMELIORATIONS.md` - Guide visuel avec diagrammes ASCII
- `GUIDE_DEPANNAGE_CARROUSEL.md` - Solutions aux problèmes courants
- `RECAPITULATIF_MODIFICATIONS.md` - Liste complète des changements
- `DEMARRAGE_RAPIDE.md` - Guide de démarrage rapide

### 🔧 Modifié

#### Configuration du Carrousel
- `public/js/theme.js` (lignes 141-165)
  - Changement des icônes : `lnr-chevron-left` / `lnr-chevron-right`
  - Désactivation de l'autoplay : `autoplay: false`
  - Ajout de `autoplayTimeout: 5000`
  - Ajout de `autoplayHoverPause: true`
  - Configuration responsive pour tous les breakpoints

#### Layout Principal
- `resources/views/layouts/master.blade.php`
  - Ajout du meta tag CSRF pour les requêtes AJAX
  - Inclusion de `custom-carousel.css`
  - Inclusion de `carousel-fix.css`
  - Inclusion de `booking-modal.js`

#### Page d'Accueil
- `resources/views/home.blade.php` (lignes 121-175)
  - Ajout de `input[type="hidden"]` pour room_id
  - Transformation du bouton "Réserver" en déclencheur de modal
  - Ajout des attributs data-* pour les informations de la chambre
  - Ajout de l'événement onclick pour ouvrir le modal

#### Page Hébergements
- `resources/views/rooms.blade.php` (lignes 68-116)
  - Suppression du formulaire inline
  - Remplacement par un bouton modal élégant
  - Interface simplifiée et plus professionnelle

### 🎨 Amélioré

#### Expérience Utilisateur
- Navigation 100% manuelle du carrousel (pas d'autoplay)
- Réservation sans quitter la page
- Feedback visuel immédiat sur toutes les interactions
- Transitions fluides et animations professionnelles

#### Performance
- Animations CSS optimisées (GPU accelerated)
- Pas de bibliothèques lourdes supplémentaires
- Utilisation de jQuery déjà présent
- Code modulaire et maintenable

#### Accessibilité
- Navigation au clavier (ESC pour fermer le modal)
- Focus automatique sur les champs du formulaire
- Labels appropriés pour tous les champs
- Contraste de couleurs amélioré

#### Responsive Design
- Flèches adaptées à tous les écrans
- Modal optimisé pour mobile
- Formulaire responsive avec grilles CSS
- Breakpoints : 575px, 991px, 1000px

### 🐛 Corrigé

- Problème de navigation manuelle du carrousel
- Flèches verticales non intuitives
- Autoplay empêchant la navigation manuelle
- Formulaire de réservation encombrant l'interface
- Manque de validation des dates côté client
- Problèmes de z-index avec les flèches de navigation

---

## [1.0.0] - 2026-01-19

### ✨ Ajouté

#### Fonctionnalités Principales
- Système d'authentification complet (inscription, connexion, déconnexion)
- Gestion des utilisateurs avec rôles (Admin, User)
- Système de réservation de chambres
- Tableau de bord administrateur
- Gestion des messages de contact
- Blog avec articles et catégories
- Galerie photo interactive
- Page À propos
- Page Contact avec formulaire

#### Pages Publiques
- Page d'accueil avec carrousel des hébergements
- Page des hébergements avec détails
- Page galerie avec lightbox
- Page blog avec articles
- Page article individuel
- Page contact

#### Espace Utilisateur
- Tableau de bord personnel
- Historique des réservations
- Gestion du profil

#### Espace Administrateur
- Tableau de bord avec statistiques
- Gestion des réservations
- Gestion des messages
- Vue d'ensemble des activités

#### Base de Données
- Migration pour la table `users`
- Migration pour la table `rooms`
- Migration pour la table `bookings`
- Migration pour la table `messages`
- Migration pour la table `posts`
- Migration pour la table `categories`
- Seeders pour données de test

#### Assets
- Template HTML/CSS responsive
- Bibliothèque Owl Carousel
- Magnific Popup pour lightbox
- Bootstrap 5
- Font Awesome
- jQuery

### 🔧 Configuration

#### Environnement
- Configuration Laravel 12.x
- PHP 8.2+
- SQLite par défaut (configurable pour MySQL/PostgreSQL)
- Configuration Vite pour les assets

#### Sécurité
- Protection CSRF
- Validation des formulaires
- Middleware d'authentification
- Hashage des mots de passe (bcrypt)

---

## Format

### Types de Changements

- `✨ Ajouté` - Nouvelles fonctionnalités
- `🔧 Modifié` - Changements dans les fonctionnalités existantes
- `🗑️ Déprécié` - Fonctionnalités bientôt supprimées
- `❌ Supprimé` - Fonctionnalités supprimées
- `🐛 Corrigé` - Corrections de bugs
- `🔒 Sécurité` - Corrections de vulnérabilités
- `🎨 Amélioré` - Améliorations UX/UI
- `⚡ Performance` - Améliorations de performance
- `📚 Documentation` - Changements dans la documentation

---

## Liens

- [Code Source](https://github.com/bedelolo/Ecolodge)
- [Issues](https://github.com/bedelolo/Ecolodge/issues)
- [Pull Requests](https://github.com/bedelolo/Ecolodge/pulls)

---

<div align="center">

**Fait avec ❤️ au Bénin 🇧🇯**

</div>
