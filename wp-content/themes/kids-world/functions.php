<?php
define('KIDSWORLD_DIRECTORY', get_template_directory_uri());

define('KIDSWORLD_TEMPLATE_DIR', get_template_directory());
define('KIDSWORLD_ADMIN', get_template_directory() . '/framework/');
define('KIDSWORLD_ADMIN_CSS', KIDSWORLD_DIRECTORY . '/framework/css/');
define('KIDSWORLD_PLUGINS', get_template_directory() . '/framework/plugins/');
define('KIDSWORLD_DEMO', get_template_directory_uri() . '/demo/');
define('KIDSWORLD_VISUAL_COMPOSER', get_template_directory_uri() . '/framework/plugins/visual-composer/');
define('KIDSWORLD_WOO', get_template_directory() . '/woocommerce/');

define('KIDSWORLD_THEME_DIR', get_template_directory_uri());
define('KIDSWORLD_THEME_CSS', KIDSWORLD_DIRECTORY . '/css');
define('KIDSWORLD_THEME_NAME', 'kidsworld');
define('KIDSWORLD_THEME_VERSION', '2.6.0');

define( 'KIDSWORLD_VISUAL_COMOPSER_IS_ACTIVE', defined( 'WPB_VC_VERSION' ) );
define( 'KIDSWORLD_WPML_IS_ACTIVE', defined( 'ICL_SITEPRESS_VERSION' ) );
define( 'KIDSWORLD_CONTACT_FORM_7_IS_ACTIVE', class_exists( 'WPCF7_ContactForm' ) );
define( 'KIDSWORLD_REVOLUTION_SLIDER_IS_ACTIVE', class_exists( 'RevSlider' ) );
define( 'KIDSWORLD_WOOCOMMERCE_IS_ACTIVE', class_exists( 'WC_API' ) );
define( 'KIDSWORLD_DEMO_IMPORTER_IS_ACTIVE', class_exists( 'SWMSC_Radium_Theme_Importer' ) );
define( 'KIDSWORLD_TIMETABLE_IS_ACTIVE', class_exists( 'SCHED' ) );

if ( ! function_exists( 'kidsworld_theme_custom_setup' ) ) {

	add_action( 'after_setup_theme', 'kidsworld_theme_custom_setup' );
	function kidsworld_theme_custom_setup(){

		do_action('kidsworld_theme_custom_setup');
		add_theme_support( 'title-tag' );

        add_action( 'wp_enqueue_scripts', 'kidsworld_load_scripts' );
        add_action( 'wp_enqueue_scripts', 'kidsworld_load_styles' );

		add_action( 'wp_ajax_nopriv_kidsworld_ajax_entries', 'kidsworld_ajax_entries');
		add_action( 'wp_ajax_kidsworld_ajax_entries', 'kidsworld_ajax_entries');

		add_filter( 'use_default_gallery_style', '__return_false' );
	}

}

if ( ! function_exists( 'kidsworld_theme_includes' ) ) {

	add_action('kidsworld_theme_custom_setup', 'kidsworld_theme_includes', 2);

    function kidsworld_theme_includes(){
		include_once (KIDSWORLD_ADMIN . 'menus.php');
		include_once (KIDSWORLD_ADMIN . 'post-like.php');
    	include_once (KIDSWORLD_ADMIN . 'customizer/customizer.php');
		include_once (KIDSWORLD_ADMIN . 'image-sizes.php');
		include_once (KIDSWORLD_ADMIN . 'breadcrumbs.php');

		/* ---> Theme's custom function files <------------------------ */

		require_once (KIDSWORLD_ADMIN . 'theme-functions.php');
		require_once (KIDSWORLD_ADMIN . 'theme-filters.php');

		/* ----------------------------------------------------- */

		include_once (KIDSWORLD_PLUGINS . 'tgm-plugin-activation/custom-plugin-activation.php');
		include_once (KIDSWORLD_ADMIN . 'register-widgets.php');
		include_once (KIDSWORLD_ADMIN . 'admin-functions.php');
		include_once (KIDSWORLD_ADMIN . 'meta-box-options.php');

		if ( KIDSWORLD_VISUAL_COMOPSER_IS_ACTIVE ) {
			include_once (KIDSWORLD_PLUGINS . 'visual-composer/visual-composer-options.php');
		}

		if ( KIDSWORLD_REVOLUTION_SLIDER_IS_ACTIVE ) {
			include_once (KIDSWORLD_PLUGINS . 'revolution-slider/revolution-slider.php');
		}

		if ( KIDSWORLD_DEMO_IMPORTER_IS_ACTIVE ) {
			require_once (KIDSWORLD_TEMPLATE_DIR . '/demo/demo.php');
		}

		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {

			add_theme_support( 'woocommerce' );
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );

			include_once (KIDSWORLD_WOO . 'kidsworld-custom/woo-admin-options.php');
			include_once (KIDSWORLD_WOO . 'kidsworld-custom/woo-functions.php');

			//remove woocommerce libhtbox scripts and styles
			add_action( 'admin_enqueue_scripts', 'kidsworld_deregister_woo_scripts', 100 );
			if(!function_exists('kidsworld_deregister_woo_scripts')) {
				function kidsworld_deregister_woo_scripts() {
					wp_dequeue_script( 'prettyPhoto' );
					wp_dequeue_script( 'prettyPhoto-init' );
				}
			}
			add_action( 'admin_enqueue_scripts', 'kidsworld_deregister_woo_styles', 100 );
			if(!function_exists('kidsworld_deregister_woo_styles')) {
				function kidsworld_deregister_woo_styles() {
					wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
				}
			}
		}

    }
}


if ( ! function_exists( 'kidsworld_load_styles' ) ) {
    function kidsworld_load_styles(){

			if ( kidsworld_get_option( 'kidsworld_google_fonts_on', 'on' ) == 'on' ) {

			    $kidsworld_final_google_body_font     	= kidsworld_google_fonts_query( kidsworld_get_option( 'kidsworld_body_font_family', 'Dosis' ) );
			    $kidsworld_final_google_body_font_weight	= kidsworld_google_fonts_final_weight( kidsworld_get_option( 'kidsworld_body_font_weight', '500' ) );

			    $kidsworld_final_google_headings_font		= kidsworld_google_fonts_query( kidsworld_get_option( 'kidsworld_headings_font_family', 'Dosis' ) );
			    $kidsworld_headings_fonts_with_style		= kidsworld_get_option( 'kidsworld_headings_font_weight', '500' );

			    $kidsworld_final_google_nav_font			= kidsworld_google_fonts_query( kidsworld_get_option( 'kidsworld_nav_font_family', 'Dosis' ) );
			    $kidsworld_nav_fonts_with_style			= kidsworld_get_option( 'kidsworld_nav_font_weight', '700' );

			    $kidsworld_google_font_subsets            = 'latin,latin-ext';

			    if ( kidsworld_get_option( 'kidsworld_google_fonts_subset_on', 'off' ) == 'on' ) {
					if ( kidsworld_get_option( 'kidsworld_google_font_subset_cyrillic', 'off' ) == 'on' ) { $kidsworld_google_font_subsets .= ',cyrillic,cyrillic-ext'; }
					if ( kidsworld_get_option( 'kidsworld_google_font_subset_greek', 'off' ) == 'on' ) { $kidsworld_google_font_subsets .= ',greek,greek-ext'; }
					if ( kidsworld_get_option( 'kidsworld_google_font_subset_vietnamese', 'off' ) == 'on' ) { $kidsworld_google_font_subsets .= ',vietnamese'; }
			    }

			    $kidsworld_custom_font_args = array(
			      'family' => $kidsworld_final_google_body_font . ':' . $kidsworld_final_google_body_font_weight . ',' . $kidsworld_final_google_body_font_weight . 'italic,700,700italic|' . $kidsworld_final_google_nav_font . ':' . $kidsworld_nav_fonts_with_style . '|' . $kidsworld_final_google_headings_font . ':' . $kidsworld_headings_fonts_with_style,
			      'subset' => $kidsworld_google_font_subsets
			    );

			    $standard_font_args = array(
			      'family' => 'Lato:' . $kidsworld_final_google_body_font_weight . ',' . $kidsworld_final_google_body_font_weight . 'italic,' . $kidsworld_nav_fonts_with_style . ',' . $kidsworld_headings_fonts_with_style . ',700,700italic',
			      'subset' => $kidsworld_google_font_subsets
			    );

			    $kidsworld_get_custom_font_family   = add_query_arg( $kidsworld_custom_font_args,   '//fonts.googleapis.com/css' );

				wp_enqueue_style( 'kidsworld-google-fonts', $kidsworld_get_custom_font_family, NULL, KIDSWORLD_THEME_VERSION, 'all' );

		    }

		    // Google Fonts End
			wp_enqueue_style( 'font-icons', KIDSWORLD_THEME_DIR . '/fonts/font-awesome.css', '', KIDSWORLD_THEME_VERSION );
			wp_enqueue_style( 'kidsworld-global', KIDSWORLD_THEME_CSS . '/global.css', '', KIDSWORLD_THEME_VERSION );
			wp_enqueue_style( 'kidsworld-main', KIDSWORLD_THEME_DIR . '/style.css', '', KIDSWORLD_THEME_VERSION);
			wp_enqueue_style( 'kidsworld-layout', KIDSWORLD_THEME_CSS . '/layout.css', '', KIDSWORLD_THEME_VERSION );
			wp_enqueue_style( 'kidsworld-styling', KIDSWORLD_THEME_DIR . '/styling.css', '', KIDSWORLD_THEME_VERSION);

			if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
				wp_enqueue_style( 'kidsworld-woocommerce', KIDSWORLD_THEME_DIR . '/woocommerce/kidsworld-custom/kidsworld-woocommerce.css', '', KIDSWORLD_THEME_VERSION);
			}

			wp_enqueue_style( 'kidsworld-responsive', KIDSWORLD_THEME_CSS . '/responsive.css', '', KIDSWORLD_THEME_VERSION );
			wp_enqueue_style( 'kidsworld-custom', KIDSWORLD_THEME_DIR . '/custom.css', '', KIDSWORLD_THEME_VERSION );

    }
}

if ( ! function_exists( 'kidsworld_load_scripts' ) ) {
    function kidsworld_load_scripts(){
    	if (!is_admin()) {

    		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
				wp_enqueue_script('kidsworld-woo-custom', KIDSWORLD_THEME_DIR . '/woocommerce/kidsworld-custom/js/custom.js', array( 'jquery' ),KIDSWORLD_THEME_VERSION, TRUE );
			}

			wp_enqueue_script( 'kidsworld-theme-plugins', KIDSWORLD_THEME_DIR . '/assets/js/plugins.js', array( 'jquery','jquery-effects-core','jquery-effects-blind' ),KIDSWORLD_THEME_VERSION, TRUE );
			kidsworld_scripts_config();
			wp_enqueue_script( 'kidsworld-theme-settings', KIDSWORLD_THEME_DIR . '/assets/js/theme-settings.js', array( 'jquery' ),KIDSWORLD_THEME_VERSION, TRUE );
			wp_enqueue_script( 'kidsworld-header-settings', KIDSWORLD_THEME_DIR . '/assets/js/header.js', array( 'jquery' ),KIDSWORLD_THEME_VERSION, TRUE );
			wp_enqueue_script( 'kidsworld-menus' );
		}
    }
}

/* **************************************************************************************
	Register Javascripts and CSS Files for Admin
************************************************************************************** */

if (!function_exists('kidsworld_admin_scripts')) {
  function kidsworld_admin_scripts() {
    wp_enqueue_script('kidsworld-admin-javascripts', get_template_directory_uri() . '/framework/js/admin-javascripts.js', array('jquery','jquery-ui-slider','jquery-ui-sortable'));
    wp_enqueue_style('nav-menu');
    wp_enqueue_style( 'kidsworld-admin-global', KIDSWORLD_ADMIN_CSS . 'admin-global.css', '', KIDSWORLD_THEME_VERSION );

    if ( KIDSWORLD_VISUAL_COMOPSER_IS_ACTIVE ) {
		wp_enqueue_style( 'kidsworld-visual-composer', KIDSWORLD_VISUAL_COMPOSER . 'visual-composer.css', '', KIDSWORLD_THEME_VERSION );
	}

  }
}

add_action('admin_enqueue_scripts', 'kidsworld_admin_scripts',1000);