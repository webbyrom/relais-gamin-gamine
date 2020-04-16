<?php

/* **************************************************************************************
	Language Translation
************************************************************************************** */

load_theme_textdomain( 'kids-world',get_template_directory().'/languages/' );

/* **************************************************************************************
	Logo Display
************************************************************************************** */

if ( ! function_exists('kidsworld_logo')) {
	function kidsworld_logo() {
		if ( kidsworld_get_option('kidsworld_header_logo_on','on') == 'on' ) :

			$kidsworld_default_standard_logo 	= (kidsworld_get_option('kidsworld_logo_standard') <> '') ? esc_url(kidsworld_get_option('kidsworld_logo_standard')) : get_template_directory_uri().'/framework/images/logo.png';
			$kidsworld_default_retina_logo 	= (kidsworld_get_option('kidsworld_logo_retina') <> '') ? esc_url(kidsworld_get_option('kidsworld_logo_retina')) : get_template_directory_uri().'/framework/images/logo-retina.png';

			if (isset($_COOKIE["pixel_ratio"])) {
			    $kidsworld_pixel_ratio = $_COOKIE["pixel_ratio"];
			    $kidsworld_logo = $kidsworld_pixel_ratio > 1 ? $kidsworld_default_retina_logo : $kidsworld_default_standard_logo;

			} else {
			    $kidsworld_logo = $kidsworld_default_standard_logo;
			}
			?>

			<div class="kidsworld_logo">
				<div class="kidsworld_logo_img">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
						<img class="kidsworld-std-logo" src="<?php echo esc_url($kidsworld_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
					</a>
				</div>

				<?php if (kidsworld_get_option('kidsworld_header_style','h_stack_c') == 'h_magazine' ) { ?>

					<div class="kidsworld_magazine_banner_img">
						<?php echo wp_kses(kidsworld_get_option('kidsworld_header_banner_image','<a href="#" title="" target="_blank"><img src="http://placehold.it/468x60" alt="" /></a>'),kidsworld_kses_allowed_textarea()); ?>
					</div>

				<?php } ?>

				<div class="clear"></div>
			</div>
		<?php
		endif;
	}
}


/* **************************************************************************************
	Social Media
************************************************************************************** */

if ( ! function_exists('kidsworld_display_social_media')) {
	function kidsworld_display_social_media() {

		$kidsworld_sm_icons = array( "icon1","icon2","icon3","icon4","icon5","icon6","icon7","icon8","icon9","icon10");
		$kidsworld_sm_ic_names = array("facebook","twitter","pinterest","vine","dribbble","rss","linkedin","flickr","google-plus","instagram");
		$kidsworld_sm_ic_pos = 0;

		foreach ( $kidsworld_sm_icons as $kidsworld_sm_icon ) {

			$sm_icon = 'kidsworld_' . strtolower($kidsworld_sm_icon);
			$sm_icon_url = 'kidsworld_' . strtolower($kidsworld_sm_icon) . '_url';

			$kidsworld_get_sm_icon = kidsworld_get_option( $sm_icon,$kidsworld_sm_ic_names[$kidsworld_sm_ic_pos] );
		    if($kidsworld_get_sm_icon != '') { ?>
				<li class="kidsworld_sm_ic"><a href="<?php echo esc_url(kidsworld_get_option($sm_icon_url)) ; ?>" <?php echo kidsworld_open_sm_new_window(); ?> title=""  ><i class="fa fa-<?php echo sanitize_text_field($kidsworld_get_sm_icon); ?>"></i></a></li>
				<?php
			}

			$kidsworld_sm_ic_pos++;

		}  // end foreach

	} // end function
} // end if

if ( ! function_exists('kidsworld_open_sm_new_window')) {
	 function kidsworld_open_sm_new_window() {
		 if (kidsworld_get_option('kidsworld_open_sm_new_window','on') == 'on') { ?> target="_blank" <?php 	}
	 }
}

/* **************************************************************************************
	Post Page Layout
************************************************************************************** */

if ( ! function_exists( 'kidsworld_page_post_layout_type' ) ) {
	function kidsworld_page_post_layout_type() {

		// Vars
		$kidsworld_page_post_layout_type_class = 'layout-sidebar-right';
		$kidsworld_get_post_types = get_post_types( '', 'names' );
		$kidsworld_blog_page_layout_type = kidsworld_get_option( 'kidsworld_blog_page_layout', 'layout-sidebar-right' );
		$kidsworld_get_post_meta_layout = '';

		$kidsworld_get_queried_object_id = get_queried_object_id();

		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
			if ( is_shop() ) {
				$kidsworld_get_queried_object_id = wc_get_page_id( 'shop' );
			}
		}

		// Loop through post types
		foreach ( $kidsworld_get_post_types as $post_type ) {
			if ( is_singular($post_type) ) {

				if ( $post_type == 'post' ) {
					$post_type = 'blog';
				}

				$kidsworld_ppl_admin_id = $post_type .'_single_layout';
				$kidsworld_admin_option = kidsworld_get_option( $kidsworld_ppl_admin_id, 'layout-full-width' );

				if (function_exists('rwmb_meta')) {
					$kidsworld_get_post_meta_layout = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_page_layout', true );
				}

				if ( $kidsworld_get_post_meta_layout !== '' ) {
					$kidsworld_page_post_layout_type_class = $kidsworld_get_post_meta_layout;
				} else {
					$kidsworld_page_post_layout_type_class = $kidsworld_admin_option;
				}
			}
		}

		if ( is_archive() || is_author() || is_tag() ) {

			if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE && function_exists('rwmb_meta') ) {
				if ( is_shop() ) {
					$kidsworld_page_post_layout_type_class = 'layout-full-width';
					$kidsworld_page_post_layout_type_class = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_page_layout', true );
				}
			} else {
				$kidsworld_page_post_layout_type_class = $kidsworld_blog_page_layout_type;
			}

		}

		return $kidsworld_page_post_layout_type_class;

	} // End function
} // End if


/* **************************************************************************************
	Post Format Icon
************************************************************************************** */

if (!function_exists('kidsworld_get_post_format_icon')) {
	function kidsworld_get_post_format_icon() {

		$kidsworld_get_post_format = get_post_format();
		$kidsworld_pf_icon = '';

		switch ( $kidsworld_get_post_format ) {
			case 'link': $kidsworld_pf_icon = 'link';
				break;
			case 'chat': $kidsworld_pf_icon = 'comments';
				break;
			case 'image': $kidsworld_pf_icon = 'image';
				break;
			case 'gallery': $kidsworld_pf_icon = 'film';
				break;
			case 'video': $kidsworld_pf_icon = 'video-camera';
				break;
			case 'audio': $kidsworld_pf_icon = 'music';
				break;
			case 'status': $kidsworld_pf_icon = 'info-circle';
				break;
			case 'quote': $kidsworld_pf_icon = 'quote-left';
				break;
			default: $kidsworld_pf_icon = 'camera';
				break;
		} //end switch

		if ( is_sticky() && !is_single() ) {
			$kidsworld_pf_icon = 'thumb-tack';
		}

		return $kidsworld_pf_icon;

 	}
}

/* **************************************************************************************
	Comments Listing
************************************************************************************** */

if ( !function_exists( 'kidsworld_comment_listing' ) ) {

	function kidsworld_comment_listing( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;

		if (isset($_COOKIE["pixel_ratio"])) {
   	 		$kidsworld_pixel_ratio = $_COOKIE["pixel_ratio"];
    		$kidsworld_avatar_size = $kidsworld_pixel_ratio > 1 ? '120' : '60';
		} else {
		    $kidsworld_avatar_size = '60';
		}

		$kidsworld_comment_reply_icon = is_rtl() ? 'mail-forward' : 'reply';

		switch ( $comment->comment_type ) :
			case '' : ?>

				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>" class="comment_body clearfix">

						<div class="comment_content">
							<div class="comment_area">
								<div class="comment-content">

									<div class="comment_avatar">
										<span><?php echo get_avatar( $comment, $kidsworld_avatar_size ); ?></span>
									</div>

									<div class="comment_postinfo">

										<div class="kidsworld_comment_reply">
											<div class="kidsworld_comment_reply_btn">
												<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="fa fa-'.$kidsworld_comment_reply_icon.'"></i>'.esc_html__('Reply', 'kids-world') ) ) );?>
											</div>
										</div>

										<span class="comment_author"><?php printf( esc_html__( '%s', 'kids-world' ), sprintf( '%s ', get_comment_author_link()." " ) );  ?></span>
										<span class="comment_date"><i class="fa fa-clock-o"></i><?php
												/* translators: 1: date, 2: time */
												printf( esc_html__( '%1$s', 'kids-world' ), get_comment_date('F j, Y'),  get_comment_time() ); ?>

											 <?php edit_comment_link( esc_html__( ' (Edit)', 'kids-world' ), ' ' );
											?>
										</span>

										<div class="comment_text">
											<?php comment_text();
											if ( $comment->comment_approved == '0' ) : ?>
												<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'kids-world' ); ?></em></p>
											<?php
											endif; ?>
										</div>

										<div class="clear"></div>

									</div> <!-- end .comment_postinfo -->

									<div class="clear"></div>

								</div> <!-- end comment-content-->


								<div class="clear"></div>

							</div> <!-- end comment_area-->
						</div>
						<div class="clear"></div>

					</article> <!-- end comment-body -->
					<div class="clear"></div>

				<?php
				break;
			case 'pingback'  :
			case 'trackback' : ?>

				<li class="post pingback">
				<p><?php esc_html_e( 'Pingback:', 'kids-world' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__('(Edit)', 'kids-world'), ' ' ); ?></p>
				<?php
				break;
		endswitch;
	}
}


/* **************************************************************************************
	Add Plugin Fix CSS
************************************************************************************** */

if (!function_exists('kidsworld_plugin_fix')) {
	function kidsworld_plugin_fix() {

		$kidsworld_template_uri = get_template_directory_uri();

		if (!is_admin()) {
			wp_register_style('kidsworld-plugin-fix', $kidsworld_template_uri . '/css/plugin-fix.css');
			wp_enqueue_style('kidsworld-plugin-fix');
		}

	}
	add_action('wp_enqueue_scripts', 'kidsworld_plugin_fix',999);
}

/* **************************************************************************************
	Post Title
************************************************************************************** */

if (!function_exists('kidsworld_post_title')) {
	function kidsworld_post_title() {

		$kidsworld_post_format = get_post_format();

		if ( get_the_title() ) {

			$kidsworld_pf_link = '';

			if (function_exists('rwmb_meta')) {
				$kidsworld_pf_link = rwmb_meta('kidsworld_meta_link_url');
			}

			echo '<div class="kidsworld_post_title">';

			$kidsworld_get_page_title_sec = wp_kses( get_the_title(),kidsworld_kses_allowed_text() );

			if ( $kidsworld_post_format == 'link' ) {
				if ( is_single() ) {
					echo '<h1><a href="' . esc_url( $kidsworld_pf_link ) . '" target="_blank" >' . $kidsworld_get_page_title_sec . '</a></h1>';
				} else {
					echo '<h2><a href="' . esc_url( $kidsworld_pf_link ) . '" target="_blank" >' . $kidsworld_get_page_title_sec . '</a></h2>';
				}
			} else {
				if ( is_single() ) {
					echo '<h1>' . $kidsworld_get_page_title_sec . '</h1>';
				} else {
					echo '<h2><a href="' . esc_url( get_permalink() ) . '" >' . $kidsworld_get_page_title_sec . '</a></h2>';
				}
			}

			echo '</div>';

		}

	}
}

/* **************************************************************************************
	Post Summary / Content
************************************************************************************** */

if (!function_exists('kidsworld_post_summary_content')) {
	function kidsworld_post_summary_content() {

		$kidsworld_post_format = get_post_format();
		$kidsworld_excerpt_length = kidsworld_get_option('kidsworld_excerpt_length','50');

		echo '<div class="kidsworld_post_summary">';
			echo '<div class="kidsworld_post_text">';

				if ( kidsworld_get_option('kidsworld_excerpt_on','on') == 'on' && !is_single() ) {
					if ( $kidsworld_excerpt_length != 0 ) {
						echo get_the_excerpt();
					}
				} else {
					echo the_content();
				}

				echo '<div class="clear"></div>';

				if ( is_single() ) {
					$args = array(
						'before'           => '<div class="clear"></div><div class="kidsworld_pagination_menu">',
						'after'            => '</div>',
						'link_before'      => '<span class="wp_link_pages_custom">',
						'link_after'       => '</span>',
						'next_or_number'   => 'number',
						'nextpagelink'     => esc_html__('Next Page ', 'kids-world'),
						'previouspagelink' => esc_html__('Previous Page ', 'kids-world'),
						'pagelink'         => '%',
						'echo'             => 0
					);

			 		echo wp_link_pages( $args );
				}

				echo '<div class="clear"></div>';
			echo '</div>';
		echo '</div>';
		echo '<div class="clear"></div>';
	}
}

/* **************************************************************************************
	Footer Widgets and Columns
************************************************************************************** */

if ( ! function_exists('kidsworld_display_footer_column')) {
	function kidsworld_display_footer_column() {

		$kidsworld_footer_columns = kidsworld_get_option( 'kidsworld_footer_column',4 );

		$kidsworld_first_column = 'first';
        switch($kidsworld_footer_columns) {
        	case 1: $kidsworld_fc_class = 'kidsworld_one_full'; break;
        	case 2: $kidsworld_fc_class = 'kidsworld_one_half'; break;
        	case 3: $kidsworld_fc_class = 'kidsworld_one_third'; break;
        	case 4: $kidsworld_fc_class = 'kidsworld_one_fourth'; break;
        	case 5: $kidsworld_fc_class = 'kidsworld_one_fifth'; break;
        	case 6: $kidsworld_fc_class = 'kidsworld_one_sixth'; break;
        }

        echo '<div class="kidsworld_large_footer">';

		for ($i = 1; $i <= $kidsworld_footer_columns; $i++) {
			echo "<div class='kidsworld_column $kidsworld_fc_class $kidsworld_first_column'>";

			if ( is_active_sidebar('kidsworld-footer-'.$i) ) {
				dynamic_sidebar('kidsworld-footer-'.$i);
			} else {
				kidsworld_sample_widget($i);
			}

			echo "</div>";
			$kidsworld_first_column = "";
		}

		echo '<div class="clear"></div>';

		echo '</div>';

	} // end function
}  // end if


if ( ! function_exists('kidsworld_sample_widget')) {
	function kidsworld_sample_widget($number)	{

		$kidsworld_widget_info = "Replace this sample widget with your desired widget from WordPress Admin > Appearance > Widgets Page by drag and drop in Footer Column ";
		$kidsworld_widget_title = apply_filters('widget_title', 'Footer Column' );

		echo "<div class='kidsworld_footer_widget'>";
		echo "<h3><span>" . esc_html($kidsworld_widget_title) . " " . intval($number) . "</span></h3><div class='clear'></div>";
		echo esc_html($kidsworld_widget_info);
		echo intval($number);
		echo '. Set footer columns 1 to 4 from WordPress Admin > Customizer > Footer > Footer Column Dropdown';
		echo "</div>";

	}  // end function
} // end if

/* **************************************************************************************
	View Count
************************************************************************************** */

if (!function_exists('kidsworld_get_post_views')) {
	function kidsworld_get_post_views($postID){
	    $kidsworld_view_count_key = 'post_views_count';
	    $kidsworld_view_count = get_post_meta($postID, $kidsworld_view_count_key, true);
	    if($kidsworld_view_count==''){
	        delete_post_meta($postID, $kidsworld_view_count_key);
	        add_post_meta($postID, $kidsworld_view_count_key, '0');
	        return "0";
	    }
	    return $kidsworld_view_count;
	}
}

if (!function_exists('kidsworld_set_post_views')) {
	function kidsworld_set_post_views($postID) {
	    $kidsworld_view_count_key = 'post_views_count';
	    $kidsworld_view_count = get_post_meta($postID, $kidsworld_view_count_key, true);

	    if($kidsworld_view_count==''){
	        $kidsworld_view_count = 0;
	        delete_post_meta($postID, $kidsworld_view_count_key);
	        add_post_meta($postID, $kidsworld_view_count_key, '0');
	    }else{
	        $kidsworld_view_count++;
	        update_post_meta($postID, $kidsworld_view_count_key, $kidsworld_view_count);
	    }
	    return $kidsworld_view_count;
	}
}

/* **************************************************************************************
	Post Like
************************************************************************************** */

if (!function_exists('kidsworld_scripts_config')) {
	function kidsworld_scripts_config() {
	    echo '<script>'."\n";
	        echo '//<![CDATA['."\n";

	            // ajax
	            echo 'window.kidsworld_ajax = "'. admin_url('admin-ajax.php') .'";'."\n";

	        echo '//]]>'."\n";
	    echo '</script>'."\n";
	}
}
/* **************************************************************************************
	Get Page Post ID
************************************************************************************** */

if (!function_exists('kidsworld_get_id')) {
	function kidsworld_get_id() {
		global $post;
		$kidsworld_post_id = isset( $post->ID ) ? $post->ID : null ;
		return $kidsworld_post_id;
	}
}

/* **************************************************************************************
	Social Media Meta
************************************************************************************** */

function kidsworld_og_excerpt($text, $excerpt){
	if ($excerpt) return $excerpt;
	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	$text = strip_tags($text);
	$excerpt_length = apply_filters('excerpt_length', 60);
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$words = preg_split("/[n
	]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);

	if ( count($words) > $excerpt_length ) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $excerpt_more;
	} else {
		$text = implode(' ', $words);
	}
	return apply_filters('wp_trim_excerpt', $text);
}

if (!function_exists('kidsworld_social_media_meta')) {
	function kidsworld_social_media_meta() {

		$kidsworld_meta_title = get_the_title();
		$kidsworld_meta_image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

		global $post;
		$kidsworld_meta_description = kidsworld_og_excerpt( $post->post_content, $post->post_excerpt );
 		$kidsworld_meta_description = strip_tags($kidsworld_meta_description);

		if ( is_front_page() && !is_home() ) {
			$kidsworld_meta_title = get_bloginfo('name');
			$kidsworld_meta_description = get_bloginfo('description');
		}

		$kidsworld_meta_description = str_replace('"', "'", $kidsworld_meta_description);

		$output  = '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>'. "\n";
		$output .= '<meta property="og:image" content="'.esc_url($kidsworld_meta_image_src_array[ 0 ]).'"/>'. "\n";
		$output .= '<meta property="og:url" content="'.get_permalink().'"/>'. "\n";
		$output .= '<meta property="og:title" content="'.$kidsworld_meta_title.'"/>'. "\n";
		$output .= '<meta property="og:description" content="'.$kidsworld_meta_description.'"/>'. "\n";
		$output .= '<meta property="og:type" content="article"/>'. "\n";
		echo $output;
	}
	add_action('wp_head', 'kidsworld_social_media_meta');
}