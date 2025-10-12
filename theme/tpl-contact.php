<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<section class="hero-form">
    <div class="wrapper">
        <div class="form__content">
            <div class="hero-title">
                <h1 data-scrolly="fromLeft"><?php the_title(); ?></h1>
                <div class="hero-title-indent">
                    <h2 data-scrolly="fromLeft">Joignez la résistance</h2>
                    <p>Dans un monde où la culture est filtrée, effacée ou réécrite, chaque œuvre devient un acte de résistance.</p>
                    <p>En partageant vos créations à travers le formulaire ci-dessous, vous contribuez à préserver la mémoire collective et à défendre la liberté d’expression artistique.</p>
                </div>
            </div>
        </div>

        <div class="form__media">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/hero_form.png" alt="Lunettes Vision" data-scrolly="fromRight" />
        </div>

        <div class="form__content"><?php the_content(); ?></div>
    </div>
</section>



<?php get_footer(); ?>