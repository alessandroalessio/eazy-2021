<?php
/**
 * Customizer
 */
require 'includes/customizer.php';
/**
 * Theme Helpers
 */
require 'includes/helpers.php';
/**
 * Shortcodes
 */
require 'includes/shortcodes/social_icons.php';
/**
 * Theme Setup
 */
if ( !function_exists('eazy_2021_theme_setup') ) {
    function eazy_2021_theme_setup() {
        // Languages
        load_theme_textdomain( 'eazytheme', get_template_directory() . '/languages/' );

        // Media
        add_theme_support( 'post-thumbnails' );
        add_image_size( '400x400', 400, 400, true );

        // Navigations
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'eazytheme' ),
        ) );
        register_nav_menus( array(
            'footer' => esc_html__( 'Footer', 'eazytheme' ),
        ) );

        // Sidebar
        switch( eazy_get_option('prefooter_item') ){
            case '1': $prefooter_column_size = 12; break;
            case '2': $prefooter_column_size = 6; break;
            case '3': $prefooter_column_size = 4; break;
            case '4': $prefooter_column_size = 3; break;
        }
        register_sidebar( array(
            'name'          => __( 'Footer Sidebar', 'eazytheme' ),
            'id'            => 'prefooter',
            'before_widget'=> '<div class="col-md-'.$prefooter_column_size.'">',
            'after_widget'=> '</div>',
        ) );
        register_sidebar( array(
            'name'          => __( 'Page Sidebar', 'eazytheme' ),
            'id'            => 'page-sidebar',
            'before_widget'=> '',
            'after_widget'=> '',
        ) );

        // Remove usefull HTML
        if ( !is_admin() ) {
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );	
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
            add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
            remove_action( 'wp_head', 'wp_generator' );
            remove_action( 'wp_head', 'rsd_link' );
            remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
            remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
            remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
            remove_action( 'wp_head', 'wlwmanifest_link' );
            remove_action( 'wp_head', 'wp_shortlink_wp_head');
        }

        // Navigation Walker for Bootstrap
        require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';

        // Add Woocommerce Support
	    add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'eazy_2021_theme_setup' );
}
/**
 * Remove Unused CSS
 */
function eazy_2021_remove_unused_styles() {

    // Removing Gutemberg Data
    if ( class_exists( 'Classic_Editor' ) ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-block-style' );
    }

}
add_action( 'wp_enqueue_scripts', 'eazy_2021_remove_unused_styles' );
/**
 * Script & Styles
 */
function eazy_2021_theme_scripts_styles() {

    global $wp_query;
    $file_version = '1.1'.time();
    $use_CDN = eazy_get_option('third_parts_use_cdn');
    $use_jQuery = eazy_get_option('third_parts_use_jquery');

    // Styles
    if ( $use_CDN ) {
        // wp_enqueue_style( 'bootstrap-4', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/css/bootstrap.min.css' );
        if (eazy_get_option('third_parts_external_fontawesome_5') ) wp_enqueue_style( 'fa-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
        if (eazy_get_option('third_parts_external_fancybox_3') ) wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
        if (eazy_get_option('third_parts_external_owl_carousel') ) wp_enqueue_style( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
        if (eazy_get_option('third_parts_external_owl_carousel') ) wp_enqueue_style( 'owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css' );
        if (eazy_get_option('third_parts_external_select_2') ) wp_enqueue_style( 'select-2-theme', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
        if (eazy_get_option('third_parts_external_aos') ) wp_enqueue_style( 'aos-theme', 'https://unpkg.com/aos@next/dist/aos.css' );
    }
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', null, $file_version );
    // wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), $file_version );
    
    // Fractional Style
    if ( is_page() ) {
        if ( is_page_template() && file_exists(__DIR__.'/build/css/pages/'.eazy_get_page_template_slug_clean() . '.css')  ) {
            wp_enqueue_style( eazy_get_page_template_slug_clean(), get_template_directory_uri() . '/build/css/pages/'.eazy_get_page_template_slug_clean() . '.css', null, $file_version );
        }
    }
    if ( is_post_type_archive() && file_exists(__DIR__.'/build/css/loop/'.get_post_type().'.css') ){
        wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/' . get_post_type() . '.css', null, $file_version );
    }
    if ( is_singular() && file_exists(__DIR__.'/build/css/loop/single-'.get_post_type().'.css') ){
        wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/single-' . get_post_type() . '.css', null, $file_version );
    }
    if ( is_tax() ) {
        wp_enqueue_style( 'tax-'.$wp_query->query_vars['taxonomy'], get_template_directory_uri() . '/build/css/taxonomy/tax-' . $wp_query->query_vars['taxonomy'] . '.css', null, $file_version );
    }
    if ( eazy_is_blog() ){
        if ( file_exists(__DIR__.'/build/css/loop/single-article.css') && is_singular() ){
            wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/single-article.css', null, $file_version );
        } else {
            if ( file_exists(__DIR__.'/build/css/loop/article.css') ){
                wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/article.css', null, $file_version );
            }
        }
    }

    // Scripts
    if ( $use_jQuery ) {
        wp_enqueue_script('jquery');
    }
    if ( $use_CDN ) {
        if (eazy_get_option('third_parts_external_bootstrap_4') ) wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_bootstrap_4') ) wp_enqueue_script('bootstrap-4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_fancybox_3') ) wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_owl_carousel') ) wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_select_2') ) wp_enqueue_script('select-2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_aos') ) wp_enqueue_script( 'aos', 'https://unpkg.com/aos@next/dist/aos.js#asyncload', array(), '', true );
    }

    
    // Fractional Style
    // if ( is_post_type_archive() && get_post_type()=='testimonials' ){
    //     wp_enqueue_script('bootstrap-masonry', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js#asyncload', array(), '', true );
    // }
    wp_enqueue_script('theme', get_template_directory_uri() . '/build/js/theme.min.js#asyncload', array(), '', true );
    wp_enqueue_script( 'my-theme-ionicons', 'https://unpkg.com/ionicons@5.2.3/dist/ionicons.js', array(), '5.2.3', true );
    if ( is_tax() ) {
        wp_enqueue_script( 'tax-'.$wp_query->query_vars['taxonomy'], get_template_directory_uri() . '/build/js/taxonomy/tax-' . $wp_query->query_vars['taxonomy'] . '.js', null, $file_version );
    }


    // Internet Explorer HTML5 support
    // wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    // wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

}
add_action( 'get_footer', 'eazy_2021_theme_scripts_styles' );
/**
 * Adding Mime Type Webp
 */
function eazy_2021_webp_upload_mimes( $existing_mimes ) {
	$existing_mimes['webp'] = 'image/webp';
	return $existing_mimes;
}
add_filter( 'mime_types', 'eazy_2021_webp_upload_mimes' );
/**
 * Custom Wordpress Gallery
 */
add_filter('post_gallery', 'eazy_2021_post_gallery', 10, 2);
function eazy_2021_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    switch($columns){
        default: $class_colum = 'col-lg-4 col-md-4 col-6'; break;
        case 4: $class_colum = 'col-lg-3 col-md-3 col-6'; break;
        case 5:
        case 6:
            $class_colum = 'col-lg-2 col-md-2 col-6'; break;
    }

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    $output = "<div class=\"row wp-gallery\">\n";
    foreach ($attachments as $id => $attachment) {
        $img_medium = wp_get_attachment_image_src($id, 'medium');
        $img_large = wp_get_attachment_image_src($id, 'large');

        $output .= "<a href=\"".$img_large[0]."\" data-fancybox=\"gallery\"  class=\"gallery-item ".$class_colum."\" style=\"background-image: url(".$img_medium[0].");  \"><span></span></a>\n";
    }
    $output .= "</div>\n";

    return $output;
}
/**
 * Add Async for Javascript
 */
if (!is_admin()) {
    function eazy_2021_add_async_forscript($url) {
        if (strpos($url, '#asyncload')===false)
            return $url;
        else if (is_admin())
            return str_replace('#asyncload', '', $url);
        else
            return str_replace('#asyncload', '', $url)."' async='async"; 
    }
    add_filter('clean_url', 'eazy_2021_add_async_forscript', 11, 1);
}
/**
 * Remove <p> from Contact Form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Require WYSIWYG for Taxonomy
 */
require 'includes/wysiwyg-taxonomy-description.php';

/**
 * Include Woocommerce
 */
if ( class_exists( 'WooCommerce' ) ) {
    include 'includes/woocommerce-extend.php';
}

/**
 * 
 */

//Define AJAX URL
function tekness_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
add_action('wp_head', 'tekness_ajaxurl');

//The Javascript
/*function add_this_script_footer(){
    if ( is_tax() ) : ?>
        <script>
        jQuery(document).ready(function($) {
            
        });
        </script>
    <?php endif;
}
add_action('wp_footer', 'add_this_script_footer');*/

//The PHP
function catalogue_ajax_request() {
    global $wp_query;
    $taxonomy_catalogue = 'tipo_catalogo';

    $attribs_array = [];
    foreach( $_REQUEST as $reqfield => $reqitems ) {
        if ( substr($reqfield, 0, 5)=='attr_' ){
            array_push( $attribs_array, [
                'key' => str_replace('attr_', '', $reqfield),
                'value' => str_replace('|', ',', $reqitems),
                'operator' => 'IN',
            ]);
        }
    }
    // vd($attribs_array);
    // die();

    // WP_Query arguments
    $args = array(
        'post_type'              => array( 'catalogo' ),
            'post_status'            => array( 'publish' ),
            'order'                  => 'ASC',
            'orderby'                => 'menu_order',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_catalogue,
                    'field' => 'id',
                    'operator' => 'IN',
                    'terms'    => array($_REQUEST['tipo_catalogo']),
                ),
            ),
            'meta_query' => $attribs_array
    );
    
    
    $query = new WP_Query( $args );
    // vd($query);
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part('partials/loop/product');
        }
    } else {
        echo __('Nessun prodotto per questa categoria');
    }

    // Restore original Post Data
    wp_reset_postdata();
   die();
}
// This bit is a special action hook that works with the WordPress AJAX functionality.
add_action( 'wp_ajax_catalogue_ajax_request', 'catalogue_ajax_request' );
add_action( 'wp_ajax_nopriv_catalogue_ajax_request', 'catalogue_ajax_request' ); 

// Get All Post Custom Values
function get_post_custom_values_all($meta_key){
    global $wpdb;
    $results = $wpdb->get_results('SELECT meta_value AS value FROM wp_postmeta WHERE meta_key="'.$meta_key.'" GROUP BY meta_value');
    return $results;
}

// ACF Google Maps Api
function eazy_acf_google_map_api( $api ){
    if ( eazy_get_option('third_parts_google_maps_apikey') && eazy_get_option('third_parts_google_maps_apikey')!="" )  {
        $api['key'] = eazy_get_option('third_parts_google_maps_apikey');
        return $api;
    }
}
add_filter('acf/fields/google_map/api', 'eazy_acf_google_map_api');
?>