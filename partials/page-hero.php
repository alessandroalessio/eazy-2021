<?php
// Cover
global $hero_extra_class;
$immagine_di_copertina = get_field('hero_immagine_di_copertina', get_the_ID());
$abilita_parallasse = get_field('hero_abilita_parallasse', get_the_ID());
$contract_sottotitolo = get_field('contract_sottotitolo');
?>
<div class="page-hero <?php echo $hero_extra_class; ?> <?php echo ( $abilita_parallasse ) ? 'parallax-bg' : ''; ?>" <?php echo ( $immagine_di_copertina ) ? 'style="background-image: url(\''.$immagine_di_copertina['url'].'\'"' : ''; ?>>
    <div class="content-hero-wrapper text-center">
        <?php get_template_part('partials/page-title'); ?>
        <?php if ( $contract_sottotitolo!='' ) : ?>
            <span class="hero-subtitle"><?php echo $contract_sottotitolo ?></span>
        <?php endif; ?>
    </div>
</div>
