<?php get_header(); ?>
<?php
$hero_auteur = get_theme_mod('hero_auteur', 'Default Title');
$hero_telephone = get_theme_mod('hero_telephone', 'Default Title');
$hero_background = get_theme_mod('hero_background', 'Default Title');
?>
<style>
    .hero__couleur {
        color: <?php echo get_theme_mod('hero_couleur', '#000000'); ?>;
    }
</style>
<section class="hero" style="background-image: url('<?php echo $hero_background; ?>')">
    <div class="hero__contenu global">
        <h1 class="hero__titre"><?php bloginfo('name'); ?></h1>
        <p class="hero__description"><?php bloginfo('description'); ?></p>
        <p class="hero__courriel"><a href="#"><?php bloginfo('admin_email'); ?></a></p>
        <p class="hero__adresse">Lorem ipsum, dolor sit</p>
        <p class="hero__auteur">Auteur: <?php echo $hero_auteur; ?></p>
        <p class="hero__auteur">Telephone: <?php echo $hero_telephone; ?></p>
        <section class="hero__sociaux">
            <?php get_template_part("gabarits/icone-sociaux"); ?>
        </section>
    </div>
</section>
<section class="galerie">
    <div class="galerie__contenu global"></div>
</section>
<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (in_category('galerie')) {
                    the_content();
                } else { ?>
                    <?php get_template_part('gabarits/carte'); ?>
                <?php } ?>
        <?php endwhile;
        endif; ?>
    </div>
</section>
<section class="destination">
    <div class="global">
        <div class="destination__bouton">
            <?php categories_liste("destination"); ?>
        </div>

        <div class="destination__list"></div>
    </div>
</section>
<?php get_footer(); ?>
</body>

</html>