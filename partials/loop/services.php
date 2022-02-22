<?php 
global $read_more;
global $i;
if ( !$read_more ) $read_more = 'true';
$color = false; //get_field('color'); ?>
<div class="col-lg-4 col-sm-12 col-12 mt-2">
    <div class=" item item-<?php echo get_post_type() ?>"  data-aos="fade-down" data-aos-delay="<?php echo $i*400; ?>" data-aos-duration="1000"
        <?php if ( $color ) echo ' style="border-color: '.$color.';"' ?> >
        <div class="img-wrapper">
            <?php if ( has_post_thumbnail() ) : ?>
                <!-- <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>"> -->
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid']) ?>
                <!-- </a> -->
            <?php endif; ?>
        </div>
        <div class="content">
            <!-- <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>"> -->
                <h2><?php the_title(); ?></h2>
            <!-- </a> -->
            <!-- <div class="excerpt after-fade"><?php the_excerpt(); ?></div> -->
            <?php if ( $read_more=='true' ) : ?>
                <div class="btn-wrapper">
                    <a href="<?php the_permalink() ?>" title="<?php _e('Richiedi un consulto', 'eazytheme') ?>" class="btn btn-primary rounded-pill">
                        <!-- <?php _e('Richiedi un consulto', 'eazytheme') ?> <i class="fas fa-angle-right"></i> -->
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $i++; ?>