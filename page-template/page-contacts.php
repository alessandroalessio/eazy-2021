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
    $contact_form = get_field('module_contacts');
    $contact_form_id = ( is_int($contact_form) ) ? $contact_form : $contact_form->ID;
    if ( isset($contact_form_id) ) { ?>
        <div class="row-contact-form pt-4 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 contact-form-wrapper">
                        <?php echo do_shortcode('[contact-form-7 id="'.$contact_form_id.'"]'); ?>
                    </div>
                    <div class="col-md-6 contact-maps">
                        <?php get_template_part('partials/general-maps'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    
</div>
<?php get_footer(); ?>