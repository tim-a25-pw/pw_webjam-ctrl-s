<?php get_header(); ?>
    
    <div class="hero">
        <div class="wrapper">
            <?php the_post_thumbnail(); ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>

<?php get_footer(); ?>