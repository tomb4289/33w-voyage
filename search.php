<?php
get_header(); ?>

<main id="primary" class="site-main">
    <div class="global">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf( esc_html__( 'Résultats de recherche pour : %s', 'text-domain-your-theme' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>
            
            <?php
            global $wp_query;
            $total_results = $wp_query->found_posts;
            if ($total_results > 0) {
                printf(
                    '<p class="search-results-count">%d résultat%s trouvé%s</p>',
                    $total_results,
                    $total_results > 1 ? 's' : '',
                    $total_results > 1 ? 's' : ''
                );
            }
            ?>
        </header>

        <section class="search-results">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    carte('');
                endwhile;

                the_posts_pagination(array(
                    'prev_text' => '← Précédent',
                    'next_text' => 'Suivant →',
                ));

            else :
                ?>
                <div class="no-results not-found">
                    <header class="page-header">
                        <h2 class="page-title">Aucun résultat trouvé.</h2>
                    </header>
                    <div class="page-content">
                        <p>Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec des mots-clés différents.</p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>