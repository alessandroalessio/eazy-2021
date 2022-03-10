<?php
// Cover
global $hero_extra_class;
$hero_cover_image = get_field('hero_cover_image', get_the_ID());
$abilita_parallasse = get_field('hero_abilita_parallasse', get_the_ID());
$hero_subtitle = get_field('hero_subtitle', get_the_ID());
$hero_cta_url = get_field('hero_cta_url', get_the_ID());
$hero_cta_label = get_field('hero_cta_label', get_the_ID());
?>
<div class="page-hero <?php echo $hero_extra_class; ?> <?php echo ( $abilita_parallasse ) ? 'parallax-bg' : ''; ?>" <?php echo ( $hero_cover_image ) ? 'style="background-image: url(\''.$hero_cover_image['url'].'\'"' : ''; ?>>
    <div class="content-hero-wrapper text-center">
        <?php get_template_part('partials/page-title'); ?>
        <?php if ( $hero_subtitle!='' ) : ?>
            <span class="hero-subtitle"><?php echo $hero_subtitle ?></span>
        <?php endif; ?>
        <?php if ( $hero_cta_url!='' ) : ?>
            <div class="btn-wrapper"><a href="<?php echo $hero_cta_url; ?>" class="btn btn-primary"><?php echo ( $hero_cta_label!='' ) ? $hero_cta_label : ' Scopri di più'; ?></a></div>
        <?php endif; ?>
    </div>
</div>
