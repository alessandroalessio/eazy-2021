
<?php get_header(); ?>

<div class="container main-wrapper">
    <div class="row" data-masonry="{'percentPosition': true }">

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

<?php get_footer(); ?>