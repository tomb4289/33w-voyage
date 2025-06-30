<?php

/**
 * le modèle single.php
 * Représente le modèle par défaut
 */

?>

<?php get_header() ?>
<section class="populaire">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_post_thumbnail('large'); ?>
                <h1><?php the_title(); ?></h1>

                <div class="entry-content">
                    <?php
                    /* cette fontion permet d'afficher l'ensemble du contenu (même les images) du post (article ou page)*/
                    the_content();
                    ?>

                    <div class="destination-details-full">
                        <h3>Informations de voyage</h3>
                        <?php if (get_field('temperature_minimum')): ?>
                            <p>Température Minimum: <?php the_field('temperature_minimum'); ?>&deg;C</p>
                        <?php endif; ?>

                        <?php if (get_field('temperature_maximum')): ?>
                            <p>Température Maximum: <?php the_field('temperature_maximum'); ?>&deg;C</p>
                        <?php endif; ?>

                        <?php if (get_field('temperature_moyenne')): ?>
                            <p>Température Moyenne: <?php the_field('temperature_moyenne'); ?>&deg;C</p>
                        <?php endif; ?>

                        <?php if (get_field('appreciation_de_la_destination')): ?>
                            <p>Appréciation de la Destination: <?php the_field('appreciation_de_la_destination'); ?> / 5</p>
                        <?php endif; ?>
                    </div>
                    <div class="destination-categories-full">
                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<p>Catégories: ';
                            foreach ( $categories as $category ) {
                                // get_category_link() and esc_html() are important for proper links and security
                                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
                            }
                            echo '</p>';
                        }
                        ?>
                    </div>
                    <?php edit_post_link(); // Keeps your edit link ?>
                </div></article>
    <?php
        } // end while
    } // end if
    ?>
</section>
<?php get_footer(); ?>