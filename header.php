<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link rel='preconnect' href='https://cdn.keycdn.com' crossorigin>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="loader" style="background: url('<?php echo get_template_directory_uri() ?>/build/img/loader.gif') #fff no-repeat center center; position: fixed; height: 100%; width: 100%; z-index: 9999;"></div>

<?php if ( eazy_get_option('header_show_topbar') ) : ?>
  <?php get_template_part('partials/header', 'topbar'); ?>
<?php endif; ?>

<header>
  <div class="container">
    <div class="row">
      <?php get_template_part('partials/header', 'logo'); ?>
    </div>
    <div class="navbar-wrapper row">
      <div class="col-12">
        <?php get_template_part('partials/header', 'navbar'); ?>
      </div>
    </div>
  </div>
</header>

<?php if ( eazy_get_option('breadcrumb_show') && !is_front_page() ) : ?>
  <?php get_template_part('partials/header', 'after'); // Title + Breadcrumb ?>
<?php endif; ?>