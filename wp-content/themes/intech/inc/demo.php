<?php 
function intech_ocdi_import_files() {
  return array(
    array(       
        'import_file_name'  => esc_html__('Demo page','intech' ),
        'local_import_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo.xml',
        'local_import_widget_file'  => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
        'local_import_customizer_file'  => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
        'preview_url'   => 'http://wptf.themepul.com/intech',        
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'intech_ocdi_import_files' );
function intech_after_import_setup() {
    // Assign menus to their locations.
    $intech_main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $intech_footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $intech_main_menu->term_id,
            'footer-menu' => $intech_footer_menu->term_id,
        )
    );
    // Assign front page and posts page (blog page).
    $intech_front_page_id = get_page_by_title( 'Home' );
    $intech_blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $intech_front_page_id->ID );
    update_option( 'page_for_posts', $intech_blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'intech_after_import_setup' );