<?php

/**
 * The template for displaying 404 pages (Not Found)
 */

?>

<?php get_header() ?>

<main id="primary" class="site-main not-found">

    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title">Oops! Cette page n'existe pas.</h1>
        </header><div class="page-content">
            <p>Il semble que rien n'ait été trouvé à cet emplacement. Peut-être essayez-vous une recherche ou retournez à la page d'accueil ?</p>

            <?php get_search_form(); // Displays WordPress's default search form ?>

            <p style="margin-top: 20px;">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="button">Retour à la page d'accueil</a>
            </p>

            </div></section></main><?php get_footer(); ?>