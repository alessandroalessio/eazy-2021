<?php
function eazy_2021_customize_register( $wp_customize ) {
    /**
     * Header Section
     */
    $wp_customize->add_section( 'eazy_2021_header_section' , array(
        'title'      => __( 'Header', 'eazytheme' ),
        'priority'   => 90
    ) );
    // Email
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
}
add_action( 'customize_register', 'eazy_2021_customize_register' );
// Get all Options
$EAZY_2021_OPT = get_option('theme_mods_eazy-2021');