<?php

/* *********************************************************************************************
 PLEASE DO NOT DELETE THIS FUNCTION BECAUSE THIS FUNCTION IS CALLING CHILD THIME CSS FILE
********************************************************************************************* */

function kidsworld_load_child_themestyles () {
	if (!is_admin()) {
		$kidsworld_stylesheet_uri = get_stylesheet_directory_uri();			

		wp_enqueue_style('kidsworld-child-theme-style', $kidsworld_stylesheet_uri . '/style.css');	
		wp_enqueue_style( 'kidsworld-child-theme-style', $kidsworld_stylesheet_uri . '/style.css', '', '1.0' );			
	
	}
}
add_action('wp_enqueue_scripts', 'kidsworld_load_child_themestyles',1000);

/* ******************************************************************************************** */