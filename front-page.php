<?php

/**
 * Le modèle  front-page
 * Permet d'afficher la page d'accueil
 */
?>
<?php get_header() ?>
<section class="hero" style="background-image: url('<?= get_template_directory_uri() ?>/images/acores.jpg');">
  <?php get_template_part("gabarit/hero"); ?>
</section>
<section class="populaire">
  <?php get_template_part("gabarit/populaire"); ?>
</section>
<?php get_footer();