<?php

add_filter( 'rwmb_meta_boxes', 'swmsc_register_custom_posttypes_metaboxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function swmsc_register_custom_posttypes_metaboxes( $meta_boxes )
{


	// Portfolio Options

	$meta_boxes[] = array(
		'id' => 'swmsc-portfolio-metabox',
		'title' => __('Portfolio Options', 'pre-school-shortcodes'),
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				"name" => esc_html__('Title Section Background Color', 'pre-school-shortcodes'),
				"id" => "swmsc_portfolio_title_bg",
				"std" => '#f1f1f1',
				"type" => "color",
			),
			array(
				"name" => esc_html__('Title Section Text Color', 'pre-school-shortcodes'),
				"id" => "swmsc_portfolio_title_text_color",
				"std" => '#555555',
				"type" => "color",
			),
			array(
				"name" => __('Project Type', 'pre-school-shortcodes'),
				"id" => "swmsc_portfolio_project_type",
				"std" => "image",
				"type" => "select",
				"options" => array(
					"image" => __('Image', 'pre-school-shortcodes'),
					"video" => __('Video', 'pre-school-shortcodes')
				),
			),
			array(
				'name' => __('Add YouTube/Vimeo Video URL', 'pre-school-shortcodes'),
				'id' => "swmsc_portfolio_video",
				'std' => '',
				"type" => "text",
				'class' => 'portfolio_project_type_field',
				'desc' => __('Examples:<br />https://www.youtube.com/watch?v=fyWivafJuuU<br />http://vimeo.com/59519518', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Custom Link on Thumbnail and Title', 'pre-school-shortcodes'),
				'id' => "swmsc_portfolio_external_link",
				'std' => '',
				"type" => "text",
				'desc' => __('You can add custom link to open any other page or external website page instead of portfolio single page.', 'pre-school-shortcodes'),
			),
			array(
				"name" => __('Open Link Page', 'pre-school-shortcodes'),
				"id" => "swmsc_portfolio_link_window",
				"std" => "_self",
				"type" => "select",
				"options" => array(
					"_self" => __('Open in Same Window', 'pre-school-shortcodes'),
					"_blank" => __('Open in New Window', 'pre-school-shortcodes')
				),
			),
		)
	);

	// Events Options

	$meta_boxes[] = array(
		'id' => 'swmsc-events-metabox',
		'title' => __('Events Options', 'pre-school-shortcodes'),
		'pages' => array( 'events' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => __('Start Date', 'pre-school-shortcodes'),
				'id' => "swmsc_event_date",
				'std' => '',
				"type" => "date",
			),
			array(
				'name' => __('End Date', 'pre-school-shortcodes'),
				'id' => "swmsc_event_end_date",
				'std' => '',
				"type" => "date",
				'desc' => __('Please add event end date. This field is necessary. If event will end on next or other day then it will display end event date in event single page next to start date otherwise it will only display start date.', 'pre-school-shortcodes'),
			),

			array(
				'name' => __('Start Time', 'pre-school-shortcodes'),
				'id' => "swmsc_event_start_time",
				'std' => '8:00 am',
				"type" => "text",
				'desc' => __('Event Start time. Example: 8:00 am', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Start to End Time', 'pre-school-shortcodes'),
				'id' => "swmsc_event_start_end_time",
				'std' => '8:00 am to 6:00 pm',
				"type" => "text",
				'desc' => __('Event start to end time. Example: 8:00 am to 6:00 pm', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Venue Name', 'pre-school-shortcodes'),
				'id' => "swmsc_event_venue_name",
				'std' => 'Indoor Stadium',
				"type" => "text"
			),
			array(
				'name' => __('Venue Address ( Street )', 'pre-school-shortcodes'),
				'id' => "swmsc_event_venue_address_street",
				'std' => '5, Station Road, Lorem Ips',
				"type" => "text"
			),
			array(
				'name' => __('Venue Address ( City, State and Country )', 'pre-school-shortcodes'),
				'id' => "swmsc_event_venue_address_city",
				'std' => 'Los Angeles, CA',
				"type" => "text"
			),
			array(
				'name' => __('Venue Address ( ZIP/PIN code )', 'pre-school-shortcodes'),
				'id' => "swmsc_event_venue_address_zipcode",
				'std' => '90013.',
				"type" => "text"
			),
			array(
				'name' => __('Google Map Link', 'pre-school-shortcodes'),
				'id' => "swmsc_event_google_link",
				'std' => 'https://www.google.co.in/maps/place/New+York,+NY,+USA/@40.7053111,-74.258188,10z/data=!3m1!4b1!4m2!3m1!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62',
				"type" => "textarea",
				'sanitize_callback' => 'none',
				'desc' => __('Add Google Map Link', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Register Button Text', 'pre-school-shortcodes'),
				'id' => "swmsc_event_register_button",
				'std' => 'Register Today!',
				"type" => "text"
			),
			array(
				'name' => __('Register Button Link', 'pre-school-shortcodes'),
				'id' => "swmsc_event_register_button_link",
				'std' => '#',
				"type" => "text"
			),
			array(
				'name' => __('Organizer Details ( optional )', 'pre-school-shortcodes'),
				'id' => "swmsc_event_organizer_heading",
				'std' => '',
				"type" => "heading"
			),
			array(
				'name' => __('Name', 'pre-school-shortcodes'),
				'id' => "swmsc_event_organizer_name",
				'std' => 'Global Organizers',
				"type" => "text"
			),
			array(
				'name' => __('Small overview', 'pre-school-shortcodes'),
				'id' => "swmsc_event_organizer_info",
				'std' => 'Duis aute irure dolor in reprehenderit in voluptate velit esslore eu fugiat nulla.',
				"type" => "textarea",
				'sanitize_callback' => 'none',
				'desc' => __('Little info text about organizer company.', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Phone', 'pre-school-shortcodes'),
				'id' => "swmsc_event_organizer_phone",
				'std' => '1 - 888 666 5432',
				"type" => "text"
			),
			array(
				'name' => __('Email', 'pre-school-shortcodes'),
				'id' => "swmsc_event_organizer_email",
				'std' => 'info@loremips.com',
				"type" => "email"
			),
			array(
				'name' => __('Website', 'pre-school-shortcodes'),
				'id' => "swmsc_event_organizer_website",
				'std' => 'www.eventipsum.com',
				"type" => "text"
			)

		)
	);

	// Classes Options

	$meta_boxes[] = array(
		'id' => 'swmsc-classes-metabox',
		'title' => __('Classes Options', 'pre-school-shortcodes'),
		'pages' => array( 'classes' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => __('Start Date', 'pre-school-shortcodes'),
				'id' => "swmsc_class_start_std_date",
				'std' => '',
				"type" => "date"
			),
			array(
				'name' => __('Years Old', 'pre-school-shortcodes'),
				'id' => "swmsc_class_years_old",
				'std' => '2-5 Years',
				"type" => "text"
			),
			array(
				'name' => __('Class Size', 'pre-school-shortcodes'),
				'id' => "swmsc_class_size",
				'std' => '25',
				"type" => "number"
			),
			array(
				'name' => __('Class Duration', 'pre-school-shortcodes'),
				'id' => "swmsc_class_duration",
				'std' => '9:00 am - 11:00 am',
				"type" => "text"
			),
			array(
				'name' => __('Transportation', 'pre-school-shortcodes'),
				'id' => "swmsc_class_transportation",
				'std' => 'Available',
				"type" => "text"
			),
			array(
				'name' => __('Transportation', 'pre-school-shortcodes'),
				'id' => "swmsc_class_divider_one",
				'std' => 'Available',
				"type" => "divider"
			),
			array(
				'name' => __('Extra Field 1 - Title', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field1",
				'std' => 'Morning Foods',
				"type" => "text"
			),
			array(
				'name' => __('Extra Field 1 - Description', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field1_desc",
				'std' => 'Included',
				"type" => "text"
			),
			array(
				'name' => __('Extra Field 1 - Icon', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field1_icon",
				'std' => 'cutlery',
				"type" => "text",
				'desc' => __('<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Icon Reference</a>', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Extra Field 2 - Title', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field2",
				'std' => 'Class Staff',
				"type" => "text"
			),
			array(
				'name' => __('Extra Field 2 - Description', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field2_desc",
				'std' => '2 Teachers, 3 Caretakers',
				"type" => "text"
			),
			array(
				'name' => __('Extra Field 2 - Icon', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field2_icon",
				'std' => 'users',
				"type" => "text",
				'desc' => __('<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Icon Reference</a>', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Extra Field 3 - Title', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field3",
				'std' => '',
				"type" => "text"
			),
			array(
				'name' => __('Extra Field 3 - Description', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field3_desc",
				'std' => '',
				"type" => "text"
			),
			array(
				'name' => __('Extra Field 3 - Icon', 'pre-school-shortcodes'),
				'id' => "swmsc_class_extra_field3_icon",
				'std' => '',
				"type" => "text",
				'desc' => __('<a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Icon Reference</a>', 'pre-school-shortcodes'),
			),
			array(
				'name' => __('Price and Register Button ( optional )', 'pre-school-shortcodes'),
				'id' => "swmsc_class_organizer_heading",
				'std' => '',
				"type" => "heading"
			),
			array(
				'name' => __('Price', 'pre-school-shortcodes'),
				'id' => "swmsc_class_price",
				'std' => '$25',
				"type" => "text"
			),
			array(
				'name' => __('Price Sub Text', 'pre-school-shortcodes'),
				'id' => "swmsc_class_price_subtext",
				'std' => 'per day',
				"type" => "text"
			),
			array(
				'name' => __('Register Button Text', 'pre-school-shortcodes'),
				'id' => "swmsc_class_register_button",
				'std' => 'Register Today!',
				"type" => "text"
			),
			array(
				'name' => __('Register Button Link', 'pre-school-shortcodes'),
				'id' => "swmsc_class_register_button_link",
				'std' => '#',
				"type" => "text"
			),
		)
	);

	// Testimonials Options

	$meta_boxes[] = array(
		'id' => 'swmsc-testimonials-metabox',
		'title' => __('Testimonials Options', 'pre-school-shortcodes'),
		'pages' => array( 'testimonials' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => __('Parents Details (optional)', 'pre-school-shortcodes'),
				'desc' => __('Sub text e.g. Caroline\'s Dad', 'pre-school-shortcodes'),
				'id' => "swmsc_client_details",
				'std' => '',
				"type" => "text"
			),
			array(
				'name' => __('Paragraph Text Background Color', 'pre-school-shortcodes'),
				'id' => "swmsc_testimonials_p_bg_col",
				'std' => '#8374cf',
				"type" => "color"
			),
			array(
				'name' => __('Paragraph Text Color', 'pre-school-shortcodes'),
				'id' => "swmsc_testimonials_p_text_col",
				'std' => '#ffffff',
				"type" => "color"
			)
		)
	);

	// Logos Options

	$meta_boxes[] = array(
		'id' => 'swmsc-logos-metabox',
		'title' => __('Logo Options', 'pre-school-shortcodes'),
		'pages' => array( 'logos' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => __('Client Website URL (optional)', 'pre-school-shortcodes'),
				'desc' => __('Enter client website URl or leave it blank', 'pre-school-shortcodes'),
				'id' => "swmsc_client_logo_url",
				'std' => '',
				"type" => "text"
			)
		)
	);

	return $meta_boxes;
}