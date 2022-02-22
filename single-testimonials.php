
<?php get_header(); ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="col-sm-4 col-6 offset-sm-4 offset-3">
                    <div class="thumb-wrapper">
                        <?php the_post_thumbnail('large') ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row mt-4">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <?php if ( !eazy_get_option('breadcrumb_show_title') ) : ?>
                            <h1><?php the_title(); ?></h1>
                        <?php endif; ?>
                        <div class="text quote-background">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>