<?php

/**
 * Class SWMSC_Radium_Theme_Importer
 *
 * This class provides the capability to import demo content as well as import widgets and WordPress menus
 *
 * @since 2.2.0
 *
 * @category RadiumFramework
 * @package  NewsCore WP
 * @author   Franklin M Gitonga
 * @link     http://radiumthemes.com/
 *
 */
class SWMSC_Radium_Theme_Importer {

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $widgets;

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $content_demo;

	/**
	 * Flag imported to prevent duplicates
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $flag_as_imported = array();

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Constructor. Hooks all interactions to initialize the class.
	 *
	 * @since 2.2.0
	 */

	public function __construct() {

		self::$instance = $this;

		$this->widgets = $this->demo_files_path . $this->widgets_file_name;
		$this->content_demo = $this->demo_files_path . $this->content_demo_file_name;

		add_action( 'admin_menu', array($this, 'add_admin') );

	}

	/**
	 * Add Panel Page
	 *
	 * @since 2.2.0
	 */
	public function add_admin() {

   add_submenu_page( 'setup-options-home', esc_html__('Import Demo Data','pre-school-shortcodes'), esc_html__('Import Demo Data','pre-school-shortcodes'), 'edit_theme_options','radium_demo_installer', array($this, 'demo_installer') );
	}

	/**
	 * [demo_installer description]
	 *
	 * @since 2.2.0
	 *
	 * @return [type] [description]
	 */
	public function demo_installer() {
		?>


		<div class="setup_options_container">
			<div class="setup_options_content">
				<div class="box_import_export_reset leftaligntext">
							
					<h2 class="center">Import Demo Data</h2>
					<p>Importing demo data (post, pages, images, customizer settings, home page revolution slider, sidebar and footer widgets...) is the easiest way to setup your theme. It will allow you to quickly edit everything instead of creating content from scratch. When you import the data following things will happen:</p>

					<ul>
						<li>No existing posts, pages, categories, images, custom post types will be deleted or modified .</li>
						<li>If you have done any custom changes in Customizer then take backup from Admin > Setup Optins > Export Options because demo Customizer settings will be replaced with current settings. </li>
						<li>No WordPress settings will be modified .</li>
						<li>Posts, pages, some images, revolution slider, some widgets and menus will get imported .</li>
						<li>Images will be downloaded from our server, <strong>these images are copyrighted and are for demo use only</strong> .</li>
						<li>Please click import only once and wait, it can take a couple of minutes.</li>
						<li>It is advised to use this demo importer on a <strong>fresh Wordpress installation</strong>. <br/>If you are importing demo content with old content then you have to set menu "Page" items as per new page ids from Admin > Appearance > Menus > Select "Top Navigation" > Drag and Drop Pages like Classes, Testimonials, Events, Contact Us, About Us etc. to fix old content id conflict with new installed demo pages id. </li>
					</ul>						

					<p class="special_note center"><strong>Note:</strong> Before you begin, make sure all the required plugins are activated.</p>
					<form method="post" class="js-one-click-import-form">
						<input type="hidden" name="demononce" value="<?php echo wp_create_nonce('radium-demo-code'); ?>" />
						<p class="submit"><input name="reset" class="button" type="submit" value="Import Demo Data" /></p>
						<input type="hidden" name="action" value="demo-data" />
					</form>

					<script>
						jQuery( function ( $ ) {
							'use strict';
							$( '.js-one-click-import-form' ).on( 'submit', function () {
								$( this ).append( '<div class="center"><p style="font-width: bold; font-size: 1.5em;"><span class="spinner" style="display: inline-block; float: none; visibility: visible;"></span> Importing now, please wait!</p></div>' );
								$( this ).find( '.panel-save' ).attr( 'disabled', true );
							} );
						} );
					</script>

				

					<?php

					$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

					if( 'demo-data' == $action && check_admin_referer('radium-demo-code' , 'demononce')){

						$this->importDemoContents();

					} ?>

				</div>
			</div>
		</div>

		<?php

	}


	public function importDemoContents() {

		// Get content demo data xml file from the server
		$this->get_demo_content_data_files( $this->content_demo_url , $this->content_demo_file_name );
		$this->set_demo_data( $this->content_demo );			

		// CUSTOM FROM SOFTWEBMEDIA START
		$this->set_demo_menus();
		$this->set_front_static_front_page();
		$this->set_customizer_data();
		$this->update_customizer_options();
		$this->importSlider();
		// CUSTOM FROM SOFTWEBMEDIA END

		// Get widgets demo data file from the server
		$this->get_demo_content_data_files( $this->widget_demo_url, $this->widgets_file_name );
		$this->process_widget_import_file( $this->widgets );

	}

	/**
	 * get_demo_content_data_files Get demo data file defined in $file
	 * from the server and save it in the uploads directory
	 * @param  string $file File name of the file to fetch from the server
	 *
	 * @return null
	 */
	public function get_demo_content_data_files( $url, $file ) {
		// Test if the URL to the file is defined
		if ( empty( $url ) ) {
			wp_die( printf( wp_kses_post( __( '<div class="error"><p>An error occurred! URL for <strong>%s</strong> is not defined!</p><p>Please try to manually import the demo data. Here are instructions on how to do that: <a href="%s" target="_blank">Documentation: Import XML File</a></p></div>', 'pre-school-shortcodes' ) ), $file, apply_filters( 'wpoci_docs_url', 'https://www.proteusthemes.com/docs/cargopress-pt/#import-xml-file' ) ) );
		}

		// Get file contents from the server
		$response = wp_remote_get( $url );
		if ( ! is_wp_error( $response ) && 200 === $response['response']['code'] ) {
			$response_body = wp_remote_retrieve_body( $response );
		}
		else {
			wp_die( printf( wp_kses_post( __( '<div class="error"><p>An error occurred while fetching <strong>%s</strong> from the server!</p><p>Reason: %s - %s</p><p>Please try to manually import the demo data. Here are instructions on how to do that: <a href="%s" target="_blank">Documentation: Import XML File</a></p></div>', 'pre-school-shortcodes' ) ), $file, $response->get_error_code(), $response->get_error_message(), apply_filters( 'wpoci_docs_url', 'https://www.proteusthemes.com/docs/cargopress-pt/#import-xml-file' ) ) );
		}

		// Get user credentials for WP filesystem API
		$demo_import_page_url = wp_nonce_url( 'admin.php?page=radium_demo_installer', 'radium_demo_installer' );
		if ( false === ( $creds = request_filesystem_credentials( $demo_import_page_url, '', false, false, null ) ) ) {
			return true;
		}

		// Now we have credentials, try to get the wp_filesystem running
		if ( ! WP_Filesystem( $creds ) ) {
			// Our credentials were no good, ask the user for them again
			request_filesystem_credentials( $demo_import_page_url, '', true, false, null );
			return true;
		}

		// Setup filename path to save the content from
		$filename = $this->demo_files_path . $file;

		// By this point, the $wp_filesystem global should be working, so let's use it to create a file
		global $wp_filesystem;
		if ( ! $wp_filesystem->put_contents( $filename, $response_body, FS_CHMOD_FILE ) ) {
			wp_die( printf( wp_kses_post( __( '<div class="error"><p>An error occurred while writing file <strong>%s</strong> to the upload directory!</p><p>Please try to manually import the demo data. Here are instructions on how to do that: <a href="%s" target="_blank">Documentation: Import XML File</a></p></div>', 'pre-school-shortcodes' ) ), $file, apply_filters( 'wpoci_docs_url', 'https://www.proteusthemes.com/docs/cargopress-pt/#import-xml-file' ) ) );
		}
	}

	/**
	 * add_widget_to_sidebar Import sidebars
	 * @param  string $sidebar_slug    Sidebar slug to add widget
	 * @param  string $widget_slug     Widget slug
	 * @param  string $count_mod       position in sidebar
	 * @param  array  $widget_settings widget settings
	 *
	 * @since 2.2.0
	 *
	 * @return null
	 */
	public function add_widget_to_sidebar($sidebar_slug, $widget_slug, $count_mod, $widget_settings = array()){

		$sidebars_widgets = get_option('sidebars_widgets');

		if(!isset($sidebars_widgets[$sidebar_slug]))
		   $sidebars_widgets[$sidebar_slug] = array('_multiwidget' => 1);

		$newWidget = get_option('widget_'.$widget_slug);

		if(!is_array($newWidget))
			$newWidget = array();

		$count = count($newWidget)+1+$count_mod;
		$sidebars_widgets[$sidebar_slug][] = $widget_slug.'-'.$count;

		$newWidget[$count] = $widget_settings;

		update_option('sidebars_widgets', $sidebars_widgets);
		update_option('widget_'.$widget_slug, $newWidget);

	}

	public function set_demo_data( $file ) {

		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

		require_once( ABSPATH . 'wp-admin/includes/import.php' );

		$importer_error = false;

		if ( !class_exists( 'WP_Importer' ) ) {

			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';

			if ( file_exists( $class_wp_importer ) ){
				require_once($class_wp_importer);
			} else {
				$importer_error = true;
			}

		}

		if ( !class_exists( 'WP_Import' ) ) {

			$class_wp_import = dirname( __FILE__ ) .'/importer/wordpress-importer.php';

			if ( file_exists( $class_wp_import ) )
				require_once($class_wp_import);
			else
				$importer_error = true;
		}

		if($importer_error){
			die("Error on import");
		} else {
			if(!is_file( $file )){
				echo "The XML file containing the dummy content is not available or could not be read .. You might want to try to set the file permission to chmod 755.<br/>If this doesn't work please use the Wordpress importer and import the XML file (should be located in your download .zip: Sample Content folder) manually ";
			} else {
			   $wp_import = new WP_Import();
			   $wp_import->fetch_attachments = true;
			   $wp_import->import( $file );
			}
		}
	}

	public function set_demo_menus() {}

	// CUSTOM FROM SOFTWEBMEDIA START

	public function set_front_static_front_page() {}
	public function set_customizer_data() {}
	
	public function importSlider() {}
	public function debugMessage() {
	    return $this->debugMessage;
	}

	// CUSTOM FROM SOFTWEBMEDIA END

	public function customizerJsonDecode( $url ) {

		// Demo data
		$customizer_json_file = $url;
		$request = file_get_contents($customizer_json_file);
		$data = json_decode( $request, true );
		$customizer_settings = $data['swmcs'];		

		foreach ( $customizer_settings as $key => $value ) {
			update_option( $key, $value );
		}

	}

	public function update_customizer_options() {}

	public function tempDownload( $url ) {

		$dir = wp_upload_dir();
		$temp = trailingslashit( $dir['basedir'] )  . basename( $url );
		file_put_contents( $temp, file_get_contents($url) );
		return $temp;

	}

	/**
	 * Available widgets
	 *
	 * Gather site's widgets into array with ID base, name, etc.
	 * Used by export and import functions.
	 *
	 * @since 2.2.0
	 *
	 * @global array $wp_registered_widget_updates
	 * @return array Widget information
	 */
	function available_widgets() {

		global $wp_registered_widget_controls;

		$widget_controls = $wp_registered_widget_controls;

		$available_widgets = array();

		foreach ( $widget_controls as $widget ) {

			if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes

				$available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
				$available_widgets[$widget['id_base']]['name'] = $widget['name'];

			}

		}

		return apply_filters( 'radium_theme_import_widget_available_widgets', $available_widgets );

	}


	/**
	 * Process import file
	 *
	 * This parses a file and triggers importation of its widgets.
	 *
	 * @since 2.2.0
	 *
	 * @param string $file Path to .wie file uploaded
	 * @global string $widget_import_results
	 */
	function process_widget_import_file( $file ) {

	    // CUSTOM FROM SOFTWEBMEDIA START

	    global $wp_registered_sidebars;
	    $widgets = get_option('sidebars_widgets');
	    foreach ($wp_registered_sidebars as $sidebar => $value) {
	        unset($widgets[$sidebar]);
	    }
	    update_option('sidebars_widgets',$widgets);

	    // CUSTOM FROM SOFTWEBMEDIA END


		// File exists?
		if ( ! file_exists( $file ) ) {
			wp_die(
				esc_html__( 'Widget Import file could not be found. Please try again.', 'pre-school-shortcodes' ),
				'',
				array( 'back_link' => true )
			);
		}

		// Get file contents and decode
		global $wp_filesystem;
		$data = $wp_filesystem->get_contents( $file );
		$data = json_decode( $data );

		// Delete import file
		//unlink( $file );

		// Import the widget data
		// Make results available for display on import/export page
		$this->widget_import_results = $this->import_widgets( $data );

	}


	/**
	 * Import widget JSON data
	 *
	 * @since 2.2.0
	 * @global array $wp_registered_sidebars
	 * @param object $data JSON widget data from .wie file
	 * @return array Results array
	 */
	public function import_widgets( $data ) {

		global $wp_registered_sidebars;

		// Have valid data?
		// If no data or could not decode
		if ( empty( $data ) || ! is_object( $data ) ) {
			wp_die(
				esc_html__( 'Widget import data could not be read. Please try a different file.', 'pre-school-shortcodes' ),
				'',
				array( 'back_link' => true )
			);
		}

		// Hook before import
		$data = apply_filters( 'radium_theme_import_widget_data', $data );

		// Get all available widgets site supports
		$available_widgets = $this->available_widgets();

		// Get all existing widget instances
		$widget_instances = array();
		foreach ( $available_widgets as $widget_data ) {
			$widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
		}

		// Begin results
		$results = array();

		// Loop import data's sidebars
		foreach ( $data as $sidebar_id => $widgets ) {

			// Skip inactive widgets
			// (should not be in export file)
			if ( 'wp_inactive_widgets' == $sidebar_id ) {
				continue;
			}

			// Check if sidebar is available on this site
			// Otherwise add widgets to inactive, and say so
			if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
				$sidebar_available = true;
				$use_sidebar_id = $sidebar_id;
				$sidebar_message_type = 'success';
				$sidebar_message = '';
			} else {
				$sidebar_available = false;
				$use_sidebar_id = 'wp_inactive_widgets'; // add to inactive if sidebar does not exist in theme
				$sidebar_message_type = 'error';
				$sidebar_message = esc_html__( 'Sidebar does not exist in theme (using Inactive)', 'pre-school-shortcodes' );
			}

			// Result for sidebar
			$results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
			$results[$sidebar_id]['message_type'] = $sidebar_message_type;
			$results[$sidebar_id]['message'] = $sidebar_message;
			$results[$sidebar_id]['widgets'] = array();

			// Loop widgets
			foreach ( $widgets as $widget_instance_id => $widget ) {

				$fail = false;

				// Get id_base (remove -# from end) and instance ID number
				$id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
				$instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );

				// Does site support this widget?
				if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
					$fail = true;
					$widget_message_type = 'error';
					$widget_message = esc_html__( 'Site does not support widget', 'pre-school-shortcodes' ); // explain why widget not imported
				}

				// Filter to modify settings before import
				// Do before identical check because changes may make it identical to end result (such as URL replacements)
				$widget = apply_filters( 'radium_theme_import_widget_settings', $widget );

				// Does widget with identical settings already exist in same sidebar?
				if ( ! $fail && isset( $widget_instances[$id_base] ) ) {

					// Get existing widgets in this sidebar
					$sidebars_widgets = get_option( 'sidebars_widgets' );
					$sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array(); // check Inactive if that's where will go

					// Loop widgets with ID base
					$single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
					foreach ( $single_widget_instances as $check_id => $check_widget ) {

						// Is widget in same sidebar and has identical settings?
						if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {

							$fail = true;
							$widget_message_type = 'warning';
							$widget_message = esc_html__( 'Widget already exists', 'pre-school-shortcodes' ); // explain why widget not imported

							break;

						}

					}

				}

				// No failure
				if ( ! $fail ) {

					// Add widget instance
					$single_widget_instances = get_option( 'widget_' . $id_base ); // all instances for that widget ID base, get fresh every time
					$single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 ); // start fresh if have to
					$single_widget_instances[] = (array) $widget; // add it

						// Get the key it was given
						end( $single_widget_instances );
						$new_instance_id_number = key( $single_widget_instances );

						// If key is 0, make it 1
						// When 0, an issue can occur where adding a widget causes data from other widget to load, and the widget doesn't stick (reload wipes it)
						if ( '0' === strval( $new_instance_id_number ) ) {
							$new_instance_id_number = 1;
							$single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
							unset( $single_widget_instances[0] );
						}

						// Move _multiwidget to end of array for uniformity
						if ( isset( $single_widget_instances['_multiwidget'] ) ) {
							$multiwidget = $single_widget_instances['_multiwidget'];
							unset( $single_widget_instances['_multiwidget'] );
							$single_widget_instances['_multiwidget'] = $multiwidget;
						}

						// Update option with new widget
						update_option( 'widget_' . $id_base, $single_widget_instances );

					// Assign widget instance to sidebar
					$sidebars_widgets = get_option( 'sidebars_widgets' ); // which sidebars have which widgets, get fresh every time
					$new_instance_id = $id_base . '-' . $new_instance_id_number; // use ID number from new widget instance
					$sidebars_widgets[$use_sidebar_id][] = $new_instance_id; // add new instance to sidebar
					update_option( 'sidebars_widgets', $sidebars_widgets ); // save the amended data

					// Success message
					if ( $sidebar_available ) {
						$widget_message_type = 'success';
						$widget_message = esc_html__( 'Imported', 'pre-school-shortcodes' );
					} else {
						$widget_message_type = 'warning';
						$widget_message = esc_html__( 'Imported to Inactive', 'pre-school-shortcodes' );
					}

				}

				// Result for widget instance
				$results[$sidebar_id]['widgets'][$widget_instance_id]['name'] = isset( $available_widgets[$id_base]['name'] ) ? $available_widgets[$id_base]['name'] : $id_base; // widget name or ID if name not available (not supported by site)
				$results[$sidebar_id]['widgets'][$widget_instance_id]['title'] = ! empty( $widget->title ) ? $widget->title : esc_html__( 'No Title', 'pre-school-shortcodes' ); // show "No Title" if widget instance is untitled
				$results[$sidebar_id]['widgets'][$widget_instance_id]['message_type'] = $widget_message_type;
				$results[$sidebar_id]['widgets'][$widget_instance_id]['message'] = $widget_message;

			}

		}

		// Hook after import
		do_action( 'radium_theme_import_widget_after_import' );

		// Return results
		return apply_filters( 'radium_theme_import_widget_results', $results );

	}

}