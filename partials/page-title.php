<?php
$show_title = true;
$nascondi_titolo = get_field('nascondi_titolo', get_the_ID());
$breadcrum_show_title = eazy_get_option('breadcrumb_show_title');
if ( $nascondi_titolo==true ) $show_title = false;
if ( $breadcrum_show_title==true ) $show_title = false; // Show title in breadcrumb
if ( $show_title ) {
    echo '<h1>'; the_title(); echo '</h1>';
}
?>