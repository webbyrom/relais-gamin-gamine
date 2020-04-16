<?php

/* ---------------------------------------------------------------------------------------- 
	Title Characters control
---------------------------------------------------------------------------------------- */


load_theme_textdomain( 'pre-school-shortcodes',SWMSC_PLUGIN_DIR.'/languages/' );


/* ---------------------------------------------------------------------------------------- 
	Title Characters control
---------------------------------------------------------------------------------------- */

if ( !function_exists( 'swmsc_short_title' ) ) {

	function swmsc_short_title($text, $limit) { 
	  $chars_limit = $limit;
	  $chars_text = strlen($text);
	  $text = $text." ";
	  $text = substr($text,0,$chars_limit);
	  $text = substr($text,0,strrpos($text,' '));
	 
	  if ($chars_text > $chars_limit) { 
	  	$text = $text."..."; 
	  } 
	     return $text;
	}
}

/* ---------------------------------------------------------------------------------------- 
	Image Sizes
---------------------------------------------------------------------------------------- */

if (!function_exists('swmsc_image_sizes')) {
	function swmsc_image_sizes() {
		add_image_size('swmsc-related-posts',500,344, true);
		add_image_size('swmsc-recent-post-tiny',75,75, true);
		add_image_size('swmsc-grid-image',850,999999, true);
		add_image_size('swmsc-square-image',850,850, true);
	}
}

add_action( 'init', 'swmsc_image_sizes' );

/* ---------------------------------------------------------------------------------------- 
	KSES allowed tags
---------------------------------------------------------------------------------------- */

if (!function_exists('swmsc_kses_allowed_textarea')) {
	function swmsc_kses_allowed_textarea() {

		$output = '';

		$swmsc_allowed_attr = array( 'class' => true,'style' => true,'id'=> true );

		$output = array(
		    'a' => array(
		        'href' => true,
		        'title' => true,
		        'class' => true,
		        'style' => true,
		        'target' => true,
		        'rel' => true
		    ),
		    'abbr' => array(
		        'title' => true,
		    ),
		    'acronym' => array(
		        'title' => true,
		    ),
		    'b' => array(),
		    'blockquote' => array(
		        'cite' => true,
		        'class' => true,
		        'style' => true,
		        'id'=> true
		    ),
		    'cite' => $swmsc_allowed_attr,
		    'code' => array(),
		    'del' => array(
		        'datetime' => true,
		    ),
		    'em' => $swmsc_allowed_attr,
		    'i' => $swmsc_allowed_attr,
		    'q' => array(
		        'cite' => true,
		    ),
		    'iframe' => array( 
		    	'class' => true,
		    	'style' => true,
		    	'id'=> true,
				'src' => true,
				'title' => true,
				'byline' => true,
				'portrait' => true,
				'color' => true,
				'width' => true,
				'height' => true,
				'frameborder' => true,
				'webkitAllowFullScreen' => true,
				'mozallowfullscreen' => true,
				'allowFullScreen' => true,
				'allowfullscreen' => true,
			),
		    'strike' => array(),
		    'strong' => array(),
		    'h1' => $swmsc_allowed_attr,
		    'h2' => $swmsc_allowed_attr,
		    'h3' => $swmsc_allowed_attr,
		    'h4' => $swmsc_allowed_attr,
		    'h5' => $swmsc_allowed_attr,
		    'h6' => $swmsc_allowed_attr,
		    'p' => $swmsc_allowed_attr,
		    'ul' => $swmsc_allowed_attr,
		    'ol' => $swmsc_allowed_attr,
		    'li' => $swmsc_allowed_attr,
		    'div' => $swmsc_allowed_attr,
		    'span' => $swmsc_allowed_attr,
		    'small' => $swmsc_allowed_attr,
		    'br' => $swmsc_allowed_attr,
		    'img' => array(
		        'src' => true,
		        'class' => true,
		        'style' => true,
		        'id'=> true,
		        'alt'=> true,
		        'title'=> true
		    	)
			);

		return apply_filters( 'swmsc_kses_allowed_textarea', $output );
	}
}

// KSES for title or short sentenses ----------------------------------------------------------------------------------------


if (!function_exists('swmsc_kses_allowed_text')) {
	function swmsc_kses_allowed_text() {

		$output = '';

		$swmsc_allowed_attr = array( 'class' => true,'style' => true,'id'=> true );

		$output = array(
		    'a' => array(
		        'href' => true,
		        'title' => true,
		        'class' => true,
		        'style' => true
		    ),
		    'abbr' => array(
		        'title' => true,
		    ),
		    'b' => $swmsc_allowed_attr,
		    'cite' => $swmsc_allowed_attr,
		    'em' => $swmsc_allowed_attr,
		    'i' => $swmsc_allowed_attr,
		    'strike' => array(),
		    'strong' => array(),
		    'span' => $swmsc_allowed_attr,
		    'small' => $swmsc_allowed_attr,
		    'div' => $swmsc_allowed_attr,
		    'br' => $swmsc_allowed_attr
			);

		return apply_filters( 'swmsc_kses_allowed_text', $output );
	}
}



/* ---------------------------------------------------------------------------------------- 
	GET COMMENTS NUMBER
---------------------------------------------------------------------------------------- */

if( ! function_exists( 'swmsc_get_comments_number' ) ) {
	function swmsc_get_comments_number() {

		$swmsc_num_comments = get_comments_number();

		if ( $swmsc_num_comments == 0 ) {
			$output =  esc_html__('No Comments','pre-school-shortcodes');
		} elseif ( $swmsc_num_comments > 1 ) {
			$output =  $swmsc_num_comments . esc_html__(' Comments','pre-school-shortcodes');
		} else {
			$output =  esc_html__('1 Comment','pre-school-shortcodes');
		}

		echo apply_filters( 'swmsc_get_comments_number', $output );
	}
}


/* ---------------------------------------------------------------------------------------- 
	HEX TO RGBA
---------------------------------------------------------------------------------------- */

if( ! function_exists( 'swmsc_hex2rgba' ) ) {
	function swmsc_hex2rgba( $hex, $alpha = 1, $echo = false ) {
		$hex = str_replace("#", "", $hex);
	
		if (strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		
		$swmsc_rgba = 'rgba('. $r.', '. $g .', '. $b .', '. $alpha .')';
	
		if ( $echo ){
			echo $swmsc_rgba;
			return true;
		}
		
		return apply_filters( 'swmsc_hex2rgba', $swmsc_rgba );
	}
}


function myCustomShopImage() {
	return 'kidsworld-square-image';
}

add_filter('kidsworld_product_image_size','myCustomShopImage');