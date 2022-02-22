<?php 
/**
 * Template Name: Users
 *
 * @package WordPress
 * @subpackage Eazy 2021
 * @since Eazy 1.0
 */
get_header(); ?>
<?php get_template_part('partials/page-hero') ?>

<div class="main-wrapper">
            
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

        <?php endwhile;
    endif; ?>

    <div class="container sedi-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    // Staff
                    $args = array(
                        'post_type'              => array( 'staff' ),
                        'post_status'            => array( 'publish' ),
                        'posts_per_page'         => '99',
                    );
                    $pagination = true;
                    // $query = new WP_Query( $args );
                    $gestore_sede = get_users([
                        'role' => 'gestore_sede'
                    ]);

                    if ( count($gestore_sede)>0 ) { ?>
                        <div class="col-9">
                            <div class="tabs">
                                <?php foreach ( $gestore_sede AS $k => $item ) :
                                    $read_more = 'false';
                                    
                                    unset( $id );
                                    unset( $name );
                                    unset( $email_sede );
                                    unset( $indirizzo_sede );
                                    unset( $mappa_sede );
                                    unset( $presidente_sede );
                                    unset( $telefono_sede );
                                    unset( $pec_sede );
                                    unset( $orario_di_apertura_sede );
                                    unset( $per_informazioni_telefonare_sede );
                                    unset( $sito_web_sede );

                                    $id = $item->data->ID;
                                    $name = $item->data->display_name;
                                    $email_sede = $item->data->user_email; //vd($email_sede);
                                    // vd('user_'.$id);
                                    $indirizzo_sede = get_field('indirizzo_sede', 'user_'.$id); //vd($indirizzo_sede);
                                    $mappa_sede = get_field('mappa_sede', 'user_'.$id); //vd($mappa_sede);
                                    $presidente_sede = get_field('presidente_sede', 'user_'.$id); //vd($presidente_sede);
                                    $telefono_sede = get_field('telefono_sede', 'user_'.$id); //vd($telefono_sede);
                                    $pec_sede = get_field('pec_sede', 'user_'.$id); //vd($pec_sede);
                                    $orario_di_apertura_sede = get_field('orario_di_apertura_sede', 'user_'.$id); //vd($orario_di_apertura_sede);
                                    $per_informazioni_telefonare_sede = get_field('per_informazioni_telefonare_sede', 'user_'.$id); //vd($per_informazioni_telefonare_sede);
                                    $facebook_sede = get_field('facebook_sede', 'user_'.$id); //vd($facebook_sede);
                                    $instagram_sede = get_field('instagram_sede', 'user_'.$id); //vd($instagram_sede);
                                    $sito_web_sede = get_field('sito_web_sede', 'user_'.$id); //vd($sito_web_sede);
                                    ?>
                                    <div class="tab">
                                        <input type="checkbox" id="chck<?php echo $id ?>">
                                        <label class="tab-label" for="chck<?php echo $id ?>"><?=$name; ?></label>
                                        <div class="tab-content">
                                            <?php if ($indirizzo_sede!='') : ?>
                                                <p class="indirizzo_sede"><i class="fas fa-map-marker-alt"></i> <?=$indirizzo_sede; ?></p>
                                            <?php endif; ?>
                                            <?php if ($mappa_sede!='') : ?>
                                                <p class="mappa_sede">
                                                    <?php 
                                                    $location = $mappa_sede;
                                                    if( $location ): ?>
                                                        <div class="acf-map" data-zoom="16">
                                                            <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </p>
                                            <?php endif; ?>
                                            <?php if ($presidente_sede!='') : ?>
                                                <p class="presidente_sede"><i class="fas fa-user"></i> <?=$presidente_sede; ?></p>
                                            <?php endif; ?>
                                            <?php if ($telefono_sede!='') : ?>
                                                <p class="telefono_sede"><i class="fas fa-phone"></i> <?=$telefono_sede; ?></p>
                                            <?php endif; ?>
                                            <?php if ($email_sede!='') : ?>
                                                <p class="email_sede"><i class="fas fa-envelope-open-text"></i> <a href="mailto:<?=$email_sede; ?>" title=""><?=$email_sede; ?></a></p>
                                            <?php endif; ?>
                                            <?php if ($pec_sede!='') : ?>
                                                <p class="pec_sede"><i class="fas fa-envelope-open-text"></i> <a href="mailto:<?=$pec_sede; ?>" title=""><?=$pec_sede; ?></a></p>
                                            <?php endif; ?>
                                            <?php if ($facebook_sede!='') : ?>
                                                <p class="facebook_sede"><i class="fab fa-facebook"></i> <a href="<?=$facebook_sede; ?>" title="" target="_blank"><?=$facebook_sede; ?></a></p>
                                            <?php endif; ?>
                                            <?php if ($instagram_sede!='') : ?>
                                                <p class="instagram_sede"><i class="fab fa-instagram"></i> <a href="<?=$instagram_sede; ?>" title="" target="_blank"><?=$instagram_sede; ?></a></p>
                                            <?php endif; ?>
                                            <?php if ($sito_web_sede!='') : ?>
                                                <p class="sito_web_sede"><i class="fas fa-external-link-alt"></i> <a href="<?=$sito_web_sede; ?>" title="" target="_blank"><?php echo str_replace(['http://', 'https://'], '', $sito_web_sede); ?></a></p>
                                            <?php endif; ?>
                                            <?php if ($orario_di_apertura_sede!='') : ?>
                                                <p class="orario_di_apertura_sede"><i class="far fa-clock"></i> <?=$orario_di_apertura_sede; ?></p>
                                            <?php endif; ?>
                                            <?php if ($per_informazioni_telefonare_sede!='') : ?>
                                                <p class="per_informazioni_telefonare_sede"><i class="far fa-info"></i> <?=$per_informazioni_telefonare_sede; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                endforeach; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
                        <div class="col-md-3 sidebar-wrapper">
                            <ul id="page-sidebar">
                                <?php dynamic_sidebar( 'page-sidebar' ); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php
// Nel footer c'è l'installazione delle Google Maps
get_footer(); ?>