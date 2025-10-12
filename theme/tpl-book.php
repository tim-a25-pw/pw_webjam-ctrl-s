    <?php /* Template Name: Univers Book */ ?>

<?php get_header(); ?>

    <section class="hero-lecture">
        <div class="wrapper">
            <div class="hero__media">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="hero__content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>            
            </div>
        </div>
    </section>

    <!-- OEUVRE VEDETTE -->
    <?php 
        $featured = array(
            'post_type'=> 'book',
            'post_status'=> 'publish',
            'posts_per_page'=> -1,
            'meta_query'     => array(
                array(
                        'key'     => 'book-featured',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            );
        $query_featured = new WP_Query( $featured );
    ?>

    <section class="oeuvres">
        <div class="wrapper">
            <h2 class="h2-music">Oeuvres</h2>
            <?php if( $query_featured ->have_posts() ) : ?>
                <?php while( $query_featured->have_posts()): $query_featured->the_post(); ?>
                    <div class="vedette">
                        <div class="content">
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="media">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

            <!-- OEUVRE PAS VEDETTE -->
            <?php 
                $not_featured = array(
                    'post_type'=> 'book',
                    'post_status'=> 'publish',
                    'posts_per_page '=> -1,
                    'meta_query'     => array(
                        array(
                            'key'     => 'book-featured',
                            'value'   => '0',
                            'compare' => '='
                        )
                    )
                );
                $query_not_featured = new WP_Query( $not_featured );
            ?> 

            <?php if( $query_not_featured ->have_posts() ) : ?>
            <div class="cards swiper swiper-lecture orange" data-component="Carousel" data-direction="vertical" data-slides="2" data-space="55">
                <div class="custom-pagination"></div>
                <div class="swiper-wrapper">
                    <?php while( $query_not_featured->have_posts()): $query_not_featured->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="card swiper-slide">
                            <div class="card__media">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="card__content">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>                            
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <a href="<?php bloginfo('url') ?>/soumettre-une-oeuvre" class="btn orange">Soumettre une oeuvre</a>
        </div>
    </section>

    <section class="interaction">
        <div class="wrapper">
            <div class="media">
                <img src="<?php bloginfo('template_url') ?>/assets/images/lunetteInteractionLecture.png" alt="">
            </div>
            <div class="content">
                <h2 class="h2-music">Interaction</h2>
                <h3>Suivi du regard</h3>
                <p>Les grands classiques reprennent vie sous vos yeux. Grâce à un affichage immersif intégré, Vision vous permet de lire des œuvres entières — de Victor Hugo à George Orwell — comme si les mots flottaient devant vous, à l’abri de toute censure.</p>
                <ul>
                    <li><span class="orange">Baissez les lunettes</span> pour activer la lecture</li>
                    <li><span class="orange">Glissez le regard</span> de droite à gauche pour changer de page</li>
                </ul>
            </div>
        </div>
    </section>

        <?php if ( have_rows('book-people', 'option')): ?>
    <section class="souvenir">
        <div class="wrapper">
            <h2 class="h2-music">Des noms à se souvenir</h2>
            <div class="grid-3">
                <?php while(have_rows('book-people', 'option')): the_row(); ?>
                <div class="card-souvenir">
                    <div class="card__media">
                        <?php $image = get_sub_field('book-people-image'); ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                    <div class="card__content">
                        <h3><?php the_sub_field('book-people-name'); ?></h3>
                    </div>
                </div>
               <?php endwhile ?>
            </div>
        </div>
    </section>
    <?php endif ?>

    <?php 
        $favorites = array(
            'post_type'=> 'book',
            'post_status'=> 'publish',
            'posts_per_page '=> -1,
            'meta_query'     => array(
                array(
                    'key'     => 'book-favorite',
                    'value'   => '1',
                    'compare' => '='
                )
            )
        );
        $query_favorites = new WP_Query( $favorites );
    ?> 

    <?php if( $query_favorites ->have_posts() ) : ?>
        <section class="hits">
            <div class="wrapper">
                <h2 class="h2-music">Les meilleurs hits</h2>
                <div class="grid-3">
                    <?php while( $query_favorites->have_posts()): $query_favorites->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="card-hits card-hits_lecture">
                            <div class="card__media">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="card__content">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
            
<?php get_footer(); ?>