<?php 
/**
 * Template Name: Contacts
 *
 * @package WordPress
 * @subpackage Eazy 2021
 * @since Eazy 1.0
 */
get_header(); ?>

<?php
get_template_part('partials/page-hero');
?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            
            <div class="col-md-10 offset-md-1 mb-5">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
    
                        // $nascondi_titolo = get_field('nascondi_titolo', get_the_ID());
                        // if ( !eazy_get_option('breadcrumb_show_title') || $nascondi_titolo!==true ) {
                        //     echo '<h1>'; the_title(); echo '</h1>';
                        // }
                        the_content();
    
                    endwhile;
                endif; ?>
            </div>
        
        </div>
    </div>
    
    <?php 
    $contact_form = get_field('contact_form');
    if ( isset($contact_form->ID) ) { ?>
        <div class="row-contact-form pt-4 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <?php echo do_shortcode('[contact-form-7 id="'.$contact_form->ID.'"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <div class="container">
        <div class="row">    
            <?php
            $maps = get_field('maps');
            if ( eazy_get_option('third_parts_google_maps_apikey') && $maps ) : ?>
                <div class="col-12"><?php echo $maps ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>