<div class="col-md-6 col-12">
    <div class="item item-<?php echo get_post_type() ?> row">
        <div class="col-12">
            <div class="content">
                <h2><?php the_title(); ?></h2>
                <span class="date"><?php the_date(); ?></span>
                <div class="excerpt after-fade"><?php the_excerpt(); ?></div>
                <div class="btn-wrapper"><a href="<?php the_permalink() ?>" title="<?php _e('Leggi tutto', 'eazytheme') ?>"><?php _e('Leggi tutto', 'eazytheme') ?></a></div>
            </div>
        </div>
    </div>
</div>