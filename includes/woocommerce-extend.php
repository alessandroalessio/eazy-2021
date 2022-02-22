<?php
/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'eazy_2021_woocommerce_breadcrumbs' );
function eazy_2021_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &gt; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><div class="container">',
            'wrap_after'  => '</div></nav>',
            // 'before'      => '',
            // 'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
?>