# TP2 - Club de Voyage - Étape 3

## Auteur
[Votre nom]

## Titre du projet
Club de Voyage - Site WordPress avec fonctionnalités avancées

## Description
Ce projet est la troisième étape du développement d'un site WordPress pour un club de voyage offrant des destinations exclusives à ses membres. Cette étape se concentre sur l'enrichissement du site avec de nouvelles fonctionnalités, l'amélioration du design et l'optimisation de l'expérience utilisateur.

## Fonctionnalités implémentées

### 1. Carrousel pour la section Hero (2 points)
- **Carrousel dynamique** : Le nombre d'images est configurable via le Customizer
- **Génération automatique** : Boucle PHP pour générer les champs d'images dans le customizer
- **Navigation interactive** : Radio boutons pour naviguer entre les images
- **Template part** : Utilisation de `get_template_part()` avec le gabarit `carrousel.php`
- **Animations fluides** : Transitions animées entre les images

### 2. Animation du texte Hero (1 point)
- **Contenu dynamique** : Animation du contenu lors du changement d'images
- **Transitions fluides** : Effets visuels pour améliorer l'expérience utilisateur

### 3. Cartes de la section Populaire (1 point)
- **Liste de liens catégories** : Affichage dynamique des catégories (excluant "Populaire")
- **Transitions visuelles** : Légères transitions pour améliorer la visibilité
- **Fonction carte()** : Remplacement de `get_template_part()` par une fonction personnalisée
- **Paramétrage flexible** : Fonction `carte($cat_a_retirer)` utilisable dans `front-page.php` et `category.php`

### 4. Section filtre REST-API avec accordéon (2 points)
- **Interface dynamique** : Filtrage entièrement dynamique des destinations
- **Accordéon animé** : Interface originale et adaptative
- **Accès au contenu complet** : Navigation intuitive vers les destinations

### 5. Séparateur SVG entre sections (1 point)
- **Fonction vague()** : Génération de vagues SVG paramétrables
- **Personnalisation complète** : Couleurs, dimensions et positionnement configurables
- **Animation bonus** : Animation de l'image SVG dans le footer

### 6. Footer amélioré avec image de destination (1 point)
- **Image sélectionnable** : Choix de l'image via le Customizer
- **Design optimisé** : Intégration et design améliorés
- **Séparateur SVG** : Vague animée pour séparer le contenu du footer

### 7. Icônes sociales par fonction (1 point)
- **Fonction icone_sociaux()** : Remplacement de `get_template_part()`
- **Configuration via Customizer** : Images et liens configurables
- **Intégration GitHub** : Lien vers le dépôt du TP2
- **Personnalisation des couleurs** : Couleurs configurables pour les icônes

### 8. Template single.php pour destinations (1 point)
- **Image mise en avant** : Affichage de l'image par défaut si nécessaire
- **Informations complètes** : Auteur, date, catégories, nom de destination
- **Description détaillée** : Contenu complet de la destination
- **Données météo** : Températures et niveau d'appréciation
- **Navigation entre posts** : Liens vers les destinations précédente/suivante

### 9. Formulaire d'inscription (1 point)
- **Champs requis** : Nom, prénom et courriel
- **Section dédiée** : Nouvelle section sur la page d'accueil
- **Design intégré** : Style cohérent avec le reste du site

### 10. Modèles améliorés (1 point)
- **category.php** : Utilisation de la fonction `carte()` et pagination
- **search.php** : Affichage du nombre de résultats et pagination
- **404.php** : Page d'erreur claire et originale
- **header.php** : Design et intégration améliorés

### 11. Design général et structure (1 point)
- **Mise en valeur des destinations** : Design optimisé pour le voyage
- **Organisation claire** : Structure logique des dossiers
- **Standard BEM** : Utilisation correcte de la méthodologie BEM
- **Code structuré** : SCSS, PHP et JavaScript bien organisés et commentés

## Structure des fichiers

```
33w-voyage/
├── functions/
│   ├── composant.php          # Fonctions pour les composants
│   ├── configuration-general.php # Configuration générale
│   └── mon-customizer.php     # Personnalisation du Customizer
├── gabarit/
│   ├── carrousel.php          # Template du carrousel
│   ├── carte.php              # Template des cartes (maintenant fonction)
│   └── ...
├── script/
│   ├── carrousel.js           # JavaScript du carrousel
│   └── destination.js         # JavaScript des destinations
├── style.css                  # Styles principaux
├── functions.php              # Fonctions du thème
├── front-page.php             # Page d'accueil
├── single.php                 # Template des destinations individuelles
├── category.php               # Template des catégories
├── search.php                 # Template de recherche
├── footer.php                 # Pied de page
└── README-ETAPE3.md           # Ce fichier
```

## Installation et configuration

1. **Téléchargement** : Cloner le dépôt depuis GitHub
2. **Installation WordPress** : Placer les fichiers dans le dossier du thème
3. **Activation** : Activer le thème dans l'administration WordPress
4. **Configuration** : Utiliser le Customizer pour personnaliser :
   - Images du carrousel
   - Couleurs et textes du Hero
   - Image du footer
   - Paramètres des icônes sociales

## Personnalisation

### Carrousel
- Accéder au Customizer > Hero Section > Carousel Settings
- Définir le nombre d'images (1-10)
- Uploader les images pour chaque position

### Couleurs et textes
- Customizer > Hero Section > Hero Content/Colors
- Personnaliser les titres, sous-titres et couleurs

### Footer
- Customizer > Footer Section
- Configurer l'image de destination et les informations

## Technologies utilisées

- **WordPress** : CMS principal
- **PHP** : Logique backend et templates
- **SCSS/CSS** : Styles et animations
- **JavaScript** : Interactivité et carrousel
- **HTML5** : Structure sémantique
- **SVG** : Séparateurs et icônes

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

- **Images optimisées** : Formats WebP et compression
- **CSS/JS minifiés** : Réduction de la taille des fichiers
- **Lazy loading** : Chargement différé des images
- **Cache WordPress** : Optimisation des performances

## Sécurité

- **Sanitisation des données** : Validation des entrées utilisateur
- **Échappement des sorties** : Protection contre les attaques XSS
- **Nonces WordPress** : Protection des formulaires
- **Permissions utilisateur** : Contrôle d'accès approprié

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
