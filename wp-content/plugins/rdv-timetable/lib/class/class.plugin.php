<?php

/**
 * 
 * Responsive Timetable for Wordpress
 *
 * @version 1.5.1
 * @author  Rik de Vos
 */
class SCHED {

	public $notifications = array();

	public $custom_style = '';

	public $editor = false;

	public $addon_horizontal = false;
	
	/**
	 * Constructor function
	 * @return null
	 */
	function __construct() {

		// Initiate helper classes
		SCHED_DB::init();
		SCHED_TinyMCE::init();

		

		// Load assets
		add_action('init', array($this, 'activate_addons'));
		add_action('init', array($this, 'enqueue_client_assets'));
		add_action('init', array($this, 'vc_shortcodes'), 30);
		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));

		// Create admin page
		add_action('admin_menu', array($this, 'create_menu'));

		// Save Changes
		if(isset($_GET['page']) && ($_GET['page'] == 'sched-schedule' || $_GET['page'] == 'sched-schedule-timetables')) {
			$action = isset($_GET['sched_action']) ? $_GET['sched_action'] : false;
			$action = isset($_POST['sched_action']) ? $_POST['sched_action'] : $action;

			if($action == 'save_changes') {
				add_action('init', array($this, 'save_changes'));
			}else if($action == 'create_schedule') {
				add_action('init', array($this, 'create_schedule'));
			}else if($action == 'reset_colors') {
				add_action('init', array($this, 'reset_colors'));
			}else if($action == 'reset_settings') {
				add_action('init', array($this, 'reset_settings'));
			}else if($action == 'post_import') {
				add_action('init', array($this, 'import_timetable'));
			}

			if($_GET['page'] == 'sched-schedule-timetables' && isset($_GET['sched-tab']) && $_GET['sched-tab'] == 'edit-timetable') {
				$this->editor = new SCHED_EDITOR;
			}elseif($_GET['page'] == 'sched-schedule-timetables' && isset($_GET['sched-tab']) && $_GET['sched-tab'] == 'export-timetable') {

			}

		}
		
		add_action('init', array($this, 'add_shortcode'));

		add_action('widgets_init', array($this, 'register_widget'));

		add_action('wp_ajax_sched_editor', array($this, 'editor'));

		
		

		// Custom CSS
		add_action('wp_ajax_sched_custom_css', array($this, 'output_custom_css'));
		add_action('wp_ajax_nopriv_sched_custom_css', array($this, 'output_custom_css'));

		// PDF
		add_action('wp_ajax_sched_pdf_export', array($this, 'output_pdf'));
		add_action('wp_ajax_nopriv_sched_pdf_export', array($this, 'output_pdf'));
		add_action('wp_ajax_sched_pdf_export_view', array($this, 'output_pdf_view'));
		add_action('wp_ajax_nopriv_sched_pdf_export_view', array($this, 'output_pdf_view'));

		if(isset($_GET['sched_message'])) {
			$message = $_GET['sched_message'];
			if($message == 'timetable_created') {
				$this->add_notification('The timetable has been created.');
			}else if($message == 'timetable_deleted') {
				$this->add_notification('The timetable has been deleted.');
			}else if($message == 'colors_reset') {
				$this->add_notification('Colors have been reset back to default.');
			}else if($message == 'settings_reset') {
				$this->add_notification('All settings have been reset back to default.');
			}else if($message == 'import_done') {
				$this->add_notification('The timetable has been imported.');
			}
		}

	}

	function activate_addons() {
		if(defined('SCHED_H_FILE')) {
			$this->addon_horizontal = true;
		}
	}

	function register_widget() {
		register_widget('SCHED_Widget');
	}

	function add_shortcode() {
		add_shortcode('timetable', array($this, 'run_shortcode_timetable'));
		add_shortcode('timetable_current_events', array($this, 'run_shortcode_timetable_current_events'));
		add_shortcode('timetable_upcoming', array($this, 'run_shortcode_timetable_upcoming'));
	}

	function run_shortcode_timetable($atts, $content = null) {
		if(!isset($atts['id'])) { return 'No timetable id entered.'; }

		$id = (int)$atts['id'];

		if(isset($atts['advanced_options'])) {
			preg_match_all("/([a-zA-Z0-9_]+)\s*=\s*[\"'`]+([\S\s]+?)\s*[\"'`]+/", $atts['advanced_options'], $matches);
			if(count($matches) === 3 && count($matches[1]) === count($matches[2])) {
				for($i = 0; $i < count($matches[1]); $i++) {
					$atts[$matches[1][$i]] = $matches[2][$i];
				}
			}

		}

		if(isset($atts['layout']) && $atts['layout'] == 'list_view') {
			$atts['column_break_width'] = 99999;
		}

		$options = SCHED_DB::$options;
		foreach($options as $option_name => $option_value) {
			if(isset($atts[$option_name])) {
				$options[$option_name] = $atts[$option_name];
			}
		}

		// dd($options);

		$schedule = new SCHED_SCHEDULE();
		$schedule->load($id);
		$schedule->set_db_options($options);

		// ([a-zA-Z]+)\s*=\s*\"([a-zA-Z0-9\s]+)\s*\"

		// $html = ' foo = "bar"  something = "else" ';
		// $html = '';
		
		// dd(count($matches) === 3 && count($matches[1]) === count($matches[2]));
		

		if(isset($atts['layout']) && $atts['layout'] == 'horizontal') {
			$schedule->set_layout('horizontal');
		}

		if(isset($atts['columns'])) {
			$schedule->set_shortcode_columns($atts['columns']);
		}

		if(isset($atts['filters'])) {
			$schedule->set_shortcode_filters($atts['filters']);
		}

		if($schedule->layout == 'default' || ($schedule->layout == 'horizontal' && !$this->addon_horizontal)) {
			return $schedule->render();
		}else if($schedule->layout == 'horizontal' && $this->addon_horizontal) {
			return $schedule->render_horizontal();
		}

		
	}

	function run_shortcode_timetable_current_events($atts, $content = null) {

		if(!isset($atts['ids'])) { return 'No timetable ids entered, enter the ids comma-seperated'; }

		$ids = explode(',', $atts['ids']);

		if(isset($atts['layout']) && $atts['layout'] == 'list_view') {
			$atts['column_break_width'] = 99999;
		}

		$options = SCHED_DB::$options;
		foreach($options as $option_name => $option_value) {
			if(isset($atts[$option_name])) {
				$options[$option_name] = $atts[$option_name];
			}
		}

		// $schedules_with_ids = SCHED_DB::get_schedules_on_date($ids, time());

		// return $schedules_with_ids;

		$current_day = current_time('Y-m-d');

		for($i = 0; $i < count($ids); $i++) {
			$id = (int)$ids[$i];

			$schedule = new SCHED_SCHEDULE();
			$schedule->load($id);
			$schedule->set_db_options($options);

			if($schedule->options['assign_dates_enabled'] !== 1) {
				continue;
			}

			$new_column_count = $schedule->set_accepted_date($current_day);

			if($new_column_count == 0) {
				continue;
			}

			return $schedule->render();

		}

	}

	function run_shortcode_timetable_upcoming($atts, $content = null) {
		if(!isset($atts['id'])) { return 'No timetable id entered.'; }

		$id = (int)$atts['id'];

		// if(isset($atts['advanced_options'])) {
		// 	preg_match_all("/([a-zA-Z0-9_]+)\s*=\s*[\"'`]+([\S\s]+?)\s*[\"'`]+/", $atts['advanced_options'], $matches);
		// 	if(count($matches) === 3 && count($matches[1]) === count($matches[2])) {
		// 		for($i = 0; $i < count($matches[1]); $i++) {
		// 			$atts[$matches[1][$i]] = $matches[2][$i];
		// 		}
		// 	}
		// }

		$options = SCHED_DB::$options;

		$options['title'] = '';

		foreach($options as $option_name => $option_value) {
			if(isset($atts[$option_name])) {
				$options[$option_name] = $atts[$option_name];
			}
		}

		$options['column_break_action'] = 'list';
		$options['column_break_width'] = 999999;
		$options['pdf_enable'] = 0;
		$options['popup_arrows'] = 0;

		// dd($options);

		$schedule = new SCHED_SCHEDULE();
		$schedule->load($id);
		$schedule->set_db_options($options);

		if(isset($atts['columns'])) {
			$schedule->set_shortcode_columns($atts['columns']);
		}

		if(isset($atts['filters'])) {
			$schedule->set_shortcode_filters($atts['filters']);
		}

		return $schedule->render_upcoming();
	}

	function vc_shortcodes() {
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			require_once(SCHED_DIR.'/lib/vc/vc_parameters.php');
			require_once(SCHED_DIR.'/lib/vc/vc_map.php');
		}		
	}

	function output_custom_css() {
		header("Content-type: text/css; charset: UTF-8");
		echo SCHED_DB::get_option('custom_css');
		exit();
	}

	function output_pdf() {
		$schedule_id = (isset($_GET['id']) ? (int)$_GET['id'] : 1);
		$pdf = new SCHED_PDF_EXPORT($schedule_id);
		$pdf->export();
		exit();
	}

	function output_pdf_view() {
		$schedule_id = (isset($_GET['id']) ? (int)$_GET['id'] : 1);
		$pdf = new SCHED_PDF_EXPORT($schedule_id);
		$pdf->export_view();
		exit();
	}

	function create_menu() {
		if(!current_user_can('manage_options')) {
			return;
		}
		// add_menu_page('Timetable', 'Timetable', 'manage_options', 'sched-schedule', array($this, 'admin_settings_page'), 'dashicons-schedule');
		add_menu_page('Timetable', 'Timetable', 'manage_options', 'sched-schedule', array($this, 'admin_settings_page'), plugins_url('img/icon.png', SCHED_FILE));
		add_submenu_page( 'sched-schedule', 'Settings', 'Settings', 'manage_options', 'sched-schedule', array($this, 'admin_settings_page') );
		add_submenu_page( 'sched-schedule', 'Timetables', 'Timetables', 'manage_options', 'sched-schedule-timetables', array($this, 'admin_timetables_page') );

	}

	function admin_settings_page() {
		include SCHED_DIR.'/lib/admin/admin.php';
	}

	function admin_timetables_page() {
		include SCHED_DIR.'/lib/admin/admin-timetables.php';
	}

	function enqueue_client_assets() {

		if($this->editor === false) {
			wp_enqueue_style('google-fonts-lato', '//fonts.googleapis.com/css?family=Lato:400,700');
			wp_enqueue_style('sched-style', plugins_url('css/schedule.css', SCHED_FILE));
			
			wp_enqueue_style('sched-icons', plugins_url('packages/icons/css/icons.min.css', SCHED_FILE));
			wp_register_script('ColorMix', plugins_url('packages/color-mix/colormix-2.0.0.js', SCHED_FILE));

			$dependencies = array('jquery', 'ColorMix');

			// dd($this->addon_horizontal);

			if($this->addon_horizontal) {
				wp_enqueue_style('tt-perfect-scrollbar', plugins_url('packages/perfect-scrollbar/perfect-scrollbar.css', SCHED_H_FILE));
				wp_register_script('tt-perfect-scrollbar', plugins_url('packages/perfect-scrollbar/perfect-scrollbar.js', SCHED_H_FILE), array('jquery', 'tt-mousewheel'));
				wp_register_script('tt-mousewheel', plugins_url('packages/perfect-scrollbar/jquery.mousewheel.js', SCHED_H_FILE), array('jquery'));
				array_push($dependencies, 'tt-perfect-scrollbar');
			}
			
			wp_enqueue_script('sched-script', plugins_url('js/schedule.js', SCHED_FILE), $dependencies);
		}
		if(SCHED_DB::get_option('custom_css') && SCHED_DB::get_option('custom_css') !== '') {
			wp_enqueue_style('sched-custom-css', admin_url('admin-ajax.php').'?action=sched_custom_css');
		}

	}

	function enqueue_admin_assets() {

		//wp_enqueue_script('jquery');
		$this->enqueue_style('font-awesome', 'packages/font-awesome-4.3.0/css/font-awesome.min.css');
		$this->enqueue_style('sched-admin-style', 'css/admin.css', array('dashicons'));

		// wp_tiny_mce();
		// wp_editor();

		wp_enqueue_style('google-fonts-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700');
		wp_enqueue_style('google-fonts-lato', 'http://fonts.googleapis.com/css?family=Lato:400,700');

		if(isset($_GET['page']) && ($_GET['page'] == 'sched-schedule')) {
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style('google-fonts-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700');
			wp_enqueue_style('google-fonts-lato', 'http://fonts.googleapis.com/css?family=Lato:400,700');
			
			wp_enqueue_script( 'sched-admin-script', plugins_url('js/admin.js', SCHED_FILE), array( 'wp-color-picker','jquery' ), false, false );
		}

		if($this->editor !== false) {
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style('thickbox');
			wp_enqueue_style('google-fonts-lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,700');
			wp_enqueue_style('sched-style', plugins_url('css/schedule.css', SCHED_FILE));
			wp_enqueue_style('sched-icons', plugins_url('packages/icons/css/icons.min.css', SCHED_FILE));
			//wp_enqueue_style('sched-custom-css', admin_url('admin-ajax.php').'?action=sched_custom_css');
			//wp_enqueue_style('sched-style-iris', plugins_url('packages/iris-color-picker/iris.css', SCHED_FILE));
			wp_enqueue_style('sched-jquery-timepicker', plugins_url('packages/jonthornton-jquery-timepicker/jquery.timepicker.css', SCHED_FILE));
			wp_enqueue_style('sched-style-fontawesome-iconpicker', plugins_url('packages/fontawesome-iconpicker-1.0.0/dist/css/fontawesome-iconpicker.min.css', SCHED_FILE));
			wp_enqueue_style('sched-style-editor', plugins_url('css/editor.css', SCHED_FILE));

			//wp_register_script('sched-color', plugins_url('packages/iris-color-picker/color.js', SCHED_FILE), array('jquery', 'jquery-ui-core'));
			//wp_register_script('sched-iris', plugins_url('packages/iris-color-picker/iris.js', SCHED_FILE), array('jquery', 'jquery-ui-core', 'sched-color'));
			wp_register_script('jquery-timepicker', plugins_url('packages/jonthornton-jquery-timepicker/jquery.timepicker.min.js', SCHED_FILE), array('jquery'));
			wp_register_script('fontawesome-iconpicker', plugins_url('packages/fontawesome-iconpicker-1.0.0/dist/js/fontawesome-iconpicker.js', SCHED_FILE), array('jquery'));
			
			wp_enqueue_script('post');
			if (user_can_richedit()) {
				wp_enqueue_script('editor');
			}
			//add_thickbox();
			wp_enqueue_script('word-count');

			wp_enqueue_media();

			wp_register_script('sched-editor', plugins_url('js/editor.js', SCHED_FILE), array('jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-timepicker', 'fontawesome-iconpicker'));
			wp_register_script('ColorMix', plugins_url('packages/color-mix/colormix-2.0.0.js', SCHED_FILE));

			wp_enqueue_script('sched-script', plugins_url('js/schedule.js', SCHED_FILE), array('jquery', 'sched-editor', 'ColorMix'));

		}

	}

	function enqueue_style($name, $url, $dependencies = false) {
		wp_register_style($name, plugins_url($url, SCHED_FILE ), $dependencies, false, 'screen');
		wp_enqueue_style($name);
	}

	function enqueue_script($name, $url, $local_url = true) {
		if($local_url) {
			$url = plugins_url( $url, SCHED_FILE );
		}
		wp_register_script($name, $url, false, false);
		wp_enqueue_script($name);
	}

	function save_changes() {
		if(empty($_POST['sched_nonce']) || !wp_verify_nonce($_POST['sched_nonce'], SCHED_BASE)) { return; }

		foreach(SCHED_DB::$options as $option_name => $option_value) {
			if(isset($_POST['sched_'.$option_name])) {
				SCHED_DB::set($option_name, stripslashes($_POST['sched_'.$option_name]), false);
			}
		}

		if(isset($_POST['sched_custom_css'])) {
			SCHED_DB::set_option('custom_css', stripslashes($_POST['sched_custom_css']));
		}
		
		SCHED_DB::update_options();
		$this->add_notification('Your changes have been saved.');

	}

	function create_schedule() {
		if(empty($_GET['sched_nonce_create_schedule']) || !wp_verify_nonce($_GET['sched_nonce_create_schedule'], SCHED_BASE)) { wp_die('Your sessions has expired. Try again.'); return; }
		SCHED_DB::create_schedule();
		wp_redirect(admin_url('admin.php?page=sched-schedule-timetables&tab=timetables&notification='.urlencode('The timetable has been created')));
		exit();
	}

	function reset_colors() {
		if(empty($_GET['sched_nonce_reset_colors']) || !wp_verify_nonce($_GET['sched_nonce_reset_colors'], SCHED_BASE)) { wp_die('Your sessions has expired. Try again.'); return; }
		SCHED_DB::reset_colors();
		wp_redirect(admin_url('admin.php?page=sched-schedule&tab=general&sched_message=colors_reset'));
		exit();
	}

	function reset_settings() {
		if(empty($_GET['sched_nonce_reset_settings']) || !wp_verify_nonce($_GET['sched_nonce_reset_settings'], SCHED_BASE)) { wp_die('Your sessions has expired. Try again.'); return; }
		SCHED_DB::reset_settings();
		wp_redirect(admin_url('admin.php?page=sched-schedule&tab=general&sched_message=settings_reset'));
		exit();
	}

	function import_timetable() {
		if(empty($_GET['sched_nonce_import']) || !wp_verify_nonce($_GET['sched_nonce_import'], SCHED_BASE)) { wp_die('Your sessions has expired. Try again.'); return; }
		// SCHED_DB::reset_settings();
		// wp_redirect(admin_url('admin.php?page=sched-schedule&tab=general&sched_message=settings_reset'));
		// exit();
		$import = SCHED_DB::handle_quotes($_POST['import']);
		SCHED_Export::import($import);
		wp_redirect(admin_url('admin.php?page=sched-schedule-timetables&tab=timetables&notification=The+timetable+has+been+imported'));
		exit();
		// dd($import);
	}

	function add_notification($text, $type = 'success') {
		$this->notifications[] = array(
			'text' => $text,
			'type' => $type,
		);
	}

	function print_notifications() {
		foreach($this->notifications as $notification) {
			if($notification['type'] == 'success') {
				echo '<div class="sched-a-notification sched-a-notification-success"><i class="fa fa-check"></i>'.$notification['text'].'</div>';
			}else if($notification['type'] == 'warning') {
				echo '<div class="sched-a-notification sched-a-notification-warning"><i class="fa fa-warning"></i>'.$notification['text'].'</div>';
			}
			
		}
	}

	function editor() {
		new SCHED_EDITOR();		
		die();
	}

}

