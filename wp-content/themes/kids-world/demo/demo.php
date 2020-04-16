<?php
/**
 * Version 0.0.2
 *
 * This file is just the example, do to require it directly. Instead copy it to your theme and modify by your own needs.
 */

class Kidsworld_Radium_Theme_Importer extends SWMSC_Radium_Theme_Importer {

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 0.0.1
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 0.0.2
	 *
	 * @var object
	 */
	public $widgets_file_name       = 'widgets-kidsworld.json';
	public $content_demo_file_name  = 'content-kidsworld.xml';
	public $content_demo_url  		= 'http://www.premiumthemes.in/demo-content/kidsworld/content-kidsworld.xml';
	public $widget_demo_url  		= 'http://www.premiumthemes.in/demo-content/kidsworld/widgets-kidsworld.json';

	/**
	 * Holds a copy of the widget settings
	 *
	 * @since 0.0.2
	 *
	 * @var object
	 */
	public $widget_import_results;

	/**
	 * Constructor. Hooks all interactions to initialize the class.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {

		$this->demo_files_path = dirname(__FILE__) . '/content/';

		self::$instance = $this;
		parent::__construct();

	}

	public function importDemoContents() {

		// Get content demo data xml file from the server
		$this->importSlider();
		$this->get_demo_content_data_files( $this->content_demo_url , $this->content_demo_file_name );
		$this->set_demo_data( $this->content_demo );

		$this->set_demo_menus();
		$this->set_front_static_front_page();
		$this->set_customizer_data();
		$this->update_customizer_options();

		// Get widgets demo data file from the server
		$this->get_demo_content_data_files( $this->widget_demo_url, $this->widgets_file_name );
		$this->process_widget_import_file( $this->widgets );

	}

	// CUSTOM FROM SOFTWEBMEDIA START

	public function set_demo_menus(){

		// Top Menu =============================

		//Delete  top menu if already exist
		$top_menu_name   = 'Demo: Top Navigation';
		$top_menu_exists = wp_get_nav_menu_object( $top_menu_name );

		if ( $top_menu_exists ) {
			wp_delete_nav_menu( $top_menu_name );
		}

		// Create new top menu
		$top_menu_id = wp_create_nav_menu( $top_menu_name );

		// Demo Top Menu

	    $parent_pages = wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-home"></i>Home',
			'menu-item-url'    => home_url( '/' ),
			'menu-item-status' => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Home Version 2',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1002,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Home Version 3',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1003,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Home Version 4',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1004,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Home Version 5',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1005,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    $parent_pages = wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-book"></i>Pages',
			'menu-item-object-id' => 1025,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	   	wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Classes',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1025,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Events',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1026,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'About Us',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1028,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'     =>  'Testimonials',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1029,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	   	wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  'Contact Us - 1',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1030,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  'Contact Us - 2',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1031,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  'Contact Us - 3',
			'menu-item-parent-id' => $parent_pages,
			'menu-item-object-id' => 1032,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-edit"></i>Blog',
			'menu-item-object-id' => 1051,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-magic"></i>Shortcodes',
			'menu-item-object-id' => 1061,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    wp_update_nav_menu_item( $top_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-photo"></i>Gallery',
			'menu-item-object-id' => 1125,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    // Events Menu =============================

	    // Delete  events menu if already exist
		$events_menu_name   = 'Demo : Events Page Horizontal Menu';
		$events_menu_exists = wp_get_nav_menu_object( $events_menu_name );

		if ( $events_menu_exists ) {
			wp_delete_nav_menu( $events_menu_name );
		}

		// Create new Events menu
		$events_menu_id = wp_create_nav_menu( $events_menu_name );

		// Demo Events Menu

	    $parent_pages = wp_update_nav_menu_item( $events_menu_id, 0, array(
			'menu-item-title'  =>  'Upcoming Events',
			'menu-item-object-id' => 1026,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    $parent_pages = wp_update_nav_menu_item( $events_menu_id, 0, array(
			'menu-item-title'  =>  'Past Events',
			'menu-item-object-id' => 1027,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));


	   	// Resources Menu =============================

	    // Delete  resources menu if already exist
		$resources_menu_name   = 'Demo: Useful Resources';
		$resources_menu_exists = wp_get_nav_menu_object( $resources_menu_name );

		if ( $resources_menu_exists ) {
			wp_delete_nav_menu( $resources_menu_name );
		}

		// Create new resources menu
		$resources_menu_id = wp_create_nav_menu( $resources_menu_name );

		// Demo resources Menu

	    $parent_pages = wp_update_nav_menu_item( $resources_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-send-o"></i>Foreign Policy',
			'menu-item-object-id' => '1030',
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    $parent_pages = wp_update_nav_menu_item( $resources_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-comments"></i>Health Care',
			'menu-item-object-id' => '1030',
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    $parent_pages = wp_update_nav_menu_item( $resources_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-star"></i>Immegration',
			'menu-item-object-id' => '1030',
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));

	    $parent_pages = wp_update_nav_menu_item( $resources_menu_id, 0, array(
			'menu-item-title'  =>  '<i class="fa fa-graduation-cap"></i>National Issues',
			'menu-item-object-id' => '1030',
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish'
	    ));


		// Assign menu to available locations
		$menu_locations = get_theme_mod( 'nav_menu_locations' );
		$menu_locations['primary'] = $top_menu_id;
		$menu_locations['events'] = $events_menu_id;

		set_theme_mod( 'nav_menu_locations', $menu_locations );
	}

	public function set_front_static_front_page() {

		$homepage = get_page_by_title( 'Home' );
		$blogpage = get_page_by_title( 'Blog' );

		if ( $homepage ) {
		    update_option( 'page_on_front', $homepage->ID );
		    update_option( 'show_on_front', 'page' );
		}

		if ( $blogpage ) {
		    update_option( 'page_for_posts', $blogpage->ID );
		}
	}

	public function set_customizer_data() {

		$customizer_json_file = KIDSWORLD_DEMO . 'content/customizer.json';
		$this->customizerJsonDecode( $customizer_json_file );

	}

	public function update_customizer_options() {

		$logoimg = KIDSWORLD_DEMO.'images/logo.png';
		$logoimg_retina = KIDSWORLD_DEMO.'images/logo-retina.png';
		$error404img = KIDSWORLD_DEMO.'images/error-404.png';
		$contactfooter_img = KIDSWORLD_DEMO.'images/school-sketch-elements-4.png';
		$footerimg = KIDSWORLD_DEMO.'images/school-sketch-elements-30.png';
		$subheader_img = KIDSWORLD_DEMO.'images/header-bg.jpg';

		update_option( 'kidsworld_logo_standard', $logoimg );
		update_option( 'kidsworld_logo_retina', $logoimg_retina );
		update_option( 'kidsworld_error_image', $error404img );
		update_option( 'kidsworld_cf_bg_img', $contactfooter_img );
		update_option( 'kidsworld_footer_bg_img', $footerimg );
		update_option( 'kidsworld_sub_header_bg_img', $subheader_img );

	}

	public function importSlider() {

		if (!class_exists('RevSliderSlider'))
		  	return false;

		if ( RevSliderSlider::isAliasExists( 'school-home' ) )
		  	return false;

		ob_start();

		try {
			$slider = new RevSliderSlider;
			$sliderfileurl = 'http://www.premiumthemes.in/demo-content/kidsworld/school-home.zip';
			$file = $this->tempDownload( $sliderfileurl );
			$slider->importSliderFromPost( true, true, $file );
		} catch (Exception $e) {
		  	return new WP_Error( 'kids-world', $e->getMessage() );
		}

		if ( file_exists( $file ) )
	  		unlink( $file );

		$this->debugMessage = ob_get_clean();

	}

	// CUSTOM FROM SOFTWEBMEDIA END

}

new Kidsworld_Radium_Theme_Importer;