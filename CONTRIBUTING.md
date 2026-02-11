# Guide de Contribution

Merci de votre intérêt pour contribuer à **Éco-Lodge de la Lagune** ! 🌴

## 📋 Table des Matières

- [Code de Conduite](#code-de-conduite)
- [Comment Contribuer](#comment-contribuer)
- [Standards de Code](#standards-de-code)
- [Processus de Pull Request](#processus-de-pull-request)
- [Rapport de Bugs](#rapport-de-bugs)
- [Suggestions de Fonctionnalités](#suggestions-de-fonctionnalités)

---

## 📜 Code de Conduite

En participant à ce projet, vous acceptez de respecter notre code de conduite :

- **Soyez respectueux** envers tous les contributeurs
- **Soyez constructif** dans vos critiques
- **Soyez patient** avec les nouveaux contributeurs
- **Soyez professionnel** dans toutes les interactions

---

## 🤝 Comment Contribuer

### 1. Fork le Projet

Cliquez sur le bouton "Fork" en haut à droite de la page GitHub.

### 2. Clonez Votre Fork

```bash
git clone https://github.com/VOTRE_USERNAME/Ecolodge.git
cd Ecolodge
```

### 3. Créez une Branche

```bash
git checkout -b feature/ma-nouvelle-fonctionnalite
```

Nommez votre branche selon le type de contribution :
- `feature/` - Nouvelle fonctionnalité
- `fix/` - Correction de bug
- `docs/` - Documentation
- `style/` - Améliorations CSS/UI
- `refactor/` - Refactoring de code
- `test/` - Ajout de tests

### 4. Faites Vos Modifications

Assurez-vous de :
- Suivre les [standards de code](#standards-de-code)
- Tester vos modifications
- Commenter le code si nécessaire
- Mettre à jour la documentation

### 5. Committez Vos Changements

```bash
git add .
git commit -m "feat: ajoute la fonctionnalité X"
```

**Format des messages de commit :**
```
<type>: <description courte>

<description détaillée (optionnel)>

<footer (optionnel)>
```

**Types de commit :**
- `feat` - Nouvelle fonctionnalité
- `fix` - Correction de bug
- `docs` - Documentation
- `style` - Formatage, CSS
- `refactor` - Refactoring
- `test` - Tests
- `chore` - Maintenance

**Exemples :**
```bash
git commit -m "feat: ajoute le système de paiement mobile money"
git commit -m "fix: corrige le bug de validation des dates"
git commit -m "docs: met à jour le README avec les nouvelles instructions"
```

### 6. Push Vers Votre Fork

```bash
git push origin feature/ma-nouvelle-fonctionnalite
```

### 7. Ouvrez une Pull Request

1. Allez sur votre fork sur GitHub
2. Cliquez sur "Compare & pull request"
3. Remplissez le template de PR
4. Attendez la review

---

## 💻 Standards de Code

### PHP

- **PSR-12** : Suivez les standards [PSR-12](https://www.php-fig.org/psr/psr-12/)
- **Laravel Best Practices** : Utilisez les conventions Laravel
- **Nommage** : Utilisez des noms descriptifs en français

```php
// ✅ Bon
public function creerReservation(Request $request)
{
    $reservation = Reservation::create([
        'client_nom' => $request->nom,
        'date_arrivee' => $request->arrivee,
    ]);
    
    return redirect()->route('reservations.show', $reservation);
}

// ❌ Mauvais
public function cr(Request $r)
{
    $res = Reservation::create(['n' => $r->n, 'd' => $r->d]);
    return redirect()->route('r.s', $res);
}
```

### JavaScript

- **ES6+** : Utilisez les fonctionnalités modernes
- **jQuery** : Pour la compatibilité avec le thème existant
- **Commentaires** : Documentez les fonctions complexes

```javascript
// ✅ Bon
/**
 * Ouvre le modal de réservation avec les données de la chambre
 * @param {Object} roomData - Données de la chambre
 */
function openBookingModal(roomData) {
    const modal = $('#bookingModal');
    modal.find('.room-name').text(roomData.name);
    modal.addClass('active');
}

// ❌ Mauvais
function o(d) {
    $('#m').find('.n').text(d.n);
    $('#m').addClass('a');
}
```

### CSS

- **BEM** : Utilisez la méthodologie BEM pour les classes
- **Mobile-First** : Concevez d'abord pour mobile
- **Commentaires** : Organisez avec des sections commentées

```css
/* ✅ Bon */
/* ==========================================
   BOOKING MODAL
   ========================================== */

.booking-modal {
    background: #fff;
    border-radius: 20px;
}

.booking-modal__header {
    padding: 30px;
    background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%);
}

.booking-modal__title {
    font-size: 28px;
    font-weight: 700;
}

/* ❌ Mauvais */
.bm { background: #fff; border-radius: 20px; }
.bm-h { padding: 30px; background: linear-gradient(135deg, #DAA520 0%, #B8860B 100%); }
```

### Blade Templates

- **Indentation** : 4 espaces
- **Sections** : Utilisez `@section` et `@yield`
- **Commentaires** : Documentez les sections complexes

```blade
{{-- ✅ Bon --}}
@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        
        @foreach($rooms as $room)
            <div class="room-card">
                <h2>{{ $room->name }}</h2>
                <p>{{ $room->description }}</p>
            </div>
        @endforeach
    </div>
@endsection

{{-- ❌ Mauvais --}}
@extends('layouts.master')
@section('content')
<div class="container"><h1>{{ $title }}</h1>
@foreach($rooms as $room)<div class="room-card"><h2>{{ $room->name }}</h2>
<p>{{ $room->description }}</p></div>@endforeach</div>
@endsection
```

---

## 🔄 Processus de Pull Request

### Template de Pull Request

Lorsque vous ouvrez une PR, utilisez ce template :

```markdown
## Description
Décrivez brièvement vos modifications.

## Type de Changement
- [ ] Bug fix (correction non-breaking)
- [ ] Nouvelle fonctionnalité (changement non-breaking)
- [ ] Breaking change (correction ou fonctionnalité qui casse la compatibilité)
- [ ] Documentation

## Comment Tester
Décrivez les étapes pour tester vos modifications :
1. Allez sur '...'
2. Cliquez sur '...'
3. Faites défiler jusqu'à '...'
4. Vérifiez que '...'

## Checklist
- [ ] Mon code suit les standards du projet
- [ ] J'ai commenté mon code, particulièrement les parties complexes
- [ ] J'ai mis à jour la documentation
- [ ] Mes modifications ne génèrent pas de nouveaux warnings
- [ ] J'ai ajouté des tests qui prouvent que ma correction fonctionne
- [ ] Les tests unitaires passent localement
- [ ] J'ai vérifié que mon code fonctionne sur mobile

## Captures d'Écran (si applicable)
Ajoutez des captures d'écran pour illustrer vos modifications.
```

### Review Process

1. **Soumission** : Vous soumettez votre PR
2. **Review automatique** : Les tests automatiques s'exécutent
3. **Review manuelle** : Un mainteneur examine votre code
4. **Modifications** : Vous apportez les modifications demandées
5. **Approbation** : La PR est approuvée
6. **Merge** : Votre code est fusionné dans main

---

## 🐛 Rapport de Bugs

### Avant de Signaler un Bug

1. **Vérifiez** que vous utilisez la dernière version
2. **Cherchez** dans les issues existantes
3. **Testez** sur un environnement propre

### Template de Bug Report

```markdown
## Description du Bug
Une description claire et concise du bug.

## Étapes pour Reproduire
1. Allez sur '...'
2. Cliquez sur '...'
3. Faites défiler jusqu'à '...'
4. Voyez l'erreur

## Comportement Attendu
Décrivez ce qui devrait se passer.

## Comportement Actuel
Décrivez ce qui se passe réellement.

## Captures d'Écran
Si applicable, ajoutez des captures d'écran.

## Environnement
- OS: [ex: Windows 11]
- Navigateur: [ex: Chrome 120]
- Version PHP: [ex: 8.2.0]
- Version Laravel: [ex: 12.0]

## Informations Supplémentaires
Tout autre contexte pertinent.
```

---

## 💡 Suggestions de Fonctionnalités

### Template de Feature Request

```markdown
## Problème à Résoudre
Décrivez le problème que cette fonctionnalité résoudrait.

## Solution Proposée
Décrivez comment vous imaginez cette fonctionnalité.

## Alternatives Considérées
Décrivez les alternatives que vous avez envisagées.

## Informations Supplémentaires
Tout autre contexte ou captures d'écran.
```

---

## 🧪 Tests

### Exécuter les Tests

```bash
# Tous les tests
php artisan test

# Tests spécifiques
php artisan test --filter=BookingTest

# Avec couverture
php artisan test --coverage
```

### Écrire des Tests

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Room;

class BookingTest extends TestCase
{
    /** @test */
    public function un_utilisateur_peut_reserver_une_chambre()
    {
        $user = User::factory()->create();
        $room = Room::factory()->create();
        
        $response = $this->actingAs($user)->post('/bookings', [
            'room_id' => $room->id,
            'check_in' => now()->addDays(1),
            'check_out' => now()->addDays(3),
            'guests' => 2,
        ]);
        
        $response->assertRedirect('/bookings/my');
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'room_id' => $room->id,
        ]);
    }
}
```

---

## 📚 Documentation

### Mettre à Jour la Documentation

Si vos modifications affectent :
- L'installation → Mettez à jour `README.md`
- L'API → Mettez à jour `docs/api.md`
- Les fonctionnalités → Mettez à jour les guides utilisateur

---

## 🎯 Domaines de Contribution

Nous recherchons de l'aide dans ces domaines :

### 🔴 Haute Priorité
- Système de paiement en ligne
- Tests automatisés
- Optimisation des performances
- Sécurité

### 🟡 Moyenne Priorité
- Multi-langue (i18n)
- Application mobile
- API REST
- Documentation

### 🟢 Basse Priorité
- Thèmes alternatifs
- Plugins additionnels
- Intégrations tierces

---

## 💬 Questions ?

Si vous avez des questions :
- 📧 Email : dev@ecolodge.com
- 💬 Discussions GitHub : [github.com/bedelolo/Ecolodge/discussions](https://github.com/bedelolo/Ecolodge/discussions)
- 📱 Discord : [discord.gg/ecolodge](https://discord.gg/ecolodge)

---

## 🙏 Merci !

Merci de contribuer à **Éco-Lodge de la Lagune** ! Chaque contribution, petite ou grande, est appréciée. 🌴

---

<div align="center">

**Fait avec ❤️ au Bénin 🇧🇯**

</div>
