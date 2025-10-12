<?php get_header(); ?>

<section class="hero-accueil">
    <div class="wrapper">
        <div class="hero-media">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="hero-content">
            <div class="hero-title">
                <h1><?php the_title(); ?></h1>
                <div class="hero-title-indent">
                        <?php if (get_field('h2_hero')) : ?>
                            <h2><?php the_field('h2_hero'); ?></h2>
                        <?php endif; ?>

                    <?php if (get_field('undertitle_h2')) : ?>
                        <p><?php the_field('undertitle_h2'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="hero-intro">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>


<?php if (have_rows('why_vision')) : ?>
    <section class="arguments">
        <div class="wrapper">
        
            <div class="argument-content">
                <h2>Pourquoi vision?</h2>
                <ul>
                    <?php while(have_rows('why_vision')) : the_row(); ?>
                        <li>
                            <?php the_sub_field('item_why_vision'); ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('cards_universe')) : ?>
    <section class="universe-list">
        <div class="wrapper">
            <h2>Découvrez l'interdit</h2>

            <div class="universe-cards">
                <?php while(have_rows('cards_universe')) : the_row(); ?>
                
                    <?php 
                        $link = get_sub_field('link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="universe-card">
                            <?php 
                                $image = get_sub_field('card_img');
                                if( !empty( $image ) ): 
                            ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
        
                            <h3><?php echo esc_html( $link_title ); ?></h3>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
