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
 * Theme Setup
 */
if ( !function_exists('eazy_2021_theme_setup') ) {
    function eazy_2021_theme_setup() {
        // Languages
        load_theme_textdomain( 'eazytheme', get_template_directory() . '/languages/' );

        // Media
        add_theme_support( 'post-thumbnails' );

        // Navigations
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'eazytheme' ),
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

    $file_version = '1';

    // Styles
    wp_enqueue_style( 'bootstrap-4', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/css/bootstrap.min.css' );
    wp_enqueue_style( 'fa-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
    wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
    wp_enqueue_style( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', null, $file_version );
    
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
    if ( eazy_is_blog() ){
        if ( file_exists(__DIR__.'/build/css/loop/article.css') ){
            wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/article.css', null, $file_version );
        }
    }

    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js#asyncload', array(), '', true );
    wp_enqueue_script('bootstrap-4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js#asyncload', array(), '', true );
    wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js#asyncload', array(), '', true );
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js#asyncload', array(), '', true );
    if ( is_post_type_archive() && get_post_type()=='testimonials' ){
        wp_enqueue_script('bootstrap-masonry', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js#asyncload', array(), '', true );
    }
    wp_enqueue_script('theme', get_template_directory_uri() . '/build/js/theme.min.js#asyncload', array(), '', true );

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

        $output .= "<a href=\"".$img_large[0]."\" data-fancybox=\"gallery\"  class=\"gallery-item col-lg-3 col-md-4 col-6\" style=\"background-image: url(".$img_medium[0].");  \"><span></span></a>\n";
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