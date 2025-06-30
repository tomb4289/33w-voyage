<?php

/**
 * Template-part hero.php
 * permet d'afficher la section « Hero »
 */
?>
<div class="hero__contenu">
    <h1 class="hero__titre"><?php bloginfo('name') ?></h1>
    <p class="hero__description">
        <?php bloginfo('description') ?>
    </p>
    <p>Auteur du thème: <?php echo get_theme_mod('hero_auteur', 'Gustave Trotier'); ?></p>
    <p>Adresse du club: <?php echo get_theme_mod('hero_adresse', '356 Hamel'); ?></p>
</div>