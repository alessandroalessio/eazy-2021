<?php
function eazy_2021_customize_register( $wp_customize ) {
   /**
     * Global Section
     */
    $wp_customize->add_section( 'eazy_2021_global_section' , array(
      'title'      => __( 'Global', 'eazytheme' ),
      'priority'   => 80
  ) );
  // Preloader
  $wp_customize->add_setting( 'eazy_2021_global_show_preloader' , array(
       'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_global_show_preloader', array(
      'id'        => 'eazy_2021_global_show_preloader', 
      'type'      => 'checkbox',
      'label'     => __( 'Show Preloader', 'eazytheme' ),
      'section'   => 'eazy_2021_global_section',
      'settings'  => 'eazy_2021_global_show_preloader'
   ) );
  $wp_customize->add_setting( 'eazy_2021_global_custom_preloader_html' , array(
   'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_global_custom_preloader_html', array(
   'id'        => 'eazy_2021_global_custom_preloader_html', 
   'type'      => 'textarea',
   'label'     => __( 'Custom Preloader (CSS code)', 'eazytheme' ),
   'section'   => 'eazy_2021_global_section',
   'settings'  => 'eazy_2021_global_custom_preloader_html'
   ) );
   // Logo
   $wp_customize->add_setting( 'eazy_2021_global_custom_preloader_image' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'eazy_2021_global_custom_preloader_image', array(
      'id'        => 'eazy_2021_global_custom_preloader_image', 
      'label'     => __( 'Preloader Image', 'eazytheme' ),
      'section'   => 'eazy_2021_global_section',
      'settings'  => 'eazy_2021_global_custom_preloader_image'
   ) ) );
   $wp_customize->add_setting( 'eazy_2021_global_show_custom_pointer' , array(
         'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_global_show_custom_pointer', array(
      'id'        => 'eazy_2021_global_show_custom_pointer', 
      'type'      => 'checkbox',
      'label'     => __( 'Show Custom Pointer', 'eazytheme' ),
      'description' => __('Require CSS', 'eazytheme'),
      'section'   => 'eazy_2021_global_section',
      'settings'  => 'eazy_2021_global_show_custom_pointer'
   ) );
    /**
     * Header Section
     */
    $wp_customize->add_section( 'eazy_2021_header_section' , array(
        'title'      => __( 'Header', 'eazytheme' ),
        'priority'   => 90
    ) );
    // Show TopBar
    $wp_customize->add_setting( 'eazy_2021_header_show_topbar' , array(
         'default'		=> '',
     ) );
     $wp_customize->add_control( 'eazy_2021_header_show_topbar', array(
        'id'        => 'eazy_2021_header_show_topbar', 
        'type'      => 'checkbox',
        'label'     => __( 'Show Topbar', 'eazytheme' ),
        'section'   => 'eazy_2021_header_section',
        'settings'  => 'eazy_2021_header_show_topbar'
     ) );
     // Header Type
     $wp_customize->add_setting( 'eazy_2021_header_layout_type', array(
      'default' => 'standard',
    ) );
    
    $wp_customize->add_control( 'eazy_2021_header_layout_type', array(
      'type' => 'select',
      'section' => 'eazy_2021_header_section', // Add a default or your own section
      'label' => __( 'Header Layout TYpe', 'eazytheme' ),
      'choices' => array(
        'standard' => __( 'Logo on left - Nav on right' ),
        'center' => __( 'Logo centered on top - Nav on bottom' ),
      ),
    ) );
     // Logo
    $wp_customize->add_setting( 'eazy_2021_header_logo' , array(
            'default'		=> '',
      ) );
      $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'eazy_2021_header_logo', array(
         'id'        => 'eazy_2021_header_logo', 
         'label'     => __( 'Logo', 'eazytheme' ),
         'section'   => 'eazy_2021_header_section',
         'settings'  => 'eazy_2021_header_logo'
      ) ) );
      // Header Fixed on Scroll
    $wp_customize->add_setting( 'eazy_2021_header_fixed_on_scroll' , array(
         'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_header_fixed_on_scroll', array(
      'id'        => 'eazy_2021_header_fixed_on_scroll', 
      'type'      => 'checkbox',
      'label'     => __( 'Fixed on Scroll', 'eazytheme' ),
      'section'   => 'eazy_2021_header_section',
      'settings'  => 'eazy_2021_header_fixed_on_scroll'
   ) );
      
   /**
    * Navigation Section
    */
   $wp_customize->add_section( 'eazy_2021_navigation_section' , array(
      'title'      => __( 'Navigation', 'eazytheme' ),
      'priority'   => 90
   ) );
   // Show Breadcrumb
   $wp_customize->add_setting( 'eazy_2021_navigation_type' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_navigation_type', array(
      'id'        => 'eazy_2021_navigation_type', 
      'type'      => 'radio',
      'label'     => __( 'Navigation Type', 'eazytheme' ),
      'section'   => 'eazy_2021_navigation_section',
      'settings'  => 'eazy_2021_navigation_type',
      'choices' => array(
         '' => __( 'Standard' ),
         'fullsize' => __( 'Full Size Overlay' ),
       ),
   ) );
      /**
     * Breadcrumb Section
     */
      $wp_customize->add_section( 'eazy_2021_breadcrumb_section' , array(
         'title'      => __( 'Breadcrumb', 'eazytheme' ),
         'priority'   => 92
   ) );
   // Show Breadcrumb
   $wp_customize->add_setting( 'eazy_2021_breadcrumb_show' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_breadcrumb_show', array(
      'id'        => 'eazy_2021_breadcrumb_show', 
      'type'      => 'checkbox',
      'label'     => __( 'Show Breadcrumb', 'eazytheme' ),
      'section'   => 'eazy_2021_breadcrumb_section',
      'settings'  => 'eazy_2021_breadcrumb_show'
   ) );
   // Show Title in Breadcrumb
   $wp_customize->add_setting( 'eazy_2021_breadcrumb_show_title' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_breadcrumb_show_title', array(
      'id'        => 'eazy_2021_breadcrumb_show_title', 
      'type'      => 'checkbox',
      'label'     => __( 'Show Title', 'eazytheme' ),
      'section'   => 'eazy_2021_breadcrumb_section',
      'settings'  => 'eazy_2021_breadcrumb_show_title'
   ) );

    /**
     * Contacts Section
     */
    $wp_customize->add_section( 'eazy_2021_contacts_section' , array(
        'title'      => __( 'Contacts', 'eazytheme' ),
        'priority'   => 100
    ) );
    // Email
    $wp_customize->add_setting( 'eazy_2021_contacts_email' , array(
         'default'		=> '',
         'sanitize_callback' => 'sanitize_email'
     ) );
     $wp_customize->add_control( 'eazy_2021_contacts_email', array(
        'id'        => 'eazy_2021_contacts_fb', 
        'label'     => __( 'Email', 'eazytheme' ),
        'section'   => 'eazy_2021_contacts_section',
        'settings'  => 'eazy_2021_contacts_email'
     ) );
    // Phone
    $wp_customize->add_setting( 'eazy_2021_contacts_phone' , array(
        'default'		=> '',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ) );
    $wp_customize->add_control( 'eazy_2021_contacts_phone', array(
       'id'        => 'eazy_2021_contacts_fb', 
       'label'     => __( 'Phone', 'eazytheme' ),
       'section'   => 'eazy_2021_contacts_section',
       'settings'  => 'eazy_2021_contacts_phone'
    ) );
     // Facebook
     $wp_customize->add_setting( 'eazy_2021_contacts_fb' , array(
        'default'		=> '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( 'eazy_2021_contacts_fb', array(
       'id'        => 'eazy_2021_contacts_fb', 
       'label'     => __( 'Facebook', 'eazytheme' ),
       'section'   => 'eazy_2021_contacts_section',
       'settings'  => 'eazy_2021_contacts_fb'
    ) );
    // Instagram
    $wp_customize->add_setting( 'eazy_2021_contacts_ig' , array(
       'default'		=> '',
       'sanitize_callback' => 'esc_url_raw'
   ) );
   $wp_customize->add_control( 'eazy_2021_contacts_ig', array(
      'id'        => 'eazy_2021_contacts_ig', 
      'label'     => __( 'Instagram', 'eazytheme' ),
      'section'   => 'eazy_2021_contacts_section',
      'settings'  => 'eazy_2021_contacts_ig'
   ) );
   // Linkedin
   $wp_customize->add_setting( 'eazy_2021_contacts_lk' , array(
      'default'		=> '',
      'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_control( 'eazy_2021_contacts_lk', array(
     'id'        => 'eazy_2021_contacts_lk', 
     'label'     => __( 'Linkedin', 'eazytheme' ),
     'section'   => 'eazy_2021_contacts_section',
     'settings'  => 'eazy_2021_contacts_lk'
  ) );
   // Twitter
   $wp_customize->add_setting( 'eazy_2021_contacts_tw' , array(
      'default'		=> '',
      'sanitize_callback' => 'esc_url_raw'
  ) );
  $wp_customize->add_control( 'eazy_2021_contacts_tw', array(
     'id'        => 'eazy_2021_contacts_tw', 
     'label'     => __( 'Twitter', 'eazytheme' ),
     'section'   => 'eazy_2021_contacts_section',
     'settings'  => 'eazy_2021_contacts_tw'
  ) );
  // YouTube
  $wp_customize->add_setting( 'eazy_2021_contacts_yt' , array(
     'default'		=> '',
     'sanitize_callback' => 'esc_url_raw'
 ) );
 $wp_customize->add_control( 'eazy_2021_contacts_yt', array(
    'id'        => 'eazy_2021_contacts_yt', 
    'label'     => __( 'YouTube', 'eazytheme' ),
    'section'   => 'eazy_2021_contacts_section',
    'settings'  => 'eazy_2021_contacts_yt'
 ) );
 // Whatsapp
 $wp_customize->add_setting( 'eazy_2021_contacts_whatsapp' , array(
    'default'		=> '',
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'eazy_2021_contacts_whatsapp', array(
   'id'        => 'eazy_2021_contacts_whatsapp', 
   'label'     => __( 'Whatsapp', 'eazytheme' ),
   'section'   => 'eazy_2021_contacts_section',
   'settings'  => 'eazy_2021_contacts_whatsapp'
) );

 
   /**
     * Before Footer Section
     */
   $wp_customize->add_section( 'eazy_2021_before_footer_section' , array(
      'title'      => __( 'Before Footer', 'eazytheme' ),
      'priority'   => 100
   ) );
   $wp_customize->add_setting( 'eazy_2021_before_footer_bg' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'eazy_2021_before_footer_bg', array(
      'id'        => 'eazy_2021_before_footer_bg', 
      'label'     => __( 'Background', 'eazytheme' ),
      'section'   => 'eazy_2021_before_footer_section',
      'settings'  => 'eazy_2021_before_footer_bg'
   ) ) );
   $wp_customize->add_setting( 'eazy_2021_before_footer_text' , array(
         'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_before_footer_text', array(
      'id'        => 'eazy_2021_before_footer_text', 
      'type'      => 'textarea',
      'label'     => __( 'Text', 'eazytheme' ),
      'section'   => 'eazy_2021_before_footer_section',
      'settings'  => 'eazy_2021_before_footer_text'
   ) );
   $wp_customize->add_setting( 'eazy_2021_before_footer_bg_alt' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'eazy_2021_before_footer_bg_alt', array(
      'id'        => 'eazy_2021_before_footer_bg_alt', 
      'label'     => __( 'Background', 'eazytheme' ),
      'section'   => 'eazy_2021_before_footer_section',
      'settings'  => 'eazy_2021_before_footer_bg_alt'
   ) ) );
   $wp_customize->add_setting( 'eazy_2021_before_footer_text_alt' , array(
         'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_before_footer_text_alt', array(
      'id'        => 'eazy_2021_before_footer_text_alt', 
      'type'      => 'textarea',
      'label'     => __( 'Text', 'eazytheme' ),
      'section'   => 'eazy_2021_before_footer_section',
      'settings'  => 'eazy_2021_before_footer_text_alt'
   ) );
   /**
     * Footer Section
     */
    $wp_customize->add_section( 'eazy_2021_footer_section' , array(
      'title'      => __( 'Footer', 'eazytheme' ),
      'priority'   => 100
  ) );
   // Logo
  $wp_customize->add_setting( 'eazy_2021_footer_logo' , array(
          'default'		=> '',
    ) );
    $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'eazy_2021_footer_logo', array(
       'id'        => 'eazy_2021_footer_logo', 
       'label'     => __( 'Logo', 'eazytheme' ),
       'section'   => 'eazy_2021_footer_section',
       'settings'  => 'eazy_2021_footer_logo'
    ) ) );
    // Text
    $wp_customize->add_setting( 'eazy_2021_footer_text' , array(
         'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_footer_text', array(
      'id'        => 'eazy_2021_footer_text', 
      'type'      => 'textarea',
      'label'     => __( 'Text', 'eazytheme' ),
      'section'   => 'eazy_2021_footer_section',
      'settings'  => 'eazy_2021_footer_text'
   ) );
   // Show Pre Footer
   $wp_customize->add_setting( 'eazy_2021_prefooter_show' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_prefooter_show', array(
      'id'        => 'eazy_2021_prefooter_show', 
      'type'      => 'checkbox',
      'label'     => __( 'Show PreFooter', 'eazytheme' ),
      'section'   => 'eazy_2021_footer_section',
      'settings'  => 'eazy_2021_prefooter_show'
   ) );
   // Items in Pre Footer
   $wp_customize->add_setting( 'eazy_2021_prefooter_item' , array(
       'default'		=> '3'
   ) );
   $wp_customize->add_control( 'eazy_2021_prefooter_item', array(
      'id'        => 'eazy_2021_prefooter_item',
      'type'      => 'number',
      'label'     => __( 'Pre Footer Items', 'eazytheme' ),
      'section'   => 'eazy_2021_footer_section',
      'settings'  => 'eazy_2021_prefooter_item'
   ) );

   
    /**
     * Third Parts Section
     */
    $wp_customize->add_section( 'eazy_2021_third_parts_section' , array(
      'title'      => __( 'Third Parts', 'eazytheme' ),
      'priority'   => 110
   ) );
   // Google Maps API Key
   $wp_customize->add_setting( 'eazy_2021_third_parts_google_maps_apikey' , array(
         'default'		=> '',
      ) );
   $wp_customize->add_control( 'eazy_2021_third_parts_google_maps_apikey', array(
         'id'        => 'eazy_2021_third_parts_fb', 
         'label'     => __( 'Google Maps Api Key', 'eazytheme' ),
         'section'   => 'eazy_2021_third_parts_section',
         'settings'  => 'eazy_2021_third_parts_google_maps_apikey'
   ) );
   // Use jQuery
   $wp_customize->add_setting( 'eazy_2021_third_parts_use_jquery' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_third_parts_use_jquery', array(
      'id'        => 'eazy_2021_third_parts_use_jquery', 
      'type'      => 'checkbox',
      'label'     => __( 'Use jQuery', 'eazytheme' ),
      'section'   => 'eazy_2021_third_parts_section',
      'settings'  => 'eazy_2021_third_parts_use_jquery'
   ) );
   // Use CDN
   $wp_customize->add_setting( 'eazy_2021_third_parts_use_cdn' , array(
      'default'		=> '',
   ) );
   $wp_customize->add_control( 'eazy_2021_third_parts_use_cdn', array(
      'id'        => 'eazy_2021_third_parts_use_cdn', 
      'type'      => 'checkbox',
      'label'     => __( 'Use CDN', 'eazytheme' ),
      'section'   => 'eazy_2021_third_parts_section',
      'settings'  => 'eazy_2021_third_parts_use_cdn'
   ) );
   // Use External Scripts
   $allowed_external_scripts = [ 'Bootstrap 4', 'Fontawesome 5', 'Fancybox 3', 'OWL Carousel', 'Ionicons 5', 'Select 2', 'AOS' ];
   foreach ( $allowed_external_scripts AS $i => $script_name ) {
      $script_slug = strtolower( str_replace([' '], ['_'], $script_name) );
      $wp_customize->add_setting( 'eazy_2021_third_parts_external_'.$script_slug , array(
         'default'		=> '',
      ) );
      $wp_customize->add_control( 'eazy_2021_third_parts_external_'.$script_slug, array(
         'id'        => 'eazy_2021_third_parts_external_'.$script_slug, 
         'type'      => 'checkbox',
         'label'     => __( 'Use external '.$script_name, 'eazytheme' ),
         'section'   => 'eazy_2021_third_parts_section',
         'settings'  => 'eazy_2021_third_parts_external_'.$script_slug
      ) );
   }
}
add_action( 'customize_register', 'eazy_2021_customize_register' );

// Option Theme Name to get Options list
$default_option_theme = 'eazy-2021';
$theme_object = wp_get_theme();
if ( is_object($theme_object) ) $default_option_theme = $theme_object->template;

// Get all Options
$EAZY_2021_OPT = get_option('theme_mods_'.$default_option_theme);