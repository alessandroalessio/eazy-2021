<?php
add_filter('post_gallery', 'eazy_2021_post_gallery', 10, 2);
function eazy_2021_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    switch($columns){
        default: $class_colum = 'col-lg-4 col-md-4 col-6'; break;
        case 4: $class_colum = 'col-lg-3 col-md-3 col-6'; break;
        case 5:
        case 6:
            $class_colum = 'col-lg-2 col-md-2 col-6'; break;
    }

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    $output = "<div class=\"row wp-gallery\">\n";
    foreach ($attachments as $id => $attachment) {
        $img_medium = wp_get_attachment_image_src($id, 'medium');
        $img_large = wp_get_attachment_image_src($id, 'large');

        $output .= "<a href=\"".$img_large[0]."\" data-fancybox=\"gallery\"  class=\"gallery-item ".$class_colum."\" style=\"background-image: url(".$img_medium[0].");  \"><span></span></a>\n";
    }
    $output .= "</div>\n";

    return $output;
}
?>