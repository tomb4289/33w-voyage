<?php
/**
 * Template-part populaire.php
 * Affiche la section des destinations populaires avec une requête personnalisée.
 */
?>
<div class="conteneur global">
    <?php
    // Custom Query to get posts for the "populaire" section
    $args = array(
        'post_type'      => 'post',      // Assuming your destinations are standard 'posts'
        'posts_per_page' => -1,          // Display all posts; change to a number like 6 for fewer
        'post_status'    => 'publish',   // Only published posts
        'order'          => 'DESC',      // Latest posts first
        'orderby'        => 'date'
    );

    $populaire_query = new WP_Query( $args );

    if ( $populaire_query->have_posts() ) {
        while ( $populaire_query->have_posts() ) {
            $populaire_query->the_post(); // Important: Use the custom query's post data

            // Determine which template part to use based on category
            if (in_category('galerie')) {
                get_template_part("gabarit/galerie"); // Make sure gabarit/galerie.php exists
            } else {
                get_template_part("gabarit/carte"); // Assuming carte.php is now in gabarit/
            }
        }
        wp_reset_postdata(); // Reset post data after the custom query (VERY IMPORTANT)
    } else {
        // Message if no posts are found
        echo '<p>Désolé, aucune destination populaire n\'a été trouvée pour le moment.</p>';
    }
    ?>
</div>