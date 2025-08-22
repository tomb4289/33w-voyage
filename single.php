<?php
get_header(); ?>

<main class="single-destination">
    <div class="global">
        <?php while (have_posts()) : the_post(); ?>
            <article class="destination__article">
                <div class="destination__image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/default-destination.jpg" alt="Destination par défaut">
                    <?php endif; ?>
                </div>

                <header class="destination__header">
                    <h1 class="destination__titre"><?php the_title(); ?></h1>
                    
                    <div class="destination__meta">
                        <p class="destination__auteur">
                            <span class="meta__label">Auteur:</span> 
                            <?php the_author(); ?>
                        </p>
                        <p class="destination__date">
                            <span class="meta__label">Publié le:</span> 
                            <?php echo get_the_date(); ?>
                        </p>
                    </div>

                    <div class="destination__categories">
                        <h3>Catégories:</h3>
                        <?php the_category(', '); ?>
                    </div>
                </header>

                <div class="destination__contenu">
                    <?php the_content(); ?>
                </div>

                <div class="destination__details">
                    <h3>Informations de la destination</h3>
                    
                    <div class="destination__temperatures">
                        <?php if (get_field('temperature_maximum')) : ?>
                            <p class="temperature__max">
                                <span class="detail__label">Température maximum:</span> 
                                <?php the_field('temperature_maximum'); ?>°C
                            </p>
                        <?php endif; ?>
                        
                        <?php if (get_field('temperature_minimum')) : ?>
                            <p class="temperature__min">
                                <span class="text__label">Température minimum:</span> 
                                <?php the_field('temperature_minimum'); ?>°C
                            </p>
                        <?php endif; ?>
                    </div>

                    <?php if (get_field('niveau_appreciation')) : ?>
                        <div class="destination__rating">
                            <p class="rating__label">Niveau d'appréciation:</p>
                            <div class="rating__stars">
                                <?php 
                                $rating = get_field('niveau_appreciation');
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<span class="star star--filled">★</span>';
                                    } else {
                                        echo '<span class="star star--empty">☆</span>';
                                    }
                                }
                                ?>
                                <span class="rating__value"><?php echo $rating; ?>/5</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <nav class="destination__navigation">
                    <div class="nav__previous">
                        <?php previous_post_link('%link', '← Destination précédente'); ?>
                    </div>
                    <div class="nav__next">
                        <?php next_post_link('%link', 'Destination suivante →'); ?>
                    </div>
                </nav>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>