<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php // The title tag is handled by add_theme_support('title-tag') in functions.php ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <?php // The main style.css is enqueued via wp_enqueue_style() in functions.php ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); // Hook for accessibility toolbar, etc. ?>
    <header class="entete">
        <div class="entete__contenu">
            <figure class="entete__logo">
                <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                } else {
                    // Fallback for no custom logo, display site title
                    bloginfo( 'name' );
                }
                ?>
            </figure>
            
            <label for="chk__menu" class="entete__burger">
                <img
                    src="https://s2.svgbox.net/hero-outline.svg?ic=menu&color=000"
                    width="32"
                    height="32" />
            </label>

            <input type="checkbox" class="chk__menu" id="chk__menu" />
            <nav class="entete__nav">
                <?php
                // Display the WordPress navigation menu
                wp_nav_menu(array(
                    "theme_location" => "primary", // Using a theme location instead of specific menu name is best practice
                    'container'      => false,     // No wrapper div around the ul
                    'menu_class'     => 'entete__menu', // Apply your existing ul class
                    'fallback_cb'    => false,     // Do not display a fallback if menu not set
                ));
                ?>

                <form class="recherche" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                    <label for="s" class="screen-reader-text"><?php _e( 'Search for:', 'your-theme-textdomain' ); ?></label>
                    <input class="recherche__input" type="search" id="s" name="s" placeholder="<?php esc_attr_e('Search...', 'your-theme-textdomain'); ?>" />
                    <button class="recherche__bouton" type="submit">
                        <img
                            src="https://s2.svgbox.net/hero-solid.svg?ic=search&color=000"
                            width="32"
                            height="32" />
                    </button>
                </form>
            </nav>
        </div>
    </header>