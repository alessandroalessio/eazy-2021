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
get_template_part('partials/page-hero');
?>

<?php
// Projects Categories
get_template_part('partials/general-tax-loop', null, [
    'taxonomy' => 'project_categories',
    'hide_empty' => 0,
    'parent' => 0,
    'before_title' => 'Progetti',
    'before_desc' => 'Scopri come puoi partecipare alle attività dell’associazione',
]);
?>

<?php
// Events & News
get_template_part('partials/general-loop', null, [
    'posts_per_page' => 2,
    'before_title' => 'Eventi &amp; News',
    'before_desc' => 'Resta aggiornato e non perderti eventi o novità',
    'after_link_label' => 'Leggi tutte le notizie'
]);
?>

<?php
// Repeatable Elements
get_template_part('partials/general-repeatable-elements', null, [
    'template' => null
]);
?>

<?php get_footer(); ?>
