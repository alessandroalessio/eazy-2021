
<?php get_header(); ?>

<?php
get_template_part('partials/page-hero');
?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
    
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    
                        <!-- <div class="col-md-12">
                            <div class="text-center">
                                <?php get_template_part('partials/page-title'); ?>
                            </div>
                        </div> -->
                        <div class="col-md-9 content-wrapper">
                            <!-- <div class="date"><?php the_date(); ?></div> -->
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="text-center image-wrapper">
                                    <?php the_post_thumbnail('full', ['class' => 'img-fluid']) ?>
                                </div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                        </div>
                        <?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
                            <div class="col-md-3 sidebar-wrapper">
                                <ul id="page-sidebar">
                                    <?php dynamic_sidebar( 'page-sidebar' ); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
    
        </div>
    </div>
</div>
<?php get_footer(); ?>