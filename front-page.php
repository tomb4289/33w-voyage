<?php

/**
 * Le modèle  front-page
 * Permet d'afficher la page d'accueil
 */
?>
<?php get_header() ?>
<section class="hero">
    <?php
    // Your existing carousel logic remains the same.
    $hero_background[0] = get_theme_mod("hero_background_0");
    $hero_background[1] = get_theme_mod("hero_background_1");
    $hero_background[2] = get_theme_mod("hero_background_2");
    ?>
    <div class="carrousel" style="background-image: url('<?= esc_url( $hero_background[0] ) ?>'); opacity:1"></div>
    <div class="carrousel" style="background-image: url('<?= esc_url( $hero_background[1] ) ?>'); opacity:0"></div>
    <div class="carrousel" style="background-image: url('<?= esc_url( $hero_background[2] ) ?>'); opacity:0"></div>
    <form class="carrousel__form">
        <input type="radio" class="carrousel__radio" name="carrousel__radio">
        <input type="radio" class="carrousel__radio" name="carrousel__radio">
        <input type="radio" class="carrousel__radio" name="carrousel__radio">
    </form>


    <?php mytheme_display_hero_content(); // Replaced get_template_part("gabarit/hero"); ?>
</section>

<section class="populaire">
    <?php get_template_part("gabarit/populaire"); ?>
</section>

<section class="destination">
    <h2 class="destination__titre">Articles de la catégorie</h2>
    <div class="destination__list"></div>
</section>

<?php get_footer(); ?>