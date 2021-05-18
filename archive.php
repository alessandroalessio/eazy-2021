
<?php get_header(); ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part('partials/loop/'.get_post_type());
                endwhile;
            else :
                get_template_part('partials/content', 'none');
            endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>