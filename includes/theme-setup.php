<?php
if ( !function_exists('eazy_2021_theme_setup') ) {
    function eazy_2021_theme_setup() {
        // Languages
        load_theme_textdomain( 'eazytheme', get_template_directory() . '/languages/' );

        // Media
        add_theme_support( 'post-thumbnails' );
        add_image_size( '620x400', 620, 400, true );
        add_image_size( '400x400', 400, 400, true );
        add_image_size( '400x195', 400, 195, true );

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
            default:
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
?>