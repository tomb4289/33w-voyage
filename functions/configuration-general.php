<?php

/**
 * Configuration général du thème
 *
 */
function mon_theme_supports()
{
    add_theme_support('post-thumbnails');
    add_image_size('miniature', 75, 75, true); // Taille carrée
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('custom-logo', array(
        'height'      => 75,
        'width'       => 75,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'mon_theme_supports');



function theme_tp_enqueue_styles()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');

    $css_path = get_template_directory() . '/style.css';
    $css_url  = get_template_directory_uri() . '/style.css';


    wp_enqueue_style(
        'main-style',
        $css_url,
        array(),
        filemtime($css_path),
        null
    );

    $script_path = get_template_directory() . '/script/checkbox.js';
    $script_url  = get_template_directory_uri() . '/script/checkbox.js';

    wp_enqueue_script(
        'mon-script',
        $script_url,
        array(),
        filemtime($script_path),
        true
    );

    $script_path = get_template_directory() . '/script/carrousel.js';
    $script_url  = get_template_directory_uri() . '/script/carrousel.js';

    wp_enqueue_script(
        'mon-carrousel',
        $script_url,
        array(),
        filemtime($script_path),
        true
    );

    $script_path = get_template_directory() . '/script/destination.js';
    $script_url  = get_template_directory_uri() . '/script/destination.js';

    wp_enqueue_script(
        'destination',
        $script_url,
        array(),
        filemtime($script_path),
        true
    );

    // Dans la section « Hero » ajouter une animation sur les composants de la section « Hero » (2 point)
    // Enqueue animation CSS (create this file: css/animations.css)
    wp_enqueue_style( 'mytheme-animations', get_template_directory_uri() . '/css/animations.css', array(), filemtime(get_template_directory() . '/css/animations.css') );

    // Enqueue animation JS (create this file: js/animations.js)
    wp_enqueue_script( 'mytheme-animations', get_template_directory_uri() . '/js/animations.js', array(), filemtime(get_template_directory() . '/js/animations.js'), true );

    // Enqueue Customizer live preview script (create this file: js/customizer-preview.js)
    if ( is_customize_preview() ) {
        wp_enqueue_script(
            'mytheme-customizer-preview',
            get_template_directory_uri() . '/js/customizer-preview.js',
            array( 'jquery', 'customize-preview' ), // Ensure jQuery and customize-preview are dependencies
            filemtime(get_template_directory() . '/js/customizer-preview.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');


/**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */
function modifie_requete_principal($query)
{
    if ($query->is_home() && $query->is_main_query() && ! is_admin()) {
        $query->set('category_name', 'populaire');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'modifie_requete_principal');


/**
 * Generate dynamic CSS from Customizer settings.
 * This is added to wp_head for live updates.
 */
function mytheme_customizer_dynamic_css() {
    // Hero Colors
    $hero_title_color = get_theme_mod( 'hero_title_color', '#ffffff' );
    $hero_subtitle_color = get_theme_mod( 'hero_subtitle_color', '#ffffff' );
    $hero_button_bg_color = get_theme_mod( 'hero_button_bg_color', '#007bff' );
    $hero_button_text_color = get_theme_mod( 'hero_button_text_color', '#ffffff' );

    $css = '';

    // Hero Section Colors
    $css .= '.hero-content .hero-title { color: ' . esc_html( $hero_title_color ) . '; }';
    $css .= '.hero-content .hero-subtitle { color: ' . esc_html( $hero_subtitle_color ) . '; }';
    $css .= '.hero-content .hero-button { background-color: ' . esc_html( $hero_button_bg_color ) . '; color: ' . esc_html( $hero_button_text_color ) . '; }';

    // Footer Social Icon Color
    $footer_social_icon_color = get_theme_mod( 'footer_social_icon_color', '#000000' );
    // Your icone_sociaux function already handles the color via inline SVG,
    // but if you had other social icons that rely on CSS, you'd add rules here.
    // For the SVGbox icons, the color is passed directly in the image src.
    // We'll primarily use this for the live preview for now.

    if ( ! empty( $css ) ) {
        echo '<style type="text/css" id="mytheme-customizer-css">' . $css . '</style>';
    }
}
add_action( 'wp_head', 'mytheme_customizer_dynamic_css' );