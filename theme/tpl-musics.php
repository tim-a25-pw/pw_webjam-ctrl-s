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

    <!-- OEUVRE VEDETTE -->
    <?php 
        $featured = array(
            'post_type'=> 'music',
            'post_status'=> 'publish',
            'posts_per_page'=> -1,
            'meta_query'     => array(
                array(
                        'key'     => 'music-featured',
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
                    'post_type'=> 'music',
                    'post_status'=> 'publish',
                    'posts_per_page '=> -1,
                    'meta_query'     => array(
                        array(
                            'key'     => 'music-featured',
                            'value'   => '0',
                            'compare' => '='
                        )
                    )
                );
                $query_not_featured = new WP_Query( $not_featured );
            ?> 

            <?php if( $query_not_featured ->have_posts() ) : ?>
            <div class="cards swiper swiper-musique" data-component="Carousel" data-direction="vertical" data-split data-slides="2" data-space="55">
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
            <a href="<?php bloginfo('url') ?>/soumettre-une-oeuvre" class="btn blue btn-blue">Soumettre une oeuvre</a>
        </div>
    </section>

    <section class="interaction">
        <div class="wrapper">
            <div class="media">
                <img src="<?php bloginfo('template_url') ?>/assets/images/lunetteInteraction.png" alt="">
            </div>
            <div class="content">
                <h2 class="h2-music">Interaction</h2>
                <h3>Écouteurs à vibration</h3>
                <p>La musique prend vie autour de vous grâce à un son binaural immersif transmis par vibration osseuse. Chaque note et chaque voix résonnent avec une clarté saisissante, comme si l’artiste jouait à vos côtés — une expérience libre, pure et sans censure.</p>
                <ul>
                    <li><span>Tapotez la branche</span> pour activer la musique</li>
                    <li><span>Clignez deux fois</span> pour mettre en pause la lecture</li>
                    <li><span>Glissez le regard</span> de droite à gauche pour changer de chanson</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="souvenir">
        <div class="wrapper">
            <h2 class="h2-music">Des noms à se souvenir</h2>
            <div class="grid-3">
                <div class="card-souvenir">
                    <div class="card__media">
                        <img src="assets/images/elvisCard.png" alt="">
                    </div>
                    <div class="card__content">
                        <h3>Elvis Presley</h3>
                    </div>
                </div>
                <div class="card-souvenir">
                    <div class="card__media">
                        <img src="assets/images/beatlesCard.png" alt="">
                    </div>
                    <div class="card__content">
                        <h3>The Beatles</h3>
                    </div>
                </div>
                <div class="card-souvenir">
                    <div class="card__media">
                        <img src="assets/images/edithCard.png" alt="">
                    </div>
                    <div class="card__content">
                        <h3>Édith Piaf</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $favorites = array(
            'post_type'=> 'music',
            'post_status'=> 'publish',
            'posts_per_page '=> -1,
            'meta_query'     => array(
                array(
                    'key'     => 'music-favorite',
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
                        <a href="<?php the_permalink(); ?>" class="card-hits">
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