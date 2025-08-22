<?php get_header(); ?>

<section class="populaire">
    <div class="global">
        <h2><?php echo single_cat_title(); ?></h2>
        <p><?php echo category_description(); ?></p>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('gabarits/carte'); ?>
        <?php endwhile;
        endif; ?>
    </div>
</section>
<?php get_footer(); ?>
</body>

</html>