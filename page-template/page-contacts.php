<?php 
/**
 * Template Name: Contacts
 *
 * @package WordPress
 * @subpackage Eazy 2021
 * @since Eazy 1.0
 */
get_header(); ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
            
            <div class="col">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
    
                        if ( !eazy_get_option('breadcrumb_show_title') ) {
                            echo '<h1>'; the_title(); echo '</h1>';
                        }
                        the_content();
    
                    endwhile;
                endif; ?>
            </div>
    
            <?php 
            $contact_form = get_field('contact_form');
            if ( isset($contact_form->ID) ) { ?>
                <div class="col-md-5">
                    <?php echo do_shortcode('[contact-form-7 id="'.$contact_form->ID.'"]'); ?>
                </div>
            <?php } ?>
    
            <?php
            $maps = get_field('maps');
            if ( eazy_get_option('third_parts_google_maps_apikey') && $maps ) : ?>
                <div class="col-12"><?php echo $maps ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>