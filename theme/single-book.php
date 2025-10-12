<?php get_header(); ?>

<section class="hero_oeuvre hero_oeuvre_livre">
    <div class="wrapper">
        <h3 data-scrolly="fromLeft">Univers de lecture</h3>
        <h1 data-scrolly="fromLeft"><?php the_title(); ?></h1>
        <?php if (get_field('book-author')) : ?>
        <h2><?php the_field('book-author'); ?></h2>
        <?php endif; ?>
    </div>
    <img src="<?php bloginfo('template_url'); ?>/assets/images/livre-oeuvre.png" alt="">
</section>

<section class="about-oeuvre">
    <div class="wrapper">
        <div class="oeuvre_texte">
            <div class="oeuvre_content">
                <h2 data-scrolly="fromLeft">Sur l'oeuvre</h2>
                <?php the_content(); ?>
            </div>
            <div class="oeuvre_media">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </div>
</section>

<?php if (have_rows('book-quotes')): ?>
<section class="extraits">
    <div class="wrapper">
        <h2 data-scrolly="fromLeft">Extraits</h2>
        <div class="all_extraits">
            <?php while(have_rows('book-quotes')) : the_row(); ?>
                <div class="extrait">
                    <p><?php the_sub_field('book-quotes-title'); ?></p>
                    <li><?php the_sub_field('book-quotes-text'); ?></li>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="type">
    <div class="wrapper">
        <h2 data-scrolly="fromLeft">Type</h2>
        <?php if (get_field('book-type-subtitle')) : ?>
            <p><?php the_field('book-type-subtitle'); ?></p>
        <?php endif; ?>
        <?php if (have_rows('book-type-list')): ?>
        <div class="types">
            <?php while(have_rows('book-type-list')) : the_row(); ?>
                <li><?php the_sub_field('book-type-description'); ?></li>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="realisateur">
    <div class="wrapper">
        <h2 data-scrolly="fromLeft">Sur le réalisateur</h2>
        <?php if (get_field('book-author-text')) : ?>
            <p><?php the_field('book-author-text'); ?></p>
        <?php endif; ?>    
    </div>
</section>

<section class="suivante_precedente">
    <div class="wrapper">
        <div class="nav_fleche">
            <div class="precedente">
                <span class="h3"><?php previous_post_link('&lt; %link'); ?></span>
            </div>
            <div class="prochaine">
                <span class="h3"><?php next_post_link('&gt; %link'); ?></span>
            </div> 
        </div>
    </div>
</section>

<?php get_footer(); ?>