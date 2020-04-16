/* Google Fonts ----------------- */

body,
.kidsworld_header_googlemap_info { 
	font-family:<?php echo $kidsworld_body_font_family; ?>;
	font-style: <?php echo ( $kidsworld_check_body_font_italic ) ? 'italic' : 'normal'; ?>;
	font-weight:<?php echo $kidsworld_body_font_weight; ?>; 
	font-size:<?php echo $kidsworld_body_font_size; ?>px;
	line-height:<?php echo $kidsworld_body_font_lineheight; ?>px;
	}

p { 
	font-size:<?php echo $kidsworld_body_font_size; ?>px;
	line-height:<?php echo $kidsworld_body_font_lineheight; ?>px;
}

 #kidsworldHeader ul#kidsworld_top_nav,
 ul.kidsworld_top_nav ul li { 
	font-family:<?php echo $kidsworld_nav_font_family; ?>;
	font-style: <?php echo ( $kidsworld_check_nav_font_italic ) ? 'italic' : 'normal'; ?>; 
	font-weight:<?php echo $kidsworld_final_nav_font_weight; ?>; 	}

 h1,h2,h3,h4,h5,h6,
 .kidsworld_sub_header_title,
 .kidsworld_post_meta ul li,
 .kidsworld_post_date,
 .kidsworld_post_button a span,
 .kidsworld_portfolio_title_section span.kidsworld_portfolio_title,
 .kidsworld_header_googlemap_title { 
	font-family:<?php echo $kidsworld_headings_font_family; ?>;
	font-style: <?php echo ( $kidsworld_check_headings_font_italic ) ? 'italic' : 'normal'; ?>;
	font-weight:<?php echo $kidsworld_final_headings_font_weight; ?>; }

.kidsworld_site_content h1 { font-size:<?php echo $kidsworld_h1_font_size; ?>px; line-height:<?php echo $kidsworld_h1_font_lineheight; ?>px; }
.kidsworld_site_content h2 { font-size:<?php echo $kidsworld_h2_font_size; ?>px; line-height:<?php echo $kidsworld_h2_font_lineheight; ?>px; }
.kidsworld_site_content h3 { font-size:<?php echo $kidsworld_h3_font_size; ?>px; line-height:<?php echo $kidsworld_h3_font_lineheight; ?>px; }
.kidsworld_site_content h4 { font-size:<?php echo $kidsworld_h4_font_size; ?>px; line-height:<?php echo $kidsworld_h4_font_lineheight; ?>px; }
.kidsworld_site_content h5 { font-size:<?php echo $kidsworld_h5_font_size; ?>px; line-height:<?php echo $kidsworld_h5_font_lineheight; ?>px; }
.kidsworld_site_content h6 { font-size:<?php echo $kidsworld_h6_font_size; ?>px; line-height:<?php echo $kidsworld_h6_font_lineheight; ?>px; }

.kidsworld_container {max-width:<?php echo $kidsworld_layout_max_width; ?>px; width:<?php echo $kidsworld_layout_width; ?>%; }

/* Boxed Layout ----------------- */

<?php if ( $kidsworld_boxed_layout_on == 'on'  ) { ?>

	.kidsworld_l_boxed .kidsworld_main_container,
	.kidsworld_l_boxed.kidsworld_stickyOn .kidsworld_logo_menu_header { max-width:<?php echo $kidsworld_layout_max_width; ?>px; width:<?php echo $kidsworld_layout_width; ?>%; }

	body { 
		background-color:<?php echo kidsworld_hex2rgba($kidsworld_body_bg_color,$kidsworld_body_bg_opacity); ?>;
		
		<?php if ( $kidsworld_body_bg_img ) { ?>
			background-image:url(<?php echo esc_url($kidsworld_body_bg_img); ?>);
			background-position: <?php echo str_replace( '-', ' ', $kidsworld_body_bg_position); ?>;		
			background-repeat: <?php echo $kidsworld_body_bg_repeat; ?>;
			background-attachment:<?php echo $kidsworld_body_bg_attachment; ?>;	
		<?php } ?>

		<?php if ( $kidsworld_body_bg_stretch == 'on' ) { ?>
                background-size: cover;
        <?php } ?>

	}

<?php } ?>

/* Site Content Section ----------------- */

<?php 

$kidsworld_get_queried_object_id = get_queried_object_id();

if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {			
	if ( is_shop() ) {
		$kidsworld_get_queried_object_id = wc_get_page_id( 'shop' );
	}	
}

if ( function_exists('rwmb_meta') ) {
	$kidsworld_meta_page_content_top_padding = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_page_content_top_padding', true );
	$kidsworld_meta_page_content_bottom_padding = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_page_content_bottom_padding', true );
	if ( $kidsworld_meta_page_content_top_padding != '' ) {
		$kidsworld_site_content_top_padding = $kidsworld_meta_page_content_top_padding;
	}
	if ( $kidsworld_meta_page_content_bottom_padding != '' ) {
		$kidsworld_site_content_bottom_padding = $kidsworld_meta_page_content_bottom_padding;
	}
}

?>

.kidsworld_main_container.kidsworld_site_content { padding-top:<?php echo esc_html($kidsworld_site_content_top_padding); ?>; padding-bottom:<?php echo esc_html($kidsworld_site_content_bottom_padding); ?>; }

.kidsworld_skin_text,.kidsworld_skin_text a,.kidsworld_site_content a.kidsworld_skin_text,
.kidsworld_search_page_no_result_text form button.kidsworld_search_button:hover { color:<?php echo $kidsworld_skin_color; ?>; }
.kidsworld_skin_bg,.kidsworld_skin_bg a,#kidsworld_go_top_scroll_btn,.kidsworld_portfolio_menu a.kidsworld-active-sort,.kidsworld_site_content .kidsworld_portfolio_menu a:hover,
.kidsworld_site_content ul.events_h_menu li.current-menu-item a,.kidsworld_site_content ul.events_h_menu li a:hover,
.kidsworld_site_content ul.kidsworld_h_menu li.current-menu-item a,.kidsworld_site_content ul.kidsworld_h_menu li a:hover
 { background:<?php echo $kidsworld_skin_color; ?>; color:<?php echo $kidsworld_skin_text_color; ?> }
.kidsworld_skin_border,.kidsworld_site_content blockquote { border-color:<?php echo $kidsworld_skin_color; ?>; }

.kidsworld_site_content { color:<?php echo $kidsworld_content_color; ?> }
.kidsworld_site_content a { color:<?php echo $kidsworld_content_link_color; ?>; }
.kidsworld_site_content a:hover,ul.kidsworld_search_list li h4 a:hover { color:<?php echo $kidsworld_content_link_hover_color; ?>; } 
.kidsworld_search_meta ul li a { color:<?php echo $kidsworld_content_color; ?>; }

/* Pagination ----------------- */

.kidsworld_pagination a,
.kidsworld_next_prev_pagination a,
.kidsworld_next_prev_pagination a,
#comments .kidsworld-paginate-com a,
.kidsworld_pagination_menu a,
.kidsworld_search_page_no_result_text form button.kidsworld_search_button,
input,select { color:<?php echo $kidsworld_content_color; ?>; }

.kidsworld_pagination .page-numbers.current,
.kidsworld_pagination a:hover,
.kidsworld_next_prev_pagination a:hover,
.kidsworld_next_prev_pagination a:hover,
#comments .kidsworld-paginate-com a:hover,
#comments .kidsworld-paginate-com span.page-numbers.current,
.kidsworld_pagination_menu a:hover,
.kidsworld_pagination_menu > span { color:<?php echo $kidsworld_skin_text_color; ?>; background:<?php echo $kidsworld_skin_color; ?>; }

/* Error Page ----------------- */

.error404 .kidsworld_site_content, .error404 .kidsworld_site_content a { color:<?php echo kidsworld_get_option('kidsworld_error_text_color','#333333'); ?>; }


/* Portfolio Page ----------------- */
<?php
if ( is_page_template( 'templates/portfolio.php') && function_exists('rwmb_meta') ) { 

    $kidsworld_onoff_page_title_section   = rwmb_meta('kidsworld_onoff_page_title_section');

    echo '.kidsworld_portfolio_box .kidsworld_portfolio_title_section span.kidsworld_portfolio_title { font-size: '.intval(rwmb_meta('kidsworld_pf_title_font_size')).'px; line-height: '.intval(rwmb_meta('kidsworld_pf_title_line_height')).'px; }';
    echo '.kidsworld_portfolio_box .kidsworld_portfolio_title_section span.kidsworld_portfolio_subtexts { font-size: '.intval(rwmb_meta('kidsworld_pf_excerpt_font_size')).'px; line-height: '.intval(rwmb_meta('kidsworld_pf_excerpt_line_height')).'px;} ';

    if (!$kidsworld_onoff_page_title_section) {
        echo '.kidsworld_portfolio_text,.kidsworld-arrow-up.arrow-portfolio { display:none; }';     
    }
    
}
?>

/* Buttons ----------------- */

input[type="submit"],
input[type="button"],
input[type="reset"], 
a.button,button.button
{ background:<?php echo $kidsworld_skin_color; ?>;  }

input[type="submit"],
input[type="button"],
input[type="reset"],
input.kidsworld_skin_color:hover,
a.kidsworld_skin_color:hover,
input[type="submit"]:hover,
button[type="submit"]:hover,
a.button,button.button,
a.button:hover,button.button:hover
{ color:<?php echo $kidsworld_skin_text_color; ?>; }

@media only screen and (min-width: 980px) {

	/* Site Content Section ----------------- */

	.kidsworld_custom_two_third { width: <?php echo $kidsworld_content_width - 3.20197.'%'; ?>; }
	#sidebar { width: <?php echo 100 - $kidsworld_content_width.'%'; ?>; }

}