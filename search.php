<?php

/**
 * The template for displaying search results pages
 */

?>

<?php get_header() ?>

<main id="primary" class="site-main">

    <header class="page-header">
        <h1 class="page-title">
            <?php
            /* translators: %s: Search query. */
            printf( esc_html__( 'Résultats de recherche pour : %s', 'text-domain-your-theme' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
    </header><section class="populaire">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                // This is the key: Include your 'carte.php' template part for each search result
                get_template_part('carte');
            endwhile;

            // Optional: Add pagination for search results if you have many
            // the_posts_pagination();

        else :
            // No search results found
            ?>
            <div class="no-results not-found">
                <header class="page-header">
                    <h2 class="page-title">Aucun résultat trouvé.</h2>
                </header><div class="page-content">
                    <p>Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec des mots-clés différents.</p>
                    <?php get_search_form(); // Display the search form again ?>
                </div></div><?php
        endif;
        ?>
    </section></main><?php get_footer(); ?>