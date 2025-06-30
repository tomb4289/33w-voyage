<?php

/**
 * le gabarit searchform.php
 * permet d'afficher un formulaire de recherche
 */
?>
<form class="recherche" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <input class="recherche__input" type="search" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button class="recherche__bouton" type="submit">
        <img
            src="https://s2.svgbox.net/hero-solid.svg?ic=search&color=000"
            width="16"
            height="16" />
    </button>
</form>