# TP2 - Club de Voyage - Étape 2

## Auteur
[Votre nom]

## Titre du projet
Club de Voyage - Site WordPress avec Customizer

## Description
Ce projet est la deuxième étape du développement d'un site WordPress pour un club de voyage offrant des destinations exclusives à ses membres. Cette étape se concentre sur l'intégration du Customizer WordPress pour permettre aux utilisateurs de personnaliser le site en temps réel.

## Fonctionnalités implémentées

### 1. Panneau Hero pour personnaliser la section « Hero » (1 point)
- **Panneau organisé** : Section dédiée dans le Customizer pour la zone Hero
- **Sections multiples** : Organisation claire des paramètres de personnalisation
- **Interface intuitive** : Navigation facile entre les différentes options

### 2. Mettre à jour les informations de la section « hero » (1 point)
- **Titre personnalisable** : Modification du titre principal de la section Hero
- **Sous-titre configurable** : Personnalisation du texte descriptif
- **Bouton d'action** : Texte et URL du bouton principal configurables
- **Prévisualisation en temps réel** : Modifications visibles immédiatement

### 3. Modifier l'image en arrière-plan de la section « hero » (1 point)
- **Carrousel d'images** : Support de plusieurs images d'arrière-plan
- **Upload facile** : Interface intuitive pour ajouter de nouvelles images
- **Gestion dynamique** : Configuration du nombre d'images (1-10)
- **Navigation interactive** : Radio boutons pour naviguer entre les images

### 4. Modifier certaines couleurs de la zone Hero (1 point)
- **Couleur du titre** : Personnalisation de la couleur du titre principal
- **Couleur du sous-titre** : Modification de la couleur du texte descriptif
- **Couleur du bouton** : Personnalisation de l'arrière-plan et du texte du bouton
- **Sélecteur de couleurs** : Interface intuitive pour choisir les couleurs

### 5. Panneau Footer pour personnaliser la section « Pied de page » (1 point)
- **Panneau dédié** : Section séparée dans le Customizer pour le footer
- **Organisation claire** : Regroupement logique des paramètres du pied de page
- **Interface cohérente** : Même style que le panneau Hero

### 6. Ajouter ou modifier les informations du pied de page minimum 3 valeurs (1 point)
- **Copyright** : Texte de copyright personnalisable
- **Adresse** : Adresse physique du club de voyage
- **Email** : Adresse email de contact
- **Téléphone** : Numéro de téléphone de contact
- **Site web** : URL du site web principal
- **Icônes sociales** : Configuration des réseaux sociaux

### 7. Dans la section « Hero » ajouter une animation sur les composants de la section « Hero » (2 points)
- **Animations multiples** : Différents types d'animations disponibles
- **Délais configurables** : Timing personnalisable pour chaque élément
- **Types d'animations** :
  - Fade In Up/Down/Left/Right
  - Zoom In
  - Slide In Up
- **Configuration via Customizer** : Choix des animations dans l'interface d'administration

### 8. Optimiser le code en remplaçant certain template-part par des fonctions (2 points)
- **Fonction `mytheme_display_hero_content()`** : Remplace l'utilisation de template-parts pour le contenu Hero
- **Fonction `mytheme_display_footer_content()`** : Remplace l'utilisation de template-parts pour le contenu Footer
- **Fonction `icone_sociaux()`** : Gestion des icônes sociales via fonction
- **Code optimisé** : Réduction de la duplication et amélioration de la maintenabilité

## Structure des fichiers

```
33w-voyage/
├── functions/
│   ├── composant.php          # Fonctions pour les composants
│   ├── configuration-general.php # Configuration générale
│   └── mon-customizer.php     # Personnalisation du Customizer
├── script/
│   ├── animations.js          # Animations de la section Hero
│   ├── carrousel.js           # Fonctionnalité du carrousel
│   └── destination.js         # JavaScript des destinations
├── style.css                  # Styles principaux avec animations
├── functions.php              # Fonctions du thème et enqueue des scripts
├── front-page.php             # Page d'accueil avec Hero animé
├── footer.php                 # Pied de page personnalisable
└── README-ETAPE2.md           # Ce fichier
```

## Installation et configuration

1. **Téléchargement** : Cloner le dépôt depuis GitHub
2. **Installation WordPress** : Placer les fichiers dans le dossier du thème
3. **Activation** : Activer le thème dans l'administration WordPress
4. **Configuration** : Utiliser le Customizer pour personnaliser :
   - Section Hero (titre, sous-titre, bouton, couleurs)
   - Images du carrousel
   - Informations du footer
   - Animations des composants

## Personnalisation via Customizer

### Section Hero
- **Apparence → Personnaliser → Hero Section**
- **Hero Content** : Titre, sous-titre, bouton
- **Hero Background Images** : Images du carrousel
- **Hero Colors** : Couleurs des éléments
- **Hero Animations** : Types d'animations et délais

### Section Footer
- **Apparence → Personnaliser → Footer Section**
- **Footer Content** : Copyright, adresse, contact
- **Footer Destination Image** : Image de destination

## Animations disponibles

### Types d'animations
- **fadeInUp** : Apparition en fondu vers le haut
- **fadeInDown** : Apparition en fondu vers le bas
- **fadeInLeft** : Apparition en fondu depuis la gauche
- **fadeInRight** : Apparition en fondu depuis la droite
- **zoomIn** : Apparition avec effet de zoom
- **slideInUp** : Glissement vers le haut

### Configuration des délais
- **Délai configurable** : De 0 à 2 secondes
- **Délais automatiques** : Progression naturelle des animations
- **Prévisualisation** : Test des animations en temps réel

## Technologies utilisées

- **WordPress** : CMS principal avec Customizer
- **PHP** : Logique backend et personnalisation
- **CSS3** : Animations et transitions
- **JavaScript** : Gestion des animations et interactions
- **HTML5** : Structure sémantique

## Navigateurs supportés

- Chrome (dernière version)
- Firefox (dernière version)
- Safari (dernière version)
- Edge (dernière version)

## Responsive Design

Le site est entièrement responsive et s'adapte à tous les formats d'écran :
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (320px - 767px)

## Performance

- **Animations optimisées** : Utilisation de CSS3 et JavaScript moderne
- **Chargement différé** : Scripts chargés en fin de page
- **Cache WordPress** : Optimisation des performances
- **Images optimisées** : Gestion efficace des ressources

## Sécurité

- **Sanitisation des données** : Validation des entrées utilisateur
- **Échappement des sorties** : Protection contre les attaques XSS
- **Permissions WordPress** : Contrôle d'accès approprié
- **Validation des URLs** : Sécurisation des liens

## Support et maintenance

Pour toute question ou problème :
1. Consulter la documentation WordPress
2. Vérifier les logs d'erreur
3. Tester en mode debug
4. Contacter l'équipe de développement

## Licence

Ce projet est développé dans le cadre du cours 33W - Introduction à un système de gestion de contenu au Collège de Maisonneuve.

---

**Date de création** : [Date]
**Version** : 1.0.0
**Dernière mise à jour** : [Date]
