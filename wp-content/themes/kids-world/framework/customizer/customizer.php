<?php

/* ************************************************************************************** 
	Remove Default Sections
************************************************************************************** */

function kidsworld_remove_customizer_sections( $wp_customize ) {
  $wp_customize->remove_section( 'colors' );
  $wp_customize->remove_section( 'background_image' );
}

add_action( 'customize_register', 'kidsworld_remove_customizer_sections' );

/* ************************************************************************************** 
	Include Customizer Custom options, settings etc. files
************************************************************************************** */

require_once( KIDSWORLD_ADMIN . 'customizer/controls.php' );
require_once( KIDSWORLD_ADMIN . 'customizer/fonts.php' );
require_once( KIDSWORLD_ADMIN . 'customizer/theme-options.php' );
require_once( KIDSWORLD_ADMIN . 'customizer/output-css.php' );
require_once( KIDSWORLD_ADMIN . 'customizer/translations.php' );

add_action('customize_controls_enqueue_scripts', 'kidsworld_customizer_admin_init');

if ( ! function_exists( 'kidsworld_customizer_admin_init' ) ) {
  function kidsworld_customizer_admin_init()  {
    $kidsworld_template_uri = get_template_directory_uri();    
    wp_register_style('kidsworld_customizer_styles', $kidsworld_template_uri . '/framework/customizer/css/customizer.css', '', '1.0');
    wp_enqueue_style( 'kidsworld_customizer_styles' );
  }
}

if ( ! function_exists( 'kidsworld_customizer_scripts' ) ) {
    function kidsworld_customizer_scripts() {

    wp_enqueue_script('jquery-ui-button');
    wp_register_script( 'customizer-app-js', get_template_directory_uri() . '/framework/customizer/js/customizer.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'customizer-app-js' );

    }

    add_action( 'customize_controls_print_footer_scripts', 'kidsworld_customizer_scripts' );
}

/* ************************************************************************************** 
  Include Preloader
************************************************************************************** */

function kidsworld_customizer_preloader() {
  $kidsworld_customizer_loader = esc_html__('Loading','kids-world');

  echo '<div id="kidsworld_customizer_loading"><div id="kidsworld_cs_proload_content"><p><span class="kidsworld_cs_loading"></span><span>'.$kidsworld_customizer_loader.'</span><span class="kidsworld_cs_loading_title">'.esc_html__('Customizer','kids-world').'</span></p></div>
</div>';
}

add_action( 'customize_controls_print_styles', 'kidsworld_customizer_preloader' );

/* ************************************************************************************** 
  Get Customizer Options
************************************************************************************** */

if ( ! function_exists( 'kidsworld_get_option' ) ) {
  function kidsworld_get_option( $option, $default = false ) {
    $output = get_option( $option, $default );
    return apply_filters( 'kidsworld_option_' . $option, $output );
  }
}