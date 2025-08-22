<?php
/**
 * Configuration des nouveaux panneaux du Customizer.
 */

function mytheme_customize_register( $wp_customize ) {

    // ======================================================
    // Section Hero
    // ======================================================

    $wp_customize->add_panel( 'hero_panel', array(
        'title'      => __( 'Hero Section', 'mytheme' ),
        'priority'   => 10,
        'description' => __( 'Customize the main hero section of your website, including content, backgrounds, and colors.', 'mytheme' ),
    ) );

    // Contenu Hero
    $wp_customize->add_section( 'hero_content_section', array(
        'title'    => __( 'Hero Content', 'mytheme' ),
        'priority' => 10,
        'panel'    => 'hero_panel',
    ) );
    
    $wp_customize->add_setting( 'hero_title', array(
        'default'           => __('Bienvenue sur mon site', 'mytheme'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_title_control', array(
        'label'    => __( 'Hero Title', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_title',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => __('Découvrez nos services exceptionnels.', 'mytheme'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_subtitle_control', array(
        'label'    => __( 'Hero Subtitle', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_subtitle',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'hero_button_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_button_text_control', array(
        'label'    => __( 'Hero Button Text', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_button_text',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'hero_button_url_control', array(
        'label'    => __( 'Hero Button URL', 'mytheme' ),
        'section'  => 'hero_content_section',
        'settings' => 'hero_button_url',
        'type'     => 'url',
    ) );

    // Images d'arrière-plan Hero
    $wp_customize->add_section( 'hero_background_section', array(
        'title'    => __( 'Hero Background Images (Carousel)', 'mytheme' ),
        'priority' => 20,
        'panel'    => 'hero_panel',
        'description' => __( 'Upload up to 3 images for the hero section carousel.', 'mytheme' ),
    ) );
    
    for ($i = 0; $i < 3; $i++) {
        $wp_customize->add_setting( 'hero_background_' . $i, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_background_' . $i . '_control', array(
            'label'    => sprintf( __( 'Hero Background Image %d', 'mytheme' ), $i + 1 ),
            'section'  => 'hero_background_section',
            'settings' => 'hero_background_' . $i,
        ) ) );
    }

    // Couleurs Hero
    $wp_customize->add_section( 'hero_colors_section', array(
        'title'    => __( 'Hero Colors', 'mytheme' ),
        'priority' => 30,
        'panel'    => 'hero_panel',
    ) );
    
    $wp_customize->add_setting( 'hero_title_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_title_color_control', array(
        'label'    => __( 'Hero Title Color', 'mytheme' ),
        'section'  => 'hero_colors_section',
        'settings' => 'hero_title_color',
    ) ) );
    
    $wp_customize->add_setting( 'hero_subtitle_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_subtitle_color_control', array(
        'label'    => __( 'Hero Subtitle Color', 'mytheme' ),
        'section'  => 'hero_colors_section',
        'settings' => 'hero_subtitle_color',
    ) ) );
    
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
    // Section Pied de page
    // ======================================================

    $wp_customize->add_panel( 'footer_panel', array(
        'title'      => __( 'Footer Section', 'mytheme' ),
        'priority'   => 20,
        'description' => __( 'Customize the footer section of your website.', 'mytheme' ),
    ) );

    // Contenu du pied de page
    $wp_customize->add_section( 'footer_content_section', array(
        'title'    => __( 'Footer Content', 'mytheme' ),
        'priority' => 10,
        'panel'    => 'footer_panel',
    ) );
    
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

    $wp_customize->add_setting( 'footer_phone', array(
        'default'           => '514-555-0123',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'footer_phone_control', array(
        'label'    => __( 'Phone Number', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_phone',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'footer_website', array(
        'default'           => 'www.example.com',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'footer_website_control', array(
        'label'    => __( 'Website URL', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_website',
        'type'     => 'url',
    ) );

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
    
    $wp_customize->add_setting( 'footer_social_icon_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_icon_color_control', array(
        'label'    => __( 'Social Icon Color', 'mytheme' ),
        'section'  => 'footer_content_section',
        'settings' => 'footer_social_icon_color',
    ) ) );

    // ======================================================
    // Animations Hero
    // ======================================================
    
    $wp_customize->add_section( 'hero_animations_section', array(
        'title'    => __( 'Hero Animations', 'mytheme' ),
        'priority' => 50,
        'panel'    => 'hero_panel',
        'description' => __( 'Configure animations for hero section components.', 'mytheme' ),
    ) );
    
    $wp_customize->add_setting( 'hero_title_animation', array(
        'default'           => 'fadeInUp',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_title_animation_control', array(
        'label'    => __( 'Title Animation', 'mytheme' ),
        'section'  => 'hero_animations_section',
        'settings' => 'hero_title_animation',
        'type'     => 'select',
        'choices'  => array(
            'fadeInUp'    => 'Fade In Up',
            'fadeInDown'  => 'Fade In Down',
            'fadeInLeft'  => 'Fade In Left',
            'fadeInRight' => 'Fade In Right',
            'zoomIn'      => 'Zoom In',
            'slideInUp'   => 'Slide In Up',
        ),
    ) );
    
    $wp_customize->add_setting( 'hero_subtitle_animation', array(
        'default'           => 'fadeInUp',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_subtitle_animation_control', array(
        'label'    => __( 'Subtitle Animation', 'mytheme' ),
        'section'  => 'hero_animations_section',
        'settings' => 'hero_subtitle_animation',
        'type'     => 'select',
        'choices'  => array(
            'fadeInUp'    => 'Fade In Up',
            'fadeInDown'  => 'Fade In Down',
            'fadeInLeft'  => 'Fade In Left',
            'fadeInRight' => 'Fade In Right',
            'zoomIn'      => 'Zoom In',
            'slideInUp'   => 'Slide In Up',
        ),
    ) );
    
    $wp_customize->add_setting( 'hero_button_animation', array(
        'default'           => 'fadeInUp',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_button_animation_control', array(
        'label'    => __( 'Button Animation', 'mytheme' ),
        'section'  => 'hero_animations_section',
        'settings' => 'hero_button_animation',
        'type'     => 'select',
        'choices'  => array(
            'fadeInUp'    => 'Fade In Up',
            'fadeInDown'  => 'Fade In Down',
            'fadeInLeft'  => 'Fade In Left',
            'fadeInRight' => 'Fade In Right',
            'zoomIn'      => 'Zoom In',
            'slideInUp'   => 'Slide In Up',
        ),
    ) );
    
    $wp_customize->add_setting( 'hero_animation_delay', array(
        'default'           => 0.3,
        'sanitize_callback' => 'floatval',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_animation_delay_control', array(
        'label'    => __( 'Animation Delay (seconds)', 'mytheme' ),
        'section'  => 'hero_animations_section',
        'settings' => 'hero_animation_delay',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 2,
            'step' => 0.1,
        ),
    ) );

    // Paramètres du carrousel
    $wp_customize->add_section( 'carousel_settings_section', array(
        'title'    => __( 'Carousel Settings', 'mytheme' ),
        'priority' => 40,
        'panel'    => 'hero_panel',
        'description' => __( 'Configure the hero section carousel.', 'mytheme' ),
    ) );
    
    $wp_customize->add_setting( 'carousel_image_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'carousel_image_count_control', array(
        'label'    => __( 'Number of Carousel Images', 'mytheme' ),
        'section'  => 'carousel_settings_section',
        'settings' => 'carousel_image_count',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
            'step' => 1,
        ),
    ) );
    
    for ($i = 0; $i < 10; $i++) {
        $wp_customize->add_setting( "carousel_image_{$i}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "carousel_image_{$i}_control", array(
            'label'    => sprintf( __( 'Carousel Image %d', 'mytheme' ), $i + 1 ),
            'section'  => 'carousel_settings_section',
            'settings' => "carousel_image_{$i}",
        ) ) );
    }

    // Image de destination du pied de page
    $wp_customize->add_section( 'footer_destination_section', array(
        'title'    => __( 'Footer Destination Image', 'mytheme' ),
        'priority' => 20,
        'panel'    => 'footer_destination_section',
        'description' => __( 'Select a destination image for the footer.', 'mytheme' ),
    ) );
    
    $wp_customize->add_setting( 'footer_destination_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_destination_image_control', array(
        'label'    => __( 'Footer Destination Image', 'mytheme' ),
        'section'  => 'footer_destination_section',
        'settings' => 'footer_destination_image',
    ) ) );

    // Page d'erreur 404
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
add_action( 'customize_register', 'mytheme_customize_register' );