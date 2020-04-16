<?php

/* **************************************************************************************
	DISPLAY SHORTCODES IN SIDEBAR, TEXT FIELDS, COMMENTS ETC.
************************************************************************************** */

add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode' );

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );

/* **************************************************************************************
     DISABLE WORDPRESS AUTOMATIC FORMATTING ON POSTS
************************************************************************************** */
if (!function_exists('swmsc_sc_autop_fix')) {
	function swmsc_sc_autop_fix($content) {
	    $array = array (
	        '<p>[' => '[',
	        ']</p>' => ']',
	        ']<br />' => ']'
	    );

	    $content = strtr($content, $array);

	    return $content;
	}
}
add_filter('the_content', 'swmsc_sc_autop_fix');


/* **************************************************************************************
     HEADINGS
************************************************************************************** */

if (!function_exists('swmsc_headings')) {
	function swmsc_headings($atts, $content = null, $heading) {
		return '<'.$heading.'>' . do_shortcode($content) . '</'.$heading.'>';
	}

	$swmsc_headings_tags = array("h1","h2","h3","h4","h5","h6");

	foreach ($swmsc_headings_tags as $swmsc_headings_tag) {
		add_shortcode($swmsc_headings_tag, 'swmsc_headings');
	}

}

/* **************************************************************************************
     COLUMNS
************************************************************************************** */

if (!function_exists('swmsc_column')) {
	function swmsc_column($atts, $content = null, $column) {

		extract( shortcode_atts( array (
			'position' => '',
			'animation_style' => 'none'
		), $atts ) );

		$first = '';
		$animation_class = '';

		if (isset($atts[0]) && trim($atts[0]) == 'first') {
			$first = 'first';
		}

		if ( $position == 'first') {
			$first = 'first';
		}

		if ( $animation_style != 'none') {
			$animation_class = 'swmsc_element_visible '.$animation_style.' ';
		}

		return '<div class="swmsc_column '.$column.' '.$first.' '.$animation_class.'">' . do_shortcode($content) . '</div>';
	}

	$swmsc_column_array = array("swmsc_one_full","swmsc_one_half","swmsc_one_third","swmsc_one_fourth","swmsc_one_fifth","swmsc_one_sixth","swmsc_two_third","swmsc_three_fourth","swmsc_four_fifth","swmsc_five_sixth");

	foreach ($swmsc_column_array as $swmsc_column_name) {
		add_shortcode($swmsc_column_name, 'swmsc_column');
	}

	$swmsc_column_array = array(
		"swmsc_one_full" 		=> "one_full",
		"swmsc_one_half"		=> "one_half",
		"swmsc_one_third"		=> "one_third",
		"swmsc_one_fourth"	=> "one_fourth",
		"swmsc_one_fifth"		=> "one_fifth",
		"swmsc_one_sixth" 	=> "one_sixth",
		"swmsc_two_third"		=> "two_third",
		"swmsc_three_fourth" 	=> "three_fourth",
		"swmsc_four_fifth" 	=> "four_fifth",
		"swmsc_five_sixth" 	=> "five_sixth",
	);

	foreach ($swmsc_column_array as $swmsc_column_name => $column) {
		add_shortcode($column, 'swmsc_column');
	}

}

/* **************************************************************************************
     OTHER HTML ELEMENTS
************************************************************************************** */

if (!function_exists('swmsc_html_elements')) {
	function swmsc_html_elements($atts, $content = null, $heading) {
		return '<'.$heading.'>' . do_shortcode($content) . '</'.$heading.'>';
	}

	$swmsc_general_tags = array("p","div","span","sub","sup","small");

	foreach ($swmsc_general_tags as $swmsc_general_tag) {
		add_shortcode($swmsc_general_tag, 'swmsc_html_elements');
	}

}

/* **************************************************************************************
     ALIGNMENT
************************************************************************************** */

if (!function_exists('swmsc_alignments')) {
	function swmsc_alignments($atts, $content = null, $align) {
		return '<div style="text-align:'.$align.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('left', 'swmsc_alignments');
	add_shortcode('center', 'swmsc_alignments');
	add_shortcode('right', 'swmsc_alignments');
}

/* **************************************************************************************
    PRE-DEFINDED TEXT
************************************************************************************** */

if (!function_exists('swmsc_pretext')) {
	function swmsc_pretext($atts, $content = null, $heading) {

		return '<'.$heading.'>' . do_shortcode(str_replace('<br />', '', $content)) . '</'.$heading.'>';
	}
	add_shortcode('pre', 'swmsc_pretext');
	add_shortcode('code', 'swmsc_pretext');
}

/* **************************************************************************************
     FONT
************************************************************************************** */

if (!function_exists('swmsc_font')) {
	function swmsc_font($atts, $content = null, $column) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'size' => '15px',
			'color' => '#777777',
			'weight' => 'normal',
			'line_height' => '20px'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'><div style="font-size:'.intval($size).'px; color:'.$color.'; font-weight:'.$weight.'; line-height:'.intval($line_height).'px;">
					'.do_shortcode($content).'
					</div></div>';

		return $output;

	}
	add_shortcode('swmsc_font', 'swmsc_font');

}

/* **************************************************************************************
   HORIZONTAL TAB
************************************************************************************** */

if (!function_exists('swmsc_horizontal_tab')) {
	function swmsc_horizontal_tab( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_horizontal_menu ' . esc_attr( $class ) . '"' : 'class="swmsc_horizontal_menu"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output .=  '<div '.$id.' '.$class.' '.$style.'>
						<ul>
							'.do_shortcode($content).'
						</ul>
					</div>
					<div class="clear"></div>';

		return $output;
	}

	add_shortcode( 'swmsc_horizontal_tab', 'swmsc_horizontal_tab' );
}

if (!function_exists('swmsc_menu_tab')) {
	function swmsc_menu_tab( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'link' => '',
			'text' => 'tab',
			'target' => '_self',
			'active'=> ''
		), $atts ) );

		$active_class = '';

		if ($active == 'true' || $active == 'yes') {

			$active_class = ' class="current_page_item"';
		}

		$output = '<li'.$active_class.'><a href="'.$link.'" target="'.$target.'" class="swmsc_text_color">'.$text.'</a></li>';

		return $output;

	}

	add_shortcode( 'swmsc_menu_tab', 'swmsc_menu_tab' );
}

/* **************************************************************************************
   IMAGE SLIDER
************************************************************************************** */

if (!function_exists('swmsc_image_slider')) {
	function swmsc_image_slider( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'auto_play' => 'true',
			'slide_interval' => 5000,
			'animation_type' => 'fade',
			'bullet_navigation' => 'true',
			'arrow_navigation' => 'true'

		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_slider_box ' . esc_attr( $class ) . '"' : 'class="swmsc_slider_box"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_image_slider flexslider" data-slideAnimation="'.$animation_type.'" data-autoSlide="'.$auto_play.'" data-autoSlideInterval="'.$slide_interval.'" data-bulletNavigation="'.$bullet_navigation.'" data-arrowNavigation="'.$arrow_navigation.'" >
							<ul class="slides">
								'.do_shortcode($content).'
							</ul>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_image_slider', 'swmsc_image_slider' );

}

if (!function_exists('swmsc_image_slide')) {
	function swmsc_image_slide( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'src' => '',
			'target' => '_self',
			'link' => '#',
			'alt' => ''
		), $atts ) );

		if (is_numeric($src)) {
            $image_src = wp_get_attachment_url($src);
        } else {
            $image_src = $src;
        }

		$output = '<li><a href="'.$link.'" target="'.$target.'"><img src="'.$image_src.'" alt="'.$alt.'" /></a></li>';

		return $output;
	}

	add_shortcode( 'swmsc_image_slide', 'swmsc_image_slide' );
}

/* **************************************************************************************
  RECENT POSTS LARGE
************************************************************************************** */

if (!function_exists('swmsc_recent_posts_large')) {
	function swmsc_recent_posts_large( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'read_more_text' => '',
			'featured_img' => 'true',
			'post_meta' => 'true',
			'post_date' => 'true',
			'desc_limit' => '80',
			'column' => '2',
			'cat'  => '',
			'target' => '_self',
			'exclude' => '',
			'display_posts' => '4'
		), $atts ) );

		$args = array(
			'category__not_in' => $exclude,
			'cat'  => $cat,
			'order'	=> 'DESC',
			'orderby'	=> 'date',
			'terms'    => array( 'link' ),
			'posts_per_page' => $display_posts,
			'paged' => get_query_var( 'paged' ),
			'tax_query' => array(
	        array(
	          'taxonomy' => 'post_format',
	          'field'    => 'slug',
	          'terms'    => array( 'post-format-link','post-format-quote','post-format-aside' ),
	          'operator' => 'NOT IN'
	        )
	    )
		);

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_recent_post_large swmsc_row swmsc_masonry_fitrow ' . esc_attr( $class ) . '"' : 'class="swmsc_recent_post_large swmsc_row swmsc_masonry_fitrow"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$blog_query = new WP_Query($args);

		$output = '<div '.$id.' '.$class.' '.$style.'>';

			while ($blog_query->have_posts()) : $blog_query->the_post();

				$format = get_post_format();

				if ( $format != 'quote' && $format != 'aside' ) {

					$post_id = get_the_ID();

					$swmsc_get_rp_large_image = 'swmsc-square-image';
    				$swmsc_rp_large_image = apply_filters( 'swmsc_recent_posts_large_image_size', $swmsc_get_rp_large_image );

					$output .= '<div class="swmsc_column swmsc_column'.$column.' swmsc_masonry_fitrow_item">
									<div class="swmsc_column_gap">
										<div class="swmsc_recent_post_large_box">	';

											if ( has_post_thumbnail() && $featured_img == 'true' ) {
												$output .= '<div class="swmsc_recent_post_large_img">
																<a href="' . get_permalink() . '" target="'.$target.'">
																'.get_the_post_thumbnail($post_id, $swmsc_rp_large_image).'
																</a>';

												if ( $post_date == 'true') {
													$output .= '<div class="swmsc_recent_post_large_date swmsc_js_center"><span>'.get_the_date('n.j.Y').'</span></div>';
												}

												$output .= '</div>';
											}

					$output .= '			<div class="swmsc_recent_post_large_text">';
					$output .= '				<h4><a href="' . get_permalink() . '" target="'.$target.'">' . get_the_title() . '</a></h4>';

												if ( $post_meta == 'true' ) {
													$output .= '<div class="swmsc_recent_post_large_meta">
																	<span><i class="fa fa-user"></i>'.get_the_author().'</span>
																	<span><i class="fa fa-comments"></i>'.get_comments_number($post_id).' '.__('Comments', 'pre-school-shortcodes').'</span>
																</div>';
												}

												$truncate = get_the_excerpt();
												$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
												$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
												$truncate = strip_tags($truncate);
												$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $desc_limit), ' '));

												if ( $desc_limit != 0 ) {
													$output .= '<p>'.$truncate.'</p>';
												}

												if ( $read_more_text != '' ) {
													$output .= '<p><a href="' . get_permalink() . '" class="swmsc_recent_post_large_readmore">'.$read_more_text.' <i class="fa fa-angle-double-right"></i></a></p>';
												}

					$output .= 				'</div>
											<div class="clear"></div>

										</div>
									</div>
								</div>';

				} //end if

			endwhile;
			wp_reset_postdata();

		$output .= '<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_recent_posts_large', 'swmsc_recent_posts_large' );
}

/* **************************************************************************************
  RECENT POSTS TINY
************************************************************************************** */

if (!function_exists('swmsc_recent_posts_tiny')) {
	function swmsc_recent_posts_tiny( $atts ) {
		extract( shortcode_atts( array(
			'id' => '',
    		'class' => '',
    		'style' => '',
			'cat'  => '',
			'exclude' => '',
			'target' => '_self',
			'post_limit' => 2
		 ), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_recent_posts_tiny ' . esc_attr( $class ) . '"' : 'class="swmsc_recent_posts_tiny"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<ul>';

							$q = new WP_Query( 'posts_per_page='.$post_limit.'&cat='.$cat.'&exclude='.$exclude );

							while ( $q->have_posts() ) {
								$q->the_post();

								$format = get_post_format();

								$rcp_icon = '';

								switch ( $format ) {

									case 'link': $rcp_icon = 'link';
										break;
									case 'aside': $rcp_icon = 'pencil';
										break;
									case 'image': $rcp_icon = 'camera';
										break;
									case 'gallery': $rcp_icon = 'th-large';
										break;
									case 'video': $rcp_icon = 'video-camera';
										break;
									case 'quote': $rcp_icon = 'quote-left';
										break;
									case 'audio': $rcp_icon = 'volume-up';
										break;
									case 'status': $rcp_icon = 'info-circle';
										break;
									default: $rcp_icon = 'pencil';
										break;
								}

								$output .= '<li class="swmsc_text_color">';

												if(has_post_thumbnail()) {
													$output .= '<a href="'.get_permalink().'" title="'.esc_attr(strip_tags(get_the_title())).'" class="swmsc_recent_posts_tiny_img" target="'.$target.'">
																	'.get_the_post_thumbnail(get_the_ID(), 'swmsc-recent-post-tiny').'
																</a>';
												} else {
													$output .= '<a href="'.get_permalink().'" title="'.esc_attr(strip_tags(get_the_title())).'" class="swmsc_recent_posts_tiny_icon" target="'.$target.'">
																	<i class="fa fa-'.$rcp_icon.'"></i>
																</a>';
												}
								$output .= 		'<div class="swmsc_recent_posts_tiny_content">
													<div class="swmsc_recent_posts_tiny_title"><a href="'.get_permalink().'" target="'.$target.'">'.get_the_title().'</a></div>
													<p>'.get_the_time('F j, Y - g:i a').'</p>
												</div>

												<div class="clear"></div>
											</li>';

							}

							wp_reset_postdata();

		$output .= 		'</ul>
					</div>
					<div class="clear"></div>';

		return $output;
	}

	add_shortcode( 'swmsc_recent_posts_tiny', 'swmsc_recent_posts_tiny' );
}

/* **************************************************************************************
  RECENT POSTS SQUARE
************************************************************************************** */

if (!function_exists('swmsc_recent_posts_square')) {
	function swmsc_recent_posts_square( $atts ) {
		extract( shortcode_atts( array(
			'id' => '',
    		'class' => '',
    		'style' => '',
			'cat'  => '',
			'exclude' => '',
			'post_limit' => 2,
			'target' => '_self',
			'desc_limit' => '55' ), $atts ) );

		$q = new WP_Query( 'posts_per_page='.$post_limit.'&cat='.$cat.'&exclude='.$exclude );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_recent_posts_square_posts ' . esc_attr( $class ) . '"' : 'class="swmsc_recent_posts_square_posts"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<ul>';

							while ( $q->have_posts() ) {
								$q->the_post();

								$output .= '<li>
												<div class="swmsc_recent_posts_square_date"><a href="' . get_permalink() . '" target="'.$target.'">' . get_the_date('d').'
													<span class="swmsc_recent_posts_square_d_month">' . get_the_date('M').'</span>
													<span class="swmsc_recent_posts_square_d_year">' . get_the_date('Y').'</span></a>
												</div>

												<div class="swmsc_recent_posts_square_content">
													<div class="swmsc_recent_posts_square_title"><a href="' . get_permalink() . '" target="'.$target.'">' . get_the_title() . '</a></div>
													<p>';

														$truncate = get_the_excerpt();
														$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
														$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
														$truncate = strip_tags($truncate);
														$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $desc_limit), ' '));

														$output .= $truncate;

								$output .= 			'</p>
													<div class="swmsc_recent_posts_square_grid_date">
														<span><i class="fa fa-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.get_the_author().'</a></span>
														<span><i class="fa fa-comment-o"></i><a href="' . get_permalink() . '" target="'.$target.'">'.get_comments_number(get_the_ID()).' '.__('Comments', 'pre-school-shortcodes').'</a></span>
													</div>
												</div>
												<div class="clear"></div>
											</li>';
							}

							wp_reset_postdata();

		$output .= 		'</ul>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_recent_posts_square', 'swmsc_recent_posts_square' );
}

/* **************************************************************************************
   VIDEO
************************************************************************************** */

if (!function_exists('swmsc_video')) {
	function swmsc_video($atts, $content = null) {
	   extract(shortcode_atts(array(
			'id' => '',
			'class' => '',
			'style' => '',
			"source" => '',
			"width" => '608',
			"height" => '347'
	   ), $atts));

	   	$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="fitVids swmsc_video_shortcode ' . esc_attr( $class ) . '"' : 'class="fitVids swmsc_video_shortcode"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

	   return '<div '.$id.' '.$class.' '.$style.'><iframe width="'.$width.'" height="'.$height.'" src="'.$source.'" frameborder="0" allowfullscreen webkitAllowFullScreen mozallowfullscreen></iframe></div>';
	}
	add_shortcode("swmsc_video", "swmsc_video");
}

/* **************************************************************************************
	SUPPORT TEAM
************************************************************************************** */

if (!function_exists('swmsc_support_team')) {
	function swmsc_support_team( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'image_src' => '',
			'name' => '',
			'position' => '',
			'email' => '',
			'target' => '_self',
			'phone' => ''
		), $atts ) );

		if (is_numeric($image_src)) {
            $image_src = wp_get_attachment_url($image_src);
        } else {
            $image_src = $image_src;
        }

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_support_team ' . esc_attr( $class ) . '"' : 'class="swmsc_support_team"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = 	'<div '.$id.' '.$class.' '.$style.'>
						<div><img src="'.$image_src.'" alt="" /></div>
							<p class="swmsc_st_name"><strong>'.$name.'</strong></p>
							<p class="swmsc_st_position">'.$position.'</p>';

							if ($email != '') { $output .= '<p class="swmsc_st_email"><i class="fa fa-envelope-o"></i><a href="mailto:'.$email.'" target="'.$target.'" class="swmsc_text_color">'.$email.'</a></p>'; }

							if ($phone != '') { $output .= '<p class="swmsc_st_phone"><i class="fa fa-phone"></i>'.$phone.'</p>'; }

		$output .= 		'<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_support_team', 'swmsc_support_team' );
}



/* **************************************************************************************
	TOOLTIPS
************************************************************************************** */

if (!function_exists('swmsc_tooltips')) {
	function swmsc_tooltips( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'position' => 'tipUp',
			'tooltip_text' => 'tooltip text here'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="'.$position.'" ' . esc_attr( $class ) . '"' : 'class="'.$position.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<a '.$id.' '.$class.' '.$style.' href="#" title="'.$tooltip_text.'">
		 				'.do_shortcode($content).'
		 			</a>';

		return $output;
	}

	add_shortcode( 'swmsc_tooltip', 'swmsc_tooltips' );
}

/* **************************************************************************************
   SOCIAL MEDIA
************************************************************************************** */

if (!function_exists('swmsc_social_media_icons')) {
	function swmsc_social_media_icons( $atts, $content = null ) {
	  extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'size' => ''
		), $atts ) );

	  	$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_sm_icons_sc ' . esc_attr( $class ) . '"' : 'class="swmsc_sm_icons_sc"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<ul>
							'.do_shortcode($content).'
						</ul>
						<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_social_media_icons', 'swmsc_social_media_icons' );
}

if (!function_exists('swmsc_social_icon_sc')) {
	function swmsc_social_icon_sc( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'link' => '',
			'target' => '_self',
			'bg_color' => '#f2f2f2',
			'icon_color' => '#555555',
			'title' => '',
			'icon_name' => '',
		), $atts ) );

		$patterns = array();
		$patterns[0] = '/fa-/';
		$patterns[1] = '/-square/';
		$patterns[2] = '/-circle/';
		$patterns[3] = '/-alt/';

		$new_media = preg_replace($patterns, '', $icon_name);
		$new_media = ucwords(str_replace('-', ' ', $new_media));
		$icon_name = preg_replace('/fa-/', '', $icon_name);

		if ($link != '') {

			$output =  '<li class="swmsc_sm_icons_li"><a href="'.$link.'" class="tipUp" title="'.$new_media.'" target="'.$target.'" style="background:'.$bg_color.';color:'.$icon_color.';"><i class="fa fa-'.$icon_name.'"></i></a></li>';

			return $output;

		}
	}

	add_shortcode( 'swmsc_social_media_icon', 'swmsc_social_icon_sc' );

}

if (!function_exists('swmsc_social_media_sc')) {
	function swmsc_social_media_sc( $atts, $content = null, $media ) {

		extract( shortcode_atts( array (
			'link' => '',
			'target' => '_self',
			'bg_color' => '#f2f2f2',
			'icon_color' => '#555555',
			'title' => '',
		), $atts ) );

		$patterns = array();
		$patterns[0] = '/fa-/';
		$patterns[1] = '/-square/';
		$patterns[2] = '/-circle/';
		$patterns[3] = '/-alt/';

		$new_media = ucwords(preg_replace($patterns, '', $media));

		if ($link != '') {

			$output =  '<li class="swmsc_sm_icons_li"><a href="'.$link.'" class="tipUp" title="'.$new_media.'" target="'.$target.'" style="background:'.$bg_color.';color:'.$icon_color.';"><i class="fa '.$media.'"></i></a></li>';

			return $output;

		}
	}



	$fa_media_icons = array("fa-adn","fa-android","fa-apple","fa-behance","fa-behance-square","fa-bitbucket","fa-bitbucket-square","fa-bitcoin","fa-btc","fa-codepen","fa-css3","fa-delicious","fa-deviantart","fa-digg","fa-dribbble","fa-dropbox","fa-drupal","fa-empire","fa-facebook","fa-facebook-square","fa-flickr","fa-foursquare","fa-ge","fa-git","fa-git-square","fa-github","fa-github-alt","fa-github-square","fa-gittip","fa-google","fa-google-plus","fa-google-plus-square","fa-hacker-news","fa-html5","fa-instagram","fa-joomla","fa-jsfiddle","fa-linkedin","fa-linkedin-square","fa-linux","fa-maxcdn","fa-openid","fa-pagelines","fa-pied-piper","fa-pied-piper-alt","fa-pied-piper-square","fa-pinterest","fa-pinterest-square","fa-qq","fa-ra","fa-rebel","fa-reddit","fa-reddit-square","fa-renren","fa-share-alt","fa-share-alt-square","fa-skype","fa-slack","fa-soundcloud","fa-spotify","fa-stack-exchange","fa-stack-overflow","fa-steam","fa-steam-square","fa-stumbleupon","fa-stumbleupon-circle","fa-tencent-weibo","fa-trello","fa-tumblr","fa-tumblr-square","fa-twitter","fa-twitter-square","fa-vimeo-square","fa-vine","fa-vk","fa-wechat","fa-weibo","fa-weixin","fa-windows","fa-wordpress","fa-xing","fa-xing-square","fa-yahoo","fa-youtube","fa-youtube-play","fa-youtube-square","fa-rss");

	foreach ($fa_media_icons as $fa_media_icon) {
		add_shortcode( $fa_media_icon, 'swmsc_social_media_sc' );
	}

}

/* **************************************************************************************
  	IMAGE FRAME WITH ALIGNMENT
************************************************************************************** */

if (!function_exists('swmsc_image_frames')) {
	function swmsc_image_frames($atts, $content=null) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'align' => '',
			'link' => '',
			'src' => '',
			'alt' => '',
			'title' => '',
			'target' => '_self',
			'lightbox' => 'true',
			'lightbox_type' => 'image',
			'border_radius' => 0,
		), $atts ) );

		$output  = '';

		$swmsc_popup_type = $lightbox_type == 'video' ? 'swmsc_popup_video' : 'swmsc_popup_img' ;
		$swmsc_img_hover_icon = $lightbox_type == 'video' ? 'video-camera' : 'search' ;

		$swmsc_popup_img = $lightbox == 'true' ? $swmsc_popup_type : '' ;
		$hover_icon = $lightbox == 'true' ? $swmsc_img_hover_icon : 'link' ;

		if ( isset($align) && $align == "center" ) {
			$output .= '<div class="center">';
		}

		if (is_numeric($src)) {
            $image_src = wp_get_attachment_url($src);
        } else {
            $image_src = $src;
        }

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_image_lightbox  image_'.$align.'  ' . esc_attr( $class ) . '"' : 'class="swmsc_image_lightbox  image_'.$align.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output .= '<div '.$id.' '.$class.' '.$style.'>

						<div class="swmsc_image_lightbox_img"><img alt="'.$alt.'" src="'.$image_src.'" class="" style="border-radius:'.$border_radius.';" />';

							if ( isset($link)  && $link != "" ) {

								$output .= '<div class="swmsc_img_overlay" style="border-radius:'.$border_radius.';">
												<a class="'.$swmsc_popup_img.'" href="'.$link.'" title="'.$title.'" target="'.$target.'" >
													<i class="fa fa-'.$hover_icon.'"></i>
												</a>
											</div>';
							}

		$output .= 		'</div>';

		if ( isset($align) && $align == "center" ) {
			$output .= '</div>';
		}

		$output .= '</div>';

		return $output;
	}

	add_shortcode( 'swmsc_image', 'swmsc_image_frames' );
}

/* **************************************************************************************
 	PROMOTION BOX
************************************************************************************** */

if (!function_exists('swmsc_promotion_box')) {
	function swmsc_promotion_box( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'button_link' => '#',
			'display_style' => 'default',
			'box_background' => '#8373ce',
			'button_text' => '',
			'button_bg' => '#fcb54d',
			'button_text_color' => '#ffffff',
			'target' => '_self',
			'sub_text' => '',
			'border' => 'true',
			'sub_text_color' => '#ffffff',
			'sub_text_size' => '13',
			'title_text_size' => '22',
			'title_text_color' => '#ffffff'
		), $atts ) );

		$p_margin = '';
		$p_text = '';
		$p_border = '';

		if ($sub_text == '') { $p_margin = 'margin-top:8px;'; }
		if ($button_text == '') { $p_text = 'p_text'; }
		if ($border == 'false' ) { $p_border = 'p_border'; }

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_promotion_box '.$p_border.' p_box_'.$display_style.' ' . esc_attr( $class ) . '"' : 'class="swmsc_promotion_box '.$p_border.' p_box_'.$display_style.'"';
		$style  = ( $style != '' ) ? 'style="background:'.$box_background.'; ' . $style . '"' : 'style="background:'.$box_background.';"';

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_promotion_box_text '.$p_text.'">
							<div class="swmsc_promotion_box_title_text" style=" '.$p_margin.' font-size:'.intval($title_text_size).'px; color:'.$title_text_color.';">' . do_shortcode($content).'<div class="swmsc_promotion_box_sub_title" style="color:'.$sub_text_color.'; font-size:'.intval($sub_text_size).'px;">'.$sub_text.'</div>
							</div>
						</div>';

						if ( $button_text != '' ) {
							$output .= '<div class="swmsc_promotion_box_button">
											<a style="background:'.$button_bg.';color:'.$button_text_color.';" href="'.$button_link.'" class="swmsc_button large square skin_color" target="'.$target.'">'.$button_text.'</a>
										</div>';
						}

		$output .= 		'<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_promotion_box', 'swmsc_promotion_box' );
}


/* **************************************************************************************
   BUTTON
************************************************************************************** */

if (!function_exists('swmsc_buttons')) {
	function swmsc_buttons($atts, $content = null) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'text_color' => '#ffffff',
			'text_size' => '18px',
			'bg_color' => '#fcb54d',
			'border_radius' => '10px',
			'target' => '_self',
			'text_shadow' => '',
			'link' => '#',
			'button_style' => 'standard',
			'padding' => '3px 20px',
			'line_height' => '30px',

		), $atts ) );

		$btn_bg_color = '';
		$button_outline = '';
		$border_color = '';


		if ( $text_shadow != '' ) {
			$text_shadow = 'text-shadow:0px 1px 0 '.$text_shadow.';';
		}

		if ($button_style == 'button_outline') {
			$button_outline = 'button_outline';
			$btn_bg_color = 'background:transparent;';
			$border_color = 'border-color:'.$bg_color.';';
		} else {
			$btn_bg_color = 'background:'.$bg_color.';';
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_button_div ' . esc_attr( $class ) . '"' : 'class="swmsc_button_div"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'><a href="'.$link.'" class="swmsc_button '.$button_outline.'" style="'.$btn_bg_color.' color:'.$text_color.'; font-size:'.intval($text_size).'px; '.$border_color.'; border-radius:'.$border_radius.'; padding:'.$padding.'; line-height:'.$line_height.'; '.$text_shadow.' " target="'.$target.'">'. do_shortcode($content) . '</a></div>';
		return $output;
	}

	add_shortcode('swmsc_button', 'swmsc_buttons');
}

/* **************************************************************************************
    TOOGLE CONTENT
************************************************************************************** */

if (!function_exists('swmsc_toggle_accordion')) {
	function swmsc_toggle_accordion( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'title' => '',
			'status' => 'open',
			'icon_name' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_toggle_accordion_container ' . esc_attr( $class ) . '"' : 'class="swmsc_toggle_accordion_container"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = 	'<div '.$id.' '.$class.' '.$style.' data-id="'.$status.'">
						'.do_shortcode($content).'
					</div>';

		return $output;
	} add_shortcode('swmsc_toggle_accordion_container', 'swmsc_toggle_accordion');
}

if (!function_exists('swmsc_toggle_content')) {
	function swmsc_toggle_content( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'title' => '',
			'title_bg' => '#ededed',
			'title_color' => '#444444',
			'status' => 'closed',
			'icon_name' => ''
		), $atts ) );

		$no_icon = 'no_icon';
		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_toggle_box ' . esc_attr( $class ) . '"' : 'class="swmsc_toggle_box"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.' data-id="'.$status.'" >
						<span class="swmsc_toggle_box_title" style="background:'.$title_bg.';color:'.$title_color.';">';

						if ( $icon_name != '' && $icon_name != '- Select Icon -' ) {
							$output .= '<span class="swmsc_toggle_box_title_icon" style="color:'.$title_color.';"><i class="fa fa-'.$icon_name.'"></i></span>';
							$no_icon = '';
						}

		$output .= 		'<span class="swmsc_toggle_box_title_text '.$no_icon.'">'.$title.'<i class="fa fa-plus-square-o openclose"></i><i class="fa fa-minus-square-o openclose"></i></span></span>
						<div class="swmsc_toggle_box_inner">
							'.do_shortcode($content).'
						</div>
					</div>';

		return $output;
	} add_shortcode('swmsc_toggle', 'swmsc_toggle_content');
}

if (!function_exists('swmsc_toggle_accordion_content')) {
	function swmsc_toggle_accordion_content( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'title' => '',
			'title_bg' => '#ededed',
			'title_color' => '#444444',
			'icon_name' => ''
		), $atts ) );

		$no_icon = 'no_icon';
		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$output = '<div class="swmsc_toggle_box_accordion">
						<span class="swmsc_toggle_box_title_accordion" style="background:'.$title_bg.';color:'.$title_color.';">';

						if ( $icon_name != '' && $icon_name != '- Select Icon -' ) {
							$output .= '<span class="swmsc_toggle_box_title_icon" style="color:'.$title_color.';"><i class="fa fa-'.$icon_name.'"></i></span>';
							$no_icon = '';
						}

		$output .= 		'<span class="swmsc_toggle_box_title_text '.$no_icon.'">'.$title.'<i class="fa fa-plus-square-o openclose" style="color:'.$title_color.';"></i><i class="fa fa-minus-square-o openclose" style="color:'.$title_color.';"></i></span></span>
						<div class="swmsc_toggle_box_inner">
							'.do_shortcode($content).'
						</div>
					</div>';

		return $output;
	} add_shortcode('swmsc_toggle_accordion', 'swmsc_toggle_accordion_content');
}



/* **************************************************************************************
    PULL QUOTES
************************************************************************************** */

if (!function_exists('swmsc_pullquote')) {
	function swmsc_pullquote($atts, $content = null) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
    		'quote_style' => 'pullquote_left'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_'.$quote_style.' ' . esc_attr( $class ) . '"' : 'class="swmsc_'.$quote_style.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		return '<span '.$id.' '.$class.' '.$style.'>' . do_shortcode($content) . '</span>';
	}

	add_shortcode('swmsc_pullquote', 'swmsc_pullquote');

}

/* **************************************************************************************
    LIST STYLES
************************************************************************************** */

if (!function_exists('swmsc_list')) {
	function swmsc_list($atts, $content = null, $list) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="'.$list.' ' . esc_attr( $class ) . '"' : 'class="'.$list.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		return '<div '.$id.' '.$class.' '.$style.'>' . do_shortcode($content) . '</div>';
	}

	$swmsc_list_array = array("list_lower_roman","list_upper_roman","list_lower_alpha","list_upper_alpha","steps_with_box","steps_with_circle");

	foreach ($swmsc_list_array as $swmsc_list_name) {
		add_shortcode($swmsc_list_name, 'swmsc_list');
	}
}

/* **************************************************************************************
    INFO BOXES
************************************************************************************** */

if (!function_exists('swmsc_alert')) {
	function swmsc_alert($atts, $content = null, $infobox) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
    		'alert_type' => 'info',
    		'close' => 'true',
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_alert_'.esc_attr($alert_type).'_box swmsc_alert_boxes ' . esc_attr( $class ) . '"' : 'class="swmsc_alert_'.esc_attr($alert_type).'_box swmsc_alert_boxes"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
		$close  = ( $close == 'true' ) ? '<span class="swmsc_hide_boxes"><i class="fa fa-times-circle"></i></span>' : '';

		return '<p '.$id.' '.$class.' '.$style.'>' . $close . do_shortcode($content) . '</p>';

	}
	add_shortcode('swmsc_alert', 'swmsc_alert');
}


/* **************************************************************************************
   LIST ICON
************************************************************************************** */

if (!function_exists('swmsc_icon_list')) {
	function swmsc_icon_list( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_the_icons ' . esc_attr( $class ) . '"' : 'class="swmsc_the_icons"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<ul '.$id.' '.$class.' '.$style.'>
						'.do_shortcode($content).'
					</ul>';

		return $output;
	}

	add_shortcode( 'icon_list', 'swmsc_icon_list' );
}

if (!function_exists('swmsc_list_icon')) {
	function swmsc_list_icon( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'icon_name' => '',
			'icon_color' => ''

		), $atts ) );

		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$output = '<li><i class="fa fa-'.$icon_name.'" style="color:'.$icon_color.';"></i>'.do_shortcode($content).'</li>';

		return $output;
	}

	add_shortcode( 'swmsc_list_icon', 'swmsc_list_icon' );
}

/* **************************************************************************************
   ICON
************************************************************************************** */

if (!function_exists('swmsc_icon')) {
	function swmsc_icon( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'icon_name' => 'fa-star',
			'icon_color' => '#606060',
			'icon_bg_color' => '#ffffff',
			'icon_size' => 'small',
			'icon_style' => 'default',
			'icon_border' => 'false',
			'border_color' => '#606060',
			'margin' => '4',
			'rotate' => 'false',
			'link' => '#',
			'target' => '_self',
			'animation_style' => 'none'
		), $atts ) );

		$border_radius = '';
		$icon_bg = '';
		$border_styles = '';
		$rotate_icon = '';
		$block_class = '';
		$icon_name = preg_replace('/fa-/', '', $icon_name);

		if ( $icon_style == 'square' ) {
			$border_radius = '3';
		} else if ( $icon_style == 'circle' ) {
			$border_radius = '1000';
		}

		if ( $icon_style == 'square' || $icon_style == 'circle' ) {
			$icon_bg = 'background-color:'.$icon_bg_color.'; border-radius:'.intval($border_radius).'px; ';
			$block_class = "i_box";
		}

		if ( $icon_border == 'true' ) {
			$border_styles = 'border:1px solid '.$border_color.'; ';
		}

		if ( $rotate == 'true' ) {
			$rotate_icon = 'fa-spin';
		}

		if ( $animation_style != 'none') {
			$animation_style = 'swmsc_element_visible '.$animation_style.' ';
		} else {
			$animation_style = '';
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<a '.$id.' '.$class.' '.$style.' href="'.$link.'" target="'.$target.'"><i class="fa '.$block_class.' '.$rotate_icon.' fa-'.$icon_name.' size_'.$icon_size.' '.$animation_style.'" style="'.$border_styles.' '.$icon_bg.' color:'.$icon_color.'; margin:'.intval($margin).'px;"></i></a>';

		return $output;
	}

	add_shortcode( 'swmsc_icon', 'swmsc_icon' );
}

/* **************************************************************************************
   SIMPLE ICON
************************************************************************************** */

if (!function_exists('fa_icon')) {
	function fa_icon($atts, $content = null) {

		extract( shortcode_atts( array (
			'id' => '',
			'class' => '',
			'style' => '',
			'icon_name' => 'fa-star'
			), $atts ) );

		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="fa '.$icon.' ' . esc_attr( $class ) . '"' : 'class="fa fa-'.$icon_name.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		return '<i '.$id.' '.$class.' '.$style.'></i>';
	}

	add_shortcode('fa_icon', 'fa_icon');
}


/* **************************************************************************************
    GAP
************************************************************************************** */

if (!function_exists('swmsc_gap')) {
	function swmsc_gap($atts, $content = null) {

		extract( shortcode_atts( array (
				'id' => '',
    			'class' => '',
    			'style' => '',
				'size' => '10px',
			), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="clear swmsc_gap ' . esc_attr( $class ) . '"' : 'class="clear swmsc_gap"';
		$style  = ( $style != '' ) ? 'style="margin:'.$size.' 0 0 0; ' . $style . '"' : 'style="margin:'.$size.' 0 0 0;"';

		return '<div '.$id.' '.$class.' '.$style.'></div>';
	}

	add_shortcode('gap', 'swmsc_gap');
}

if (!function_exists('swmsc_space')) {
	function swmsc_space($atts, $content = null) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'size' => '10px'
			), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_space ' . esc_attr( $class ) . '"' : 'class="swmsc_space"';
		$style  = ( $style != '' ) ? 'style="padding:'.$size.' 0 0 0; ' . $style . '"' : 'style="padding:'.$size.' 0 0 0;"';

		return '<div '.$id.' '.$class.' '.$style.'></div>';
	}

	add_shortcode('space', 'swmsc_space');
}

/* **************************************************************************************
	PROGRESS BAR
************************************************************************************** */

if (!function_exists('swmsc_progress_bar')) {
	function swmsc_progress_bar( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'percentage' => '50',
			'title_text' => 'Title Text',
			'background' => '#606060'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_progress_bar ' . esc_attr( $class ) . '"' : 'class="swmsc_progress_bar"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_progress_bar_title">'.$title_text.'<span>'.$percentage.'%</span><div class="clear"></div></div>
						<div class="swmsc_progress_bar_block">
							<span class="swmsc_progress_bar_out swmsc_dark_gradient" data-width="'.$percentage.'" style="background-color:'.$background.';">
								<span class="swmsc_progress_bar_in"></span>
							</span>
						</div>
						<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_progress_bar', 'swmsc_progress_bar' );
}


/* **************************************************************************************
	COUNTER BOX
************************************************************************************** */

if (!function_exists('swmsc_counter_boxes')) {
	function swmsc_counter_boxes($atts, $content = null) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_row swmsc_counter_boxes clear ' . esc_attr( $class ) . '"' : 'class="swmsc_row swmsc_counter_boxes clear"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		return '<div '.$id.' '.$class.' '.$style.'>'.do_shortcode($content).'<div class="clear"></div></div>';
	}
	add_shortcode('swmsc_counter_boxes', 'swmsc_counter_boxes');
}

if (!function_exists('swmsc_counter_box')) {
	function swmsc_counter_box( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'box_bg_color' => '#ffffff',
			'font_color' => '#606060',
			'icon_name' => '',
			'icon_bg_color' => '#606060',
			'icon_color' => '#ffffff',
			'counter_number' => '1000',
			'unit' => '',
			'unit_position' => '',
			'speed' => '2000',
			'desc_text_size' => '15',
			'column' => '4'
		), $atts ) );

		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_counter_box swmsc_column'.$column.' ' . esc_attr( $class ) . '"' : 'class="swmsc_counter_box swmsc_column'.$column.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_counter_box_gap">
							<div class="swmsc_counter_box_wrap" style=" background:'.$box_bg_color.'; color:'.$font_color.';">';

								if ( $icon_name != '' && $icon_name != '- Select Icon -' ) {
									$output .=  '<div class="swmsc_counter_icon" style=" background:'.$icon_bg_color.'; color:'.$icon_color.';">
													<i class="fa fa-'.$icon_name.'"></i>
												</div>';
								}

		$output .=  			'<div class="swmsc_stat_counter" data-finalNumber="'.$counter_number.'" data-speed="'.$speed.'">';

									if ( $unit != '' && $unit_position == 'before_number') {
										$output .=  '<span class="swmsc_counter_box_percent">'.$unit.'</span>';
									}

		$output .=  				'<span class="swmsc_counter_box_count"></span>';

									if ( $unit != '' && $unit_position == 'after_number') {
										$output .=  '<span class="swmsc_counter_box_percent">'.$unit.'</span>';
									}

		$output .=  				'<div class="swmsc_counter_box_stat_text" style="font-size:'.intval($desc_text_size).'px;">'.do_shortcode($content).'</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_counter_box', 'swmsc_counter_box' );
}


/* **************************************************************************************
	FANCY HEADING
************************************************************************************** */

if (!function_exists('swmsc_fancy_heading')) {
	function swmsc_fancy_heading( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'font_size' => '30',
			'text_align' => 'center',
			'icon_name' => '',
			'icon_color' => '#8373ce',
			'border_color' => '#fcb54d',
			'line_height' => '36',
			'margin_bottom' => '40',
			'margin_top' => '40'
		), $atts ) );

		$swmsc_get_sectionID = '';
		$icon_name = preg_replace('/fa-/', '', $icon_name);

		if ( $icon_name == '' || $icon_name == '- Select Icon -' ) {
			$icon_name = 'fancyHeadingNoIcon';
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_fancy_heading swmsc_fancy_heading_'.$text_align.' fh_icon_'.$icon_name.' ' . esc_attr( $class ) . '"' : 'class="swmsc_fancy_heading swmsc_fancy_heading_'.$text_align.' fh_icon_'.$icon_name.'"';
		$style  = ( $style != '' ) ? 'style="margin-top:'.$margin_top.';margin-bottom:'.$margin_bottom.'; ' . $style . '"' : 'style="margin-top:'.$margin_top.';margin-bottom:'.$margin_bottom.';"';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_fancy_heading_text" style="font-size:'.intval($font_size).'px;line-height:'.intval($line_height).'px;">
							'.do_shortcode($content).'
							<div class="swmsc_fancy_heading_border">
								<span class="swmsc_fancy_heading_border1" style="background:'.$border_color.';"></span>
								<span class="swmsc_fancy_heading_border2" style="background:'.$border_color.';"></span>
								<span class="swmsc_fancy_heading_icon"><i class="fa fa-'.$icon_name.'"  style="color:'.$icon_color.';"></i></span>
							</div>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_fancy_heading', 'swmsc_fancy_heading' );
}

/* **************************************************************************************
	BLOCKQUOTE
************************************************************************************** */

if (!function_exists('swmsc_blockquote')) {
	function swmsc_blockquote( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		return '<blockquote '.$id.' '.$class.' '.$style.'>'.do_shortcode($content).'</blockquote>';
	} add_shortcode('blockquote', 'swmsc_blockquote');
}

/* **************************************************************************************
	DROPCAPS
************************************************************************************** */

if (!function_exists('swmsc_dropcap')) {
	function swmsc_dropcap( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'style' => 'dark',
			'id' => '',
    		'class' => '',
    		'border_radius' => '5px',
    		'dropcap_style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_dropcap '.$dropcap_style.' ' . esc_attr( $class ) . '"' : 'class="swmsc_dropcap '.$dropcap_style.'"';
		$style  = ( $style != '' ) ? 'style="border-radius:'.$border_radius.';' . $style . '"' : 'style="border-radius:'.intval($border_radius).'px;"';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						'.do_shortcode($content).'
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_dropcap', 'swmsc_dropcap' );
}


/* **************************************************************************************
	SERVICES
************************************************************************************** */

if (!function_exists('swmsc_school_service')) {
	function swmsc_school_service( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'title' => 'Service Title',
			'icon_name' => 'trophy',
			'skin_color' => '#adcb69',
			'border_color' => '#fdd94e',
			'text_align' => 'left'
		), $atts ) );

		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_school_service sss_'.$text_align.' ' . esc_attr( $class ) . '"' : 'class="swmsc_school_service sss_'.$text_align.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'>

						<div class="swmsc_school_service_title">
							<h4 style="color:'.$skin_color.';" >'.$title.'</h4>
						</div>

						<div class="swmsc_school_service_icon_section">
							<div class="swmsc_school_service_icon" style="background:'.$skin_color.';" >
								<div class="swmsc_school_service_icon_holder">
									<span><i class="fa fa-'.$icon_name.'"></i></span>
								</div>
							</div>
							<span style="background:'.$border_color.';" class="swmsc_school_service_icon_brd1"></span>
							<span style="background:'.$border_color.';" class="swmsc_school_service_icon_brd2"></span>
						</div>

						<div class="swmsc_school_service_text">
							'.do_shortcode($content).'
						</div>

						<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_school_service', 'swmsc_school_service' );
}

/* **************************************************************************************
	SERVICES - ICON STYLE
************************************************************************************** */

if (!function_exists('swmsc_service_style_icon')) {
	function swmsc_service_style_icon( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
    		'icon_position' => 'center',
			'icon_name' => '',
			'icon_size' => 'super-large',
			'icon_color' => '#444444',
			'icon_background' => '',
			'icon_space' => '20px',
			'icon_style' => 'icon_box',
    		'border_width' => '1px',
			'border_type' => 'solid',
			'border_radius' => '5px',
			'border_color' => '#e6e6e6',
			'title_text' => 'Service Title',
			'title_text_size' => '18px',
			'title_text_color' => '#444444',
			'title_icon_link' => '',
			'title_bottom_margin' => '10px',
			'target' => '_blank',
			'responsive_width' => '767'
		), $atts ) );

		$icon_name = preg_replace('/fa-/', '', $icon_name);

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$icon_space = intval($icon_space).'px';
		$js_icon_space = $icon_space;

		if ( $icon_position == 'left' ) {
			$icon_space = 'margin-right:'.$icon_space;
		} elseif ( $icon_position == 'right' ) {
			$icon_space = 'margin-left:'.$icon_space;
		} else {
			$icon_space = 'margin-bottom:'.$icon_space;
		}

		$icon_line = '<i class="fa fa-'.$icon_name.'" style="color:'.$icon_color.';"></i>';

		if ( $icon_style == 'icon_box' && $border_width != 0 ) {
			$icon_line = '<i class="fa fa-'.$icon_name.'" style="color:'.$icon_color.'; margin-top:-'.intval($border_width).'px;"></i>';
		}

		if ( $title_icon_link != '' ) {
			$icon_line = '<a href="'.$title_icon_link.'"  target="'.$target.'">'.$icon_line.'</a>';
		}

		if ( $icon_background == '' ) {
			$icon_background = 'transparent';
		}

		if ( $icon_name != '' ) {
			if ( $icon_style == 'icon_box' ) {
				$icon_name = '<div class="swmsc_services_item_holder swmsc_services_icon_'.$icon_size.'" style="'.$icon_space.';">
								<span style="border:'.intval($border_width).'px '.$border_type.' '.$border_color.'; border-radius:'.$border_radius.'; background:'.$icon_background.';">
									'.$icon_line.'
								</span>
							</div>';
			} else {
				$icon_name = '<div class="swmsc_services_icon_holder swmsc_services_icon_'.$icon_size.' swmsc_services_icon_only" style="'.$icon_space.';">
								<span>
									'.$icon_line.'
								</span>
							</div>';
			}

		}

		if ( $title_icon_link != '' ) {
			$title_link = '<h5 style="margin-bottom:'.intval($title_bottom_margin).'px;"><a href="'.$title_icon_link.'" style="font-size:'.intval($title_text_size).'px; color:'.$title_text_color.';"  target="'.$target.'">'.$title_text.'</a></h5>';
		} else {
			$title_link = '<h5 style="font-size:'.intval($title_text_size).'px; color:'.$title_text_color.';margin-bottom:'.intval($title_bottom_margin).'px;">'.$title_text.'</h5>';
		}

		if ( $title_text != '' ) {
			$title_text = $title_link;
		}

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_services_icons swmsc_responsive_services swmsc_services_item_'.$icon_position.'" data-responsive="'.intval($responsive_width).'" data-margin="'.intval($js_icon_space).'" >
								'.$icon_name.'
							<div class="swmsc_services_icon_content">
								'.$title_text.'
								'.do_shortcode($content).'
								</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_service_style_icon', 'swmsc_service_style_icon' );
}

/* **************************************************************************************
	SERVICES - IMAGE STYLE
************************************************************************************** */

if (!function_exists('swmsc_service_style_image')) {
	function swmsc_service_style_image( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
    		'image_src' => '',
    		'alt' => '',
    		'image_position' => 'center',
    		'border_width' => '1px',
			'border_type' => 'solid',
			'border_radius' => '5px',
			'border_color' => '#e6e6e6',
			'padding' => '0',
			'image_space' => '20px',
			'title_text' => 'Service Title',
			'title_text_size' => '18px',
			'title_text_color' => '#444444',
			'title_image_link' => '',
			'title_bottom_margin' => '10px',
			'target' => '_blank',
			'responsive_width' => '767'
		), $atts ) );


		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$image_space = intval($image_space).'px';
		$js_image_space = $image_space;

		if ( $image_position == 'left' ) {
			$image_space = 'margin-right:'.$image_space;
		} elseif ( $image_position == 'right' ) {
			$image_space = 'margin-left:'.$image_space;
		} else {
			$image_space = 'margin-bottom:'.$image_space;
		}

		if (is_numeric($image_src)) {
            $image_src = wp_get_attachment_url($image_src);
        } else {
            $image_src = $image_src;
        }

		$image_line = '<img src="'.$image_src.'" alt="'.$alt.'" style="border:'.intval($border_width).'px '.$border_type.' '.$border_color.'; border-radius:'.$border_radius.'; padding:'.intval($padding).'px;" >';

		if ( $title_image_link != '' ) {
			$image_line = '<a href="'.$title_image_link.'"  target="'.$target.'">'.$image_line.'</a>';
		}

		$image_div = '<div class="swmsc_services_item_holder" style="'.$image_space.';">
								<span>
									'.$image_line.'
								</span>
							</div>';

		if ( $title_image_link != '' ) {
			$title_link = '<h5 style="margin-bottom:'.intval($title_bottom_margin).'px;"><a href="'.$title_image_link.'" style="font-size:'.intval($title_text_size).'px; color:'.$title_text_color.';"  target="'.$target.'">'.$title_text.'</a></h5>';
		} else {
			$title_link = '<h5 style="font-size:'.intval($title_text_size).'px; color:'.$title_text_color.';margin-bottom:'.intval($title_bottom_margin).'px;">'.$title_text.'</h5>';
		}

		if ( $title_text != '' ) {
			$title_text = $title_link;
		}

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_services_images swmsc_responsive_services swmsc_services_item_'.$image_position.'" data-responsive="'.intval($responsive_width).'" data-margin="'.intval($js_image_space).'" >
								'.$image_div.'
							<div class="swmsc_services_image_content">
								'.$title_text.'
								'.do_shortcode($content).'
								<div class="clear"></div>
								</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_service_style_image', 'swmsc_service_style_image' );
}


/* **************************************************************************************
	SERVICES - SIMPLE ICON & TITLE
************************************************************************************** */

if (!function_exists('swmsc_icon_title')) {
	function swmsc_icon_title( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'title_text' => 'Title Text',
			'text_icon_size' => '20px',
			'title_text_color' => '#444444',
			'title_icon_link' => '#',
			'icon_name' => 'user',
			'icon_color' => '#444444',
			'text_align' => 'right',
			'margin_bottom' => '20px',
			'target' => '_blank'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$icon_name = preg_replace('/fa-/', '', $icon_name);
		$icon_name = '<i class="fa fa-'.$icon_name.'" style="color:'.$icon_color.';"></i>';

		if ( $title_icon_link != '' ) {
			$title_text = '<a href="'.$title_icon_link.'" style="color:'.$title_text_color.';" target="'.$target.'">'.$title_text.'</a>';
		} else {
			$title_text = '<span style="color:'.$title_text_color.';" target="'.$target.'">'.$title_text.'</span>';
		}

		$icon_left = ($text_align == 'left') ? $icon_name : '' ;
		$icon_right = ($text_align == 'right') ? $icon_name : '' ;

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_icon_title swmsc_it_'.$text_align.'" style="margin-bottom:'.intval($margin_bottom).'px;">
							<span>
								<h5 style="font-size:'.intval($text_icon_size).'px; color:'.intval($text_icon_size).'px;">
									'.$icon_left.$title_text.$icon_right.'
								</h5>
							</span>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_icon_title', 'swmsc_icon_title' );
}

/* **************************************************************************************
	SERVICES BOX
************************************************************************************** */

if (!function_exists('swmsc_content_box')) {
	function swmsc_content_box( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'box_padding' => '20px',
			'border_width' => '1px',
			'border_type' => 'solid',
			'border_color' => '#e6e6e6',
			'border_radius' => '5px',
			'background_color' => '#ffffff',
			'background_image' => '',
			'background_repeat' => 'repeat',
			'background_position' => 'center-top',
			'margin_bottom' => '20px',
			'image_width' => 'auto_width'
		), $atts ));

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		if ( $background_image != '' ) {
	        $background_image = (is_numeric($background_image)) ? $background_image = wp_get_attachment_url($background_image) : $background_image = $background_image;
			$background_image = 'background-image:url(' . $background_image . '); background-position:' . str_replace( '-', ' ', $background_position) . '; background-repeat: ' . $background_repeat . '; ';
		}

		$background_color = 'background-color:' . $background_color . ';' ;
		$background_style = $background_color . $background_image ;

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_service_box" style="'.$background_style.';border:'.intval($border_width).'px '.$border_type.' '.$border_color.'; border-radius:'.intval($border_radius).'px;margin-bottom:'.intval($margin_bottom).'px;">
							<div class="swmsc_service_box_content '.$image_width.'" style="padding:'.$box_padding.'; border-radius:'.intval($border_radius).'px;">
								'.do_shortcode($content).'
								<div class="clear"></div>
							</div>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_content_box', 'swmsc_content_box' );
}

/* **************************************************************************************
  TEAM MEMBER - LARGE
************************************************************************************** */

if (!function_exists('swmsc_team_member')) {
	function swmsc_team_member( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'image_src' => '',
			'alt' => '',
			'name' => 'John Doe',
			'title_text_color' => '#8373ce',
			'position' => 'Director',
			'image_align' => 'left',
			'content_bg' => 'gray'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_team_members clientImage_'.$image_align.' tm_bg_'.$content_bg.' ' . esc_attr( $class ) . '"' : 'class="swmsc_team_members clientImage_'.$image_align.' tm_bg_'.$content_bg.'"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		if (is_numeric($image_src)) {
            $image_src = wp_get_attachment_url($image_src);
        } else {
            $image_src = $image_src;
        }

		$output = 	'<div '.$id.' '.$class.' '.$style.'>';

						if ( $image_src != '' ) {
							$output .= '<div class="swmsc_team_img">
											<img src="'.$image_src.'" alt="'.$alt.'">
										</div>';
						}

		$output .= 		'<div class="swmsc_team_content">
							<div class="swmsc_team_content_holder">';

								if ( $image_src != '' ) {
									$output .= '<div class="swmsc_team_arrow"><span><i class="fa fa-caret-left"></i></span></div>';
								}

		$output .= 				'<div class="swmsc_team_title">
									<h5 style="color:'.$title_text_color.';">'.$name.'</h5>
									<span>'.$position.'</span>
								</div>
								<div class="swmsc_team_text">
									'.do_shortcode($content).'
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>';


		return $output;
	}

	add_shortcode( 'swmsc_team_member', 'swmsc_team_member' );
}

/* **************************************************************************************
  TEAM MEMBER - SMALL
************************************************************************************** */

if (!function_exists('swmsc_team_member_small')) {
	function swmsc_team_member_small( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'image_src' => '',
			'alt' => '',
			'name' => 'John Doe',
			'name_text_size' => '22px',
			'position' => '',
			'position_text_size' => '16px',
			'text_color' => '#8373ce',
			'border_color' => '#fcb54d',
			'border_width' => '2px',
			'border_radius' => '20px',
			'content_box_bg' => '#ffffff',
			'content_box_position' => 'bottom',
			'icon1_name' => '',
			'icon2_name' => '',
			'icon3_name' => '',
			'icon4_name' => '',
			'icon5_name' => '',
			'icon1_url' => '#',
			'icon2_url' => '#',
			'icon3_url' => '#',
			'icon4_url' => '#',
			'icon5_url' => '#',
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		if (is_numeric($image_src)) {
            $image_src = wp_get_attachment_url($image_src);
        } else {
            $image_src = $image_src;
        }

		$team_content = '<div class="swmsc_team_member_small_content" style="border-color:'.$border_color.';background:'.$content_box_bg.';border-radius:'.intval($border_radius).'px; border-width:'.intval($border_width).'px;">
							<h5 style="color:'.$text_color.';font-size:'.intval($name_text_size).'px;">'.$name.'</h5>';

		if ( $position != '' ) {
			$team_content .= '<p style="color:'.$text_color.';font-size:'.intval($position_text_size).'px;">'.$position.'</p>';
		}

		if ( $icon1_url != '' ) {

			$team_icons = '<ul>';

			$team_s_icons = array(
				$icon1_name => $icon1_url,
				$icon2_name => $icon2_url,
				$icon3_name => $icon3_url,
				$icon4_name => $icon4_url,
				$icon5_name => $icon5_url
			);

			foreach ( $team_s_icons as $icon_name => $icon_url ) {
				if ( $icon_name != '' ) {
					$icon_name = preg_replace('/fa-/', '', $icon_name);
					$team_icons .= '<li style="border-color:'.$text_color.';"><a href="'.$icon_url.'" style="color:'.$text_color.';"><i class="fa fa-'.$icon_name.'"></i></a></li>';
				}
			}

			$team_icons .= '</ul>';
		}

		$team_content .= $team_icons;

		$team_content .= '</div>';

		$output = '<div '.$id.' '.$class.' '.$style.'>
					<div class="swmsc_team_member_small tmbox_'.$content_box_position.'">';

		if ( $content_box_position == 'top' ) {
			$output .= $team_content;
		}

		if ( $image_src != '' ) {

			$output .= '<div class="swmsc_team_member_small_img" style="border-radius:'.intval($border_radius).'px;" >
						<img src="'.$image_src.'" style="border-radius:'.intval($border_radius).'px;" alt="'.$alt.'">
					</div>';
		}

		if ( $content_box_position == 'bottom' ) {
			$output .= $team_content;
		}

		$output .= '</div></div>';

		return $output;
	}

	add_shortcode( 'swmsc_team_member_small', 'swmsc_team_member_small' );
}


/* **************************************************************************************
   PRICING TABLES
************************************************************************************** */

if (!function_exists('swmsc_pricing_table')) {
	function swmsc_pricing_table( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'title' => 'Table Title',
			'small_description' => '',
			'price' => '25',
			'skin_color' => '#adcb69',
			'skin_color_bg_text' => '#ffffff',
			'price_sub_text' => 'per day',
			'button_link' => '#',
			'target' => '_self',
			'button_text' => 'Join Now!',
			'image_src' => '',
			'currency_symbol' => '$'
		), $atts ) );

		$swmsc_no_pt_img = '';

		if ( $image_src == '' ) {
			$swmsc_no_pt_img = 'swmsc_pt_noImg';
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_pricing_tables ' . esc_attr( $class ) . '"' : 'class="swmsc_pricing_tables"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		if (is_numeric($image_src)) {
            $image_src = wp_get_attachment_url($image_src);
        } else {
            $image_src = $image_src;
        }

		$output =  '<div '.$id.' '.$class.' '.$style.'>';

						if ( $image_src != '' ) {
							$output .=  '<div class="swmsc_pt_top">
											<img src="'.$image_src.'" alt="">
										</div>';
						}

		$output .=  	'<div class="swmsc_pt_middle '.$swmsc_no_pt_img.'" style="background:'.$skin_color.'; color:'.$skin_color_bg_text.';">';

							if ( $image_src != '' ) {
								$output .=  '<div class="swmsc_pt_price" style="border-color:'.$skin_color.';">
												<span class="swmsc_pt_price_amount" style="color:'.$skin_color.';"><sup>'.$currency_symbol.'</sup>'.$price.'</span>
												<span class="swmsc_pt_price_day">'.$price_sub_text.'</span>
											</div>';
							}

		$output .=  		'<h4>'.$title.'</h4>';

							if ( $small_description != '' ) {
								$output .=  '<p>'.$small_description.'</p>';
							}

		$output .=  	'</div>';

		$output .=  	'<div class="swmsc_pt_bottom '.$swmsc_no_pt_img.'">
							'.do_shortcode($content).'
							<div class="clear"></div>';

						if ( $button_text != '' && $image_src != '' ) {
							$output .=  '<div class="swmsc_pt_button" >
											<span><a href="'.$button_link.'" target="'.$target.'" style="background:'.$skin_color.'; color:'.$skin_color_bg_text.';">'.$button_text.'</a></span>
										</div>';
						}

		$output .=  	'</div>';

		if ( $image_src == '' ) {
			$output .=  '<div class="swmsc_pt_no_img">
							<div class="swmsc_pt_no_img_price">
								<span class="swmsc_pt_price_amount" style="color:'.$skin_color.';">'.$currency_symbol.$price.'</span>
								<span class="swmsc_pt_price_day">'.$price_sub_text.'</span>
							</div>

							<div class="swmsc_pt_button" >
								<span><a href="'.$button_link.'" style="background:'.$skin_color.'; color:'.$skin_color_bg_text.';">'.$button_text.'</a></span>
							</div>
							<div class="clear"></div>
						</div>';
		}

		$output .=  '</div>';

		return $output;
	}

	add_shortcode( 'swmsc_pricing_table', 'swmsc_pricing_table' );
}

/* **************************************************************************************
	TABS
************************************************************************************** */

if (!class_exists('SWMSC_Tabs')) {

	class SWMSC_Tabs {

		private $itemIncrement = 1;
		private $tab_count = 1;
		private $tabs = array();

		function __construct() {
			# Add shortcodes
			add_shortcode('swmsc_tabs', array($this, 'tabs_shortcode'));
			add_shortcode('swmsc_tab', array($this, 'tabs_shortcode_nested'));
		}

		public function tabs_shortcode( $atts, $content= null ){

		  $this->tab_count = 0;
		  $default = array(
		      	'id' => '',
    			'class' => '',
    			'style' => '',
		      	'tabs_style' => 'tabs_horizontal',
		      	'tabs_align' => 'center'
		       );
		  $data = shortcode_atts($default,$atts);
		  do_shortcode( $content );

		  if( is_array( $this->tabs ) ) {

		  	$itemIncrement = '';

		    if ( $itemIncrement == '' ) {
			  	$itemIncrement = 1;
			}

		    foreach( $this->tabs as $tab ){

		    	if ($tab['icon_name'] != '' ) {
		    		$iconClass = 'swmTabIcon';
		    	} else {
		    		$iconClass = 'swmNoTabIcon';
		    	}

		    	$icon_name = preg_replace('/fa-/', '', $tab['icon_name']);

		      $mytabs[] = '<li style="background:'.$tab['background'].';color:'.$tab['color'].';" class="'.$iconClass.'" ><a href="#swmsc-tab-'.$itemIncrement.'" style="color:'.$tab['color'].'"><i class="fa fa-'.$icon_name.'"></i>'.$tab['title'].'</a><span style="color:'.$tab['background'].'"><i class="fa fa-caret-down"></i></span></li>';

		      $tabcontent[] = '<div id="swmsc-tab-'.$itemIncrement.'" class="swmsc_tab">'.$tab['content'].'<div class="clear"></div></div>';
		      $itemIncrement++;
		    }

		    $id     = ( $data['id']    != '' ) ? 'id="' . esc_attr( $data['id'] ) . '"' : '';
			$class  = ( $data['class'] != '' ) ? 'class="swmsc_tabs '.$data['tabs_style'].' tab_align_'.$data['tabs_align'].' ' . esc_attr( $data['class'] ) . '"' : 'class="swmsc_tabs '.$data['tabs_style'].' tab_align_'.$data['tabs_align'].'"';
			$style  = ( $data['style'] != '' ) ? 'style="' . $data['style'] . '"' : '';

			$output = '<div '.$id.' '.$class.' '.$style.'>
							<ul class="tab-nav tab-clearfix">'.implode( "", $mytabs ).'</ul>
							'.implode( "", $tabcontent ).'
		   				</div>';
		  }

		  unset( $this->tabs );
		  return $output;
		}

		public function tabs_shortcode_nested( $atts, $content= null ){
		  	extract(shortcode_atts(array(
				'title' => '',
				'icon_name' => '',
				'background' => '#f1f1f1',
				'color' => '#555555'
		    ), $atts) );

		  $x = $this->tab_count;
		  $content = do_shortcode($content);
		  $this->tabs[$x] = array(
		  	'title' => $title,
		  	'content' => $content,
		  	'icon_name' => $icon_name,
		  	'background' => $background,
		  	'color' => $color
		  ); /* User input bind in supper globar array */
		  $this->tab_count++;
		}

	}

	$SWMSC_Tabs = new SWMSC_Tabs;

}

/* **************************************************************************************
	TESTIMONIALS
************************************************************************************** */

if (!function_exists('swmsc_testimonials')) {
	function swmsc_testimonials( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'columns' => '3',
			'display_testimonials' => '3',
			'exclude' => '',
			'quote_icon' => 'true',
			'person_img' => 'true',
			'colorbox' => 'true',
			'orderby' => 'date',
			'order' => 'DESC'
		), $atts ) );

		$display_column = '';

		global $paged;
		$count = 1;

		$exclude_cat = array_map('intval', explode(',', $exclude));

		$args = array(
			'post_type' => 'testimonials',
			'orderby'=> $orderby,
			'order'     => $order,
			'posts_per_page' => $display_testimonials,
			'paged' => $paged,
			'type' => get_query_var('type'),
			'tax_query' => array(
				array(
					'taxonomy' => 'testimonials-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
					)
			) // end of tax_query
		);

		$query = new WP_Query( $args );

		$id     = ( $id    != '' ) ? 'id="swmsc-item-entries ' . esc_attr( $id ) . '"' : 'id="swmsc-item-entries"';
		$class  = ( $class != '' ) ? 'class="swmsc_row swmsc_testimonials isotope swmsc_universal_grid_sort ' . esc_attr( $class ) . '"' : 'class="swmsc_row swmsc_testimonials isotope swmsc_universal_grid_sort"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'>';

		while ($query->have_posts()) : $query->the_post();

			$post_id = get_the_ID();
			$swmsc_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
			$swmsc_client_details = get_post_meta($post_id, 'swmsc_client_details', TRUE);
			$swmsc_testimonials_p_bg_col = get_post_meta($post_id, 'swmsc_testimonials_p_bg_col', TRUE);
			$swmsc_testimonials_p_text_col = get_post_meta($post_id, 'swmsc_testimonials_p_text_col', TRUE);

			if ( $colorbox != 'true' ) {
				$swmsc_testimonials_p_bg_col = '';
				$swmsc_testimonials_p_text_col = '';
			}

			$output .= '<div class="swmsc_column swmsc_column'.$columns.' swmsc_universal_grid swmsc_testimonials_block">
							<div class="swmsc_column_gap">

								<div class="swmsc_testimonials_box">
									<div class="swmsc_testimonials_top">';

										if ( $swmsc_featured_image && $person_img == 'true' ) {
											$output .= get_the_post_thumbnail($post_id, 'swmsc-recent-post-tiny');
										}

			$output .= 					'<div class="swmsc_testimonials_title">
											<h5 style="color:'.$swmsc_testimonials_p_bg_col.'; ">'.get_the_title().'</h5>';

											if ($swmsc_client_details) {
												$output .= '<span>'.$swmsc_client_details.'</span>';
											}

			$output .= 					'</div>';

										if ( $quote_icon == 'true' ) {
											$output .= '<span class="swmsc_testimonials_quote" style="color:'.$swmsc_testimonials_p_bg_col.'; "><i class="fa fa-quote-left"></i></span>';
										}

			$output .= 					'<div class="clear"></div>
					 				</div>
					 				<div class="swmsc_testimonials_bottom" style="background:'.$swmsc_testimonials_p_bg_col.';color:'.$swmsc_testimonials_p_text_col.'; ">
					 					<span class="swmsc_testimonials_arrow" style="color:'.$swmsc_testimonials_p_bg_col.'; "><i class="fa fa-sort-asc"></i></span>
					 					<p>'.get_the_content().'</p>
					 					<div class="clear"></div>
					 				</div>
					 				<div class="clear"></div>
					 			</div>

					 			<div class="clear"></div>
					 		</div>
					 	</div>';

			$count++;

		endwhile;
		wp_reset_query();

		$output .= '</div>';

		return $output;

	}
	add_shortcode( 'swmsc_testimonials', 'swmsc_testimonials' );
}

/* **************************************************************************************
	TESTIMONIALS BOX SLIDER
************************************************************************************** */

if (!function_exists('swmsc_testimonials_slider')) {
	function swmsc_testimonials_slider( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'slide_limit' => '3',
			'person_img' => 'true',
			'slide_interval' => '5000',
			'auto_play' => 'true',
			'quote_icon' => 'true',
			'arrow_navigation' => 'true',
			'exclude' => '',
			'orderby' => 'date',
			'order' => 'DESC'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_testimonials_box_slider swmsc-carousel swmsc_testimonials ' . esc_attr( $class ) . '"' : 'class="swmsc_testimonials_box_slider swmsc-carousel swmsc_testimonials"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.' data-autoPlayTimeOut="'.$slide_interval.'" data-autoplay="'.$auto_play.'" data-navArrow="'.$arrow_navigation.'"  >';

		$count 		= 1;
		$itemlimit 	= -1;
		$pageid 	= get_the_ID();
		global $paged;

		$exclude_cat = array_map('intval', explode(',', $exclude));

		$args = array(
			'post_type' => 'testimonials',
			'orderby'=> $orderby,
			'order'     => $order,
			'posts_per_page' => $slide_limit,
			'paged' => $paged,
			'type' => get_query_var('type'),
			'tax_query' => array(
				array(
					'taxonomy' => 'testimonials-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
					)
			) // end of tax_query
		);

		$query = new WP_Query( $args );

		while ($query->have_posts()) : $query->the_post();

			$post_id = get_the_ID();
			$swmsc_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post_id));
			$swmsc_client_details = get_post_meta($post_id, 'swmsc_client_details', TRUE);
			$swmsc_testimonials_p_bg_col = get_post_meta($post_id, 'swmsc_testimonials_p_bg_col', TRUE);
			$swmsc_testimonials_p_text_col = get_post_meta($post_id, 'swmsc_testimonials_p_text_col', TRUE);

			$output .= '<div class="swmsc_testimonials_block">
								<div class="swmsc_testimonials_box">
									<div class="swmsc_testimonials_top">';

										if ( $swmsc_featured_image && $person_img == 'true' ) {
											$output .= get_the_post_thumbnail($post_id, 'swmsc-recent-post-tiny');
										}

			$output .= 					'<div class="swmsc_testimonials_title">
											<h5 style="color:'.$swmsc_testimonials_p_bg_col.'; ">'.get_the_title().'</h5>';

											if ($swmsc_client_details) {
												$output .= '<span>'.$swmsc_client_details.'</span>';
											}

			$output .= 					'</div>';

										if ( $quote_icon == 'true' ) {
											$output .= '<span class="swmsc_testimonials_quote" style="color:'.$swmsc_testimonials_p_bg_col.'; "><i class="fa fa-quote-left"></i></span>';
										}

			$output .= 					'<div class="clear"></div>
					 				</div>
					 				<div class="swmsc_testimonials_bottom" style="background:'.$swmsc_testimonials_p_bg_col.';color:'.$swmsc_testimonials_p_text_col.'; ">
					 					<span class="swmsc_testimonials_arrow" style="color:'.$swmsc_testimonials_p_bg_col.'; "><i class="fa fa-sort-asc"></i></span>
					 					<p>'.get_the_content().'</p>
					 					<div class="clear"></div>
					 				</div>
					 				<div class="clear"></div>
					 			</div>
					 			<div class="clear"></div>
					 	</div>';

			$count++;

		endwhile;
		wp_reset_query();

		$output .= '</div>';
		$output .= '<div class="clear"></div>';

		return $output;

	}
	add_shortcode( 'swmsc_testimonials_slider', 'swmsc_testimonials_slider' );
}


/* **************************************************************************************
	TESTIMONIALS WIDE SLIDER
************************************************************************************** */

if (!function_exists('swmsc_testimonials_wide_slider')) {
	function swmsc_testimonials_wide_slider( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
    		'max_width' => '800px',
			'slide_limit' => '3',
			'person_img' => 'true',
			'slide_interval' => '5000',
			'auto_play' => 'true',
			'arrow_navigation' => 'true',
			'circle_navigation' => 'true',
			'exclude' => '',
			'orderby' => 'date',
			'order' => 'DESC',
			'image_border_width' => '5px',
			'target' => '_blank'
		), $atts ) );

		global $paged;
		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_testimonials_wide_slider swmsc-carousel ' . esc_attr( $class ) . '"' : 'class="swmsc_testimonials_wide_slider swmsc-carousel"';
		$style  = ( $style != '' ) ? 'style="max-width:'.intval($max_width).'px;' . $style . '"' : 'style="max-width:'.intval($max_width).'px;"';
		$count 		= 1;
		$itemlimit 	= -1;
		$pageid 	= get_the_ID();
		$exclude_cat = array_map('intval', explode(',', $exclude));

		$args = array(
			'post_type' => 'testimonials',
			'orderby'=> $orderby,
			'order'     => $order,
			'posts_per_page' => $slide_limit,
			'paged' => $paged,
			'type' => get_query_var('type'),
			'tax_query' => array(
				array(
					'taxonomy' => 'testimonials-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
					)
			) // end of tax_query
		);

		$query = new WP_Query( $args );
		$testimonials_item_content = '';

		while ($query->have_posts()) : $query->the_post();

			$post_id = get_the_ID();
			$swmsc_client_details = get_post_meta($post_id, 'swmsc_client_details', TRUE);
			$swmsc_testimonials_p_bg_col = get_post_meta($post_id, 'swmsc_testimonials_p_bg_col', TRUE);
			$swmsc_testimonials_p_text_col = get_post_meta($post_id, 'swmsc_testimonials_p_text_col', TRUE);
			$swmsc_client_testimonials_url = get_post_meta($post_id, 'swmsc_client_testimonials_url', TRUE);

			$swmsc_thumb_id = get_post_thumbnail_id();
			$swmsc_thumb_url_array = wp_get_attachment_image_src($swmsc_thumb_id, 'thumbnail', true);
			$swmsc_featured_image = $swmsc_thumb_url_array[0];

			if ($swmsc_client_details) {
				$swmsc_client_details = '<span class="swmsc_tws_client_info">'.$swmsc_client_details.'</span>';
			}
			if ($swmsc_client_testimonials_url != '' ) {
				$swmsc_client_name = '<a href="'.$swmsc_client_testimonials_url.'" style="color:'.$swmsc_testimonials_p_bg_col.'; " target="'.$target.'">'.get_the_title().'</a>';
				$swmsc_client_img = '<a href="'.$swmsc_client_testimonials_url.'"  target="'.$target.'"><img src="'.$swmsc_featured_image.'" alt="" style="border-color:'.$swmsc_testimonials_p_bg_col.';border-width:'.intval($image_border_width).'px;"></a>';
			} else {
				$swmsc_client_name = get_the_title();
				$swmsc_client_img = '<img src="'.$swmsc_featured_image.'" alt="" style="border-color:'.$swmsc_testimonials_p_bg_col.';border-width:'.intval($image_border_width).'px;">';
			}

			if ( $swmsc_featured_image && $person_img == 'true' ) {
				$swmsc_client_img = '<div class="swmsc_tws_img"> '.$swmsc_client_img.'</div>';
			} else {
				$swmsc_client_img = '';
			}

			$testimonials_item_content .= '<div class="swmsc_testimonials_wide_slide">

							'.$swmsc_client_img.'
							<div class="swmsc_tws_content">
								<p>'.get_the_content().'</p>
								<div class="swmsc_tws_clientinfo">
									<span class="swmsc_tws_client_name" style="color:'.$swmsc_testimonials_p_bg_col.';">
										'.$swmsc_client_name.'
									</span>
									'.$swmsc_client_details.'
								</div>
							</div>

						</div>';

			$count++;

		endwhile;
		wp_reset_query();

		$output = 	'<div '.$id.' '.$class.' '.$style.' data-autoPlayTimeOut="'.$slide_interval.'" data-navArrow="'.$arrow_navigation.'"  data-autoplay="'.$auto_play.'"  data-navDots="'.$circle_navigation.'"  >
						'.$testimonials_item_content.'
					</div>';

		return $output;

	}
	add_shortcode( 'swmsc_testimonials_wide_slider', 'swmsc_testimonials_wide_slider' );
}



/* **************************************************************************************
	EVENTS
************************************************************************************** */

if (!function_exists('swmsc_events')) {
	function swmsc_events( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'display_events' => '3',
			'exclude' => '',
			'excerpt' => 'true',
			'address' => 'true',
			'event_type' => 'upcoming'
		), $atts ) );

		$swmsc_event_items_per_page	= -1;
		$exclude_cat = array_map('intval', explode(',', $exclude));
		$swmsc_current_date = date('Y-m-d');
		global $paged;

		if ( $event_type == 'upcoming' ) {
			$swmsc_event_compare = '>=';
			$swmsc_event_order = 'ASC';
		} else {
			$swmsc_event_compare = '<=';
			$swmsc_event_order = 'DESC';
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_universal_grid_sort isotope swmsc_events_grid swmsc_row" id="swmsc-item-entries">';

							// Events Posts Query
							$args = array(
								'post_type' => 'events',
								'posts_per_page' => $display_events,
								'paged' => $paged,
								'order'     => $swmsc_event_order,
								'orderby'	=> 'meta_value',
								'meta_key' 	=> 'swmsc_event_end_date',
								'meta_query' => array(
					                array(
					                        'key' => 'swmsc_event_end_date',
					                        'value' => $swmsc_current_date,
					                        'compare' => $swmsc_event_compare,
					                        'type' => 'CHAR'
					                    )
								),
								'tax_query' => array(
									array(
										'taxonomy' => 'events-categories',
										'field' => 'id',
										'terms' => $exclude_cat,
										'operator' => 'NOT IN',
										)
								)
							);

							$wp_query = new WP_Query( $args );

							while ($wp_query->have_posts()) : $wp_query->the_post();

								$postid = get_the_ID();
								$permalink = get_permalink( $postid  );
								$title = get_the_title( $postid  );

								$swmsc_get_events_list_image = 'swmsc-grid-image';
    							$swmsc_events_list_image = apply_filters( 'swmsc_events_list_image_size', $swmsc_get_events_list_image );

								$swmsc_event_img = get_the_post_thumbnail($postid,$swmsc_events_list_image);

								$swmsc_event_start_date 			= strtotime(rwmb_meta('swmsc_event_date'));
								$swmsc_event_start_time 			= rwmb_meta('swmsc_event_start_time');
								$swmsc_event_venue_name 			= rwmb_meta('swmsc_event_venue_name');
								$swmsc_event_venue_address_street	= rwmb_meta('swmsc_event_venue_address_street');
								$swmsc_event_venue_address_city	= rwmb_meta('swmsc_event_venue_address_city');

								$output .= '<article class="swmsc_events_box swmsc_column3 swmsc_universal_grid';

												if ( $swmsc_event_img == '' ) {
													$output .= ' swmsc-no-event-img';
												}

								$output .= ' ">';

								$output .=		'<div class="swmsc_column_gap">

													<div class="swmsc_event_img">
														<a href="'.$permalink.'">
															'.$swmsc_event_img.'
															<div class="swmsc_event_arrow swmsc_js_center swmsc_js_center_top">
																<div class="swmsc_event_arrow_holder">
																	<span><i class="fa fa-mail-forward"></i></span>
																</div>
															</div>
														</a>
													</div>

													<div class="swmsc_event_grid_content_wrap">
														<div class="swmsc_event_grid_content">

															<div class="swmsc_event_meta">
																<span class="swmsc_event_date"><i class="fa fa-calendar"></i>'.date_i18n(get_option('date_format'),$swmsc_event_start_date).'</span>
																<span class="swmsc_event_time"><i class="fa fa-clock-o"></i>'.$swmsc_event_start_time.'</span>
																<div class="clear"></div>
															</div>

															<div class="swmsc_event_title">
																<h5><a href="'.$permalink.'">'.$title.'</a></h5>
															</div>';

															if ( $excerpt == 'true') {
																$output .= '<div class="swmsc_event_excerpt">'.get_the_excerpt().'</div>';
															}


								$output .= 				'</div>';

														if ( $swmsc_event_venue_address_street != '' && $address == 'true' ) {

															$output .= '<div class="swmsc_event_grid_meta">
																			<span><i class="fa fa-map-marker"></i>'.$swmsc_event_venue_address_street;

																				if ( $swmsc_event_venue_address_city != '' ) {
																					$output .= ', ' . $swmsc_event_venue_address_city.'.';
																				}
															$output .= '	</span>
																		</div>';
														}

								$output .= 			'</div>
												</div>
											</article>';

							endwhile;
							wp_reset_postdata();

		$output .= '		<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>';

		return $output;

	}

	add_shortcode( 'swmsc_events', 'swmsc_events' );
}


/* **************************************************************************************
  EVENTS SQUARE
************************************************************************************** */

if (!function_exists('swmsc_events_posts_square')) {
	function swmsc_events_posts_square( $atts ) {
		extract( shortcode_atts( array(
			'id' => '',
    		'class' => '',
    		'style' => '',
			'cat'  => '',
			'exclude' => '',
			'display_events' => 2,
			'target' => '_self',
			'desc_limit' => '55',
			'event_type' => 'upcoming'
			), $atts ) );

		$swmsc_event_items_per_page	= -1;
		$exclude_cat = array_map('intval', explode(',', $exclude));
		$swmsc_current_date = date('Y-m-d');
		global $paged;

		if ( $event_type == 'upcoming' ) {
			$swmsc_event_compare = '>=';
			$swmsc_event_order = 'ASC';
		} else {
			$swmsc_event_compare = '<=';
			$swmsc_event_order = 'DESC';
		}

		// Events Posts Query
		$args = array(
			'post_type' => 'events',
			'posts_per_page' => $display_events,
			'paged' => $paged,
			'order'     => $swmsc_event_order,
			'orderby'	=> 'meta_value',
			'meta_key' 	=> 'swmsc_event_end_date',
			'meta_query' => array(
                array(
                        'key' => 'swmsc_event_end_date',
                        'value' => $swmsc_current_date,
                        'compare' => $swmsc_event_compare,
                        'type' => 'CHAR'
                    )
			),
			'tax_query' => array(
				array(
					'taxonomy' => 'events-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
					)
			)
		);

		$wp_query = new WP_Query( $args );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_recent_posts_square_posts ' . esc_attr( $class ) . '"' : 'class="swmsc_recent_posts_square_posts"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<ul>';

							while ($wp_query->have_posts()) :
								$wp_query->the_post();

								$swmsc_event_start_date = strtotime(rwmb_meta('swmsc_event_date'));
								$swmsc_event_start_time	= rwmb_meta('swmsc_event_start_time');
								$swmsc_event_venue_name	= rwmb_meta('swmsc_event_venue_name');

								$output .= '<li>
												<div class="swmsc_recent_posts_square_date"><a href="' . get_permalink() . '" target="'.$target.'">' . date_i18n('d',$swmsc_event_start_date).'
													<span class="swmsc_recent_posts_square_d_month">' . date_i18n('M',$swmsc_event_start_date).'</span>
													<span class="swmsc_recent_posts_square_d_year">' . date_i18n('Y',$swmsc_event_start_date).'</span></a>
												</div>

												<div class="swmsc_recent_posts_square_content">
													<div class="swmsc_recent_posts_square_title"><a href="' . get_permalink() . '" target="'.$target.'">' . get_the_title() . '</a></div>
													<p>';

														$truncate = get_the_excerpt();
														$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
														$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
														$truncate = strip_tags($truncate);
														$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $desc_limit), ' '));

														$output .= $truncate;

								$output .= 			'</p>
													<div class="swmsc_recent_posts_square_grid_date">
														<span><i class="fa fa-clock-o"></i><a href="'.get_permalink().'">'.$swmsc_event_start_time.'</a></span>
														<span><i class="fa fa-map-marker"></i><a href="' . get_permalink() . '" target="'.$target.'">'.$swmsc_event_venue_name.'</a></span>
													</div>
												</div>
												<div class="clear"></div>
											</li>';

							endwhile;
							wp_reset_postdata();

		$output .= 		'</ul>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_events_posts_square', 'swmsc_events_posts_square' );
}


/* **************************************************************************************
	CLASSES
************************************************************************************** */

if (!function_exists('swmsc_classes')) {
	function swmsc_classes( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'display_items' => '3',
			'exclude' => '',
			'orderby' => 'date',
			'order' => 'DESC',
			'excerpt' => 'true',
			'column' => '3'
		), $atts ) );

		$swmsc_event_items_per_page	= -1;
		$exclude_cat = array_map('intval', explode(',', $exclude));
		global $paged;

		// Classes Posts Query
		$args = array(
			'post_type' => 'classes',
			'orderby'	=> $orderby,
			'order'     => $order,
			'posts_per_page' => $display_items,
			'paged' => $paged,
			'type' => get_query_var('type'),
			'tax_query' => array(
				array(
					'taxonomy' => 'classes-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
					)
			) // end of tax_query
		);

		$wp_query = new WP_Query( $args );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_universal_grid_sort swmsc_classes_grid isotope swmsc_row" id="swmsc-item-entries">';

							while ($wp_query->have_posts()) : $wp_query->the_post();

								$postid = get_the_ID();
								$permalink = get_permalink( $postid  );
								$title = get_the_title( $postid  );

								$swmsc_get_classes_list_image = 'swmsc-grid-image';
    							$swmsc_classes_list_image = apply_filters( 'swmsc_classes_list_image_size', $swmsc_get_classes_list_image );

								$swmsc_classes_img = get_the_post_thumbnail($postid,$swmsc_classes_list_image);

								$swmsc_class_start_date 		= strtotime(rwmb_meta('swmsc_class_start_std_date'));
								$swmsc_class_years_old			= rwmb_meta('swmsc_class_years_old');
								$swmsc_class_size					= rwmb_meta('swmsc_class_size');
								$swmsc_class_duration 			= rwmb_meta('swmsc_class_duration');
								$swmsc_class_price 				= rwmb_meta('swmsc_class_price');
								$swmsc_class_price_subtext 		= rwmb_meta('swmsc_class_price_subtext');

		$output .= 				'<article class="swmsc_classes_box swmsc_column'.$column.' swmsc_universal_grid';

									if ( $swmsc_classes_img == '' ) { $output .= ' swmsc-no-classes-img '; }

									$output .= ' ">';

		$output .= 					'<div class="swmsc_column_gap">

										<div class="swmsc_class_img">
											<a href="'.$permalink.'" title="'.$title.'">
												'.$swmsc_classes_img;

												if ( rwmb_meta('swmsc_class_start_std_date') != '' ) {
													$output .= '<div class="swmsc_class_date swmsc_js_center swmsc_js_center_top">
														<div class="swmsc_class_date_holder">
															<span class="swmsc_cd_day">'.date_i18n('M j',$swmsc_class_start_date).'</span>
															<span class="swmsc_cd_year">'.date_i18n('Y',$swmsc_class_start_date).'</span>
														</div>
													</div>';
												} else {
													$output .= '<div class="swmsc_class_date swmsc_js_center swmsc_js_center_top swmsc_classNoDate">
														<span class="swmsc_classHoverIcon"><i class="fa fa-share"></i></span>
													</div>';
												}
		$output .= 							'</a>
										</div>

										<div class="swmsc_class_grid_content_wrap">
											<div class="swmsc_class_grid_content">

												<div class="swmsc_class_title_section">
													<div class="swmsc_class_title">';

														if ( $swmsc_class_price != '' ) {
															$output .= '<div class="swmsc_class_price">'.$swmsc_class_price.'<span>'.$swmsc_class_price_subtext.'</span></div>';
														}

														$output .= '<h5><a href="'.$permalink.'">'.$title.'</a></h5>';

														if ( $swmsc_class_duration != '' ) {
															$output .= '<div class="swmsc_class_cats"><i class="fa fa-clock-o"></i>'.$swmsc_class_duration.'</div>';
														}

		$output .= 									'</div>
													<div class="clear"></div>
												</div>';

												if ( $excerpt == 'true' ) {

													$output .= '<div class="swmsc_dot_sep"></div>
																<div class="swmsc_class_excerpt">'.get_the_excerpt().'</div>';
												}

		$output .= '						</div>

											<div class="swmsc_class_grid_meta">
												<ul>
													<li class="swmsc_class_grid_meta_age">'.apply_filters( 'swmsc_classes_raised_text',__( 'Age:', 'pre-school-shortcodes' ) ).' '.$swmsc_class_years_old.'</li>
													<li class="swmsc_class_grid_meta_size">'.apply_filters( 'swmsc_classes_raised_text',__( 'Class Size:', 'pre-school-shortcodes' ) ).' '.$swmsc_class_size.'</li>
													<li class="swmsc_class_grid_meta_arrow"><a href="'.$permalink.'"><i class="fa fa-chevron-right"></i></a></li>
												</ul>
											</div>

										</div>
									</div>
								</article>';

			endwhile;
			wp_reset_postdata();

		$output .= '<div class="clear"></div>

		</div></div>
		<div class="clear"></div>';

		return $output;


	}
	add_shortcode( 'swmsc_classes', 'swmsc_classes' );
}


/* **************************************************************************************
	PORTFOLIO
************************************************************************************** */

if (!function_exists('swmsc_portfolio')) {
	function swmsc_portfolio( $atts, $content = null ) {

		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'display_items' => '3',
			'exclude' => '',
			'excerpt' => 'false',
			'title_section' => 'true',
			'column' => 3,
			'lightbox' => 'true',
			'title_text_size' => '20',
			'title_text_line_height' => '30',
			'excerpt_text_size' => '16',
			'excerpt_text_line_height' => '24',
			'title_text_link' => 'false',
			'item_space' => '12'
		), $atts ) );

		global $paged;

		$swmsc_event_items_per_page	= -1;
		$exclude_cat = array_map('intval', explode(',', $exclude));
		$item_space = intval($item_space);
		$swmsc_pf_items_space_row = $item_space * -1;
		$swmsc_pf_items_space_bottom = $item_space * 2;

	/* Get portfolio page options */
	$swmsc_pf_items_per_page	= -1;

	// Portfolio Posts Query
	$args = array(
		'post_type' => 'portfolio',
		'orderby'=>'date',
		'order'     => 'DESC',
		'posts_per_page' => $display_items,
		'paged' => $paged,
		'type' => get_query_var('type'),
		'tax_query' => array(
			array(
				'taxonomy' => 'portfolio-categories',
				'field' => 'id',
				'terms' => $exclude_cat,
				'operator' => 'NOT IN',
				)
		) // end of tax_query
	);

	$wp_query = new WP_Query( $args );

	$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
	$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
	$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

	$output = 	'<div '.$id.' '.$class.' '.$style.'>
					<div class="swmsc_row swmsc_universal_grid_sort isotope swmsc_portfolio swmsc_universal_filter_items_section" id="swmsc-item-entries" style="margin: 0 '.$swmsc_pf_items_space_row.'px;">';

						while ($wp_query->have_posts()) : $wp_query->the_post();
							$page_id = get_the_id();

	$output .= 					'<article class="swmsc-infinite-item-selector swmsc_universal_grid swmsc_column'.$column.' swmsc_portfolio_box swmsc_portfolio_isotope ';
									if ( rwmb_meta('swmsc_portfolio_title_bg') == '' ) { $output .= ' swmsc_pf_no_bg '; }
									if ( $title_section != 'true' ) { $output .=  ' swmsc_pf_titles '; }
	$output .= 						' " style="margin-bottom:'.$swmsc_pf_items_space_bottom.'px;">';

	$output .= 						'<div class="swmsc_column_gap" style="padding: 0 '.$item_space.'px;">
										<div class="swmsc_portfolio_content">';

											$postid							= get_the_ID();
											$thumb 							= null;
											$swmsc_portfolio_title_bg			= rwmb_meta('swmsc_portfolio_title_bg');
											$swmsc_portfolio_title_text_color	= rwmb_meta('swmsc_portfolio_title_text_color');
											$swmsc_pf_project_type			= rwmb_meta('swmsc_portfolio_project_type');
											$video 							= rwmb_meta('swmsc_portfolio_video');
											$permalink 						= get_permalink( $postid  );
											$title 							= get_the_title( $postid  );
											$swmsc_attached_image 			= wp_get_attachment_url(get_post_thumbnail_id($postid));

											$swmsc_portfolio_external_link 			= rwmb_meta('swmsc_portfolio_external_link');
											$swmsc_portfolio_external_link_window 	= rwmb_meta('swmsc_portfolio_external_link_window');

											$output .= '';

											if ($swmsc_pf_project_type == "video" && $video != '') {
												$large_view = $video;
											} else {
												$large_view = $swmsc_attached_image;
											}

											if ( $lightbox == 'true') {
												$show_lightbox = 'swmsc_popup_gallery"';
												$img_link = $large_view;

												if ($swmsc_pf_project_type == "video" && $video != '') {
													$hover_icon = 'video-camera';
													$show_lightbox = 'popup-youtube';
												}else {
													$hover_icon = 'search';
												}

											} else {
												$show_lightbox = '';
												$img_link = get_permalink($postid);
												$hover_icon = 'link';
											}

											if ( $swmsc_portfolio_external_link != '' ) {
												$permalink = $swmsc_portfolio_external_link;
												$img_link =  $swmsc_portfolio_external_link;
												$show_lightbox = '';
												$target = $swmsc_portfolio_external_link_window;
												$hover_icon = 'link';
											} else {
												$permalink = get_permalink( $postid );
												$target = '_self';
											}

											$swmsc_get_portfolio_thumb_image = 'swmsc-square-image';
    										$swmsc_portfolio_thumb_image = apply_filters( 'swmsc_portfolio_thumb_image_size', $swmsc_get_portfolio_thumb_image );

	$output .= 								'<div class="swmsc_portfolio_thumb_img" ><a href="'.$img_link.'" target="'.$target.'" title="" class="'.$show_lightbox.'" >
												<div class="swmsc_portfolio_img_hovericon " style="background:'.$swmsc_portfolio_title_bg.';color:'.$swmsc_portfolio_title_text_color.';"><i class="fa fa-'.$hover_icon.'"></i></div>	'.get_the_post_thumbnail($postid, $swmsc_portfolio_thumb_image).'</a></div>';

											if ( $title_section == 'true' ) {
												$output .= '<div class="swmsc_portfolio_text" style="background:'.$swmsc_portfolio_title_bg.';color:'.$swmsc_portfolio_title_text_color.';">
																<div class="swmsc_portfolio_title_section ">
																	<div class="project_title swmsc_portfolio_text_style">';

																		if ( $title_text_link == 'true' ) {
																			$output .= '<span class="swmsc_portfolio_title"><a href="'.$permalink.'" rel="bookmark" title="'.$title.'" style="color:'.$swmsc_portfolio_title_text_color.';font-size:'.intval($title_text_size).'px; line-height:'.intval($title_text_line_height).'px;">'.$title .'</a></span>';
																		} else {
																			$output .= '<span class="swmsc_portfolio_title" style="color:'.$swmsc_portfolio_title_text_color.'; font-size:'.intval($title_text_size).'px; line-height:'.intval($title_text_line_height).'px;">'.$title.'</span>';
																		}

																		if ($excerpt == 'true' ) {
																			$output .= '<span class="swmsc_portfolio_subtexts" style="color:'.$swmsc_portfolio_title_text_color.';font-size:'.intval($excerpt_text_size).'px; line-height:'.intval($excerpt_text_line_height).'px;">'.get_the_excerpt().'</span>';
																		}

												$output .= 			'</div>
																</div>
																<div class="clear"></div>
															</div>';
											}

	$output .= 								'<div class="clear"></div>
										</div>
									</div>
								</article>';

		endwhile;
		wp_reset_postdata();

	$output .= 			'<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>';

	return $output;

	}
	add_shortcode( 'swmsc_portfolio', 'swmsc_portfolio' );
}



/* **************************************************************************************
	100% WIDTH SECTION
************************************************************************************** */

if (!function_exists('swmsc_section')) {
	function swmsc_section( $atts, $content = null ) {
		extract( shortcode_atts( array (
    		'id' => '',
    		'class' => '',
    		'style' => '',
			'background_color' => '',
			'background_image' => '',
			'background_repeat' => 'repeat',
			'background_position' => 'center-top',
			'background_attachment' => 'fixed',
			'background_stretch' => 'false',
			'padding_top' => '0',
			'padding_bottom' => '0',
			'margin_top' => '0',
			'margin_bottom' => '0',
			'font_color' => '#ffffff',
			'border_width' => '0',
			'border_top_color' => '',
			'border_bottom_color' => '',
			'arrow_direction' => 'none',
			'arrow_color' => '#606060',
		), $atts ) );

		$background_size = 'background-size: auto; ';
		$bg_image = '';
		$bg_position = '';
		$bg_repeat = '';
		$bg_attachment = '';
		$border_style = '';

		if ( $background_image != '' ) {

			if (is_numeric($background_image)) {
            	$background_image = wp_get_attachment_url($background_image);
	        } else {
	            $background_image = $background_image;
	        }

			$bg_image 		= 'background-image:url(' . $background_image . '); ';
			$bg_position 	= 'background-position:' . str_replace( '-', ' ', $background_position) . '; ';
			$bg_repeat 		= 'background-repeat: ' . $background_repeat . '; ';
			$bg_attachment 	= 'background-attachment: ' . $background_attachment . '; ';

			if ( $background_stretch == 'true' ) {
			    $background_size = 'background-size: cover;';
			    $bg_attachment = '';
			    $bg_repeat = '';
			}
		}

		if ( $border_width != '0') {
			$border_style .= ( $border_top_color !=  '' ) ? 'border-top:'.intval($border_width).'px solid '.$border_top_color.'; ' : '';
			$border_style .= ( $border_bottom_color !=  '' ) ? 'border-bottom:'.intval($border_width).'px solid '.$border_bottom_color.'; ' : '';
		}

		$get_header_bg_color = 'background-color:' . $background_color . ';' ;

		$background_style = $get_header_bg_color . $bg_image . $bg_position . $bg_repeat . $bg_attachment . $background_size;

		$font_color = ( $font_color != '' ) ? 'color:'.$font_color.';' : '';

		$section_style = 'padding-top:'.intval($padding_top).'px; padding-bottom:'.intval($padding_bottom).'px; margin-top:'.intval($margin_top).'px; margin-bottom:'.intval($margin_bottom).'px; '.$font_color.' ';

		$output = '';

		if ( $arrow_direction == 'top' ) {
			$output .= '

			<div class="swmsc_section_arrow_divider" style="border:1px solid ' . $arrow_color . ';">
				<div class="swmsc_arrow_divider top" style="background-color:' . $arrow_color . ';border-bottom:1px solid ' . $arrow_color . ';border-left:1px; solid ' . $arrow_color . '"></div>
			</div>

			';
		}


		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_full_width_section ' . esc_attr( $class ) . '"' : 'class="swmsc_full_width_section"';
		$style  = ( $style != '' ) ? 'style="'.$border_style.' '.$background_style.' '.$section_style.' ' . $style . '"' : 'style="'.$border_style.' '.$background_style.' '.$section_style.'"';

		$output .=  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_container">
							'.do_shortcode($content).'
							<div class="clear"></div>
						</div>
					</div>';

		if ( $arrow_direction == 'bottom' ) {
			$output .= '

			<div class="swmsc_section_arrow_divider" style="border:1px solid ' . $arrow_color . ';">
				<div class="swmsc_arrow_divider bottom" style="background-color:' . $arrow_color . ';border-bottom:1px solid ' . $arrow_color . ';border-left:1px; solid ' . $arrow_color . '"></div>
			</div>

			';
		}

		return $output;
	}

	add_shortcode( 'swmsc_section', 'swmsc_section' );
}

/* **************************************************************************************
	SIMPLE SECTION
************************************************************************************** */

if (!function_exists('swmsc_simple_section')) {
	function swmsc_simple_section( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_container">
							'.do_shortcode($content).'
							<div class="clear"></div>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_simple_section', 'swmsc_simple_section' );
}

/* **************************************************************************************
   LOGO SLIDER
************************************************************************************** */

if (!function_exists('swmsc_logo_slider')) {
	function swmsc_logo_slider( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'exclude' => '',
			'thumbnail_background' => '#ffffff',
			'margin' => 0,
			'arrow_navigation' => 'false',
			'auto_play' => 'true',
			'slide_interval' => '7000',
			'display_logos' => '20',
			'lightbox' => 'false',
			'target' => '_blank',
			'desktop_items' => '5',
			'tablet_vertical_items' => '4',
			'mobile_horizontal_items' => '2',
			'mobile_vertical_items' => '1'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
		$exclude_cat = array_map('intval', explode(',', $exclude));
		$logo_item = '';
		global $paged;

		$args = array(
			'post_type' => 'logos',
			'orderby'=>'menu_order',
			'order' => 'ASC',
			'posts_per_page' => $display_logos,
			'paged' => $paged,
			'type' => get_query_var('type'),
			'tax_query' => array(
				array(
					'taxonomy' => 'logos-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
				)
			)
		);

		$query = new WP_Query( $args );

		while ($query->have_posts()) : $query->the_post();

			$swmsc_client_logo_url = get_post_meta(get_the_id(), 'swmsc_client_logo_url', true );
			$lightbox_on = '';
			$hover_icon = '';
			$postid = get_the_ID();

			if ( $lightbox == 'true' )	{
				$lightbox_on = 'class="swmsc_popup_img"';
				$link = wp_get_attachment_url(get_post_thumbnail_id($postid));
			 } else {
			 	$lightbox_on = '';
			 	$link = $swmsc_client_logo_url;
			 }

			$logo_item .= '<div class="swmsc_logo_slide" style="background-color:'.$thumbnail_background.';">
								<a href="'.$link.'" '.$lightbox_on.' title="'.get_the_title().'" target="'.$target.'">'.get_the_post_thumbnail(get_the_id(), 'swmsc-related-posts').'</a>
							</div>';
		endwhile;
		wp_reset_query();

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_logo_slider swmsc-carousel" data-nav="'.$arrow_navigation.'" data-margin="'.$margin.'" data-desktop="'.$desktop_items.'" data-tablet="'.$tablet_vertical_items.'" data-mobileHorizontal="'.$mobile_horizontal_items.'" data-mobileVertical="'.$mobile_vertical_items.'"  data-autoplay="'.$auto_play.'" data-autoPlayTimeOut="'.$slide_interval.'">
							'.$logo_item.'
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_logo_slider', 'swmsc_logo_slider' );
}

/* **************************************************************************************
   LOGO - GRIDS
************************************************************************************** */

if (!function_exists('swmsc_logo_grid')) {
	function swmsc_logo_grid( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'exclude' => '',
			'thumbnail_background' => '#ffffff',
    		'thumbnail_border_color' => '#ffffff',
    		'thumbnail_border_width' => '1px',
    		'thumbnail_border_radius' => '0',
			'margin' => '-1',
			'display_logos' => '20',
			'lightbox' => 'false',
			'target' => '_blank',
			'columns' => '5'
		), $atts ) );
		$divmargin  = ( $margin == 0 ) ? $margin : $margin*-1;

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
		$exclude_cat = array_map('intval', explode(',', $exclude));
		$logo_item = '';
		global $paged;

		$args = array(
			'post_type' => 'logos',
			'orderby'=>'menu_order',
			'order' => 'ASC',
			'posts_per_page' => $display_logos,
			'paged' => $paged,
			'type' => get_query_var('type'),
			'tax_query' => array(
				array(
					'taxonomy' => 'logos-categories',
					'field' => 'id',
					'terms' => $exclude_cat,
					'operator' => 'NOT IN',
				)
			)
		);

		$query = new WP_Query( $args );

		while ($query->have_posts()) : $query->the_post();

			$swmsc_client_logo_url = get_post_meta(get_the_id(), 'swmsc_client_logo_url', true );
			$lightbox_on = '';
			$hover_icon = '';
			$postid = get_the_ID();

			if ( $lightbox == 'true' )	{
				$lightbox_on = 'class="swmsc_popup_img"';
				$link = wp_get_attachment_url(get_post_thumbnail_id($postid));
			 } else {
			 	$lightbox_on = '';
			 	$link = $swmsc_client_logo_url;
			 }

			$logo_item .= '<div class="swmsc_client_logo_item">
								<div style="margin-right:'.intval($margin).'px;margin-bottom:'.intval($margin).'px; background-color:'.$thumbnail_background.';border-color:'.$thumbnail_border_color.';border-width:'.intval($thumbnail_border_width).'px; border-radius:'.intval($thumbnail_border_radius).'px;  ">
									<a href="'.$link.'" '.$lightbox_on.' title="'.get_the_title().'" target="'.$target.'">'.get_the_post_thumbnail(get_the_id(), 'swmsc-related-posts').'</a>
								</div>
							</div>';
		endwhile;
		wp_reset_query();

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_client_logos" style="margin-right:'.intval($divmargin).'px;" data-column="'.intval($columns).'" >
							'.$logo_item.'
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_logo_grid', 'swmsc_logo_grid' );
}



/* **************************************************************************************
   HALF WIDTH CONTENT AND BACKGROUND IMAGE
************************************************************************************** */

if (!function_exists('swmsc_half_bg_content')) {
	function swmsc_half_bg_content( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'bg_image' => '',
			'text_align' => 'right',
			'padding_top' => '80px',
			'padding_bottom' => '80px',
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		if (is_numeric($bg_image)) {
            $bg_image = wp_get_attachment_url($bg_image);
        } else {
            $bg_image = $bg_image;
        }

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_half_bg_container swmsc_half_bg_'.$text_align.'">
							<div class="swmsc_half_bg" style="background-image:url('.$bg_image.');"></div>
							<div class="swmsc_container">
								<div class="swmsc_half_bg_text" style="padding-top:'.$padding_top.';padding-bottom:'.$padding_bottom.';">
									<div>
										'.do_shortcode($content).'
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_half_bg_content', 'swmsc_half_bg_content' );
}

/* **************************************************************************************
	LINE BREAK / HORIZONTAL LINE / CLEARFIX
************************************************************************************** */

if (!function_exists('swmsc_horizontal_line')) {
	function swmsc_horizontal_line( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'icon_name' => '',
			'icon_color' => '#8373ce',
			'border_color' => '#fbb44d',
			'margin_top' => '80px',
			'margin_bottom' => '80px'
		), $atts ) );

		$icon_name = preg_replace('/fa-/', '', $icon_name);
		$get_icon_name = '';

		if ( $icon_name != '' && $icon_name != '- Select Icon -' ) {
			$get_icon_name = '<span class="swmsc_horizontal_line_icon"><i class="fa fa-'.$icon_name.'" style="color:'.$icon_color.';"></i></span>';
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_horizontal_line ' . esc_attr( $class ) . '"' : 'class="swmsc_horizontal_line"';
		$style  = ( $style != '' ) ? 'style="padding-top:'.$margin_top.';padding-bottom:'.$margin_bottom.';' . $style . '"' : 'style="padding-top:'.$margin_top.';padding-bottom:'.$margin_bottom.';"';

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<span class="swmsc_horizontal_line_h_line" style="border-color:'.$border_color.';"></span>'.$get_icon_name.'
					<div class="clear"></div>
					</div>';

		return $output;
	}

	add_shortcode( 'hr', 'swmsc_horizontal_line' );
}

if (!function_exists('swmsc_break')) {
	function swmsc_break( $atts, $content = null ) {
		return '<br />';
	} add_shortcode('break', 'swmsc_break');
}

if (!function_exists('swmsc_clear')) {
	function swmsc_clear( $atts, $content = null ) {
		return '<div class="clear"></div>';
	} add_shortcode('clear', 'swmsc_clear');
}

if (!function_exists('swmsc_line')) {
	function swmsc_line( $atts, $content = null ) {
		return '<div class="clear"></div><div class="swmsc_line"><span></span></div>';
	} add_shortcode('line', 'swmsc_line');
}

/* **************************************************************************************
  SIMPLE TEXT BLOCK
************************************************************************************** */

if (!function_exists('swmsc_text_block')) {
	function swmsc_text_block( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => ''
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_text_block ' . esc_attr( $class ) . '"' : 'class="swmsc_text_block"';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';

		$output = '<div '.$id.' '.$class.' '.$style.'> '.do_shortcode($content).'</div>';

		return $output;
	}

	add_shortcode( 'swmsc_text_block', 'swmsc_text_block' );
}


/* **************************************************************************************
  DIVIDERS
************************************************************************************** */

if (!function_exists('swmsc_divider')) {
	function swmsc_divider( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'divider_type' => 'line2',
			'max_width' => '50px',
			'color' => '#ccc',
			'text_align' => 'center',
			'margin_top' => '10px',
			'margin_bottom' => '10px'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';


		$span_bg 		= '<span style="background-color:'.$color.';"></span>';
		$span_border 	= '<span style="border-color:'.$color.';"></span>';

		switch ( $divider_type ) {
			case 'line1':
			case 'line2':
			case 'line3':
				$divider_span = '<span style="max-width:'.$max_width.';background-color:'.$color.';"></span>';
				break;
			case 'double_line':
				$divider_span = '<span style="max-width:'.$max_width.';border-color:'.$color.';"></span>';
				break;
			case 'square_o':
			case 'circle_o':
				$divider_span = $span_border.$span_border.$span_border.$span_border;
				break;
			default:
				$divider_span = $span_bg.$span_bg.$span_bg.$span_bg;
				break;
		}

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="swmsc_custom_dividers swmsc_dividers_'.$divider_type.' text_align_'.$text_align.' ' . esc_attr( $class ) . '"' : 'class="swmsc_custom_dividers swmsc_dividers_'.$divider_type.' text_align_'.$text_align.'"';
		$style  = ( $style != '' ) ? 'style="margin-top:'.intval($margin_top).'px;margin-bottom:'.intval($margin_bottom).'px; ' . $style . '"' : 'style="margin-top:'.intval($margin_top).'px;margin-bottom:'.intval($margin_bottom).'px;"';

		$output = '<div '.$id.' '.$class.' '.$style.'>'.$divider_span.'</div>';

		return $output;
	}

	add_shortcode( 'swmsc_divider', 'swmsc_divider' );
}

/* **************************************************************************************
   IMAGE GALLERY
************************************************************************************** */

if (!function_exists('swmsc_image_gallery')) {
	function swmsc_image_gallery( $atts, $content = null ) {
		extract( shortcode_atts( array (
			'id' => '',
    		'class' => '',
    		'style' => '',
			'image_ids' => '',
			'border_radius' => '20px',
			'image_margin' => '25px',
			'image_text' => 'title_caption',
			'title_text_size' => '20px',
			'title_text_color' => '#555555',
			'caption_text_size' => '16px',
			'caption_text_color' => '#777777',
			'columns' => '4',
			'image_size' => 'full',
			'grid_type' => 'fitRows',
			'hover_icon_color' => '#ffffff',
			'hover_icon_bg_color' => '#f8b54e',
			'lightbox' => 'true'
		), $atts ) );

		$id     = ( $id    != '' ) ? 'id="' . esc_attr( $id ) . '"' : '';
		$class  = ( $class != '' ) ? 'class="' . esc_attr( $class ) . '"' : '';
		$style  = ( $style != '' ) ? 'style="' . $style . '"' : '';
		$image_content = '';
		$image_caption_text = '';
		$image_title_caption_text = '';

        if ( $image_ids != '' ) {

        	$gallery_images = array();
			$gallery_images = explode(",",$image_ids);

        	foreach ( $gallery_images as $gallery_image  ) {

        		$get_gallery_image_thumb = wp_get_attachment_image_src($gallery_image, $image_size, true);
				$gallery_image_thumb = $get_gallery_image_thumb[0];

        		$imgage_info =  get_post($gallery_image );
        		$image_title_text = $imgage_info->post_title;
        		$image_caption_text = $imgage_info->post_excerpt;
        		$image_alt = get_post_meta($gallery_image, '_wp_attachment_image_alt', true);

        		if ( $image_text == 'title_caption' && $image_title_text != '' ) {

        			if ( $image_caption_text != '' ) {
        				$image_caption_text = '<span style="color:'.$caption_text_color.';font-size:'.intval($caption_text_size).'px;">'.$image_caption_text.'</span>';
        			}

        			$image_title_caption_text = '<p style="color:'.$title_text_color.';font-size:'.intval($title_text_size).'px; border-radius:'.$border_radius.';">'.$image_title_text.'
											'.$image_caption_text.'
			        					</p>';
			    }

        		if ( $image_text == 'only_title' && $image_title_text != '' ) {
        			$image_title_caption_text = '<p style="color:'.$title_text_color.';font-size:'.intval($title_text_size).'px; border-radius:'.$border_radius.';">'.$image_title_text.'</p>';
			    }

			    if ( $lightbox == 'true' ) {
			    	$final_image = '<a href="'.wp_get_attachment_url($gallery_image).'" class="swmsc_popup_gallery" style="border-radius:'.$border_radius.';" title="'.$image_title_text.'">
		        						<img style="border-radius:'.$border_radius.';" src="'.$gallery_image_thumb.'" alt="'.$image_alt.'" />
		        						<span><i class="fa fa-search" style="background-color:'.$hover_icon_bg_color.';color:'.$hover_icon_color.';"></i></span>
		        					</a>';
			    } else {
			    	$final_image = '<img style="border-radius:'.$border_radius.';" src="'.$gallery_image_thumb.'" title="'.$image_title_text.'" alt="'.$image_alt.'" />';
			    }

        		$image_content .= '
        				<div class="swmsc_image_gallery_item">
        					<div style="padding-right:'.intval($image_margin).'px; padding-bottom:'.intval($image_margin).'px;">
	        					'.$final_image.'
	        					'.$image_title_caption_text.'
	        				</div>
        				</div>';
        	}
        }

		$output =  '<div '.$id.' '.$class.' '.$style.'>
						<div class="swmsc_image_gallery swmsc_gal'.intval($columns).'  " data-grid="'.$grid_type.'" style="margin-right:-'.intval($image_margin).'px;">
							'.$image_content.'
						</div>
					</div>';

		return $output;
	}

	add_shortcode( 'swmsc_image_gallery', 'swmsc_image_gallery' );
}

?>