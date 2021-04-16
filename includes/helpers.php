<?php
/**
 * Clean Page Template Slug
 */
if (!function_exists('eazy_get_page_template_slug_clean')){
    function eazy_get_page_template_slug_clean(){
        return str_replace( ['page-template/', '.php'] , '' , get_page_template_slug() );
    }
}