<div class="col-md-4 col-12">
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
			<?php 
            $lavoro_testimonial = get_field('lavoro_testimonial');
            $citta_testimonial = get_field('citta_testimonial');
            if ( $lavoro_testimonial || $citta_testimonial ) : ?>
                <span class="lavoro_testimonial">
					<?php echo $lavoro_testimonial ?>
					<?php //if ( $lavoro_testimonial && $citta_testimonial ) echo ' &mdash; ' ?>
				</span>
                <span class="citta_testimonial"><?php echo $citta_testimonial ?></span>
            <?php endif; ?>
            <div class="text after-fade">
                <?php the_content() ?>
            </div>
        </div>
    </div>
</div>