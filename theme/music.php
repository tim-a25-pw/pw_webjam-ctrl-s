<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vision</title>

    <link rel="stylesheet" href="styles/main.css" />

    <script>
        // À décommenter lorsque rendu dans le fichier .php pour que les icônes fonctionnent dans WP
        // iconsPath = '<?php bloginfo('template_url') ?>/dist/';
    </script>

    <script src="scripts/vendors.js" defer></script>
    <script src="scripts/main.js" defer></script>
</head>

<body>

    <header class="header" data-component="Header">
        <div class="wrapper">
            <a href="index.html" class="header__brand">
                <svg class="icon icon__brand">
                    <use href="#icon-logo"></use>
                </svg>
            </a>
            <button class="header__toggle js-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav-primary">
                <ul>
                    <li><a href="" class="nav-primary__item">Cinéma</a></li>
                    <li><a href="music.html" class="nav-primary__item">Musique</a></li>
                    <li><a href="" class="nav-primary__item">Lecture</a></li>
                    <li><a href="" class="nav-primary__item">Équipe</a></li>
                    <li><a href="" class="btn nav-primary__item">Soumettre une oeuvre</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero hero-music">
        <div class="wrapper">
            <div class="hero__media">
                <img src="assets/images/musiqueHero.png" alt="">
            </div>
            <div class="hero__content">
                <h1>Univers musical</h1>
                <p>L’univers musical est un refuge sonore où renaissent les voix et les œuvres censurées, mêlant les hymnes engagés d’Aretha Franklin, la poésie électrique de Jimi Hendrix, la douceur intemporelle d’Édith Piaf. Grâce à une immersion audio binaurale, chaque chanson devient un acte de résistance et un pont entre les générations, invitant à redécouvrir, partager et préserver un patrimoine culturel libre, critique et vivant face à la réécriture du passé.</p>
            </div>
        </div>
    </section>

</body>

</html>