<?php
global $taxonomy_catalogue;
$term = get_the_terms($post, $taxonomy_catalogue);
$color = '#EB6F00';
if ( isset($term[1]->term_id) ) {
    $color = get_field('colore', $taxonomy_catalogue . '_' . $term[1]->term_id);
}
$attributes = [
    'Grata' => 'grata',
    'Lunghezza' => 'lunghezza',
    'Applicazione' => 'applicazioni',
    'Finitura' => 'finitura',
    'Rivestimento' => 'rivestimento',
    'Profondità d’installazione' => 'profondita_installazione',
    'Certificazioni' => 'certificazioni'
];
?>
<div class="row item-product">
    <div class="col-4">
        <div class="product-img-wrapper" style="border-bottom: 10px solid <?php echo $color; ?>">
            <?php eazy_img( get_the_post_thumbnail_url( $post->ID, 'large' ) ); ?>
        </div>
    </div>
    <div class="col-8">
        <h3 class="product-title"><?php the_title(); ?></h3>
        <div class="row mt-5 align-items-center">
            <div class="col-sm-7 product-attribute-wrapper">
                <?php foreach ( $attributes AS $label => $field_name ) : ?>
                    <?php
                    $field_value = get_field($field_name, $post->ID);
                    if ( isset($field_value) && $field_value!='' ) : ?>
                        <p class="product-attribute"><strong><?php echo $label; ?>:</strong> <?php echo $field_value ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-sm-5">
                <?php
                $scheda_tecnica_pdf = get_field('scheda_tecnica_pdf', $post->ID);
                $installazione_pdf = get_field('installazione_pdf', $post->ID);
                $video = get_field('video', $post->ID);
                
                if ( isset($scheda_tecnica_pdf) && $scheda_tecnica_pdf!='') : ?>
                    <a href="<?php echo $scheda_tecnica_pdf; ?>" class="detail-link" target="_blank"><span>Scheda Tecnica</span></a>
                <?php endif;

                if ( isset($installazione_pdf) && $installazione_pdf!='') : ?>
                    <a href="<?php echo $installazione_pdf; ?>" class="install-link" target="_blank"><span>Installazione</span></a>
                <?php endif;

                if ( isset($video) && $video!='') : ?>
                    <a href="<?php echo $video; ?>" data-fancybox data-width="640" data-height="360" class="video-link"><span>Video</span></a>
                <?php endif;
                
                ?>
            </div>
        </div>
    </div>
</div>