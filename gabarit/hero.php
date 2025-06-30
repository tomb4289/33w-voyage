<?php

/**
 * Template-part hero.php
 * permet d'afficher la section  « Hero »
 */
?>
<?php
$hero_auteur = get_theme_mod('hero_auteur', 'Gustave Trotier');
$hero_adresse = get_theme_mod('hero_adresse', '356 Hamel');
?>

<div class="hero__contenu">
    <h1 class="hero__titre"><?php bloginfo('name') ?></h1>
    <p class="hero__description">
        <?php bloginfo('description') ?>
    </p>
    <p>Auteur du thème: <?= $hero_auteur ?></p>
    <p>Adresse du club: <?= $hero_adresse ?></p>
</div>