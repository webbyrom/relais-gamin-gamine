<?php

// register columns

add_filter("manage_edit-portfolio_columns", "swmsc_posttype_portfolio_edit_columns");
if (!function_exists('swmsc_posttype_portfolio_edit_columns')) {
	function swmsc_posttype_portfolio_edit_columns($columns){
		$columns = array(
			"cb" 					=> "<input type=\"checkbox\" />",
			"title" 				=> __( 'Title' , 'pre-school-shortcodes'),
			"image" 				=> __( 'Image' , 'pre-school-shortcodes'),
			"portfolio-category" 	=> __( 'Category' , 'pre-school-shortcodes'),
			'date' 					=> __( 'Date', 'pre-school-shortcodes')
		);
		return $columns;
	}
}

add_filter("manage_edit-testimonials_columns", "swmsc_posttype_testimonials_edit_columns");
if (!function_exists('swmsc_posttype_testimonials_edit_columns')) {
	function swmsc_posttype_testimonials_edit_columns($columns){
		$columns = array(
			"cb" 					=> "<input type=\"checkbox\" />",
			"title" 				=> __( 'Title' , 'pre-school-shortcodes'),
			"image" 				=> __( 'Image' , 'pre-school-shortcodes'),
			"testimonials-category"	=> __( 'Category' , 'pre-school-shortcodes'),
			'date' 					=> __( 'Date', 'pre-school-shortcodes')
		);
		return $columns;
	}
}

add_filter("manage_edit-logos_columns", "swmsc_posttype_logos_edit_columns");
if (!function_exists('swmsc_posttype_logos_edit_columns')) {
	function swmsc_posttype_logos_edit_columns($columns){
		$columns = array(
			"cb" 					=> "<input type=\"checkbox\" />",
			"title" 				=> __( 'Title' , 'pre-school-shortcodes'),
			"image" 				=> __( 'Image' , 'pre-school-shortcodes'),
			"logos-category"		=> __( 'Category' , 'pre-school-shortcodes'),
			'date' 					=> __( 'Date', 'pre-school-shortcodes')
		);
		return $columns;
	}
}

add_filter("manage_edit-events_columns", "swmsc_posttype_events_edit_columns");
if (!function_exists('swmsc_posttype_events_edit_columns')) {
	function swmsc_posttype_events_edit_columns($columns){
		$columns = array(
			"cb" 					=> "<input type=\"checkbox\" />",
			"title" 				=> __( 'Title' , 'pre-school-shortcodes'),
			"image" 				=> __( 'Image' , 'pre-school-shortcodes'),
			'event-date' 			=> __( 'Event Date', 'pre-school-shortcodes'),
			"events-category"		=> __( 'Category' , 'pre-school-shortcodes'),
			'date' 					=> __( 'Date', 'pre-school-shortcodes'),
		);
		return $columns;
	}
}

add_filter("manage_edit-classes_columns", "swmsc_posttype_classes_edit_columns");
if (!function_exists('swmsc_posttype_classes_edit_columns')) {
	function swmsc_posttype_classes_edit_columns($columns){
		$columns = array(
			"cb" 					=> "<input type=\"checkbox\" />",
			"title" 				=> __( 'Title' , 'pre-school-shortcodes'),
			"image" 				=> __( 'Image' , 'pre-school-shortcodes'),
			"classes-category"		=> __( 'Category' , 'pre-school-shortcodes'),
			'date' 					=> __( 'Date', 'pre-school-shortcodes')
		);
		return $columns;
	}
}

// display columns

add_action("manage_posts_custom_column",  "swmsc_custom_posts_display_column");
if (!function_exists('swmsc_custom_posts_display_column')) {
	function swmsc_custom_posts_display_column($column){
		global $post;
		switch ($column)  {

			case 'portfolio-category':
				echo wp_strip_all_tags( get_the_term_list($post->ID, 'portfolio-categories', '', ', ',''));
				break;

			case 'testimonials-category':
				echo wp_strip_all_tags( get_the_term_list($post->ID, 'testimonials-categories', '', ', ',''));
				break;

			case 'logos-category':
				echo wp_strip_all_tags( get_the_term_list($post->ID, 'logos-categories', '', ', ',''));
				break;

			case 'events-category':
				echo wp_strip_all_tags( get_the_term_list($post->ID, 'events-categories', '', ', ',''));
				break;

			case 'classes-category':
				echo wp_strip_all_tags( get_the_term_list($post->ID, 'classes-categories', '', ', ',''));
				break;

			case 'image':
				echo '<a href="' . get_edit_post_link() . '">' . get_the_post_thumbnail($post->ID, array(80,80)) . '</a>';
				break;

			case 'event-date':
				$swmsc_event_start_date = strtotime(get_post_meta( get_the_ID(), 'swmsc_event_date', true ));
				echo date_i18n(get_option('date_format'),$swmsc_event_start_date);
				break;
		}
	}
}