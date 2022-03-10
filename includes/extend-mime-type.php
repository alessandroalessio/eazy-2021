<?php
function eazy_2021_webp_upload_mimes( $existing_mimes ) {
	$existing_mimes['webp'] = 'image/webp';
	return $existing_mimes;
}
add_filter( 'mime_types', 'eazy_2021_webp_upload_mimes' );
?>