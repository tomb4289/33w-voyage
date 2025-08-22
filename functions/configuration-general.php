<?php

/**
 * Configuration général du thème
 */

function mon_theme_supports()
{
    add_theme_support('post-thumbnails');
    add_image_size('miniature', 75, 75, true);
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('custom-logo', array(
        'height'      => 75,
        'width'       => 75,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'your-theme-textdomain' ),
    ) );
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

    wp_enqueue_style( 'mytheme-animations', get_template_directory_uri() . '/css/animations.css', array(), filemtime(get_template_directory() . '/css/animations.css') );

    wp_enqueue_style( 'mytheme-404', get_template_directory_uri() . '/css/erreur-404.css', array(), filemtime(get_template_directory() . '/css/erreur-404.css') );

    wp_enqueue_script(
        'mytheme-animations',
        get_template_directory_uri() . '/script/animations.js',
        array(),
        filemtime(get_template_directory() . '/script/animations.js'),
        true
    );

    if ( is_customize_preview() ) {
        wp_enqueue_script(
            'mytheme-customizer-preview',
            get_template_directory_uri() . '/script/customizer-preview.js',
            array( 'jquery', 'customize-preview' ),
            filemtime(get_template_directory() . '/script/customizer-preview.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

function modifie_requete_principal($query)
{
    if ($query->is_home() && $query->is_main_query() && ! is_admin()) {
        $query->set('category_name', 'populaire');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'modifie_requete_principal');

function mytheme_customizer_dynamic_css() {
    $hero_title_color = get_theme_mod( 'hero_title_color', '#ffffff' );
    $hero_subtitle_color = get_theme_mod( 'hero_subtitle_color', '#ffffff' );
    $hero_button_bg_color = get_theme_mod( 'hero_button_bg_color', '#007bff' );
    $hero_button_text_color = get_theme_mod( 'hero_button_text_color', '#ffffff' );

    $css = '';

    $css .= '.hero-content .hero-title { color: ' . esc_html( $hero_title_color ) . '; }';
    $css .= '.hero-content .hero-subtitle { color: ' . esc_html( $hero_subtitle_color ) . '; }';
    $css .= '.hero-content .hero-button { background-color: ' . esc_html( $hero_button_bg_color ) . '; color: ' . esc_html( $hero_button_text_color ) . '; }';

    $footer_social_icon_color = get_theme_mod( 'footer_social_icon_color', '#000000' );
    $button_bg_color = get_theme_mod( '404_button_bg_color', '#007cba' );
    $css .= '.erreur-404__bouton-lien { background-color: ' . esc_html( $button_bg_color ) . '; }';

    if ( ! empty( $css ) ) {
        echo '<style type="text/css" id="mytheme-customizer-css">' . $css . '</style>';
    }
}
add_action( 'wp_head', 'mytheme_customizer_dynamic_css' );