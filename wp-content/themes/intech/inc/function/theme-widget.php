<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function intech_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'intech' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'intech' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widtet-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Widget', 'intech' ),
            'id'            => 'tuchno-shop',
            'description'   => esc_html__( 'Add widgets here.', 'intech' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widtet-title"><span>',
            'after_title'   => '</span></h2>',
		) );
	}
		
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'infotech' ),
            'id'            => 'footer-1-widget-area',
            'description'   => esc_html__( 'Add widgets here.', 'infotech' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">
			<div class="intech-ft-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h2 class="widtet-title"><span>',
            'after_title'   => '</span></h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'infotech' ),
            'id'            => 'footer-2-widget-area',
            'description'   => esc_html__( 'Add widgets here.', 'infotech' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">
			<div class="intech-ft-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h2 class="widtet-title"><span>',
            'after_title'   => '</span></h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'infotech' ),
            'id'            => 'footer-3-widget-area',
            'description'   => esc_html__( 'Add widgets here.', 'infotech' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">
			<div class="intech-ft-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h2 class="widtet-title"><span>',
            'after_title'   => '</span></h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'infotech' ),
            'id'            => 'footer-4-widget-area',
            'description'   => esc_html__( 'Add widgets here.', 'infotech' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widtet-title"><span>',
            'after_title'   => '</span></h2>',
        )
    );
}
add_action( 'widgets_init', 'intech_widgets_init' );