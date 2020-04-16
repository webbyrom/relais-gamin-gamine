<?php
/*
Plugin Name: Pre School Shortcodes
Plugin URI: http://themeforest.net/user/Softwebmedia
Description: Create content with Shortcodes
Version: 2.31
Author: SoftWebMedia
Author URI: http://themeforest.net/user/Softwebmedia
Text Domain: pre-school-shortcodes
Domain Path: /languages/
*/
class SWMShortcodes {

    function __construct()
    {
    	define('SWMSC_PLUGIN_URL', plugin_dir_url( __FILE__ ));
    	define('SWMSC_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
    	define('SWMSC_TINYMCE_URI', plugin_dir_url( __FILE__ ) .'shortcodes/tinymce');
		define('SWMSC_TINYMCE_DIR', plugin_dir_path( __FILE__ ) .'shortcodes/tinymce');
		define('SWMSC_WIDGET_DIR', plugin_dir_path( __FILE__ ) .'/widgets/');
		define('SWMSC_POST_TYPE_DIR', plugin_dir_path( __FILE__ ) .'/post-types/');
		define('SWMSC_PLUGIN_VERSION', '2.31');
		define('SWMSC_PLUGIN_NAME', 'Pre School Shortcodes');

    	require_once( SWMSC_PLUGIN_DIR .'/functions/custom-functions.php' );

    	require_once( SWMSC_POST_TYPE_DIR .'register-post-type.php' );
		require_once( SWMSC_POST_TYPE_DIR .'register-taxonomy.php' );
		require_once( SWMSC_POST_TYPE_DIR .'display-column.php' );

    	require_once( SWMSC_PLUGIN_DIR .'/post-types/metaboxes.php' );

    	require_once (SWMSC_WIDGET_DIR . 'flickr.php');
		require_once (SWMSC_WIDGET_DIR . 'instagram.php');
		require_once (SWMSC_WIDGET_DIR . 'category.php');
		require_once (SWMSC_WIDGET_DIR . 'recent-photos.php');
		require_once (SWMSC_WIDGET_DIR . 'recent-posts.php');
		require_once (SWMSC_WIDGET_DIR . 'recent-posts-large.php');
		require_once (SWMSC_WIDGET_DIR . 'video.php');
		require_once (SWMSC_WIDGET_DIR . 'tabs.php');
		require_once (SWMSC_WIDGET_DIR . 'advertise.php');
		require_once (SWMSC_WIDGET_DIR . 'advertise-large.php');
		require_once (SWMSC_WIDGET_DIR . 'social.php');
		require_once (SWMSC_WIDGET_DIR . 'facebook.php');

    	require_once (SWMSC_PLUGIN_DIR . '/setup-options/setup-options.php');
    	require_once (SWMSC_PLUGIN_DIR . '/sidebars/sidebars.php');

    	if (function_exists('rwmb_meta')) {
    		require_once( SWMSC_PLUGIN_DIR .'/shortcodes/shortcodes.php' );
    	}

    	require_once( SWMSC_PLUGIN_DIR .'/setup-options/demo/demo-importer.php' );

    	require_once (SWMSC_PLUGIN_DIR . '/sidebars/sidebars.php');

        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));

	}



	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{

		function swmsc_school_fronend_scripts_styles() {

			if( ! is_admin() ) {

				//css
				wp_enqueue_style( 'school-shortcodes', SWMSC_PLUGIN_URL . 'css/school-shortcodes.css', '', SWMSC_PLUGIN_VERSION );
				wp_enqueue_style( 'shortcodes-styling', SWMSC_PLUGIN_URL . 'css/shortcodes-styling.css', '', SWMSC_PLUGIN_VERSION );

				//javascripts
				wp_enqueue_script('shortcodes-plugins',  SWMSC_PLUGIN_URL . 'js/shortcodes-plugins.js',array( 'jquery','jquery-effects-fade','jquery-ui-widget','jquery-ui-accordion' ),SWMSC_PLUGIN_VERSION, TRUE);
				wp_enqueue_script('custom-scripts',  SWMSC_PLUGIN_URL . 'js/custom-scripts.js',array( 'jquery'),SWMSC_PLUGIN_VERSION, TRUE);
			}
		}

		add_action('wp_enqueue_scripts', 'swmsc_school_fronend_scripts_styles');
	    load_plugin_textdomain( 'pre-school-shortcodes', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;

		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
		}
	}

	// --------------------------------------------------------------------------

	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		$plugin_array['swmShortcodes'] = SWMSC_TINYMCE_URI . '/plugin.js';

		return $plugin_array;
	}

	// --------------------------------------------------------------------------

	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'swmsc_button' );
		return $buttons;
	}

	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */

	function admin_init() {

		function swmsc_school_backend_scripts_styles() {

			// css
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_style( 'font-awesome', SWMSC_PLUGIN_URL . 'fonts/font-awesome.css', '', SWMSC_PLUGIN_VERSION );
			wp_enqueue_style( 'popup', SWMSC_TINYMCE_URI . '/css/popup.css', false, SWMSC_PLUGIN_VERSION, 'all' );
			wp_enqueue_style( 'custom-admin', SWMSC_PLUGIN_URL . 'css/custom-admin.css' );
			wp_enqueue_style( 'wp-color-picker' );

			// js
			wp_enqueue_script( 'plugins', SWMSC_TINYMCE_URI . '/js/plugins.js', array( 'jquery','jquery-ui-sortable'), SWMSC_PLUGIN_VERSION, false );
			wp_enqueue_script( 'popup', SWMSC_TINYMCE_URI . '/js/popup.js', array( 'jquery'), SWMSC_PLUGIN_VERSION, false );
			wp_enqueue_script( 'admin-javascripts', SWMSC_PLUGIN_URL . 'js/admin-javascripts.js', array( 'jquery'), SWMSC_PLUGIN_VERSION, false );
		}

		add_action('admin_enqueue_scripts', 'swmsc_school_backend_scripts_styles');

		wp_localize_script( 'jquery', 'SWMShortcodes', array('plugin_folder' => WP_PLUGIN_URL .'/school-shortcodes') );
	}

}
$swmsc_shortcodes = new SWMShortcodes();
?>