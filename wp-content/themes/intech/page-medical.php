<?php
/**
 * The template for manager page
 * Template Name: Medical менеджер
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Seofy
 * @since 1.0
 * @version 1.0
 */

$current_user = wp_get_current_user();
//if( $current_user->ID ) {
//    $user          = wp_get_current_user();
//    $allowed_roles = array( 'user_manager', 'administrator' );
//
//    if ( ! array_intersect( $allowed_roles, $user->roles ) ) {
//        wp_redirect( " https://" . $_SERVER['HTTP_HOST'] . "/developing" );
//    }
//}
//else{
//    wp_redirect( " https://" . $_SERVER['HTTP_HOST'] . "/developing" );
//}

get_header();
the_post();
global $wpdb;

//$sb = Seofy_Theme_Helper::render_sidebars();
//$row_class = $sb['row_class'];
//$column = $sb['column'];
date_default_timezone_set('Europe/Kiev');

//$dateFrom = date('Y-m-d');
$dateFrom = date('d.m.Y', strtotime('+1 day'));
//$dateTo = date('Y-m-d', strtotime('+1 year -1 day'));
$dateTo = date('d.m.Y', strtotime('+1 year'));


//service_stop
$table_ewa_config = $wpdb->prefix . "ewa_config";
$service_stop = $wpdb->get_results("SELECT value FROM ".$table_ewa_config." WHERE `key` = 'service_stop'");

$blank_type_id = 0;

if( isset( $_GET['blank_type_id'] ) ){
    $blank_type_id = (int) $_GET['blank_type_id'];
}

the_content();
?>


<div class="container">

                <div class="js-test"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="medical-form-wrapper">
                            <h3>Форма страхування</h3>
                            <div class="insurance-vait js-insurance-vait">Отримання данних вiд сервера, будь ласка зачекайте...</div>
                        </div>

                    </div>
                </div>

<!--                <div class="row">-->
<!--                    <div class="col-lg-12 medical-form" >-->

                        <form action="#" method="POST" id="medicalForm">
                            <div class="js-steps-and-list">
                                <div class="row">
                                    <div class="m-auto col-lg-4 medical-form" >
                                        <div class="medical-form-wrapper steps">
                                            <?php /*if( $blank_type_id == 0 ) : ?>
                                                <div class="js-select-insurance-blank-type"></div>
                                            <?php endif;  */?>
                                            <div class="js-select-insurance-blank"></div>
                                            <div class="js-select-insurance-period"></div>
                                            <!-- <div class="js-select-insurance-age"></div> -->

                                            <div class="message-wrapper js-message"></div>


                                        </div><!--medical-form-wrapper end here-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 medical-form" >

                                        <div class="js-insurance-list step-3"></div>

                                    </div>
                                </div>

                            </div>



<!--                            <div class="js-insurance-form e-hidden">-->
                            <div class="js-insurance-form ">
                                <!--                            <div class="js-insurance-form">-->

                                <div class="insurance-data js-insurance-data">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="insurance-data-field js-insurance-data-blank-title">Назва програми: <span></span></div>
                                            <div class="insurance-data-field js-insurance-data-validity">Перiод страхування (днiв): <span></span></div>
                                            <div class="insurance-data-field js-insurance-data-company-title">Назва компанії: <span></span></div>
                                            <div class="insurance-data-field js-insurance-data-insured-sum">Страхова сума: <span></span></div>
                                            <div class="insurance-data-field js-insurance-data-franchise">Франшиза: <span></span></div>
                                            <div class="insurance-data-field js-insurance-data-price">Ціна: <span></span> грн</div>
                                            <div class="insurance-data-field js-insurance-data-location">Територія дії: <span></span></div>

                                        </div>
                                        <div class="col-lg-2">
                                            <a href="#" class="insurance-go-prev-step" id="goInsuranceList">Назад</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row user-profile-line-1">
                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <label for="medical_date_start" class="label-1 label-required">Дата початку дiї договору</label>
                                            <input name="medical_date_start" type="text" class="inpt-5 bg-calendar" id="medical_date_start" autocomplete="off"  placeholder="дд.мм.рррр">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <label for="medical_last_name" class="label-1 label-required">Прізвище</label>
                                            <input name="medical_last_name" type="text" class="inpt-5" id="medical_last_name" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <label for="medical_name" class="label-1 label-required">Ім'я</label>
                                            <input name="medical_name" type="text" class="inpt-5" id="medical_name" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row user-profile-line-1">
                                    <div class="col-lg-2">
                                        <div class="inpt-wrapper">
                                            <label for="medical_date" class="label-1 label-required">Дата народження</label>
                                            <input name="medical_date" type="text" class="inpt-5 bg-calendar" id="medical_date" autocomplete="off"  placeholder="дд.мм.рррр">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="inpt-wrapper">
                                            <label for="medical_tel" class="label-1">Телефон</label>
                                            <input name="medical_tel" type="tel" class="inpt-5" id="medical_tel">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <label for="medical_passport" class="label-1 label-required">Серiя, номер паспорта</label>
                                            <input name="medical_passport" type="text" class="inpt-5" id="medical_passport" >
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <label for="medical_address" class="label-1 label-required">Адреса постійного місця проживання</label>
                                            <input name="medical_address" type="text" class="inpt-5" id="medical_address" >
                                        </div>
                                    </div>

                                </div>


                                <div class="row user-profile-line-1">

                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <label for="medical_email" class="label-1">Email</label>
                                            <input name="medical_email" type="email" class="inpt-5" id="medical_email" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="inpt-wrapper">
                                            <div class="payment-wrapper">
                                                <label for="payment-method-liqpay">
                                                    <input type="radio" id="payment-method-liqpay" name="payment_method" value="liqpay" checked>
                                                    <img class="liqpay-logo" src="<?php echo get_template_directory_uri() ?>/img/liqpay.svg" alt="">
                                                </label>

                                                <label for="payment-method-abank">
                                                    <input type="radio" id="payment-method-abank" name="payment_method" value="abank">
                                                    A-Bank
                                                </label>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="add-insurer-wrapper">
                                            <label class="label-1">Додати страхувальника до застрахованих осiб</label>
                                            <input type="checkbox" name="add-insurer" id="addInserer" checked><label for="addInserer" title="Якщо страхувальник та застрахована одна i таж особа, нiчого добавляти не потрiбно." ></label>

                                            <button type="button" class="btn-1 btn-add-insurers" id="addInserers" title="Додати ще одного застрахованого.">+</button>
                                        </div>
                                    </div>

                                </div>





                                <div class="insurer-wrapper js-insurer-wrapper"></div>

                                <?php /*<div class="insurer-row">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="label-1" for="insurerLastName">Прiзвище</label>
                                            <input class="inpt-5" type="text" id="insurerLastName">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="label-1" for="insurerName">Ім'я</label>
                                            <input class="inpt-5" type="text" id="insurerName">
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="inpt-wrapper">
                                                <label class="label-1" for="insurerDate">Дата народження</label>
                                                <input class="inpt-5 bg-calendar add-data-picker" type="text" id="insurerDate" autocomplete="off" required placeholder="дд.мм.рррр">
<!--                                            <input name="medical_date_start" type="text" class="inpt-5 bg-calendar" id="medical_date_start" autocomplete="off" required placeholder="дд.мм.рррр">-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <label class="label-1" for="insurerPassport">Серiя, номер паспорта</label>
                                            <input class="inpt-5" type="text" id="insurerPassport">
                                        </div>
                                        <div class="col-lg-5">
                                            <label class="label-1" for="insurerAddress">Адреса постійного місця проживання</label>
                                            <input class="inpt-5" type="text" id="insurerAddress">
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn-1 add-insurer-row js-add-insurer-row">+</button>
                                            <button class="btn-1 remove-insurer-row js-remove-insurer-row">-</button>

                                        </div>
                                    </div>
                                </div><!--insurer-wrapper end here--> */ ?>



                                <input name="blank_type_id" id="blank_type_id" type="hidden" value="2">
                                <input name="company_id" type="hidden">
                                <input name="company_franchise" type="hidden">
                                <input name="company_period" type="hidden">
                                <input name="company_title" type="hidden">
                                <input name="blank_title" type="hidden">
                                <!--                                <input name="blank_id" type="hidden">-->

                                <input name="rate_id" type="hidden">
                                <input name="rate_franchise" type="hidden">
                                <input name="rate_validity" type="hidden">
                                <input name="rate_insured_sum" type="hidden">
                                <input name="rate_price" type="hidden">
                                <input name="rate_coefficient" type="hidden">
                                <input name="rate_locations" type="hidden">

                                <div class="step-4-footer">
                                    <div class="medical-btn-wrapper">
                                        <input class="btn-get-it js-btn-get-it" type="submit" value="Оформити полiс">
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div class="insurance-form-message js-insurance-form-message"></div>

                        <div class="insurance-form-last-step js-insurance-form-last-step"></div>

<!--                    </div>-->
<!--                </div>-->



</div>

<?php

get_footer();

?>
