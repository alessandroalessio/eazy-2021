<div class="col-md-8 offset-md-2 col-12">
    <div class=" item item-<?php echo get_post_type() ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="img-wrapper">
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                    <?php the_post_thumbnail('large') ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="content">
            <h2><?php the_title(); ?></h2>
            <div class="excerpt after-fade"><?php the_excerpt(); ?></div>
            <div class="btn-wrapper"><a href="<?php the_permalink() ?>" title="<?php _e('Read More', 'eazytheme') ?>" class="btn btn-primary rounded-pill"><?php _e('Read more', 'eazytheme') ?> <i class="fas fa-angle-right"></i></a></div>
        </div>
    </div>
</div>