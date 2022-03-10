<?php
function eazy_2021_remove_unused_styles() {

    // Removing Gutemberg Data
    if ( class_exists( 'Classic_Editor' ) ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-block-style' );
    }

}
add_action( 'wp_enqueue_scripts', 'eazy_2021_remove_unused_styles' );
?>