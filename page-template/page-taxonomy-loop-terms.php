<?php 
/**
 * Template Name: Taxonomy Loop Terms
 *
 * @package WordPress
 * @subpackage Eazy 2021
 * @since Eazy 1.0
 */
get_header(); 
get_template_part('partials/page-hero'); ?>

<div class="main-wrapper">
    <?php
    // Projects Categories
    get_template_part('partials/general-tax-loop', null, [
        'taxonomy' => 'project_categories',
        'hide_empty' => 0,
        'parent' => 0,
        // 'before_title' => 'Progetti',
        // 'before_desc' => 'Scopri come puoi partecipare alle attività dell’associazione',
    ]);
    ?>
</div>
<?php get_footer(); ?>