<?php
$carousel_count = get_theme_mod('carousel_image_count', 3);
$fallback_image = get_template_directory_uri() . '/images/hero-background.jpg';
$has_custom_images = false;

for ($i = 0; $i < $carousel_count; $i++) {
    if (get_theme_mod("hero_background_{$i}", '')) {
        $has_custom_images = true;
        break;
    }
}
?>
<div class="carrousel__container">
    <?php
    for ($i = 0; $i < $carousel_count; $i++) {
        $image_url = get_theme_mod("hero_background_{$i}", '');
        if (empty($image_url)) {
            $image_url = $fallback_image;
        }
        $opacity = ($i === 0) ? '1' : '0';
        ?>
        <div class="carrousel__slide" 
             style="background-image: url('<?php echo esc_url($image_url); ?>'); opacity: <?php echo $opacity; ?>"
             data-image="<?php echo esc_attr($image_url); ?>">
        </div>
        <?php
    }
    ?>

    <?php if ($has_custom_images && $carousel_count > 1): ?>
    <div class="carrousel__navigation">
        <?php for ($i = 0; $i < $carousel_count; $i++) { ?>
            <input type="radio" 
                   class="carrousel__radio" 
                   name="carrousel__radio" 
                   id="carrousel_<?php echo $i; ?>"
                   <?php echo ($i === 0) ? 'checked' : ''; ?>>
            <label for="carrousel_<?php echo $i; ?>" class="carrousel__label"></label>
        <?php } ?>
    </div>
    <?php endif; ?>
</div>
