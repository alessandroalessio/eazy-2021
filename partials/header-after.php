<?php
global $post;
$hero_image = get_field('hero_image', get_the_ID() );
if( is_post_type_archive() ) : 
	$hero_image_path = get_template_directory().'/build/img/hero-'.get_post_type().'.jpg';
	if ( file_exists($hero_image_path) ) $hero_image = get_template_directory_uri().'/build/img/hero-'.get_post_type().'.jpg';
endif;
// if( is_singular() && get_post_type()=='services' ):
// 	$hero_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
// endif;
?>
<section class="hero-wrapper  <?php if ( $hero_image ) echo 'with-image' ?>" <?php if ( $hero_image ) echo 'style="background-image: url('.$hero_image.');"' ?>>
	<section class="breadcrumb-wrapper <?php if ( $hero_image ) echo 'has-hero' ?>">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
				<?php if ( eazy_get_option('breadcrumb_show_title') ) : ?>
					<h1>
					<?php if ( is_page() || is_single() ) the_title() ?>
					<?php if ( eazy_is_blog() && !is_single() ) _e('Blog', 'eazytheme');  ?>
					<?php if ( is_post_type_archive() ) post_type_archive_title() ?>
					</h1>
				<?php endif; ?>
				<?php eazy_the_breadcrumb() ?>
				</div>
			</div>
		</div>
	</section>
</section>