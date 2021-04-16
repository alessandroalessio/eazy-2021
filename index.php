
<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4">

            <?php
    if ( have_posts() ) :

        while ( have_posts() ) : the_post();

            the_title();
            the_content();

        endwhile;

        the_posts_navigation();

    else :

        _e('Nothing to display', 'eazytheme');

    endif; ?>


            </div>
        </div>
    </div>

<?php get_footer(); ?>