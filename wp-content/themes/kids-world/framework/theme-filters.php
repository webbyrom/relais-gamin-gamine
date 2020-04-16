<?php

/* ----------------------------------------------------------------------------------------
	Post Formats
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_display_post_format')) {
	function kidsworld_display_post_format() {

		$kidsworld_get_post_format = get_post_format() ? get_post_format() : 'standard';

		if ( ! post_password_required() ) {

			global $post;
			$output = '';
			$kidsworld_pf = array();
			$kidsworld_meta_page_layout = '';

			$kidsworld_pf['id'] = get_the_ID();
			$kidsworld_pf['title'] = get_the_title();
			$kidsworld_pf['attached_image'] = wp_get_attachment_url(get_post_thumbnail_id($kidsworld_pf['id']));

			// blog pages

			$kidsworld_pf['multiple_featured_imgs']	= intval( kidsworld_get_option('kidsworld_multiple_featured_imgs',5) );
			$kidsworld_pf['kidsworld_blog_pagination']		= kidsworld_get_option( 'kidsworld_blog_pagination','pg_standard' );
			$kidsworld_pf['kidsworld_blog_page_layout']		= kidsworld_get_option( 'kidsworld_blog_page_layout','layout-sidebar-right');
			$kidsworld_pf['kidsworld_blog_post_style']		= kidsworld_get_option('kidsworld_blog_post_style','kidsworld_post_default');

			// blog single page
			$kidsworld_pf['blog_single_style'] 			= kidsworld_get_option('kidsworld_blog_single_style','blog-style-standard');

			if (function_exists('rwmb_meta')) {
				$kidsworld_meta_page_layout = rwmb_meta('kidsworld_meta_page_layout');
			}

			if ( $kidsworld_pf['kidsworld_blog_page_layout'] == 'layout-full-width' ) {
				$kidsworld_image_size_type = 'kidsworld-blog-full';
			} else {
				$kidsworld_image_size_type = 'kidsworld-blog-featured';
			}

			if ( $kidsworld_pf['kidsworld_blog_post_style'] == 'kidsworld_post_masonry' ) {
				$kidsworld_image_size_type = 'kidsworld-square-image';
			}

			if ( is_single() ) {
				$kidsworldPostLinkStart = '';
				$kidsworldPostLinkEnd = '';

				if ( is_single() ) {
					if ( $kidsworld_meta_page_layout != '' && $kidsworld_meta_page_layout == 'layout-full-width') {
						$kidsworld_image_size_type = 'kidsworld-blog-full';
					} else {
						$kidsworld_image_size_type = 'kidsworld-blog-featured';
					}
				}

			} else {
				$kidsworldPostLinkStart = '<a href="'.get_permalink().'" title="' . esc_attr( $kidsworld_pf['title'] ) . '">';
				$kidsworldPostLinkEnd = '</a>';
			}

			switch($kidsworld_get_post_format)
			{
        		case 'standard':
        		case 'image':
	        		if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						if ( $kidsworld_pf['attached_image'] ) {
							$output .= '<div class="kidsworld_post_format">';
							$output .= '<figure class="">';
							$output .= $kidsworldPostLinkStart;
							$output .= get_the_post_thumbnail($kidsworld_pf['id'], $kidsworld_image_size_type );
							$output .= $kidsworldPostLinkEnd;
							$output .= '</figure>';
							$output .= '<div class="clear"></div>';
							$output .= '</div>';
						}
					}
        		break;

        		case 'video':
        			if (function_exists('rwmb_meta')) {
						$kidsworld_pf_meta_video = rwmb_meta('kidsworld_meta_video');
						if( !empty( $kidsworld_pf_meta_video ) ) {
							$output .= '<div class="kidsworld_post_format">';
							$output .= "<div class='fitVids'>";
							$output .= stripslashes(htmlspecialchars_decode($kidsworld_pf_meta_video));
							$output .= "</div>";
							$output .= "</div>";
						}
					}
        		break;

        		case 'quote':

        			if (function_exists('rwmb_meta')) {

						$kidsworld_wp_get_attachment_image_src =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $kidsworld_image_size_type );
						$kidsworld_meta_quote_source_url =  rwmb_meta('kidsworld_meta_quote_source_url');

						if ( rwmb_meta('kidsworld_quote_bg_color') != '' ) {
							$kidsworld_quote_bg_color = rwmb_meta('kidsworld_quote_bg_color');
						} else {
							$kidsworld_quote_bg_color = 'transparent';
						}

						$output .= '<div class="kidsworld_post_format">';
						$output .= '<div class="kidsworld_pf_quote"  style="background:'.$kidsworld_quote_bg_color.' url('.$kidsworld_wp_get_attachment_image_src[0].') center center; padding:'.rwmb_meta('kidsworld_meta_quote_text_space').';">';
						$output .= '<div class="kidsworld_pf_quote_text" style="color:'.rwmb_meta('kidsworld_quote_text_color').';">';
						$output .= '<p style="font-size:'.rwmb_meta('kidsworld_meta_quote_text_size').';line-height:'.rwmb_meta('kidsworld_meta_quote_text_line_height').';"><a href="'.esc_url( get_permalink() ).'" style="color:'.rwmb_meta('kidsworld_quote_text_color').';">'.rwmb_meta('kidsworld_meta_quote').'</a></p>';

						if ($kidsworld_meta_quote_source_url != '') {
							$output .= '<span ><a href="'.esc_url( rwmb_meta('kidsworld_meta_quote_source_url') ).' " style="color:'.rwmb_meta('kidsworld_quote_text_color').';">'.rwmb_meta('kidsworld_meta_quote_source').'</a></span>';
						} else {
							$output .= '<span style="color:'.rwmb_meta('kidsworld_quote_text_color').';" >'.rwmb_meta('kidsworld_meta_quote_source').'</span>';
						}

						$output .= '</div>';
						$output .= '</div>';
						$output .= '</div>';
					}

        		break;

        		case 'audio':
        			if (function_exists('rwmb_meta')) {

						$kidsworld_pf_meta_audio = rwmb_meta('kidsworld_meta_audio');

						if( !empty( $kidsworld_pf_meta_audio ) ) {
							$output .= '<div class="kidsworld_post_format">';
							$output .= "<div class='fitVids kidsworld_pf_type_audio'>";
							$output .= stripslashes(htmlspecialchars_decode($kidsworld_pf_meta_audio));
							$output .= '<div class="clear"></div>';
							$output .= "</div>";
							$output .= "</div>";
						}
					}
        		break;

        		case 'gallery':

        			if (function_exists('rwmb_meta')) {
	        			$kidsworld_pf_meta_gallery = rwmb_meta('kidsworld_meta_gallery');
	        		} else {
	        			$kidsworld_pf_meta_gallery = '';
	        		}

	        		if ( $kidsworld_pf_meta_gallery == 'gallery_type_column' ) {

	    				$output .= '<div class="kidsworld_post_format">';
	    				$output .= "<div class='kidsworld_tile_gallery'>";
				        $output .= "<ul>";

						$kidsworld_meta_pf_gallery_images	= rwmb_meta('kidsworld_meta_pf_gallery_images', 'type=image_advanced&size='.$kidsworld_image_size_type.'' );

						if ( $kidsworld_meta_pf_gallery_images ) {
						    foreach ( $kidsworld_meta_pf_gallery_images as $kidsworld_meta_pf_gallery_image ) {

					    		$kidsworld_final_meta_header_bg_images = "{$kidsworld_meta_pf_gallery_image['url']}";

						    	$output .= '<li>';
								$output .= $kidsworldPostLinkStart;
								$output .= "<img src='{$kidsworld_meta_pf_gallery_image['url']}' width='{$kidsworld_meta_pf_gallery_image['width']}' height='{$kidsworld_meta_pf_gallery_image['height']}' alt='{$kidsworld_meta_pf_gallery_image['alt']}' /><span></span>";
								$output .= $kidsworldPostLinkEnd;
								$output .= '</li>';
							}
						}

				        $output .= '</ul>';
				        $output .= '<div class="clear"></div>';
				        $output .= "</div>";
				         $output .= "</div>";
				        $output .= '<div class="clear"></div>';

	        		} else {

	        			if ( $kidsworld_pf['kidsworld_blog_pagination'] == 'pg_infinite' && !is_single() ) {

	        				$output .= '<div class="kidsworld_post_format">';

							$output .= '<figure class="">';
							$output .= $kidsworldPostLinkStart;
							$output .= get_the_post_thumbnail($kidsworld_pf['id'], $kidsworld_image_size_type );
							$output .= $kidsworldPostLinkEnd;
							$output .= '</figure>';
							$output .= '<div class="clear"></div>';
							$output .= '</div>';

						} else {

		    				$output .= '<div class="kidsworld_post_format">';
		    				$output .= "<div class='kidsworld_slider_box'><div class='flexslider pfi_gallery' data-pfGalleryId='".get_the_ID()."' id='kidsworld-pf-gallery-".get_the_ID()."'>";

							if (function_exists('rwmb_meta')) {

								$output .= "<ul class='slides'>";

								$kidsworld_meta_pf_gallery_images	= rwmb_meta('kidsworld_meta_pf_gallery_images', 'type=image_advanced&size='.$kidsworld_image_size_type.'' );

								if ( $kidsworld_meta_pf_gallery_images ) {
								    foreach ( $kidsworld_meta_pf_gallery_images as $kidsworld_meta_pf_gallery_image ) {

							    		$kidsworld_final_meta_header_bg_images = "{$kidsworld_meta_pf_gallery_image['url']}";

								    	$output .= '<li>';
										$output .= $kidsworldPostLinkStart;
										$output .= "<img src='{$kidsworld_meta_pf_gallery_image['url']}' width='{$kidsworld_meta_pf_gallery_image['width']}' height='{$kidsworld_meta_pf_gallery_image['height']}' alt='{$kidsworld_meta_pf_gallery_image['alt']}' /><span></span>";
										$output .= $kidsworldPostLinkEnd;
										$output .= '</li>';
									}
								}

								$output .= '</ul>';
							}

					        $output .= '<div class="clear"></div>';
					        $output .= "</div></div>";
					        $output .= "</div>";
					        $output .= '<div class="clear"></div>';

					    }

	        		}

        		break;

        	} // end switch



        	return apply_filters( 'kidsworld_display_post_format', $output );

		} // end if post password required

	}
}

/* ----------------------------------------------------------------------------------------
	Post Single Next Previous
---------------------------------------------------------------------------------------- */

// Standard Pagination (1,2,3,4)
if ( !function_exists( 'kidsworld_single_nextprev' ) ) {
	function kidsworld_single_nextprev() {

		if ( kidsworld_get_option('kidsworld_single_post_navigation',1) == 1 ) {

			$output = '';
			$kidsworld_get_previous_post = get_previous_post();
			$kidsworld_get_next_post = get_next_post();

			$kidsworld_prevOne = '<i class="fa fa-angle-left"></i><span></span>';
			$kidsworld_prevTwo = '<i class="fa fa-angle-right"></i><span></span>';

			$kidsworld_NextOne = '<span></span><i class="fa fa-angle-right"></i></i>';
			$kidsworld_NextTwo = '<span></span><i class="fa fa-angle-left"></i></i>';

			$kidsworld_arrowPrev = is_rtl() ? $kidsworld_prevTwo : $kidsworld_prevOne;
			$kidsworld_arrowNext = is_rtl() ? $kidsworld_NextTwo : $kidsworld_NextOne;

			$output .= '<div class="kidsworld_single_nextprev">';

			if ( !empty( $kidsworld_get_previous_post ) ) {
				$output .= '<p class="kidsworld_single_prev"><a href="' . esc_url( get_permalink( $kidsworld_get_previous_post->ID ) ) . '">'.$kidsworld_arrowPrev.'</a></p>';
			}

			if ( !empty( $kidsworld_get_next_post ) ) {
				$output .= '<p class="kidsworld_single_next"><a href="'. esc_url( get_permalink( $kidsworld_get_next_post->ID ) ) . '">'.$kidsworld_arrowNext.'</a></p>';
			}

			$output .= '<p class="kidsworld_single_viewall"><a href="' .esc_url( kidsworld_get_option( 'kidsworld_blog_pg_url') ) . '"><i class="fa fa-list-ul"></i><span>' . esc_html__('VIEW ALL','kids-world') . '</span></a></p>';
			$output .= '<div class="clear"></div>';
			$output .= '<span class="kidsworld_single_nextprev_brd"></span>';
			$output .= '</div>';

			echo apply_filters( 'kidsworld_single_nextprev', $output );
		}
	}
}

/* ----------------------------------------------------------------------------------------
	Search Form No Result Message
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_search_page_no_result_text')) {
	function kidsworld_search_page_no_result_text() {

		$output = '<div class="kidsworld_search_page_no_result_text">
		<h4>' . esc_html__('Sorry, no results were found for this query.', 'kids-world') . '</h4>
		<p>' . esc_html__('Try refining your search, or use the navigation above to locate the post.', 'kids-world') . '</p>
		</div>';

		echo apply_filters( 'kidsworld_search_page_no_result_text', $output );
	}
}

/* ----------------------------------------------------------------------------------------
	Page Title
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_main_titles')) {
	function kidsworld_main_titles($title='') {

		global  $wp_query;
		$kidsworld_main_title = '';
		$output = '';

		if ( is_archive() ) {

			if ( is_day() ) {
				$kidsworld_main_title = sprintf( esc_html__( 'Archive: %s', 'kids-world' ), get_the_date() );
			}
			elseif ( is_month() ) {
				$kidsworld_main_title = sprintf( esc_html__( 'Archive: %s', 'kids-world' ), get_the_date('F Y') );
			}
			elseif ( is_year() ) {
				$kidsworld_main_title = sprintf( esc_html__( 'Archive: %s', 'kids-world' ), get_the_date('Y') );
			}
			elseif ( is_author() ) {
				$kidsworld_main_title = esc_html__( 'Author Archives', 'kids-world' );
			}
			elseif ( is_tag() || is_category() ) {
				$kidsworld_termname = $wp_query->queried_object->name;
				$kidsworld_main_title =  $kidsworld_termname;
			}
			else {
				$kidsworld_main_title = single_term_title( '', false );
			}
		}
		elseif ( is_404() ) {

			if ( class_exists( 'WPML_String_Translation' ) ) {
				$kidsworld_main_title = icl_translate('Theme Mod', 'kidsworld_error_title', kidsworld_get_option('kidsworld_error_title','Page Not Found'));
			} else {
				$kidsworld_main_title = kidsworld_get_option('kidsworld_error_title','Page Not Found');
			}
		}
		elseif ( is_page_template('template-blog.php') ) {
			$kidsworld_main_title = get_the_title();
		}
		elseif ( is_page_template('template-archives.php') ) {
			$kidsworld_main_title = get_the_title();
		}
		elseif ( is_single() ) {

			$kidsworld_get_post_type = get_post_type();

			if ( $kidsworld_get_post_type == 'portfolio' || $kidsworld_get_post_type == 'classes' || $kidsworld_get_post_type == 'events' ) {
				$kidsworld_main_title = get_the_title();
			} else {
				$kidsworld_main_title = kidsworld_get_option('kidsworld_blog_single_header_title','Blog');
			}

			if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE && $kidsworld_get_post_type == 'product') {
				$kidsworld_main_title = woocommerce_page_title($echo = false);
			}

		}
		elseif ( is_page() ) {
			$kidsworld_main_title = get_the_title();
		}
		elseif ( is_search() ) {
			$kidsworld_main_title = esc_html__( 'Search', 'kids-world' );
		}
		elseif ( is_home() ) {
			$kidsworld_main_title = esc_html__( 'Blog', 'kids-world' );
		}

		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {

			if ( is_shop() ) {
				$kidsworld_main_title = woocommerce_page_title($echo = false);
			}
			elseif ( is_product_category() ) {
				$kidsworld_main_title = single_cat_title('',false);
			}
			elseif ( is_product_tag() ) {
				$kidsworld_main_title = sprintf( __( '%s', 'kids-world' ), single_tag_title('',false) );
			}

		}


		if ( $kidsworld_main_title != '' ) {

			$kidsworld_pg_title_onoff = '';
			$kidsworld_get_queried_object_id = get_queried_object_id();

			if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
				if ( is_shop() ) {
					$kidsworld_get_queried_object_id = wc_get_page_id( 'shop' );
				}
			}

			if (function_exists('rwmb_meta')) {
				$kidsworld_pg_title_onoff = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_title_on', true );

			}

			if ( $kidsworld_pg_title_onoff != '' && $kidsworld_pg_title_onoff == 'off') { return; }

			if ( kidsworld_get_option('kidsworld_sub_header_title_on','on') == 'on' ) {
				if ( is_page() || is_archive() || is_home() || is_singular( array( 'portfolio','classes','events' ) ) ) {
					$output = '<h1 class="kidsworld_sub_header_title">' . do_shortcode( wp_kses( $kidsworld_main_title,kidsworld_kses_allowed_text() ) ) . '</h1><div class="clear"></div>';
				} else {
					$output = '<div class="kidsworld_sub_header_title">' . do_shortcode( wp_kses( $kidsworld_main_title,kidsworld_kses_allowed_text() ) ) . '</div><div class="clear"></div>';
				}
			}

		}

		echo apply_filters( 'kidsworld_main_titles', $output );

	}

}

if (!function_exists('kidsworld_override_page_title')) {
	function kidsworld_override_page_title() {
		return false;
	}
}
add_filter('woocommerce_show_page_title', 'kidsworld_override_page_title');


/* ----------------------------------------------------------------------------------------
	Social Media Share Buttons
---------------------------------------------------------------------------------------- */

if ( !function_exists( 'kidsworld_post_share_icons' ) ) {
	function kidsworld_post_share_icons( $postid=false ) {

		if ( post_password_required() ) return;

		global $post;
		$postid = $postid ? $postid :$post->ID;
		if (!$postid) return;

		$kidsworld_psi_source = esc_url( home_url() );
		$kidsworld_psi_url = get_permalink($postid);
		$kidsworld_psi_url = urlencode( $kidsworld_psi_url );
		$kidsworld_psi_title = esc_attr( the_title_attribute( 'echo=0' ) );
		$kidsworld_psi_summary = substr(get_the_excerpt(), 0,120);
		$kidsworld_psi_img = wp_get_attachment_url( get_post_thumbnail_id($postid) );

		$output = '';

		$output .= '<div class="kidsworld_post_share_links kidsworld-share-id-box-'.$postid.'">';
		$output .= '<ul class="kidsworld_post_share_icons_list">';

		$output .= '<li class="s_twitter"><a href="http://twitter.com/share?text='. urlencode($kidsworld_psi_title) .'&amp;url='. $kidsworld_psi_url .'" target="_blank" title="'. esc_attr__( 'Share on Twitter', 'kids-world' ) .'" class="kidsworld_tooltip"><i class="fa fa-twitter"></i></a></li>';

		$output .= '<li class="s_facebook"><a href="http://www.facebook.com/share.php?u='.$kidsworld_psi_url.'&amp;t='. urlencode($kidsworld_psi_title) .'" target="_blank" title="'. esc_attr__( 'Share on Facebook', 'kids-world' ) .'" class="kidsworld_tooltip"><i class="fa fa-facebook"></i></a></li>';

		$output .= '<li class="s_google"><a title="'. esc_attr__( 'Share on Google+', 'kids-world' ) .'" rel="external" href="https://plusone.google.com/_/+1/confirm?url=' . $kidsworld_psi_url . '" target="_blank" class="kidsworld_tooltip"><i class="fa fa-google-plus"></i></a></li>';

		$output .= '<li class="s_pinterest"><a href="http://pinterest.com/pin/create/button/?url='. $kidsworld_psi_url .'&amp;media='. $kidsworld_psi_img .'&amp;description='. urlencode($kidsworld_psi_summary) .'" target="_blank" title="'. esc_attr__( 'Share on Pinterest', 'kids-world' ) .'" class="kidsworld_tooltip"><i class="fa fa-pinterest"></i></a></li>';

		$output .= '<li class="s_linkedin"><a title="'. esc_attr__( 'Share on LinkedIn', 'kids-world' ) .'" rel="external" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. $kidsworld_psi_url .'&amp;title='. urlencode($kidsworld_psi_title) .'&amp;summary='. urlencode($kidsworld_psi_summary) .'&amp;source='. $kidsworld_psi_source .'" target="_blank" class="kidsworld_tooltip"><i class="fa fa-linkedin"></i></a></li>';

		$output .= '<li class="s_tumblr"><a title="'. esc_attr__( 'Share on Tumblr', 'kids-world' ) .'" rel="external" href="http://www.tumblr.com/share/link?url='. $kidsworld_psi_url .'&amp;name='. urlencode($kidsworld_psi_title) .'&amp;description='. urlencode($kidsworld_psi_summary) .'" target="_blank" class="kidsworld_tooltip"><i class="fa fa-tumblr"></i></a></li>';

		$output .= '</ul>';
		$output .= '<div class="clear"></div>';
		$output .= '</div>';

		return apply_filters( 'kidsworld_post_share_icons', $output );

	}
}

/* ----------------------------------------------------------------------------------------
	KSES allowed tags
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_kses_allowed_textarea')) {
	function kidsworld_kses_allowed_textarea() {

		$output = '';

		$kidsworld_allowed_attr = array( 'class' => true,'style' => true,'id'=> true );

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
		    'cite' => $kidsworld_allowed_attr,
		    'code' => array(),
		    'del' => array(
		        'datetime' => true,
		    ),
		    'em' => $kidsworld_allowed_attr,
		    'i' => $kidsworld_allowed_attr,
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
		    'h1' => $kidsworld_allowed_attr,
		    'h2' => $kidsworld_allowed_attr,
		    'h3' => $kidsworld_allowed_attr,
		    'h4' => $kidsworld_allowed_attr,
		    'h5' => $kidsworld_allowed_attr,
		    'h6' => $kidsworld_allowed_attr,
		    'p' => $kidsworld_allowed_attr,
		    'ul' => $kidsworld_allowed_attr,
		    'ol' => $kidsworld_allowed_attr,
		    'li' => $kidsworld_allowed_attr,
		    'div' => $kidsworld_allowed_attr,
		    'span' => $kidsworld_allowed_attr,
		    'small' => $kidsworld_allowed_attr,
		    'br' => $kidsworld_allowed_attr,
		    'img' => array(
		        'src' => true,
		        'class' => true,
		        'style' => true,
		        'id'=> true,
		        'alt'=> true,
		        'title'=> true
		    	)
			);

		return apply_filters( 'kidsworld_kses_allowed_textarea', $output );
	}
}

// KSES for title or short sentenses ----------------------------------------------------------------------------------------


if (!function_exists('kidsworld_kses_allowed_text')) {
	function kidsworld_kses_allowed_text() {

		$output = '';

		$kidsworld_allowed_attr = array( 'class' => true,'style' => true,'id'=> true );

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
		    'b' => $kidsworld_allowed_attr,
		    'cite' => $kidsworld_allowed_attr,
		    'em' => $kidsworld_allowed_attr,
		    'i' => $kidsworld_allowed_attr,
		    'strike' => array(),
		    'strong' => array(),
		    'span' => $kidsworld_allowed_attr,
		    'small' => $kidsworld_allowed_attr,
		    'div' => $kidsworld_allowed_attr,
		    'br' => $kidsworld_allowed_attr
			);

		return apply_filters( 'kidsworld_kses_allowed_text', $output );
	}
}


/* ----------------------------------------------------------------------------------------
	Post Author
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_about_author')) {
	function kidsworld_about_author() {

		$output = '';
		$kidsworld_about_author_box = kidsworld_get_option('kidsworld_single_about_author',1);

		if (isset($_COOKIE["pixel_ratio"])) {
   	 		$kidsworld_pixel_ratio = $_COOKIE["pixel_ratio"];
    		$kidsworld_avatar_size = $kidsworld_pixel_ratio > 1 ? '170' : '85';
		} else {
		    $kidsworld_avatar_size = '85';
		}

		if ( $kidsworld_about_author_box != 1 && is_single() ) { return; }

		$output .= '<div class="kidsworld_about_author_box kidsworld_post_inner_bg">';

		if ( is_single() ) {
			$output .= '<h5 class="kidsworld_single_pg_titles"><span>' . esc_html__('About Author', 'kids-world') . '</span></h5>';
		}

		$output .= '<div class="kidsworld_about_author">';
		$output .= '<a href="' . esc_url( get_author_posts_url(get_the_author_meta( 'ID' ) ) ). '">';
		$output .= get_avatar(get_the_author_meta('email'),$kidsworld_avatar_size);
		$output .= '</a>';

		$output .= '<h6><a href="' . esc_url( get_author_posts_url(get_the_author_meta( 'ID' ) ) ). '">' . get_the_author() . '</a></h6>';
		$output .= '<p>' . wp_kses( get_the_author_meta('description'),kidsworld_kses_allowed_text() ) . '</p>';

		$output .= '<ul class="kidsworld_post_author_icon">';

		$author_contacts = array('twitter','facebook','google-plus','pinterest','linkedin','tumblr','delicious','vimeo-square','youtube-play');

		foreach ($author_contacts as $author_contact ) {

			if ( get_the_author_meta($author_contact) ) {
				$output .= '<li><a href="' . esc_url( get_the_author_meta($author_contact) ) . '" target="_blank" ><i class="fa fa-'.$author_contact.'"></i></a></li>';
			}

		}

		$output .= '</ul>';
		$output .= '<div class="clear"></div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="clear"></div>';


		return apply_filters( 'kidsworld_about_author_box', $output );

	}
}

/* ----------------------------------------------------------------------------------------
	Related Posts
---------------------------------------------------------------------------------------- */

if( ! function_exists( 'kidsworld_get_related_posts' ) ) {
	function kidsworld_get_related_posts( $post_id, $number_posts = -1 ) {

		$query = new WP_Query();

		$args = '';

		if( $number_posts == 0 ) {
			return $query;
		}

		$args = wp_parse_args( $args, array(
			'category__in'			=> wp_get_post_categories( $post_id ),
			'ignore_sticky_posts'	=> 0,
			'meta_key'				=> '_thumbnail_id',
			'posts_per_page'		=> $number_posts,
			'post__not_in'			=> array( $post_id ),
		));

		$query = new WP_Query( $args );

	  	return apply_filters( 'kidsworld_get_related_posts', $query );

	}
}

/* ----------------------------------------------------------------------------------------
	HEX TO RGBA
---------------------------------------------------------------------------------------- */

if( ! function_exists( 'kidsworld_hex2rgba' ) ) {
	function kidsworld_hex2rgba( $hex, $alpha = 1, $echo = false ) {
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

		$kidsworld_rgba = 'rgba('. $r.', '. $g .', '. $b .', '. $alpha .')';

		if ( $echo ){
			echo $kidsworld_rgba;
			return true;
		}

		return apply_filters( 'kidsworld_hex2rgba', $kidsworld_rgba );
	}
}


/* ----------------------------------------------------------------------------------------
	SORT FOOTERS
---------------------------------------------------------------------------------------- */

function kidsworld_sort_footers() {

    $kidsworld_sort_footers = kidsworld_get_option( 'kidsworld_footer_sort' );
    $kidsworld_sort_footers = $kidsworld_sort_footers ? $kidsworld_sort_footers : 'widget,copyright';
    $kidsworld_sort_footers = apply_filters( 'kidsworld_sort_kidsworld_sort_footers', $kidsworld_sort_footers );

    if ( ! is_array( $kidsworld_sort_footers ) ) {
        $kidsworld_sort_footers = explode( ',', $kidsworld_sort_footers );
    }

    return apply_filters( 'kidsworld_sort_footers', $kidsworld_sort_footers );

}

/* ----------------------------------------------------------------------------------------
	SORT POST SINGLE SECTIONS
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_sort_single_sections')) {
	function kidsworld_sort_single_sections() {

	    $kidsworld_sort_single_sections = kidsworld_get_option( 'kidsworld_blog_single_sort' );
	    $kidsworld_sort_single_sections = $kidsworld_sort_single_sections ? $kidsworld_sort_single_sections : '';
	    $kidsworld_sort_single_sections = apply_filters( 'kidsworld_sort_sections', $kidsworld_sort_single_sections );

	    if ( ! is_array( $kidsworld_sort_single_sections ) ) {
	        $kidsworld_sort_single_sections = explode( ',', $kidsworld_sort_single_sections );
	    }

	    return apply_filters( 'kidsworld_sort_single_sections', $kidsworld_sort_single_sections );
	}
}

/* ----------------------------------------------------------------------------------------
	EXCERPT LIMIT
---------------------------------------------------------------------------------------- */

if( ! function_exists( 'kidsworld_excerpt_length' ) ) {
	function kidsworld_excerpt_length( $length ) {
		return intval(kidsworld_get_option('kidsworld_excerpt_length',50));
	}
	add_filter( 'excerpt_length', 'kidsworld_excerpt_length', 999 );
}

/* ----------------------------------------------------------------------------------------
	GET COMMENTS NUMBER
---------------------------------------------------------------------------------------- */

if( ! function_exists( 'kidsworld_get_comments_number' ) ) {
	function kidsworld_get_comments_number() {

		$kidsworld_num_comments = get_comments_number();

		if ( $kidsworld_num_comments == 0 ) {
			$output =  esc_html__('No Comments','kids-world');
		} elseif ( $kidsworld_num_comments > 1 ) {
			$output =  $kidsworld_num_comments . esc_html__(' Comments','kids-world');
		} else {
			$output =  esc_html__('1 Comment','kids-world');
		}

		echo apply_filters( 'kidsworld_get_comments_number', $output );
	}
}

/* ----------------------------------------------------------------------------------------
	Pagination
---------------------------------------------------------------------------------------- */

// Standard Pagination (1,2,3,4)
if ( !function_exists( 'kidsworld_standard_pagination' ) ) {
	function kidsworld_standard_pagination($total=null) {

		$kidsworld_prevOne = '<i class="fa fa-angle-left"></i> <span class="kidsworld_pg_prev"></span>';
		$kidsworld_prevTwo = '<i class="fa fa-angle-right"></i> <span class="kidsworld_pg_prev"></span>';

		$kidsworld_NextOne = '<span class="kidsworld_pg_next"></span> <i class="fa fa-angle-right"></i>';
		$kidsworld_NextTwo = '<span class="kidsworld_pg_next"></span> <i class="fa fa-angle-left"></i>';

		$kidsworld_arrowPrev = is_rtl() ? $kidsworld_prevTwo : $kidsworld_prevOne;
		$kidsworld_arrowNext = is_rtl() ? $kidsworld_NextTwo : $kidsworld_NextOne;

		global $wp_query;

		$kidsworld_total_page = $wp_query->max_num_pages;
		$kidsworld_big_number = 999999999; // need an unlikely integer
		$output = '';

		if( $kidsworld_total_page > 1 )  {
			$output .= '<div class="kidsworld_pagination_wrap">';
			$output .= '<div class="kidsworld_pagination">';

			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $kidsworld_pagination_format = 'page/%#%/';
			 } else {
				 $kidsworld_pagination_format = '&paged=%#%';
			 }

			$output .= paginate_links(array(
				'base'			=> str_replace( $kidsworld_big_number, '%#%', esc_url( get_pagenum_link( $kidsworld_big_number ) ) ),
				'format'		=> $kidsworld_pagination_format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $kidsworld_total_page,
				'mid_size'		=> 2,
				'show_all'		=> false,
				"add_args" 		=> false,
				'type' 			=> 'plain',
				'prev_text'		=> $kidsworld_arrowPrev,
				'next_text'		=> $kidsworld_arrowNext
			 ) );

			$output .= '</div>';
			$output .= '</div>';

		}

		echo apply_filters( 'kidsworld_standard_pagination', $output );
	}
}


// Next - Previous Pagination

if ( !function_exists( 'kidsworld_next_prev_links' ) ) {
	function kidsworld_next_prev_links() {

		$output = '<div class="alignleft post-prev">
						'.get_previous_posts_link('&larr; '. esc_html__( 'Prev', 'kids-world' ) ).'
					</div>
					<div class="alignright post-next">
						'.get_next_posts_link( esc_html__( 'Next', 'kids-world' ) .' &rarr;').'
					</div>';

		return apply_filters( 'kidsworld_next_prev_links', $output );
	}
}


if ( !function_exists( 'kidsworld_next_prev_pagination' ) ) {
	function kidsworld_next_prev_pagination( $pages = '', $range = 4 ) {
		global $paged;
		if(empty($paged)) $paged = 1;

		if( $pages == '' ) {
		   global $wp_query;
		   $pages = $wp_query->max_num_pages;
		   if(!$pages) {
			   $pages = 1;
		   }
		}

		if( 1 != $pages ) {
		  	$output = '<div class="kidsworld_next_prev_pagination clear">
							'.kidsworld_next_prev_links().'
		  				</div>';
		}

		echo apply_filters( 'kidsworld_next_prev_pagination', $output );
	}
}

// Infinite Scroll Pagination
if ( !function_exists( 'kidsworld_infinite_scroll_pagination' ) ) {
	function kidsworld_infinite_scroll_pagination() {

		$output = '<div class="kidsworld_infiniteScroll_pagination clear">
						'.kidsworld_next_prev_links().'
					</div>';

		echo apply_filters( 'kidsworld_next_prev_pagination', $output );
	}
}


if ( !function_exists( 'kidsworld_pagination' ) ) {
	function kidsworld_pagination($pagination_style) {

		if ( $pagination_style == 'infinite-scroll' ) {
			kidsworld_infinite_scroll_pagination();
		} elseif ( $pagination_style == 'next-prev' ) {
			kidsworld_next_prev_pagination();
		} else {
			kidsworld_standard_pagination();
		}
	}
}

if ( !function_exists( 'kidsworld_blog_pagination' ) ) {
	function kidsworld_blog_pagination() {

		$pagination_style = kidsworld_get_option( 'kidsworld_blog_pagination','pg_standard' );

		if ( $pagination_style == 'pg_infinite' ) {
			kidsworld_infinite_scroll_pagination();
		} elseif ( $pagination_style == 'pg_next_prev' ) {
			kidsworld_next_prev_pagination();
		} else {
			kidsworld_standard_pagination();
		}

	}
}

/* ----------------------------------------------------------------------------------------
	Portfolio + Walker
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_portfolio_thumb_title')) {
	function kidsworld_portfolio_thumb_title() {

		global $kidsworld_onoff_pf_lightbox,$kidsworld_pf_display_excerpt,$kidsworld_pf_item_title_link,$kidsworld_onoff_page_title_section;

		$postid									= get_the_ID();
		$kidsworld_portfolio_title_bg			= rwmb_meta('swmsc_portfolio_title_bg');
		$kidsworld_portfolio_title_text_color	= rwmb_meta('swmsc_portfolio_title_text_color');
		$kidsworld_pf_project_type				= rwmb_meta('swmsc_portfolio_project_type');
		$kidsworld_portfolio_video 				= rwmb_meta('swmsc_portfolio_video');

		$kidsworld_get_the_title 				= get_the_title( $postid );
		$kidsworld_attached_image				= wp_get_attachment_url(get_post_thumbnail_id($postid));

		$swmsc_portfolio_external_link 			= rwmb_meta('swmsc_portfolio_external_link');
		$target 								= rwmb_meta('swmsc_portfolio_link_window');

		if ($kidsworld_pf_project_type == "video" && $kidsworld_portfolio_video != '') {
			$kidsworld_image_large_view = $kidsworld_portfolio_video;
		} else {
			$kidsworld_image_large_view = $kidsworld_attached_image;
		}

		if ( $kidsworld_onoff_pf_lightbox && $swmsc_portfolio_external_link == '' ) {
			$kidsworld_show_lightbox = 'kidsworld_popup_gallery"';
			$kidsworld_img_link = $kidsworld_image_large_view;

			if ($kidsworld_pf_project_type == "video" && $kidsworld_portfolio_video != '') {
				$kidsworld_portfolio_hover_icon = 'video-camera';
				$kidsworld_show_lightbox = 'popup-youtube';
			}else {
				$kidsworld_portfolio_hover_icon = 'search';
			}

		} else {
			$kidsworld_show_lightbox = '';
			$kidsworld_img_link = get_permalink($postid);
			$kidsworld_portfolio_hover_icon = 'link';
		}

		if ( $swmsc_portfolio_external_link != '' ) {
			$kidsworld_get_permalink = $swmsc_portfolio_external_link;
			$kidsworld_img_link =  $swmsc_portfolio_external_link;
			$kidsworld_show_lightbox = '';
			$kidsworld_portfolio_hover_icon = 'link';
		} else {
			$kidsworld_get_permalink = get_permalink( $postid );
		}

		// thumb image
		$output = '<div class="kidsworld_portfolio_thumb_img" ><a href="'.$kidsworld_img_link.'" title="" target="'.$target.'" class="'.$kidsworld_show_lightbox.'" >
		 				<div class="kidsworld_portfolio_img_hovericon " style="background:'.$kidsworld_portfolio_title_bg.';color:'.$kidsworld_portfolio_title_text_color.';"><i class="fa fa-'.$kidsworld_portfolio_hover_icon.'"></i></div>
		 					'.get_the_post_thumbnail($postid, 'kidsworld-square-image').'
		 				</a><div class="clear"></div></div>';

		// title and excerpt

		if ( $kidsworld_onoff_page_title_section ) {

			$output .= '<div class="kidsworld_portfolio_text" style="background:'.$kidsworld_portfolio_title_bg.';color:'.$kidsworld_portfolio_title_text_color.';">
							<div class="kidsworld_portfolio_title_section ">
								<div class="project_title kidsworld_portfolio_text_style">';

									if ( $kidsworld_pf_item_title_link ) {
										$output .= '<span class="kidsworld_portfolio_title"><a href="'.$kidsworld_get_permalink.'" rel="bookmark" title="'.$kidsworld_get_the_title.'" style="color:'.$kidsworld_portfolio_title_text_color.';" target="'.$target.'">'.$kidsworld_get_the_title .'</a></span>';
									} else {
										$output .= '<span class="kidsworld_portfolio_title" style="color:'.$kidsworld_portfolio_title_text_color.';">'.$kidsworld_get_the_title.'</span>';
									}

										if ( $kidsworld_pf_display_excerpt ) {

											$output .= '<span class="kidsworld_portfolio_subtexts" style="color:'.$kidsworld_portfolio_title_text_color.';">'.get_the_excerpt().'</span>';

										}

			$output .= 		'</div>
						</div>
						<div class="clear"></div>
					</div>';

		}

		echo apply_filters( 'kidsworld_portfolio_thumb_title', $output );

	}
}

if ( !class_exists( 'Portfolio_Walker' ) ) {
	class Portfolio_Walker extends Walker_Category {
		function start_el( &$output, $object, $depth = 0, $args = Array(), $current_object_id = 0 ) {

			extract($args);

			$kidsworld_portfolio_cat_name = esc_attr( $object->name);
			$kidsworld_portfolio_cat_name = apply_filters( 'list_cats', $kidsworld_portfolio_cat_name, $object );
			$kidsworld_portfolio_item_link = '<a href="#" data-filter=".'.strtolower(preg_replace('/\s+/', '-', $kidsworld_portfolio_cat_name)).'" title="'.$kidsworld_portfolio_cat_name.'">'.$kidsworld_portfolio_cat_name.'</a> ';

			if ( isset($show_count) && $show_count )
				$kidsworld_portfolio_item_link .= ' (' . intval($object->count) . ')';
			if ( isset($show_date) && $show_date ) {
				$kidsworld_portfolio_item_link .= ' ' . gmdate('Y-m-d', $object->last_update_timestamp);
			}
			if ( isset($current_category) && $current_category )
				$_current_category = get_category( $current_category );
			if ( 'list' == $args['style'] ) {
				$output .= "<li>$kidsworld_portfolio_item_link";
			} else {
				$output .= "\t$kidsworld_portfolio_item_link<br />\n";
			}
		}
	}
}


/* **************************************************************************************
	ADD FILTERS - EDIT DEFAULT WORDPRESS
************************************************************************************** */

/* ----------------------------------------------------------------------------------------
	Post Author Social Icons
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_author_social_icons')) {
	function kidsworld_author_social_icons( $contactmethods ) {

	$contactmethods['twitter'] = esc_html__( 'Twitter URL', 'kids-world' );
	$contactmethods['facebook'] = esc_html__( 'Facebook URL', 'kids-world' );
	$contactmethods['google-plus'] = esc_html__( 'Google Plus URL', 'kids-world' );
	$contactmethods['pinterest'] = esc_html__( 'Pinterest URL', 'kids-world' );
	$contactmethods['linkedin'] = esc_html__( 'LinkedIn URL', 'kids-world' );
	$contactmethods['tumblr'] = esc_html__( 'Tumblr URL', 'kids-world' );
	$contactmethods['delicious'] = esc_html__( 'Delicious URL', 'kids-world' );
	$contactmethods['vimeo-square'] = esc_html__( 'Vimeo URL', 'kids-world' );
	$contactmethods['youtube-play'] = esc_html__( 'YouTube URL', 'kids-world' );

	return $contactmethods;

	}

	add_filter('user_contactmethods','kidsworld_author_social_icons',10,1);
}

/* ----------------------------------------------------------------------------------------
	Wordpress Default Gallery Edit Filters
---------------------------------------------------------------------------------------- */

// add title tag and lightbox class
if (!function_exists('kidsworld_edit_attachment_link')) {
	function kidsworld_edit_attachment_link( $markup, $id, $size, $permalink, $icon='', $text='' ) {
	    if ( ! $permalink ) {
	    	$post = get_post( $id );
	    	$kidsworld_gallery_image_title = $post->post_title;
	        $markup = str_replace( '<a href', '<a title="'.$kidsworld_gallery_image_title.'" class="kidsworld_popup_gallery" href', $markup );
	    }
	    return $markup;
	}
	add_filter( 'wp_get_attachment_link', 'kidsworld_edit_attachment_link', 10, 4 );
}
// add default link type file in gallery shortcode
if (!function_exists('kidsworld_gallery_shortcodes_defaults')) {
	function kidsworld_gallery_shortcodes_defaults( $output, $pairs, $att ) {
			$output['link']='file';
			$output['itemtag']='dl';
			$output['icontag']='dt';
			$output['captiontag']='dd';
		return $output;
	}

	add_filter('shortcode_atts_gallery','kidsworld_gallery_shortcodes_defaults', 10, 3);
}

/* ----------------------------------------------------------------------------------------
	Search Form
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_get_search_form')) {
	function kidsworld_get_search_form( $form ) {

	    $kidsworld_search_keyword = esc_attr__('Search','kids-world');


		if ( class_exists( 'WPML_String_Translation' ) ) {
			$kidsworld_search_keywords = icl_translate('Theme Mod', 'kidsworld_header_search_placeholder_text', kidsworld_get_option( 'kidsworld_header_search_placeholder_text' ));
		} else {
			$kidsworld_search_keywords = kidsworld_get_option( 'kidsworld_header_search_placeholder_text','Search Our Site' );
		}

	    $kidsworld_form_content = '<form method="get" action="'.esc_url( home_url() ).'/" class="kidsworld_search_form" id="kidsworld_search_form">
				<div class="kidsworld_search_form_inner">
					<input type="text" placeholder="'.$kidsworld_search_keywords.'" name="s" class="kidsworld_search_form_input" autocomplete="off" />
					<button type="submit" id="searchsubmit" class="kidsworld_search_button"><i class="fa fa-search"></i></button>
					<div class="clear"></div>
				</div>
			</form>';

	    return $kidsworld_form_content;
	}

	add_filter( 'get_search_form', 'kidsworld_get_search_form' );
}


/* ----------------------------------------------------------------------------------------
	Body Class Filter
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_body_classes')) {
	function kidsworld_body_classes($kidsworld_body_classes) {

		$kidsworld_get_sidebar_type = kidsworld_page_post_layout_type();

		if ( $kidsworld_get_sidebar_type == 'layout-sidebar-right' || $kidsworld_get_sidebar_type == 'layout-sidebar-left') {
			$kidsworld_body_classes[] = 'kidsworld_sidebar_on';
		}

		if ( get_option('kidsworld_boxed_layout_on','off') == 'on' ) {
			$kidsworld_body_classes[] = 'kidsworld_l_boxed';
		} else {
			$kidsworld_body_classes[] = 'kidsworld_no_boxed';
		}

		if ( get_option('kidsworld_sticky_menu_on','on') == 'on' ) {
			$kidsworld_body_classes[] = 'kidsworld_stickyOn';
		}

		if ( get_option('kidsworld_sub_header_on','on') == 'on' ) {
			$kidsworld_body_classes[] = 'subHeaderOn';
		}

		if ( is_single() ) {
			if (function_exists('rwmb_meta')) {
				$kidsworld_body_classes[] = 'pf_'.rwmb_meta('kidsworld_meta_gallery');
			}
		}

		if (function_exists('rwmb_meta')) {
			$kidsworld_pf_meta_gallery = rwmb_meta('kidsworld_meta_content_img_gallery_masonry_on');

			if ($kidsworld_pf_meta_gallery == 'on' ) {
				$kidsworld_body_classes[] = 'kidsworld_img_gallery_masonry';
			}
		}

		if ( get_option('kidsworld_topbar_on','off') == 'on' ) {
			$kidsworld_body_classes[] = 'topbarOn';
		}

		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
			if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) {
				$kidsworld_body_classes[] = 'kidsworld_woo_cus_reg_on';
			}
		}

		return $kidsworld_body_classes;

	}

	add_filter('body_class', 'kidsworld_body_classes');
}

/* ----------------------------------------------------------------------------------------
	Password Form
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_password_form')) {
	function kidsworld_password_form() {
	    global $post;
	    $kidsworld_password_form_label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	    $kidsworld_pass_protected = esc_html__( 'This content is password protected. To view it please enter your password below:','kids-world' );
	    $kidsworld_pp_password = esc_html__( 'Password:','kids-world' );
	    $kidsworld_pp_submit = esc_attr__( 'Submit','kids-world' );

	    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
		<p>' . $kidsworld_pass_protected . '</p>
		<p><label for="' . $kidsworld_password_form_label . '">' . $kidsworld_pp_password . ' <input name="post_password" id="' . $kidsworld_password_form_label . '" type="password" size="20" /></label> <input type="submit" name="Submit" value="' . $kidsworld_pp_submit . '" /></p></form>
		';

	    return $output;
	}
	add_filter( 'the_password_form', 'kidsworld_password_form' );
}

/* ----------------------------------------------------------------------------------------
	Multiple Sidebars - Custom After before widget and title
---------------------------------------------------------------------------------------- */

if (!function_exists('kidsworld_multiple_sidebar_after_before')) {
	function kidsworld_multiple_sidebar_after_before() {
	    $kidsworld_sidebar_before_after_widget = array(
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_widget_box"><div class="kidsworld_widget_content">',
			'after_widget' => '<div class="clear"></div></div></div></div>',
			'before_title' => '<div class="kidsworld_sidebar_ttl"><h3><span>',
			'after_title' => '</span><div class="kidsworld_sidebar_title_border"></div></h3><div class="clear"></div></div><div class="clear"></div>'
		);

	    return $kidsworld_sidebar_before_after_widget;
	}
	add_filter( 'swmsc_multiple_sidebar_after_before', 'kidsworld_multiple_sidebar_after_before' );
}

/* ----------------------------------------------------------------------------------------
	Remove Extra 10px margin in WordPress "caption" shortcode
---------------------------------------------------------------------------------------- */
if ( ! function_exists('kidsworld_slim_img_caption_shortcode')) {
	function kidsworld_slim_img_caption_shortcode( $caption_width ) {
		return 0;
	}
	add_filter( 'img_caption_shortcode_width', 'kidsworld_slim_img_caption_shortcode' );
}