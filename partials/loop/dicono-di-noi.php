<?php  $pdf = get_field('pdf'); ?>
<?php  $source = get_field('source'); ?>
<div class="col-md-4 col-12">
    <div class=" item item-<?php echo get_post_type() ?>">
        <div class="content">
            <a href="<?php echo $pdf ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
                <div class="text-center">
                    <i class="far fa-file-pdf fa-3x"></i>
                </div>
                <?php if ( $source ) : ?>
                    <span class="source"><?php echo $source ?></span>
                <?php endif; ?>
                <span class="date"><?php the_date() ?></span>
                <h2 class="align-middle">
                    <?php the_title(); ?>
                </h2>
                <?php if ( $pdf ) : ?>
                    <span class="verbar">&verbar;</span>
                    <span class="pdf"><?php _e('Download PDF', 'eazytheme') ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>