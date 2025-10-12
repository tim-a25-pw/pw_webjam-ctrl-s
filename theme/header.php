<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vision</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/styles/main.css" />

    <script>
        // À décommenter lorsque rendu dans le fichier .php pour que les icônes fonctionnent dans WP
         iconsPath = '<?php bloginfo('template_url') ?>/';
    </script>

    <script src="<?php bloginfo('template_url') ?>/scripts/vendors.js" defer></script>
    <script src="<?php bloginfo('template_url') ?>/scripts/main.js" defer></script>
</head>

<body data-component="Scrolly" <?php body_class(); ?>>

    <header class="header" data-component="Header" data-auto-hide>
        <div class="wrapper">
            <a href="<?php bloginfo('url'); ?>" class="header__brand">
                <svg class="icon icon__brand">
                    <use href="#icon-logo"></use>
                </svg>
            </a>
            <button class="header__toggle js-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <?php wp_nav_menu(array(
                'theme_location' => 'menu_principal',
                'menu'				=> "menu_principal", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                'menu_class'		=> "nav__menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                'container'			=> "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                'container_class'	=> "nav-primary", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
            )); ?>
        </div>
    </header>
