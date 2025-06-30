<?php

/**
 * The template for displaying Category archives
 */

?>

<?php get_header() ?>

<main id="primary" class="site-main">

    <header class="page-header">
        <h1 class="page-title">Catégorie: <?php single_cat_title(); ?></h1>
        <?php
        // Display category description if available
        $category_description = category_description();
        if ( ! empty( $category_description ) ) {
            echo '<div class="archive-description">' . $category_description . '</div>';
        }
        ?>
    </header><section class="populaire">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                // This is the key: Include your 'carte.php' template part for each post
                get_template_part('carte');
            endwhile;

            // Optional: Add pagination here if you have many posts
            // the_posts_pagination();

        else :
            // No posts found in this category
            echo '<p>Désolé, aucun article n\'a été trouvé dans cette catégorie.</p>';
        endif;
        ?>
    </section></main><?php get_footer(); ?>