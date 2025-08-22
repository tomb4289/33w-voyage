<?php
$background_image = get_theme_mod('404_background_image', get_template_directory_uri() . '/images/ilepalmier.jpg');
$title = get_theme_mod('404_title', 'Oops! Cette page n\'existe pas.');
$message = get_theme_mod('404_message', 'Il semble que rien n\'ait été trouvé à cet emplacement. Peut-être essayez-vous une recherche ou retournez à la page d\'accueil ?');
$button_bg_color = get_theme_mod('404_button_bg_color', '#007cba');
$search_bg_color = get_theme_mod('404_search_bg_color', '#f8f9fa');
?>

<div class="erreur-404" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="erreur-404__contenu">
        <div class="erreur-404__conteneur">
            <h1 class="erreur-404__titre"><?php echo esc_html($title); ?></h1>
            <p class="erreur-404__message"><?php echo esc_html($message); ?></p>
            
            <div class="erreur-404__recherche" style="background-color: <?php echo esc_attr($search_bg_color); ?>;">
                <?php get_search_form(); ?>
            </div>
            
            <nav class="erreur-404__menu">
                <h3 class="erreur-404__menu-titre">Destinations populaires</h3>
                <ul class="erreur-404__menu-liste">
                    <li><a href="<?php echo esc_url(home_url('/category/paris')); ?>" class="erreur-404__menu-lien">Paris</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/tokyo')); ?>" class="erreur-404__menu-lien">Tokyo</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/new-york')); ?>" class="erreur-404__menu-lien">New York</a></li>
                    <li><a href="<?php echo esc_url(home_url('/category/venise')); ?>" class="erreur-404__menu-lien">Venise</a></li>
                </ul>
            </nav>
            
            <div class="erreur-404__bouton">
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="erreur-404__bouton-lien" 
                   style="background-color: <?php echo esc_attr($button_bg_color); ?>;">
                    Retour à la page d'accueil
                </a>
            </div>
        </div>
    </div>
</div>
