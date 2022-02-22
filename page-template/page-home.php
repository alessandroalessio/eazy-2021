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
if ( (is_array($slider) || is_object($slider)) && count($slider)>0 ) : ?>
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

<?php
// Revolution Slider
$revolution_slider = get_field('shortcode_slider', get_the_ID());
if ( $revolution_slider!='' ) : ?>
    <div class="revolution-slider"><?php echo do_shortcode($revolution_slider); ?></div>
<?php endif; ?>

<?php
// Hero
// get_template_part('partials/page-hero');
?>

<?php
// Banner
$banner_immagine = get_field('banner_immagine');
if ( $banner_immagine!='' ) : ?>
    <div class="container home-banner mt-5" style="background-image: url('<?php echo $banner_immagine['sizes']['400x400'] ?>'); background-size: cover;">
        <?php
        $banner_link = get_field('banner_link');
        $banner_titolo = get_field('banner_titolo');
        $banner_sottotitolo = get_field('banner_sottotitolo');
        ?>
        <div class="col-6 offset-md-6 px-0 text-center">
            <h4 class="banner-title"><?php echo $banner_titolo; ?></h4>
            <p class="banner-text"><?php echo $banner_sottotitolo; ?></p>
            <div class="text-center">
                <a href="<?php echo ( isset($banner_link) ) ? $banner_link : '#'; ?>" class="btn btn-primary rounded-pill btn-lg d-inline-block px-5" title="">
                    Diventa volontario
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ( get_the_content()!='' ) : ?>
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
                            <?php $nascondi_titolo = get_field('nascondi_titolo', get_the_ID() ); ?>
                            <?php if ( !eazy_get_option('breadcrumb_show_title') && !isset($nascondi_titolo) ) : ?>
                                <h2 class="h1 text-center"><?php the_title(); ?></h2>
                            <?php endif; ?>
                        </div>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="col-md-4">
                                <div class="thumb-wrapper">
                                    <?php
                                    the_post_thumbnail('large', [
                                        'class' => 'img-fluid scroll',
                                        'data-ratex' => '-2',
                                        'data-ratey' => '0',
                                        'data-direction' => 'horizontal',
                                    ]) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-8 text-wrapper">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile;
                else :
                    _e('Nothing to display', 'eazytheme');
                endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php
// Categories Catalogue (parent)
$taxonomy_catalogue = 'product_cat';
$catalogue_first_tree = get_terms($taxonomy_catalogue, [
    'hide_empty' => false,
    'parent' => 0
]);

// $catalogue_first_tree = [];
if ( count($catalogue_first_tree)>0 ) : ?>
    <div class="home-catalogue-wrapper">
        <?php foreach ( $catalogue_first_tree AS $k => $itemc ) : ?>
            <?php
            // // Categories Catalogue (child)
            // $catalogue_child = get_terms($taxonomy_catalogue, [
            //     'hide_empty' => false,
            //     'parent' => $itemf->term_id
            // ]);
            // if ( count($catalogue_child)>0 ) : ?>
                <?php //foreach ( $catalogue_child AS $x => $itemc ) : ?>
                    <?php //$color = get_field('colore', $taxonomy_catalogue . '_' . $itemc->term_id); ?>
                    <?php //$color_bg = get_field('colore_di_sfondo', $taxonomy_catalogue . '_' . $itemc->term_id); ?>
                    <div class="container child-wrapper">
                        <div class="row align-items-center <?php echo ($k%2==0) ? 'flex-row-reverse' : ''; ?>">
                            <div class="col-md-6">
                                <div class="left-side pt-5">
                                    <h4 class="sub-title"><?php echo $itemc->name; ?></h4>
                                    <p class="description"><?php echo strip_tags($itemc->description); ?></p>
                                    <a href="<?php echo get_term_link($itemc); ?>" title="<?php echo $itemc->name; ?>"class="text-uppercase btn btn-primary"><strong><?php _e('Scopri', 'eazytheme') ?></strong></a>
                                </div>
                            </div>
                            <?php 
                            $cat_thumbnail_id = get_term_meta( $itemc->term_id, 'thumbnail_id', true );
                            // $main_image = wp_get_attachment_image_src( $cat_thumbnail_id, 'large' );
                            $main_image = wp_get_attachment_image( $cat_thumbnail_id, 'large' ); ?>
                            <div class="col-md-6"><?php echo $main_image ?></div>
                        </div>
                    </div>
                <?php //endforeach; ?>
            <?php //endif; ?>

        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php
// Events
$args = array(
    'post_type'              => array( 'events' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => '3',
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
    <section class="home-events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Incontriamoci</h3>
                    <h2 class="h1 text-center mb-4">eventINvilla</h2>
                </div>
            </div>
            <div class="row">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $read_more = 'false';
                    get_template_part('partials/loop/events');
                }
                ?>
            </div>
            <div class="row">
                <div class="col-12 text-center pt-4">
                    <?php
                    $events_archive_link = get_post_type_archive_link( 'events' );
                    if ( $events_archive_link ) : ?>
                        <a href="<?php echo $events_archive_link; ?>" class="btn btn-primary d-inline-block rounded-pill pl-5 pr-5"><?php _e('Tutti i servizi', 'eazytheme'); ?> <i class="fas fa-angle-right"></i></a>
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
// Servizi
$args = array(
    'post_type'              => array( 'servizi' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => '12',
);
$pagination = false;
$query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
    <section class="home-services">
        <div class="container">
            <div class="col-md-12 text-center">
                <?php if ( get_field('servizi_titolo')!='' ) : ?>
                    <h4 class="title"><?php echo get_field('servizi_titolo'); ?></h4>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php if ( get_field('servizi_testo')!='' ) : ?>
                        <div class="forniture-text"><?php echo get_field('servizi_testo'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <?php
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $read_more = 'true';
                            get_template_part('partials/loop/services');
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php if ( $pagination ) : ?>
                <div class="row">
                    <div class="col-12 text-center pt-4">
                        <?php
                        $events_archive_link = get_post_type_archive_link( 'events' );
                        if ( $events_archive_link ) : ?>
                            <a href="<?php echo $events_archive_link; ?>" class="btn btn-primary d-inline-block rounded-pill pl-5 pr-5"><?php _e('Tutti i servizi', 'eazytheme'); ?> <i class="fas fa-angle-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
wp_reset_postdata();
?>

<?php
// Sections
for ( $i=1; $i<=4; $i++ ) :
    $section = get_field('section_'.$i, get_the_ID());
    if ( isset($section['titolo']) && $section['titolo']!='' ) : ?>
        <div class="section-<?php echo $i; ?> alt-section <?php echo ( $i%2==0 ) ? 'bg-light' : ''; ?>">
            <div class="container">
                <div class="row <?php echo ( $i%2==1 ) ? 'flex-row-reverse' : ''; ?>">

                    <?php if ( $section['immagine'] ) : ?>
                        <div class="col-sm-6">
                            <div class="thumb-wrapper">
                                <?php $image_src = wp_get_attachment_image_src( $section['immagine'], 'thumbnail', false ); ?>
                                <img src="<?php echo $image_src[0]; ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ( $section['testo'] || $section['sottotitolo'] || $section['titolo'] ) : ?>
                        <div class="col-sm-6 text-wrapper">
                            <?php
                            if ( isset($section['sottotitolo']) && $section['sottotitolo']!='' ) : ?>
                                <h3><?php echo $section['sottotitolo']; ?></h3>
                            <?php endif; ?>
                            <?php
                            if ( $section['titolo'] ) : ?>
                                <h2 class="title before-square"><?php echo $section['titolo']; ?></h2>
                            <?php endif; ?>
                            <div class="my-5">
                                <?php  echo $section['testo']; ?>
                            </div>
                            <div class="cta-wrapper">
                                <a href="#" class="btn btn-outline-primary rounded-0 text-uppercase">
                                    <strong>Scopri tecnologie e certificati</strong>
                                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/arrow-forward-outline-orange.png" width="12">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endfor; ?>


<!-- <div class="mb-3 pb-5">
    <?php
    // CTA Row
    $forza_riga_contatti = false;
    // echo get_template_part('partials/before-footer-cta-row') ?>
</div> -->

<?php
// News
$args = array(
    'post_type'              => array( 'post' ),
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => '2',
);
$pagination = false;
$show_posts_row = false;
$query = new WP_Query( $args );

if ( $query->have_posts() && $show_posts_row ) { ?>
    <section class="home-post">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="title text-center">News &amp; Comunicazioni</h4>
                </div>
            </div>
            <div class="row">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $read_more = 'false';
                    get_template_part('partials/loop/articles');
                }
                ?>
            </div>
            <?php if ( $pagination ) : ?>
                <div class="row">
                    <div class="col-12 text-center pt-4">
                        <?php
                        $events_archive_link = get_post_type_archive_link( 'events' );
                        if ( $events_archive_link ) : ?>
                            <a href="<?php echo $events_archive_link; ?>" class="btn btn-primary d-inline-block rounded-pill pl-5 pr-5"><?php _e('Tutti i servizi', 'eazytheme'); ?> <i class="fas fa-angle-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
wp_reset_postdata();
?>

<?php
$forza_riga_contatti = false;
get_footer(); ?>
