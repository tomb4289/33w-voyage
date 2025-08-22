<?php
/**
 * Configuration des nouveaux panneaux du Customizer.
 */

function mytheme_customize_register( $wp_customize ) { // Changed function name for consistency

    // ======================================================
    // Panneau Hero pour personnaliser la section « Hero » (1 point)
    // ======================================================

    $wp_customize->add_panel( 'hero_panel', array(
        'title'      => __( 'Hero Section', 'mytheme' ),
        'priority'   => 10,
        'description' => __( 'Customize the main hero section of your website, including content, backgrounds, and colors.', 'mytheme' ),
    ) );

    // A. Section for Hero Content - Mettre à jour les informations de la section « hero » (1 point)
    $wp_customize->add_section( 'hero_content_section', array(
        'title'    => __( 'Hero Content', 'mytheme' ),
        'priority' => 10,
        'panel'    => 'hero_panel',
    ) );
    
    // Hero Title (was hero_auteur)
    $wp_customize->add_setting( 'hero_title', array(
        'default'           => __('Bienvenue sur mon site', 'mytheme'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage', // Enable live preview
    ) );
    $wp_customize->add_control( 'hero_title_control', array(
        'label'    => __( 'Hero Title', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_title',
        'type'     => 'text',
    ) );

    // Hero Subtitle (was hero_adresse, now more generic subtitle)
    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => __('Découvrez nos services exceptionnels.', 'mytheme'), // Changed default text
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage', // Enable live preview
    ) );
    $wp_customize->add_control( 'hero_subtitle_control', array(
        'label'    => __( 'Hero Subtitle', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_subtitle',
        'type'     => 'textarea',
    ) );

    // Hero Button Text
    $wp_customize->add_setting( 'hero_button_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage', // Enable live preview
    ) );
    $wp_customize->add_control( 'hero_button_text_control', array(
        'label'    => __( 'Hero Button Text', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_button_text',
        'type'     => 'text',
    ) );

    // Hero Button URL
    $wp_customize->add_setting( 'hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage', // Enable live preview
    ) );
    $wp_customize->add_control( 'hero_button_url_control', array(
        'label'    => __( 'Hero Button URL', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_button_url',
        'type'     => 'url',
    ) );


    // B. Section for Hero Background Images - Modifier l’image en arrière-plan de la section « hero » (1 point)
    // (Your existing carousel image settings are kept and grouped here)
    $wp_customize->add_section( 'hero_background_section', array(
        'title'    => __( 'Hero Background Images (Carousel)', 'mytheme' ),
        'priority' => 20,
        'panel'    => 'hero_panel',
        'description' => __( 'Upload up to 3 images for the hero section carousel.', 'mytheme' ),
    ) );
    
    for ($i = 0; $i < 3; $i++) {
        $wp_customize->add_setting( 'hero_background_' . $i, array(
            'default'           => '', // No default image
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_background_' . $i . '_control', array(
            'label'    => sprintf( __( 'Hero Background Image %d', 'mytheme' ), $i + 1 ),
            'section'  => 'hero_background_section',
            'settings' => 'hero_background_' . $i,
        ) ) );
    }

    // C. Section for Hero Colors - Modifier certaines couleurs de la zone Hero. (1 point)
    $wp_customize->add_section( 'hero_colors_section', array(
        'title'    => __( 'Hero Colors', 'mytheme' ),
        'priority' => 30,
        'panel'    => 'hero_panel',
    ) );
    
    // Hero Title Color
    $wp_customize->add_setting( 'hero_title_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color', // Corrected sanitize_callback
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_title_color_control', array(
        'label'    => __( 'Hero Title Color', 'mytheme' ),
        'section'  => 'hero_colors_section',
        'settings' => 'hero_title_color',
    ) ) );
    
    // Hero Subtitle Color
    $wp_customize->add_setting( 'hero_subtitle_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color', // Corrected sanitize_callback
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_subtitle_color_control', array(
        'label'    => __( 'Hero Subtitle Color', 'mytheme' ),
        'section'  => 'hero_colors_section',
        'settings' => 'hero_subtitle_color',
    ) ) );
    
    // Hero Button Background Color
    $wp_customize->add_setting( 'hero_button_bg_color', array(
        'default'           => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_button_bg_color_control', array(
        'label'    => __( 'Hero Button Background Color', 'mytheme' ),
        'section'  => 'hero_colors_section',
        'settings' => 'hero_button_bg_color',
    ) ) );
    
    // Hero Button Text Color
    $wp_customize->add_setting( 'hero_button_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_button_text_color_control', array(
        'label'    => __( 'Hero Button Text Color', 'mytheme' ),
        'section'  => 'hero_colors_section',
        'settings' => 'hero_button_text_color',
    ) ) );


    // ======================================================
    // Panneau Footer pour personnaliser la section « Pied de page » (1 point)
    // ======================================================

    $wp_customize->add_panel( 'footer_panel', array(
        'title'      => __( 'Footer Section', 'mytheme' ),
        'priority'   => 20, // Appears after Hero panel
        'description' => __( 'Customize the footer section of your website.', 'mytheme' ),
    ) );

    // Ajouter ou modifier les informations du pied de page minimum 3 valeurs. (1 point)
    $wp_customize->add_section( 'footer_content_section', array(
        'title'    => __( 'Footer Content', 'mytheme' ),
        'priority' => 10,
        'panel'    => 'footer_panel',
    ) );
    
    // Copyright Text
    $wp_customize->add_setting( 'footer_copyright_text', array(
        'default'           => '© ' . date('Y') . ' My Theme. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'footer_copyright_text_control', array(
        'label'    => __( 'Copyright Text', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_copyright_text',
        'type'     => 'text',
    ) );

    // Footer Address
    $wp_customize->add_setting( 'footer_address', array(
        'default'           => '123 Main Street, City, Country',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'footer_address_control', array(
        'label'    => __( 'Address', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_address',
        'type'     => 'textarea',
    ) );

    // Footer Contact Email
    $wp_customize->add_setting( 'footer_email', array(
        'default'           => 'info@example.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'footer_email_control', array(
        'label'    => __( 'Contact Email', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_email',
        'type'     => 'email',
    ) );

    // Additional: Social Link Label (for your icone_sociaux function)
    $wp_customize->add_setting( 'footer_social_label', array(
        'default'           => 'Social Icons',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'footer_social_label_control', array(
        'label'    => __( 'Social Icons Label', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_social_label',
        'type'     => 'text',
    ) );
    
    // Social Icon Color (to be used with your icone_sociaux function)
    $wp_customize->add_setting( 'footer_social_icon_color', array(
        'default'           => '#000000', // Default black
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_icon_color_control', array(
        'label'    => __( 'Social Icon Color', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_social_icon_color',
    ) ) );

    $wp_customize->add_section( 'section_404', array(
        'title'    => __( '404 Error Page', 'mytheme' ),
        'priority' => 30,
        'description' => __( 'Customize the 404 error page appearance and content.', 'mytheme' ),
    ) );

    $wp_customize->add_setting( '404_background_image', array(
        'default'           => get_template_directory_uri() . '/images/ilepalmier.jpg',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '404_background_image_control', array(
        'label'    => __( '404 Background Image', 'mytheme' ),
        'section'  => 'section_404',
        'settings' => '404_background_image',
    ) ) );

    $wp_customize->add_setting( '404_title', array(
        'default'           => __( 'Oops! Cette page n\'existe pas.', 'mytheme' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( '404_title_control', array(
        'label'    => __( '404 Title', 'mytheme' ),
        'section'  => 'section_404',
        'settings' => '404_title',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( '404_message', array(
        'default'           => __( 'Il semble que rien n\'ait été trouvé à cet emplacement. Peut-être essayez-vous une recherche ou retournez à la page d\'accueil ?', 'mytheme' ),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( '404_message_control', array(
        'label'    => __( '404 Message', 'mytheme' ),
        'section'  => 'section_404',
        'settings' => '404_message',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( '404_button_bg_color', array(
        'default'           => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '404_button_bg_color_control', array(
        'label'    => __( 'Button Background Color', 'mytheme' ),
        'section'  => 'section_404',
        'settings' => '404_button_bg_color',
    ) ) );

    $wp_customize->add_setting( '404_search_bg_color', array(
        'default'           => '#f8f9fa',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, '404_search_bg_color_control', array(
        'label'    => __( 'Search Area Background Color', 'mytheme' ),
        'section'  => 'section_404',
        'settings' => '404_search_bg_color',
    ) ) );

}
add_action( 'customize_register', 'mytheme_customize_register' ); // Hook changed to new function name