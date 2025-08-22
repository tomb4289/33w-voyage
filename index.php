<?php
/**
 * Template principal
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
                get_template_part('carte');
            endwhile;

        else :
            echo '<p>Désolé, aucun article n\'a été trouvé.</p>';
        endif;
        ?>
    </section></main><?php get_footer(); ?>