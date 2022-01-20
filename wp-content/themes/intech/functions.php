<?php

require 'include/class-blank.php';
require 'include/class-covid-blank.php';
//Euroins
require_once 'include/class-euroins.php';

//EKTA
require_once 'include/class_ekta.php';

//GARDIAN
require_once 'include/class-gardian.php';


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

//MEDICAL

add_action( 'wp_enqueue_scripts', 'epolicy_scripts' );

function epolicy_scripts() {



    //MEDICAL Calc manager page
    if( is_page( array( 3766 ) ) ){
        wp_enqueue_style( 'ui', get_template_directory_uri() . '/css/ui/jquery-ui.min.css');
        wp_enqueue_style( 'ui-theme', get_template_directory_uri() . '/css/ui/jquery-ui.theme.min.css');
        wp_enqueue_script( 'jquery.maskedinput.min', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'ui', get_template_directory_uri() . '/js/ui/jquery-ui.min.js', array('jquery'), '1', true );
        wp_enqueue_script( 'date', get_template_directory_uri() . '/js/build/date.js', array('jquery'), '1', true );

        wp_enqueue_script( 'validateadditional', get_template_directory_uri() . '/js/validate/additional-methods.min.js', array('jquery', 'medicalmcreateorder' ), '1', true );
        wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/validate/jquery.validate.min.js', array('jquery', 'validateadditional' ), '1', true );

        wp_enqueue_script( 'medicalm', get_template_directory_uri() . '/js/medical-m.js', array('jquery'), '1.0.1' );

        wp_localize_script( 'medicalm', 'medicalM', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'medical-m' ) // Create nonce which we later will use to verify AJAX request
        ));

        wp_enqueue_script( 'medicalmcreateorder', get_template_directory_uri() . '/js/medical-m-create-order.js', array('jquery'), '1.0.161.21' );

        wp_localize_script( 'medicalmcreateorder', 'medicalmCreateOrder', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'medical-m-create-order' ) // Create nonce which we later will use to verify AJAX request
        ));

    }




    //covid2019 Calc manager page
    if( is_page( array( 3775 ) ) ){
        wp_enqueue_style( 'ui', get_template_directory_uri() . '/css/ui/jquery-ui.min.css');
        wp_enqueue_style( 'ui-theme', get_template_directory_uri() . '/css/ui/jquery-ui.theme.min.css');
        wp_enqueue_style( 'get-policy', get_template_directory_uri() . '/css/get-policy.css', '1.0.3');
        wp_enqueue_style( 'get-medical', get_template_directory_uri() . '/css/get-medical.css', array(), '1.0.14');
        wp_enqueue_script( 'jquery.maskedinput.min', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array('jquery'), '1.0', true );
        wp_enqueue_script( 'ui', get_template_directory_uri() . '/js/ui/jquery-ui.min.js', array('jquery'), '1', true );
        wp_enqueue_script( 'date', get_template_directory_uri() . '/js/build/date.js', array('jquery'), '1', true );

        // wp_enqueue_script( 'validatelocalize', get_template_directory_uri() . '/js/validate/localization/messages_uk.min.js', array('jquery', 'medicalmcreateorder' ), '1', true );
        wp_enqueue_script( 'validateadditional', get_template_directory_uri() . '/js/validate/additional-methods.min.js', array('jquery', 'medicalmcreateorder' ), '1', true );
        wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/validate/jquery.validate.min.js', array('jquery', 'validateadditional' ), '1', true );
        // wp_enqueue_script( 'medical-m', get_template_directory_uri() . '/js/medical-m.js', array('jquery'), '1.1', true );
        // function covid_js(){

        wp_enqueue_script( 'medicalm', get_template_directory_uri() . '/js/covid2019.js', array('jquery'), '1.0.1.2' );

        wp_localize_script( 'medicalm', 'medicalM', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'medical-m' ) // Create nonce which we later will use to verify AJAX request
        ));

        wp_enqueue_script( 'medicalmcreateorder', get_template_directory_uri() . '/js/covid2019-create-order.js', array('jquery'), '1.0.1' );

        wp_localize_script( 'medicalmcreateorder', 'medicalmCreateOrder', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce( 'medical-m-create-order' ) // Create nonce which we later will use to verify AJAX request
        ));
        // }

    }

}
















//Изменить отправителя (wordpress) в письме
add_filter( 'wp_mail_from_name', function($from_name){
    return 'Epolicy';
} );


function covid_js(){

    wp_enqueue_script( 'covidbid', get_template_directory_uri() . '/js/covid-bid.js', array('jquery') );

    wp_localize_script( 'covidbid', 'covidBid', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce( 'covid-bid' ) // Create nonce which we later will use to verify AJAX request
    ));
}


add_action('wp_ajax_covidbid', 'covid_bid');
add_action('wp_ajax_nopriv_covidbid', 'covid_bid');

function covid_bid(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('asd', 'asdasd', 400);
    }

    check_ajax_referer( 'covid-bid', 'nonce', true );

    $insurance_company = $_POST['insuranceCompany'];
    $insurance_Amount = $_POST['insuranceAmount'];
    $insurance_Period = $_POST['insurancePrediod'];
    $insurance_Price = $_POST['insurancePrice'];
    $insurance_customer_name = $_POST['customerName'];
    $insurance_customer_date = $_POST['customerDate'];
    // $insurance_customer_middle_name = $_POST['customerMiddleName'];
    $insurance_customer_surname = $_POST['customerSurname'];
    $insurance_customer_passport = $_POST['customerPassport'];
    $insurance_customer_address = $_POST['customerAddress'];
    $insurance_customer_Tel = $_POST['customerTel'];
    $insurance_customer_Email = $_POST['customerEmail'];

    $site_name =  get_bloginfo();
    $site_email =  get_bloginfo( $show = 'admin_email' );


    $to = 'epolicy@i.ua';
    // $to = 'alexshtanko@gmail.com';

    $subject = 'Epolicy COVID 2019';
    $message = 'Прiзвище: ' . $insurance_customer_surname . '<br> Iм\'я: ' . $insurance_customer_name . '<br> Дата народження: ' . $insurance_customer_date . '<br> Паспорт: ' . $insurance_customer_passport . '<br> Адреса: ' . $insurance_customer_address . '<br> Телефон: ' . $insurance_customer_Tel . '<br> Email: ' . $insurance_customer_Email . '<br> Страхова компанiя: ' . $insurance_company . '<br> Страхова сума: ' . $insurance_Amount . '<br> Страховий перiод: ' . $insurance_Period . '<br> Цiна: ' . $insurance_Price;

    $headers = "From: " . $site_email . "\r\n";
    $headers .= "Reply-To: ". $site_email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=UTF-8' . "\r\n";
    wp_mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $headers);


    wp_die();

}
// add_action('init','register_my_tab');
// function register_my_tab(){

//     $tab_data =	array(
//         'id'=>'id-tab',
//         'name'=>'Имя вкладки',
//         'content'=>array(
//             array(
//                 'callback' => array(
//                     'name'=>'my_custom_function'
//                 )
//             )
//         )
//     );

//     rcl_tab($tab_data);
// }

// function my_custom_function(){

// 	echo 'Hello';
// }




/**
 * Mrdical bid (manager page)
 */


add_action('wp_ajax_medicalm', 'medicalm_bid');
add_action('wp_ajax_nopriv_medicalm', 'medicalm_bid');

function medicalm_bid(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('', '', 400);
    }

    check_ajax_referer( 'medical-m', 'nonce', true );

    $program_id = $_POST['blank_id'];


    global $wpdb;

    $table_name_rate = $wpdb->get_blog_prefix() . 'insurance_rate';
    $table_name_blank = $wpdb->get_blog_prefix() . 'insurance_program';
    $table_name_company = $wpdb->get_blog_prefix() . 'insurance_company';

    // $results = $wpdb->get_results( $wpdb->prepare("SELECT DISTINCT ir.id, ir.franchise, ir.validity, ir.insured_sum, ir.price, ir.locations, ic.title as commpany_title, ib.title as blank_title
    // FROM " . $table_name_rate . " ir
    // left join " . $table_name_company . " ic on ic.id = ir.company_id
    // left join " . $table_name_blank . " ib on ib.id = ir.program_id
    // GROUP BY ir.validity ORDER BY ir.id DESC", '%d', '%d', '%d' ), ARRAY_A );

    $results = $wpdb->get_results( $wpdb->prepare("SELECT DISTINCT ir.validity 
    FROM " . $table_name_rate . " ir 
    WHERE program_id = " . $program_id . "
    GROUP BY ir.validity DESC ORDER BY CONVERT(Substring_Index(ir.validity, '/', -1), SIGNED INTEGER) DESC", '%d' ), ARRAY_A );


    // ORDER BY ir.id DESC", '%d' ), ARRAY_A );
    // return $results;

    $result = array(
        'test' => $_POST['test'],
        'results' => $results,
    );

    echo json_encode($result);

    wp_die();
}


add_action('wp_ajax_getinsurancelist', 'medicalm_insurance_list');
add_action('wp_ajax_nopriv_getinsurancelist', 'medicalm_insurance_list');

function medicalm_insurance_list(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('', '', 400);
    }

    check_ajax_referer( 'medical-m', 'nonce', true );

    $program_id = $_POST['program_id'];

    $blank_type_id = $_POST['blank_type_id'];

    //Надо получить данные страховки

    $validity = $_POST['validity'];

    global $wpdb;

    $table_name_rate = $wpdb->get_blog_prefix() . 'insurance_rate';
    $table_name_program = $wpdb->get_blog_prefix() . 'insurance_program';
    $table_name_company = $wpdb->get_blog_prefix() . 'insurance_company';

//    $result = $wpdb->get_results( $wpdb->prepare( "SELECT ir.id, ir.franchise, ir.validity, ir.insured_sum, ir.price, ir.locations, ir.company_id, ic.title as commpany_title, ic.logo_url as company_logo_url, ir.program_id, ib.title as program_title
//    FROM " . $table_name_rate . " ir
//    left join " . $table_name_company . " ic on ic.id = ir.company_id
//    left join " . $table_name_program . " ib on ib.id = ir.program_id
//    WHERE ir.validity = '" . $validity . "' AND ir.program_id = '" . $program_id . "' AND ir.blank_type_id = '" . $blank_type_id . "' ORDER BY ir.id ASC", '%d', '%d', '%d' ), ARRAY_A );

//02.09.2021
    $result = $wpdb->get_results( $wpdb->prepare( "SELECT 
       ir.id, 
       ir.franchise, 
       ir.validity, 
       ir.insured_sum, 
       ir.price, 
       ir.locations, 
       ir.company_id, 
       ic.title as commpany_title, 
       ic.logo_url as company_logo_url, 
       ir.program_id, 
       ib.title as program_title,
       
       ( SUBSTR(ir.franchise, 1,instr(ir.franchise,' ') - 1) *1) AS franchise_number
    FROM " . $table_name_rate . " ir
    left join " . $table_name_company . " ic on ic.id = ir.company_id
    left join " . $table_name_program . " ib on ib.id = ir.program_id
    WHERE ir.validity = '" . $validity . "' AND ir.program_id = '" . $program_id . "' AND ir.blank_type_id = '" . $blank_type_id . "' ORDER BY franchise_number ASC", '%d', '%d', '%d' ), ARRAY_A );

//    $result = $wpdb->get_results( "SELECT ir.id, ir.franchise, ir.validity, ir.insured_sum, ir.price, ir.locations, ir.company_id, ic.title as commpany_title, ic.logo_url as company_logo_url, ir.program_id, ib.title as program_title
//    FROM " . $table_name_rate . " ir
//    left join " . $table_name_company . " ic on ic.id = ir.company_id
//    left join " . $table_name_program . " ib on ib.id = ir.program_id
//    WHERE ir.validity = '" . $validity . "' AND ir.program_id = '" . $program_id . "' AND ir.blank_type_id = '" . $blank_type_id . "' ORDER BY ir.id ASC;", ARRAY_A );


    // return $results;

    if( ! empty( $result ) ){


        $result = array(
            'message' => 'Знайдено полісів.',
            'result' => medical_list_render( $result, $program_id ),
//             'results' => $result
        );
        // $result = medical_list_render( $result );
    }
    else{
        $result = array(
            'message' => 'В базі данних відсутні поліси за вашими критеріями.',
            'result' => $result,
        );
    }

    echo json_encode($result);
    // echo $result;

    wp_die();
}


function medical_list_render( $insurance_list, $program_id = '' ) {

    /*
     * Получаем список отображаемых компаний
     */
    $cur_user_id = get_current_user_id();


    $result = '';

    // $result .= '<div class="step-3-results-list">';

    $results = array();

    $program_id = $program_id;

    $current_time = date('H:i:s');
    //Создаем массив компаний и сортируем по страховой выплате и компании

    if( current_user_can('create_users') ){


        foreach( $insurance_list as $item )
        {
            //Убираем СК ЕВРОИНС
            if( $item['company_id'] == 4 && $current_time < '23:00:00' )
            {
                $results[$item['insured_sum']][$item['commpany_title']]['logo'] = $item['company_logo_url'];
                $results[$item['insured_sum']][$item['commpany_title']]['validity'] = $item['validity'];
                $results[$item['insured_sum']][$item['commpany_title']]['company_id'] = $item['company_id'];
                $results[$item['insured_sum']][$item['commpany_title']]['franchise'][] = array(
                    'id' => $item['id'],
                    'franchise' =>  $item['franchise'],
                    'price' => $item['price'],
                    'program_id' => $item['program_id'],
                    'program_title' => $item['program_title'],
                    'rate_locations' => $item['locations'],
                    // 'rate_id' => $item['rate_title'],
                );
            }
            else if( $item['company_id'] != 4 )
            {
                $results[$item['insured_sum']][$item['commpany_title']]['logo'] = $item['company_logo_url'];
                $results[$item['insured_sum']][$item['commpany_title']]['validity'] = $item['validity'];
                $results[$item['insured_sum']][$item['commpany_title']]['company_id'] = $item['company_id'];
                $results[$item['insured_sum']][$item['commpany_title']]['franchise'][] = array(
                    'id' => $item['id'],
                    'franchise' =>  $item['franchise'],
                    'price' => $item['price'],
                    'program_id' => $item['program_id'],
                    'program_title' => $item['program_title'],
                    'rate_locations' => $item['locations'],
                    // 'rate_id' => $item['rate_title'],
                );
            }
        }
    }
    else
    {
        foreach( $insurance_list as $item ){

            //Убираем СК ЕВРОИНС
            if( $item['company_id'] == 4 && $current_time < '23:00:00' )
            {
                $user_company_visible_status = get_user_meta($cur_user_id, 'user_insurance_company_visible_status_' . $item['company_id'], true);

                if ($user_company_visible_status == 1) {
                    $results[$item['insured_sum']][$item['commpany_title']]['logo'] = $item['company_logo_url'];
                    $results[$item['insured_sum']][$item['commpany_title']]['validity'] = $item['validity'];
                    $results[$item['insured_sum']][$item['commpany_title']]['company_id'] = $item['company_id'];
                    $results[$item['insured_sum']][$item['commpany_title']]['franchise'][] = array(
                        'id' => $item['id'],
                        'franchise' => $item['franchise'],
                        'price' => $item['price'],
                        'program_id' => $item['program_id'],
                        'program_title' => $item['program_title'],
                        'rate_locations' => $item['locations'],
                        // 'rate_id' => $item['rate_title'],
                    );
                }
            }
            else if( $item['company_id'] != 4 )
            {
                $user_company_visible_status = get_user_meta($cur_user_id, 'user_insurance_company_visible_status_' . $item['company_id'], true);

                if ($user_company_visible_status == 1) {
                    $results[$item['insured_sum']][$item['commpany_title']]['logo'] = $item['company_logo_url'];
                    $results[$item['insured_sum']][$item['commpany_title']]['validity'] = $item['validity'];
                    $results[$item['insured_sum']][$item['commpany_title']]['company_id'] = $item['company_id'];
                    $results[$item['insured_sum']][$item['commpany_title']]['franchise'][] = array(
                        'id' => $item['id'],
                        'franchise' => $item['franchise'],
                        'price' => $item['price'],
                        'program_id' => $item['program_id'],
                        'program_title' => $item['program_title'],
                        'rate_locations' => $item['locations'],
                        // 'rate_id' => $item['rate_title'],
                    );
                }
            }

        }
    }


    //Отрисовываем HTML

    if( ! empty( $results ) ) {
        foreach ($results as $k_insured_sum => $v_insured_sum) {

            $result .= '<div class="InsuranceAmountText">' . $k_insured_sum . '</div>';

            $result .= '<div class="step-3-results-list">';
            $company_logo = '';
            foreach ($v_insured_sum as $k_company => $v_company) {
                if (!empty($v_company['logo'])) {
                    $company_logo = '<img src="' . $v_company['logo'] . '" alt="' . $k_company . '">';
                } else {
                    $company_logo = '';
                }

                $coefficient_message = '';

                if ($v_company['company_id'] == 1 or $v_company['company_id'] == 2) {
                    $coefficient_message = '<span class="coefficient-message js-coefficient-message" data-toggle="tooltip" data-placement="top" title="Цiна може бути змiнена в залежностi вiд дати народження."><i class="fa fa-info-circle" aria-hidden="true"></i></span>';
                }

                $result .= '<div class="row step-3-results-item">';
                $result .= '<div class="col-md-12">';
//                $result .= '<div class="step-3-results-item-top">';
                $result .= '<div class="row step-3-results-item-top">';
                $result .= '<div class="col-sm-4 col-md-4"><div class="company-logo">' . $company_logo . '</div><div class="company-title">' . $k_company . '</div></div>';
                $result .= '<div class="col-sm-4 col-md-4"><div class="step-3-dcv"><div class="step-3-results-item-title">Оберiть франшизу</div>';

                $i = 0;
                $rate_id = '';
                $rate_franchise = '';
                $rate_locations = '';
                foreach ($v_company['franchise'] as $company) {
                    if ($i == 0) {
                        $price = $company['price'];
                        $rate_id = $company['id'];
                        $rate_franchise = $company['franchise'];
                        $rate_locations = $company['rate_locations'];
                        $result .= '<p><input type="radio" name="' . $k_insured_sum . $k_company . '" id="' . $company['id'] . '" data-insurance-price="' . $company['price'] . '" data-insurance-amount="' . $company['franchise'] . '" data-franchise-amount="' . $k_insured_sum . '" checked><label for="' . $company['id'] . '" data-insurance-price="' . $company['price'] . '" data-franchise-amount="' . $company['franchise'] . '" data-rate-location="' . $rate_locations . '">' . $company['franchise'] . '</label></p>';
                    } else {
                        $result .= '<p><input type="radio" name="' . $k_insured_sum . $k_company . '" id="' . $company['id'] . '" data-insurance-price="' . $company['price'] . '" data-insurance-amount="' . $company['franchise'] . '" data-franchise-amount="' . $k_insured_sum . '"><label for="' . $company['id'] . '" data-insurance-price="' . $company['price'] . '" data-franchise-amount="' . $company['franchise'] . '" data-rate-location="' . $company['rate_locations'] . '">' . $company['franchise'] . '</label></p>';
                    }
                    $i++;
                }


                $result .= '</div></div>';
                // $result .= '<div class="col-sm-4 col-md-2"><div class="step-3-price"><div class="step-3-results-item-title">Цiна</div><span class="price js-insurance-price">' . $company['price'] . '</span> <span class="currency">грн.</span></div></div>';
                $result .= '<div class="col-sm-4 col-md-2"><div class="step-3-price"><div class="step-3-results-item-title">Цiна ' . $coefficient_message . '</div><span class="price js-insurance-price">' . $price . '</span> <span class="currency">грн.</span></div></div>';

                // $result .= '<div class="col-md-2"><button data-company-id="' . $v_company['company_id'] . '" data-cmpany-name="' . $k_company . '" data-insurance-currency="" data-insurance-period="'. $v_company['validity'] .'" data-insurance-price="' . $company['price'] . '" data-franchise-amount="' . $rate_franchise . '"  data-rate-id="'. $rate_id .'" data-rate-franchise="' . $rate_franchise . '" data-rate-validity="'. $v_company['validity'] .'" data-rate-insured-sum="'. $k_insured_sum .'" data-rate-price="' . $company['price'] . '" data-rate-locations="'. $rate_locations .'" class="btn-get-it js-get-insurance">Придбати</button></div>';
                $result .= '<div class="col-md-2"><button data-program-id="' . $program_id . '" data-company-id="' . $v_company['company_id'] . '" data-cmpany-name="' . $k_company . '" data-insurance-currency="" data-insurance-period="' . $v_company['validity'] . '" data-insurance-price="' . $price . '" data-franchise-amount="' . $rate_franchise . '"  data-rate-id="' . $rate_id . '" data-rate-franchise="' . $rate_franchise . '" data-rate-validity="' . $v_company['validity'] . '" data-rate-insured-sum="' . $k_insured_sum . '" data-rate-price="' . $price . '" data-rate-locations="' . $rate_locations . '" class="theme-button btn-get-it js-get-insurance">Придбати</button></div>';

                $result .= '</div></div></div>';

            }

            $result .= '</div>';

        }
    }
    else
    {
        $result = '<p style="text-align: center">Для Вас не додано жондої компанiї. Звернiться до адмiнicтратора сайту.</p>';
    }

    return $result;

}

add_action('wp_ajax_medicalmcreateorder', 'medicalm_insurance_create_order');
add_action('wp_ajax_nopriv_medicalmcreateorder', 'medicalm_insurance_create_order');

function medicalm_insurance_create_order(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('', '', 400);
    }

    check_ajax_referer( 'medical-m-create-order', 'nonce', true );

    $result = array();

    $surname = strip_tags( $_POST['surname'] );
    $name = strip_tags( $_POST['name'] );
    $passport = strip_tags( $_POST['passport'] );
    $passport_series = preg_replace("/[^A-Za-z]/", '', $passport);
    $passport_number = preg_replace("/[^0-9]/", '', $passport);
    $date = strip_tags( $_POST['date'] );

    $birthday = date("Y-m-d", strtotime($date) );
    $birthday_reverse = date("d-m-Y", strtotime($date) );

    //Convert dd.mm.yyyy to yyyy-mm-dd
    $date = date("Y-m-d", strtotime($date) );
    $date_now = date('Y-m-d');

    $address = strip_tags( $_POST['address'] );
    $tel = strip_tags( $_POST['tel'] );
    $email = strip_tags( $_POST['email'] );
    $company_id = strip_tags( $_POST['company_id'] );
    $company_title = strip_tags( $_POST['company_title'] );

    // $franchise = strip_tags( $_POST['franchise'] );
    $period = strip_tags( $_POST['period'] );
    $blank_number = strip_tags( $_POST['blank_number'] );
    $date_from = strip_tags( $_POST['date_start'] );
    $date_from = date("Y-m-d", strtotime($date_from) );
    $program_id = strip_tags( $_POST['blank_id'] );
    $program_title = strip_tags( $_POST['blank_title'] );
    $blank_series = strip_tags( $_POST['blank_series'] );
    $blank_type_id = strip_tags( $_POST['blank_type_id'] );
    $blank_type_id = 2;

    if( isset( $_POST['inn'] ) )
    {
        $inn = strip_tags( $_POST['inn'] );
    }
    else
    {
        $inn = '';
    }

    if( isset( $_POST['sex'] ) )
    {
        $sex = strip_tags( $_POST['sex'] );
    }
    else
    {
        $sex = '';
    }

    if( isset( $_POST['eddr'] ) )
    {
        $eddr = strip_tags( $_POST['eddr'] );
    }
    else
    {
        $eddr = '';
    }



    $rate_id = strip_tags( $_POST['rate_id'] );
    $rate_franchise = strip_tags( $_POST['rate_franchise'] );
    $rate_validity = strip_tags( $_POST['rate_validity'] );
    $rate_insured_sum = strip_tags( $_POST['rate_insured_sum'] );
    $rate_price = strip_tags( $_POST['rate_price'] );
    $rate_locations = strip_tags( $_POST['rate_locations'] );
    $rate_coefficient = strip_tags( $_POST['rate_coefficient'] );

    $rate_price_coefficient = ( ! empty( $_POST['rate_price_coefficient'] ) ) ? $_POST['rate_price_coefficient'] : 1;

//    $test = json_decode( $_POST['test'] );
    $insurers = $_POST['insurers'];

    $insurer_status = (int) $_POST['insurer_status'];

    $current_time = date('H:i:s');


    //Цена с наценкой
    //Для компании "Провідна" ID = 1
    //Изначально надо уменьшить стоимость на 20%
    //Потом увеличиваем на выбраный коеффициент
    /*if( $company_id == 1 ){
        if( $rate_price_coefficient != 1 ){
            $rate_price = $rate_price / 1.2;
            $rate_price = $rate_price * $rate_price_coefficient;
        }
    }*/
//    $rate_price = $rate_price * $rate_price_coefficient;


    $date_to = explode("/", $period);
    $count_days = $date_to[1];
    $destinition_days = $date_to[0];
    $date_to = $date_to[0];





    $summ = $date_from . " + " . ($date_to -1) . " days";
    $date_to = date( "Y-m-d", strtotime( $summ ) );



    $pdf_url = '';

    //Получаем ID пользователя и проверяем его роль
    $user_id = get_current_user_id();
    // $user_id = 50;
    if( $user_id > 0 ){
        $user_data = get_userdata( 1 );
        $user_role = $user_data->roles[0];
        if( $user_role == 'manager' ){
            $is_manager = 1;
        }
        else{
            $is_manager = 0;
        }
    }
    else{
        $is_manager = 0;
    }

    $status = 0;
    //ВІЗА СТАНДАРТНІ БЛАНКИ
//    if( $program_id == 1 ){

    $user_years = get_full_years( $date );

    if( $user_years < 18 ){
        $result['message'][] = '<span class="message-danger">Страхувальник не може бути молодшим за 18 рокiв.</span>';
    }


    //Проверяем коеффициенты по дате рождения пользователей
    //Если статус застрахованых персон ($insurer_status) равен 0 значит мы не должны учитывать возрастной коефициент страховальника
    if( $insurer_status != 0 ){
        $coefficient_data = setCoeficient( $company_id, $user_years, $company_title, $program_title, $program_id );

        if( ! empty( $coefficient_data['message'] ) ) {
            $result['message'][] = $coefficient_data['message'];
        }

        $rate_coefficient = $coefficient_data['coefficient'];
    }
    else{
        $rate_coefficient = 1;
    }



    $error_txt_message = [];
    $error_txt_message['max_person'] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 3 особи на бланк.</span>';
    // СК ПРОВІДНА
    //Считаем количество застрахованых персон, если больше 1 то выдаем сообщение об ошибке
    if( $company_id == 1 )
    {
        if( count( $insurers ) > 3 )
        {
            $result['message'][] = $error_txt_message['max_person'];
        }

        if( $insurer_status == 1 && count( $insurers ) > 2 )
        {
            $result['message'][] = $error_txt_message['max_person'];
        }
    }
    //СК ГАРДІАН
    elseif ( $company_id == 2 )
    {

//        if( empty( $inn ) ) $result['message'][] = '<span class="message-danger">IHH відсутнiй.</span>';
        if( empty( $inn) && empty( $eddr ) ) $result['message'][] = '<span class="message-danger">IHH або ЕДДР відсутнi.</span>';
        if( empty( $sex ) ) $result['message'][] = '<span class="message-danger">Стать не вказана.</span>';

        if( count( $insurers ) > 1 )
        {
            $result['message'][] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 1 особу на бланк.</span>';
        }

        if( $insurer_status == 1 && count( $insurers ) > 1 )
        {
            $result['message'][] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 1 особу на бланк.</span>';
        }
    }
//    elseif ( $company_id == 2 )
//    {
//        if( count( $insurers ) > 3 )
//        {
//            $result['message'][] = $error_txt_message['max_person'];
//        }
//
//        if( $insurer_status == 1 && count( $insurers ) > 2 )
//        {
//            $result['message'][] = $error_txt_message['max_person'];
//        }
//    }
    //СК Ю.ЕС.АЙ
    elseif ( $company_id == 3 )
    {
        if( count( $insurers ) > 3 )
        {
            $result['message'][] = $error_txt_message['max_person'];
        }

        if( $insurer_status == 1 && count( $insurers ) > 2 )
        {
            $result['message'][] = $error_txt_message['max_person'];
        }
    }
    //СК ЄВРОІНС
    elseif ( $company_id == 4 )
    {
        if( count( $insurers ) > 1 )
        {
            $result['message'][] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 1 особу на бланк.</span>';;
        }

        if( $insurer_status == 1 && count( $insurers ) > 1 )
        {
            $result['message'][] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 1 особу на бланк.</span>';;
        }
    }
    //СК ІНТЕР-ПЛЮС
    elseif ( $company_id == 5 )
    {
        if( count( $insurers ) > 3 )
        {
            $result['message'][] = $error_txt_message['max_person'];
        }

        if( $insurer_status == 1 && count( $insurers ) > 2 )
        {
            $result['message'][] = $error_txt_message['max_person'];
        }
    }
    //СК ЕКТА
    elseif ( $company_id == 6 )
    {
        if( count( $insurers ) > 2 )
        {
            $result['message'][] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 2 особи на бланк.</span>';;
        }

        if( $insurer_status == 1 && count( $insurers ) > 1 )
        {
            $result['message'][] = '<span class="message-danger">Багато застрахованих осіб. По даній компанії можливо застрахувати максимум 2 особи на бланк.</span>';;
        }
    }


    //ЕВРОИНС
    if( $company_id == 4 && $current_time > '23:00:00' )
    {
        $result['message'][] = '<span class="message-danger">Для СК Евроiнс оформлення договорiв пiсля 23:00 заборонено.</span>';
    }



    //Вроверяем на пустоту переданые параметры
    if( empty( $surname ) ) $result['message'][] = '<span class="message-danger">Поле "Прiзвище" заповнено не коректно.</span>';
    if( empty( $name ) ) $result['message'][] = '<span class="message-danger">Поле "Iм\'я" заповнено не коректно.</span>';
    if( empty( $passport ) ) $result['message'][] = '<span class="message-danger">Поле "Серiя, номер паспорта" заповнено не коректно.</span>';
    if( empty( $date ) ) $result['message'][] = '<span class="message-danger">Поле "Дата народження" заповнено не корректно.</span>';
    if( empty( $address ) ) $result['message'][] = '<span class="message-danger">Поле "Адреса постійного місця проживання" заповнено не коректно.</span>';
    // if( empty( $tel ) ) $result['message'][] = '<span class="message-danger">Поле "Телефон" заповнено не коректно.</span>';
    // if( empty( $email ) ) $result['message'][] = '<span class="message-danger">Поле "Email" заповнено не коректно.</span>';
    if( empty( $company_id ) ) $result['message'][] = '<span class="message-danger">Відсутня така страхова компанія.</span>';
    if( empty( $company_title ) ) $result['message'][] = '<span class="message-danger">Відсутня назва страхової компанії.</span>';

    // if( empty( $franchise ) ) $result['message'][] = 'Поле "Франшиза" заповнено не коректно.';
    if( empty( $period ) ) $result['message'][] = '<span class="message-danger">Поле "перiод страхування" заповнено не коректно.</span>';

    if( empty( $date_from ) ) $result['message'][] = '<span class="message-danger">Поле "Дата початку дiї договору" заповнено не коректно.</span>';
    if( empty( $program_id ) ) $result['message'][] = '<span class="message-danger">Поле "Оберіть бланк" заповнено не коректно.</span>';
    if( empty( $program_title ) ) $result['message'][] = '<span class="message-danger">Назва програми відсутня.</span>';
    //Тип бланка "Паперовий"
    if( $blank_type_id == 1 ) {
        if (empty($blank_number)) $result['message'][] = '<span class="message-danger">Поле "Номер бланка" заповнено не коректно.</span>';
    }

    //Тип бланка "Паперовий"
    if( $blank_type_id == 1 ){
        if( empty( $blank_series ) ) $result['message'][] = '<span class="message-danger">Відсутня серiя бланка.</span>';
    }


    //Тип бланка "Электронный"
    if( $blank_type_id == 2 ){
        if( empty( $email ) ) $result['message'][] = '<span class="message-danger">Введiть Email.</span>';
        if( empty( $tel ) ) $result['message'][] = '<span class="message-danger">Введiть номер телефону.</span>';
    }

    if( empty( $rate_id ) ) $result['message'][] = '<span class="message-danger">ID тарифа відсутнє.</span>';
    if( empty( $rate_franchise ) ) $result['message'][] = '<span class="message-danger">"Франшиза" не вибрана.</span>';
    if( empty( $rate_validity ) ) $result['message'][] = '<span class="message-danger">"Перiод страхування" не вибраний.</span>';
    if( empty( $rate_insured_sum ) ) $result['message'][] = '<span class="message-danger">Страхова сума відсутня.</span>';
    if( empty( $rate_price ) ) $result['message'][] = '<span class="message-danger">Ціна страхового полюча відсутня.</span>';
    if( empty( $rate_locations ) ) $result['message'][] = '<span class="message-danger">Територія дії відсутня.</span>';


    //Проверяем заполнены ли данные в "страховых особах"
    if( ! empty( $insurers ) ){

        $insurer_count = 1;

        foreach ( $insurers as $insurer ){

            if( empty( $insurer['lastName'] ) ) $result['message'][] = '<span class="message-danger">Не вказано прізвище у застрахованої особи №'. $insurer_count . '.</span>';
            if( empty( $insurer['name'] ) ) $result['message'][] = '<span class="message-danger">Не вказано ім\'я у застрахованої особи №'. $insurer_count . '.</span>';
            if( empty( $insurer['date'] ) ) $result['message'][] = '<span class="message-danger">Не вказана дата народження у застрахованої особи №'. $insurer_count . '.</span>';
            if( empty( $insurer['passport'] ) ) $result['message'][] = '<span class="message-danger">Не вказанні паспортні дані у застрахованої особи №'. $insurer_count . '.</span>';
            if( empty( $insurer['address'] ) ) $result['message'][] = '<span class="message-danger">Не вказано адреса у застрахованої особи №'. $insurer_count . '.</span>';

            $insurer_date = get_full_years( $insurer['date'] );
            //Проверяем коеффициенты по дате рождения пользователей
            $coefficient_data = setCoeficient( $company_id, $insurer_date, $company_title, $program_title, $program_id );

            if( ! empty( $coefficient_data['message'] ) ) {
                $result['message'][] = $coefficient_data['message'];
            }

            $insurer_count ++;
        }
    }

    $data = array();

    $data['surname'] = $surname;
    $data['name'] = $name;
    $data['passport'] = $passport;
    $data['date'] = $date;
    $data['address'] = $address;
    $data['tel'] = $tel;
    $data['email'] = $email;
    $data['company_id'] = $company_id;
    $data['period'] = $period;
    $data['date_start'] = $date_from;
    $data['program_id'] = $program_id;
    $data['blank_number'] = $blank_number;
    $data['blank_series'] = $blank_series;

    $data['rate_id'] = $rate_id;
    $data['rate_franchise'] = $rate_franchise;
    $data['rate_validity'] = $rate_validity;
    $data['rate_insured_sum'] = $rate_insured_sum;
    $data['rate_price'] = $rate_price;
    $data['rate_locations'] = $rate_locations;

    $data['user_id'] = $user_id;
    $data['user_role_text'] = $user_data->roles[0];
    $data['user_role'] = $user_role;
    $data['insurers'] = $insurers;


    // $result['message'][] = 'Поліс успішно оформлено';
    // $result['data'] = $data;


    // $query = $wpdb->insert( $table_name, array( 'program_id' => $program_id, 'program_title' => $program_title, 'blank_number' => $blank_number, 'blank_series' => $blank_series,
    // 'company_id' => $company_id, 'company_title' => $company_title, 'rate_id' => $rate_id, 'rate_franchise' => $rate_franchise, 'rate_validity' => $rate_validity,
    // 'rate_insured_sum' => $rate_insured_sum, 'rate_price' => $rate_price, 'rate_locations' => $rate_locations, 'name' => $name, 'last_name' => $surname,
    // 'passport' => $passport, 'birthday' => $date, 'address' => $address, 'phone_number' => $tel, 'email' => $email, 'pdf_url' => $pdf_url, 'is_manager' => $is_manager, 'user_id' => $user_id, 'status' => 1 ), array( '%d', '%s', '%d', '%s', '%d', '%s', '%d', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d' ));





    // echo json_encode( $result );

    // wp_die();


    //Проверяем достоверность даных полученых из фронта
    global $wpdb;

    $table_name_rate = $wpdb->get_blog_prefix() . 'insurance_rate';

    $authenticity = $wpdb->get_row( "SELECT * FROM ".$table_name_rate." WHERE id = ".$rate_id." ", ARRAY_A );
//    $result['message'][] = $authenticity['price'];
//    $result['message'][] = $rate_price;

    if( $authenticity['price'] != $rate_price ){
        $result['message'][] = '<span class="message-danger">Були переданi недостовiрнi данi.</span>';
    }









    //Если ошибок нет, то продолжаем выполнение
    if( empty( $result['message'] ) ){


        /*
         * Оформляем договор
         * $blank_type_id = 1 - "Паперовий бланк"
         * $blank_type_id = 2 - "електронний бланк"
         * */

        if( $blank_type_id == 1 ) {

            $paper = true;

            $table_name = $wpdb->get_blog_prefix() . 'insurance_orders';
            $table_name_number_of_blank = $wpdb->get_blog_prefix() . 'insurance_number_of_blank';
            $insurance_statuses = $wpdb->get_blog_prefix() . 'insurance_statuses';

            //Проверяем оформлена ли уже страховка по такому номеру бланка

            //        $has_blank = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM " . $table_name . " WHERE blank_number = %d AND status = 1", $blank_number ), ARRAY_A );

            $has_blank = $wpdb->get_results($wpdb->prepare("SELECT o.id FROM " . $table_name . " o INNER JOIN " . $insurance_statuses . " s ON s.id = o.status WHERE o.blank_number = %d AND o.company_id = %d AND blank_series = %s AND o.status = 1 AND s.freeBlank != 1", $blank_number, $company_id, $blank_series ), ARRAY_A);

            // 07.12.2021
            // $has_blank = $wpdb->get_results($wpdb->prepare("SELECT o.id FROM " . $table_name . " o INNER JOIN " . $insurance_statuses . " s ON s.id = o.status WHERE o.blank_number = %d AND s.freeBlank != 1", $blank_number), ARRAY_A);

            ////Если такой бланк еще небыл оформлен идем дальше
            if (empty($has_blank)) {
                //Ищем попадает ли указаный номер бланка в диапазон БЛАНКОВ в таблице
                $has_blank = $wpdb->get_results("SELECT id, comments FROM " . $table_name_number_of_blank . " WHERE company_id = " . $company_id . " AND blank_series = '" . $blank_series . "' AND " . $blank_number . " >= number_start AND " . $blank_number . " <= number_end AND status = 1", ARRAY_A);
                // $result['message'][] = 'Такого бланка еще нет. Будем пробовать добавить.';

                //Если бланк входит в диапазон бланков то записываем ОРДЕР в таблицу
                if (!empty($has_blank)) {

                    //Записываем ИД и коментарий бланка
                    $number_blank_id = $has_blank[0]['id'];
                    $number_blank_comment = $has_blank[0]['comments'];

                    $user_string_id = get_parents_id($user_id);

                    if ($user_string_id == '') {
                        $user_string_id = $user_id;
                    }


                    $table_blank_to_manager = $wpdb->get_blog_prefix() . 'insurance_blank_to_manager';
                    ////Проверяем попадает ли указаный номер бланка в диапазон БЛАНКОВ менеджера
                    //$has_manager_blank = $wpdb->get_results( "SELECT id FROM " . $table_blank_to_manager . " WHERE manager_id=" . $user_id . " AND number_of_blank_id=" . $number_blank_id . " AND " . $blank_number . " >= number_start AND " . $blank_number . " <= number_end AND status = 1", ARRAY_A );
                    $has_manager_blank = $wpdb->get_results("SELECT id FROM " . $table_blank_to_manager . " WHERE manager_id IN (" . $user_string_id . ") AND number_of_blank_id=" . $number_blank_id . " AND " . $blank_number . " >= number_start AND " . $blank_number . " <= number_end AND status = 1", ARRAY_A);
                    if( ! empty( $has_manager_blank ) ){
//                     if( 1 ){

                        $unicue_code = random_string();

                        $cashback = get_user_meta($user_id, "user_return_percent_medical_company_id_" . $company_id, 1);

                        $table_name = $wpdb->get_blog_prefix() . 'insurance_orders';
                        $table_name_insurance_program = $wpdb->get_blog_prefix() . 'insurance_program';

                        $program_title_original = $wpdb->get_row("SELECT title FROM " . $table_name_insurance_program . " WHERE id = " . (int)$program_id . " AND status = 1", ARRAY_A);
                        $program_title_original = $program_title_original['title'];

                        $query = $wpdb->insert($table_name, array('program_id' => $program_id, 'program_title' => $program_title_original, 'number_blank_id' => $number_blank_id, 'number_blank_comment' => $number_blank_comment, 'blank_number' => $blank_number,
                            'blank_series' => $blank_series, 'company_id' => $company_id, 'company_title' => $company_title, 'rate_id' => $rate_id, 'rate_franchise' => $rate_franchise,
                            'rate_validity' => $rate_validity, 'rate_insured_sum' => $rate_insured_sum, 'rate_price' => $rate_price, 'rate_locations' => $rate_locations, 'name' => $name,
                            'last_name' => $surname, 'passport' => $passport, 'birthday' => $date, 'address' => $address, 'phone_number' => $tel, 'email' => $email, 'date_from' => $date_from,
                            'date_to' => $date_to, 'count_days' => $count_days, 'pdf_url' => $pdf_url, 'is_manager' => $is_manager, 'user_id' => $user_id, 'cashback' => $cashback, 'status' => 1, 'rate_coefficient' => $rate_coefficient, 'rate_price_coefficient' => $rate_price_coefficient, 'unicue_code' => $unicue_code, 'insurer_status' => $insurer_status, 'blank_type_id' => $blank_type_id, 'sex' =>  $sex, 'inn' => $inn, 'eddr' => $eddr ),
                            array('%d', '%s', '%d', '%s', '%d', '%s', '%d', '%s', '%d', '%s', '%s', '%s', '%f', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%d', '%d', '%f', '%d', '%f', '%f', '%s', '%d', '%d', '%s', '%s', '%s' ));

                        $order_id = $wpdb->insert_id;
                        // $query = $wpdb->insert( $table_name, array( 'program_id' => $program_id, 'program_title' => $program_title, 'blank_number' => $blank_number,
                        // 'blank_series' => $blank_series, 'company_id' => $company_id, 'company_title' => $company_title, 'rate_id' => $rate_id, 'rate_franchise' => $rate_franchise,
                        // 'rate_validity' => $rate_validity, 'rate_insured_sum' => $rate_insured_sum, 'rate_price' => $rate_price, 'rate_locations' => $rate_locations, 'name' => $name,
                        // 'last_name' => $surname, 'passport' => $passport, 'birthday' => $date, 'address' => $address, 'phone_number' => $tel, 'email' => $email, 'date_from' => $date_from,
                        // 'date_to' => $date_to, 'count_days' => $count_days, 'pdf_url' => $pdf_url, 'is_manager' => $is_manager, 'user_id' => $user_id, 'cashback' => $cashback,'status' => 1, 'rate_coefficient' => $rate_coefficient ),
                        // array( '%d', '%s', '%d', '%s', '%d', '%s', '%d', '%s', '%s', '%s', '%f', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%d', '%d', '%f', '%d', '%f' ));

//                     $result['message'][] = $query;

                        //Если у нас есть Страховальники и был создан договор то можно добавлять новые данные
                        if ($query && !empty($insurers)) {

                            $table_name = $wpdb->get_blog_prefix() . 'insurance_insurer';

                            foreach ($insurers as $insurer) {

                                $insurer_last_name = $insurer['lastName'];
                                $insurer_name = $insurer['name'];
                                $insurer_date = date("Y-m-d", strtotime($insurer['date']));
                                $insurer_coefficient_date = get_full_years($insurer['date']);
                                $insurer_passport = $insurer['passport'];
                                $insurer_address = $insurer['address'];

                                //                        date("Y-m-d", strtotime($date) );
                                //Проверяем коеффициенты по дате рождения пользователей
                                $coefficient_data = setCoeficient($company_id, $insurer_coefficient_date, $company_title, $program_title, $program_id);

                                $rate_coefficient = $coefficient_data['coefficient'];


                                $insurer_query = $wpdb->insert($table_name, array('order_id' => $order_id, 'last_name' => $insurer_last_name, 'name' => $insurer_name, 'birthday' => $insurer_date, 'passport' => $insurer_passport, 'address' => $insurer_address, 'coefficient' => $rate_coefficient, 'price' => $rate_price),
                                    array('%d', '%s', '%s', '%s', '%s', '%s', '%f', '%f'));


                                if (!$insurer_query) {
                                    $result['message'][] = '<span class="message-danger">Не вдалося записати страхувальників в базу данних.</span>';
                                }


                            }

                        }


                        if ($query) {

                            //CK GARDIAN
                            if ($company_id == 2) {

                                $gardian = new Gardian(__DIR__);
                                $currencyRate = '30.3376';
                                $gardian_status = 'Draft';
                                $gardian_phone = $gardian->format_phone_number( $tel );
                                $rate_franchise_number = preg_replace("/[^0-9]/", '', $rate_franchise);

                                $gardian_date_to = $date_from . " + 1 year";
                                $gardian_date_to = $gardian_date_to . " - 1 days";
                                $gardian_date_to = date( "Y-m-d", strtotime( $gardian_date_to ) );


                                if( $sex == 'M' )
                                {
                                    $sex = 'Male';
                                }
                                elseif ( $sex == 'W' )
                                {
                                    $sex = 'Female';
                                }

                                $gardian_rate_insured_sum = preg_replace("/[^0-9]*/",'',$rate_insured_sum);

                                $gardian_product_id = '';
                                // 68947399-4db5-11eb-b19c-00155df66a18 - D (Латвія)
                                // 68947398-4db5-11eb-b19c-00155df66a18 - E (Чехія)
                                // 68947396-4db5-11eb-b19c-00155df66a18 - А (Work)
                                //	6894739a-4db5-11eb-b19c-00155df66a18 - М (Європа)
                                //	aea90dd0-75aa-11eb-b19f-00155df66a18 - М (СНД)
                                if( $program_id == 1 )
                                {
                                    $gardian_product_id = '68947396-4db5-11eb-b19c-00155df66a18';
                                }
                                elseif ( $program_id == 3 )
                                {
                                    $gardian_product_id = '6894739a-4db5-11eb-b19c-00155df66a18';
                                }
                                elseif ( $program_id == 4 )
                                {
                                    $gardian_product_id = '68947398-4db5-11eb-b19c-00155df66a18';
                                }


                                $blankType =  $paper === false ? "true" : "false";

                                $gardian_data = [
                                    'agr[GUID]' => '',
                                    'agr[Blank][BlankGUID]' => '',
                                    'agr[Blank][BlankName]' => '',
                                    'agr[Blank][BlankComment]' => '',
                                    'agr[Blank][BlankComment2]' => '',
                                    'agr[Blank][NumberLength]' => 0,
                                    'agr[BlankNumber]' => 0,
                                    'agr[Sticker][BlankGUID]' => '37e5ec78_2fe2_11ec_b1b2_00155dae7a01', // Тип номерного бланка GUID (Всегда такое значение)
                                    'agr[Sticker][BlankName]' => 'GR', // Тип номерного бланка (Всегда такое значение)
                                    'agr[Sticker][BlankComment]' => '',
                                    'agr[Sticker][BlankComment2]' => '',
                                    'agr[Sticker][NumberLength]' => 0,
                                    'agr[StickerNumber]' => $blank_number,
                                    'agr[Number]' => '',
                                    'agr[Product]' => 'ВЗРКон',
                                    'agr[Date]' => $date_now,
                                    'agr[BegDate]' => $date_from,
                                    'agr[EndDate]' => $gardian_date_to,
                                    'agr[Summ]' => $rate_price * $rate_coefficient,
                                    'agr[Customer][CustomerName]' => $surname . ' ' . $name,
                                    'agr[Customer][CustomerFullName]' => $surname . ' ' . $name,
                                    'agr[Customer][CustomerFName]' => '',
                                    'agr[Customer][CustomerLName]' => '',
                                    'agr[Customer][CustomerSName]' => '',
                                    'agr[Customer][CustomerType]' => 'person',
                                    'agr[Customer][CustomerCode]' => $inn,
                                    'agr[Customer][CustomerBDate]' => $birthday,
                                    'agr[Customer][CustomerForeigner]' => 'false',
                                    'agr[Customer][CustomerPersonWithoutCode]' => 'false',
                                    'agr[Customer][CustomerPhone]' => $gardian_phone,
                                    'agr[Customer][CustomerAddress]' => $address,
                                    'agr[Customer][CustomerAddressLat]' => $address,
                                    'agr[Customer][CustomerPassport][DocType]' => '',
                                    'agr[Customer][CustomerPassport][DocSeries]' => '',
                                    'agr[Customer][CustomerPassport][DocNumber]' => '',
                                    'agr[Customer][CustomerPassport][DocDate]' => '',
                                    'agr[Customer][CustomerPassport][DocSourceOrg]' => '',
                                    'agr[Customer][CustomerDriversLicense][DocType]' => '',
                                    'agr[Customer][CustomerDriversLicense][DocSeries]' => '',
                                    'agr[Customer][CustomerDriversLicense][DocNumber]' => '',
                                    'agr[Customer][CustomerDriversLicense][DocDate]' => '0001-01-01T00:00:00',
                                    'agr[Customer][CustomerDriversLicense][DocSourceOrg]' => '',
                                    'agr[Customer][CustomerPreferentialDocument][DocType]' => '',
                                    'agr[Customer][CustomerPreferentialDocument][DocSeries]' => '',
                                    'agr[Customer][CustomerPreferentialDocument][DocNumber]' => '',
                                    'agr[Customer][CustomerPreferentialDocument][DocDate]' => '0001-01-01T00:00:00',
                                    'agr[Customer][CustomerPreferentialDocument][DocSourceOrg]' => '',
                                    'agr[Customer][CustomerInternationalPassport][DocType]' => 'InternationalPassport',
                                    'agr[Customer][CustomerInternationalPassport][DocSeries]' => $passport_series,
                                    'agr[Customer][CustomerInternationalPassport][DocNumber]' => $passport_number,
                                    'agr[Customer][CustomerInternationalPassport][DocDate]' => '0001-01-01',
                                    'agr[Customer][CustomerInternationalPassport][DocSourceOrg]' => '',
                                    'agr[Customer][CustomerNameLat]' => $surname . ' ' . $name,
                                    'agr[Customer][CustomerIncorrectCode]' => 'false',
                                    'agr[Customer][CustomerContactPerson]' => '',
                                    'agr[Customer][CustomerBankAccount]' => '',
                                    'agr[Customer][CustomerGUID]' => '',
                                    'agr[Customer][CustomerCitizenshipCountry][EnumVal]' => '',
                                    'agr[Customer][CustomerCitizenshipCountry][EnumName]' => '',
                                    'agr[Customer][CustomerCitizenshipCountry][EnumFlag]' => 'false',
                                    'agr[Customer][CustomerCitizenshipCountry][EnumRate]' => 0,
                                    'agr[Customer][CustomerEmail]' => $email,
                                    'agr[Customer][CustomerEDDRCode]' => $eddr,
                                    'agr[Customer][CustomerGender]' => $sex,
                                    'agr[Beneficiary]' => '',
                                    'agr[BeneficiaryIsCustomer]' => 'false',
                                    'agr[Srok]' => 0,
                                    'agr[BonusMalus]' => 0,
                                    'agr[Zone]' => 0,
                                    'agr[Objects][0][Mark]' => '',
                                    'agr[Objects][0][Model]' => '',
                                    'agr[Objects][0][VIN]' => '',
                                    'agr[Objects][0][RegNum]' => '',
                                    'agr[Objects][0][YearOfCreation]' => 0,
                                    'agr[Objects][0][Type]' => '',
                                    'agr[Objects][0][ObjectGUID]' => '',
                                    'agr[Objects][0][Name]' => $surname . ' ' . $name,
                                    'agr[Objects][0][NameLat]' => $surname . ' ' . $name,
                                    'agr[Objects][0][Date]' => $birthday,
                                    'agr[Objects][0][InternationalPassport][DocType]' => '',
                                    'agr[Objects][0][InternationalPassport][DocSeries]' => $passport_series,
                                    'agr[Objects][0][InternationalPassport][DocNumber]' => $passport_number,
                                    'agr[Objects][0][InternationalPassport][DocDate]' => '0001-01-01T00:00:00',
                                    'agr[Objects][0][InternationalPassport][DocSourceOrg]' => '',
                                    'agr[Objects][0][Address]' => $address,
                                    'agr[Objects][0][Phone]' => $gardian_phone,
                                    'agr[Objects][0][DecimalOption1]' => $rate_price * $rate_coefficient,
                                    'agr[Objects][0][DecimalOption2]' => 0,
                                    'agr[Objects][0][AddressLat]' => $address,
                                    'agr[Objects][0][ObjType]' => '',
                                    'agr[Objects][0][StringOption1]' => '',
                                    'agr[UnusedMonthes][M1]' => 'false',
                                    'agr[UnusedMonthes][M2]' => 'false',
                                    'agr[UnusedMonthes][M3]' => 'false',
                                    'agr[UnusedMonthes][M4]' => 'false',
                                    'agr[UnusedMonthes][M5]' => 'false',
                                    'agr[UnusedMonthes][M6]' => 'false',
                                    'agr[UnusedMonthes][M7]' => 'false',
                                    'agr[UnusedMonthes][M8]' => 'false',
                                    'agr[UnusedMonthes][M9]' => 'false',
                                    'agr[UnusedMonthes][M10]' => 'false',
                                    'agr[UnusedMonthes][M11]' => 'false',
                                    'agr[UnusedMonthes][M12]' => 'false',
                                    'agr[OTKFlag]' => 'false',
                                    'agr[OTK6Flag]' => 'false',
                                    'agr[OTKDate]' => '0001-01-01T00:00:00',
                                    'agr[Preference]' => '',
                                    'agr[Franchise]' => $rate_franchise_number,
                                    'agr[OSAGOValues][K1]' => 0,
                                    'agr[OSAGOValues][K2]' => 0,
                                    'agr[OSAGOValues][K3]' => 0,
                                    'agr[OSAGOValues][K4]' => 0,
                                    'agr[OSAGOValues][K5]' => 0,
                                    'agr[OSAGOValues][K6]' => 0,
                                    'agr[OSAGOValues][K7]' => 0,
                                    'agr[OSAGOValues][K8]' => 0,
                                    'agr[OSAGOValues][K9]' => 0,
                                    'agr[PayDate]' => '0001-01-01T00:00:00',
                                    'agr[PayDoc]' => '',
                                    'agr[RegistrationPlace]' => '',
                                    'agr[StazhDo3Let]' => 'false',
                                    'agr[CommerceUse]' => 'false',
                                    'agr[Status]' => $gardian_status,
                                    'agr[Deleted]' => 'false',
                                    'agr[ParentAgreementGUID]' => '',
                                    'agr[ParentAgreementNumber]' => '',
                                    'agr[ParentAgreementDate]' => '0001-01-01T00:00:00',
                                    'agr[CrossAgreementGUID]' => '',
                                    'agr[CrossAgreementNumber]' => '',
                                    'agr[CrossAgreementDate]' => '0001-01-01T00:00:00',
                                    'agr[BlankStatus]' => '',
                                    'agr[SalesChannelGUID]' => 'bd909c32_2b2a_11eb_b19b_00155df66a18', // Канал продажу: Агентський - Агенти-вільний ринок  (Всегда)
                                    'agr[SalesChannelParentGUID]' => '',
                                    'agr[Partner]' => '',
                                    'agr[ParkDiscount]' => 0,
                                    'agr[ParkDiscountStr]' => '',
                                    'agr[BMR]' => 'false',
                                    'agr[ValidationCode]' => '',
                                    'agr[Countries]' => '047c8592-4e59-11eb-b19c-00155df66a18', // Територія покриття: Європа / Europe (Всегда)
                                    'agr[Country]' => '',
                                    'agr[PaymentSchedule][0][PaymentNum]' => 0,
                                    'agr[PaymentSchedule][0][PaymentDate]' => '0001-01-01T00:00:00',
                                    'agr[PaymentSchedule][0][PaymentSum]' => 0,
                                    'agr[SpecialTariff]' => 'false',
                                    'agr[MultiUse]' => 'false',
                                    'agr[BoolOption1]' => 'false',
                                    'agr[BoolOption2]' => 'true',
                                    'agr[BoolOption3]' => 'false',
                                    'agr[BoolOption4]' => 'false',
                                    'agr[BoolOption5]' => 'false',
                                    'agr[StringOption1]' => '',
                                    'agr[StringOption2]' => '',
                                    'agr[Currency]' => 'EUR',
                                    'agr[AgreementType]' => '',
                                    'agr[DurationType]' => $count_days,
                                    'agr[KV]' => 0,
                                    'agr[Summ1]' => $gardian_rate_insured_sum,
                                    'agr[Summ2]' => 0,
                                    'agr[Summ3]' => 0,
                                    'agr[Summ4]' => 0,
                                    'agr[Summ5]' => 0,
                                    'agr[Tariff]' => 0,
                                    'agr[Prem1]' => $rate_price * $rate_coefficient,
                                    'agr[Prem2]' => 0,
                                    'agr[Prem3]' => 0,
                                    'agr[Prem4]' => 0,
                                    'agr[Prem5]' => 0,
                                    'agr[Corr1]' => 0,
                                    'agr[Corr2]' => 0,
                                    'agr[Corr3]' => 0,
                                    'agr[CurrencyRate]' => $currencyRate,
                                    'agr[TerritorySPType]' => '',
                                    'agr[Sighner][EnumVal]' => '',
                                    'agr[Sighner][EnumName]' => '',
                                    'agr[Sighner][EnumFlag]' => 'false',
                                    'agr[Sighner][EnumRate]' => 0,
                                    'agr[ProxyDoc][EnumVal]' => '',
                                    'agr[ProxyDoc][EnumName]' => '',
                                    'agr[ProxyDoc][EnumFlag]' => 'false',
                                    'agr[ProxyDoc][EnumRate]' => 0,
                                    'agr[MaxTariff]' => 'false',
                                    'agr[IsPaid]' => 'false',
                                    'agr[Agent][EnumVal]' => '',
                                    'agr[Agent][EnumName]' => '',
                                    'agr[Agent][EnumFlag]' => 'false',
                                    'agr[Agent][EnumRate]' => 0,
                                    'agr[ProductGUID]' => $gardian_product_id,
                                    'agr[TariffProp]' => '',
                                    'agr[Digital]' => $blankType,
                                    'agr[Password]' => '',
                                    'agr[UsedBlanks]' => ''
                                ];

                                //Если мы страхуем ДРУГОГО ЧЕЛОВЕКА
                                if( $insurer_status == 0 ) {
                                    if (!empty ($insurers)) {
                                        foreach ($insurers as $insurer) {

                                            $insurer_passport_series = preg_replace("/[^A-Za-z]/", '', $insurer['passport']);
                                            $insurer_passport_number = preg_replace("/[^0-9]/", '', $insurer['passport']);

                                            $gardian_data['agr[Objects][0][Name]'] = $insurer['lastName'] . ' ' . $insurer['name'];
                                            $gardian_data['agr[Objects][0][NameLat]'] = $insurer['lastName'] . ' ' . $insurer['name'];
                                            $gardian_data['agr[Objects][0][Date]'] = date("Y-m-d", strtotime($insurer['date']));
                                            $gardian_data['agr[Objects][0][InternationalPassport][DocSeries]'] = $insurer_passport_series;
                                            $gardian_data['agr[Objects][0][InternationalPassport][DocNumber]'] = $insurer_passport_number;
                                            $gardian_data['agr[Objects][0][Address]'] = $insurer['address'];
                                            $gardian_data['agr[Objects][0][AddressLat]'] = $insurer['address'];

                                        }
                                    }
                                }


                                $result['message'][] = $gardian_data;

                                // РЕГИСТРАЦИЯ ДОГОВОРА
                                if($gardian->loginPage()){
                                    /*if($gardian->login() == 200){
                                        //Устанавлтваем курс
                                        $gardian->getCurrencyRate();
                                        $gardian_order = $gardian->createOrder($gardian_data);
//                                    $gardian_order = $gardian->createPaperOrder($gardian_data);

//                                    $result['message'][] = $gardian_order;

                                        if( ! $gardian_order['Result'] )
                                        {
                                            $result['status'] = false;
                                            foreach ( $gardian_order['Messages'] as $error_smg )
                                            {
                                                $result['message'][] = '<span class="message-danger">' . $error_smg . '</span>';
                                            }
                                        }

                                        if(is_array($gardian_order)){
                                            if(array_key_exists('Messages', $gardian_order) && count($gardian_order['Messages']) >= 4 && array_key_exists('Result', $gardian_order) && $gardian_order['Result'] == 1){
                                                $gardian_data['agr[GUID]'] = $gardian_order['Messages'][0];
                                                $gardian_data['agr[Customer][CustomerGUID]'] = $gardian_order['Messages'][1];
                                                $gardian_data['agr[Number]'] = $gardian_order['Messages'][2];
                                                $gardian_data['agr[BlankNumber]'] = explode("-", $gardian_order['Messages'][2])[1];
                                                $gardian_data['agr[Objects][0][ObjectGUID]'] = $gardian_order['Messages'][3];

//                                            $result['message'][] = $gardian_data;
                                                $gardian_result = $gardian->changeOrderStatus($gardian_data, "Signed");
//                                            $gardian_result = $gardian->changeStatusPaperOrder($gardian_data, "Signed");


//                                            $result['message'][] = $gardian_result;
//
                                                $gardian_order_data = [
                                                    'gardian_GUID' => $gardian_result['Messages'][0],
                                                    'gardian_CustomerGUID' => $gardian_result['Messages'][1],
                                                    'gardian_Number' => $gardian_result['Messages'][2],
                                                    'gardian_ObjectGUID' => $gardian_result['Messages'][3],
                                                    'order_id' => $order_id,
                                                    'status' => 1,
                                                ];

                                                $st = $gardian->add_order_data( $gardian_order_data );

//                                            $result['message'][] = $st;
                                                $result['status'] = true;
                                                $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
                                                $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                            }
                                        }
                                        else
                                        {
                                            $result['status'] = false;
                                            $result['message'][] = '<span class="message-danger">Не вдалося додати договip.</span>';
                                            $result['message'][] = $gardian_order;
                                        }
                                    }
                                    else
                                    {
                                        $result['status'] = false;
                                        $result['message'][] = '<span class="message-danger">Не вдалося залогiнитись в СК ГАРДIАН.</span>';
                                    }*/
                                }
                                else
                                {
                                    $result['status'] = false;
                                    $result['message'][] = '<span class="message-danger">Не вдалося увiйти до СК ГАРДIАН.</span>';
                                }


                                if( $result['status'] == false )
                                {
                                    $gardian->remove_order( $order_id );
                                }

                            }
                            //СК ЄВРОІНС
                            /*elseif ( $company_id == 4 )
                            {

                                $euroins = new Euroins();

                                $euroins_result = $euroins->reserve( $data );

                                // Если в ответе от АПИ Евроинса приходит ИД договора значит добавляем данные к нам в БД
                                if( isset( $euroins_result['insuranceApplicationID'] ) )
                                {
                                    $euroins_data = [
                                        'order_id' => $order_id,
                                        'insuranceApplicationID' => $euroins_result['insuranceApplicationID'],
                                        'polisNumber' => $euroins_result['polisNumber'],
                                    ];


                                    //Заносим информацию о договоре в БД
                                    $r = $euroins->add_order_data( $euroins_data );

                                    $result['status'] = true;
                                    $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
                                    //                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/wp-recall/add-on/insurance/report/download_print.php?order_id=' . $wpdb->insert_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                    $result['order_id'] = $wpdb->insert_id;
                                }
                                else
                                {
                                    $result['status'] = false;
                                    $result['message'][] = '<span class="message-danger">Не вдалося оформити полic.</span>';

                                    foreach ( $euroins_result as $euroins_res )
                                    {
                                        $result['message'][] = $euroins_res;
                                    }

                                    //Удаляем договор который сохранили у нас в БД
                                    $euroins->remove_order( $order_id );

                                    if ( !empty($insurers) )
                                    {
    //                                    Удаляем застрахованых персон
                                    }

                                    //EROOR
                                }



                            }*/
                            //CK EKTA
                            elseif ( $company_id == 6 )
                            {
                                $ekta = new Ekta(__DIR__);

                                $ekta_error = [];

                                if( $ekta->login() == 200 ){

                                    /* Расчитываем франшизу
                                     * Для этого берем только число из выбраной франшизы
                                     * и проверяем его на подходящее значение
                                     */
                                    $rate_franchise_number = preg_replace("/[^0-9]/", '', $rate_franchise);
//                                $rate_franchise_number = '';
                                    if( $rate_franchise_number == 0 )
                                    {
                                        $rate_franchise_number = 4;
                                    }
                                    elseif ( $rate_franchise_number == 50 )
                                    {
                                        $rate_franchise_number = 1;
                                    }
                                    elseif ( $rate_franchise_number == 100 )
                                    {
                                        $rate_franchise_number = 2;
                                    }
                                    elseif ( $rate_franchise_number == 150 )
                                    {
                                        $rate_franchise_number = 3;
                                    }


                                    $rate_insured_sum_number = '';
                                    if( $rate_insured_sum == 30000 )
                                    {
                                        $rate_insured_sum_number = 1;
                                    }
                                    elseif ( $rate_insured_sum == 50000 )
                                    {
                                        $rate_insured_sum_number = 2;
                                    }
                                    elseif ( $rate_insured_sum == 60000 )
                                    {
                                        $rate_insured_sum_number = 3;
                                    }




                                    if( empty( $rate_franchise_number ) )
                                    {
                                        $ekta_error[] = 'Вказана франшиза не пiдходить для вибраної компанії.';
                                    }

                                    if( empty( $rate_insured_sum_number ) )
                                    {
                                        $ekta_error[] = 'Страхова сума не  пiдходить для вибраної компанії.';
                                    }


                                    //Если нет ошибок заполняем массив данными и отправляем на сервер ЕКТА
                                    if( empty( $ekta_error ) )
                                    {

                                        $phone = '+' . preg_replace('/\D+/', '', $tel);
//                                    $result['message'][] = $phone;

                                        $ekta_order = [
                                            'territory' => '1',                                   // Территория действия всегда Европа, а это 1
                                            'date_from' => $date_from,                            // Дата начала действия договора '2022-11-25'
                                            'date_to' => $date_to,                                // Дата окончания действия договора '2022-11-25'
                                            'count_active_days' => $count_days,                   // Доступное количество дней за границей
                                            'multivisa' => true,                                  // Мультивиза. Всегда 1
                                            'destinition_days' => $destinition_days,              // Общее количество дней
                                            'police_number' => null,                              // Номер полиса, всегда пусто
                                            'sport' => false,                                     // Страховка для спорта, всегда пусто
                                            'work' => true,                                       // Страховка для работы, всегда 1
                                            'franshise_id' => $rate_franchise_number,             // Франшиза: 0 Euro = 4; 50 Euro = 1; 100 Euro = 2; 150 Euro = 3
                                            'company_id' => 'company1',                           // Страховая компания ЕКТА (всегда такое вот значение)
                                            'coverage_id' => $rate_insured_sum_number,                                 // Покрытие страховки (30 000 EUR = 1; 50 000 EUR = 2; 60 000 EUR = 3)
                                            'insurer' =>                                          // Страховщик
                                                [
                                                    'client_build' =>  '   ',                     // Номера дома, не обязательно, можно передавать пустоту
                                                    'client_street' => '   ',                     // Улица, не обязательно, передаем пустоту
                                                    'client_room' => '   ',                       // Номер квартиры, передаем пустоту
                                                    'client_fname' => $name,                      // Имя страхователя
                                                    'client_lname' => $surname,                   // Фамилия страхователя
                                                    'client_birth' => $birthday_reverse,               // Дата рождения страхователя '14-06-1989'
                                                    'client_phone' => $phone,            // Номер телефона страхователя (обязательно)
                                                    'client_email' => $email,            // Email обязательно
                                                    'client_passport' => $passport,              // Паспорт страхователя (обязательно)
//                                                'client_city' => 'Kiev',                      // Город (обязательно)
                                                    'client_city' => ' ',                      // Город (обязательно)
                                                    'client_country' => 'Ukraine',                // Всегда Украина
                                                    'name_first' => $name,                     // Имя (дублируется)
                                                    'name_last' => $surname,                     // Фамилия (дублируется)
                                                    'phone' => $phone,                              // Номер телефона (дублируется) '+380934444444'
//                                            'city' => 'Kiev',                             // Город (обязательно
                                                    'city' => ' ',                             // Город (обязательно
                                                    'country' => 'Ukraine',                       // Всегда Украина
                                                    'address' => $address,                           // Адрес (поле не обязательное, но лучше передавать тот адрес, что у нас есть)
                                                    'build' => '   ',                             // Номер дома (необязательно)
                                                    'email' => $email,                            // Email страхователя
                                                    'birthday' => $birthday,                   // Дата рождения страхователя только чуть в другом формате (обрати внимание) '1989-06-14'
                                                    'passport' => $passport                      // Загран паспорт
                                                ],
                                            'ns_include' => true                                     // Несчастный случай (всегда 1)
                                        ];


                                        //Если мы страхуем самого себя
                                        if( $insurer_status != 0 )
                                        {
                                            $ekta_order['tourists'][] = array(
                                                'name_first' => $name,             // Имя (обязательно)
                                                'name_last' => $surname,             // Фамилия (обязательно)
                                                'birthday' => $birthday,           // Дата рождения (обязательно) '1989-06-14'
                                                'passport' => $passport,
                                            );

                                            if( ! empty ($insurers) )
                                            {
                                                foreach ($insurers as $insurer)
                                                {

                                                    $ekta_order['tourists'][] = array(
                                                        'name_first' => $insurer['name'],             // Имя (обязательно)
                                                        'name_last' => $insurer['lastName'],             // Фамилия (обязательно)
                                                        'birthday' => date("Y-m-d", strtotime($insurer['date'])),           // Дата рождения (обязательно) '1989-06-14'
                                                        'passport' => $insurer['passport'],
                                                    );

                                                }
                                            }
                                        }
                                        else
                                        {
                                            if( ! empty ($insurers) )
                                            {
                                                foreach ($insurers as $insurer)
                                                {

                                                    $ekta_order['tourists'][] = array(
                                                        'name_first' => $insurer['name'],             // Имя (обязательно)
                                                        'name_last' => $insurer['lastName'],             // Фамилия (обязательно)
                                                        'birthday' => date("Y-m-d", strtotime($insurer['date'])),           // Дата рождения (обязательно) '1989-06-14'
                                                        'passport' => $insurer['passport'],
                                                    );

                                                }
                                            }
                                        }

                                        //Раскомментировать после старта
//                                        $ekta_response = $ekta->createOrder( $ekta_order );
//                                      echo $ekta_response;

//                                    $ekta_response = '{"success":false,"data":{"success":true,"id":1,"order_id":1,"tariff_id":40,"cost":325}}';
                                        //Раскомментировать после старта
//                                        $ekta_response = json_decode( $ekta_response, true);

//                                    foreach( $ekta_response as $ekta_resp )
//                                    {
//                                        $result['message'][] = $ekta_resp;
//                                    }

//                                    $result['message'][] = $ekta_order;
//                                    $result['message'][] = $ekta_response;
                                        //Раскомментировать после старта
                                        /*if( $ekta_response['success'] )
                                        {
                                            $ekta_data = array(
                                                'ekta_id' => $ekta_response['data']['id'],
                                                'ekta_order_id' => $ekta_response['data']['order_id'],
                                                'ekta_cost' => $ekta_response['data']['cost'],
                                                'order_id' => $order_id,
                                                'status' => 1,
                                            );

//                                        $result['message'][] = $ekta_data;
                                            $r = $ekta->add_order_data( $ekta_data );

                                            $result['status'] = true;
                                            $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
                                            $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
//                                        $result['message'][] = $r;
                                        }
                                        else{
                                            $ekta->remove_order( $order_id );
                                            $result['status'] = false;
                                            $result['message'][] = '<span class="message-danger">Не вдалось оформити полic.</span>';
                                        }*/


//                                    $result['message'][] = $ekta_order;
//                                    $result['status'] = true;
//                                    $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
//                                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                        $result['order_id'] = $wpdb->insert_id;
//                                    $result['status'] = true;
//                                    $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
//                                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
//                                    $result['order_id'] = $wpdb->insert_id;
                                    }

                                }
                                else {

                                    $ekta->remove_order( $order_id );
                                    $result['status'] = false;
                                    $result['message'][] = '<span class="message-danger">Не вдалось увійти в систему.</span>';
                                }

                            }
                            else
                            {
                                $result['status'] = true;
                                $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
                                //                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/wp-recall/add-on/insurance/report/download_print.php?order_id=' . $wpdb->insert_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/wp-recall/add-on/insurance/report/download_print.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                $result['order_id'] = $wpdb->insert_id;
                            }
                            // $result['data'] = $query;
                        } else {
                            $result['status'] = false;
                            $result['message'][] = '<span class="message-danger">Не вдалося записати полiс в базу данних.</span>';
                            $result['order_id'] = false;
                        }
                    }
                    else{
                        $result['status'] = false;
                        $result['message'][] = '<span class="message-danger">Номер бланку по введеним параметрам не входить в дiапазон нумерацiй бланкiв закріплених за менеджером.</span>';
                    }

                } else {
                    $result['status'] = false;
                    $result['message'][] = '<span class="message-danger">Номер бланку по введеним параметрам не входить в дiапазон нумерацiй бланкiв.</span>';
                }
            } else {
                $result['status'] = false;
                $result['message'][] = '<span class="message-danger">Поліс за номером бланка <strong>' . $blank_number . '</strong> вже зареєстрований, будь ласка вкажіть інший номер бланка.</span>';
            }
        }
        // Електронний бланк
        elseif ( $blank_type_id == 2 ){

            $paper = false;

            $blank_data = new Blank();

            //для поиска по ТАБЛИЧКИ ЭЛЕКТРОННЫХ
            $blank_number_data = $blank_data->get_e_blank_number_data($company_id);


            /*
                        //Получаем последний оформленый договор
                    //    $result['message'][] = 'Получаем последний оформленый договор.<br>';
                        $last_order_blank_number_data = $blank_data->get_last_order_data( $blank_type_id, $company_id );

                        //Если есть последний оформленый договор
                        if( ! empty( $last_order_blank_number_data ) ){
                        //    $result['message'][] = 'Если есть последний оформленый договор.<br>';

                            $last_order_blank_number = (int) $last_order_blank_number_data[0]['blank_number'] ;
            //                $result['message'][] = $last_order_blank_number. '<br>';
                            // Делаем + 1 для того чтобы узнать для какого диапазона он подходит
            //                $new_order_blank_id = $last_order_blank_number + 1;
                            $new_order_blank_id = $last_order_blank_number;

                            $last_order_blank_series = $last_order_blank_number_data[0]['blank_series'];

                            $number_of_blank_data = $blank_data->get_blank_range( $blank_type_id, $company_id, $new_order_blank_id, $last_order_blank_series );

                            //Если есть подходящий диапазон
                            if( ! empty( $number_of_blank_data ) ){
                            //    $result['message'][] = 'Если есть подходящий диапазон.<br>';

                                //Максимум диапазона
                                $blank_range_number_end = (int) $number_of_blank_data[0]['number_end'];
                                $number_blank_comment = $number_of_blank_data[0]['comments'];
                                $number_of_blank_series = $number_of_blank_data[0]['blank_series'];
                                $new_order_blank_id ++;

                                //ID диапазона
                                $number_of_blank_id = (int) $number_of_blank_data[0]['id'];

                                //Если максимум диапазона бланков совпадает с нормером договора то изменяем статус для этого диапазона бланков
                                if( $new_order_blank_id == $blank_range_number_end ){
                                    $blank_data->change_range_used_status( $number_of_blank_id );
                                }
                            }
                            else{
                                //Выбираем новый диапазон
                            //    $result['message'][] = 'Выбираем новый диапазон.<br>';
                                $number_of_blank_data = $blank_data->get_new_blank_range( $blank_type_id, $company_id, $new_order_blank_id, $last_order_blank_series );
            //                    $result['message'][] = $new_order_blank_id.'<br>';

                                if( ! empty( $number_of_blank_data ) ){

                                    //Максимум диапазона
                                    $blank_range_number_end = (int) $number_of_blank_data[0]['number_end'];
                                    $new_order_blank_id = (int) $number_of_blank_data[0]['number_start'];
                                    $number_blank_comment = $number_of_blank_data[0]['comments'];
                                    $number_of_blank_series = $number_of_blank_data[0]['blank_series'];

                                    //ID диапазона
                                    $number_of_blank_id = (int) $number_of_blank_data[0]['id'];

                                    //Если максимум диапазона бланков совпадает с нормером договора то изменяем статус для этого диапазона бланков
                                    if( $new_order_blank_id == $blank_range_number_end ){
                                        $blank_data->change_range_used_status( $number_of_blank_id );
                                    }

                                }
                                else{
                                    $result['status'] = false;
                                    $result['message'][] = 'По даним параметрам вільних бланків не знайдено.<br>';
                                }

                            }

                        }
                        //Иначе это первый договор
                        else{
                        //    $result['message'][] = 'Иначе это первый договор.<br>';
                            $number_of_blank_data = $blank_data->get_first_blank_range( $blank_type_id, $company_id );


                            $number_of_blank_id = (int) $number_of_blank_data[0]['id'];
                            $new_order_blank_id = (int) $number_of_blank_data[0]['number_start'];
                            //Максимум диапазона
                            $blank_range_number_end = (int) $number_of_blank_data[0]['number_end'];
                            $number_blank_comment = $number_of_blank_data[0]['comments'];
                            $number_of_blank_series = $number_of_blank_data[0]['blank_series'];

            //                $result['message'][] = $new_order_blank_id;

                            //Если максимум диапазона бланков совпадает с нормером договора то изменяем статус для этого диапазона бланков
                            if( $new_order_blank_id == $blank_range_number_end ){
                                $blank_data->change_range_used_status( $number_of_blank_id );
                            }

                        }
            */


            //Оформление договора
//            if( ! empty( $new_order_blank_id ) ){
            //для поиска по ТАБЛИЧКИ ЭЛЕКТРОННЫХ
            if( ! empty( $blank_number_data ) ){

                //для поиска по ТАБЛИЧКИ ЭЛЕКТРОННЫХ
                $new_order_blank_id = (int)$blank_number_data[0]['blank_number'];
                $number_of_blank_series = $blank_number_data[0]['blank_series'];
                $number_of_blank_id = (int)$blank_number_data[0]['number_of_blank_id'];
                $number_blank_comment = $blank_number_data[0]['comments'];

                $unicue_code = random_string();

                $cashback = get_user_meta($user_id, "user_return_percent_medical_company_id_" . $company_id, 1);

                $table_name = $wpdb->get_blog_prefix() . 'insurance_orders';

                $query = $wpdb->insert($table_name, array('program_id' => $program_id, 'program_title' => $program_title, 'number_blank_id' => $number_of_blank_id, 'number_blank_comment' => $number_blank_comment, 'blank_number' => $new_order_blank_id,
                    'blank_series' => $number_of_blank_series, 'company_id' => $company_id, 'company_title' => $company_title, 'rate_id' => $rate_id, 'rate_franchise' => $rate_franchise,
                    'rate_validity' => $rate_validity, 'rate_insured_sum' => $rate_insured_sum, 'rate_price' => $rate_price, 'rate_locations' => $rate_locations, 'name' => $name,
                    'last_name' => $surname, 'passport' => $passport, 'birthday' => $date, 'address' => $address, 'phone_number' => $tel, 'email' => $email, 'date_from' => $date_from,
                    'date_to' => $date_to, 'count_days' => $count_days, 'pdf_url' => $pdf_url, 'is_manager' => $is_manager, 'user_id' => $user_id, 'cashback' => $cashback, 'status' => 1, 'rate_coefficient' => $rate_coefficient, 'rate_price_coefficient' => $rate_price_coefficient, 'unicue_code' => $unicue_code, 'insurer_status' => $insurer_status, 'blank_type_id' => $blank_type_id, 'sex' =>  $sex, 'inn' => $inn, 'eddr' => $eddr ),
                    array('%d', '%s', '%d', '%s', '%d', '%s', '%d', '%s', '%d', '%s', '%s', '%s', '%f', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%d', '%d', '%f', '%d', '%f', '%f', '%s', '%d', '%d', '%s', '%s', '%s' ));

                $order_id = $wpdb->insert_id;

                // $result['message'][] = 'Номер бланка совпадает с диапазоном';
//                 $result['message'][] = $order_id;
//                 $result['message'][] = $data;

                //Если у нас есть Страховальники и был создан договор то можно добавлять новые данные
                if ($query && !empty($insurers)) {

                    $table_name = $wpdb->get_blog_prefix() . 'insurance_insurer';

                    foreach ($insurers as $insurer) {

                        $insurer_last_name = $insurer['lastName'];
                        $insurer_name = $insurer['name'];
                        $insurer_date = date("Y-m-d", strtotime($insurer['date']));
                        $insurer_coefficient_date = get_full_years($insurer['date']);
                        $insurer_passport = $insurer['passport'];
                        $insurer_address = $insurer['address'];

                        //                        date("Y-m-d", strtotime($date) );
                        //Проверяем коеффициенты по дате рождения пользователей
                        $coefficient_data = setCoeficient($company_id, $insurer_coefficient_date, $company_title, $program_title, $program_id);

                        $rate_coefficient = $coefficient_data['coefficient'];


                        $insurer_query = $wpdb->insert($table_name, array('order_id' => $order_id, 'last_name' => $insurer_last_name, 'name' => $insurer_name, 'birthday' => $insurer_date, 'passport' => $insurer_passport, 'address' => $insurer_address, 'coefficient' => $rate_coefficient, 'price' => $rate_price),
                            array('%d', '%s', '%s', '%s', '%s', '%s', '%f', '%f'));


                        if (!$insurer_query) {
                            $result['message'][] = '<span class="message-danger">Не вдалося записати страхувальників в базу данних.</span>';
                        }


                    }

                }


                if ($query) {

                    //для поиска по ТАБЛИЧКИ ЭЛЕКТРОННЫХ
                    $blank_data->change_status_e_blank_number($number_of_blank_id, $new_order_blank_id,1);


                    if ($company_id == 2) {

                        $gardian_electron = new Gardian(__DIR__);
                        $currencyRate = '30.3376';
                        $gardian_status = 'Draft';
                        $gardian_phone = $gardian_electron->format_phone_number( $tel );

                        $rate_franchise_number = preg_replace("/[^0-9]/", '', $rate_franchise);

                        $gardian_date_to = $date_from . " + 1 year";
                        $gardian_date_to = $gardian_date_to . " - 1 days";
                        $gardian_date_to = date( "Y-m-d", strtotime( $gardian_date_to ) );


                        if( $sex == 'M' )
                        {
                            $sex = 'Male';
                        }
                        elseif ( $sex == 'W' )
                        {
                            $sex = 'Female';
                        }

                        $gardian_rate_insured_sum = preg_replace("/[^0-9]*/",'',$rate_insured_sum);

                        $gardian_product_id = '';
                        // 68947399-4db5-11eb-b19c-00155df66a18 - D (Латвія)
                        // 68947398-4db5-11eb-b19c-00155df66a18 - E (Чехія)
                        // 68947396-4db5-11eb-b19c-00155df66a18 - А (Work)
                        //	6894739a-4db5-11eb-b19c-00155df66a18 - М (Європа)
                        //	aea90dd0-75aa-11eb-b19f-00155df66a18 - М (СНД)
                        if( $program_id == 1 )
                        {
                            $gardian_product_id = '68947396-4db5-11eb-b19c-00155df66a18';
                        }
                        elseif ( $program_id == 5 )
                        {
                            $gardian_product_id = '6894739a-4db5-11eb-b19c-00155df66a18';
                        }
                        elseif ( $program_id == 4 )
                        {
                            $gardian_product_id = '68947398-4db5-11eb-b19c-00155df66a18';
                        }


                        $gardian_product_id = '68947396-4db5-11eb-b19c-00155df66a18';


                        $blankType =  $paper === false ? "true" : "false";

                        $gardian_data = [
                            'agr[GUID]' => '',
                            'agr[Blank][BlankGUID]' => '',
                            'agr[Blank][BlankName]' => '',
                            'agr[Blank][BlankComment]' => '',
                            'agr[Blank][BlankComment2]' => '',
                            'agr[Blank][NumberLength]' => 0,
                            'agr[BlankNumber]' => 0,
                            'agr[Sticker][BlankGUID]' => '37e5ec78_2fe2_11ec_b1b2_00155dae7a01', // Тип номерного бланка GUID (Всегда такое значение)
                            'agr[Sticker][BlankName]' => 'GR', // Тип номерного бланка (Всегда такое значение)
                            'agr[Sticker][BlankComment]' => '',
                            'agr[Sticker][BlankComment2]' => '',
                            'agr[Sticker][NumberLength]' => 0,
                            'agr[StickerNumber]' => $blank_number,
                            'agr[Number]' => '',
                            'agr[Product]' => 'ВЗРКон',
                            'agr[Date]' => $date_now,
                            'agr[BegDate]' => $date_from,
                            'agr[EndDate]' => $gardian_date_to,
                            'agr[Summ]' => $rate_price * $rate_coefficient,
                            'agr[Customer][CustomerName]' => $surname . ' ' . $name,
                            'agr[Customer][CustomerFullName]' => $surname . ' ' . $name,
                            'agr[Customer][CustomerFName]' => '',
                            'agr[Customer][CustomerLName]' => '',
                            'agr[Customer][CustomerSName]' => '',
                            'agr[Customer][CustomerType]' => 'person',
                            'agr[Customer][CustomerCode]' => $inn,
                            'agr[Customer][CustomerBDate]' => $birthday,
                            'agr[Customer][CustomerForeigner]' => 'false',
                            'agr[Customer][CustomerPersonWithoutCode]' => 'false',
                            'agr[Customer][CustomerPhone]' => $gardian_phone,
                            'agr[Customer][CustomerAddress]' => $address,
                            'agr[Customer][CustomerAddressLat]' => $address,
                            'agr[Customer][CustomerPassport][DocType]' => '',
                            'agr[Customer][CustomerPassport][DocSeries]' => '',
                            'agr[Customer][CustomerPassport][DocNumber]' => '',
                            'agr[Customer][CustomerPassport][DocDate]' => '',
                            'agr[Customer][CustomerPassport][DocSourceOrg]' => '',
                            'agr[Customer][CustomerDriversLicense][DocType]' => '',
                            'agr[Customer][CustomerDriversLicense][DocSeries]' => '',
                            'agr[Customer][CustomerDriversLicense][DocNumber]' => '',
                            'agr[Customer][CustomerDriversLicense][DocDate]' => '0001-01-01T00:00:00',
                            'agr[Customer][CustomerDriversLicense][DocSourceOrg]' => '',
                            'agr[Customer][CustomerPreferentialDocument][DocType]' => '',
                            'agr[Customer][CustomerPreferentialDocument][DocSeries]' => '',
                            'agr[Customer][CustomerPreferentialDocument][DocNumber]' => '',
                            'agr[Customer][CustomerPreferentialDocument][DocDate]' => '0001-01-01T00:00:00',
                            'agr[Customer][CustomerPreferentialDocument][DocSourceOrg]' => '',
                            'agr[Customer][CustomerInternationalPassport][DocType]' => 'InternationalPassport',
                            'agr[Customer][CustomerInternationalPassport][DocSeries]' => $passport_series,
                            'agr[Customer][CustomerInternationalPassport][DocNumber]' => $passport_number,
                            'agr[Customer][CustomerInternationalPassport][DocDate]' => '0001-01-01',
                            'agr[Customer][CustomerInternationalPassport][DocSourceOrg]' => '',
                            'agr[Customer][CustomerNameLat]' => $surname . ' ' . $name,
                            'agr[Customer][CustomerIncorrectCode]' => 'false',
                            'agr[Customer][CustomerContactPerson]' => '',
                            'agr[Customer][CustomerBankAccount]' => '',
                            'agr[Customer][CustomerGUID]' => '',
                            'agr[Customer][CustomerCitizenshipCountry][EnumVal]' => '',
                            'agr[Customer][CustomerCitizenshipCountry][EnumName]' => '',
                            'agr[Customer][CustomerCitizenshipCountry][EnumFlag]' => 'false',
                            'agr[Customer][CustomerCitizenshipCountry][EnumRate]' => 0,
                            'agr[Customer][CustomerEmail]' => $email,
                            'agr[Customer][CustomerEDDRCode]' => $eddr,
                            'agr[Customer][CustomerGender]' => $sex,
                            'agr[Beneficiary]' => '',
                            'agr[BeneficiaryIsCustomer]' => 'false',
                            'agr[Srok]' => 0,
                            'agr[BonusMalus]' => 0,
                            'agr[Zone]' => 0,
                            'agr[Objects][0][Mark]' => '',
                            'agr[Objects][0][Model]' => '',
                            'agr[Objects][0][VIN]' => '',
                            'agr[Objects][0][RegNum]' => '',
                            'agr[Objects][0][YearOfCreation]' => 0,
                            'agr[Objects][0][Type]' => '',
                            'agr[Objects][0][ObjectGUID]' => '',
                            'agr[Objects][0][Name]' => $surname . ' ' . $name,
                            'agr[Objects][0][NameLat]' => $surname . ' ' . $name,
                            'agr[Objects][0][Date]' => $birthday,
                            'agr[Objects][0][InternationalPassport][DocType]' => '',
                            'agr[Objects][0][InternationalPassport][DocSeries]' => $passport_series,
                            'agr[Objects][0][InternationalPassport][DocNumber]' => $passport_number,
                            'agr[Objects][0][InternationalPassport][DocDate]' => '0001-01-01T00:00:00',
                            'agr[Objects][0][InternationalPassport][DocSourceOrg]' => '',
                            'agr[Objects][0][Address]' => $address,
                            'agr[Objects][0][Phone]' => $gardian_phone,
                            'agr[Objects][0][DecimalOption1]' => $rate_price * $rate_coefficient,
                            'agr[Objects][0][DecimalOption2]' => 0,
                            'agr[Objects][0][AddressLat]' => $address,
                            'agr[Objects][0][ObjType]' => '',
                            'agr[Objects][0][StringOption1]' => '',
                            'agr[UnusedMonthes][M1]' => 'false',
                            'agr[UnusedMonthes][M2]' => 'false',
                            'agr[UnusedMonthes][M3]' => 'false',
                            'agr[UnusedMonthes][M4]' => 'false',
                            'agr[UnusedMonthes][M5]' => 'false',
                            'agr[UnusedMonthes][M6]' => 'false',
                            'agr[UnusedMonthes][M7]' => 'false',
                            'agr[UnusedMonthes][M8]' => 'false',
                            'agr[UnusedMonthes][M9]' => 'false',
                            'agr[UnusedMonthes][M10]' => 'false',
                            'agr[UnusedMonthes][M11]' => 'false',
                            'agr[UnusedMonthes][M12]' => 'false',
                            'agr[OTKFlag]' => 'false',
                            'agr[OTK6Flag]' => 'false',
                            'agr[OTKDate]' => '0001-01-01T00:00:00',
                            'agr[Preference]' => '',
                            'agr[Franchise]' => $rate_franchise_number,
                            'agr[OSAGOValues][K1]' => 0,
                            'agr[OSAGOValues][K2]' => 0,
                            'agr[OSAGOValues][K3]' => 0,
                            'agr[OSAGOValues][K4]' => 0,
                            'agr[OSAGOValues][K5]' => 0,
                            'agr[OSAGOValues][K6]' => 0,
                            'agr[OSAGOValues][K7]' => 0,
                            'agr[OSAGOValues][K8]' => 0,
                            'agr[OSAGOValues][K9]' => 0,
                            'agr[PayDate]' => '0001-01-01T00:00:00',
                            'agr[PayDoc]' => '',
                            'agr[RegistrationPlace]' => '',
                            'agr[StazhDo3Let]' => 'false',
                            'agr[CommerceUse]' => 'false',
                            'agr[Status]' => $gardian_status,
                            'agr[Deleted]' => 'false',
                            'agr[ParentAgreementGUID]' => '',
                            'agr[ParentAgreementNumber]' => '',
                            'agr[ParentAgreementDate]' => '0001-01-01T00:00:00',
                            'agr[CrossAgreementGUID]' => '',
                            'agr[CrossAgreementNumber]' => '',
                            'agr[CrossAgreementDate]' => '0001-01-01T00:00:00',
                            'agr[BlankStatus]' => '',
                            'agr[SalesChannelGUID]' => 'bd909c32_2b2a_11eb_b19b_00155df66a18', // Канал продажу: Агентський - Агенти-вільний ринок  (Всегда)
                            'agr[SalesChannelParentGUID]' => '',
                            'agr[Partner]' => '',
                            'agr[ParkDiscount]' => 0,
                            'agr[ParkDiscountStr]' => '',
                            'agr[BMR]' => 'false',
                            'agr[ValidationCode]' => '',
                            'agr[Countries]' => '047c8592-4e59-11eb-b19c-00155df66a18', // Територія покриття: Європа / Europe (Всегда)
                            'agr[Country]' => '',
                            'agr[PaymentSchedule][0][PaymentNum]' => 0,
                            'agr[PaymentSchedule][0][PaymentDate]' => '0001-01-01T00:00:00',
                            'agr[PaymentSchedule][0][PaymentSum]' => 0,
                            'agr[SpecialTariff]' => 'false',
                            'agr[MultiUse]' => 'false',
                            'agr[BoolOption1]' => 'false',
                            'agr[BoolOption2]' => 'true',
                            'agr[BoolOption3]' => 'false',
                            'agr[BoolOption4]' => 'false',
                            'agr[BoolOption5]' => 'false',
                            'agr[StringOption1]' => '',
                            'agr[StringOption2]' => '',
                            'agr[Currency]' => 'EUR',
                            'agr[AgreementType]' => '',
                            'agr[DurationType]' => $count_days,
                            'agr[KV]' => 0,
                            'agr[Summ1]' => $gardian_rate_insured_sum,
                            'agr[Summ2]' => 0,
                            'agr[Summ3]' => 0,
                            'agr[Summ4]' => 0,
                            'agr[Summ5]' => 0,
                            'agr[Tariff]' => 0,
                            'agr[Prem1]' => $rate_price * $rate_coefficient,
                            'agr[Prem2]' => 0,
                            'agr[Prem3]' => 0,
                            'agr[Prem4]' => 0,
                            'agr[Prem5]' => 0,
                            'agr[Corr1]' => 0,
                            'agr[Corr2]' => 0,
                            'agr[Corr3]' => 0,
                            'agr[CurrencyRate]' => $currencyRate,
                            'agr[TerritorySPType]' => '',
                            'agr[Sighner][EnumVal]' => '',
                            'agr[Sighner][EnumName]' => '',
                            'agr[Sighner][EnumFlag]' => 'false',
                            'agr[Sighner][EnumRate]' => 0,
                            'agr[ProxyDoc][EnumVal]' => '',
                            'agr[ProxyDoc][EnumName]' => '',
                            'agr[ProxyDoc][EnumFlag]' => 'false',
                            'agr[ProxyDoc][EnumRate]' => 0,
                            'agr[MaxTariff]' => 'false',
                            'agr[IsPaid]' => 'false',
                            'agr[Agent][EnumVal]' => '',
                            'agr[Agent][EnumName]' => '',
                            'agr[Agent][EnumFlag]' => 'false',
                            'agr[Agent][EnumRate]' => 0,
                            'agr[ProductGUID]' => $gardian_product_id,
                            'agr[TariffProp]' => '',
                            'agr[Digital]' => $blankType,
                            'agr[Password]' => '',
                            'agr[UsedBlanks]' => ''
                        ];


                        //Если мы страхуем ДРУГОГО ЧЕЛОВЕКА
                        if( $insurer_status == 0 ) {
                            if (!empty ($insurers)) {
                                foreach ($insurers as $insurer) {

                                    $insurer_passport_series = preg_replace("/[^A-Za-z]/", '', $insurer['passport']);
                                    $insurer_passport_number = preg_replace("/[^0-9]/", '', $insurer['passport']);

                                    $gardian_data['agr[Objects][0][Name]'] = $insurer['lastName'] . ' ' . $insurer['name'];
                                    $gardian_data['agr[Objects][0][NameLat]'] = $insurer['lastName'] . ' ' . $insurer['name'];
                                    $gardian_data['agr[Objects][0][Date]'] = date("Y-m-d", strtotime($insurer['date']));
                                    $gardian_data['agr[Objects][0][InternationalPassport][DocSeries]'] = $insurer_passport_series;
                                    $gardian_data['agr[Objects][0][InternationalPassport][DocNumber]'] = $insurer_passport_number;
                                    $gardian_data['agr[Objects][0][Address]'] = $insurer['address'];
                                    $gardian_data['agr[Objects][0][AddressLat]'] = $insurer['address'];

                                }
                            }

                        }


                        $result['message'][] = $gardian_data;

                        // РЕГИСТРАЦИЯ ДОГОВОРА
                        if($gardian_electron->loginPage()){

                            if($gardian_electron->login() == 200){
                                //Устанавлтваем курс
                                $gardian_electron->getCurrencyRate();

                                $gardian_order = $gardian_electron->createOrder($gardian_data);

                                //Если ответ с ошибками
                                if( ! $gardian_order['Result'] )
                                {
                                    $result['status'] = false;
                                    foreach ( $gardian_order['Messages'] as $error_smg )
                                    {
                                        $result['message'][] = '<span class="message-danger">' . $error_smg . '</span>';
                                    }
                                }

                                if(is_array($gardian_order)){

                                    if(array_key_exists('Messages', $gardian_order) && count($gardian_order['Messages']) >= 4 && array_key_exists('Result', $gardian_order) && $gardian_order['Result'] == 1) {

                                        $gardian_data['agr[GUID]'] = $gardian_order['Messages'][0];
                                        $gardian_data['agr[Customer][CustomerGUID]'] = $gardian_order['Messages'][1];
                                        $gardian_data['agr[Number]'] = $gardian_order['Messages'][2];
                                        $gardian_data['agr[BlankNumber]'] = explode("-", $gardian_order['Messages'][2])[1];
                                        $gardian_data['agr[Objects][0][ObjectGUID]'] = $gardian_order['Messages'][3];

                                        if ( $paper === false ) {
                                            $smsAnswer = $gardian_electron->sendSms( $gardian_order['Messages'][0] );
                                            if ( is_array( $smsAnswer ) ) {

                                                if ( array_key_exists( 'OTP', $smsAnswer ) && array_key_exists( 'Result', $smsAnswer ) && $smsAnswer['Result'] == 1 ) {
                                                    $gardian_data['agr[Password]'] = $smsAnswer['OTP'];
                                                    $gardian_result = $gardian_electron->changeOrderStatus( $gardian_data, "Signed" );

                                                    $gardian_order_data = [
                                                        'gardian_GUID' => $gardian_result['Messages'][0],
                                                        'gardian_CustomerGUID' => $gardian_result['Messages'][1],
                                                        'gardian_Number' => $gardian_result['Messages'][2],
                                                        'gardian_ObjectGUID' => $gardian_result['Messages'][3],
                                                        'order_id' => $order_id,
                                                        'status' => 1,
                                                    ];

                                                    $gardian_electron->add_order_data( $gardian_order_data );

                                                    $result['status'] = true;
                                                    $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
                                                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
                                                }

                                            }
                                        }
                                        else {
                                            $result = $gardian_electron->changeOrderStatus( $gardian_data, "Signed" );
                                        }

                                    }
                                    else
                                    {
                                        $result['status'] = false;
                                        $result['message'][] = '<span class="message-danger">Не вдалося додати договip.</span>';
                                    }

                                }
                                else
                                {
                                    $result['status'] = false;
                                    $result['message'][] = '<span class="message-danger">Не вдалося додати договip.</span>';
                                }

                            }

                        }
                        else
                        {
                            $result['status'] = false;
                            $result['message'][] = '<span class="message-danger">Не вдалося увiйти до СК ГАРДIАН.</span>';
                        }


                        if( $result['status'] == false )
                        {
                            $gardian_electron->remove_order( $order_id );
                        }


//                        if($gardian_electron->loginPage()){
//                            if($gardian_electron->login() == 200){
//                                $gardian_order = $gardian_electron->createPaperOrder($gardian_data);
//
////                                    $result['message'][] = $gardian_order;
//
//                                if( ! $gardian_order['Result'] )
//                                {
//                                    $result['status'] = false;
//                                    foreach ( $gardian_order['Messages'] as $error_smg )
//                                    {
//                                        $result['message'][] = '<span class="message-danger">' . $error_smg . '</span>';
//                                    }
//                                }
//
//                                if(is_array($gardian_order)){
//                                    if(array_key_exists('Messages', $gardian_order) && count($gardian_order['Messages']) >= 4 && array_key_exists('Result', $gardian_order) && $gardian_order['Result'] == 1){
//                                        $gardian_data['agr[GUID]'] = $gardian_order['Messages'][0];
//                                        $gardian_data['agr[Customer][CustomerGUID]'] = $gardian_order['Messages'][1];
//                                        $gardian_data['agr[Number]'] = $gardian_order['Messages'][2];
//                                        $gardian_data['agr[BlankNumber]'] = explode("-", $gardian_order['Messages'][2])[1];
//                                        $gardian_data['agr[Objects][0][ObjectGUID]'] = $gardian_order['Messages'][3];
//
//                                        $gardian_result = $gardian_electron->changeStatusPaperOrder($gardian_data, "Signed");
//
//
//                                        $result['message'][] = $gardian_result;
////
//                                        $gardian_order_data = [
//                                            'gardian_GUID' => $gardian_result['Messages'][0],
//                                            'gardian_CustomerGUID' => $gardian_result['Messages'][1],
//                                            'gardian_Number' => $gardian_result['Messages'][2],
//                                            'gardian_ObjectGUID' => $gardian_result['Messages'][3],
//                                            'order_id' => $order_id,
//                                            'status' => 1,
//                                        ];
//
//                                        $st = $gardian_electron->add_order_data( $gardian_order_data );
//
//                                        $result['message'][] = $st;
//                                        $result['status'] = true;
//                                        $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
//                                        $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/paper/index.php?order_id=' . $order_id . '&key=WPbm49ebf124">Скачати поліс</a>';
//                                    }
//                                }
//                                else
//                                {
//                                    $result['status'] = false;
//                                    $result['message'][] = '<span class="message-danger">Не вдалося додати договip.</span>';
//                                    $result['message'][] = $gardian_order;
//                                }
//                            }
//                            else
//                            {
//                                $result['status'] = false;
//                                $result['message'][] = '<span class="message-danger">Не вдалося залогiнитись в СК ГАРДIАН.</span>';
//                            }
//                        }
//                        else
//                        {
//                            $result['status'] = false;
//                            $result['message'][] = '<span class="message-danger">Не вдалося увiйти до СК ГАРДIАН.</span>';
//                        }
//
//
//                        if( $result['status'] == false )
//                        {
//                            $gardian_electron->remove_order( $order_id );
//                        }
                    }
                    else
                    {
                        $result['status'] = true;
                        $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений.</span>';
                        $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/electronic-form/electronic-form.php?order_id=' . $order_id . '&key=kDCRa89dc0e1">Скачати поліс</a>';
                        $result['order_id'] = $wpdb->insert_id;
                    }

//                    $result['status'] = true;
//                    $result['message'][] = '<span class="message-ok">Вітаємо, поліс успішно оформлений 2.</span>';
//                    //                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/wp-recall/add-on/insurance/report/download_print.php?order_id=' . $wpdb->insert_id . '&key=WPbm49ebf124">Скачати поліс</a>';
//                    $result['last_step_html'] = '<a class="get-new-medical-order" href="/medical?blank_type_id='. $blank_type_id .'">Оформити новий поліс</a><a target="_blank" class="download-medical-order" href="/wp-content/plugins/insurance/order-print/electronic-form/electronic-form.php?order_id=' . $order_id . '&key=kDCRa89dc0e1">Скачати поліс</a>';
//                    $result['order_id'] = $wpdb->insert_id;
                    // $result['data'] = $query;
                } else {
                    $result['status'] = false;
                    $result['message'][] = '<span class="message-danger">Не вдалося записати полiс в базу данних..</span>';
                    $result['order_id'] = false;
                }
            }
            else{
                $result['status'] = false;
                $result['message'][] = 'Не вдалося присвоїти номер електронному договору.';
            }

        }
        else{
            $result['status'] = false;
            $result['message'][] = 'Не вдалося знайти переданий тип бланка. Спробуйте вибрати інший.';
        }

    }
    else{
        $result['status'] = false;
    }

    echo json_encode( $result );

    wp_die();

}



//Получаем диапазон бланков
function get_empty_blnak_number(){

}

function setCoeficient( $company_id, $user_years, $company_title, $program_title, $program_id ){

    $rate_coefficient = 1;

    //СК ПРОВІДНА
    if( $company_id == 1 ){

//        if( 14 <= $user_years && $user_years < 18 ){
        if( $user_years < 18 ){
            $rate_coefficient = 1.2;
            $status = 1;
        }else if( 18 <= $user_years && $user_years < 60  ){
            $rate_coefficient = 1;
            $status = 1;
        }else if( 60 <= $user_years && $user_years <= 65  ){
            $rate_coefficient = 1.5;
            $status = 1;
        }else if( 66 <= $user_years && $user_years <= 70  ){
            $rate_coefficient = 2;
            $status = 1;
        }

        if( $status == 0 ){
            $message = '<span class="message-danger"> В ' . $company_title .' "' . $program_title .'" по вказанiй вiковiй категорiї договори не приймаються. <b>' . $user_years . 'рiк </b></span>';
        }
        //СК ГАРДІАН
    }else if( $company_id == 2 ){

        if( $program_id == 3 ){

            if (1 <= $user_years && $user_years < 17) {
                $rate_coefficient = 1.5;
                $status = 1;
            }else if( 18 <= $user_years && $user_years < 60 ){
                $rate_coefficient = 1;
                $status = 1;
            }
            else if( 60 <= $user_years && $user_years <= 65  ){
                $rate_coefficient = 2;
                $status = 1;
            }
            else if (66 <= $user_years && $user_years < 70) {
                $rate_coefficient = 4;
                $status = 1;
            }
        } else if( $program_id == 1 ){
            if( 18 <= $user_years && $user_years < 60 ){
                $rate_coefficient = 1;
                $status = 1;
            }
            else if( 60 <= $user_years && $user_years <= 65  ){
                $rate_coefficient = 2;
                $status = 1;
            }
            else if (66 <= $user_years && $user_years < 70) {
                $rate_coefficient = 4;
                $status = 1;
            }
        }
        else{
            if( 18 <= $user_years && $user_years < 60 ){
                $rate_coefficient = 1;
                $status = 1;
            }
            else if( 60 <= $user_years && $user_years <= 65  ){
                $rate_coefficient = 2;
                $status = 1;
            }

        }



        if( $status == 0 ){
            $message = '<span class="message-danger"> В ' . $company_title .' "' . $program_title .'" по вказанiй вiковiй категорiї договори не приймаються. <b>' . $user_years . 'рiк </b></span>';
        }

        //СК ЕВРОИНС  EUROINS
    }else if( $company_id == 4 ){
        if ( 16 > $user_years ) {
            $rate_coefficient = 1;
            $status = 0;
        }else if( 60 <= $user_years && $user_years <= 65 ){
            $rate_coefficient = 1.5;
            $status = 1;
        }
        else if( 66 <= $user_years && $user_years <= 70  ){
            $rate_coefficient = 2;
            $status = 1;
        }
        else if( $user_years > 70  ){
            $rate_coefficient = 1;
            $status = 0;
        }

        if( $status == 0 ){
            $message = '<span class="message-danger"> В ' . $company_title .' "' . $program_title .'" по вказанiй вiковiй категорiї (' . $user_years . ' р.) договори не приймаються.</span>';
        }
        //СК ІНТЕР-ПЛЮС
    }else if( $company_id == 5 ){
        if ( 1 <= $user_years && $user_years <= 59 ) {
            $rate_coefficient = 1;
            $status = 1;
        }else if( 60 <= $user_years && $user_years <= 75 ){
            $rate_coefficient = 2;
            $status = 1;
        }
        else if( 76 <= $user_years && $user_years <= 80  ){
            $rate_coefficient = 3;
            $status = 1;
        }
        if( $status == 0 ){
            $message = '<span class="message-danger"> В ' . $company_title .' "' . $program_title .'" по вказанiй вiковiй категорiї договори не приймаються. <b>' . $user_years . 'рiк </b></span>';
        }
        //СК ЕКТА
    }else if( $company_id == 6 ){
        if ( $user_years > 3 && $user_years < 65 ) {
            $rate_coefficient = 1;
            $status = 1;
        }


        if( $status == 0 ){
            $message = '<span class="message-danger"> В ' . $company_title .' "' . $program_title .'" по вказанiй вiковiй категорiї (' . $user_years . ' р.) договори не приймаються.</span>';
        }
    }

    $result = array(
        'message' => $message,
        'coefficient' => $rate_coefficient,
    );

    return $result;

}


function get_full_years( $birthdayDate ) {
    $datetime = new DateTime($birthdayDate);
    $interval = $datetime->diff(new DateTime(date("Y-m-d")));
    return $interval->format("%Y");
}



add_action('wp_ajax_medicalmgetblanks', 'medicalm_insurance_get_blanks');
add_action('wp_ajax_nopriv_medicalmgetblanks', 'medicalm_insurance_get_blanks');

function medicalm_insurance_get_blanks(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('', '', 400);
    }

    check_ajax_referer( 'medical-m', 'nonce', true );

    $blank_type_id = $_POST['blank_type_id'];

    global $wpdb;

    $table_name_rate = $wpdb->get_blog_prefix() . 'insurance_rate';
    $table_name_program = $wpdb->get_blog_prefix() . 'insurance_program';

    $blanks = $wpdb->get_results('SELECT DISTINCT p.id, p.title FROM ' . $table_name_rate . ' r 
    RIGHT JOIN ' . $table_name_program . ' p on p.id = r.program_id AND p.status = 1 
    WHERE r.blank_type_id = ' . $blank_type_id . ' GROUP BY r.program_id;' );

    if( $blanks ){
        $result = array(
            'message' => 'OK )',
            'blanks' => $blanks
        );
    }
    else{
        $result = array(
            'message' => 'На даний момент не додано жодного бланку',
            'blanks' => ''
        );
    }


    echo json_encode( $result );

    wp_die();
}

add_action('wp_ajax_medicalmgetblanktype', 'medicalm_insurance_get_blank_types');
add_action('wp_ajax_nopriv_medicalmgetblanktype', 'medicalm_insurance_get_blank_types');

function medicalm_insurance_get_blank_types(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('', '', 400);
    }

    check_ajax_referer( 'medical-m', 'nonce', true );

    global $wpdb;

    $table_name = $wpdb->get_blog_prefix() . 'insurance_blank_type';

    $blanks = $wpdb->get_results( $wpdb->prepare("SELECT id, text FROM " . $table_name . " WHERE status = 1;", '%d', '%s' ) );

    if( $blanks ){
        $result = array(
            'message' => 'OK )',
            'blanks' => $blanks
        );
    }
    else{
        $result = array(
            'message' => 'На даний момент не додано жодного типу бланкa',
            'blanks' => ''
        );
    }


    echo json_encode( $result );

    wp_die();
}

add_action('wp_ajax_getinsuranceblankseries', 'medicalm_insurance_blanks_series');
add_action('wp_ajax_nopriv_getinsuranceblankseries', 'medicalm_insurance_blanks_series');

function medicalm_insurance_blanks_series(){

    if( empty( $_POST['nonce'] ) ){
        wp_die('', '', 400);
    }

    check_ajax_referer( 'medical-m', 'nonce', true );

    $company_id = strip_tags( $_POST['company_id'] );

    global $wpdb;

    $table_name = $wpdb->get_blog_prefix() . 'insurance_number_of_blank';

    $blanks_series = $wpdb->get_results( $wpdb->prepare("SELECT blank_series FROM " . $table_name . " WHERE company_id = $company_id AND status = 1 GROUP BY blank_series ORDER BY id DESC;", '%d' ) );

    if( $blanks_series ){
        $result = array(
            'message' => 'OK )',
            'blanks_series' => $blanks_series,
        );
    }
    else{
        $result = array(
            'message' => 'На даний момент не додано жодної компанії',
            'blanks_series' => ''
        );
    }


    echo json_encode( $result );

    wp_die();
}


class getParent {

    function __construct() {

    }

    public $referals_array = array();


    public function get_parent_manager( $user_id ) {
        global $wpdb;
        $partner = $wpdb->get_row( "SELECT partner FROM plc_9115_prt_partners WHERE referal='$user_id'", ARRAY_A );
        return $partner;
    }

    public function get_all_partner_manager( $user_id ) {

        if( ! $user_id )
            return false;

        $partners = array();

        $partners = $this->get_parent_manager( $user_id );

        if( $partners ){

            $this->referals_array[] = $user_id;

            foreach( $partners as $partners_id ){

                $id = (int)$partners_id;

                $this->referals_array[] = $id;

                $this->get_all_partner_manager( $id );

            }
        }
    }

}


function get_parents_id( $user_id ){

    $parent = new getParent();

    $parent->get_all_partner_manager( $user_id );

    $result = $parent->referals_array;

    $result = implode( ",", $result );

    return $result;

}

//Генерация случайной строки
function random_string(){

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strength = 12;

    $input_length = strlen($permitted_chars);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;

}

// $t = get_parents_id(83);

// var_dump($t);

//covid 2019
include_once 'include/covid2019.php';
