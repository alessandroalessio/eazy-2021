
<?php get_header(); ?>
<?php $color = false; // get_field('color'); ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
    
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col text-column-2">
                            <?php if ( !eazy_get_option('breadcrumb_show_title') ) : ?>
                                <h1><?php the_title(); ?></h1>
                            <?php endif; ?>
                            <?php the_content(); ?>
                        </div>
                        <?php /*if ( has_post_thumbnail() ) : ?>
                            <div class="col-sm-4">
                                <div class="thumb-wrapper"
                                    <?php if ( $color ) echo ' style="border-color: '.$color.';"' ?> >
                                    <?php the_post_thumbnail('large') ?>
                                </div>
                            </div>
                        <?php endif;*/ ?>
                    <?php endwhile; ?>
                <?php endif; ?>
    
        </div>
    </div>
</div>
<?php get_footer(); ?>