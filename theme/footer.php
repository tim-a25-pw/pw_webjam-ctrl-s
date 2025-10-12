<footer class="footer">
    <div class="wrapper">
        <div class="footer__content">
            <div class="footer__logo">
                <svg class="icon icon__brand">
                    <use href="#icon-logo"></use>
                </svg>
            </div>
            <div class="footer__nav">
                <?php wp_nav_menu(array(
                'theme_location' => 'menu_footer',
                'menu'				=> "menu_footer", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
                'menu_class'		=> "nav__menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                'container'			=> "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                'container_class'	=> "nav-footer", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
            )); ?>
            </div>
            <div class="button">
                <a href="<?php bloginfo('url'); ?>/soumettre-une-oeuvre" class="btn btn_footer">Soumettre une oeuvre</a>
            </div>
        </div>
        <p>Tous droits réservés © <?php echo Date('Y'); ?> <?php bloginfo('name'); ?> Tous droits réservés.</p>
    </div>
</footer>    
    <?php wp_footer(); ?>
    </body>
</html> 

