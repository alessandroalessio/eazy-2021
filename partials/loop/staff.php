<div class="col-md-3 col-12">
    <div class=" item item-<?php echo get_post_type() ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="avatar">
                <!-- <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> -->
                    <?php the_post_thumbnail('thumbnail') ?>
                <!-- </a> -->
            </div>
        <?php endif; ?>
        <div class="content">
            <h2>
                <!-- <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> -->
                    <?php the_title(); ?>
                <!-- </a> -->
            </h2>
            <?php 
            $role = get_field('role');
            if ( $role ) : ?>
                <span class="role"><?php echo $role ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>