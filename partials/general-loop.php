<?php
// General Loop
$post_type = ( $args['post_type'] ) ? $args['post_type'] : 'post';
$posts_per_page = ( $args['posts_per_page'] ) ? $args['posts_per_page'] : 3;
$before_title = ( $args['before_title'] ) ? $args['before_title'] : '';
$before_desc = ( $args['before_desc'] ) ? $args['before_desc'] : '';
$after_link_label = ( $args['after_link_label'] ) ? $args['after_link_label'] : 'Mostra altri';

$a = array(
    'post_type'              => $post_type,
    'post_status'            => array( 'publish' ),
    'posts_per_page'         => $posts_per_page,
);
$query = new WP_Query( $a );

if ( $query->have_posts() ) { ?>
    <section class="row-<?php echo $post_type; ?>-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if ( $before_title!='' ) : ?>
                        <div class="before">
                            <h2 class="before-title"><?php echo $before_title; ?></h2>
                            <?php if ( $before_desc!='' ) : ?>
                                <div class="before-desc"><?php echo $before_desc; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $read_more = 'false';
                    if ( $post_type='post' ) $post_type_template = 'articles';
                    get_template_part('partials/loop/'.$post_type_template);
                }
                ?>
            </div>
            <?php if ( $after_link_label!='' ) : ?>
                <div class="row">
                    <div class="col-12 text-center pt-4">
                        <div class="after">
                            <?php
                            $archive_link = get_post_type_archive_link( $post_type );
                            if ( $archive_link ) : ?>
                                <a href="<?php echo $archive_link; ?>" class="btn btn-primary"><?php echo $after_link_label ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}
wp_reset_postdata();
?>