<?php
/**
 * Template principal
 */

?>

<?php get_header() ?>
<section class="hero">
    <?php get_template_part("gabarit/carrousel"); ?>
    <?php mytheme_display_hero_content(); ?>
</section>

<?php vague('#ffffff', '#f8f9fa'); ?>

<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php if (in_category('galerie')) {
                the_content();
            } else { ?>
                <?php carte('Populaire'); ?>
            <?php } ?>
        <?php endwhile;
        endif; ?>
    </div>
</section>

<?php vague('#f8f9fa', '#ffffff'); ?>

<section class="destination">
    <div class="global">
        <div class="destination__bouton">
            <?php categories_liste("destination"); ?>
        </div>
        <div class="destination__list"></div>
    </div>
</section>

<?php vague('#ffffff', '#ecf0f1'); ?>

<section class="inscription">
    <div class="global">
        <h2 class="inscription__titre">Rejoignez notre club de voyage</h2>
        <p class="inscription__description">Inscrivez-vous pour recevoir nos offres exclusives</p>
        
        <form class="inscription__form" method="post" action="">
            <div class="inscription__form-group">
                <label for="nom" class="inscription__label">Nom *</label>
                <input type="text" id="nom" name="nom" class="inscription__input" required>
            </div>
            
            <div class="inscription__form-group">
                <label for="prenom" class="inscription__label">Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="inscription__input" required>
            </div>
            
            <div class="inscription__form-group">
                <label for="courriel" class="inscription__label">Courriel *</label>
                <input type="email" id="courriel" name="courriel" class="inscription__input" required>
            </div>
            
            <button type="submit" class="inscription__button">S'inscrire</button>
        </form>
    </div>
</section>

<?php get_footer(); ?>