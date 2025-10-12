<?php
/**
 * Template Name: Page – Équipe
 * Description: Gabarit personnalisé.
 */ 
?>

<?php get_header(); ?>

<section class="hero-accueil hero-team">
    <div class="wrapper hero-team">
        <div class="hero-media" data-scrolly="fromRight">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="hero-content">
            <div class="hero-title">
                <h1 data-scrolly="fromLeft"><?php the_title(); ?></h1>

                <?php if (get_field('h2_title')) : ?>
                    <div class="hero-title-indent" data-scrolly="fromLeft">
                        <h2><?php the_field('h2_title'); ?></h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="team">
    <div class="wrapper">
        <div class="team-about">
            <div class="team-about__content" data-scrolly="fromLeft">
                <?php the_content(); ?>
            </div>

             <?php 
                $image = get_field('img_about');
                if( !empty( $image ) ): 
                ?>
                <div class="team-about__media" data-scrolly="fromRight">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>
        </div>


        <?php 
            $arg = array(
                'post_type' => 'member',
                'post_status' => 'publish',
                'posts_per_page' => '-1',
                'order' => 'asc',
            );
            $query = new WP_Query($arg);
        ?>

        <div class="teammates">
            <h2 data-scrolly="fromLeft">
                Notre équipe
            </h2>
            <div class="cards_teammates">
                 <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="card_teammate">
                            <div class="card_teammate__media" data-scrolly="fromLeft">
                                <?php 
                                    $image = get_field('member-image');
                                if( !empty( $image ) ): 
                                ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="card_teammate__content">
                                <h3 data-scrolly="fromRight">
                                    <?php the_title(); ?>
                                </h3>
                                <?php if (get_field('member-role')) : ?>
                                    <h4 data-scrolly="fromRight">
                                        <?php the_field('undertitle_h2'); ?>
                                    </h4>
                                <?php endif; ?>
                                <div data-scrolly="fromRight">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>

                        <?php if (get_field('member-video')) : ?>
                            <div class="video_teammate">
                                <div class="video" data-component="Youtube" data-video-id="<?php the_field('member-video'); ?>" data-no-controls data-scrolly="fromRight">
                                        <div class="video__media js-video">
                                            <?php 
                                                $image = get_field('img_cover');
                                                if( !empty( $image ) ): 
                                            ?>
                                                <img class="js-poster" src="<?php echo esc_url($image   ['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                            <div class="icon_container">
                                                <svg class="icon">
                                                    <use xlink:href="#icon-play"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
