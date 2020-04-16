<?php

add_filter( 'rwmb_meta_boxes', 'kidsworld_register_custom_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function kidsworld_register_custom_meta_boxes( $kidsworld_meta_boxes )
{

	// Page Layout
	$kidsworld_page_layout = array(
		"layout-sidebar-right" => esc_html__( 'Sidebar Right', 'kids-world' ),
		"layout-sidebar-left" => esc_html__( 'Sidebar Left', 'kids-world' ),
		"layout-full-width" => esc_html__( 'Full Width', 'kids-world' )
	);

	// Revolution sliders list

	$kidsworld_meta_rev_slider_list = '';

	if (class_exists('RevSlider')) {
	    $kidsworld_rev_theslider     = new RevSlider();
	    $kidsworld_rev_arrSliders = $kidsworld_rev_theslider->getArrSliders();
	    $kidsworld_rev_arrA	= array();
	    $kidsworld_rev_arrT	= array();
	    foreach($kidsworld_rev_arrSliders as $slider){
	        $kidsworld_rev_arrA[]     = $slider->getAlias();
	        $kidsworld_rev_arrT[]     = $slider->getTitle();
	    }
	    if($kidsworld_rev_arrA && $kidsworld_rev_arrT){
	        $kidsworld_meta_rev_slider_list = array_combine($kidsworld_rev_arrA, $kidsworld_rev_arrT);
	    }

	}

	if ( $kidsworld_meta_rev_slider_list == '' ) {
		$kidsworld_meta_rev_slider_list = array( 'norevslider' => 'No Slider is Created');
	}


/* *********************************************************
	PORTFOLIO PAGE OPTIONS
********************************************************** */

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld_portfolio_page_image_header',
		'title' => esc_html__('Portfolio Page Options', 'kids-world'),
		'pages' => array(
			'page'
		),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
					'name' => esc_html__('Portfolio Type', 'kids-world'),
					'desc' => esc_html__('Note: If you want to display 15-20 items on single page then sortable portfolio is best option. Sortable script will sort visible items on current page. If you have more than 20 items to display then select classic portfolio option because second or third page items will not sort and display in first page by click on categery name.', 'kids-world'),
					'id' => "kidsworld_portfolio_page_type",
					'type' => 'select',
					'std' => 'Sortable_Portfolio_with_Hover_Text',
					'options'  => array(
						'Sortable_Portfolio' => esc_html__('Sortable Portfolio', 'kids-world'),
						'Classic_Portfolio' => esc_html__('Classic Portfolio', 'kids-world'),
					),
				),
			array(
				'name' => esc_html__('Portfolio Column', 'kids-world'),
				'desc' => esc_html__('Select portfolio display column', 'kids-world'),
				'id' => "kidsworld_pf_display_column",
				'type' => 'select',
				'std' => '4',
				'options'  => array(
					'2' => esc_html__('2 Column Portfolio', 'kids-world'),
					'3' => esc_html__('3 Column Portfolio', 'kids-world'),
					'4' => esc_html__('4 Column Portfolio', 'kids-world'),
				),
			),
			array(
				'name' => esc_html__('Pagination Style', 'kids-world'),
				'desc' => esc_html__('Select portfolio pagination style', 'kids-world'),
				'id' => "kidsworld_pf_pagination_style",
				'type' => 'select',
				'std' => 'standard',
				'options'  => array(
					"standard" => esc_html__( 'Standard', 'kids-world' ),
				    "next-prev" => esc_html__( 'Next - Previous', 'kids-world' ),
				    "infinite-scroll" => esc_html__( 'Infinite Scroll', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Exclude Portfolio Categories', 'kids-world'),
				'desc' => esc_html__('Checked categories will be excluded from page display.', 'kids-world'),
				'id' => "kidsworld_exclude_pf_categories",
				'type' => 'taxonomy',
				'options' => array(
					'taxonomy' => 'portfolio-categories',
					'type' => 'checkbox_tree',
					'args' => array()
				)
			),
			array(
				'name' => esc_html__('Display Portfolio Title Section', 'kids-world'),
				'desc' => esc_html__('Enable portfolio item title and excerpt/categories section.', 'kids-world'),
				'id' => "kidsworld_onoff_page_title_section",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__( 'Portfolio Item Title Text Size', 'kids-world' ),
				'id'   => "kidsworld_pf_title_font_size",
				'type' => 'slider',
				'std' => '20',
				'suffix' => 'px',
				'js_options' => array(
					'min'   => 8,
					'max'   => 200,
					'step'  => 1,
				),
			),
			array(
				'name' => esc_html__( 'Portfolio Item Title Text Line Height', 'kids-world' ),
				'id'   => "kidsworld_pf_title_line_height",
				'type' => 'slider',
				'std' => '20',
				'suffix' => 'px',
				'js_options' => array(
					'min'   => 8,
					'max'   => 200,
					'step'  => 1,
				),
			),
			array(
				'name' => esc_html__('Add link on Portfolio Title Text', 'kids-world'),
				'desc' => esc_html__('Enable permalink on portfolio title text', 'kids-world'),
				'id' => "kidsworld_pf_item_title_link",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Post Excerpt', 'kids-world'),
				'desc' => esc_html__('Enable portfolio item excerpt text ', 'kids-world'),
				'id' => "kidsworld_pf_display_excerpt",
				'std' => "0",
				"type" => "checkbox"
			),
			array(
				'name' => esc_html__( 'Portfolio Item Excerpt Text Size', 'kids-world' ),
				'id'   => "kidsworld_pf_excerpt_font_size",
				'type' => 'slider',
				'std' => '16',
				'suffix' => 'px',
				'js_options' => array(
					'min'   => 8,
					'max'   => 200,
					'step'  => 1,
				),
			),
			array(
				'name' => esc_html__( 'Portfolio Item Excerpt Text Line Height', 'kids-world' ),
				'id'   => "kidsworld_pf_excerpt_line_height",
				'type' => 'slider',
				'std' => '20',
				'suffix' => 'px',
				'js_options' => array(
					'min'   => 8,
					'max'   => 200,
					'step'  => 1,
				),
			),
			array(
				'name' => esc_html__('Display Images/Videos on Lightbox', 'kids-world'),
				'desc' => esc_html__('Enable lightbox feature (open large image in popup). If disable then linked image will open portfolio single page.', 'kids-world'),
				'id' => "kidsworld_onoff_pf_lightbox",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Pagination', 'kids-world'),
				'desc' => esc_html__('Add number to display portfolio items per page e.g. 12', 'kids-world'),
				'id' => "kidsworld_pf_items_pagination",
				'std' => "12",
				"type" => "text",
			),
			array(
				'name' => esc_html__( 'Space Between Two Items', 'kids-world' ),
				'id'   => "kidsworld_pf_items_space",
				'desc' => esc_html__('Add space between two portfolio items.', 'kids-world'),
				'type' => 'slider',
				'std' => '12',
				'suffix' => 'px',
				'js_options' => array(
					'min'   => 0,
					'max'   => 200,
					'step'  => 1
				),
			),
			array(
				'name' => esc_html__('Page Content Position', 'kids-world'),
				'desc' => esc_html__('Select page content position', 'kids-world'),
				'id' => "kidsworld_portfolio_content_position",
				'type' => 'select',
				'std' => 'above_items',
				'options'  => array(
					"above_items" => esc_html__( 'Display above Portfolio items', 'kids-world' ),
				    "below_items" => esc_html__( 'Display below Portfolio items', 'kids-world' ),
				),
			)
		)

	);

/* *********************************************************
	POST TYPE VIDEO
********************************************************** */

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld-post-meta-box',
		'title' =>  esc_html__('Add Video', 'kids-world'),
		'pages' => array('post'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array( "name" => esc_html__('Add YouTube video embed or embedded code','kids-world'),
					'desc' => esc_html__('Default embed video width - 616', 'kids-world'),
					"id" => "kidsworld_meta_video",
					"type" => "textarea",
					'sanitize_callback' => 'none',
					'my_class' => 'kidsworld_divider_line',
					"std" => ''
			)
		)
	);

/* *********************************************************
	POST TYPE AUDIO
********************************************************** */

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld-meta-box-audio',
		'title' =>  esc_html__('Add Audio', 'kids-world'),
		'pages' => array('post'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array( "name" => esc_html__('Embed/embedded audio code','kids-world'),
					"id" => "kidsworld_meta_audio",
					"type" => "textarea",
					'my_class' => 'kidsworld_divider_line',
					'sanitize_callback' => 'none',
					"std" => ''
			)
		)
	);


/* *********************************************************
	POST TYPE LINK
********************************************************** */

$kidsworld_meta_boxes[] = array(
	'id' => 'kidsworld-meta-box-link',
	'title' =>  esc_html__('Add Link URL', 'kids-world'),
	'pages' => array('post'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => esc_html__('Link URL ( e.g. http://www.domain.com )','kids-world'),
				"desc" => '',
				"id" => "kidsworld_meta_link_url",
				"type" => "text",
				'my_class2' => 'rwmb-text-large',
				"std" => 'http://www.domain.com'
		)
	)
);

/* *********************************************************
	POST TYPE GALLERY
********************************************************** */

$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld-meta-box-gallery',
		'title' =>  esc_html__('Add Gallery Images', 'kids-world'),
		'pages' => array('post'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( "name" => esc_html__('Gallery Type','kids-world'),
				"desc" => '',
				"id" => "kidsworld_meta_gallery",
				"type" => "select",
				"options" => array(
					"gallery_type_slideshow" => esc_html__( 'Slide Show with Next Previous Arrows', 'kids-world' ),
					"gallery_type_column" => esc_html__( '1-2-4 Column Large to thumb images', 'kids-world' )

				),
				"std" => 'gallery_type_slideshow'
			),
			array(
				'name' => esc_html__('Galley Images', 'kids-world'),
				'desc' => '',
				'id'  => "kidsworld_meta_pf_gallery_images",
				'type'  => 'image_advanced',
			),
		)
	);

/* *********************************************************
	POST TYPE QUOTE
********************************************************** */

$kidsworld_meta_boxes[] = array(
	'id' => 'kidsworld-meta-box-quote',
	'title' =>  esc_html__('Add Quote', 'kids-world'),
	'pages' => array('post'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => esc_html__('Add Quote Text','kids-world'),
				"desc" => '',
				"id" => "kidsworld_meta_quote",
				"type" => "textarea",
				'sanitize_callback' => 'none',
				"std" => ''
		),
		array( "name" => esc_html__('Quote Text Size','kids-world'),
				'desc' => esc_html__('Add Quote text size in "px"" or "em". Example : 30px or 2em', 'kids-world'),
				"id" => "kidsworld_meta_quote_text_size",
				"type" => "text",
				"std" => '21px'
		),
		array( "name" => esc_html__('Quote Text Line Height','kids-world'),
				'desc' => esc_html__('Add Quote text size in "px"" or "em". Example : 30px or 2em', 'kids-world'),
				"id" => "kidsworld_meta_quote_text_line_height",
				"type" => "text",
				"std" => '36px'
		),
		array( "name" => esc_html__('Source Name (optional)','kids-world'),
				"desc" => '',
				"id" => "kidsworld_meta_quote_source",
				"type" => "text",
				"std" => 'John Doe'
		),

		array( "name" => esc_html__('Source URL (optional)','kids-world'),
				"desc" => '',
				"id" => "kidsworld_meta_quote_source_url",
				"type" => "text",
				"std" => ''
		),
		array(
				"name" => esc_html__('Quote Text Color', 'kids-world'),
				"id" => "kidsworld_quote_text_color",
				"std" => '#666666',
				"type" => "color",
		),
		array(
				"name" => esc_html__('Quote Background Color', 'kids-world'),
				"id" => "kidsworld_quote_bg_color",
				"std" => '#f1f1f1',
				"type" => "color",
		),
		array( "name" => esc_html__('Text Padding','kids-world'),
				'desc' => strip_tags( esc_html__('Text space from top, bottom, left and right. Add value in "px" or "em". You can add single value like 50px or differnt values like 50px 80px 50px 80px (top, right, bottom and left).', 'kids-world')),
				"id" => "kidsworld_meta_quote_text_space",
				"type" => "text",
				"std" => '50px'
		),
		array(
				'name' => esc_html__('Display Only Quote Text and Background', 'kids-world'),
				"id" => "kidsworld_meta_only_quote_text",
				"desc" => esc_html__('Select "On" to hide all sections like post title, meta, excerpt etc. and display only quote text with background in blog and archives pages. Some post styles looks nice with date, postformat icon and other meta fields and that\'s why it will be visible in those post styles.', 'kids-world'),
				"std" => "off",
				"type" => "radio",
				"options" => array(
					"on" => esc_html__( 'On', 'kids-world' ),
					"off" => esc_html__( 'Off', 'kids-world' )
				),
		),
	)
);
/* *********************************************************
	CLASSES PAGE OPTIONS
********************************************************** */

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld_classes_page',
		'title' => esc_html__('Classes Page Options', 'kids-world'),
		'pages' => array(
			'page'
		),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => esc_html__('Exclude Classes Categories', 'kids-world'),
				'desc' => esc_html__('Checked categories will be excluded from page display.', 'kids-world'),
				'id' => "kidsworld_exclude_classes_categories",
				'type' => 'taxonomy',
				'options' => array(
					'taxonomy' => 'classes-categories',
					'type' => 'checkbox_tree',
					'args' => array()
				)
			),
			array(
				'name' => esc_html__('Pagination Style', 'kids-world'),
				'desc' => esc_html__('Select classes pagination style', 'kids-world'),
				'id' => "kidsworld_classes_pagination_style",
				'type' => 'select',
				'std' => 'standard',
				'options'  => array(
					"standard" => esc_html__( 'Standard', 'kids-world' ),
				    "next-prev" => esc_html__( 'Next - Previous', 'kids-world' ),
				    "infinite-scroll" => esc_html__( 'Infinite Scroll', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Display Sortable Menu', 'kids-world'),
				'desc' => esc_html__('Note: If you want to display 10-20 items on single page then sortable menu is best option. Sortable script will sort visible items on current page. If you have more than 20 items to display then disable this option because second or third page items will not sort and display in first page by click on categery name.', 'kids-world'),
				'id' => "kidsworld_onoff_classes_sortable_menu",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Post Excerpt', 'kids-world'),
				'desc' => esc_html__('Enable class item excerpt text ', 'kids-world'),
				'id' => "kidsworld_class_display_excerpt",
				'std' => "1",
				"type" => "checkbox"
			),
			array(
				'name' => esc_html__('Pagination', 'kids-world'),
				'desc' => esc_html__('Add number to display Classes items per page e.g. 12', 'kids-world'),
				'id' => "kidsworld_classes_items_pagination",
				'std' => "12",
				"type" => "text",
			),
			array(
				'name' => esc_html__('Page Content Position', 'kids-world'),
				'desc' => esc_html__('Select page content position', 'kids-world'),
				'id' => "kidsworld_classes_content_position",
				'type' => 'select',
				'std' => 'above_items',
				'options'  => array(
					"above_items" => esc_html__( 'Display above Classes items', 'kids-world' ),
				    "below_items" => esc_html__( 'Display below Classes items', 'kids-world' )
				),
			)
		)

	);

/* *********************************************************
	TESTIMONIALS PAGE OPTIONS
********************************************************** */

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld_testimonials_page',
		'title' => esc_html__('Testimonials Page Options', 'kids-world'),
		'pages' => array(
			'page'
		),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => esc_html__('Exclude Testimonials Categories', 'kids-world'),
				'desc' => esc_html__('Checked categories will be excluded from page display.', 'kids-world'),
				'id' => "kidsworld_exclude_testimonials_categories",
				'type' => 'taxonomy',
				'options' => array(
					'taxonomy' => 'testimonials-categories',
					'type' => 'checkbox_tree',
					'args' => array()
				)
			),
			array(
				'name' => esc_html__('Display Sortable Menu', 'kids-world'),
				'desc' => esc_html__('Note: If you want to display 10-20 items on single page then sortable menu is best option. Sortable script will sort visible items on current page. If you have more than 20 items to display then disable this option because second or third page items will not sort and display in first page by click on categery name.', 'kids-world'),
				'id' => "kidsworld_onoff_testimonials_sortable_menu",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Display Column', 'kids-world'),
				'desc' => esc_html__('Select testimoninals display column', 'kids-world'),
				'id' => "kidsworld_testimonials_display_column",
				'type' => 'select',
				'std' => '2',
				'options'  => array(
					'1' => esc_html__('1 Column', 'kids-world'),
					'2' => esc_html__('2 Column', 'kids-world'),
					'3' => esc_html__('3 Column', 'kids-world'),
				),
			),
			array(
				'name' => esc_html__('Pagination Style', 'kids-world'),
				'desc' => esc_html__('Select testimonials pagination style', 'kids-world'),
				'id' => "kidsworld_testimonials_pagination_style",
				'type' => 'select',
				'std' => 'standard',
				'options'  => array(
					"standard" => esc_html__( 'Standard', 'kids-world' ),
				    "next-prev" => esc_html__( 'Next - Previous', 'kids-world' ),
				    "infinite-scroll" => esc_html__( 'Infinite Scroll', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Display Client Image', 'kids-world'),
				'desc' => esc_html__('Enable client image', 'kids-world'),
				'id' => "kidsworld_onoff_testimonials_client_image",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Display Quote Icon', 'kids-world'),
				'desc' => esc_html__('Enable quote icon next to client name', 'kids-world'),
				'id' => "kidsworld_onoff_testimonials_quote_icon",
				'std' => "1",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Display Box with Color Background', 'kids-world'),
				'desc' => esc_html__('Disable Colorful Background in testimonials boxes', 'kids-world'),
				'id' => "kidsworld_onoff_testimonials_colorbox",
				'std' => "0",
				"type" => "checkbox",
			),
			array(
				'name' => esc_html__('Pagination', 'kids-world'),
				'desc' => esc_html__('Add number to display Testimonials items per page e.g. 12', 'kids-world'),
				'id' => "kidsworld_testimonials_items_pagination",
				'std' => "12",
				"type" => "text",
			),
			array(
				'name' => esc_html__('Page Content Position', 'kids-world'),
				'desc' => esc_html__('Select page content position', 'kids-world'),
				'id' => "kidsworld_testimonials_content_position",
				'type' => 'select',
				'std' => 'above_items',
				'options'  => array(
					"above_items" => esc_html__( 'Display above Testimonials items', 'kids-world' ),
				    "below_items" => esc_html__( 'Display below Testimonials items', 'kids-world' )
				),
			)
		)

	);

/* *********************************************************
	EVENTS PAGE OPTIONS
********************************************************** */

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld_events_page',
		'title' => esc_html__('Events Page Options', 'kids-world'),
		'pages' => array(
			'page'
		),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => esc_html__('Exclude Events Categories', 'kids-world'),
				'desc' => esc_html__('Checked categories will be excluded from page display.', 'kids-world'),
				'id' => "kidsworld_exclude_events_categories",
				'type' => 'taxonomy',
				'options' => array(
					'taxonomy' => 'events-categories',
					'type' => 'checkbox_tree',
					'args' => array()
				)
			),
			array(
				'name' => esc_html__('Pagination Style', 'kids-world'),
				'desc' => esc_html__('Select events pagination style', 'kids-world'),
				'id' => "kidsworld_events_pagination_style",
				'type' => 'select',
				'std' => 'standard',
				'options'  => array(
					"standard" => esc_html__( 'Standard', 'kids-world' ),
				    "next-prev" => esc_html__( 'Next - Previous', 'kids-world' ),
				    "infinite-scroll" => esc_html__( 'Infinite Scroll', 'kids-world' )
				),
			),
			array(
				"name" => esc_html__('Events Type', 'kids-world'),
				"id" => "kidsworld_meta_events_type",
				"std" => "upcoming",
				"type" => "select",
				"options" => array(
					"upcoming" => esc_html__( 'Upcoming Events', 'kids-world' ),
					"past" => esc_html__( 'Past Events', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Pagination', 'kids-world'),
				'desc' => esc_html__('Add number to display Events items per page e.g. 12', 'kids-world'),
				'id' => "kidsworld_events_items_pagination",
				'std' => "12",
				"type" => "text",
			),
			array(
				'name' => esc_html__('Page Content Position', 'kids-world'),
				'desc' => esc_html__('Select page content position', 'kids-world'),
				'id' => "kidsworld_events_content_position",
				'type' => 'select',
				'std' => 'above_items',
				'options'  => array(
					"above_items" => esc_html__( 'Display above Events items', 'kids-world' ),
				    "below_items" => esc_html__( 'Display below Events items', 'kids-world' ),
				),
			)
		)

	);

/* *********************************************************
	PAGE/POST OPTIONS
********************************************************** */

$kidsworld_meta_google_map_api_customizer = esc_html(kidsworld_get_option('kidsworld_google_map_api_customizer',''));

	$kidsworld_meta_boxes[] = array(
		'id' => 'kidsworld-page-meta-box',
		'title' => esc_html__('Page Options', 'kids-world'),
		'pages' => array( 'post','page','portfolio','product','tribe_events','events','classes'),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				"name" => esc_html__('Page Content', 'kids-world'),
				"id" => "kidsworld_meta_page_content_heading",
				"type" => "heading"
			),
			array(
				"name" => esc_html__('Content Layout', 'kids-world'),
				"id" => "kidsworld_meta_page_layout",
				"std" => "layout-full-width",
				"type" => "select",
				"options" => $kidsworld_page_layout,
			),
			array(
				'name' => esc_html__('Page Content Top Padding', 'kids-world'),
				'desc' => esc_html__('Enter content top padding value in pixels or em( Example: 20px, 30px, 1em, 2em). Leave it empty for default value.', 'kids-world'),
				'id' => "kidsworld_meta_page_content_top_padding",
				'std' => '',
				"type" => "text"
			),
			array(
				'name' => esc_html__('Page Content Bottom Padding', 'kids-world'),
				'desc' => esc_html__('Enter content bottom padding value in pixels or em( Example: 20px, 30px, 1em, 2em). Leave it empty for default value.', 'kids-world'),
				'id' => "kidsworld_meta_page_content_bottom_padding",
				'std' => '',
				"type" => "text"
			),
			array(
				'name' => esc_html__('Display Content Image WordPress Default Gallery with Masonry Style', 'kids-world'),
				"id" => "kidsworld_meta_content_img_gallery_masonry_on",
				"std" => "off",
				"type" => "radio",
				"options" => array(
					"on" => esc_html__( 'On', 'kids-world' ),
					"off" => esc_html__( 'Off', 'kids-world' )
				),
			),
			array(
				"name" => esc_html__('Sub Header', 'kids-world'),
				"id" => "kidsworld_meta_page_content_heading",
				"type" => "heading"
			),
			array(
				'name' => esc_html__('Display Sub Header', 'kids-world'),
				"id" => "kidsworld_meta_sub_header_on",
				"std" => "default",
				"type" => "radio",
				"class" => "kidsworld_meta_sub_header_on",
				"options" => array(
					"default" => esc_html__( 'Default', 'kids-world' ),
					"on" => esc_html__( 'On', 'kids-world' ),
					"off" => esc_html__( 'Off', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Display Breadcrumbs Bar', 'kids-world'),
				"id" => "kidsworld_meta_sub_header_breadcrumb_on",
				"std" => "on",
				"type" => "radio",
				"options" => array(
					"on" => esc_html__( 'On', 'kids-world' ),
					"off" => esc_html__( 'Off', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Display Search Bar', 'kids-world'),
				"id" => "kidsworld_meta_sub_header_search_on",
				"std" => "on",
				"type" => "radio",
				"options" => array(
					"on" => esc_html__( 'On', 'kids-world' ),
					"off" => esc_html__( 'Off', 'kids-world' )
				),
			),
			array(
				"name" => esc_html__('Sub Header Styles', 'kids-world'),
				"id" => "kidsworld_meta_page_content_heading",
				"class" => "kidsworld_meta_subheader_fields",
				"type" => "heading"
			),
			array(
				"name" => esc_html__('Header Style', 'kids-world'),
				"id" => "kidsworld_meta_header_style",
				"class" => "kidsworld_meta_subheader_fields",
				"std" => "standard",
				"type" => "select",
				"options" => array(
					"standard" => esc_html__('Standard - Title with Background', 'kids-world'),
					"revolution_slider" => esc_html__('Revolution Slider', 'kids-world'),
					"google_map_embed" => esc_html__('Google Map with Embed Code', 'kids-world'),
					"google_map" => esc_html__('Google Map with API', 'kids-world')
				),
			),
			array(
				"name" => esc_html__('Background Color', 'kids-world'),
				"desc" => esc_html__('If you do not want to upload background image then add background color value', 'kids-world'),
				"id" => "kidsworld_meta_header_bg_color",
				"std" => '',
				"type" => "color",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
			),
			array(
				'name' => esc_html__('Background Image', 'kids-world'),
				'desc' => esc_html__('Upload background image to display in this page (recommended size : 1920x400)', 'kids-world'),
				'id'  => "kidsworld_meta_header_bg_image",
				'type'  => 'image_advanced',
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"max_file_uploads" => 1,
				"max_status" => false
			),
			array(
				"name" => esc_html__('Background Position', 'kids-world'),
				"id" => "kidsworld_meta_header_bg_position",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => "center",
				"type" => "select",
				"options" => array(
					"left-top" 		=> esc_html__( 'Left Top', 'kids-world' ),
					"left-center" 	=> esc_html__( 'Left Center', 'kids-world' ),
					"left-bottom" 	=> esc_html__( 'Left Bottom', 'kids-world' ),
					"right-top" 	=> esc_html__( 'Right Top', 'kids-world' ),
					"right-center" 	=> esc_html__( 'Right Center', 'kids-world' ),
					"right-bottom" 	=> esc_html__( 'Right Bottom', 'kids-world' ),
					"center-top" 	=> esc_html__( 'Center Top', 'kids-world' ),
					"center-center" => esc_html__( 'Center Center', 'kids-world' ),
					"center-bottom" => esc_html__( 'Center Bottom', 'kids-world' )
				),
			),
			array(
				"name" => esc_html__('Background Repeat', 'kids-world'),
				"id" => "kidsworld_meta_header_bg_repeat",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => "no-repeat",
				"type" => "select",
				"options" => array(
					"repeat" => esc_html__( 'Repeat', 'kids-world' ),
					"no-repeat" => esc_html__( 'No-Repeat', 'kids-world' ),
					"repeat-x" => esc_html__( 'Repeat-X', 'kids-world' ),
					"repeat-y" => esc_html__( 'Repeat-Y', 'kids-world' )
				),
			),
			array(
				"name" => esc_html__('Background Attachment', 'kids-world'),
				"id" => "kidsworld_meta_header_bg_attachment",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => "fixed",
				"type" => "select",
				"options" => array(
					"scroll" => esc_html__( 'Scroll', 'kids-world' ),
					"fixed" => esc_html__( 'Fixed', 'kids-world' )
				),
			),
			array(
				'name' => esc_html__('Display Title', 'kids-world'),
				"id" => "kidsworld_meta_sub_header_title_on",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => "on",
				"type" => "radio",
				"options" => array(
					"on" => esc_html__( 'On', 'kids-world' ),
					"off" => esc_html__( 'Off', 'kids-world' )
				),
			),
			array(
				"name" => esc_html__('Title Color', 'kids-world'),
				"id" => "kidsworld_meta_sub_header_title_color",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => '',
				"type" => "color",
			),
			array( "name" => esc_html__('Header Top Padding','kids-world'),
				"id" => "kidsworld_meta_sub_header_top_padding",
				"type" => "slider",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => '0',
				'js_options' => array(
					'min'   => 0,
					'max'   => 500,
					'step'  => 1,
				),
			),
			array( "name" => esc_html__('Header Bottom Padding','kids-world'),
				"id" => "kidsworld_meta_sub_header_bottom_padding",
				"type" => "slider",
				"class" => "kidsworld_meta_header_background_fields kidsworld_meta_subheader_fields",
				"std" => '0',
				'js_options' => array(
					'min'   => 0,
					'max'   => 500,
					'step'  => 1,
				),
			),
			array(
				"name" => esc_html__('Revolution Slider', 'kids-world'),
				"id" => "kidsworld_meta_header_revolution",
				"std" => "default",
				"type" => "select",
				"class" => "kidsworld_meta_header_revolution_fields kidsworld_meta_subheader_fields",
				"options" => $kidsworld_meta_rev_slider_list,
			),
			array(
				'name' => esc_html__('Google Map with Embed Code', 'kids-world'),
				'desc' => esc_html__('Video tutorial: https://youtu.be/ruNDITzcB_8', 'kids-world'),
				'id' => "kidsworld_google_map_embed_code",
				'std' => "",
				"class" => "kidsworld_meta_header_google_map_embed_fields kidsworld_meta_subheader_fields",
				"type" => "textarea",
				'sanitize_callback' => 'none',
			),
			array(
				"id" => "kidsworld_meta_googlemap_address",
				'name' => esc_html__( 'Address', 'kids-world' ),
				'desc' 			=> esc_html__('Required: Please add "Google Map API" from Admin > Appearance > Customize > Sub Header > Google Map API (scrool to bottom to view this section)', 'kids-world'),
				'type' => 'text',
				"class" => "kidsworld_meta_header_google_map_fields kidsworld_meta_subheader_fields",
				'std'  => esc_html__( 'New York, NY, USA', 'kids-world' ),
			),
			array(
				"id" => "kidsworld_meta_header_google_map",
				'name'          => esc_html__( 'Location', 'kids-world' ),
				'type'          => 'map',
				"class" => "kidsworld_meta_header_google_map_fields kidsworld_meta_subheader_fields",
				'std'           => '-6.233406,-35.049906,15',
				'address_field' => 'kidsworld_meta_googlemap_address',
				'api_key'       => $kidsworld_meta_google_map_api_customizer,
			),
			array(
				'name' => esc_html__('Header Height', 'kids-world'),
				'desc' => esc_html__('Header height to display map. Enter only number.', 'kids-world'),
				'id' => "kidsworld_google_map_arg_height",
				'std' => "500",
				"class" => "kidsworld_meta_header_google_map_fields kidsworld_meta_subheader_fields",
				"type" => "text",
			),
			array(
				'name' => esc_html__('Map Zoom Level', 'kids-world'),
				'desc' => esc_html__('Enter number between 10 to 20 ( default 14 ). <a href="https://developers.google.com/maps/documentation/static-maps/intro?hl=en#Zoomlevels" target="_blank">Read more</a>.', 'kids-world'),
				'id' => "kidsworld_google_map_arg_zoom",
				'std' => "14",
				"class" => "kidsworld_meta_header_google_map_fields kidsworld_meta_subheader_fields",
				"type" => "text",
			),
			array(
				'name' => esc_html__('Info Window  - Title', 'kids-world'),
				'desc' => '',
				'id' => "kidsworld_google_map_arg_title",
				'std' => "Info Window Title",
				"class" => "kidsworld_meta_header_google_map_fields kidsworld_meta_subheader_fields",
				"type" => "text",
			),
			array(
				'name' => esc_html__('Info Window - Address, Small Description.', 'kids-world'),
				'desc' => esc_html__('You can add address or description text. You can also use html tags like strong, em, p h2, h3, h4. Just remember the content will be passed to Javascript, so things like quotes (single or double) should be avoided', 'kids-world'),
				'id' => "kidsworld_google_map_arg_desc",
				'std' => "Info Window Title",
				"class" => "kidsworld_meta_header_google_map_fields kidsworld_meta_subheader_fields",
				"type" => "textarea",
				'sanitize_callback' => 'none',
			)

		)
	);





	return $kidsworld_meta_boxes;
}


