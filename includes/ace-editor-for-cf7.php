<?php
/**
 * Occhio gli "add short tag" non funzionano (pare)
 */

if ( is_admin() ) {
    function eazy_2021_html_syntax_cf7(){
        $settings = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );
        if( $settings === false )
        {
            return;
        }
    
        // Abilito il code editor per il il form
        wp_add_inline_script(
            'code-editor',
            sprintf( 'jQuery( function() { wp.codeEditor.initialize( "wpcf7-form", %s ); } );', wp_json_encode( $settings ) )
        );
    }
    add_action( 'admin_print_styles-toplevel_page_wpcf7', 'eazy_2021_html_syntax_cf7');

}