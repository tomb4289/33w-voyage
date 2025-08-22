<?php get_header(); ?>
<section class="hero">
    <div class="hero__contenu global">
        <h1 class="hero__titre">Club de voyage</h1>
        <p class="hero__description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem vero error possimus voluptates ex sapiente delectus labore nostrum natus quas molestiae eaque nesciunt, eligendi blanditiis deserunt accusantium saepe? Explicabo, totam!</p>
        <p class="hero__courriel"><a href="#">info@cmaisonneuve.qc.ca</a></p>
        <p class="hero__adresse">Lorem ipsum, dolor sit</p>
        <section class="hero__sociaux">
            <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="32" height="32">
            <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=000000" width="32" height="32">
            <img src="https://s2.svgbox.net/social.svg?ic=wordpress&color=000000" width="32" height="32">
            <img src="https://s2.svgbox.net/social.svg?ic=snapchat&color=000000" width="32" height="32">
            <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="32" height="32">

        </section>
    </div>
</section>
<section class="galerie">
    <div class="galerie__contenu global"></div>
</section>
<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <div><?php the_content(); ?></div>
                </article>
        <?php endwhile;
        endif; ?>
    </div>
</section>
<?php get_footer(); ?>

</body>

</html>