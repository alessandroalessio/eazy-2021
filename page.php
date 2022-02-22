<?php get_header(); ?>

<?php
// Slider
$enable_slider = false;
if ( $enable_slider ) :
    $immagine_1 = get_field('immagine_1', get_the_ID());
    $immagine_2 = get_field('immagine_2', get_the_ID());
    $immagine_3 = get_field('immagine_3', get_the_ID());
    $immagine_4 = get_field('immagine_4', get_the_ID());
    $immagine_5 = get_field('immagine_5', get_the_ID());
    $immagine_6 = get_field('immagine_6', get_the_ID());
    var_dump($immagine_1);

    $slider = [];
    if ( $immagine_1 ) array_push($slider, $immagine_1);
    if ( $immagine_2 ) array_push($slider, $immagine_2);
    if ( $immagine_3 ) array_push($slider, $immagine_3);
    if ( $immagine_4 ) array_push($slider, $immagine_4);
    if ( $immagine_5 ) array_push($slider, $immagine_5);
    if ( $immagine_6 ) array_push($slider, $immagine_6);

    if ( count($slider)>0 ) : ?>
        <div class="owl-carousel owl-theme">
            <?php foreach( $slider AS $n => $attachment_id ) :
                if ( is_int($attachment_id) ) :
                    $attachment = wp_get_attachment_image_src($attachment_id, 'full'); ?>
                    <div class="item" style="background-image: url('<?php echo $attachment[0]; ?>');"></div>
                <?php
                endif;
            endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php
get_template_part('partials/page-hero');
?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-12">
                        <?php the_content(); ?>
                    </div>
                    <?php /*if ( has_post_thumbnail() ) : ?>
                        <div class="col-sm-4">
                            <div class="thumb-wrapper">
                                <?php the_post_thumbnail('large') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
                        <div class="col-md-3 sidebar-wrapper">
                            <ul id="page-sidebar">
                                <?php dynamic_sidebar( 'page-sidebar' ); ?>
                            </ul>
                        </div>
                    <?php endif;*/ ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>