<div class="col-md-3 col-6 item-<?php echo get_post_type() ?>-wrapper">
    <div class="item item-<?php echo get_post_type() ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="img-wrapper">
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                    <?php the_post_thumbnail('400x400', [
                        'class' => 'img-fluid'
                    ]) ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="content">
            <h2>
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="btn-wrapper">
                <a href="<?php the_permalink() ?>" title="<?php _e('Read More', 'eazytheme') ?>" class="text-uppercase pl-0">
                    <img src="<?php echo get_template_directory_uri() ?>/build/img/arrow-forward-outline-orange.png" width="12">
                </a>
            </div>
        </div>

    </div>
</div>