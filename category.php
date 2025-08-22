<?php
get_header(); ?>

<main id="primary" class="site-main">
    <div class="global">
        <header class="page-header">
            <h1 class="page-title">Catégorie: <?php single_cat_title(); ?></h1>
            <?php
            $category_description = category_description();
            if ( ! empty( $category_description ) ) {
                echo '<div class="archive-description">' . $category_description . '</div>';
            }
            ?>
        </header>

        <section class="category-posts">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    carte(single_cat_title('', false));
                endwhile;

                the_posts_pagination(array(
                    'prev_text' => '← Précédent',
                    'next_text' => 'Suivant →',
                ));

            else :
                echo '<p class="no-posts">Désolé, aucun article n\'a été trouvé dans cette catégorie.</p>';
            endif;
            ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>