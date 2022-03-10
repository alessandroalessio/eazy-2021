<?php get_header(); ?>

<?php
// Term Data
$taxonomy = get_query_var( 'taxonomy' );
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$term_main_image = wp_get_attachment_image_src( get_field('immagine_principale', $taxonomy_catalogue . '_' . $term->term_id), 'large' );
?>

<div class="page-hero taxonomy-hero" style="background-image: url(<?php echo $term_main_image[0]; ?>);">
    <h1 class="text-center py-5"><?php echo $term->name; ?></h1>
</div>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part('partials/loop/'.$taxonomy.'-term-item', null, [
                        'taxonomy' => $taxonomy
                    ]);
                endwhile;
            else :
                get_template_part('partials/content', 'none');
            endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>