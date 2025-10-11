<?php get_header(); ?>

    <div class="wrapper">
        <h1 style="margin-top: 100px">404</h1>
        <h2 style="margin-bottom: 100px">Cette page n’a pas pu être trouvée. Ou bien est-elle encore en train de cuire? 🧑‍🍳</h2>
        <?php 
                $link = get_field('link_homepage', 'option');
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
             ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="a-big">
                    <?php echo esc_html( $link_title ); ?>
                    <svg class="icon icon--lg">
                        <use href="#icon-arrow-right"></use>
                    </svg>
                </a>
            <?php endif; ?>
    </div>

<?php get_footer(); ?>