<?php
// Define path and URL to the ACF plugin.
define( 'EAZY_2021_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'EAZY_2021_ACF_PATH_FIELDS', get_stylesheet_directory() . '/includes/acf-fields' );
define( 'EAZY_2021_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( EAZY_2021_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'eazy_2021_acf_settings_url');
function eazy_2021_acf_settings_url( $url ) {
    return EAZY_2021_ACF_URL;
}

// (Optional) Hide the ACF admin menu item for not Administrators
if( !current_user_can('administrator') ) {
    add_filter('acf/settings/show_admin', 'eazy_2021_acf_settings_show_admin');
    function eazy_2021_acf_settings_show_admin( $show_admin ) {
        return false;
    }
}

// Save Fields to JSON
add_filter('acf/settings/save_json', 'eazy_2021_acf_json_save_point');
function eazy_2021_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/includes/acf-fields';
}

// Load Fields to JSON
add_filter('acf/settings/load_json', 'eazy_2021_acf_json_load_point');
function eazy_2021_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/includes/acf-fields';
    return $paths;    
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