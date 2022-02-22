<?php get_header(); ?>

<?php
// Term Data
$taxonomy_catalogue = 'tipo_catalogo';
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$term_main_image = wp_get_attachment_image_src( get_field('immagine_principale', $taxonomy_catalogue . '_' . $term->term_id), 'large' );
?>

<?php
// Slider
$enable_slider = false;
if ( $enable_slider ) :
    $immagine_1 = get_field('immagine_1', get_the_ID());
    $immagine_2 = get_field('immagine_2', get_the_ID());
    $immagine_3 = get_field('immagine_3', get_the_ID());
    $immagine_4 = get_field('immagine_4', get_the_ID());
    $immagine_5 = get_field('immagine_5', get_the_ID());
    $immagine_6 = get_field('immagine_6', get_the_ID());

    $slider = [];
    if ( $immagine_1 ) array_push($slider, $immagine_1);
    if ( $immagine_2 ) array_push($slider, $immagine_2);
    if ( $immagine_3 ) array_push($slider, $immagine_3);
    if ( $immagine_4 ) array_push($slider, $immagine_4);
    if ( $immagine_5 ) array_push($slider, $immagine_5);
    if ( $immagine_6 ) array_push($slider, $immagine_6);

    if ( count($slider)>0 ) : ?>
        <div class="owl-carousel owl-theme">
            <?php foreach( $slider AS $n => $attachment_id ) :
                if ( is_int($attachment_id) ) :
                    $attachment = wp_get_attachment_image_src($attachment_id, 'full'); ?>
                    <div class="item" style="background-image: url('<?php echo $attachment[0]; ?>');"></div>
                <?php
                endif;
            endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="hero taxonomy-hero" style="background-image: url(<?php echo $term_main_image[0]; ?>);">
    <h1 class="text-center py-5"><?php echo $term->name; ?></h1>
</div>

<div class="main-wrapper">
    <div class="container">
        
        <?php
        // Sub Categorie
        $sub_categories = get_terms( $taxonomy_catalogue, [
            'hide_empty' => false,
            'parent' => $term->term_id,
        ]);
        if ( count($sub_categories)>0 ) : ?>
            <div class="row">
                <div class="col-12">
                    <input type="hidden" name="filter-category" id="filter-category" class="filter-category" value="<?php echo $term->term_id; ?>">

                    <div class="d-flex sub-categories-wrapper align-items-center">
                        <div class="col text-center sub-category-wrapper selected">
                            <a href="#" data-category="<?php echo $term->term_id; ?>" class="selected"><?php _e('Tutti i prodotti'); ?></a>
                        </div>
                        <?php foreach( $sub_categories AS $k => $cat ) : ?>
                            <div class="col text-center sub-category-wrapper">
                                <a href="#" data-category="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div><!-- /.d-flex -->

                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        <?php endif; ?>

        <?php if ( $term->description!='' ) : ?>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="taxonomy-description">
                        <?php echo $term->description; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        // WP_Query arguments
        $args = array(
            'post_type'              => array( 'catalogo' ),
            'post_status'            => array( 'publish' ),
            'order'                  => 'ASC',
            'orderby'                => 'menu_order',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_catalogue,
                    'field' => 'id',
                    'operator' => 'IN',
                    'terms'    => array($term->term_id),
                ),
            )
        );

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) { ?>
            <div class="row product-wrapper align-items-center all-filter-wrapper">
                <div class="col-md-8 offset-md-2 product-filter-wrapper">
                    <p><strong>Filtra per:</strong></p>
                </div>

                <div class="col-md-6 offset-md-2">
                    <div class="d-flex flex-row">
                        <?php
                        $lunghezza = get_post_custom_values_all('lunghezza');
                        if ( is_array($lunghezza) && count($lunghezza)>0 ) : ?>
                            <div class="filter-wrapper">
                                <label>Lunghezza</label>
                                <ul>
                                    <?php foreach ( $lunghezza AS $i => $elem ) : ?>
                                        <li><input type="checkbox" name="lunghezza[]" class="filter-attrib" value="<?php echo $elem->value; ?>"><?php echo $elem->value; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php
                        $applicazioni = get_post_custom_values_all('applicazioni');
                        if ( is_array($applicazioni) && count($applicazioni)>0 ) : ?>
                            <div class="filter-wrapper">
                                <label>Applicazioni</label>
                                <ul>
                                    <?php foreach ( $applicazioni AS $i => $elem ) : ?>
                                        <li><input type="checkbox" name="applicazioni[]" class="filter-attrib" value="<?php echo $elem->value; ?>"><?php echo $elem->value; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <span id="reset-filter"><em><u>Cancella filtri</u></em></span>
                </div>

                <div id="product-content-wrapper" class="col-12 mt-4 product-content-wrapper">
                    <?php
                    // Sho Products
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            get_template_part('partials/loop/product');
                        }
                    } else {
                        echo __('Nessun prodotto per questa categoria');
                    }
                    ?>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
<?php
$forza_riga_contatti = true;
get_footer(); ?>