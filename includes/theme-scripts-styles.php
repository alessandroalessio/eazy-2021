<?php
function eazy_2021_theme_scripts_styles() {

    global $wp_query;
    $file_version = '1.1'.time();
    $use_CDN = eazy_get_option('third_parts_use_cdn');
    $use_jQuery = eazy_get_option('third_parts_use_jquery');

    // Styles
    if ( $use_CDN ) {
        if (eazy_get_option('third_parts_external_fontawesome_5') ) wp_enqueue_style( 'fa-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
        if (eazy_get_option('third_parts_external_fancybox_3') ) wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css' );
        if (eazy_get_option('third_parts_external_owl_carousel') ) wp_enqueue_style( 'owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
        if (eazy_get_option('third_parts_external_owl_carousel') ) wp_enqueue_style( 'owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css' );
        if (eazy_get_option('third_parts_external_select_2') ) wp_enqueue_style( 'select-2-theme', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
        if (eazy_get_option('third_parts_external_aos') ) wp_enqueue_style( 'aos-theme', 'https://unpkg.com/aos@next/dist/aos.css' );
    }
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', null, $file_version );
    // wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), $file_version );
    
    // Fractional Style
    if ( is_page() ) {
        if ( is_page_template() && file_exists(EAZY_2021_THEME_PATH.'/build/css/pages/'.eazy_get_page_template_slug_clean() . '.css')  ) {
            wp_enqueue_style( eazy_get_page_template_slug_clean(), get_template_directory_uri() . '/build/css/pages/'.eazy_get_page_template_slug_clean() . '.css', null, $file_version );
        }
    }
    if ( is_post_type_archive() && file_exists(EAZY_2021_THEME_PATH.'/build/css/loop/'.get_post_type().'.css') ){
        wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/' . get_post_type() . '.css', null, $file_version );
    }
    if ( is_singular() && file_exists(EAZY_2021_THEME_PATH.'/build/css/loop/single-'.get_post_type().'.css') ){
        wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/single-' . get_post_type() . '.css', null, $file_version );
    }
    if ( is_tax() ) {
        wp_enqueue_style( 'tax-'.$wp_query->query_vars['taxonomy'], get_template_directory_uri() . '/build/css/taxonomy/tax-' . $wp_query->query_vars['taxonomy'] . '.css', null, $file_version );
    }
    if ( eazy_is_blog() ){
        if ( file_exists(EAZY_2021_THEME_PATH.'/build/css/loop/single-article.css') && is_singular() ){
            wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/single-article.css', null, $file_version );
        } else {
            if ( file_exists(EAZY_2021_THEME_PATH.'/build/css/loop/article.css') ){
                wp_enqueue_style( get_post_type(), get_template_directory_uri() . '/build/css/loop/article.css', null, $file_version );
            }
        }
    }

    // Scripts
    if ( $use_jQuery ) wp_enqueue_script('jquery');
    if ( $use_CDN ) {
        if (eazy_get_option('third_parts_external_bootstrap_4') ) wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1/dist/umd/popper.min.js#asyncload', array(), '', true );
        // if (eazy_get_option('third_parts_external_bootstrap_4') ) wp_enqueue_script('bootstrap-4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js#asyncload', array('jquery'), '', true );
        if (eazy_get_option('third_parts_external_bootstrap_4') ) wp_enqueue_script('bootstrap-4', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap.native/3.0.15/bootstrap-native-v4.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_fancybox_3') ) wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_owl_carousel') ) wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_select_2') ) wp_enqueue_script('select-2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js#asyncload', array(), '', true );
        if (eazy_get_option('third_parts_external_aos') ) wp_enqueue_script( 'aos', 'https://unpkg.com/aos@next/dist/aos.js#asyncload', array(), '', true );
    }
    
    // Fractional Style
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
?>