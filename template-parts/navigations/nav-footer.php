
<?php
    wp_nav_menu([
        'menu'            => 'footermenu',
        'theme_location'  => 'footermenu',
        'container'       => 'div',
        'container_id'    => 'footermenu-nav',
        'container_class' => 'collapse navbar-collapse',
        'menu_id'         => 'main-menu',
        'menu_class'      => 'navbar-nav ml-auto',
        'depth'           => 1,
        'walker'          => new kinter_navwalker(),
        'fallback_cb'     => 'kinter_navwalker::fallback',
    ]);
?>
