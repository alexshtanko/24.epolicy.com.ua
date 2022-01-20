<?php

//Подключаем библиотеку для работы с Excel файлами
require ABSPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;


/**
 * The admin-specific functionality of the plugin.
 *
 * @link       alexshtanko.com.ua
 * @since      1.0.0
 *
 * @package    Insurance
 * @subpackage Insurance/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Insurance
 * @subpackage Insurance/admin
 * @author     Alex <alexshtanko@gmail.com>
 */
class Insurance_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

        // $this->insurance_include_company();

        add_action('admin_menu', array($this, 'insurance_nav'));

	    // Добавляем список заказов
	    add_action('admin_menu', array($this, 'order_list'));

        // Добавим подменю "Бланки" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_program'));

        // Добавим подменю "Нумерация бланков" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_number_of_blank'));

        // Добавим подменю "Компании" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_company'));

        // Добавим подменю "Импорт тарифов" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_rate_import'));

        // Добавим подменю "тарифы" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_rate'));

        // Добавим подменю "Отчеты" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_reports'));

        // Добавим подменю "Статусы заказов" в меню админ-панели
        add_action('admin_menu', array($this, 'insurance_statuses'));

        // Добавляем привязку нумерации бланков к определенному менеджеру
        add_action('admin_menu', array($this, 'insurance_blank_to_manager'));


        //Выводим список Бланков
        // add_action( 'admin_init', array( $this, 'load_blanks' ));


        //Работа с програмами
        $this->program($plugin_name, $version);

        // Нумерация бланков
        $this->number_of_blank($plugin_name, $version);

        //Работа с компаниями
        $this->company($plugin_name, $version);

        //Привязка нумерации бланков к опрделенному менеджеру
        $this->blank_with_manager($plugin_name, $version);

        //Статусы заказов
        $this->statuses($plugin_name, $version);

        //Импорт тарифов
        $this->rate_import();

        //Заказы
        $this->orders_start($plugin_name, $version);

        //Работа с тарифами
        // $this->rate();

//	    if (!empty($_POST['filter']) && $_POST['filter'] === 'download_xlsx') {
	    if (!empty($_POST['filter']) && $_POST['filter'] === 'insurance_download_xlsx') {
		    add_action('init', array($this, 'render_blanks_report'));
	    }
    }

    // public function insurance_include_company() {

    // 	require plugin_dir_path( __FILE__ ) . 'parts/insurance-company.php';

    // }

    public function program($plugin_name, $version)
    {
        $program = new Insurance_Admin_Program();
        $program->run($plugin_name, $version);
    }

    public function get_all_managers()
    {
        $users = get_users();
        $usersList = [];
        if (count($users) > 0) {
            foreach ($users as $user) {
                if (in_array("user_manager", $user->roles)) {
                    $usersList[$user->ID] = $user->display_name;
                }
            }
            return $usersList;
        }

        return false;
    }

    public function number_of_blank($plugin_name, $version)
    {
        $blank = new Insurance_Admin_Number_Of_Blanks();
        $blank->run($plugin_name, $version);
    }

    public function company($plugin_name, $version)
    {
        $company = new Insurance_Admin_Company();
        $company->run($plugin_name, $version);
    }

    public function blank_with_manager($plugin_name, $version)
    {
        $blank_to_manager_obj = new Insurance_Admin_Blank_To_Manager;
        $blank_to_manager_obj->run($plugin_name, $version);
    }

    public function orders_start($plugin_name, $version)
    {
        $order_obj = new Insurance_Admin_Orders;
        $order_obj->run($plugin_name, $version);
    }

    public function statuses($plugin_name, $version)
    {
        $statuses_obj = new Insurance_Admin_Statuses;
        $statuses_obj->run($plugin_name, $version);
    }

    public function rate_import()
    {
        $rate = new Insurance_Admin_Rate($this->get_plugin_name(), $this->get_version());
        $rate->import();
    }

    public function insurance_nav()
    {
        add_menu_page('Медичне страхування', 'Medical policy', 'manage_options', 'insurance', array($this, 'render'), 'dashicons-plus', '2');
    }

    //Выводим страницу
    public function render()
    {
        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display.php';
    }

    public function insurance_program()
    {
        remove_submenu_page('insurance', 'insurance');
        $page = add_submenu_page(
            'insurance',
            'Програми',
            'Програми',
            'manage_options',
            'insurance',
            array($this, 'render_program')
        );
    }

    public function insurance_number_of_blank()
    {
        $page = add_submenu_page(
            'insurance',
            'Нумерація бланків',
            'Нумерація бланків',
            'manage_options',
            'insurance-number-of-blank',
            array($this, 'render_number_of_blank')
        );

    }

    public function insurance_reports()
    {
        $page = add_submenu_page(
            'insurance',
            'Звіти',
            'Звіти',
            'manage_options',
            'insurance-reports',
            array($this, 'render_reports')
        );
    }

    public function insurance_statuses()
    {
        $page = add_submenu_page(
            'insurance',
            'Статуси замовлень',
            'Статуси замовлень',
            'manage_options',
            'insurance-statuses',
            array($this, 'render_statuses')
        );
    }

    public function insurance_blank_to_manager()
    {
        $page = add_submenu_page(
            'insurance',
            'Закріплення нумерації бланків за менеджером',
            '',
            'manage_options',
            'insurance-blank-to-manager',
            array($this, 'blank_to_manager')
        );

    }

    public function order_list()
    {
        $page = add_submenu_page(
            'insurance',
            'Замовлення',
            'Замовлення',
            'manage_options',
            'orders',
            array($this, 'orders')
        );

    }

    public function orders()
    {
        $orders_data = new Insurance_Admin_Orders();

        $limit_from = 0;
        $offset = 10;

        //Тарифы
        $orders = $orders_data->get_orders();

        $orders_count = count($orders);

        $page = $orders_count / $offset;
        $pages = ceil($page);

        $paginations = $orders_data->get_paginations($orders_count, $offset);

        $paginations = $paginations['result'];

        $current_page = 0;

        //Заказы
        $orders = $orders_data->get_orders($current_page, $offset);
        $orders = $orders_data->orders_render($orders);

        //Франшиза
        $franchises = $orders_data->get_franchise();

        //Срок действия
        //$validities = $orders_data->get_validity();

        //Страховая сумма
        $insured_sum = $orders_data->get_insured_sum();

        //Страховая сумма
        $locations = $orders_data->get_locations();

        // компании
        $companies = new Insurance_Admin_Company();
        $companies = $companies->getCompanies();

        // серии бланков
        $blank_series = $orders_data->get_blank_series();

        //менеджери
        $users = $orders_data->get_managers_ids();

        $managers = [];
        if (!empty($users)) {
            foreach ($users as $user) {
                $managers[] = $this->km_get_users_name($user['user_id']);
            }
        }

        usort($managers, function($a, $b) {

            return $a['name'] <=> $b['name'];

        });

        //статуси
        $statuses = $orders_data->get_statuses();


        $programs = new Insurance_Admin_Program();
        $programs = $programs->getPrograms();

        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-orders.php';
    }

	public function render_blanks_report()
	{
		global $wpdb;

//        add_action('init', array($this, 'change_headers'));

		$blank_to_manager_table = $wpdb->prefix . "insurance_blank_to_manager";
		$number_of_blank_table = $wpdb->prefix . "insurance_number_of_blank";
		$companies_table = $wpdb->prefix . "insurance_company";
		$orders_table = $wpdb->prefix . "insurance_orders";
		$statuses_table = $wpdb->prefix . "insurance_statuses";

		$where_array = [];

		$from_date_excel = '';
		$to_date_excel = '';
		$to_date_excel2 = '';

		if (!empty($_POST["companyId"])) {
			$where_array[] =
				"nob.company_id = '" . $_POST["companyId"] . "'";
		}

		if (!empty($_POST["managerId"])) {
			$where_array[] =
				"ibtm.manager_id = '" . $_POST["managerId"] . "'";
		}

		if (!empty($_POST["dateFrom"])) {
			$where_array[] =
				"nob.date_added >= '" . $_POST["dateFrom"] . "'";
			$from_date_excel = ' з ' . date('d.m.Y', strtotime($_POST["dateFrom"])) . ' ';
		}

		if (!empty($_POST["dateTo"])) {
			$where_array[] =
				"nob.date_added <= '" . $_POST["dateTo"] . "'";
			$to_date_excel = ' з ' . date('d.m.Y', strtotime($_POST["dateTo"])) . ' ';
			$to_date_excel2 = ' на ' . date('d.m.Y', strtotime($_POST["dateTo"])) . ' ';
		}

		$where = ' WHERE nob.status = 1 ';

		if (!empty($where_array)) {
			foreach ($where_array as $where_item) {
				$where .= " AND " . $where_item;
			}
		}
		if (!empty($_POST["managerId"])) {
			$where .= 'AND ibtm.status = 1 ';

			$data = $wpdb->get_results("SELECT ibtm.manager_id, ibtm.number_start, ibtm.number_end, nob.company_id, nob.blank_series, nob.date_added, ct.title as company_name
            FROM " . $blank_to_manager_table . " ibtm " .
			                           " LEFT JOIN " . $number_of_blank_table . " nob ON ibtm.number_of_blank_id = nob.id" .
			                           " LEFT JOIN " . $companies_table . " ct ON nob.company_id = ct.id" .
			                           $where, ARRAY_A);
		} else {
			$data = $wpdb->get_results("SELECT nob.id,
                                                nob.number_start, nob.number_end, nob.company_id, nob.blank_series, nob.date_added, ct.title as company_name
            FROM " . $number_of_blank_table . " nob " .
			                           " LEFT JOIN " . $companies_table . " ct ON nob.company_id = ct.id" .
			                           $where, ARRAY_A);
		}

//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
//        wp_die();

		$data = array_map('wp_unslash', $data);


        /*
         * Если указан ИД МЕНЕДЖЕРА
         * То:
         * 1. получаем все диапазоны назначенные ему
         * 2. заполняем массив использованых номеров бланков
         * 3. находим разницу
         */


        $date_from = !empty( $_POST["dateFrom"] ) ? $_POST["dateFrom"] . " 00:00:00" : "1960-01-01 00:00:00";
        $date_to = !empty( $_POST["dateTo"] ) ? $_POST["dateTo"] . " 23:59:59" : date("Y-m-d") . " 23:59:59";
        $query_str = !empty($_POST["companyId"]) ? " AND nob.company_id = " . (int)$_POST["companyId"] : '';
//        $query_str =  " AND nob.company_id = " . 3;
//        $query_str = !empty($_POST["companyId"]) ? " AND btm.number_of_blank_id = " . 1 : "";
//        $query_str = " AND btm.number_of_blank_id = " . 1;

        var_dump($query_str);
        var_dump($date_from);
        var_dump($date_to);
//        wp_die();

        if( !empty( $_POST["managerId"] ) )
//        if( 1 )
        {
            $result = [];
            $manager_diapasons_details = [];
            $manager_orders_add = [];
            $manager_orders_add_id = [];
            $manager_id = $_POST["managerId"];
//            $manager_id = 94;


            //Получаем все диапазоны назныченные МЕНЕДЖУРУ
//            $manager_diapasons = $wpdb->get_results("SELECT btm.number_of_blank_id, btm.number_start, btm.number_end FROM ".$blank_to_manager_table." btm RIGHT JOIN ".$number_of_blank_table." nob ON nob.id = btm.number_of_blank_id AND nob.date_added <= '".$date_to."' AND nob.date_added >= '".$date_from."' WHERE btm.manager_id = ".$manager_id.";", ARRAY_A);
//            $manager_diapasons = $wpdb->get_results("SELECT btm.number_of_blank_id, btm.number_start, btm.number_end FROM ".$blank_to_manager_table." btm RIGHT JOIN ".$number_of_blank_table." nob ON nob.id = btm.number_of_blank_id AND nob.date_added BETWEEN '".$date_from."' AND '".$date_to."' WHERE btm.manager_id = ".$manager_id.";", ARRAY_A);
            $manager_diapasons = $wpdb->get_results("SELECT btm.number_of_blank_id, btm.number_start, btm.number_end FROM ".$blank_to_manager_table." btm RIGHT JOIN ".$number_of_blank_table." nob ON nob.id = btm.number_of_blank_id AND nob.date_added BETWEEN '".$date_from."' AND '".$date_to."' AND btm.status = 1 " . $query_str. " WHERE btm.manager_id = ".$manager_id." AND btm.status = 1 ;", ARRAY_A);
//            var_dump($manager_diapasons);
            foreach ( $manager_diapasons as $manager_diapason )
            {
                $manager_diapasons_details[$manager_diapason['number_of_blank_id']] = range($manager_diapason['number_start'], $manager_diapason['number_end']);
            }

            //Получаем все договора заключенные МЕНЕДЖЕРОМ
            $manager_orders_add = $wpdb->get_results("SELECT number_blank_id, blank_number FROM ".$orders_table." WHERE user_id = ".$manager_id.";", ARRAY_A);

            foreach ( $manager_orders_add as $manager_order_add )
            {
                $manager_orders_add_id[$manager_order_add['number_blank_id']][] = $manager_order_add['blank_number'];
            }



            //Сравниваем массивы и формируем результат
            if( ! empty($manager_diapasons_details) )
            {
                foreach ( $manager_diapasons_details as $k => $v )
                {
                    $diff = array_diff( $v, $manager_orders_add_id[$k] );
                    if( !empty( $diff )  ){
                        $result[$k] = $diff;
                    }

                }
            }


        }
        //Если не выбран пользователь
        else
        {
            //Проверяем выбрана ли СТРАХОВАЯ КОМПАНИЯ
            $query_str = !empty($_POST["companyId"]) ? " AND nob.company_id = " . (int)$_POST["companyId"] : '';

            //Получаем все договора заключенные МЕНЕДЖЕРОМ
            $manager_orders_add = $wpdb->get_results("SELECT user_id AS manager_id, number_blank_id, blank_number FROM ".$orders_table." WHERE status = 1 ORDER BY user_id ASC ;", ARRAY_A);

            $used_blanks = [];
            foreach ( $manager_orders_add as $manager_order_add )
            {
                $manager_orders_add_id[$manager_order_add['manager_id']][$manager_order_add['number_blank_id']][] = $manager_order_add['blank_number'];
                $used_blanks[$manager_order_add['number_blank_id']][] = $manager_order_add['blank_number'];
            }

            //Выбыраем все диапазоны договоров
            $all_diapasons = $wpdb->get_results("SELECT id, number_start, number_end FROM ".$number_of_blank_table."  WHERE  status = 1 ;", ARRAY_A);
//            var_dump($manager_diapasons);
            foreach ( $all_diapasons as $all_diapason )
            {
                $all_diapasons_details[$all_diapason['id']] = range($all_diapason['number_start'], $all_diapason['number_end']);
            }


            //Выбираем диапазоны договоров закрепленные за менеджерами
            $managers_diapason = $wpdb->get_results("SELECT btm.number_of_blank_id, btm.number_start, btm.number_end, btm.manager_id FROM ".$blank_to_manager_table." btm RIGHT JOIN ".$number_of_blank_table." nob ON nob.id = btm.number_of_blank_id AND nob.date_added BETWEEN '".$date_from."' AND '".$date_to."' AND btm.status = 1 " . $query_str. " WHERE btm.status = 1 ;", ARRAY_A);
//            var_dump($manager_diapasons);
            $manager_order_diapason = [];
            foreach ( $managers_diapason as $manager_diapason )
            {
//                $manager_diapasons_details[$manager_diapason['number_of_blank_id']][] = range($manager_diapason['number_start'], $manager_diapason['number_end']);
                $manager_diapasons_details[$manager_diapason['manager_id']][$manager_diapason['number_of_blank_id']][] = range($manager_diapason['number_start'], $manager_diapason['number_end']);
                $manager_order_diapason[$manager_diapason['number_of_blank_id']][] = range($manager_diapason['number_start'], $manager_diapason['number_end']);

            }


            //Сравниваем массивы и формируем результат
            if( ! empty($manager_diapasons_details) )
            {
                foreach ( $manager_diapasons_details as $k => $v )
                {
                    if( ! empty( $manager_orders_add_id[$k] ) ){
                        $diff = array_diff( $v, $manager_orders_add_id[$k] );
                        if( !empty( $diff )  ){
                            $result[$k] = $diff;
                        }
                    }
                    else
                    {
                        $result[$k] = $v;
                    }

                }
            }

            //Делвем разницу
//            if( ! empty ( $all_diapasons_details ) )
//            {
//                foreach ( $all_diapasons_details as $k => $v )
//                {
//                    $diff = array_diff( $v, $manager_orders_add_id[$k] );
//                    if( !empty( $diff )  ){
//                        $result[$k] = $diff;
//                    }
//
//                }
//            }



            /*
             * Находим все свободные номера бланков
             */
            $result = [];
            if( ! empty ( $all_diapasons_details ) )
            {
                foreach ( $all_diapasons_details as $k => $v )
                {
                    if( array_key_exists( $k, $used_blanks ) )
                    {
                        $diff = array_diff( $v, $used_blanks[$k] );
                        if( !empty( $diff )  ){
                            $result[$k] = $diff;
                        }
                    }
                    else
                    {
                        $result[$k] = $v;
                    }
                }
            }



        }








        echo '<pre>';
//        var_dump($manager_orders_add_id);
//        var_dump($all_diapasons_details);
//        var_dump($used_blanks);
//        var_dump($manager_diapasons_details);
//        var_dump($manager_orders_add_id);
//        echo 'manager_diapasons_details <br>' ;
//        var_dump($manager_diapasons_details);
//        echo 'manager_orders_add_id';
//        var_dump($manager_orders_add_id);
//        echo 'result';
        var_dump($result);
//        echo '</pre>';
        wp_die();


//		$rows_for_excel = [];
//		$empty_blanks = 0;
//		if (!empty($data)) {
//			foreach ($data as $row) {
//				if (!empty($row['number_start']) && !empty($row['number_end'])) {
//					if (empty($_POST["managerId"])) {
//						$to_managers = $wpdb->get_results("SELECT `manager_id`, `number_start`, `number_end` FROM " . $blank_to_manager_table . " btm " .
//						                                  " WHERE number_of_blank_id = '" . $row['id'] . "'", ARRAY_A);
//					}
//
//					for ($i = $row['number_start']; $i <= $row['number_end']; $i++) {
//
//						$status = '';
//						$manager_id = '';
//
//						if (empty($_POST["managerId"])) {
//							if (!empty($to_managers)) {
//								foreach ($to_managers as $to_manager) {
//									if ($i >= $to_manager['number_start'] && $i <= $to_manager['number_end']) {
//										$manager_id = $to_manager['manager_id'];
//									}
//								}
//							}
//						} else {
//							$manager_id = $row['manager_id'];
//						}
//
//						$orders = $wpdb->get_results("SELECT st.text as status FROM " . $orders_table . " ot " .
//						                             " LEFT JOIN " . $statuses_table . " st ON ot.status = st.id" .
//						                             " WHERE blank_number = '" . $i . "' AND blank_series = '" . $row['blank_series'] . "'", ARRAY_A);
//
//						if (count($orders) === 1) {
//							$status = $orders[0]['status'];
//						} elseif (count($orders) > 1) {
//							$status = $orders[count($orders) - 1]['status'];
//						}
//
//						if (strlen($status) === 0) {
//							$empty_blanks++;
//						}
//						$manager = !empty($manager_id) && !empty($this->km_get_users_name($manager_id)['name']) ? $this->km_get_users_name($manager_id)['name'] : '';
//
//						$rows_for_excel[] = [
//							'blank_number' => $row['blank_series'] . $i,
//							'status' => $status,
//							'manager' => $manager,
//							'company' => $row['company_name']
//						];
//					}
//				}
//			}
//		}

        echo '<pre>';
        var_dump($rows_for_excel);
        echo '</pre>';
        wp_die();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Акт звірки бланків');
		$sheet->mergeCells('A1:E1');
		if (strlen($from_date_excel) > 0 || strlen($to_date_excel)) {
			$subtitle_line = 'В період ' . $from_date_excel . $to_date_excel . 'повіреному видано наступні бланки страхування:';
			$sheet->getStyle('A2:E2')->getAlignment()->setWrapText(true);
			$sheet->getRowDimension('2')->setRowHeight(30);
		} else {
			$subtitle_line = 'Повіреному видано наступні бланки страхування:';
		}
		$sheet->setCellValue('A2', $subtitle_line);
		$sheet->mergeCells('A2:E2');

		$bold_styles = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
			],
		];

		$border_styles = [
			'borders' => [
				'top' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
				'bottom' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
				'left' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
				'right' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];

		$sheet->getStyle('A1')->applyFromArray($bold_styles)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A2')->applyFromArray($bold_styles)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

//            $sheet->getStyle('B4')->applyFromArray(array_merge($bold_styles, $border_styles));
//            $sheet->getStyle('C4')->applyFromArray(array_merge($bold_styles, $border_styles));
//            $sheet->getStyle('D4')->applyFromArray(array_merge($bold_styles, $border_styles));
//            $sheet->getStyle('E4')->applyFromArray(array_merge($bold_styles, $border_styles));

		if (!empty($rows_for_excel)) {
			$sheet->setCellValue('A4', '№');
			$sheet->setCellValue('B4', '№ Бланку');
			$sheet->setCellValue('C4', 'Статус');
			$sheet->setCellValue('D4', 'Менеджер');
			$sheet->setCellValue('E4', 'Компанія');

			$sheet->getStyle('A4:E4')->applyFromArray(array_merge($bold_styles, $border_styles))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);;

			for ($i = 0; $i < count($rows_for_excel); $i++) {
				$row = $rows_for_excel[$i];
				$sheet->setCellValue('A' . ($i + 5), $i + 1);
				$sheet->setCellValue('B' . ($i + 5), $row['blank_number']);
				$sheet->setCellValue('C' . ($i + 5), $row['status']);
				$sheet->setCellValue('D' . ($i + 5), $row['manager']);
				$sheet->setCellValue('E' . ($i + 5), $row['company']);
			}

			$sheet->getStyle('A5:E' . (count($rows_for_excel) + 4))->applyFromArray($border_styles);
			$sheet->setCellValue('A' . (5 + count($rows_for_excel) + 1), 'Залишок не використаних ' . $to_date_excel2 . ': ' . $empty_blanks . ' шт.	');
		} else {
			$sheet->setCellValue('A4', 'За вибраний період бланків не знайдено');
		}

		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);

		$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		$xlsName = "report.xlsx";

		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $xlsName . '"');
		header("Content-Transfer-Encoding: binary");
		ob_end_clean();

		$writer->save('php://output');
		exit();

	}

    public function blank_to_manager()
    {
//	    if (!empty($_POST['filter']) && $_POST['filter'] === 'download_xlsx') {
        if (!empty($_POST['filter']) && $_POST['filter'] === 'insurance_download_xlsx') {
		    $this->render_blanks_report();
		    die();
	    }

        $deleteRow = false;

	    $companies = new Insurance_Admin_Company();
	    $companies = $companies->getCompanies();
	    asort($companies);

        $blanks_obj = new Insurance_Admin_Number_Of_Blanks;
        $blank_series = $blanks_obj->getUniqueBlankSeries();

        if (array_key_exists("managerid", $_GET)) {
            $blank_to_manager_obj = new Insurance_Admin_Blank_To_Manager;

            $noticeText = '';
            if (array_key_exists("delete_row", $_POST) && $_POST['delete_row'] == "true") {
                $deleteRow = $blank_to_manager_obj->insurance_delete_blank_to_manager($_POST);
                if ($deleteRow) {
                    $noticeStyle = "notice-success";
                    $noticeText = "Запис успішно видалено.";
                } else {
                    $noticeStyle = "notice-error";
                    $noticeText = "Запис не видалено. Спробуйте ще раз";
                }
            }

            if (array_key_exists("add_blank_number_to_manager", $_POST) && $_POST['add_blank_number_to_manager'] == "true") {
                if (intval($_POST['form_blanks_number_start']) <= intval($_POST['form_blanks_number_end'])) {
                    $addRow = $blank_to_manager_obj->insurance_add_blank_to_manager($_POST, $_GET["managerid"]);
                    if ($addRow) {
                        $noticeStyle = "notice-success";
                        $noticeText = "Запис успішно додано.";
                    } else {
                        $noticeStyle = "notice-error";
                        $noticeText = "Запис не додано. Перевірте введені дані і спробуйте ще раз";
                    }
                }
            }

            $managerRows = $blank_to_manager_obj->get_blanks_to_manager($_GET["managerid"]);
            if (count($managerRows) > 0) $renderTableRows = $blank_to_manager_obj->render_blank_list_to_manager($managerRows, $_GET["managerid"]);
            $currentUser = get_userdata($_GET["managerid"]);
        }

        $managers = $this->get_all_managers();
        asort($managers);

        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-number-of-blank-to-manager.php';
    }


    //Выводим страницу подменю "Статусы заказов"
    public function render_statuses()
    {
        $statuses_obj = new Insurance_Admin_Statuses();
        $noticeText = '';

        if (array_key_exists("add_status", $_POST) && $_POST['add_status'] == "true") {
            $addRow = $statuses_obj->insurance_add_status($_POST);
            if ($addRow) {
                $noticeStyle = "notice-success";
                $noticeText = "Статус успішно додано.";
            } else {
                $noticeStyle = "notice-error";
                $noticeText = "Статус не додано. Перевірте введені дані і спробуйте ще раз";
            }
        }

        if (array_key_exists("edit_status", $_POST) && $_POST['edit_status'] == "true") {
            $addRow = $statuses_obj->insurance_edit_status($_POST);
            if ($addRow) {
                $noticeStyle = "notice-success";
                $noticeText = "Статус успішно збережено.";
            } else {
                $noticeStyle = "notice-error";
                $noticeText = "Зміни не збережено. Перевірте введені дані і спробуйте ще раз";
            }
        }

        if (array_key_exists("delete_status", $_POST) && $_POST['delete_status'] == "true") {
            $deleteRow = $statuses_obj->insurance_delete_status($_POST);
            if ($deleteRow) {
                $noticeStyle = "notice-success";
                $noticeText = "Статус успішно видалено.";
            } else {
                $noticeStyle = "notice-error";
                $noticeText = "Статус не видалено. Спробуйте ще раз";
            }
        }

        $statuses = $statuses_obj->load_statuses();
        $statusesArray = $statuses_obj->get_statuses_array();

        if (array_key_exists("getStatusId", $_GET)) {
            $statusArray = $statuses_obj->get_statuses($_GET['getStatusId']);
        }
        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-statuses.php';
    }

    //Выводим страницу подменю "Отчеты"
    public function render_reports()
    {
        $program_obj = new Insurance_Admin_Program();
        $all_programs = $program_obj->get_programs();
        $companies = new Insurance_Admin_Company();
        $companies = $companies->getCompanies();
        $managers = $this->get_all_managers();
        $all_blank_type_id = new Insurance_Admin_Blank_Pype();
        $all_blank_type_id = $all_blank_type_id->get_all_blank_type();
        asort($managers);

	    $statuses_obj = new Insurance_Admin_Statuses();
	    $statusesArray = $statuses_obj->get_statuses_array();
	    $allStatuses = [];
	    foreach($statusesArray as $tmp){
		    $allStatuses[$tmp["id"]] = $tmp["text"];
	    }
        $reportFilePath = plugin_dir_path(dirname(__FILE__)) . 'files/orders_report.xlsx';
        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-reports.php';
    }

    //Выводим страницу подменю "Тарифы"
    public function render_number_of_blank()
    {

        $number_of_blanks_obj = new Insurance_Admin_Number_Of_Blanks();

        $number_of_blank = $number_of_blanks_obj->getNumberOfBlanks();

        $blank_list = $number_of_blanks_obj->render_number_of_blank($number_of_blank);

        $number_of_blanks_obj->filterFetBlanks();

        $companies = new Insurance_Admin_Company();

        $companies = $companies->getCompanies();

        $blank_types = new Insurance_Admin_Blank_Pype();

        $blank_types = $blank_types->get_all_blank_type();

        $blank_series = $number_of_blanks_obj->getUniqueBlankSeries();

        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-number-of-blank.php';

    }


    //Выводим страницу подменю "Бланки"
    public function render_program()
    {

        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-program.php';

    }

    public function insurance_company()
    {
        $page = add_submenu_page(
            'insurance',
            'Компанії',
            'Компанії',
            'manage_options',
            'insurance-company',
            array($this, 'render_company')
        );

    }


    //Выводим страницу подменю "Компании"
    public function render_company()
    {
        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-company.php';
    }

    public function insurance_rate_import()
    {
        add_submenu_page(
            'insurance',
            'Iмпорт тарифiв',
            'Iмпорт тарифiв',
            'manage_options',
            'insurance-rate-import',
            array($this, 'render_rate_import')
        );
    }


    //Выводим страницу подменю "Тарифы"
    public function render_rate_import()
    {

        $companies = new Insurance_Admin_Company();

        $companies = $companies->getCompanies();

        $blanks = new Insurance_Admin_Program();

        $blank_type = new Insurance_Admin_Blank_Pype();

        $all_balnk_type = $blank_type->get_all_blank_type();



        $blanks = $blanks->getPrograms();

        // $rate = new Insurance_Admin_Rate();

        // $mes = $rate->import();

        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-rate-import.php';

    }

    public function insurance_rate()
    {
        $page = add_submenu_page(
            'insurance',
            'Список тарифiв',
            'Тарифи',
            'manage_options',
            'insurance-rate',
            array($this, 'render_rate')
        );

    }

    //Выводим страницу подменю "Тарифы"
    public function render_rate()
    {
        $rates_data = new Insurance_Admin_Rate($this->get_plugin_name(), $this->get_version());

        $limit_from = 0;
        $offset = 10;

        //Тарифы
        $rates = $rates_data->get_rates();

        $rates_count = count($rates);

        $page = $rates_count / $offset;
        $pages = ceil($page);

        $paginations = $rates_data->get_paginations($rates_count, $offset);

        $paginations = $paginations['result'];

        $current_page = 0;

        //Тарифы
        $rates = $rates_data->get_rates($current_page, $offset);
        $rates = $rates_data->rates_render($rates);

        //Франшиза
        $franchises = $rates_data->get_franchise();

        //Срок действия
        $validities = $rates_data->get_validity();

        //Страховая сумма
        $insured_sum = $rates_data->get_insured_sum();

        //Страховая сумма
        $locations = $rates_data->get_locations();

        $companies = new Insurance_Admin_Company();

        $companies = $companies->getCompanies();

        $programs = new Insurance_Admin_Program();

        $programs = $programs->getPrograms();

        require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/insurance-admin-display-rate.php';

    }


    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Insurance_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Insurance_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        // wp_enqueue_style( 'bootstrap-4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', array(), $this->version, 'all' );

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/insurance-admin.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Insurance_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Insurance_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/insurance-admin.js', array('jquery'), $this->version, false);


    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version()
    {
        return $this->version;
    }

    public function km_get_users_name($user_id = null)
    {

        $user_info = $user_id ? new WP_User($user_id) : wp_get_current_user();

        if ($user_info->first_name) {

            if ($user_info->last_name) {
//                return ['id' => $user_id, 'name' => $user_info->first_name . ' ' . $user_info->last_name];
                return ['id' => $user_id, 'name' => $user_info->last_name . ' ' . $user_info->first_name];
            }

            return ['id' => $user_id, 'name' => $user_info->first_name];
        }

        return ['id' => $user_id, 'name' => $user_info->display_name];
    }

    public function sort_array($array)
    {

        usort($array, function($a, $b) {

            return $a['num'] <=> $b['num'];

        });

    }

}
