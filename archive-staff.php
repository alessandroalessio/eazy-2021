
<?php get_header(); ?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
    
                <?php
                $terms = get_terms('ruolo_staff');
                if( count($terms)>0 ) : ?>
                    <?php foreach( $terms AS $n => $term ) : ?>
                        <div class="col-12 pt-4 pb-3">
                            <h2><?php echo $term->name ?></h2>
                        </div>
                        <?php 
                        $args = array(
                            'post_type'              => array( 'staff' ),
                            'post_status'            => array( 'publish' ),
                            'posts_per_page'        => 99,
                            'tax_query' => array(
                                array (
                                    'taxonomy' => 'ruolo_staff',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                )
                            ),
                        );
                        $query = new WP_Query( $args );
    
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                get_template_part('partials/loop/'.get_post_type());
                            }
                        } else {
                            get_template_part('partials/content', 'none');
                        }
                        wp_reset_postdata();
                    endforeach;
                endif; ?>
    
        </div>
    </div>
</div>

<?php get_footer(); ?>