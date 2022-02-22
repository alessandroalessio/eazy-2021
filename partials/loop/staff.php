<div class="col-md-2 col-6">
    <div class=" item item-<?php echo get_post_type() ?>">
        <div class="avatar">
            <?php if ( has_post_thumbnail() ) : ?>
                <!-- <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> -->
                    <?php the_post_thumbnail('400x400', ['class' => 'img-fluid']) ?>
                <!-- </a> -->
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/avatar.png" alt="" class="img-fluid">
                <?php endif; ?>
        </div><!-- /.avatar -->
        <div class="content">
            <h2>
                <!-- <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>"> -->
                    <?php the_title(); ?>
                <!-- </a> -->
            </h2>
            <div class="text">
                <?php echo the_content(); ?>
            </div>
            <?php 
            $role = get_field('role');
            if ( $role ) : ?>
                <span class="role"><?php echo $role ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>