<?php /* Template Name: Univers Musique */ ?>

<?php get_header(); ?>


    <section class="hero-music">
        <div class="wrapper">
            <div class="hero__media">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="hero__content">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
            </div>
        </div>
    </section>

<?php $args = array(
                'post_type'=> 'music',
                'post_status'=> 'publish',
                'showposts'=> -1
                );
            $query = new WP_Query( $args );
        ?> 
                <?php if( $query ->have_posts() ) : ?>
    <section class="oeuvres">
    <div class="wrapper">
        <h2 class="h2-music">Oeuvres</h2> 
        

                    <?php while( $query->have_posts()): $query->the_post(); ?>
                <div class="card swiper-slide">
                    <div class="card__media">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="card__content">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                 <?php endwhile; ?>
    </div>
    </section>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
<?php get_footer(); ?>