<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 */

?>

<?php get_header() ?>

<main id="primary" class="site-main">

    <header class="page-header">
        <h1 class="page-title">Nos Dernières Destinations</h1>
        </header><section class="populaire">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                // Include the 'carte.php' template part to display each post as a card
                get_template_part('carte');
            endwhile;

            // Optional: Add pagination if you have many posts on your homepage
            // the_posts_pagination();

        else :
            // No posts found
            echo '<p>Désolé, aucun article n\'a été trouvé.</p>';
        endif;
        ?>
    </section></main><?php get_footer(); ?>