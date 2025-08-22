<footer class="footer">
    <?php 
    vague('#ffffff', '#f8f9fa');
    ?>
    
    <div class="footer__contenu global">
        <?php 
        $footer_destination_image = get_theme_mod('footer_destination_image', '');
        if ($footer_destination_image) : ?>
            <div class="footer__destination-image">
                <img src="<?php echo esc_url($footer_destination_image); ?>" alt="Destination footer" class="footer__image">
            </div>
        <?php endif; ?>
        
        <?php
        mytheme_display_footer_content();
        ?>
    </div>
</footer>
</body>
<?php wp_footer(); ?>