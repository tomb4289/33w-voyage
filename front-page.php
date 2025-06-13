<?php

/**
 * Le modèle  front-page
 * Permet d'afficher la page d'accueil 
 */
?>

<?php get_header() ?>
<h1>trace seulement à retirer -------------- Front-page.php -----------</h1>
<section class="hero">
  <div class="hero__contenu">
    <h1 class="hero__titre">Club de voyage</h1>
    <p class="hero__description">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur
      incidunt quas eius totam veniam, molestiae officiis cupiditate ut
      possimus tempore veritatis illum dignissimos, pariatur atque nulla
      architecto a natus voluptatibus!
    </p>
  </div>
</section>
<section class="populaire">
  <?php if (have_posts()) {
    while (have_posts()) {
      /* affiche l'image « mise en avant » miniature */
      the_post();
      the_post_thumbnail('thumbnail');
  ?>
      <h1><?php
          /* affiche le titre pricipal du « post » */
          the_title(); ?></h1>

  <?php
      /* cette fontion permet d'afficher l'ensemble du contenu du post (article ou page)*/
      // the_content();
      $lien = "<a href=" . get_permalink() . ">Suite</a>";
      echo wp_trim_words(get_the_excerpt(), 10, $lien);
      //wp_trim_words()
    }
  } ?>
</section>
<?php get_footer();