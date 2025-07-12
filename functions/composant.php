<?php

/**
 * Gabarits sous forme de fonctions. Chacune peut être paramétré
 *
 */

function icone_sociaux($couleur)
{
    // pour enle ver le # de la position 0 on extrait à partir de la position 1
    $couleur = substr($couleur, 1);
?>

    <a class="sociaux" href="https://github.com/eddytuto/33w-ete-25">
        <img src="https://s2.svgbox.net/social.svg?ic=github&color=<?= $couleur ?>" width="32" height="32">
    </a>
    <a class="sociaux" href="https://facebook.com">
        <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?= $couleur ?>" width="32" height="32">
    </a>

<?php }

/**
 * générateur de vague pour séparer deux sections
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
 * Optimiser le code en remplaçant certain template-part par des fonctions (2 point)
 * Hero section.
 * This function will replace the gabarit/hero.php content.
 */
function mytheme_display_hero_content() {
    $hero_title = get_theme_mod( 'hero_title', 'Bienvenue sur mon site' );
    $hero_subtitle = get_theme_mod( 'hero_subtitle', 'Découvrez nos services exceptionnels.' );
    $hero_button_text = get_theme_mod( 'hero_button_text', 'Learn More' );
    $hero_button_url = get_theme_mod( 'hero_button_url', '#' );
    ?>
    <div class="hero-content">
        <h1 class="hero-title"><?php echo esc_html( $hero_title ); ?></h1>
        <p class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
        <a href="<?php echo esc_url( $hero_button_url ); ?>" class="hero-button">
            <?php echo esc_html( $hero_button_text ); ?>
        </a>
    </div>
    <?php
}

/**
 * Footer content.
 * This function will replace direct output in footer.php
 */
function mytheme_display_footer_content() {
    $footer_copyright_text = get_theme_mod( 'footer_copyright_text', '© ' . date('Y') . ' My Theme. All rights reserved.' );
    $footer_address = get_theme_mod( 'footer_address', '123 Main Street, City, Country' );
    $footer_email = get_theme_mod( 'footer_email', 'info@example.com' );
    $footer_social_label = get_theme_mod( 'footer_social_label', 'Social Icons' );
    $footer_social_icon_color = get_theme_mod( 'footer_social_icon_color', '#000000' );
    ?>
    <div class="footer-content">
        <p><?php echo esc_html( $footer_copyright_text ); ?></p>
        <address><?php echo nl2br( esc_html( $footer_address ) ); ?></address>
        <p>Email: <a href="mailto:<?php echo esc_attr( $footer_email ); ?>"><?php echo esc_html( $footer_email ); ?></a></p>
        <div class="footer-social">
            <p><?php echo esc_html( $footer_social_label ); ?></p>
            <?php icone_sociaux( $footer_social_icon_color ); ?>
        </div>
    </div>
    <?php
}