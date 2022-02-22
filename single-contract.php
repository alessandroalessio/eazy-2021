<?php get_header(); ?>
<?php 
$hero_extra_class = 'alt';
get_template_part('partials/page-hero') ?>

<div class="main-wrapper">

    <div class="container">
        <div class="row mt-5">
            
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-8 offset-md-2">
                        <div class="main-content mb-3">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
        
        </div>
    </div>

    <?php
    $contract_detail_titolo = get_field('contract_detail_titolo');
    $contract_detail_testo = get_field('contract_detail_testo');
    $contract_detail_immagine = get_field('contract_detail_immagine');
    if ( $contract_detail_titolo!='' || $contract_detail_testo!='' )  : ?>
        <div class="container my-5 contract-detail">
            <div class="row pt-5 mt-5">
                <div class="col-md-7">
                    <div class="pr-5">
                        <h3 class="title before-square mb-4"><?php echo $contract_detail_titolo ?></h3>
                        <div class="text pr-5"><?php echo $contract_detail_testo ?></div>
                    </div>
                </div>
                <?php if ( isset($contract_detail_immagine) && is_array($contract_detail_immagine) ) : ?>
                    <div class="col-md-5">
                        <div class="thumb-wrapper">
                            <?php if ( $contract_detail_immagine['sizes']['large'] ) : ?>
                                <img src="<?php echo $contract_detail_immagine['sizes']['large']; ?>" alt="" width="<?php echo $contract_detail_immagine['sizes']['large-width']; ?>" height="<?php echo $contract_detail_immagine['sizes']['large-height']; ?>" class="img-fluid">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="gallery-wrapper">
                    <div class="owl-carousel owl-theme">
                        <?php
                        // Gallery
                        for ( $i=1; $i<=6; $i++ ) : ?>
                            <?php 
                            $elemento = get_field('elemento_'.$i);
                            if ( isset($elemento) && $elemento['immagine'] ) {
                                $attachment_id = $elemento['immagine'];
                                if ( is_int($attachment_id) ) :
                                    $attachment = wp_get_attachment_image_src($attachment_id, 'large'); ?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2">
                                                <img src="<?php echo $attachment[0]; ?>" alt="" class="img-fluid">
                                                <p class="didascalia"><?php echo $elemento['didascalia']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>
                        <?php endfor; ?>
                    </div>
                </div><!-- /.gallery-wrapper -->

            </div>
        </div>
    </div>    
</div>

<?php echo get_template_part('partials/before-footer-cta-row-alt') ?>

<?php get_footer(); ?>