<div class="col-12">
    <div class="row item-<?php echo $args['taxonomy']; ?> align-items-center">
        <div class="col-md-3">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="img-wrapper">
                    <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                        <?php the_post_thumbnail('400x400', [
                            'class' => 'img-fluid'
                        ]) ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="col">
            <h2>
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ) ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <div class="content">
                <?php the_excerpt(); ?>
            </div>
            <div class="btn-wrapper">
                <a href="<?php the_permalink() ?>" title="<?php _e('Read More', 'eazytheme') ?>" class="text-uppercase pl-0">
                    Leggi tutto
                </a>
            </div>
        </div>  
    </div>
</div>