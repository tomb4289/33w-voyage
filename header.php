<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil | Club Voyage</title>
    <link rel="stylesheet" href="style.css" />
    <?php wp_head(); ?>
  </head>
  <body class="page">
    <header class="entete">
      <div class="entete__contenu global">
        <img
          src="images/logo.png"
          alt="Logo Club Voyage"
          class="entete__logo"
        />

        <input type="checkbox" id="burger" class="chk__menu" />
        <label for="burger" class="entete__burger">☰</label>

        <nav class="entete__nav">
          <ul class="entete__menu">
            <li class="entete__menu-item"><a href="#">Accueil</a></li>
            <li class="entete__menu-item"><a href="#">Destinations</a></li>
            <li class="entete__menu-item"><a href="#">Promotions</a></li>
            <li class="entete__menu-item"><a href="#">Info pratiques</a></li>
            <li class="entete__menu-item"><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>