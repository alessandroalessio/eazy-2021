<?php

/**
 *  Shortcode Icons
 */

add_shortcode("social_icons", "eazy_display_social_icons");
 
function eazy_display_social_icons() {  
    $output = '<div class="social-icons">';
        if ( eazy_get_option('contacts_fb') ) $output .= '<a href="'.eazy_get_option('contacts_fb').'" title="'.esc_attr( __('Facebook', 'eazytheme') ).'" class="icon-social fb x2" target="_blank"><i class="fab fa-facebook"></i></a>'; 
        if ( eazy_get_option('contacts_tw') ) $output .= '<a href="'.eazy_get_option('contacts_tw').'" title="'.esc_attr( __('Twitter', 'eazytheme') ).'" class="icon-social lk x2" target="_blank"><i class="fab fa-twitter"></i></a>'; 
        if ( eazy_get_option('contacts_ig') ) $output .= '<a href="'.eazy_get_option('contacts_ig').'" title="'.esc_attr( __('Instagram', 'eazytheme') ).'" class="icon-social ig x2" target="_blank"><i class="fab fa-instagram"></i></a>'; 
        if ( eazy_get_option('contacts_lk') ) $output .= '<a href="'.eazy_get_option('contacts_lk').'" title="'.esc_attr( __('Linkedin', 'eazytheme') ).'" class="icon-social lk x2" target="_blank"><i class="fab fa-linkedin-in"></i></a>'; 
        if ( eazy_get_option('contacts_yt') ) $output .= '<a href="'.eazy_get_option('contacts_yt').'" title="'.esc_attr( __('YouTube', 'eazytheme') ).'" class="icon-social yt x2" target="_blank"><i class="fab fa-youtube"></i></a>';
    $output .= '</div>';
    return $output;
}
?>