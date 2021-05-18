<?php get_header(); ?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                        <div class="tabs">
                            <?php get_template_part('partials/loop/'.get_post_type()); ?>
                        </div>
                    <?php endwhile;
                else :
                    get_template_part('partials/content', 'none');
                endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>