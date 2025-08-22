<?php
/**
 * Section des destinations populaires
 */
?>
<div class="conteneur global">
    <?php
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'order'          => 'DESC',
        'orderby'        => 'date'
    );

    $populaire_query = new WP_Query( $args );

    if ( $populaire_query->have_posts() ) {
        while ( $populaire_query->have_posts() ) {
            $populaire_query->the_post();

            if (in_category('galerie')) {
                get_template_part("gabarit/galerie");
            } else {
                get_template_part("gabarit/carte");
            }
        }
        wp_reset_postdata();
    } else {
        echo '<p>Désolé, aucune destination populaire n\'a été trouvée pour le moment.</p>';
    }
    ?>
</div>