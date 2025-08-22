<?php
$functions_dir = get_template_directory() . '/functions/';

include_once $functions_dir . 'mon-customizer.php';
include_once $functions_dir . 'configuration-general.php';
include_once $functions_dir . 'composant.php';

function mytheme_enqueue_scripts() {
    wp_enqueue_script(
        'carousel-script',
        get_template_directory_uri() . '/script/carrousel.js',
        array(),
        filemtime(get_template_directory() . '/script/carrousel.js'),
        true
    );
    
    wp_enqueue_script(
        'animations-script',
        get_template_directory_uri() . '/script/animations.js',
        array(),
        filemtime(get_template_directory() . '/script/animations.js'),
        true
    );
    
    if (file_exists(get_template_directory() . '/script/destination.js')) {
        wp_enqueue_script(
            'destination-script',
            get_template_directory_uri() . '/script/destination.js',
            array(),
            filemtime(get_template_directory() . '/script/destination.js'),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');