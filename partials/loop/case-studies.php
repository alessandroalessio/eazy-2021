<div class="col-sm-6 col-12">
    <div class=" item item-<?php echo get_post_type() ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="avatar">
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php the_post_thumbnail('medium') ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="content">
            <h2>
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
			<div class="text-center read-more-wrapper">
                <a href="<?php the_permalink() ?>" attr="<?php echo esc_attr( get_the_title() ) ?>" class="btn btn-sm btn-primary rounded-pill pl-4 pr-4">
                    <?php _e('Scopri di più') ?>
                </a>
            </div>
        </div>
    </div>
</div>