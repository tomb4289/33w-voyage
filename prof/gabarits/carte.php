<?php

/**
 * Template Name: carte
 */
?>
<article class="carte carte--grande">
    <div class="carte__image">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail');
        }
        ?>
    </div>
    <div class="carte__contenu">
        <h2 class="carte__titre"><?php the_title(); ?></h2>
        <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 25, " ... "); ?></p>
        <a href="<?php the_permalink(); ?>">Lire la suite</a>
        <?php the_category() ?>
        <p>Température maximum: <?php the_field('temperature_maximum') ?></p>
        <p>Température minimum: <?php the_field('temperature_minimum') ?></p>
    </div>
</article>