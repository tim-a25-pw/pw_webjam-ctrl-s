<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
 <section class="hero-form">
    <div class="wrapper">
        <div class="form__content">
            <div class="hero-title">
                <div class="hero-title-indent">
                    
                </div>
            </div>
        </div>

        <div class="form__media">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="form__content"><?php the_content(); ?></div>
    </div>
</section> 
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>