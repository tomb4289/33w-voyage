<?php

/**
 * Gabarits sous forme de fonctions
 */

function icone_sociaux($couleur)
{
    $couleur = substr($couleur, 1);
?>

    <a class="sociaux" href="https://github.com/eddytuto/33w-ete-25">
        <img src="https://s2.svgbox.net/social.svg?ic=github&color=<?= $couleur ?>" width="32" height="32">
    </a>
    <a class="sociaux" href="https://facebook.com">
        <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?= $couleur ?>" width="32" height="32">
    </a>

<?php }

function categories_liste($parent_slug)
{
    $parent_category = get_category_by_slug($parent_slug);
    
    if ($parent_category) {
        $parent_id = $parent_category->term_id;
        
        $sous_categories = get_categories(array(
            'parent' => $parent_id,
            'hide_empty' => true,
        ));
        
        if (!empty($sous_categories)) {
            echo '<ul class="categorie__ul">';
            foreach ($sous_categories as $categorie) {
                echo '<li data-category-id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
            }
            echo '</ul>';
        }
    }
}

/**
 * Générateur de vague pour séparer deux sections
 */

function vague($couleur_haut, $couleur_bas)
{ ?>
    <style>
        .style-vague {
            position: relative;
            top: 9px;
            background-color: <?= $couleur_haut ?>;
        }
    </style>

    <svg class="style-vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="<?= $couleur_bas ?>"
            fill-opacity="1"
            d="M0,32L80,58.7C160,85,320,139,480,133.3C640,128,800,64,960,53.3C1120,43,1280,85,1360,106.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>

<?php }

/**
 * Section Hero
 */
function mytheme_display_hero_content() {
    $hero_title = get_theme_mod( 'hero_title', 'Bienvenue sur mon site' );
    $hero_subtitle = get_theme_mod( 'hero_subtitle', 'Découvrez nos services exceptionnels.' );
    $hero_button_text = get_theme_mod( 'hero_button_text', 'Learn More' );
    $hero_button_url = get_theme_mod( 'hero_button_url', '#' );
    
    $hero_title_animation = get_theme_mod( 'hero_title_animation', 'fadeInUp' );
    $hero_subtitle_animation = get_theme_mod( 'hero_subtitle_animation', 'fadeInUp' );
    $hero_button_animation = get_theme_mod( 'hero_button_text_animation', 'fadeInUp' );
    $hero_animation_delay = get_theme_mod( 'hero_animation_delay', 0.3 );
    ?>
    <div class="hero-content">
        <h1 class="hero-title" data-animation="<?php echo esc_attr( $hero_title_animation ); ?>" data-delay="0"><?php echo esc_html( $hero_title ); ?></h1>
        <p class="hero-subtitle" data-animation="<?php echo esc_attr( $hero_subtitle_animation ); ?>" data-delay="<?php echo esc_attr( $hero_animation_delay ); ?>"><?php echo esc_html( $hero_subtitle ); ?></p>
        <a href="<?php echo esc_url( $hero_button_url ); ?>" class="hero-button" data-animation="<?php echo esc_attr( $hero_button_animation ); ?>" data-delay="<?php echo esc_attr( $hero_animation_delay * 2 ); ?>">
            <?php echo esc_html( $hero_button_text ); ?>
        </a>
    </div>
    <?php
}

/**
 * Contenu du pied de page
 */
function mytheme_display_footer_content() {
    $footer_copyright_text = get_theme_mod( 'footer_copyright_text', '© ' . date('Y') . ' My Theme. All rights reserved.' );
    $footer_address = get_theme_mod( 'footer_address', '123 Main Street, City, Country' );
    $footer_email = get_theme_mod( 'footer_email', 'info@example.com' );
    $footer_phone = get_theme_mod( 'footer_phone', '514-555-0123' );
    $footer_website = get_theme_mod( 'footer_website', 'www.example.com' );
    $footer_social_label = get_theme_mod( 'footer_social_label', 'Social Icons' );
    $footer_social_icon_color = get_theme_mod( 'footer_social_icon_color', '#000000' );
    ?>
    <div class="footer-content">
        <p><?php echo esc_html( $footer_copyright_text ); ?></p>
        <address><?php echo nl2br( esc_html( $footer_address ) ); ?></address>
        <p>Email: <a href="mailto:<?php echo esc_attr( $footer_email ); ?>"><?php echo esc_html( $footer_email ); ?></a></p>
        <p>Téléphone: <a href="tel:<?php echo esc_attr( $footer_phone ); ?>"><?php echo esc_html( $footer_phone ); ?></a></p>
        <p>Site web: <a href="<?php echo esc_url( $footer_website ); ?>"><?php echo esc_html( $footer_website ); ?></a></p>
        <div class="footer-social">
            <p><?php echo esc_html( $footer_social_label ); ?></p>
            <?php icone_sociaux( $footer_social_icon_color ); ?>
        </div>
    </div>
    <?php
}

function carte($cat_a_retirer) {
    $categories = get_categories(array(
        'exclude' => array(get_cat_ID($cat_a_retirer)),
        'hide_empty' => false
    ));
    
    if (has_post_thumbnail()) {
        the_post_thumbnail('thumbnail');
    }
    ?>
    <article class="carte carte--grande">
        <div class="carte__image">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail');
            } else {
                echo '<img src="' . get_template_directory_uri() . '/images/default-destination.jpg" alt="Destination par défaut">';
            }
            ?>
        </div>
        <div class="carte__contenu">
            <h2 class="carte__titre"><?php the_title(); ?></h2>
            <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 25, " ... "); ?></p>
            <a href="<?php the_permalink(); ?>" class="carte__lien">Lire la suite</a>
            
            <div class="carte__categories">
                <h3>Catégories:</h3>
                <ul class="carte__categories__liste">
                    <?php
                    $post_categories = get_the_category();
                    foreach ($post_categories as $category) {
                        if ($category->name !== $cat_a_retirer) {
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            
            <div class="carte__info">
                <?php if (get_field('temperature_maximum')) : ?>
                    <p class="carte__temperature">Température maximum: <?php the_field('temperature_maximum'); ?>°C</p>
                <?php endif; ?>
                <?php if (get_field('temperature_minimum')) : ?>
                    <p class="carte__temperature">Température minimum: <?php the_field('temperature_minimum'); ?>°C</p>
                <?php endif; ?>
                <?php if (get_field('niveau_appreciation')) : ?>
                    <p class="carte__appreciation">Niveau d'appréciation: <?php the_field('niveau_appreciation'); ?>/5</p>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <?php
}