<?php 
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Eazy 2021
 * @since Eazy 1.0
 */
get_header(); ?>

<?php
// Slider
$slider = get_field('slider', get_the_ID());
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

<div id="section-1" class="main-wrapper">
    <div class="container">
        <div class="row">
            
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="col-12 pb-4">
                        <?php
                        if ( $subtitle = get_field('sottotitolo', get_the_ID()) ) : ?>
                            <h3 class="text-center"><?php echo $subtitle; ?></h3>
                        <?php endif; ?>
                        <h2 class="h1 text-center"><?php the_title(); ?></h2>
                    </div>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="col-sm-4 offset-md-1">
                            <div class="thumb-wrapper">
                                <?php the_post_thumbnail('large') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-5 text-wrapper">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile;
            else :
                _e('Nothing to display', 'eazytheme');
            endif; ?>
    
        </div>
    </div>
</div>

<?php
// Services
$args = array(
    'post_type'              => array( 'services' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => '3',
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
    <section class="home-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Lorem Ipsum</h3>
                    <h2 class="h1 text-center mb-4">Servizi</h2>
                </div>
            </div>
            <div class="row">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $read_more = 'false';
                    get_template_part('partials/loop/services');
                }
                ?>
            </div>
            <div class="row">
                <div class="col-12 text-center pt-4">
                    <?php 
                    $services_archive_link = get_post_type_archive_link( 'services' );
                    if ( $services_archive_link ) : ?>
                        <a href="<?php echo $services_archive_link; ?>" class="btn btn-primary d-inline-block rounded-pill pl-5 pr-5"><?php _e('Tutti i servizi', 'eazytheme'); ?> <i class="fas fa-angle-right"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
wp_reset_postdata();
?>

<?php
$chi_siamo_data = get_field('chi_siamo', get_the_ID());

if ( count($chi_siamo_data)>0 ): ?>
    <section class="home-teams">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ( $chi_siamo_data['sottotitolo']!='' ) : ?>
                        <h3 class="text-center"><?php echo $chi_siamo_data['sottotitolo']; ?></h3>
                    <?php endif; ?>
                    <h2 class="h1 text-center"><?php echo $chi_siamo_data['titolo']; ?></h2>
                </div>
            </div>
            <?php if ( isset($chi_siamo_data['immagine'])!='' ) : ?>
                <div class="row pt-4 pb-4">
                    <div class="col-12">
                        <?php echo wp_get_attachment_image($chi_siamo_data['immagine'], 'full', false, ['class' => 'img-fluid']); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="text-column-2">
                        <?php echo $chi_siamo_data['testo']; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 link-wrapper text-center">
                    <?php echo $chi_siamo_data['bottone_team']; ?>
                    <span class="button"><?php echo $chi_siamo_data['bottone_federico_ferraris']; ?></span>
                    <?php echo $chi_siamo_data['bottone_atelier']; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>