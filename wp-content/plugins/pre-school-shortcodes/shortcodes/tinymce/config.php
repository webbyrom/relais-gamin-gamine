<?php

$swmsc_sample_image = plugin_dir_url( __FILE__ ) . 'images/';

function swmsc_one_to_final_number ( $final_number, $all = true, $default = false, $start_number = 1 ) {
	if($all) {
		$count_number['-1'] = 'All';
	}

	if($default) {
		$count_number[''] = 'Default';
	}

	foreach(range($start_number, $final_number) as $number) {
		$count_number[$number] = $number;
	}

	return $count_number;
}

$swmsc_sc_font_size = swmsc_one_to_final_number( 200, false, false, 8 );
$swmsc_sc_border_width = swmsc_one_to_final_number( 10, false, false, 0 );

// Fontawesome icons list
$fontAwesomeFile = '';
$fontStyleCode = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
$fontAwesomeFilePath = SWMSC_PLUGIN_DIR . 'fonts/font-awesome.css';

if ( file_exists($fontAwesomeFilePath) ) {	
	$fontAwesomeFile = file_get_contents($fontAwesomeFilePath);
}

preg_match_all($fontStyleCode,$fontAwesomeFile, $matches, PREG_SET_ORDER);

$font_icons = array();

foreach($matches as $match){
	$font_icons[$match[1]] = $match[2];
}

$column_position = array(
	'type' => 'dropdown',
	'heading' => __('Column Position', 'pre-school-shortcodes'),
	'description' => __('Select "First" if this column is first ( left column )', 'pre-school-shortcodes'),
	'value' => array(
	'other' => '',
	'first' => __('First Column', 'pre-school-shortcodes')						
	)
);

$background_image = array(
	'type' => 'attach_image',
	'heading' => __('Background Image', 'pre-school-shortcodes'),
	'description' => __('Upload background image', 'pre-school-shortcodes')			
);

$background_repeat = array(
	'type' => 'dropdown',
	'heading' => __('Background Repeat', 'pre-school-shortcodes'),
	'description' => '',
	'std' => 'repeat',
	'value' => array(
		__( 'Repeat', 'pre-school-shortcodes' )		=> 'repeat',   
        __( 'No Repeat', 'pre-school-shortcodes' )	=> 'no-repeat', 
        __( 'Repeat X', 'pre-school-shortcodes' )	=> 'repeat-x',   
        __( 'Repeat Y', 'pre-school-shortcodes') 	=> 'repeat-y' 
	)
);
$background_position = array(
	'type' => 'dropdown',
	'heading' => __('Background Position', 'pre-school-shortcodes'),
	'description' => '',
	'std' => 'center-top',
	'value' => array(
		__( 'Left Top', 'pre-school-shortcodes' )		=> "left-top",     
        __( 'Left Center', 'pre-school-shortcodes' )		=> "left-center",  
        __( 'Left Bottom', 'pre-school-shortcodes' )		=> "left-bottom",  
        __( 'Right Top', 'pre-school-shortcodes' )		=> "right-top",    
        __( 'Right Center', 'pre-school-shortcodes' )	=> "right-center", 
        __( 'Right Bottom', 'pre-school-shortcodes' )	=> "right-bottom", 
        __( 'Center Top', 'pre-school-shortcodes' )		=> "center-top",   
        __( 'Center Center', 'pre-school-shortcodes' )	=> "center-center",
        __( 'Center Bottom', 'pre-school-shortcodes' ) 	=> "center-bottom"
	)
);

/* ************************************************************************************** 
     COLUMNS
************************************************************************************** */

$swmsc_shortcodes['animatedcolumn'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Columns', 'pre-school-shortcodes'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'dropdown',
				'heading' => __('Column Width', 'pre-school-shortcodes'),
				'description' => __('Select the width of the column.', 'pre-school-shortcodes'),
				'value' => array(
					__('One Third', 'pre-school-shortcodes')	 	=>	'swmsc_one_third',
					__('Two Third', 'pre-school-shortcodes')	 	=>	'swmsc_two_third',
					__('One Half', 'pre-school-shortcodes')	 	=>	'swmsc_one_half' ,
					__('One Fourth', 'pre-school-shortcodes')	=>	'swmsc_one_fourth',
					__('Three Fourth', 'pre-school-shortcodes')	=>	'swmsc_three_fourth',
					__('One Fifth', 'pre-school-shortcodes')	 	=>	'swmsc_one_fifth',
					__('Four Fifth', 'pre-school-shortcodes')	=>	'swmsc_four_fifth',
					__('One Sixth', 'pre-school-shortcodes')	 	=>	'swmsc_one_sixth',
					__('Five Sixth', 'pre-school-shortcodes')	=>	'swmsc_five_sixth'					
				)
			),
			'position' => array(
				'type' => 'dropdown',
				'heading' => __('Column Position', 'pre-school-shortcodes'),
				'description' => __('If this is first column in row then select "First" from above dropdown menu.', 'pre-school-shortcodes'),
				'value' => array(
					__('Other', 'pre-school-shortcodes') => 'other',			
					__('First', 'pre-school-shortcodes') => 'first'								
				)
			),
			'animation_style' => array(
				'type' => 'dropdown',
				'heading' => __('Animation Style', 'pre-school-shortcodes'),
				'description' => __('Select column animation style', 'pre-school-shortcodes'),
				'value' => array(
					__('None', 'pre-school-shortcodes') 					=> 'none',
					__('Move Left to Right', 'pre-school-shortcodes') 	=> 'move_left_to_right',
					__('Move Right to Left', 'pre-school-shortcodes') 	=> 'move_right_to_left',
					__('Move Top to Bottom', 'pre-school-shortcodes') 	=> 'move_top_to_bottom',
					__('Move Bottom to Top', 'pre-school-shortcodes') 	=> 'move_bottom_to_top',
					__('Expand from Center', 'pre-school-shortcodes') 	=> 'swmsc_center_expand'
				)
			),
			'content' => array(
				'std' => 'Add colulmn content here',
				'type' => 'textarea_html',
				'heading' => __('Column Content', 'pre-school-shortcodes'),
				'description' => __('Add the column content.', 'pre-school-shortcodes'),
			)
		),
		'shortcode' => '[{{column}} position="{{position}}" animation_style="{{animation_style}}"] {{content}} [/{{column}}] ',
		'clone_button' => __('Add New Column', 'pre-school-shortcodes')
	)
);


/* **************************************************************************************
   IMAGE SLIDER
************************************************************************************** */

$swmsc_shortcodes['imageslider'] = array(
    'params' => array(
    	'animation_type' => array(
			'type' => 'dropdown',
			'heading' => __('Animation Type', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(					
				__('Fade', 'pre-school-shortcodes')  => 'fade',
				__('Slide', 'pre-school-shortcodes')	=> 'slide'									
			)
		),
		'auto_play' => array(
			'type' => 'dropdown',
			'heading' => __('Auto Play', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(					
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'											
			)
		),
		'bullet_navigation' => array(
			'type' => 'dropdown',
			'heading' => __('Display Bullet Navigation', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(					
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'											
			)
		),
		'arrow_navigation' => array(
			'type' => 'dropdown',
			'heading' => __('Display Arrow Navigation', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(					
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'										
			)
		),
		'slide_interval' => array(
			'type' => 'textfield',
			'heading' => __('Slideshow Speed', 'pre-school-shortcodes'),
			'description' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'pre-school-shortcodes'),
			'std' => '5000'		
		)
    ),
    'no_preview' => true,
    'shortcode' => '[swmsc_image_slider animation_type="{{animation_type}}" auto_play="{{auto_play}}" bullet_navigation="{{bullet_navigation}}" arrow_navigation="{{arrow_navigation}}" slide_interval="{{slide_interval}}"] {{child_shortcode}} [/swmsc_image_slider]',
    'popup_title' => __('Image Slider', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(
            'src' => array(
				'type' => 'attach_image',
				'heading' => __('Image', 'pre-school-shortcodes'),
				'description' => __('Maximum image width : 940px, height size is flexible.', 'pre-school-shortcodes')				
			),
			'link' => array(
				'type' => 'textfield',
				'heading' => __('Link on Image', 'pre-school-shortcodes'),
				'description' => __('Add link to open page or post by click on image', 'pre-school-shortcodes'),
				'std' => '#'
			)
			                      
        ),        
        'shortcode' => '[swmsc_image_slide src="{{src}}" link="{{link}}" alt=""]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Slide', 'pre-school-shortcodes')
    )
);

/* ************************************************************************************** 
  RECENT POSTS
************************************************************************************** */

$recent_posts_cat = array(
	'type' => 'textfield',
	'heading' => __('Categories', 'pre-school-shortcodes'),
	'description' => __('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or <strong>Leave it blank for default.</strong>', 'pre-school-shortcodes'),
	'std' => ''		
);
$recent_posts_exclude= array(
	'type' => 'textfield',
	'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
	'description' => __('add post categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
	'std' => ''		
);
$recent_posts_desc_limit = array(
	'type' => 'textfield',
	'heading' => __('Description Limit', 'pre-school-shortcodes'),
	'description' => __('Number of characters to display in summery text', 'pre-school-shortcodes'),
	'std' => '150'
);
$recent_posts_read_more_text = array(
	'type' => 'textfield',
	'heading' => __('Read More Link Text', 'pre-school-shortcodes'),
	'description' => __('Leave it blank to hide "Read More" link', 'pre-school-shortcodes'),
	'std' => 'Read more'
);
$recent_posts_post_limit = array(
	'type' => 'textfield',
	'heading' => __('Post Limit', 'pre-school-shortcodes'),
	'description' => __('Number of posts to display', 'pre-school-shortcodes'),
	'std' => '2'
);

// Recent Posts Tiny

$swmsc_shortcodes['recentpoststiny'] = array(
	'params' => array(
		'post_limit' => $recent_posts_post_limit, 			
		'cat'  => $recent_posts_cat,
		'exclude' => $recent_posts_exclude
	),
	'shortcode' => '[swmsc_recent_posts_tiny post_limit="{{post_limit}}" cat="{{cat}}" exclude="{{exclude}}"]',
	'no_preview' => true, 
	'popup_title' => __('Recent Posts', 'pre-school-shortcodes')
);

// Recent Posts Full

$swmsc_shortcodes['recentpostsfull'] = array(
	'params' => array(
		'column' => array(
			'type' => 'dropdown',
			'heading' => __('Display Column', 'pre-school-shortcodes'),
			'description' => __('Select display column for recent posts', 'pre-school-shortcodes'),
			'std' => '3',
			'value' => array(
				__('1 Column', 'pre-school-shortcodes') => '1',
				__('2 Column', 'pre-school-shortcodes') => '2'								
			)
		),
		'display_posts' => $recent_posts_post_limit,
		'desc_limit' => $recent_posts_desc_limit,
		'read_more_text' => $recent_posts_read_more_text,
		'post_date' => array(
			'type' => 'dropdown',
			'heading' => __('Display Date', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'						
			)
		),
		'post_meta' => array(
			'type' => 'dropdown',
			'heading' => __('Display Author Name and Comments', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'						
			)
		),
		'featured_img' => array(
			'type' => 'dropdown',
			'heading' => __('Display Featured Image', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'							
			)
		),
		'cat'  => $recent_posts_cat,
		'exclude' => $recent_posts_exclude
	),
	'shortcode' => '[swmsc_recent_posts_large column="{{column}}" display_posts="{{display_posts}}" desc_limit="{{desc_limit}}" read_more_text="{{read_more_text}}" featured_img="{{featured_img}}" post_date="{{post_date}}" post_meta="{{post_meta}}" cat="{{cat}}" exclude="{{exclude}}"]',
	'no_preview' => true, 
	'popup_title' => __('Recent Posts', 'pre-school-shortcodes')
);

// Recent Posts Square Style

$swmsc_shortcodes['recentpostssquare'] = array(
	'params' => array(
		'post_limit' => $recent_posts_post_limit, 
		'desc_limit' => $recent_posts_desc_limit,			
		'cat'  => $recent_posts_cat,
		'exclude' => $recent_posts_exclude
	),
	'shortcode' => '[swmsc_recent_posts_square post_limit="{{post_limit}}" desc_limit="{{desc_limit}}" cat="{{cat}}" exclude="{{exclude}}"]',
	'no_preview' => true, 
	'popup_title' => __('Recent Posts', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
	TESTIMONIALS
************************************************************************************** */

$swmsc_shortcodes['testimonialsposts'] = array(
	'params' => array(
		'display_testimonials' => array(
			'type' => 'textfield',
			'heading' => __('Number of Testimonials', 'pre-school-shortcodes'),
			'description' => __('Enter number to display testimonials', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'columns' => array(
			'type' => 'dropdown',
			'heading' => __('Display Column', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '3',
			'value' => array(
				__('1 Column', 'pre-school-shortcodes') => '1',
				__('2 Column', 'pre-school-shortcodes') => '2',				
				__('3 Column', 'pre-school-shortcodes') => '3',		
				__('4 Column', 'pre-school-shortcodes') => '4'			
			)
		),		
		'person_img' => array(
			'type' => 'dropdown',
			'heading' => __('Display Person Image', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'	
			)
		),
		'quote_icon' => array(
			'type' => 'dropdown',
			'heading' => __('Display Quote Icon', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'		
			)
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add testimonials categories IDs with comma seperate to exclude from display', 'pre-school-shortcodes'),
			'std' => ''		
		),
		'infotext' => array(
			'type' => 'infotext',
			'heading' => __('Note', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('Add Testimonials from left sidebar menu Testimonials > Add New ', 'pre-school-shortcodes')
		)
	),
	'shortcode' => '[swmsc_testimonials display_testimonials="{{display_testimonials}}" columns="{{columns}}" person_img="{{person_img}}" quote_icon="{{quote_icon}}" exclude="{{exclude}}"]',
	'no_preview' => true,
	'popup_title' => __('Testimonials', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
	TESTIMONIALS BOX SLIDER
************************************************************************************** */

$swmsc_shortcodes['testimonialsboxslider'] = array(
	'params' => array(		
		'person_img' => array(
			'type' => 'dropdown',
			'heading' => __('Display Client Image', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),
		'quote_icon' => array(
			'type' => 'dropdown',
			'heading' => __('Display Quote Icon', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'		
			)
		),
		'arrow_navigation' => array(
			'type' => 'dropdown',
			'heading' => __('Display Arrow Navigation', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),		
		'slide_interval' => array(
			'type' => 'textfield',
			'heading' => __('Slideshow Speed', 'pre-school-shortcodes'),
			'description' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'pre-school-shortcodes'),
			'std' => '5000'		
		),
		'auto_play' => array(
			'type' => 'dropdown',
			'heading' => __('Auto Play', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),	
		'slide_limit' => array(
			'type' => 'textfield',
			'heading' => __('Slide Limit', 'pre-school-shortcodes'),
			'description' => __('Enter number to display testimonials slides in slideshows', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add testimonials categories IDs with comma seperate to exclude from display', 'pre-school-shortcodes'),
			'std' => ''		
		),
	),	
	'shortcode' => '[swmsc_testimonials_slider person_img="{{person_img}}" quote_icon="{{quote_icon}}" slide_interval="{{slide_interval}}" auto_play="{{auto_play}}" slide_limit="{{slide_limit}}" arrow_navigation="{{arrow_navigation}}" exclude="{{exclude}}"]',
	'no_preview' => true,
	'popup_title' => __('Testimonials Box Slider', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
	TESTIMONIALS WIDE SLIDER
************************************************************************************** */

$swmsc_shortcodes['testimonialswideslider'] = array(
	'params' => array(		
		'person_img' => array(
			'type' => 'dropdown',
			'heading' => __('Display Client Image', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),
		'arrow_navigation' => array(
			'type' => 'dropdown',
			'heading' => __('Display Arrow Navigation', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),
		'circle_navigation' => array(
			'type' => 'dropdown',
			'heading' => __('Display Circle Navigation', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),
		'slide_interval' => array(
			'type' => 'textfield',
			'heading' => __('Slideshow Speed', 'pre-school-shortcodes'),
			'description' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'pre-school-shortcodes'),
			'std' => '5000'		
		),
		'auto_play' => array(
			'type' => 'dropdown',
			'heading' => __('Auto Play', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),	
		'slide_limit' => array(
			'type' => 'textfield',
			'heading' => __('Slide Limit', 'pre-school-shortcodes'),
			'description' => __('Enter number to display testimonials slides in slideshows', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'max_width' => array(
			'type' => 'textfield',
			'label' => __('Slider Maximum Width', 'pre-school-shortcodes'),
			'desc' => __('Enter maximum display width in pixels.', 'pre-school-shortcodes'),
			'std' => '800px'		
		),
		'image_border_width' => array(
			'type' => 'textfield',
			'label' => __('Client Image Border Width', 'pre-school-shortcodes'),
			'desc' => __('Enter border width around client image. Enter "0px" to hide border.', 'pre-school-shortcodes'),
			'std' => '5px'		
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add testimonials categories IDs with comma seperate to exclude from display', 'pre-school-shortcodes'),
			'std' => ''		
		),
	),	
	'shortcode' => '[swmsc_testimonials_wide_slider person_img="{{person_img}}" slide_interval="{{slide_interval}}" auto_play="{{auto_play}}" slide_limit="{{slide_limit}}" arrow_navigation="{{arrow_navigation}}" circle_navigation="{{circle_navigation}}" exclude="{{exclude}}" max_width="{{max_width}}" image_border_width="{{image_border_width}}"]',
	'no_preview' => true,
	'popup_title' => __('Testimonials Wide Slider', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
   VIDEO
************************************************************************************** */

$swmsc_shortcodes['video'] = array(
	'params' => array(
		'source' => array(
			'type' => 'textfield',
			'heading' => __('Video URL', 'pre-school-shortcodes'),
			'description' => __('Enter embed YouTube/Vimeo video URL.<br />Use sample URLs and replace video ids in  sample URL<br /> YouTube : https://www.youtube.com/embed/sn1GG20V_m8 <br />Vimeo: https://player.vimeo.com/video/30955798 <br /> ', 'pre-school-shortcodes'),
			'std' => 'https://www.youtube.com/embed/sn1GG20V_m8'
		)		
	),
	'shortcode' => '[swmsc_video source="{{source}}" ]',
	'no_preview' => true, 
	'popup_title' => __('Video', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
	TOOLTIPS
************************************************************************************** */

$swmsc_shortcodes['tooltip'] = array(
	'params' => array(
		'position' => array(
			'type' => 'dropdown',
			'heading' => __('Tooltip Position', 'pre-school-shortcodes'),
			'description' => __('Select tooltip display position', 'pre-school-shortcodes'),
			'value' => array(
				__('Up', 'pre-school-shortcodes') 	=> 'tipUp',
				__('Down', 'pre-school-shortcodes') 	=> 'tipDown',	
				__('Left', 'pre-school-shortcodes') 	=> 'tipLeft',
				__('Right', 'pre-school-shortcodes') => 'tipRight'
			)
		),
		'tooltip_text' => array(
			'std' => __('Exmaple of tooltip text', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Tooltip Text', 'pre-school-shortcodes'),
			'description' => __('Enter text which you want to display in tooltip', 'pre-school-shortcodes'),
		),
		'content' => array(
			'std' => __('Tooltip', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Content', 'pre-school-shortcodes'),
			'description' => ''
		)
		
	),
	'shortcode' => '[swmsc_tooltip position="{{position}}" tooltip_text="{{tooltip_text}}"] {{content}} [/swmsc_tooltip]',
	'no_preview' => true, 
	'popup_title' => __('Tooltips', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
   SOCIAL MEDIA
************************************************************************************** */

$swmsc_shortcodes['socialmedia'] = array(
	'params' => array(),
    'no_preview' => true,
    'shortcode' => '[swmsc_social_media_icons] {{child_shortcode}} [/swmsc_social_media_icons]',
    'popup_title' => __('Social Media Icons', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(            
			 'icon_name' => array(
				'type' => 'textfield',
				'heading' => __('Social Media Icon', 'pre-school-shortcodes'),
				'description' => __('You can refer social media icon from this page: <a href="https://fontawesome.com/v4.7.0/icons/#brand" target="_blank">FontAwesome</a><br/>', 'pre-school-shortcodes'),
				'std' => 'twitter'
			),	
            'link' => array(
				'type' => 'textfield',
				'heading' => __('Link', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#'
			),
			'icon_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Icon Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#f2f2f2'
			),
			'bg_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Icon Background Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#555555'
			)
        ),
        'shortcode' => '[swmsc_social_media_icon icon_name="{{icon_name}}" link="{{link}}" icon_color="{{icon_color}}" bg_color="{{bg_color}}"]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Icon', 'pre-school-shortcodes')
    )
);

/* ************************************************************************************** 
  TEAM MEMBER - FULL
************************************************************************************** */

$swmsc_shortcodes['teammember'] = array(
	'params' => array(		
		'image_src' => array(
			'type' => 'attach_image',
			'heading' => __('Team Member Photo', 'pre-school-shortcodes'),
			'description' => __('Upload team member image. <br /> Recommended Size: 401px x 594px', 'pre-school-shortcodes')			
		),
		'name' => array(
			'type' => 'textfield',
			'heading' => __('Name', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('John Doe', 'pre-school-shortcodes')
		),
		'position' => array(
			'type' => 'textfield',
			'heading' => __('Position', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('Team Leader', 'pre-school-shortcodes')
		),		
		'content' => array(
			'std' => '',
			'type' => 'textarea_html',
			'heading' => __('Team Member Info', 'pre-school-shortcodes'),
			'description' => ''
		),		
		'title_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Title Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#8373ce'
		),
		'image_align' => array(
			'type' => 'dropdown',
			'heading' => __('Team Member Image Alignment', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '',
			'value' => array(				
				__('Left', 'pre-school-shortcodes') => 'left',
				__('right', 'pre-school-shortcodes') => 'right'												
			)
		),
		'content_bg' => array(
			'type' => 'dropdown',
			'heading' => __('Content Background', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '',
			'value' => array(				
				__('Light Gray', 'pre-school-shortcodes')	=> 'gray',
				__('White', 'pre-school-shortcodes')			=> 'white' 												
			)
		)
	),
	'shortcode' => '[swmsc_team_member image_src="{{image_src}}" name="{{name}}" position="{{position}}" title_text_color="{{title_text_color}}" image_align="{{image_align}}" content_bg="{{content_bg}}"] {{content}} [/swmsc_team_member]',
	'no_preview' => true,
	'popup_title' => __('Team Member', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
  TEAM MEMBER - SMALL
************************************************************************************** */

$swmsc_shortcodes['teammembersmall'] = array(
	'params' => array(		
		'image_src' => array(
			'type' => 'attach_image',
			'heading' => __('Team Member Photo', 'pre-school-shortcodes'),
			'description' => __('Upload team member image. <br /> Recommended Size: 401px x 594px', 'pre-school-shortcodes')			
		),
		'name' => array(
			'type' => 'textfield',
			'heading' => __('Name', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('John Doe', 'pre-school-shortcodes')
		),
		'name_text_size' => array(
			'std' => '22px',
			'type' => 'textfield',
			'heading' => __('Name Text Size', 'pre-school-shortcodes'),
		),
		'position' => array(
			'type' => 'textfield',
			'heading' => __('Position', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('Team Leader', 'pre-school-shortcodes')
		),	
		'position_text_size' => array(
			'std' => '16px',
			'type' => 'textfield',
			'heading' => __('Position Text Size', 'pre-school-shortcodes'),
		),	
		'text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#8373ce'
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Content Box Border Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#fcb54d'
		),
		'border_width' => array(
			'std' => '2px',
			'type' => 'textfield',
			'heading' => __('Content Box Border Width', 'pre-school-shortcodes'),
		),
		'border_radius' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Content Box Border Radius', 'pre-school-shortcodes'),
		),
		'content_box_bg' => array(
			'type' => 'colorpicker',
			'heading' => __('Content Box Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'content_box_position' => array(
			'type' => 'dropdown',
			'heading' => __('Team Member Image Alignment', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '',
			'value' => array(				
				__('Below Person Image', 'pre-school-shortcodes') => 'bottom',
				__('Above Person Image', 'pre-school-shortcodes') => 'top'												
			)
		),
		'icon1_name' => array(
			'type' => 'textfield',
			'heading' => __('Icon 1 URL', 'pre-school-shortcodes'),
			'description' => __('You can refer social media icon from this page: <a href="https://fontawesome.com/v4.7.0/icons/#brand" target="_blank">FontAwesome</a><br/>', 'pre-school-shortcodes'),
			'std' => 'twitter'
		),	
		'icon1_url' => array(
			'type' => 'textfield',
			'heading' => __('Icon 1 Link', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#'
		),
		'icon2_name' => array(
			'type' => 'textfield',
			'heading' => __('Icon 2 URL', 'pre-school-shortcodes'),
			'std' => 'facebook'
		),	
		'icon2_url' => array(
			'type' => 'textfield',
			'heading' => __('Icon 2 Link', 'pre-school-shortcodes'),
			'std' => '#'
		),
		'icon3_name' => array(
			'type' => 'textfield',
			'heading' => __('Icon 3 URL', 'pre-school-shortcodes'),
			'std' => 'linkedin'
		),	
		'icon3_url' => array(
			'type' => 'textfield',
			'heading' => __('Icon 3 Link', 'pre-school-shortcodes'),
			'std' => '#'
		),
		'icon4_name' => array(
			'type' => 'textfield',
			'heading' => __('Icon 4 URL', 'pre-school-shortcodes'),
			'std' => 'pinterest'
		),	
		'icon4_url' => array(
			'type' => 'textfield',
			'heading' => __('Icon 4 Link', 'pre-school-shortcodes'),
			'std' => '#'
		)
	),
	'shortcode' => '[swmsc_team_member_small image_src="{{image_src}}" name="{{name}}" name_text_size="{{name_text_size}}" position="{{position}}" position_text_size="{{position_text_size}}" text_color="{{text_color}}" border_color="{{border_color}}" border_width="{{border_width}}" border_radius="{{border_radius}}" content_box_bg="{{content_box_bg}}" content_box_position="{{content_box_position}}" icon1_name="{{icon1_name}}" icon2_name="{{icon2_name}}" icon3_name="{{icon3_name}}" icon4_name="{{icon4_name}}" icon1_url="{{icon1_url}}" icon2_url="{{icon2_url}}" icon3_url="{{icon3_url}}" icon4_url="{{icon4_url}}" ]',
	'no_preview' => true,
	'popup_title' => __('Team Member Small', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
  	IMAGE FRAME WITH ALIGNMENT
************************************************************************************** */

$swmsc_shortcodes['image'] = array(	
	'params' => array(
		'src' => array(
			'type' => 'attach_image',
			'heading' => __('Image', 'pre-school-shortcodes'),
			'description' => ''			
		),		
		'link' => array(
			'type' => 'textfield',
			'heading' => __('Link on Image', 'pre-school-shortcodes'),
			'description' => __('If you want to add lightbox property on this image then give full size image path in above box.', 'pre-school-shortcodes'),
			'std' => '#'
		),
		'lightbox' => array(
			'type' => 'dropdown',
			'heading' => __('Lightbox', 'pre-school-shortcodes'),
			'description' => __('Select event you want after click on thumbnail', 'pre-school-shortcodes'),
			'value' => array(
				__('Display Large Image In Lightbox', 'pre-school-shortcodes') 		=> 'true',
				__('Disable Lightbox and Go to link page', 'pre-school-shortcodes') 	=> 'false' 														
			)		         
		),
		'lightbox_type' => array(
			'type' => 'dropdown',
			'heading' => __('Lightbox Type', 'pre-school-shortcodes'),
			'description' => __('If you want to display video in light box then select Video.', 'pre-school-shortcodes'),
			'value' => array(
				__('Image', 'pre-school-shortcodes') => 'image',
				__('Video', 'pre-school-shortcodes') => 'video' 														
			)		         
		),
		'align' => array(
			'type' => 'dropdown',
			'heading' => __('Image Alignment', 'pre-school-shortcodes'),
			'description' => __('Select column as per images size.', 'pre-school-shortcodes'),
			'value' => array(
				__('Left Align', 'pre-school-shortcodes') 	=> 'left',
				__('Right Align', 'pre-school-shortcodes') 	=> 'right',
				__('Center Align', 'pre-school-shortcodes') 	=> 'center' 											
			)
		),				
		'alt' => array(
			'type' => 'textfield',
			'heading' => __('Image Alternate Text', 'pre-school-shortcodes'),
			'description' => '',
			'std' => ''
		),		
		'title' => array(
			'type' => 'textfield',
			'heading' => __('Image Title Text', 'pre-school-shortcodes'),
			'description' => '',
			'std' => ''
		),
		'border_radius' => array(
			'type' => 'textfield',
			'heading' => __('Image Border Radius', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '10px'
		)		
	),
	'shortcode' => '[swmsc_image src="{{src}}" align="{{align}}" link="{{link}}" lightbox="{{lightbox}}" lightbox_type="{{lightbox_type}}" border_radius="{{border_radius}}" alt="{{alt}}" title="{{title}}"]',
	'no_preview' => true, 
	'popup_title' => __('Image', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
 	PROMOTION BOX
************************************************************************************** */

$swmsc_shortcodes['promotionbox'] = array(
	'params' => array(
		'content' => array(
			'std' => __('This is title text of promotion box', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Promotion Text', 'pre-school-shortcodes'),
			'description' => __('Add the promotion text', 'pre-school-shortcodes'),
		),
		'title_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Title Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'title_text_size' => array(
				'type' => 'dropdown',
				'heading' => __('Title Text Size', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '22',
				'value' => $swmsc_sc_font_size
		),
		'sub_text' => array(
			'std' => __('this is sub line promo text', 'pre-school-shortcodes'),
			'type' => 'textarea',
			'heading' => __('Sub Text', 'pre-school-shortcodes'),
			'description' => __('Add the subline promotext', 'pre-school-shortcodes'),
		),
		'sub_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Sub Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),		
		'sub_text_size' => array(
				'type' => 'dropdown',
				'heading' => __('Sub Text Size', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '13',
				'value' => $swmsc_sc_font_size
		),
		'button_text' => array(
			'type' => 'textfield',
			'heading' => __('Button Text', 'pre-school-shortcodes'),
			'description' => __('If you want to hide button then leave this field blank', 'pre-school-shortcodes'),
			'std' => __('Signup Now!', 'pre-school-shortcodes')
		),
		'button_link' => array(
			'type' => 'textfield',
			'heading' => __('Button Link', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#'
		),
		'button_bg' => array(
			'type' => 'colorpicker',
			'heading' => __('Button Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#fcb54d'
		),
		'button_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Button Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'display_style' => array(
			'type' => 'dropdown',
			'heading' => __('Box Display Stayle', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(
				__('Default', 'pre-school-shortcodes') => 'default',
				__('Text and Button Center Align', 'pre-school-shortcodes') => 'text_center'
			)
		),
		'box_background' => array(
			'type' => 'colorpicker',
			'heading' => __('Box Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#8373ce'
		),	
		'border' => array(
			'type' => 'dropdown',
			'heading' => __('Display Border Around Box', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(
				__('Yes', 'pre-school-shortcodes') 	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false' 		
			)
		),
	),
	'shortcode' => '[swmsc_promotion_box title_text_color="{{title_text_color}}" title_text_size="{{title_text_size}}" sub_text="{{sub_text}}" sub_text_color="{{sub_text_color}}" sub_text_size="{{sub_text_size}}" button_text="{{button_text}}" button_link="{{button_link}}" button_bg="{{button_bg}}" button_text_color="{{button_text_color}}" display_style="{{display_style}}" box_background="{{box_background}}" border="{{border}}" ] {{content}} [/swmsc_promotion_box]',
	'no_preview' => true,
	'popup_title' => __('Promotion Box', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
   PRICING TABLES
************************************************************************************** */

$swmsc_shortcodes['tables'] = array(
	'params' => array(
		'image_src' => array(
			'type' => 'attach_image',
			'heading' => __('Heading Image', 'pre-school-shortcodes'),
			'description' => __('Upload heading image', 'pre-school-shortcodes')			
		),
		'price' => array(
			'type' => 'textfield',
			'heading' => __('Price', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '19'
		),
		'currency_symbol' => array(
			'type' => 'textfield',
			'heading' => __('Currency Symbol', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '$'
		),
		'price_sub_text' => array(
			'type' => 'textfield',
			'heading' => __('Price Sub Text', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'per day'
		),
		'title' => array(
			'type' => 'textfield',
			'heading' => __('Table Title', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('Title Here', 'pre-school-shortcodes')
		),
		'small_description' => array(
			'std' => 'this is a small description text about this plan',
			'type' => 'textarea',
			'heading' => __('Small Description', 'pre-school-shortcodes'),
			'description' => __('Add small description of this plan', 'pre-school-shortcodes')
		),
		'button_text' => array(
			'type' => 'textfield',
			'heading' => __('Button Text', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('Join Now!', 'pre-school-shortcodes')
		),
		'button_link' => array(
			'type' => 'textfield',
			'heading' => __('Button Link', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#'
		),	
		'content' => array(
			'std' => '
<ul>
<li> Table Item One </li>
<li> Table Item Two </li>
<li> Table Item Three </li>
</ul>',
			'type' => 'textarea_html',
			'heading' => __('Table Content', 'pre-school-shortcodes'),
			'description' => __('Add the table content in list format.', 'pre-school-shortcodes'),
		),
		'skin_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Skin Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#adcb69'
		),
		'skin_color_bg_text' => array(
			'type' => 'colorpicker',
			'heading' => __('Text Color on Skin Color Background', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		
	),
	'shortcode' => '[swmsc_pricing_table image_src="{{image_src}}" price="{{price}}" currency_symbol="{{currency_symbol}}" price_sub_text="{{price_sub_text}}" title="{{title}}" small_description="{{small_description}}" button_text="{{button_text}}" button_link="{{button_link}}" skin_color="{{skin_color}}" skin_color_bg_text="{{skin_color_bg_text}}" ] {{content}} [/swmsc_pricing_table]',
	'no_preview' => true,
	'popup_title' => __('Pricing Table', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
   BUTTONS
************************************************************************************** */

$swmsc_shortcodes['button'] = array(
	'params' => array(
		'content' => array(
			'std' => __('Read more', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Button Text', 'pre-school-shortcodes'),
			'description' => __('Add the button text. If you want to add icon before button text then use simple shortcode <br/>[fa_icon icon_name="fa-star"]<br />Icon Referce Website : <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a>', 'pre-school-shortcodes')
		),
		'link' => array(
			'type' => 'textfield',
			'heading' => __('Button Link', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#'
		),
		'target' => array(
			'type' => 'dropdown',
			'heading' => __('Link Target', 'pre-school-shortcodes'),
			'description' => __('Select display size of button', 'pre-school-shortcodes'),
			'value' => array(				
				__('Open page in same window', 'pre-school-shortcodes') => '_self',
				__('Open page in new window', 'pre-school-shortcodes') => '_blank'																				
			)
		),
		'bg_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#fcb54d'
		),
		'text_shadow' => array(
			'type' => 'colorpicker',
			'heading' => __('Text Shadow Color', 'pre-school-shortcodes'),
			'description' => __('Add Little dark color of Button Background color to create shadow effect', 'pre-school-shortcodes'),
			'std' => '#e69e35'
		),
		'text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#FFFFFF'
		),
		'text_size' => array(
			'type' => 'dropdown',
			'heading' => __('Font Size', 'pre-school-shortcodes'),			
			'std' => '18',
			'value' => $swmsc_sc_font_size
		),
		'button_style' => array(
			'type' => 'dropdown',
			'heading' => __('Display Style', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(
				__('Default', 'pre-school-shortcodes') 							=> 'button_standard',	
				__('Outline - Transparent Background', 'pre-school-shortcodes') 	=> 'button_outline'
			)
		),
		'border_radius' => array(
			'type' => 'textfield',
			'heading' => __('Border Radius', 'pre-school-shortcodes'),
			'description' => __('You can add border radius with diff. styles for four corners like "10px 0 10px 0" to create diff. shapes.  ', 'pre-school-shortcodes'),
			'std' => '10px'
		),
		'line_height' => array(
			'type' => 'textfield',
			'heading' => __('Line Height', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '30px'
		),
		'padding' => array(
			'type' => 'textfield',
			'heading' => __('Padding', 'pre-school-shortcodes'),
			'description' => __('Top Bottom Left and Right side padding example : "3px 20px 3px 20px"', 'pre-school-shortcodes'),
			'std' => '3px 20px'
		),
		
	),
	'shortcode' => '[swmsc_button link="{{link}}" target="{{target}}" bg_color="{{bg_color}}" text_color="{{text_color}}" text_shadow="{{text_shadow}}" text_size="{{text_size}}" button_style="{{button_style}}" border_radius="{{border_radius}}" padding="{{padding}}" line_height="{{line_height}}" ] {{content}} [/swmsc_button]',
	'no_preview' => true, 
	'popup_title' => __('Button', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
    TABS
************************************************************************************** */

$swmsc_shortcodes['tabs'] = array(
	'params' => array(
		'tabs_style' => array(
				'type' => 'dropdown',
				'heading' => __('Tabs Style', 'pre-school-shortcodes'),
				'description' => '',
				'value' => array(
					__('Horizontal Tabs', 'pre-school-shortcodes') => 'tabs_horizontal',
					__('Vertical Tabs', 'pre-school-shortcodes') => 'tabs_vertical'					
					)
			),
		'tabs_align' => array(
				'type' => 'dropdown',
				'heading' => __('Tabs Align', 'pre-school-shortcodes'),
				'description' => '',
				'value' => array(
					__('Center', 'pre-school-shortcodes')	=> 'center',
					__('Left', 'pre-school-shortcodes') 		=> 'left',
					__('Right', 'pre-school-shortcodes') 	=>'right'							
					)
			)
	),
    'no_preview' => true,
    'shortcode' => '[swmsc_tabs tabs_style="{{tabs_style}}" tabs_align="{{tabs_align}}" ] {{child_shortcode}} [/swmsc_tabs]',
    'popup_title' => __('Tabs', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(
		'title' => array(
			'type' => 'textfield',
			'heading' => __('Tab Title', 'pre-school-shortcodes'),
			'description' => __('Add the title that will go above the content', 'pre-school-shortcodes'),
			'std' => __('Title', 'pre-school-shortcodes')
		),
		'icon_name' => array(
				'type' => 'iconpicker',
				'heading' => __('Tab Icon (optional)', 'pre-school-shortcodes'),
				'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),				
				'value' => $font_icons
		),		
		'content' => array(
			'std' => __(' [p] Insert content here [/p]  ', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Tab Content', 'pre-school-shortcodes'),
			'description' => __('tab content text here', 'pre-school-shortcodes'),
		),
		'background' => array(
			'type' => 'colorpicker',
			'heading' => __('Tab Title Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#f1f1f1'
		),
		'color' => array(
			'type' => 'colorpicker',
			'heading' => __('Tab Title Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#555555'
		),
		
	),
    'shortcode' => '[swmsc_tab title="{{title}}" icon_name="{{icon_name}}" background="{{background}}" color="{{color}}"] {{content}} [/swmsc_tab]',
	'no_preview' => true, 
    'clone_button' => __('Add Another Tab', 'pre-school-shortcodes')
    )
);


/* ************************************************************************************** 
    TOOGLE CONTENT
************************************************************************************** */

$swmsc_shortcodes['toggle'] = array(
	'params' => array(			
		'status' => array(
			'type' => 'dropdown',
			'heading' => __('Toogle Status', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(
				__('Close', 'pre-school-shortcodes') => 'closed',
				__('Open', 'pre-school-shortcodes') => 'open'							
			)
		),
		'icon_name' => array(
				'type' => 'iconpicker',
				'heading' => __('Icon (optional)', 'pre-school-shortcodes'),
				'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),				
				'value' => $font_icons
		),
		'title' => array(
			'type' => 'textfield',
			'heading' => __('Toggle Content Title', 'pre-school-shortcodes'),
			'description' => __('Add the title that will go above the toggle content', 'pre-school-shortcodes'),
			'std' => __('Title', 'pre-school-shortcodes')
		),
		'title_bg' => array(
			'type' => 'colorpicker',
			'heading' => __('Toggle Content Title Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#adcb69'
		),
		'title_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Toggle Content Title Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'content' => array(
			'std' => __(' [p] Insert toggle content here [/p]  ', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Toggle Content', 'pre-school-shortcodes'),
			'description' => __('Add the toggle content. If you are adding more than one line then you can remove [p]...[/p] shortcode because wordpress will automatically add paragraph tag for all next lines.', 'pre-school-shortcodes'),
		)
		
	),
	'shortcode' => '[swmsc_toggle status="{{status}}" title="{{title}}" title_bg="{{title_bg}}" title_color="{{title_color}}" icon_name="{{icon_name}}"] {{content}} [/swmsc_toggle]',
	'no_preview' => true, 
	'popup_title' => __('Toggle Simple', 'pre-school-shortcodes')
);

$swmsc_shortcodes['toggleaccordion'] = array(
	'params' => array(
		'status' => array(
			'type' => 'dropdown',
			'heading' => __('Toogle Status', 'pre-school-shortcodes'),
			'description' => __('You can display first toggle box open or close all boxes after page load.', 'pre-school-shortcodes'),
			'std' => 'open',
			'value' => array(
				__('Open', 'pre-school-shortcodes') => 'open',
				__('Close', 'pre-school-shortcodes') => 'closed'
			)
		)
		),
    'no_preview' => true,
    'shortcode' => '[swmsc_toggle_accordion_container status="{{status}}" ] {{child_shortcode}} [/swmsc_toggle_accordion_container]',
    'popup_title' => __('Toggle Accordion', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(
		'icon_name' => array(
				'type' => 'iconpicker',
				'heading' => __('Icon', 'pre-school-shortcodes'),
				'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),				
				'value' => $font_icons
		),
		'title' => array(
			'type' => 'textfield',
			'heading' => __('Toggle Content Title', 'pre-school-shortcodes'),
			'description' => __('Add the title that will go above the toggle content', 'pre-school-shortcodes'),
			'std' => __('Title', 'pre-school-shortcodes')
		),
		'title_bg' => array(
			'type' => 'colorpicker',
			'heading' => __('Toggle Content Title Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#adcb69'
		),
		'title_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Toggle Content Title Text Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'content' => array(
			'std' => __(' [p] Insert toggle content here [/p]  ', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Toggle Content', 'pre-school-shortcodes'),
			'description' => __('Add the toggle content. If you are adding more than one line then you can remove [p]...[/p] shortcode because wordpress will automatically add paragraph tag for all next lines.', 'pre-school-shortcodes'),
		)
		
	),
    'shortcode' => '[swmsc_toggle_accordion title="{{title}}" title_bg="{{title_bg}}" title_color="{{title_color}}" icon_name="{{icon_name}}"] {{content}} [/swmsc_toggle_accordion]',
	'no_preview' => true, 
    'clone_button' => __('Add Another Item', 'pre-school-shortcodes')
    )
);


/* ************************************************************************************** 
    BLOCK QUOTE
************************************************************************************** */

$swmsc_shortcodes['blockquote'] = array(
	'params' => array(		
		'content' => array(
			'std' => __('This is sample text for blockquote', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Quote Text', 'pre-school-shortcodes'),
			'description' => __('Add the quote text', 'pre-school-shortcodes'),
		)		
	),
	'shortcode' => '[blockquote] {{content}} [/blockquote]',
	'no_preview' => true, 
	'popup_title' => __('Quote', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
    PULL QUOTES
************************************************************************************** */

$swmsc_shortcodes['pullquote'] = array(
	'params' => array(
		'quote_style' => array(
			'type' => 'dropdown',
			'heading' => __('Quote Style', 'pre-school-shortcodes'),
			'description' => __('Select quote style', 'pre-school-shortcodes'),
			'value' => array(
				__('Pull Quote Left', 'pre-school-shortcodes') => 'pullquote_left',
				__('Pull Quote Right', 'pre-school-shortcodes') => 'pullquote_right'									
			)
		),
		'content' => array(
			'std' => __('This is sample text', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Quote Text', 'pre-school-shortcodes'),
			'description' => __('Add the quote text', 'pre-school-shortcodes'),
		)				
	),
	'shortcode' => '[swmsc_pullquote quote_style="{{quote_style}}"] {{content}} [/swmsc_pullquote]',
	'no_preview' => true, 
	'popup_title' => __('Quote', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
    LIST STYLES
************************************************************************************** */

$swmsc_shortcodes['textlist'] = array(
	'params' => array(
		'style' => array(
			'type' => 'dropdown',
			'heading' => __('Ordered List Style', 'pre-school-shortcodes'),
			'description' => __('Select list style', 'pre-school-shortcodes'),
			'value' => array(					
			__('Steps with circle icons style', 'pre-school-shortcodes')	=>	'steps_with_circle',
			__('Steps with Box style', 'pre-school-shortcodes') 			=>	'steps_with_box',
			__('Lower Roman', 'pre-school-shortcodes') 					=>	'list_lower_roman',
			__('Upper Roman', 'pre-school-shortcodes') 					=>	'list_upper_roman',
			__('Lower Alpha', 'pre-school-shortcodes') 					=>	'list_lower_alpha',
			__('Upper Alpha', 'pre-school-shortcodes')					=>	'list_upper_alpha'
			)
		),
		'content' => array(
			'std' => '
<ol>
<li> Item One </li>
<li> Item Two </li>
<li> Item Three </li>
</ol>',
			'type' => 'textarea_html',
			'heading' => __('List Content', 'pre-school-shortcodes'),
			'description' => '',
		)		
	),
	'shortcode' => '[{{style}}] {{content}} [/{{style}}]',
	'no_preview' => true,
	'popup_title' => __('List', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
    INFO BOXES
************************************************************************************** */

$swmsc_shortcodes['infoboxes'] = array(
	'params' => array(
		'alert_type' => array(
			'type' => 'dropdown',
			'heading' => __('Info Box Style', 'pre-school-shortcodes'),
			'description' => __('Select info box style', 'pre-school-shortcodes'),
			'value' => array(
				__('Info', 'pre-school-shortcodes')		=> 'info',
				__('Success', 'pre-school-shortcodes')	=> 'success', 	 
				__('Error', 'pre-school-shortcodes')		=> 'error', 	 
				__('Warning', 'pre-school-shortcodes')	=> 'warning', 	 
				__('Download', 'pre-school-shortcodes')	=> 'download', 	 
				__('Note', 'pre-school-shortcodes')		=> 'note' 		 
			)
		),
		'close' => array(
			'type' => 'dropdown',
			'heading' => __('Display Close Button', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'				
			)
		),
		'content' => array(
			'std' => __('Sample text', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Info Box Text', 'pre-school-shortcodes'),
			'description' => __('Add the info box text', 'pre-school-shortcodes'),
		)
		
	),
	'shortcode' => '[swmsc_alert alert_type="{{alert_type}}" close="{{close}}" ] {{content}} [/swmsc_alert]',
	'no_preview' => true, 
	'popup_title' => __('Info Box', 'pre-school-shortcodes')
);

/* **************************************************************************************
   LIST ICONS
************************************************************************************** */

$swmsc_shortcodes['iconlist'] = array(
	'params' => array(),
    'no_preview' => true,
    'shortcode' => '[icon_list] {{child_shortcode}} [/icon_list]',
    'popup_title' => __('List Icons', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(
            'icon_name' => array(
				'type' => 'iconpicker',
				'heading' => __('Icon', 'pre-school-shortcodes'),
				'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),				
				'value' => $font_icons
			),
			'icon_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Icon Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#606060'
			),
			'content' => array(
                'std' => 'list item details here',
                'type' => 'textarea_html',
                'heading' => __('List Content', 'pre-school-shortcodes'),
                'description' => '',
            ), 
        ),
        'shortcode' => '[swmsc_list_icon icon_name="{{icon_name}}" icon_color="{{icon_color}}"]{{content}}[/swmsc_list_icon]',
		'no_preview' => true,
        'clone_button' => __('Add Another Item', 'pre-school-shortcodes')
    )
);

/* **************************************************************************************
   ICON
************************************************************************************** */

$swmsc_shortcodes['icon'] = array(
	'params' => array(
		'infotext' => array(
			'type' => 'infotext',
			'heading' => __('Note', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('If you want to display icon without any format then you can use simple shortcode <br /> [fa_icon icon_name="fa-star"] ', 'pre-school-shortcodes')
		),
		'icon_name' => array(
			'type' => 'iconpicker',
			'heading' => __('Icon', 'pre-school-shortcodes'),
			'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),
			'value' => $font_icons
		),
		'icon_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#606060'
		),		
		'icon_size' => array(
			'type' => 'dropdown',
			'heading' => __('Icon Size', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(
				__('Tiny', 'pre-school-shortcodes')		=> 'tiny',
				__('Small', 'pre-school-shortcodes') 	=> 'small',
				__('Medium', 'pre-school-shortcodes')	=> 'medium',
				__('Large', 'pre-school-shortcodes') 	=> 'large',
				__('xlarge', 'pre-school-shortcodes')	=> 'xlarge'
			)
		),
		'icon_style' => array(
			'type' => 'dropdown',
			'heading' => __('Icon Style', 'pre-school-shortcodes'),
			'description' => '',
			'value' => array(
				__('Default', 'pre-school-shortcodes') 					=> 'default',
				__('Icon with Square Shape', 'pre-school-shortcodes') 	=> 'square',
				__('Icon with Circle Shape', 'pre-school-shortcodes') 	=> 'circle'					
			)
		),
		'icon_bg_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Background', 'pre-school-shortcodes'),
			'description' => __('If "Icon Style" drodown is selected "Icon with Square or Circle Shape" then enter icon background color', 'pre-school-shortcodes'),
			'std' => '#FFFFFF'
		),
		'icon_border' => array(
			'type' => 'dropdown',
			'heading' => __('Display Icon Border', 'pre-school-shortcodes'),
			'description' => __('If "Icon Style" drodown is selected "Icon with Square or Circle Shape" then you can add border on square or circle shape', 'pre-school-shortcodes'),
			'value' => array(
				__('No', 'pre-school-shortcodes') 	=> 'false',
				__('Yes', 'pre-school-shortcodes')	=> 'true'
					
			)
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Border Color', 'pre-school-shortcodes'),
			'description' => __('If "Display Icon Border" drodown is selected "Yes" then enter icon border color', 'pre-school-shortcodes'),
			'std' => '#FFFFFF'
		),
		'link' => array(
			'type' => 'textfield',
			'heading' => __('Link', 'pre-school-shortcodes'),
			'description' => __('Enter full url to create clickable icon', 'pre-school-shortcodes'),
			'std' => ''
		),	
		'margin' => array(
			'type' => 'textfield',
			'heading' => __('Margin', 'pre-school-shortcodes'),
			'description' => __('Set margin around icon.', 'pre-school-shortcodes'),
			'std' => '3px'
		),
		'rotate' => array(
			'type' => 'dropdown',
			'heading' => __('Rotate Icon', 'pre-school-shortcodes'),			
			'value' => array(
				__('No', 'pre-school-shortcodes') 	=> 'false',
				__('Yes', 'pre-school-shortcodes')	=> 'true'
			)
		),	
		'animation_style' => array(
			'type' => 'dropdown',
			'heading' => __('Animation Style', 'pre-school-shortcodes'),
			'description' => __('Select icon animation style', 'pre-school-shortcodes'),
			'value' => array(
				__('None', 'pre-school-shortcodes')					=> 'none',				
				__('Expand from Center', 'pre-school-shortcodes')	=> 'swmsc_center_expand',
				__('Move Left to Right', 'pre-school-shortcodes')	=> 'move_left_to_right',
				__('Move Right to Left', 'pre-school-shortcodes')	=> 'move_right_to_left',
				__('Move Top to Bottom', 'pre-school-shortcodes')	=> 'move_top_to_bottom',
				__('Move Bottom to Top', 'pre-school-shortcodes')	=> 'move_bottom_to_top'
			)
		)
	),
	'shortcode' => '[swmsc_icon icon_name="{{icon_name}}" icon_color="{{icon_color}}" icon_size="{{icon_size}}" icon_style="{{icon_style}}" icon_bg_color="{{icon_bg_color}}" icon_border="{{icon_border}}" border_color="{{border_color}}" link="{{link}}" margin="{{margin}}" rotate="{{rotate}}" animation_style="{{animation_style}}" ]',
	'no_preview' => true, 
	'popup_title' => __('Icon', 'pre-school-shortcodes')
);

/* **************************************************************************************
   GAP
************************************************************************************** */

$swmsc_shortcodes['gap'] = array(
	'params' => array(		
		'size' => array(
			'type' => 'textfield',
			'heading' => __('Size', 'pre-school-shortcodes'),
			'description' => __('Enter gap size in pixels, ems, or percentages ( Example: 30px, 3em or 3% ).', 'pre-school-shortcodes'),
			'std' => '30px'
		)			
	),
	'shortcode' => '[gap size="{{size}}"]',
	'no_preview' => true, 
	'popup_title' => __('Gap', 'pre-school-shortcodes')
);

/* **************************************************************************************
   COUNTER BOXES
************************************************************************************** */

$swmsc_shortcodes['counterboxes'] = array(
	'params' => array(),
    'no_preview' => true,
    'shortcode' => '[swmsc_counter_boxes] {{child_shortcode}} [/swmsc_counter_boxes]',
    'popup_title' => __('Counter Box', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(
            'box_bg_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Box Background Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#FFFFFF'
			),
			'font_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Font Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#606060'
			),
			'icon_name' => array(
				'type' => 'iconpicker',
				'heading' => __('Icon', 'pre-school-shortcodes'),
				'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),
				'value' => $font_icons
			),
			'icon_bg_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Icon Background Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#606060'
			),
			'icon_color' => array(
				'type' => 'colorpicker',
				'heading' => __('Icon Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#FFFFFF'
			),
			'counter_number' => array(
				'type' => 'textfield',
				'heading' => __('Counter Number', 'pre-school-shortcodes'),
				'description' => __('Counter will animated above numter', 'pre-school-shortcodes'),
				'std' => '1000'
			),
			'unit' => array(
				'type' => 'textfield',
				'heading' => __('Unit', 'pre-school-shortcodes'),
				'description' => __('Enter the unit for the counter number ( Example %, $, + ).', 'pre-school-shortcodes'),
				'std' => ''
			),
			'unit_position' => array(
				'type' => 'dropdown',
				'heading' => __('Unit Position', 'pre-school-shortcodes'),
				'description' => '',
				'value' => array(
					__('Before Number', 'pre-school-shortcodes') => 'before_number',
					__('After Number', 'pre-school-shortcodes') => 'after_number'				
				)
			),
			'speed' => array(
				'type' => 'textfield',
				'heading' => __('Animation Speed', 'pre-school-shortcodes'),
				'description' => __('Add animation speed in miliseconds ( Example 1000 = 1 second, 5000 = 5 second. )', 'pre-school-shortcodes'),
				'std' => '2000'
			),
			'column' => array(
				'type' => 'dropdown',
				'heading' => __('Columln', 'pre-school-shortcodes'),
				'description' => __('Select counter box display column', 'pre-school-shortcodes'),
				'value' => array(
					__('2', 'pre-school-shortcodes') => '2',
					__('3', 'pre-school-shortcodes') => '3',
					__('4', 'pre-school-shortcodes') => '4',
					__('5', 'pre-school-shortcodes') => '5' 					
				)
			),
			'content' => array(
				'std' => __('description text', 'pre-school-shortcodes'),
				'type' => 'textarea_html',
				'heading' => __('Small Description text', 'pre-school-shortcodes'),
				'description' => '',
			)	            
        ),
        'shortcode' => '[swmsc_counter_box box_bg_color="{{box_bg_color}}" font_color="{{font_color}}" icon_name="{{icon_name}}" icon_bg_color="{{icon_bg_color}}" icon_color="{{icon_color}}" counter_number="{{counter_number}}" unit="{{unit}}" unit_position="{{unit_position}}" speed="{{speed}}" column="{{column}}"]{{content}}[/swmsc_counter_box]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Item', 'pre-school-shortcodes')
    )
);

/* **************************************************************************************
   PROGRESS BAR
************************************************************************************** */

$swmsc_shortcodes['progressbars'] = array(
	'params' => array(),
    'no_preview' => true,
    'shortcode' => '{{child_shortcode}}',
    'popup_title' => __('Skill Bar', 'pre-school-shortcodes'),
    
    'child_shortcode' => array(
        'params' => array(
            'percentage' => array(
				'type' => 'dropdown',
				'heading' => __('Percentage', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '80',
				'value' => swmsc_one_to_final_number( 100, false, false )
			),
			'title_text' => array(
				'type' => 'textfield',
				'heading' => __('Title Text', 'pre-school-shortcodes'),
				'description' => '',
				'std' => 'Skill Name'
			),
			'background' => array(
				'type' => 'colorpicker',
				'heading' => __('Background Color', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '#606060'
			)			            
        ),
        'shortcode' => '[swmsc_progress_bar percentage="{{percentage}}" title_text="{{title_text}}" background="{{background}}"]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Item', 'pre-school-shortcodes')
    )
);

/* **************************************************************************************
   FANCY HEADING
************************************************************************************** */

$swmsc_shortcodes['fancyheading'] = array(
	'params' => array(		
		'content' => array(
			'std' => __('Title Text Here', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Section Title', 'pre-school-shortcodes'),
			'description' => ''
		),	
		'font_size' => array(
				'type' => 'dropdown',
				'heading' => __('Font Size', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '30',
				'value' => $swmsc_sc_font_size
		),	
		'text_align' => array(
			'type' => 'dropdown',
			'heading' => __('Title Align', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'repeat',
			'value' => array(
				__( 'Center', 'pre-school-shortcodes' ) => 'center',
		        __( 'Left', 'pre-school-shortcodes' ) => 'left',
		        __( 'Right', 'pre-school-shortcodes' ) => 'right'  										
			)
		),
		'icon_name' => array(
			'type' => 'iconpicker',
			'heading' => __('Bottom Border Icon', 'pre-school-shortcodes'),
			'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),
			'value' => $font_icons
		),
		'icon_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#8373ce'
		),		
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Border Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#f8b54d'
		),
		'line_height' => array(
				'type' => 'dropdown',
				'heading' => __('Line Height', 'pre-school-shortcodes'),
				'description' => '',
				'std' => '36',
				'value' => $swmsc_sc_font_size
		),
		'margin_top' => array(
			'type' => 'textfield',
			'heading' => __('Margin Top', 'pre-school-shortcodes'),
			'description' => __('Enter title margin top value in pixels or em. ( Example 20px, 2em )', 'pre-school-shortcodes'),
			'std' => '40px'
		),
		'margin_bottom' => array(
			'type' => 'textfield',
			'heading' => __('Margin Bottom', 'pre-school-shortcodes'),
			'description' => __('Enter title margin bottom value in pixels or em. ( Example 20px, 2em )', 'pre-school-shortcodes'),
			'std' => '40px'
		),		

		'section_id' => array(
			'type' => 'textfield',
			'heading' => __('Section ID (optional)', 'pre-school-shortcodes'),
			'description' => __('Enter unique ID to style heading section with custom CSS style.', 'pre-school-shortcodes'),
			'std' => ''
		)	
	),
	'shortcode' => '[swmsc_fancy_heading font_size="{{font_size}}" text_align="{{text_align}}" icon_name="{{icon_name}}" icon_color="{{icon_color}}" border_color="{{border_color}}" line_height="{{line_height}}" margin_bottom="{{margin_bottom}}" margin_top="{{margin_top}}" section_id="{{section_id}}" ]{{content}}[/swmsc_fancy_heading]',
	'no_preview' => true, 
	'popup_title' => __('Fancy Heading', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
    DROPCAPS
************************************************************************************** */

$swmsc_shortcodes['dropcaps'] = array(
	'params' => array(		
		'dropcap_style' => array(
			'type' => 'dropdown',
			'heading' => __('Dropcap Style', 'pre-school-shortcodes'),
			'description' => __('Select dropcaps style', 'pre-school-shortcodes'),
			'value' => array(				
				__('Light', 'pre-school-shortcodes') => 'light',
				__('Dark', 'pre-school-shortcodes') => 'dark' 				
			)
		),
		'border_radius' => array(
			'std' => '5px',
			'type' => 'textfield',
			'heading' => __('Dropcap Border Radius', 'pre-school-shortcodes')		
		),
		'content' => array(
			'std' => __('A', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Dropcap Text', 'pre-school-shortcodes'),
			'description' => __('Add the dropcap text', 'pre-school-shortcodes'),
		)
		
	),
	'shortcode' => '[swmsc_dropcap dropcap_style="{{dropcap_style}}" border_radius="{{border_radius}}"] {{content}} [/swmsc_dropcap]',
	'no_preview' => true, 
	'popup_title' => __('Dropcaps', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
    FONT
************************************************************************************** */

$swmsc_shortcodes['font'] = array(
	'params' => array(		
		'color' => array(
			'type' => 'colorpicker',
			'heading' => __('Font Color', 'pre-school-shortcodes'),			
			'std' => ''
		),
		'size' => array(
			'type' => 'dropdown',
			'heading' => __('Font Size', 'pre-school-shortcodes'),			
			'std' => '22',
			'value' => $swmsc_sc_font_size
		),	
		'line_height' => array(
			'type' => 'dropdown',
			'heading' => __('Font Line Height', 'pre-school-shortcodes'),			
			'std' => '22',
			'value' => $swmsc_sc_font_size
		),		
		'weight' => array(
			'type' => 'dropdown',
			'heading' => __('Font Weight', 'pre-school-shortcodes'),			
			'value' => array(				
				__('Normal', 'pre-school-shortcodes') => 'normal',
				__('Bold', 'pre-school-shortcodes') => 'bold' 				
			)
		),	
		'content' => array(
			'std' => __('Your Text Here', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Description Text', 'pre-school-shortcodes')
		)
		
	),
	'shortcode' => '[swmsc_font weight="{{weight}}" size="{{size}}" color="{{color}}" line_height="{{line_height}}"] {{content}} [/swmsc_font]',
	'no_preview' => true, 
	'popup_title' => __('Font', 'pre-school-shortcodes')
);

/* **************************************************************************************
   FULL WIDTH SECTION
************************************************************************************** */

$swmsc_shortcodes['fullwidthsection'] = array(
	'params' => array(		
		'background_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Background Color', 'pre-school-shortcodes'),
			'description' => __('Set section backgorund color', 'pre-school-shortcodes'),
			'std' => '#ffffff'
		),	
		'background_image' => $background_image,		
		'background_repeat' => $background_repeat,
		'background_position' => $background_position,
		'background_attachment' => array(
			'type' => 'dropdown',
			'heading' => __('Background Attachment', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'fixed',
			'value' => array(
				__( 'Scroll', 'pre-school-shortcodes' ) => 'scroll',
       			__( 'Fixed', 'pre-school-shortcodes' ) => 'fixed'   									
			)
		),	
		'background_stretch' => array(
			'type' => 'dropdown',
			'heading' => __('100% Background Image Width', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'false',
			'value' => array(
				__('No', 'pre-school-shortcodes') 	=> 'false',
				__('Yes', 'pre-school-shortcodes')	=> 'true' 									
			)
		),
		'border_width' => array(
			'type' => 'dropdown',
			'heading' => __('Border Width', 'pre-school-shortcodes'),	
			'description' => __('If you want to make section with border then set border width and then set top and/or bottom border colors', 'pre-school-shortcodes'),		
			'std' => '0',
			'value' => swmsc_one_to_final_number( 10, false, false, 0 )
		),	
		'border_top_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Top Border Color', 'pre-school-shortcodes'),
			'std' => ''
		),
		'border_bottom_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Bottom Border Color', 'pre-school-shortcodes'),			
			'std' => ''
		),
		'arrow_direction' => array(
			'type' => 'dropdown',
			'heading' => __('Arrow Direction', 'pre-school-shortcodes'),
			'description' => __('If you want to make section with top or bottom direction arrow then select from above drop down.', 'pre-school-shortcodes'),
			'std' => 'fixed',
			'value' => array(
				__( 'Hide Arrow', 'pre-school-shortcodes' ) 				=> 'none',
				__( 'Display Arrow Top', 'pre-school-shortcodes' ) 		=> 'top',
       			__( 'Display Arrow Bottom', 'pre-school-shortcodes' )	=> 'bottom'
			)
		),
		'arrow_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Arrow Color', 'pre-school-shortcodes'),			
			'std' => ''
		),
		'padding_top' => array(
			'type' => 'textfield',
			'heading' => __('Padding Top', 'pre-school-shortcodes'),
			'description' => __('Enter section padding top value in pixels or em. ( Example 20px, 2em )', 'pre-school-shortcodes'),
			'std' => '40px'
		),
		'padding_bottom' => array(
			'type' => 'textfield',
			'heading' => __('Padding Bottom', 'pre-school-shortcodes'),
			'description' => __('Enter section padding bottom value in pixels or em. ( Example 20px, 2em )', 'pre-school-shortcodes'),
			'std' => '40px'
		),		
		'font_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Section Font Color', 'pre-school-shortcodes'),			
			'std' => '#606060'
		),
		'id' => array(
			'type' => 'textfield',
			'heading' => __('Section ID (optional)', 'pre-school-shortcodes'),
			'description' => __('Enter unique ID to style this section with custom CSS style.', 'pre-school-shortcodes'),
			'std' => ''
		),
		'content' => array(
			'std' => __('Add section content here', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Section Content', 'pre-school-shortcodes'),
			'description' => ''
		)			
	),
	'shortcode' => '[swmsc_section background_color="{{background_color}}" background_image="{{background_image}}" background_repeat="{{background_repeat}}" background_position="{{background_position}}" background_attachment="{{background_attachment}}" background_stretch="{{background_stretch}}"  padding_top="{{padding_top}}" padding_bottom="{{padding_bottom}}" font_color="{{font_color}}" border_top_color="{{border_top_color}}" border_bottom_color="{{border_bottom_color}}" border_width="{{border_width}}" arrow_direction="{{arrow_direction}}" arrow_color="{{arrow_color}}" id="{{id}}" ]{{content}}[/swmsc_section]',
	'no_preview' => true, 
	'popup_title' => __('Full Width Section for "Page"', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
	SERVICES
************************************************************************************** */

$swmsc_shortcodes['services'] = array(
	'params' => array(
		'icon_name' => array(
			'type' => 'iconpicker',
			'heading' => __('Service Icon', 'pre-school-shortcodes'),
			'value' => $font_icons
		),
		'title' => array(
			'std' => __('Service Title', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Service Title', 'pre-school-shortcodes'),
			'description' => ''
		),
		'content' => array(
			'std' => __('Service description text here', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Service Description', 'pre-school-shortcodes'),
			'description' => ''
		),
		'skin_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Skin Color', 'pre-school-shortcodes'),			
			'std' => '#adcb69'
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Border Color', 'pre-school-shortcodes'),			
			'std' => '#fdd94e'
		),
		'text_align' => array(
			'type' => 'dropdown',
			'heading' => __('Text Align', 'pre-school-shortcodes'),
			'value' => array(	
				__('Left', 'pre-school-shortcodes') 	=> 'left',
				__('Right', 'pre-school-shortcodes') => 'right' 
			)
		)
		
	),
	'shortcode' => '[swmsc_school_service icon_name="{{icon_name}}" title="{{title}}" skin_color="{{skin_color}}" border_color="{{border_color}}" text_align="{{text_align}}"] {{content}} [/swmsc_school_service]',
	'no_preview' => true, 
	'popup_title' => __('Services', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
	SERVICES - ICON STYLE
************************************************************************************** */

$swmsc_shortcodes['servicesicons'] = array(
	'params' => array(
		'title_text' => array(
			'std' => __('Service Title', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Service Title', 'pre-school-shortcodes'),
			'description' => ''
		),
		'content' => array(
			'std' => __('Service description text here', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Service Description', 'pre-school-shortcodes'),
			'description' => ''
		),
		'title_text_size' => array(
			'std' => '18px',
			'type' => 'textfield',
			'heading' => __('Title Text Size', 'pre-school-shortcodes'),
		),
		'title_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Title Text Color', 'pre-school-shortcodes'),			
			'std' => '#444444'
		),
		'title_bottom_margin' => array(
			'type' => 'textfield',
			'heading' => __('Title Text Bottom Margin', 'pre-school-shortcodes'),
			'std' => '10px'
		),
		'title_icon_link' => array(
			'std' => '',
			'type' => 'textfield',
			'heading' => __('Link on Title Text and Icon', 'pre-school-shortcodes'),
		),
		'icon_space' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Space Between Icon and Content', 'pre-school-shortcodes'),
			'description' => __('Enter margin between icon and content in pixels', 'pre-school-shortcodes'),
		),
		'icon_name' => array(
			'type' => 'iconpicker',
			'heading' => __('Service Icon', 'pre-school-shortcodes'),
			'std' => 'fa-star',
			'value' => $font_icons
		),
		'icon_position' => array(
			'type' => 'dropdown',
			'heading' => __('Icon Position', 'pre-school-shortcodes'),
			'std' => 'left',
			'value' => array(	
				__('Left', 'pre-school-shortcodes') 	=> 'left',
				__('Center', 'pre-school-shortcodes') 	=> 'center',
				__('Right', 'pre-school-shortcodes') => 'right' 
			)
		),
		'icon_size' => array(
			'type' => 'dropdown',
			'heading' => __('Icon Size', 'pre-school-shortcodes'),
			'std' => 'medium',
			'value' => array(	
				__('Tiny', 'pre-school-shortcodes') 	=> 'tiny',
				__('Small', 'pre-school-shortcodes') 	=> 'small',
				__('Medium', 'pre-school-shortcodes') 	=> 'medium',
				__('Large', 'pre-school-shortcodes') 	=> 'large',
				__('X-Large', 'pre-school-shortcodes') 	=> 'x-large',
				__('Super Large', 'pre-school-shortcodes') 	=> 'super-large' 
			)
		),
		'icon_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Color', 'pre-school-shortcodes'),			
			'std' => '#444444'
		),
		'icon_style' => array(
			'type' => 'dropdown',
			'heading' => __('Icon Display Style', 'pre-school-shortcodes'),
			'std' => 'icon_box',
			'value' => array(	
				__('Icon with Border and Background Box', 'pre-school-shortcodes') 	=> 'icon_box',
				__('Simple Icon', 'pre-school-shortcodes') 	=> 'icon_nobox'
			)
		),
		'icon_background' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Background Color', 'pre-school-shortcodes'),
			'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'pre-school-shortcodes'),		
			'std' => '#ffffff'
		),
		'border_width' => array(
			'std' => '1px',
			'type' => 'textfield',
			'heading' => __('Icon Box Border Width', 'pre-school-shortcodes'),
			'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'pre-school-shortcodes'),
		),
		'border_radius' => array(
			'std' => '5px',
			'type' => 'textfield',
			'heading' => __('Icon Box Border Radius', 'pre-school-shortcodes'),
			'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'pre-school-shortcodes'),
		),
		'border_type' => array(
			'type' => 'dropdown',
			'heading' => __('Icon Box Border Type', 'pre-school-shortcodes'),
			'std' => 'medium',
			'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'pre-school-shortcodes'),
			'value' => array(	
				__('Solid', 'pre-school-shortcodes') 	=> 'solid',
				__('Dotted', 'pre-school-shortcodes') 	=> 'dotted',
				__('Dashed', 'pre-school-shortcodes') 	=> 'dashed',
				__('Double', 'pre-school-shortcodes') 	=> 'double'
			)
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Box Border Color', 'pre-school-shortcodes'),	
			'description' => __('Skip this option if "Icon Display Style" is "Simple Icon"', 'pre-school-shortcodes'),		
			'std' => '#e6e6e6'
		),
		'responsive_width' => array(
			'std' => '767px',
			'type' => 'textfield',
			'heading' => __('Responsive Width', 'pre-school-shortcodes'),
			'description' => __('Enter responsive width where icon will move from left or right to center. It depends on column and icon size. If you are using services in 4 column then responsive width should be iPad width (979) and for 2 column iPhone horizontal (767). Responsive Width Number is flexible to any size (e.g. 0 to 1200 or more).', 'pre-school-shortcodes'),		
		)
		
	),
	'shortcode' => '[swmsc_service_style_icon title_text="{{title_text}}" title_text_size="{{title_text_size}}" title_text_color="{{title_text_color}}" title_bottom_margin="{{title_bottom_margin}}" title_icon_link="{{title_icon_link}}" icon_space="{{icon_space}}" icon_name="{{icon_name}}" icon_position="{{icon_position}}" icon_size="{{icon_size}}" icon_color="{{icon_color}}" icon_style="{{icon_style}}" icon_background="{{icon_background}}" border_width="{{border_width}}" border_radius="{{border_radius}}" border_type="{{border_type}}" border_color="{{border_color}}" responsive_width="{{responsive_width}}"] {{content}} [/swmsc_service_style_icon]',
	'no_preview' => true, 
	'popup_title' => __('Services - Icon Style', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
	SERVICES - IMAGE STYLE
************************************************************************************** */

$swmsc_shortcodes['servicesimages'] = array(
	'params' => array(
		'title_text' => array(
			'std' => __('Service Title', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Service Title', 'pre-school-shortcodes'),
			'description' => ''
		),
		'content' => array(
			'std' => __('Service description text here', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Service Description', 'pre-school-shortcodes'),
			'description' => ''
		),
		'title_text_size' => array(
			'std' => '18px',
			'type' => 'textfield',
			'heading' => __('Title Text Size', 'pre-school-shortcodes'),
		),
		'title_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Title Text Color', 'pre-school-shortcodes'),			
			'std' => '#444444'
		),
		'title_image_link' => array(
			'std' => '',
			'type' => 'textfield',
			'heading' => __('Link on Title Text and Image', 'pre-school-shortcodes'),
		),
		'title_bottom_margin' => array(
			'type' => 'textfield',
			'heading' => __('Title Text Bottom Margin', 'pre-school-shortcodes'),
			'std' => '10px'
		),
		'image_space' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Space Between Image and Content', 'pre-school-shortcodes'),
			'description' => __('Enter margin between icon and content in pixels', 'pre-school-shortcodes'),
		),
		'image_src' => array(
			'type' => 'attach_image',
			'heading' => __('Image', 'pre-school-shortcodes'),
			'description' => __('Upload image. Image width and height size is flexible.', 'pre-school-shortcodes')			
		),
		'image_position' => array(
			'type' => 'dropdown',
			'heading' => __('Image Position', 'pre-school-shortcodes'),
			'std' => 'center',
			'value' => array(	
				__('Left', 'pre-school-shortcodes') 	=> 'left',
				__('Center', 'pre-school-shortcodes') 	=> 'center',
				__('Right', 'pre-school-shortcodes') => 'right' 
			)
		),
		'border_width' => array(
			'std' => '1px',
			'type' => 'textfield',
			'heading' => __('Image Border Width', 'pre-school-shortcodes'),
			'description' => __('You can hide border with "0px" image width size.', 'pre-school-shortcodes'),
		),
		'border_radius' => array(
			'std' => '5px',
			'type' => 'textfield',
			'heading' => __('Image Border Radius', 'pre-school-shortcodes')
		),
		'border_type' => array(
			'type' => 'dropdown',
			'heading' => __('Image Border Type', 'pre-school-shortcodes'),
			'std' => 'medium',
			'value' => array(	
				__('Solid', 'pre-school-shortcodes') 	=> 'solid',
				__('Dotted', 'pre-school-shortcodes') 	=> 'dotted',
				__('Dashed', 'pre-school-shortcodes') 	=> 'dashed',
				__('Double', 'pre-school-shortcodes') 	=> 'double'
			)
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Image Border Color', 'pre-school-shortcodes'),
			'std' => '#e6e6e6'
		),
		'padding' => array(
			'std' => '0px',
			'type' => 'textfield',
			'heading' => __('Padding', 'pre-school-shortcodes'),
			'description' => __('Space between image and border.', 'pre-school-shortcodes'),
		),
		'responsive_width' => array(
			'std' => '767px',
			'type' => 'textfield',
			'heading' => __('Responsive Width', 'pre-school-shortcodes'),
			'description' => __('Enter responsive width where icon will move from left or right to center. It depends on column and icon size. If you are using services in 4 column then responsive width should be iPad width (979) and for 2 column iPhone horizontal (767). Responsive Width Number is flexible to any size (e.g. 0 to 1200 or more).', 'pre-school-shortcodes'),		
		)
		
	),
	'shortcode' => '[swmsc_service_style_image title_text="{{title_text}}" title_text_size="{{title_text_size}}" title_text_color="{{title_text_color}}" title_bottom_margin="{{title_bottom_margin}}" title_image_link="{{title_image_link}}" image_src="{{image_src}}" image_position="{{image_position}}" border_width="{{border_width}}" border_type="{{border_type}}" border_radius="{{border_radius}}" border_color="{{border_color}}" padding="{{padding}}" image_space="{{image_space}}"  responsive_width="{{responsive_width}}"] {{content}} [/swmsc_service_style_image]',
	'no_preview' => true, 
	'popup_title' => __('Services - Image Style', 'pre-school-shortcodes')
);


/* ************************************************************************************** 
	SERVICES - SIMPLE ICON AND TITLE
************************************************************************************** */

$swmsc_shortcodes['servicesiconstitles'] = array(
	'params' => array(
		'title_text' => array(
			'std' => __('Service Title', 'pre-school-shortcodes'),
			'type' => 'textfield',
			'heading' => __('Service Title', 'pre-school-shortcodes'),
			'description' => ''
		),
		'text_icon_size' => array(
			'std' => '18px',
			'type' => 'textfield',
			'heading' => __('Title Text & Icon Size', 'pre-school-shortcodes'),
		),
		'title_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Title Text Color', 'pre-school-shortcodes'),			
			'std' => '#444444'
		),
		'title_icon_link' => array(
			'std' => '',
			'type' => 'textfield',
			'heading' => __('Link on Title Text and Icon', 'pre-school-shortcodes'),
		),
		'margin_bottom' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Space Between Icon and Content', 'pre-school-shortcodes'),
			'description' => __('Enter margin between icon and content in pixels', 'pre-school-shortcodes'),
		),
		'icon_name' => array(
			'type' => 'iconpicker',
			'heading' => __('Service Icon', 'pre-school-shortcodes'),
			'std' => 'fa-star',
			'value' => $font_icons
		),
		'text_align' => array(
			'type' => 'dropdown',
			'heading' => __('Text Align', 'pre-school-shortcodes'),
			'std' => 'left',
			'value' => array(	
				__('Left', 'pre-school-shortcodes') 	=> 'left',
				__('Center', 'pre-school-shortcodes') 	=> 'center',
				__('Right', 'pre-school-shortcodes') => 'right' 
			)
		),
		'icon_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Color', 'pre-school-shortcodes'),			
			'std' => '#444444'
		)		
	),
	'shortcode' => '[swmsc_icon_title title_text="{{title_text}}" text_icon_size="{{text_icon_size}}" title_text_color="{{title_text_color}}" title_icon_link="{{title_icon_link}}" margin_bottom="{{margin_bottom}}" icon_name="{{icon_name}}" text_align="{{text_align}}" icon_color="{{icon_color}}"]',
	'no_preview' => true, 
	'popup_title' => __('Services - Simple Icon and Title Style', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
	SERVICES BOX
************************************************************************************** */

$swmsc_shortcodes['servicesbox'] = array(
	'params' => array(
		'content' => array(
			'std' => __('Content text here', 'pre-school-shortcodes'),
			'type' => 'textarea_html',
			'heading' => __('Content', 'pre-school-shortcodes'),
			'description' => __('Content', 'pre-school-shortcodes'),
		),
		'background_image' => $background_image,		
		'background_repeat' => $background_repeat,
		'background_position' => $background_position,
		'background_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Box Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'border_width' => array(
			'std' => '1px',
			'type' => 'textfield',
			'heading' => __('Box Border Width', 'pre-school-shortcodes'),
		),
		'border_type' => array(
			'type' => 'dropdown',
			'heading' => __('Box Border Type', 'pre-school-shortcodes'),
			'std' => 'solid',
			'value' => array(	
				__('Solid', 'pre-school-shortcodes') 	=> 'solid',
				__('Dotted', 'pre-school-shortcodes') 	=> 'dotted',
				__('Dashed', 'pre-school-shortcodes') 	=> 'dashed',
				__('Double', 'pre-school-shortcodes') 	=> 'double'
			)
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Box Border Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#e6e6e6'
		),		
		'border_radius' => array(
			'type' => 'textfield',
			'heading' => __('Box Border Radius', 'pre-school-shortcodes'),
			'std' => '0'		
		),	
		'box_padding' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Box Padding', 'pre-school-shortcodes'),
			'description' => __('Inner space between box and content in pixels', 'pre-school-shortcodes'),
		),
		'margin_bottom' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Magin Bottom', 'pre-school-shortcodes'),
			'description' => __('Enter bottom margin in pixels', 'pre-school-shortcodes'),
		),
		'image_width' => array(
			'type' => 'dropdown',
			'heading' => __('Content Image Width', 'pre-school-shortcodes'),
			'std' => 'auto_width',
			'description' => __('Image width feature to set as per box width.', 'pre-school-shortcodes'),
			'value' => array(	
				__('Auto Width', 'pre-school-shortcodes') 	=> 'auto_width',
				__('Full - 100% Width of Box', 'pre-school-shortcodes') 	=> 'full_width'
			)
		),	
	),
	'shortcode' => '[swmsc_content_box margin_bottom="{{margin_bottom}}" box_padding="{{box_padding}}" border_width="{{border_width}}" border_type="{{border_type}}" border_color="{{border_color}}" border_radius="{{border_radius}}" background_color="{{background_color}}" background_image="{{background_image}}" background_repeat="{{background_repeat}}" background_position="{{background_position}}" image_width="{{image_width}}"] {{content}} [/swmsc_content_box]',
	'no_preview' => true, 
	'popup_title' => __('Services - Content Box', 'pre-school-shortcodes')
);

/* ************************************************************************************** 
   EVENTS
************************************************************************************** */

$swmsc_shortcodes['events'] = array(
    'params' => array(
		'event_type' => array(
			'type' => 'dropdown',
			'heading' => __('Event Type', 'pre-school-shortcodes'),
			'std' => 'upcoming',
			'value' => array(
				__('Upcoming Events', 'pre-school-shortcodes')	=> 'upcoming',
				__('Past Events', 'pre-school-shortcodes')	 	=> 'past' 					
			)
		),
		'display_events' => array(
			'type' => 'textfield',
			'heading' => __('Post Limit', 'pre-school-shortcodes'),
			'description' => __('Number of posts to display', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'excerpt' => array(
			'type' => 'dropdown',
			'heading' => __('Display Excerpt', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'													
			)		         
		),
		'address' => array(
			'type' => 'dropdown',
			'heading' => __('Display Address', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'													
			)		         
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add events categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
			'std' => ''		
		)
	),
    	
    'no_preview' => true,
    'shortcode' => '[swmsc_events event_type="{{event_type}}" display_events="{{display_events}}" excerpt="{{excerpt}}" address="{{address}}" exclude="{{exclude}}" ]',
    'popup_title' => __('Insert Events Shortcode', 'pre-school-shortcodes'),    
   
);

/* ************************************************************************************** 
   EVENTS SQUARE STYLE
************************************************************************************** */

$swmsc_shortcodes['eventssquare'] = array(
    'params' => array(
		'event_type' => array(
			'type' => 'dropdown',
			'heading' => __('Event Type', 'pre-school-shortcodes'),
			'std' => 'upcoming',
			'value' => array(
				__('Upcoming Events', 'pre-school-shortcodes')	=> 'upcoming',
				__('Past Events', 'pre-school-shortcodes')	 	=> 'past' 					
			)
		),
		'display_events' => array(
			'type' => 'textfield',
			'heading' => __('Post Limit', 'pre-school-shortcodes'),
			'description' => __('Number of posts to display', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'desc_limit' => array(
			'type' => 'textfield',
			'heading' => __('Description Limit', 'pre-school-shortcodes'),
			'description' => __('Number of characters to display in summery text', 'pre-school-shortcodes'),
			'std' => '150'
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add events categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
			'std' => ''		
		)
	),
    	
    'no_preview' => true,
    'shortcode' => '[swmsc_events_posts_square event_type="{{event_type}}" display_events="{{display_events}}" desc_limit="{{desc_limit}}" exclude="{{exclude}}" ]',
    'popup_title' => __('Insert Events Shortcode', 'pre-school-shortcodes'),    
   
);

/* ************************************************************************************** 
   PORTFOLIO
************************************************************************************** */

$swmsc_shortcodes['portfolio'] = array(
    'params' => array(
		'display_items' => array(
			'type' => 'textfield',
			'heading' => __('Post Limit', 'pre-school-shortcodes'),
			'description' => __('Number of posts to display', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'excerpt' => array(
			'type' => 'dropdown',
			'heading' => __('Display Excerpt', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'												
			)		         
		),
		'title_section' => array(
			'type' => 'dropdown',
			'heading' => __('Display Title', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'											
			)		         
		),
		'column' => array(
			'type' => 'dropdown',
			'heading' => __('Display Column', 'pre-school-shortcodes'),
			'description' => __('Select display column for recent work items', 'pre-school-shortcodes'),
			'std' => '3',
			'value' => array(
				__('2 Column', 'pre-school-shortcodes') => '2',
				__('3 Column', 'pre-school-shortcodes') => '3',
				__('4 Column', 'pre-school-shortcodes') => '4' 								
			)
		),
		'lightbox' => array(
			'type' => 'dropdown',
			'heading' => __('Lightbox', 'pre-school-shortcodes'),
			'description' => __('Select event you want after click on thumbnail', 'pre-school-shortcodes'),
			'value' => array(
				__('Display Large Image In Lightbox', 'pre-school-shortcodes') => 'true',
				__('Disable Lightbox and Go to link page', 'pre-school-shortcodes') => 'false' 														
			)		         
		),
		'title_text_link' => array(
			'type' => 'dropdown',
			'heading' => __('Add link on Portfolio Title Text', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'													
			)		         
		),
		'title_text_size' => array(
			'type' => 'dropdown',
			'heading' => __('Title Text Size', 'pre-school-shortcodes'),			
			'std' => '20',
			'value' => $swmsc_sc_font_size
		),	
		'title_text_line_height' => array(
			'type' => 'textfield',
			'heading' => __('Title Text Line Height', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '30px'
		),
		'excerpt_text_size' => array(
			'type' => 'dropdown',
			'heading' => __('Excerpt Font Size', 'pre-school-shortcodes'),			
			'std' => '16',
			'value' => $swmsc_sc_font_size
		), 
		'excerpt_text_line_height' => array(
			'type' => 'textfield',
			'heading' => __('Excerpt Text Line Height', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '24px'
		),
		'item_space' => array(
			'type' => 'textfield',
			'heading' => __('Space Between Two Items', 'pre-school-shortcodes'),
			'description' => __('Add space between two portfolio items. Enter only <strong>numbers</strong>.', 'pre-school-shortcodes'),
			'std' => '12'
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add portfolio categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
			'std' => ''		
		),
		'infotext' => array(
			'type' => 'infotext',
			'heading' => __('Note:', 'pre-school-shortcodes'),
			'description' => '',
			'std' => __('Upload recent work items from left sidebar menu Portfolio > Add New ', 'pre-school-shortcodes')
		)
	),
    	
    'no_preview' => true,
    'shortcode' => '[swmsc_portfolio display_items="{{display_items}}" excerpt="{{excerpt}}" title_section="{{title_section}}" column="{{column}}" lightbox="{{lightbox}}" title_text_size="{{title_text_size}}" title_text_line_height="{{title_text_line_height}}" excerpt_text_size="{{excerpt_text_size}}" excerpt_text_line_height="{{excerpt_text_line_height}}" title_text_link="{{title_text_link}}" item_space="{{item_space}}" exclude="{{exclude}}" ]',
    'popup_title' => __('Insert Portfolio Shortcode', 'pre-school-shortcodes'),    
   
);

/* ************************************************************************************** 
   CLASSES
************************************************************************************** */

$swmsc_shortcodes['classes'] = array(
    'params' => array(
		'display_items' => array(
			'type' => 'textfield',
			'heading' => __('Post Limit', 'pre-school-shortcodes'),
			'description' => __('Number of posts to display', 'pre-school-shortcodes'),
			'std' => '3'		
		),
		'excerpt' => array(
			'type' => 'dropdown',
			'heading' => __('Display Excerpt', 'pre-school-shortcodes'),			
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'												
			)		         
		),
		'column' => array(
			'type' => 'dropdown',
			'heading' => __('Column', 'pre-school-shortcodes'),		
			'std' => '3',	
			'value' => array(
				'3'	=> '3',
				'2' => '2',
				'1' => '1'												
			)		         
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add events categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
			'std' => ''		
		)
	),
    	
    'no_preview' => true,
    'shortcode' => '[swmsc_classes display_items="{{display_items}}"  excerpt="{{excerpt}}" column="{{column}}" exclude="{{exclude}}" ]',
    'popup_title' => __('Insert Classes Shortcode', 'pre-school-shortcodes'),    
   
);

/* ************************************************************************************** 
   LOGO SLIDER
************************************************************************************** */

$swmsc_shortcodes['logoslider'] = array(
    'params' => array(
		'display_logos' => array(
			'type' => 'textfield',
			'heading' => __('Number of Logo Thumbnails', 'pre-school-shortcodes'),
			'description' => __('Enter number of logo thumbnails to display in slider', 'pre-school-shortcodes'),
			'std' => '20'		
		),
		'margin' => array(
			'type' => 'textfield',
			'heading' => __('Thumbnail Margin', 'pre-school-shortcodes'),
			'description' => __('Enter margin between two thumbnails in pixels e.g. "5px" "10px"', 'pre-school-shortcodes'),
			'std' => '-1px'		
		),
		'lightbox' => array(
			'type' => 'dropdown',
			'heading' => __('Lightbox', 'pre-school-shortcodes'),
			'description' => __('Select event you want after click on thumbnail', 'pre-school-shortcodes'),
			'std' => 'false',
			'value' => array(
				__('Disable Lightbox and Go to link page', 'pre-school-shortcodes')	=> 'false',												
				__('Display Large Image In Lightbox', 'pre-school-shortcodes')		=> 'true'
			)
		),
		'arrow_navigation' => array(
			'type' => 'dropdown',
			'heading' => __('Display Arrow Navigation', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'false',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),		
		'slide_interval' => array(
			'type' => 'textfield',
			'heading' => __('Slideshow Speed', 'pre-school-shortcodes'),
			'description' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'pre-school-shortcodes'),
			'std' => '5000'		
		),
		'auto_play' => array(
			'type' => 'dropdown',
			'heading' => __('Auto Play', 'pre-school-shortcodes'),
			'description' => '',
			'std' => 'true',
			'value' => array(
				__('Yes', 'pre-school-shortcodes')	=> 'true',
				__('No', 'pre-school-shortcodes') 	=> 'false'			
			)
		),
		'thumbnail_background' => array(
			'type' => 'colorpicker',
			'heading' => __('Thumbnail Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'desktop_items' => array(
			'type' => 'textfield',
			'heading' => __('Number of Thumbnails for Large Screens', 'pre-school-shortcodes'),
			'description' => __('Enter number to display logo thumbnails in desktop resolution', 'pre-school-shortcodes'),
			'std' => '5'		
		),
		'tablet_vertical_items' => array(
			'type' => 'textfield',
			'heading' => __('Number of Thumbnails for Tablet/iPad ', 'pre-school-shortcodes'),
			'description' => __('Enter number to display in Tablet Vertical resolution ', 'pre-school-shortcodes'),
			'std' => '4'		
		),
		'mobile_horizontal_items' => array(
			'type' => 'textfield',
			'heading' => __('Number of Thumbnails for Mobile Horizontal', 'pre-school-shortcodes'),
			'description' => __('Enter number to display in mobile horizontal resolution', 'pre-school-shortcodes'),
			'std' => '2'		
		),
		'mobile_vertical_items' => array(
			'type' => 'textfield',
			'heading' => __('Number of Thumbnails for Mobile Vertical', 'pre-school-shortcodes'),
			'description' => __('Enter number to display in mobile vertical resolution', 'pre-school-shortcodes'),
			'std' => '1'		
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add logo categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
			'std' => ''		
		)
	),
    	
    'no_preview' => true,
    'shortcode' => '[swmsc_logo_slider thumbnail_background="{{thumbnail_background}}" margin="{{margin}}" arrow_navigation="{{arrow_navigation}}" auto_play="{{auto_play}}" slide_interval="{{slide_interval}}" display_logos="{{display_logos}}" lightbox="{{lightbox}}" desktop_items="{{desktop_items}}" tablet_vertical_items="{{tablet_vertical_items}}" mobile_horizontal_items="{{mobile_horizontal_items}}" mobile_vertical_items="{{mobile_vertical_items}}" exclude="{{exclude}}"]',
    'popup_title' => __('Insert Logo Slider Shortcode', 'pre-school-shortcodes'),    
   
);

/* ************************************************************************************** 
   LOGO GRIDS
************************************************************************************** */

$swmsc_shortcodes['logogrid'] = array(
    'params' => array(
		'display_logos' => array(
			'type' => 'textfield',
			'heading' => __('Number of Logo Thumbnails', 'pre-school-shortcodes'),
			'description' => __('Enter number of logo thumbnails to display', 'pre-school-shortcodes'),
			'std' => '20'		
		),
		'columns' => array(
			'type' => 'textfield',
			'heading' => __('Grid Column', 'pre-school-shortcodes'),
			'description' => __('Enter number to display thumbnails in grid column', 'pre-school-shortcodes'),
			'std' => '5'		
		),
		'margin' => array(
			'type' => 'textfield',
			'heading' => __('Thumbnail Margin', 'pre-school-shortcodes'),
			'description' => __('Enter margin between two thumbnails in pixels e.g. "5px" "10px"', 'pre-school-shortcodes'),
			'std' => '-1px'		
		),
		'thumbnail_background' => array(
			'type' => 'colorpicker',
			'heading' => __('Thumbnail Background Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'thumbnail_border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Thumbnail Border Color', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '#ffffff'
		),
		'thumbnail_border_width' => array(
			'type' => 'textfield',
			'heading' => __('Thumbnail Border Width', 'pre-school-shortcodes'),
			'std' => '1px'		
		),
		'thumbnail_border_radius' => array(
			'type' => 'textfield',
			'heading' => __('Thumbnail Border Radius', 'pre-school-shortcodes'),
			'std' => '0'		
		),
		'lightbox' => array(
			'type' => 'dropdown',
			'heading' => __('Lightbox', 'pre-school-shortcodes'),
			'description' => __('Select event you want after click on thumbnail', 'pre-school-shortcodes'),
			'std' => 'false',
			'value' => array(
				__('Disable Lightbox and Go to link page', 'pre-school-shortcodes')	=> 'false',												
				__('Display Large Image In Lightbox', 'pre-school-shortcodes')		=> 'true'
			)
		),
		'exclude' => array(
			'type' => 'textfield',
			'heading' => __('Exclude Categories', 'pre-school-shortcodes'),
			'description' => __('add logo categories IDs with comma seperate to exclude from post list', 'pre-school-shortcodes'),
			'std' => ''		
		)
	),
    	
    'no_preview' => true,
    'shortcode' => '[swmsc_logo_grid display_logos="{{display_logos}}" margin="{{margin}}" columns="{{columns}}" thumbnail_background="{{thumbnail_background}}" item_border_color="{{item_border_color}}"  lightbox="{{lightbox}}" thumbnail_border_color="{{thumbnail_border_color}}" thumbnail_border_width="{{thumbnail_border_width}}" thumbnail_border_radius="{{thumbnail_border_radius}}"  exclude="{{exclude}}"]',
    'popup_title' => __('Insert Logo Grid Shortcode', 'pre-school-shortcodes'),    
   
);


/* **************************************************************************************
   HORIZONTAL LINE
************************************************************************************** */

$swmsc_shortcodes['hrline'] = array(
	'params' => array(		
		'icon_name' => array(
			'type' => 'iconpicker',
			'heading' => __('Icon (Optional)', 'pre-school-shortcodes'),
			'description' => __('Select and Deselect icon by click on icon', 'pre-school-shortcodes'),
			'value' => $font_icons
		),
		'icon_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Icon Color', 'pre-school-shortcodes'),
			'std' => '#8373ce'
		),
		'border_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Border Color', 'pre-school-shortcodes'),
			'std' => '#fbb44d'
		),
		'margin_top' => array(
			'type' => 'textfield',
			'heading' => __('Top Margin', 'pre-school-shortcodes'),
			'std' => '80px'
		),
		'margin_bottom' => array(
			'type' => 'textfield',
			'heading' => __('Bottom Margin', 'pre-school-shortcodes'),
			'std' => '80px'
		)
	),
	'shortcode' => '[hr icon_name="{{icon_name}}" icon_color="{{icon_color}}" border_color="{{border_color}}" margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}"]',
	'no_preview' => true, 
	'popup_title' => __('Horizontal Line', 'pre-school-shortcodes')
);

/* **************************************************************************************
   DIVIDERS
************************************************************************************** */

$swmsc_shortcodes['dividers'] = array(
	'params' => array(		
		'divider_type' => array(
			'type' => 'dropdown',
			'heading' => __('Divider Type', 'pre-school-shortcodes'),
			'std' => 'line2',
			'value' => array(
				__('Line 1px', 'pre-school-shortcodes')	=> 'line1',
				__('Line 2px', 'pre-school-shortcodes')	=> 'line2',
				__('Line 3px', 'pre-school-shortcodes')	=> 'line3',
				__('Double Line', 'pre-school-shortcodes')	=> 'double_line',
				__('Square Open', 'pre-school-shortcodes')	=> 'square_o',
				__('Square Full', 'pre-school-shortcodes')	=> 'square',
				__('Circle Open', 'pre-school-shortcodes')	=> 'circle_o',
				__('Circle Full', 'pre-school-shortcodes')	=> 'circle'										
			)
		),
		'color' => array(
			'type' => 'colorpicker',
			'heading' => __('Divider Color', 'pre-school-shortcodes'),
			'std' => '#444444'
		),
		'max_width' => array(
			'type' => 'textfield',
			'heading' => __('Divider Maximum Width', 'pre-school-shortcodes'),
			'description' => __('Only for divider type "Line 1px, Line 2px, Line 3px and Double Line". (e.g. 100px, 100%, 50px)', 'pre-school-shortcodes'),
			'std' => '80px'
		),
		'text_align' => array(
			'type' => 'dropdown',
			'heading' => __('Text Align', 'pre-school-shortcodes'),
			'std' => 'left',
			'value' => array(	
				__('Left', 'pre-school-shortcodes') 	=> 'left',
				__('Center', 'pre-school-shortcodes') 	=> 'center',
				__('Right', 'pre-school-shortcodes') => 'right' 
			)
		),
		'margin_top' => array(
			'type' => 'textfield',
			'heading' => __('Top Margin', 'pre-school-shortcodes'),
			'std' => '20px'
		),
		'margin_bottom' => array(
			'type' => 'textfield',
			'heading' => __('Bottom Margin', 'pre-school-shortcodes'),
			'std' => '20px'
		)
	),
	'shortcode' => '[swmsc_divider divider_type="{{divider_type}}" max_width="{{max_width}}" color="{{color}}" text_align="{{text_align}}" margin_top="{{margin_top}}" margin_bottom="{{margin_bottom}}" 
]',
	'no_preview' => true, 
	'popup_title' => __('Dividers', 'pre-school-shortcodes')
);

/* **************************************************************************************
   HALF WIDTH CONTENT AND BACKGROUND IMAGE
************************************************************************************** */

$swmsc_shortcodes['halfbgcontent'] = array(
	'params' => array(		
		'bg_image' => array(
			'type' => 'attach_image',
			'heading' => __('Background Image', 'pre-school-shortcodes'),
		),
		'text_align' => array(
			'type' => 'dropdown',
			'heading' => __('Content Block Position', 'pre-school-shortcodes'),
			'std' => 'left',
			'value' => array(	
				__('Left', 'pre-school-shortcodes') => 'left',
				__('Right', 'pre-school-shortcodes') => 'right' 
			)
		),
		'content' => array(
			'std' => 'Add content here',
			'type' => 'textarea_html',
			'heading' => __('Content', 'pre-school-shortcodes')		
		),
		'padding_top' => array(
			'type' => 'textfield',
			'heading' => __('Top Padding', 'pre-school-shortcodes'),
			'std' => '80px'
		),
		'padding_bottom' => array(
			'type' => 'textfield',
			'heading' => __('Bottom Padding', 'pre-school-shortcodes'),
			'std' => '80px'
		),
	),
	'shortcode' => '[swmsc_half_bg_content bg_image="{{bg_image}}" text_align="{{text_align}}" padding_top="{{padding_top}}" padding_bottom="{{padding_bottom}}"] {{content}} [/swmsc_half_bg_content]',
	'no_preview' => true, 
	'popup_title' => __('Half Width Content and Background', 'pre-school-shortcodes')
); 

/* **************************************************************************************
   CUSTOM GALLERY
************************************************************************************** */

$swmsc_shortcodes['customgallery'] = array(
	'params' => array(	
		'image_ids' => array(
			'type' => 'textarea',
			'heading' => __('Images Ids', 'pre-school-shortcodes'),
			'description' => __('Add image ids with comma seperate. e.g. 4,55,342,3921,65,212', 'pre-school-shortcodes'),
		),
		'border_radius' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Image Border Radius', 'pre-school-shortcodes'),
		),
		'image_margin' => array(
			'std' => '20px',
			'type' => 'textfield',
			'heading' => __('Space Between Two Images', 'pre-school-shortcodes'),
		),
		'image_size' => array(
			'std' => 'full',
			'type' => 'textfield',
			'heading' => __('Image Size', 'pre-school-shortcodes'),
			'description' => __('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme like "kidsworld-square-image","kidsworld-related-posts","kidsworld-grid-image","kidsworld-blog-featured". ).', 'pre-school-shortcodes'),
		),
		'columns' => array(
			'type' => 'dropdown',
			'heading' => __('Display Column', 'pre-school-shortcodes'),
			'description' => '',
			'std' => '3',
			'value' => array(
				__('1 Column', 'pre-school-shortcodes') => '1',
				__('2 Column', 'pre-school-shortcodes') => '2',				
				__('3 Column', 'pre-school-shortcodes') => '3',		
				__('4 Column', 'pre-school-shortcodes') => '4',
				__('5 Column', 'pre-school-shortcodes') => '5',
				__('6 Column', 'pre-school-shortcodes') => '6',
				__('7 Column', 'pre-school-shortcodes') => '7',
				__('8 Column', 'pre-school-shortcodes') => '8',
				__('9 Column', 'pre-school-shortcodes') => '9'		
			)
		),	
		'grid_type' => array(
			'type' => 'dropdown',
			'heading' => __('Grid Type', 'pre-school-shortcodes'),
			'std' => 'none',
			'value' => array(	
				__('Masonry', 'pre-school-shortcodes') => 'masonry',
				__('Fit Rows', 'pre-school-shortcodes') => 'fitRows'
			)
		),
		'hover_icon_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Image Hover Icon Color', 'pre-school-shortcodes'),
			'std' => '#ffffff'
		),
		'hover_icon_bg_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Image Hover Icon Background Color', 'pre-school-shortcodes'),
			'std' => '#f8b54e'
		),
		'lightbox' => array(
			'type' => 'dropdown',
			'heading' => __('Lightbox', 'pre-school-shortcodes'),
			'description' => __('Enable/Disable large image popup box', 'pre-school-shortcodes'),
			'value' => array(
				__('Display Large Image in Lightbox', 'pre-school-shortcodes') => 'true',
				__('Disable Lightbox', 'pre-school-shortcodes') => 'false' 														
			)		         
		),
		'image_text' => array(
			'type' => 'dropdown',
			'heading' => __('Show/Hide Image Text', 'pre-school-shortcodes'),
			'std' => 'none',
			'value' => array(	
				__('No Text', 'pre-school-shortcodes') => 'none',
				__('Only Title', 'pre-school-shortcodes') => 'only_title',
				__('Title and Caption', 'pre-school-shortcodes') => 'title_caption' 
			)
		),
		'title_text_size' => array(
			'type' => 'textfield',
			'heading' => __('Image Title Text Size', 'pre-school-shortcodes'),
			'std' => '20px'
		),
		'title_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Image Title Text Color', 'pre-school-shortcodes'),
			'std' => '#555555'
		),
		'caption_text_size' => array(
			'type' => 'textfield',
			'heading' => __('Image Caption Text Size', 'pre-school-shortcodes'),
			'std' => '16px'
		),
		'caption_text_color' => array(
			'type' => 'colorpicker',
			'heading' => __('Image Caption Text Color Color', 'pre-school-shortcodes'),
			'std' => '#777777'
		)
	),
	'shortcode' => '[swmsc_image_gallery image_ids="{{image_ids}}" border_radius="{{border_radius}}" image_margin="{{image_margin}}" image_size="{{image_size}}" columns="{{columns}}" grid_type="{{grid_type}}" hover_icon_color="{{hover_icon_color}}" hover_icon_bg_color="{{hover_icon_bg_color}}" lightbox="{{lightbox}}" image_text="{{image_text}}" title_text_size="{{title_text_size}}" title_text_color="{{title_text_color}}" caption_text_size="{{caption_text_size}}" caption_text_color="{{caption_text_color}}"]',
	'no_preview' => true, 
	'popup_title' => __('Custom Gallery', 'pre-school-shortcodes')
);
?>