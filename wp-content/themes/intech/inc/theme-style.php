<?php
if ( !function_exists( 'intech_google_fonts_url' ) ) {

    function intech_google_fonts_url() {
        $intech_fonts_url = '';
        $intech_fonts = array();
        $intech_subsets = 'latin-ext';
        $intech_fonts[] = 'Open+Sans:300,400,600,600i,700,700i,800,800i';
        $intech_fonts[] = 'Poppins:200,300,400,500,600,700,800,900';

        if ( $intech_fonts ) {
            $intech_fonts_url = add_query_arg( array(
                'family' => implode( '|', $intech_fonts ),
                'subset' => $intech_subsets,
            ), '//fonts.googleapis.com/css' );
        }
        return esc_url_raw( $intech_fonts_url );
    }
}

function intech_assets() {
    $intech_css_files = array(
        'bootstrap'          => INTECH_ASSETS_DIR . 'bootstrap/bootstrap-min.css',
        'animate'            => INTECH_ASSETS_DIR . 'animations/animate.css',
        'owl-carousel'       => INTECH_ASSETS_DIR . 'owlcarousel/owl-carousel.css',
        'font-awesome'       => INTECH_ASSETS_DIR . 'css/font-awesome-min.css',
        'flaticon'           => INTECH_ASSETS_DIR . 'css/flaticon.css',
        'sm-core'            => INTECH_ASSETS_DIR . 'menu/sm-core.css',
        'sm-simple'          => INTECH_ASSETS_DIR . 'menu/sm-simple.css',
        'slick'              => INTECH_ASSETS_DIR . 'slick/slick.css',
        'slick-theme'        => INTECH_ASSETS_DIR . 'slick/slick-theme.css',
        'intech-default'     => INTECH_ASSETS_DIR . 'css/default.css',
        'intech-typrography' => INTECH_ASSETS_DIR . 'css/typrography.css',
        'intech-theme'       => INTECH_ASSETS_DIR . 'css/theme.css',
        'magnific-popup'     => INTECH_ASSETS_DIR . 'gallery/magnific-popup.css',
        'intech-responsive'  => INTECH_ASSETS_DIR . 'css/responsive.css',
        'get-policy'         => INTECH_ASSETS_DIR . 'css/get-policy.css',
        'get-medical'        => INTECH_ASSETS_DIR . 'css/get-medical.css',
    );

    foreach ( $intech_css_files as $intech_handle => $intech_css_file ) {
        wp_enqueue_style( $intech_handle, $intech_css_file, null, INTECH_VERSION );
    }
    if ( !defined( 'CS_ACTIVE_FRAMEWORK' ) && !function_exists( 'cs_get_option' ) ) {
        // Add google fonts, used in the main stylesheet.
        wp_enqueue_style( 'intech-fonts', intech_google_fonts_url(), array(), null );
    }

    wp_enqueue_style( 'intech-style', get_stylesheet_uri(), null, INTECH_VERSION );
    wp_style_add_data( 'intech-style', 'rtl', 'replace' );

    // Add WordPress Default Masonry, Used for attach grid.
    wp_enqueue_script( 'jquery-masonry' );
    $intech_js_files = array(
        'modernizr'                  => array( 'src' => INTECH_ASSETS_DIR . 'vendor/modernizr.js', 'dep' => array( 'jquery' ) ),
        'popper-min'                 => array( 'src' => INTECH_ASSETS_DIR . 'bootstrap/popper-min.js', 'dep' => array( 'jquery' ) ),
        'bootstrap'                  => array( 'src' => INTECH_ASSETS_DIR . 'bootstrap/bootstrap-min.js', 'dep' => array( 'jquery' ) ),
        'smartmenus'                 => array( 'src' => INTECH_ASSETS_DIR . 'menu/smartmenus.js', 'dep' => array( 'jquery' ) ),
        'owl-carousel'               => array( 'src' => INTECH_ASSETS_DIR . 'owlcarousel/owl-carousel-min.js', 'dep' => array( 'jquery' ) ),
        'slick-min'                  => array( 'src' => INTECH_ASSETS_DIR . 'slick/slick-min.js', 'dep' => array( 'jquery' ) ),
        'jquery-magnific-popup-min'  => array( 'src' => INTECH_ASSETS_DIR . 'gallery/jquery-magnific-popup-min.js', 'dep' => array( 'jquery' ) ),
        'intech-navigation'          => array( 'src' => INTECH_ASSETS_DIR . 'js/navigation.js', 'dep' => array( 'jquery' ) ),
        'intech-skip-link-focus-fix' => array( 'src' => INTECH_ASSETS_DIR . 'js/skip-link-focus-fix.js', 'dep' => array( 'jquery' ) ),
        'intech-main'                => array( 'src' => INTECH_ASSETS_DIR . 'js/main.js', 'dep' => array( 'jquery' ) ),
    );
    foreach ( $intech_js_files as $intech_handle => $intech_js_file ) {
        wp_enqueue_script( $intech_handle, $intech_js_file['src'], $intech_js_file['dep'], INTECH_VERSION, true );
    }

    // Add comment reply script.
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_cs_framework_active() ) {
        $intech_body_end_script = cs_get_option( 'intech_body_end_script' );
        $intech_head_script = cs_get_option( 'intech_head_script' );
        $intech_custom_css_script = cs_get_option( 'intech_custom_css_script' );
        wp_add_inline_script( 'intech-main', $intech_body_end_script );
        wp_add_inline_script( 'jquery-migrate', $intech_head_script );
        wp_add_inline_style( 'intech-theme', $intech_custom_css_script );
    }

}
add_action( 'wp_enqueue_scripts', 'intech_assets' );