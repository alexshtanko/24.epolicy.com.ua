<?php
/**
 * intech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package intech 
 */
define( "INTECH_VERSION", time() );
define( "INTECH_ASSETS_DIR", get_template_directory_uri() . "/assets/" );
require get_template_directory() . '/inc/function/theme-setup.php';
require get_template_directory() . '/inc/function/theme-widget.php';
require get_template_directory() . '/inc/function/theme-filter.php';

/**
 * TGM Plugin 
 */
require get_template_directory() . '/inc/plugins-activation.php';
/**
 * Demo Content 
 */
require get_template_directory() . '/inc/demo.php';
/**
 * Blog Comment List
 */
require get_template_directory() . '/inc/comments-list.php';
/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/theme-style.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}