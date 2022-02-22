<nav class="navbar navbar-expand-lg">
    <?php 
    wp_nav_menu( array(
        'theme_location'  => 'footer',
        'depth'           => 0,
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => 'bs-example-navbar-collapse-1',
        'menu_class'      => 'navbar-nav mx-auto',
    ) );
    ?>
</nav>