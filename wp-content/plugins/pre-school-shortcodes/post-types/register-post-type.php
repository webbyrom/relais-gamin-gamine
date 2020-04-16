<?php

/* **************************************************************************************
	Portfolio
************************************************************************************** */

add_action( 'init', 'swmsc_posttype_portfolio' );
if (!function_exists('swmsc_posttype_portfolio')) {
	function swmsc_posttype_portfolio() {
		$labels = array(
			'name' => __( 'Portfolio', 'pre-school-shortcodes'),
			'singular_name' => __( 'Portfolio', 'pre-school-shortcodes'),
			'add_new' =>  __( 'Add New' , 'pre-school-shortcodes'),
			'add_new_item' => __('Add New Portfolio', 'pre-school-shortcodes'),
			'edit_item' => __('Edit Portfolio', 'pre-school-shortcodes'),
			'new_item' => __('New Portfolio Item', 'pre-school-shortcodes'),
			'view_item' => __('View Portfolio Item', 'pre-school-shortcodes'),
			'search_items' => __('Search Portfolio Items', 'pre-school-shortcodes'),
			'not_found' =>  __('No portfolio items found', 'pre-school-shortcodes'),
			'not_found_in_trash' => __('No portfolio items found in Trash', 'pre-school-shortcodes'),
			'parent_item_colon' => ''
		);

		$labels = apply_filters( 'swmsc_portfolio_labels', $labels );
		$swmsc_school_portfolio_slug = 'portfolios';
    	$swmsc_school_portfolio_slug = apply_filters( 'swmsc_portfolio_slug', $swmsc_school_portfolio_slug );

		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => $swmsc_school_portfolio_slug),
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'show_in_rest' => true,
			'supports' => array('title','editor','thumbnail','excerpt','comments')
		);

		register_post_type(__( 'portfolio' , 'pre-school-shortcodes'),$args);

	}
}

/* **************************************************************************************
	Testimonials
************************************************************************************** */

add_action( 'init', 'swmsc_posttype_testimonials' );
if (!function_exists('swmsc_posttype_testimonials')) {
	function swmsc_posttype_testimonials() {
		$labels = array(
			'name' => __( 'Testimonials', 'pre-school-shortcodes'),
			'singular_name' => __( 'Testimonial' , 'pre-school-shortcodes'),
			'add_new' =>  __( 'Add New' , 'pre-school-shortcodes'),
			'add_new_item' => __('Add New testimonial', 'pre-school-shortcodes'),
			'edit_item' => __('Edit Testimonial', 'pre-school-shortcodes'),
			'new_item' => __('New Testimonial Item', 'pre-school-shortcodes'),
			'view_item' => __('View Testimonial Item', 'pre-school-shortcodes'),
			'search_items' => __('Search Testimonials', 'pre-school-shortcodes'),
			'not_found' =>  __('No testimonial items found', 'pre-school-shortcodes'),
			'not_found_in_trash' => __('No testimonial items found in Trash', 'pre-school-shortcodes'),
			'parent_item_colon' => ''
		);

		$labels = apply_filters( 'swmsc_testimonials_labels', $labels );
		$swmsc_school_testimonials_slug = 'clients-testimonials';
    	$swmsc_school_testimonials_slug = apply_filters( 'swmsc_testimonials_slug', $swmsc_school_testimonials_slug );

		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => $swmsc_school_testimonials_slug),
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'show_in_rest' => true,
			'supports' => array('title','editor','thumbnail','excerpt')
		);

		register_post_type(__( 'testimonials' , 'pre-school-shortcodes'),$args);

	}
}

/* **************************************************************************************
	Logos
************************************************************************************** */

add_action( 'init', 'swmsc_posttype_logos' );
if (!function_exists('swmsc_posttype_logos')) {
	function swmsc_posttype_logos() {
		$labels = array(
			'name' => __( 'Logos', 'pre-school-shortcodes'),
			'singular_name' => __( 'Logo' , 'pre-school-shortcodes'),
			'add_new' =>  __( 'Add New' , 'pre-school-shortcodes'),
			'add_new_item' => __('Add New Logo', 'pre-school-shortcodes'),
			'edit_item' => __('Edit Logo', 'pre-school-shortcodes'),
			'new_item' => __('New Logo Item', 'pre-school-shortcodes'),
			'view_item' => __('View Logo Item', 'pre-school-shortcodes'),
			'search_items' => __('Search Logos', 'pre-school-shortcodes'),
			'not_found' =>  __('No logo items found', 'pre-school-shortcodes'),
			'not_found_in_trash' => __('No logo items found in Trash', 'pre-school-shortcodes'),
			'parent_item_colon' => ''
		);

		$labels = apply_filters( 'swmsc_logos_labels', $labels );
		$swmsc_school_logos_slug = 'client-logos';
    	$swmsc_school_logos_slug = apply_filters( 'swmsc_logos_slug', $swmsc_school_logos_slug );

		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => $swmsc_school_logos_slug),
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','thumbnail')
		);

		register_post_type(__( 'logos' , 'pre-school-shortcodes'),$args);

	}
}

/* **************************************************************************************
	Events
************************************************************************************** */

add_action( 'init', 'swmsc_posttype_events' );
if (!function_exists('swmsc_posttype_events')) {
	function swmsc_posttype_events() {
		$labels = array(
			'name' => __( 'Events', 'pre-school-shortcodes'),
			'singular_name' => __( 'Events', 'pre-school-shortcodes'),
			'add_new' =>  __( 'Add New' , 'pre-school-shortcodes'),
			'add_new_item' => __('Add New Event', 'pre-school-shortcodes'),
			'edit_item' => __('Edit Event', 'pre-school-shortcodes'),
			'new_item' => __('New Event Item', 'pre-school-shortcodes'),
			'view_item' => __('View Event Item', 'pre-school-shortcodes'),
			'search_items' => __('Search Event Items', 'pre-school-shortcodes'),
			'not_found' =>  __('No event items found', 'pre-school-shortcodes'),
			'not_found_in_trash' => __('No event items found in Trash', 'pre-school-shortcodes'),
			'parent_item_colon' => ''
		);

		$labels = apply_filters( 'swmsc_events_labels', $labels );
		$swmsc_school_events_slug = 'school-events';
    	$swmsc_school_events_slug = apply_filters( 'swmsc_events_slug', $swmsc_school_events_slug );

		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => $swmsc_school_events_slug),
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'show_in_rest' => true,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail','excerpt','comments','custom-fields')
		);

		register_post_type(__( 'events' , 'pre-school-shortcodes'),$args);

	}
}

/* **************************************************************************************
	Classes
************************************************************************************** */

add_action( 'init', 'swmsc_posttype_classes' );
if (!function_exists('swmsc_posttype_classes')) {
	function swmsc_posttype_classes() {
		$labels = array(
			'name' => __( 'Classes', 'pre-school-shortcodes'),
			'singular_name' => __( 'Classes', 'pre-school-shortcodes'),
			'add_new' =>  __( 'Add New' , 'pre-school-shortcodes'),
			'add_new_item' => __('Add New Class', 'pre-school-shortcodes'),
			'edit_item' => __('Edit Class', 'pre-school-shortcodes'),
			'new_item' => __('New Class Item', 'pre-school-shortcodes'),
			'view_item' => __('View Class Item', 'pre-school-shortcodes'),
			'search_items' => __('Search Class Items', 'pre-school-shortcodes'),
			'not_found' =>  __('No class items found', 'pre-school-shortcodes'),
			'not_found_in_trash' => __('No class items found in Trash', 'pre-school-shortcodes'),
			'parent_item_colon' => ''
		);

		$labels = apply_filters( 'swmsc_classes_labels', $labels );
		$swmsc_school_classes_slug = 'school-classes';
    	$swmsc_school_classes_slug = apply_filters( 'swmsc_classes_slug', $swmsc_school_classes_slug );

		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => $swmsc_school_classes_slug),
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'show_in_rest' => true,
			'supports' => array('title','editor','thumbnail','excerpt','comments','custom-fields')
		);

		register_post_type(__( 'classes' , 'pre-school-shortcodes'),$args);

	}
}