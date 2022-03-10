<?php
// Categories 
$taxonomy = ( $args['taxonomy'] ) ? $args['taxonomy'] : 'categories';
$hide_empty = ( $args['hide_empty'] && $args['hide_empty']==1 ) ? true : false;
$parent = ( $args['parent'] ) ? $args['parent'] : 0;
$before_title = ( $args['before_title'] ) ? $args['before_title'] : '';
$before_desc = ( $args['before_desc'] ) ? $args['before_desc'] : '';

$categories = get_terms($taxonomy, [
    'hide_empty' => $hide_empty,
    'parent' => $parent
]);

if ( is_array($categories) && count($categories)>0 ) : ?>
    <div class="row-<?php echo $taxonomy; ?>-wrapper">
        <div class="container child-wrapper">
            <?php if ( $before_title!='' ) : ?>
                <div class="before">
                    <h2 class="before-title"><?php echo $before_title; ?></h2>
                    <?php if ( $before_desc!='' ) : ?>
                        <div class="before-desc"><?php echo $before_desc; ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="row align-items-center <?php echo ($k%2==0) ? 'odds' : 'even'; ?>">

                <?php foreach ( $categories AS $k => $cat ) : ?>
                    <?php $color = get_term_meta( $cat->term_id, $taxonomy.'_color', true ); ?>
                    <div class="col-md-4">
                        <div class="item-tax-<?php echo $taxonomy; ?>">
                            <div class="img-wrapper">
                                <?php
                                $cat_thumbnail_id = get_term_meta( $cat->term_id, $taxonomy.'_image', true );
                                $main_image = wp_get_attachment_image( $cat_thumbnail_id, '400x195', false, [ 'class' => 'img-fluid' ] );
                                echo $main_image;
                                ?>
                            </div>
                            <div class="content-wrapper">
                                <h4 class="title" <?php if ( $color ) echo 'style="color: '.$color.';"'; ?>><?php echo $cat->name; ?></h4>
                                <div class="description"><?php echo strip_tags($cat->description); ?></div>
                                <a href="<?php echo get_term_link($cat); ?>" title="<?php echo $cat->name; ?>"class="text-uppercase btn btn-primary" <?php if ( $color ) echo 'style="background-color: '.$color.';"'; ?>><strong><?php _e('Scopri di più', 'eazytheme') ?></strong></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php endif; ?>