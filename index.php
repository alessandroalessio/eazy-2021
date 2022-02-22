<?php get_header(); 
// Hero
$immagine_di_copertina = get_field('hero_immagine_di_copertina', get_the_ID());
$abilita_parallasse = get_field('hero_abilita_parallasse', get_the_ID());
$contract_sottotitolo = get_field('contract_sottotitolo');?>
<div class="page-hero <?php echo $hero_extra_class; ?> <?php echo ( $abilita_parallasse ) ? 'parallax-bg' : ''; ?>" <?php echo ( $immagine_di_copertina ) ? 'style="background-image: url(\''.$immagine_di_copertina['url'].'\'"' : ''; ?>>
    <div class="content-hero-wrapper text-center">
        <?php 
        $post_type_object = get_post_type_object( get_post_type() );
        if ( get_post_type()=='post' ) :
            echo '<h1>'; echo 'Comunicazioni ed Eventi'; echo '</h1>';
        else:
            echo '<h1>'; echo $post_type_object->label; echo '</h1>';
        endif; 
        ?>
    </div>
</div>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part('partials/loop/articles');
                endwhile;
            else :
                get_template_part('partials/content', 'none');
            endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>