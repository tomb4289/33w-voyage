<div class="conteneur global">
    <?php if (have_posts()) {
        while (have_posts()) {
            /* affiche l'image « mise en avant » miniature */
            the_post();
    ?>
            <?php
            if (in_category('galerie')) {
                get_template_part("gabarit/galerie");
            } else {
                get_template_part("gabarit/carte");
            ?>
    <?php }
        }
    } ?>
</div>