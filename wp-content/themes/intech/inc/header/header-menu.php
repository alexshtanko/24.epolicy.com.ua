<?php

if(is_page() || is_singular('post') || is_singular('project') || is_singular('team') && get_post_meta(get_the_ID(), 'intech_page_meta_options', true)) {
    $intech_page_meta = get_post_meta(get_the_ID(), 'intech_page_meta_options', true);
} else {
    $intech_page_meta = array();
}

if (!empty(is_array($intech_page_meta) && array_key_exists('intech_page_header_menu', $intech_page_meta) &&  $intech_page_meta['intech_page_enable_menu'] == true) ) {
    $selectedmenu = $intech_page_meta['intech_page_header_menu'];
}else{
    $selectedmenu = '';
}

wp_nav_menu( array(
    'container_id'    => 'navmenu',
    'menu' 			    => $selectedmenu,
    'container_class' => 'collapse navbar-collapse',
    'menu_class'      => 'navbar-nav sm sm-simple',
    'menu_id'         => 'main-menu',
    'theme_location'  => 'main-menu',
    'echo'            => true,
    'fallback_cb'     => false,
) );
?>
