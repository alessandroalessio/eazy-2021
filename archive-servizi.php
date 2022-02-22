
<?php get_header(); ?>

<div class="page-hero">
    <div class="content-hero-wrapper text-center">
        <h1>Ambiti di Attività</h1>
    </div>
</div>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            get_template_part('partials/loop/services');
                        endwhile;
                    else :
                        get_template_part('partials/content', 'none');
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$forza_riga_contatti = false;
get_footer(); ?>