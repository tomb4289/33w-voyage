<?php
/**
 * Générateur de catégories et sous-catégories
 */

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
                echo '<li  data-category-id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
            }
            echo '</ul>';
        }
    }
}
