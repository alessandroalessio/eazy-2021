<?php
$maps = get_field('module_maps');
if ( is_string($maps) && substr($maps, 0, 1)=='[' ) : ?>
    <?php echo do_shortcode($maps); ?>
<?php elseif ( eazy_get_option('third_parts_google_maps_apikey') && $maps ) : ?>
    <?php echo $maps ?>
<?php endif; ?>