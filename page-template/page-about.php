<?php 
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage Eazy 2021
 * @since Eazy 1.0
 */
get_header(); ?>
<?php get_template_part('partials/page-hero') ?>

<div class="main-wrapper">

    <div class="container">
        <div class="row mt-5">
            
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-12">
                        <?php the_content(); ?>
                    </div>
                    <?php /*if ( has_post_thumbnail() ) : ?>
                        <div class="col-md-6">
                            <div class="thumb-wrapper">
                                <?php the_post_thumbnail('large', ['class' => 'img-fluid']) ?>
                            </div>
                        </div>
                    <?php endif;*/ ?>
                <?php endwhile;
            endif; ?>
        
        </div>
    </div>

    <?php
    // Citazione
    $citazione = get_field('citazione');
    $autore_citazione = get_field('autore_citazione');
    if ( $citazione || $autore_citazione ) : ?>
        <div class="quote-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="quote-text"><p><?php echo $citazione; ?></p></div>
                        <div class="quote-author"><?php echo $autore_citazione ?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php 
    // Staff
    $persone_titolo = get_field('persone_titolo');
    $persone_testo_intro = get_field('persone_testo_intro');
    ?>
    <div class="container staff-wrapper">
        <div class="row">
            <?php if ( $persone_titolo ) : ?>
                <div class="col-12">
                    <h2 class="title before-square"><?php echo $persone_titolo; ?></h2>
                    <div class="text-intro">
                        <?php echo $persone_testo_intro; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="row">
                    <?php
                    // Staff
                    $args = array(
                        'post_type'              => array( 'staff' ),
                        'post_status'            => array( 'publish' ),
                        'posts_per_page'         => '99',
                    );
                    $pagination = true;
                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $read_more = 'false';
                            get_template_part('partials/loop/staff');
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php get_footer(); ?>