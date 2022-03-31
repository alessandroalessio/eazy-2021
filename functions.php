<?php
define('EAZY_2021_THEME_PATH', get_template_directory());

/**
 * Customizer
 */
require 'includes/customizer.php';

/**
 * Theme Helpers
 */
require 'includes/helpers.php';
require 'includes/advanced-custom-fields.php';
require 'includes/ace-editor-for-cf7.php';

/**
 * Custom Fields
 */
include_once EAZY_2021_ACF_PATH_FIELDS.'/acf-page.php';
if ( file_exists( EAZY_2021_ACF_PATH_FIELDS.'/acf-page-home.php' ) ) include_once EAZY_2021_ACF_PATH_FIELDS.'/acf-page-home.php';
if ( file_exists( EAZY_2021_ACF_PATH_FIELDS.'/acf-page-onepage.php' ) ) include_once EAZY_2021_ACF_PATH_FIELDS.'/acf-page-onepage.php';
if ( file_exists( EAZY_2021_ACF_PATH_FIELDS.'/acf-page-contacts.php' ) ) include_once EAZY_2021_ACF_PATH_FIELDS.'/acf-page-contacts.php';

/**
 * Shortcodes
 */
require 'includes/shortcodes/social_icons.php';

/**
 * Theme Setup
 */
require 'includes/theme-setup.php';
require 'includes/remove-unused-styles.php';

/**
 * Script & Styles
 */
require 'includes/theme-scripts-styles.php';

/**
 * Extends Mime Type
 */
require 'includes/extend-mime-type.php';

/**
 * Custom Wordpress Gallery
 */
require 'includes/gallery/eazy-custom-gallery.php';

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
?>