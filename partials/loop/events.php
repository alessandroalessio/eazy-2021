<?php 
global $read_more;
if ( !$read_more ) $read_more = 'true';
$color = false; //get_field('color'); ?>
<div class="col-md-4 col-12">
    <div class=" item item-<?php echo get_post_type() ?>"
        <?php if ( $color ) echo ' style="border-color: '.$color.';"' ?> >
        <div class="img-wrapper">
            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                    <?php the_post_thumbnail(null, ['class' => 'img-fluid']); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="content">
            <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                <h2><?php the_title(); ?></h2>
            </a>
            <div class="excerpt after-fade"><?php the_excerpt(); ?></div>
            <?php if ( $read_more=='true' ) : ?>
                <div class="btn-wrapper"><a href="<?php the_permalink() ?>" title="<?php _e('Leggi tutto') ?>" class="btn btn-primary rounded-pill btn-block"><?php _e('Leggi tutto') ?> <i class="fas fa-angle-right"></i></a></div>
            <?php endif; ?>
        </div>
    </div>
</div>