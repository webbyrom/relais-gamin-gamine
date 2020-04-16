<?php

add_action( 'init', 'swmsc_custom_posts_taxonomies', 0 );

if (!function_exists('swmsc_custom_posts_taxonomies')) {
	function swmsc_custom_posts_taxonomies() {

		$swmsc_portfolio_category_slug 		= 'portfolio-categories';
		$swmsc_testimonials_category_slug 	= 'testimonials-categories';
		$swmsc_logos_category_slug 			= 'logos-categories';
		$swmsc_events_category_slug 		= 'events-categories';
		$swmsc_classes_category_slug 		= 'classes-categories';

    	$swmsc_portfolio_category_slug 		= apply_filters( 'swmsc_portfolio_category_slug', $swmsc_portfolio_category_slug );
    	$swmsc_testimonials_category_slug 	= apply_filters( 'swmsc_testimonials_category_slug', $swmsc_testimonials_category_slug );
    	$swmsc_logos_category_slug 			= apply_filters( 'swmsc_logos_category_slug', $swmsc_logos_category_slug );
    	$swmsc_events_category_slug 		= apply_filters( 'swmsc_events_category_slug', $swmsc_events_category_slug );
    	$swmsc_classes_category_slug 		= apply_filters( 'swmsc_classes_category_slug', $swmsc_classes_category_slug );

		register_taxonomy(__( "portfolio-categories" , 'pre-school-shortcodes'), array(__( "portfolio" , 'pre-school-shortcodes'),),
			array(
				"hierarchical" => true,
				"query_var" => true,
				"rewrite" => array(
					'slug' => $swmsc_portfolio_category_slug,
					'hierarchical' => true,
					'with_front' => false )
		));

		register_taxonomy(__( "testimonials-categories" , 'pre-school-shortcodes'), array(__( "testimonials" , 'pre-school-shortcodes'),),
			array(
				"hierarchical" => true,
				"query_var" => true,
				"rewrite" => array(
					'slug' => $swmsc_testimonials_category_slug,
					'hierarchical' => true,
					'with_front' => false )
			));

		register_taxonomy(__( "logos-categories" , 'pre-school-shortcodes'), array(__( "logos" , 'pre-school-shortcodes'),),
			array(
				"hierarchical" => true,
				"query_var" => true,
				"rewrite" => array(
					'slug' => $swmsc_logos_category_slug,
					'hierarchical' => true,
					'with_front' => false )
			));

		register_taxonomy(__( "events-categories" , 'pre-school-shortcodes'), array(__( "events" , 'pre-school-shortcodes'),),
			array(
				"hierarchical" => true,
				"query_var" => true,
				"rewrite" => array(
					'slug' => $swmsc_events_category_slug,
					'hierarchical' => true,
					'with_front' => false )
			));

		register_taxonomy(__( "classes-categories" , 'pre-school-shortcodes'), array(__( "classes" , 'pre-school-shortcodes'),),
			array(
				"hierarchical" => true,
				"query_var" => true,
				"rewrite" => array(
					'slug' => $swmsc_classes_category_slug,
					'hierarchical' => true,
					'with_front' => false )
			));

	}
}
