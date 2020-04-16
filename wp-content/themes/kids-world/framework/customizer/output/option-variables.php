<?php

/* ---------------------------------------- */
/* GET GENERAL OPTIONS */
/* ---------------------------------------- */

$kidsworld_body_font_size 					= kidsworld_get_option( 'kidsworld_body_font_size', 18 );
$kidsworld_body_font_lineheight 				= kidsworld_get_option( 'kidsworld_body_font_lineheight', 30 );

/* ---------------------------------------- */
/* GET STYLING OPTIONS */
/* ---------------------------------------- */

$kidsworld_skin_color 						= kidsworld_get_option( 'kidsworld_skin_color', '#fcb54d' );
$kidsworld_skin_text_color 					= kidsworld_get_option( 'kidsworld_skin_text_color', '#ffffff' );
$kidsworld_content_color 					= kidsworld_get_option( 'kidsworld_content_color', '#555555' );
$kidsworld_content_link_color 				= kidsworld_get_option( 'kidsworld_content_link_color', '#555555' );
$kidsworld_content_link_hover_color 		= kidsworld_get_option( 'kidsworld_content_link_hover_color', '#000000' );


/* ---------------------------------------- */
/* TOP BAR */
/* ---------------------------------------- */

$kidsworld_topbar_on 			= kidsworld_get_option( 'kidsworld_topbar_on','off' );
$kidsworld_topbar_bg 			= kidsworld_get_option( 'kidsworld_topbar_bg', '#f2f2f2' );
$kidsworld_topbar_color 		= kidsworld_get_option( 'kidsworld_topbar_color', '#666666' );
$kidsworld_topbar_hover_color 	= kidsworld_get_option( 'kidsworld_topbar_hover_color', '#000000' );
$kidsworld_topbar_font_size 	= kidsworld_get_option( 'kidsworld_topbar_font_size', '16px' );

/* ---------------------------------------- */
/* FONTS */
/* ---------------------------------------- */

$kidsworld_body_font_family         = kidsworld_get_option( 'kidsworld_body_font_family', 'Dosis' );
$kidsworld_body_font_weight			= kidsworld_google_fonts_final_weight( kidsworld_get_option( 'kidsworld_body_font_weight', '500' ) );
$kidsworld_check_body_font_italic   = kidsworld_check_google_font_italic( $kidsworld_body_font_weight );

$kidsworld_nav_font_family       	= kidsworld_get_option( 'kidsworld_nav_font_family', 'Dosis' );
$kidsworld_nav_font_weight   		= kidsworld_get_option( 'kidsworld_nav_font_weight', '500' );
$kidsworld_final_nav_font_weight   	= kidsworld_google_fonts_final_weight( $kidsworld_nav_font_weight );
$kidsworld_check_nav_font_italic	= kidsworld_check_google_font_italic( $kidsworld_nav_font_weight );

$kidsworld_headings_font_family     	= kidsworld_get_option( 'kidsworld_headings_font_family', 'Dosis' );
$kidsworld_headings_font_weight 		= kidsworld_get_option( 'kidsworld_headings_font_weight', '700' );
$kidsworld_final_headings_font_weight	= kidsworld_google_fonts_final_weight( $kidsworld_headings_font_weight );
$kidsworld_check_headings_font_italic	= kidsworld_check_google_font_italic( $kidsworld_headings_font_weight );

$kidsworld_h1_font_size     		= kidsworld_get_option( 'kidsworld_h1_font_size', 48 );
$kidsworld_h2_font_size     		= kidsworld_get_option( 'kidsworld_h2_font_size', 40 );
$kidsworld_h3_font_size     		= kidsworld_get_option( 'kidsworld_h3_font_size', 36 );
$kidsworld_h4_font_size     		= kidsworld_get_option( 'kidsworld_h4_font_size', 30 );
$kidsworld_h5_font_size     		= kidsworld_get_option( 'kidsworld_h5_font_size', 26 );
$kidsworld_h6_font_size     		= kidsworld_get_option( 'kidsworld_h6_font_size', 20 );
$kidsworld_h1_font_lineheight     	= kidsworld_get_option( 'kidsworld_h1_font_lineheight', 48 );
$kidsworld_h2_font_lineheight     	= kidsworld_get_option( 'kidsworld_h2_font_lineheight', 40 );
$kidsworld_h3_font_lineheight     	= kidsworld_get_option( 'kidsworld_h3_font_lineheight', 36 );
$kidsworld_h4_font_lineheight     	= kidsworld_get_option( 'kidsworld_h4_font_lineheight', 30 );
$kidsworld_h5_font_lineheight     	= kidsworld_get_option( 'kidsworld_h5_font_lineheight', 27 );
$kidsworld_h6_font_lineheight     	= kidsworld_get_option( 'kidsworld_h6_font_lineheight', 24 );

/* ---------------------------------------- */
/* GET BLOG OPTIONS */
/* ---------------------------------------- */

$kidsworld_post_bottom_margin 				= kidsworld_get_option( 'kidsworld_post_bottom_margin', 100 );

$kidsworld_post_title_color 				= kidsworld_get_option( 'kidsworld_post_title_color', '#8373ce' );
$kidsworld_post_title_hover_color 			= kidsworld_get_option( 'kidsworld_post_title_hover_color', '#000000' );
$kidsworld_post_title_size 					= kidsworld_get_option( 'kidsworld_post_title_size', 36 );
$kidsworld_post_title_letter_space 			= kidsworld_get_option( 'kidsworld_post_title_letter_space', '0' );
$kidsworld_post_title_lineheight 			= kidsworld_get_option( 'kidsworld_post_title_lineheight', 40 );
$kidsworld_post_title_transform 			= kidsworld_get_option( 'kidsworld_post_title_transform', 'none' );
$kidsworld_post_title_text_style 			= kidsworld_get_option( 'kidsworld_post_title_text_style', 'normal' );
$kidsworld_post_box_bg 						= kidsworld_get_option( 'kidsworld_post_box_bg', '#adcb69' );
$kidsworld_post_box_text_color 				= kidsworld_get_option( 'kidsworld_post_box_text_color', '#ffffff' );

// blog single
$kidsworld_single_post_title_size 				= kidsworld_get_option( 'kidsworld_single_post_title_size',  36 );
$kidsworld_single_post_title_letter_space 		= kidsworld_get_option( 'kidsworld_single_post_title_letter_space', '0' );
$kidsworld_single_post_title_lineheight 		= kidsworld_get_option( 'kidsworld_single_post_title_lineheight', 40 );
$kidsworld_single_post_title_transform 			= kidsworld_get_option( 'kidsworld_single_post_title_transform', 'none' );
$kidsworld_single_post_title_text_style 		= kidsworld_get_option( 'kidsworld_single_post_title_text_style', 'normal' );
$kidsworld_single_post_title_bot_margin 		= kidsworld_get_option( 'kidsworld_single_post_title_bot_margin', 20 );

$kidsworld_post_single_section_ttl_col 			= kidsworld_get_option( 'kidsworld_post_single_section_ttl_col', '#8376c7' );
$kidsworld_post_single_section_ttl_size 		= kidsworld_get_option( 'kidsworld_post_single_section_ttl_size', 22 );
$kidsworld_post_single_section_ttl_letter_space = kidsworld_get_option( 'kidsworld_post_single_section_ttl_letter_space', '0' );
$kidsworld_post_single_section_ttl_lineheight 	= kidsworld_get_option( 'kidsworld_post_single_section_ttl_lineheight', 30 );
$kidsworld_post_single_section_ttl_transform 	= kidsworld_get_option( 'kidsworld_post_single_section_ttl_transform', 'none' );
$kidsworld_post_single_section_ttl_style 		= kidsworld_get_option( 'kidsworld_post_single_section_ttl_style', 'normal' );
$kidsworld_post_single_section_ttl_border 		= kidsworld_get_option( 'kidsworld_post_single_section_ttl_border', '#fdd94e' );
$kidsworld_post_single_section_ttl_border_circle = kidsworld_get_option( 'kidsworld_post_single_section_ttl_border_circle', '#acca69' );

/* ---------------------------------------- */
/* GET HEADER OPTIONS */
/* ---------------------------------------- */

// Sub Header General
$kidsworld_sub_header_on 					= kidsworld_get_option( 'kidsworld_sub_header_on','on');
$kidsworld_sub_header_slider_on 			= kidsworld_get_option( 'kidsworld_sub_header_slider_on','off' );
$kidsworld_sub_header_top_padding 			= kidsworld_get_option( 'kidsworld_sub_header_top_padding', 120 );
$kidsworld_sub_header_bottom_padding 		= kidsworld_get_option( 'kidsworld_sub_header_bottom_padding', 120 );

// Sub Header Background
$kidsworld_sub_header_bg_color 				= kidsworld_get_option( 'kidsworld_sub_header_bg_color', '#6e8b49' );
$kidsworld_sub_header_bg_img 				= kidsworld_get_option( 'kidsworld_sub_header_bg_img', '' );
$kidsworld_sub_header_bg_repeat 			= kidsworld_get_option( 'kidsworld_sub_header_bg_repeat', 'repeat' );
$kidsworld_sub_header_bg_position 			= kidsworld_get_option( 'kidsworld_sub_header_bg_position', 'center-top' );
$kidsworld_sub_header_bg_attachment 		= kidsworld_get_option( 'kidsworld_sub_header_bg_attachment', 'scroll' );

// Sub Header Title
$kidsworld_sub_header_title_on 				= kidsworld_get_option( 'kidsworld_sub_header_title_on','on');
$kidsworld_sub_header_title_color 			= kidsworld_get_option( 'kidsworld_sub_header_title_color', '#ffffff' );
$kidsworld_sub_header_title_font_size 		= kidsworld_get_option( 'kidsworld_sub_header_title_font_size', 48 );
$kidsworld_sub_header_title_transform 		= kidsworld_get_option( 'kidsworld_sub_header_title_transform', 'uppercase' );
$kidsworld_sub_header_breadcrumb_on 		= kidsworld_get_option( 'kidsworld_sub_header_breadcrumb_on','on');
$kidsworld_sub_header_breadcrumb_font_size 	= kidsworld_get_option( 'kidsworld_sub_header_breadcrumb_font_size', 16 );
$kidsworld_sub_header_breadcrumb_transform 	= kidsworld_get_option( 'kidsworld_sub_header_breadcrumb_transform', 'none' );

//logo options
$kidsworld_logo_standard 					= kidsworld_get_option( 'kidsworld_logo_standard', '' );
$kidsworld_logo_retina 						= kidsworld_get_option( 'kidsworld_logo_retina', '' );
$kidsworld_logo_standard_width 				= kidsworld_get_option( 'kidsworld_logo_standard_width', '204px' );

// Menu Options
$kidsworld_menu_items_size 					= kidsworld_get_option( 'kidsworld_menu_items_size', 17 );
$kidsworld_menu_items_transform 			= kidsworld_get_option( 'kidsworld_menu_items_transform', 'none' );
$kidsworld_menu_items_color 				= kidsworld_get_option( 'kidsworld_menu_items_color', '#262626' );
$kidsworld_min_width_menu_on 				= kidsworld_get_option( 'kidsworld_min_width_menu_on', 'on' );

$kidsworld_mobile_menu_min_resolution		= kidsworld_get_option( 'kidsworld_mobile_menu_min_resolution',979 );

// Dropdown Options
$kidsworld_menu_dd_font_color 				= kidsworld_get_option( 'kidsworld_menu_dd_font_color', '#444444' );
$kidsworld_menu_dd_font_size 				= kidsworld_get_option( 'kidsworld_menu_dd_font_size', 16 );

// Mega Menu Options
$kidsworld_menu_dd_mm_font_size 			= kidsworld_get_option( 'kidsworld_menu_dd_mm_font_size', '20' );
$kidsworld_menu_dd_mm_item_space 			= kidsworld_get_option( 'kidsworld_menu_dd_mm_item_space', 5 );

/* ---------------------------------------- */
/* GET FOOTER OPTIONS */
/* ---------------------------------------- */

// Widget footer
$kidsworld_footer_widget_on					= kidsworld_get_option( 'kidsworld_footer_widget_on','on' );
$kidsworld_footer_column					= kidsworld_get_option( 'kidsworld_footer_column', 4 );
$kidsworld_footer_bg_img 					= kidsworld_get_option( 'kidsworld_footer_bg_img','');
$kidsworld_footer_bg_color					= kidsworld_get_option( 'kidsworld_footer_bg_color', '#f2f2f2' );
$kidsworld_footer_bg_color_two				= kidsworld_get_option( 'kidsworld_footer_bg_color_two', '#eeeeee' );
$kidsworld_footer_top_border_color			= kidsworld_get_option( 'kidsworld_footer_top_border_color', '#afc969' );
$kidsworld_footer_border_color				= kidsworld_get_option( 'kidsworld_footer_border_color', '#dbdbdb' );
$kidsworld_footer_color						= kidsworld_get_option( 'kidsworld_footer_color', '#333333' );
$kidsworld_footer_links_color				= kidsworld_get_option( 'kidsworld_footer_links_color', '#333333' );
$kidsworld_footer_links_hover_color			= kidsworld_get_option( 'kidsworld_footer_links_hover_color', '#000000' );
$kidsworld_footer_text_size					= kidsworld_get_option( 'kidsworld_footer_text_size', 16 );
$kidsworld_footer_line_height				= kidsworld_get_option( 'kidsworld_footer_line_height', 30 );

$kidsworld_footer_wid_title_size			= kidsworld_get_option( 'kidsworld_footer_wid_title_size', 24 );
$kidsworld_footer_title_letter_space		= kidsworld_get_option( 'kidsworld_footer_title_letter_space', 0 );
$kidsworld_footer_title_transform			= kidsworld_get_option( 'kidsworld_footer_title_transform', 'none' );
$kidsworld_footer_title_text_style			= kidsworld_get_option( 'kidsworld_footer_title_text_style', 'normal' );
$kidsworld_footer_wid_title_color			= kidsworld_get_option( 'kidsworld_footer_wid_title_color', '#8373ce' );
$kidsworld_footer_title_border_one			= kidsworld_get_option( 'kidsworld_footer_title_border_one', '#fcb54e' );
$kidsworld_footer_title_lineheight			= kidsworld_get_option( 'kidsworld_footer_title_lineheight', 40 );
$kidsworld_footer_widget_space 				= kidsworld_get_option( 'kidsworld_footer_widget_space', 50 );

$kidsworld_footer_copyright_text_size 		= kidsworld_get_option( 'kidsworld_footer_copyright_text_size', 16 );

$kidsworld_f_tab_wid_title_weight 			= kidsworld_get_option( 'kidsworld_f_tab_wid_title_weight', '500' );
$kidsworld_f_tab_wid_title_transform 		= kidsworld_get_option( 'kidsworld_f_tab_wid_title_transform', 'none' );
$kidsworld_f_tab_wid_title_size 			= kidsworld_get_option( 'kidsworld_f_tab_wid_title_size', 16 );
$kidsworld_f_tab_wid_title_letter_space 	= kidsworld_get_option( 'kidsworld_f_tab_wid_title_letter_space', 0 );
$kidsworld_f_tab_wid_title_lineheight 		= kidsworld_get_option( 'kidsworld_f_tab_wid_title_lineheight', 30 );
$kidsworld_f_tab_wid_std_col 				= kidsworld_get_option( 'kidsworld_f_tab_wid_std_col', '#555555' );
$kidsworld_f_tab_wid_std_bg 				= kidsworld_get_option( 'kidsworld_f_tab_wid_std_bg', '#dddddd' );
$kidsworld_f_tab_wid_active_col 			= kidsworld_get_option( 'kidsworld_f_tab_wid_active_col', '#ffffff' );
$kidsworld_f_tab_wid_active_bg 				= kidsworld_get_option( 'kidsworld_f_tab_wid_active_bg', '#f47c7d' );

// Contact Footer
$kidsworld_cf_bg_img 						= kidsworld_get_option( 'kidsworld_cf_bg_img','');
$kidsworld_cf_bg_color 						= kidsworld_get_option( 'kidsworld_cf_bg_color','#8272cd');
$kidsworld_cf_font_size 					= kidsworld_get_option( 'kidsworld_cf_font_size','16px');
$kidsworld_cf_color 						= kidsworld_get_option( 'kidsworld_cf_color','#ffffff');
$kidsworld_cf_text_hover 					= kidsworld_get_option( 'kidsworld_cf_text_hover','#fdd94e');
$kidsworld_cf_icons_col 					= kidsworld_get_option( 'kidsworld_cf_icons_col','#ffffff');
$kidsworld_cf_icon_location 				= kidsworld_get_option( 'kidsworld_cf_icon_location','#afc969');
$kidsworld_cf_icon_phone 					= kidsworld_get_option( 'kidsworld_cf_icon_phone','#f47c7d');
$kidsworld_cf_icon_email 					= kidsworld_get_option( 'kidsworld_cf_icon_email','#fcb54e');
$kidsworld_cf_icon_social 					= kidsworld_get_option( 'kidsworld_cf_icon_social','#5bc99f');

/* ---------------------------------------- */
/* GET LAYOUT OPTIONS */
/* ---------------------------------------- */

$kidsworld_boxed_layout_on 					= kidsworld_get_option( 'kidsworld_boxed_layout_on','off' );
$kidsworld_layout_max_width 				= kidsworld_get_option( 'kidsworld_layout_max_width', '1180' );
$kidsworld_layout_width 					= kidsworld_get_option( 'kidsworld_layout_width', '90' );
$kidsworld_content_width 					= kidsworld_get_option( 'kidsworld_content_width', '74' );

$kidsworld_site_content_top_padding			= esc_html(kidsworld_get_option( 'kidsworld_site_content_top_padding', '75px' ));
$kidsworld_site_content_bottom_padding		= esc_html(kidsworld_get_option( 'kidsworld_site_content_bottom_padding', '75px' ));

$kidsworld_body_bg_color					= kidsworld_get_option( 'kidsworld_body_bg_color', '#444444' );
$kidsworld_body_bg_opacity					= kidsworld_get_option( 'kidsworld_body_bg_opacity',1 );
$kidsworld_body_bg_img						= kidsworld_get_option( 'kidsworld_body_bg_img', '' );
$kidsworld_body_bg_position					= kidsworld_get_option( 'kidsworld_body_bg_position', 'center-top' );
$kidsworld_body_bg_repeat					= kidsworld_get_option( 'kidsworld_body_bg_repeat', 'repeat' );
$kidsworld_body_bg_attachment				= kidsworld_get_option( 'kidsworld_body_bg_attachment', 'scroll' );
$kidsworld_body_bg_stretch					= kidsworld_get_option( 'kidsworld_body_bg_stretch','off' );

/* ---------------------------------------- */
/* SIDEBAR OPTIONS */
/* ---------------------------------------- */

$kidsworld_sidebar_text_size 				= kidsworld_get_option( 'kidsworld_sidebar_text_size', 16 );
$kidsworld_sidebar_text_col 				= kidsworld_get_option( 'kidsworld_sidebar_text_col', '#555555' );
$kidsworld_sidebar_link 					= kidsworld_get_option( 'kidsworld_sidebar_link', '#555555' );
$kidsworld_sidebar_link_hover 				= kidsworld_get_option( 'kidsworld_sidebar_link_hover', '#000000' );
$kidsworld_sidebar_border_color 			= kidsworld_get_option( 'kidsworld_sidebar_border_color', '#e6e6e6' );
$kidsworld_sidebar_title_col 				= kidsworld_get_option( 'kidsworld_sidebar_title_col', '#555555' );
$kidsworld_sidebar_title_size 				= kidsworld_get_option( 'kidsworld_sidebar_title_size', 20 );
$kidsworld_sidebar_title_letter_space 		= kidsworld_get_option( 'kidsworld_sidebar_title_letter_space', 0 );
$kidsworld_widget_title_transform 			= kidsworld_get_option( 'kidsworld_widget_title_transform', 'none' );
$kidsworld_widget_title_text_style 			= kidsworld_get_option( 'kidsworld_widget_title_text_style', 'normal' );

$kidsworld_tab_wid_title_weight 			= kidsworld_get_option( 'kidsworld_tab_wid_title_weight', '700' );
$kidsworld_tab_wid_title_transform 			= kidsworld_get_option( 'kidsworld_tab_wid_title_transform', 'none' );
$kidsworld_tab_wid_title_size 				= kidsworld_get_option( 'kidsworld_tab_wid_title_size', 16 );
$kidsworld_tab_wid_title_letter_space 		= kidsworld_get_option( 'kidsworld_tab_wid_title_letter_space', '0' );
$kidsworld_tab_wid_title_lineheight 		= kidsworld_get_option( 'kidsworld_tab_wid_title_lineheight', 30 );
$kidsworld_tab_wid_std_col 					= kidsworld_get_option( 'kidsworld_tab_wid_std_col', '#555555' );
$kidsworld_tab_wid_std_bg 					= kidsworld_get_option( 'kidsworld_tab_wid_std_bg', '#f2f2f2' );
$kidsworld_tab_wid_active_col 				= kidsworld_get_option( 'kidsworld_tab_wid_active_col', '#ffffff' );
$kidsworld_tab_wid_active_bg 				= kidsworld_get_option( 'kidsworld_tab_wid_active_bg', '#fcb54e' );

/* ---------------------------------------- */
/* ADVANCED STYLING */
/* ---------------------------------------- */

if ( kidsworld_get_option('kidsworld_advanced_styling_on','off') == 'on' ) {

	// Header Styling =======================================
	$kidsworld_main_header_bg			= kidsworld_get_option( 'kidsworld_main_header_bg', '#ffffff' );
	$kidsworld_header_thick_border	= kidsworld_get_option( 'kidsworld_header_thick_border', '#adcb69' );

	//top menu
	$kidsworld_topmenu_links_text_color	= kidsworld_get_option( 'kidsworld_topmenu_links_text_color', '#555555' );
	$kidsworld_topmenu_icons_color		= kidsworld_get_option( 'kidsworld_topmenu_icons_color', '#ffffff' );
	$kidsworld_topmenu_link1_color		= kidsworld_get_option( 'kidsworld_topmenu_link1_color', '#8373ce' );
	$kidsworld_topmenu_link2_color		= kidsworld_get_option( 'kidsworld_topmenu_link2_color', '#fcb54d' );
	$kidsworld_topmenu_link3_color		= kidsworld_get_option( 'kidsworld_topmenu_link3_color', '#fc5b4e' );
	$kidsworld_topmenu_link4_color		= kidsworld_get_option( 'kidsworld_topmenu_link4_color', '#adca69' );
	$kidsworld_topmenu_link5_color		= kidsworld_get_option( 'kidsworld_topmenu_link5_color', '#84bed6' );
	$kidsworld_topmenu_link6_color		= kidsworld_get_option( 'kidsworld_topmenu_link6_color', '#c389ce' );
	$kidsworld_topmenu_link7_color		= kidsworld_get_option( 'kidsworld_topmenu_link7_color', '#8373ce' );
	$kidsworld_topmenu_link8_color		= kidsworld_get_option( 'kidsworld_topmenu_link8_color', '#fcb54d' );
	$kidsworld_menu_bg_image_on 		= kidsworld_get_option( 'kidsworld_menu_bg_image_on','on' );

	//dropdown menu
	$kidsworld_dd_bg_color	= kidsworld_get_option( 'kidsworld_dd_bg_color', '#ffffff' );
	$kidsworld_dd_text_color	= kidsworld_get_option( 'kidsworld_dd_text_color', '#555555' );

	// Sub Header Styling =======================================
	$kidsworld_breadcrumbs_bg					= kidsworld_get_option( 'kidsworld_breadcrumbs_bg', '#d07dd2' );
	$kidsworld_search_bar_bg					= kidsworld_get_option( 'kidsworld_search_bar_bg', '#adcb69' );
	$kidsworld_search_breadcrumbs_text_color	= kidsworld_get_option( 'kidsworld_search_breadcrumbs_text_color', '#ffffff' );

	// Sidebar Styling =======================================
	$kidsworld_sidebar_w1_title		= kidsworld_get_option( 'kidsworld_sidebar_w1_title', '#adca69' );
	$kidsworld_sidebar_w2_title		= kidsworld_get_option( 'kidsworld_sidebar_w2_title', '#fcb54d' );
	$kidsworld_sidebar_w3_title		= kidsworld_get_option( 'kidsworld_sidebar_w3_title', '#84bed6' );
	$kidsworld_sidebar_w4_title		= kidsworld_get_option( 'kidsworld_sidebar_w4_title', '#d07dd2' );
	$kidsworld_sidebar_w5_title		= kidsworld_get_option( 'kidsworld_sidebar_w5_title', '#59c79e' );
	$kidsworld_sidebar_w6_title		= kidsworld_get_option( 'kidsworld_sidebar_w6_title', '#8373ce' );
	$kidsworld_sidebar_w7_title		= kidsworld_get_option( 'kidsworld_sidebar_w7_title', '#fdd94f' );
	$kidsworld_sidebar_w8_title		= kidsworld_get_option( 'kidsworld_sidebar_w8_title', '#cc9966' );
	$kidsworld_sidebar_w9_title		= kidsworld_get_option( 'kidsworld_sidebar_w9_title', '#2ab2bf' );
	$kidsworld_sidebar_w10_title	= kidsworld_get_option( 'kidsworld_sidebar_w10_title', '#f97831' );

	// Classes =======================================
	// Grid Page
	$kidsworld_class_grid_year_bg		= kidsworld_get_option( 'kidsworld_class_grid_year_bg', '#adcb69' );
	$kidsworld_class_grid_title			= kidsworld_get_option( 'kidsworld_class_grid_title', '#8374cf' );
	$kidsworld_class_grid_price			= kidsworld_get_option( 'kidsworld_class_grid_price', '#fbb54d' );
	$kidsworld_class_grid_time			= kidsworld_get_option( 'kidsworld_class_grid_time', '#777777' );
	$kidsworld_class_grid_meta_text		= kidsworld_get_option( 'kidsworld_class_grid_meta_text', '#ffffff' );
	$kidsworld_class_grid_first_child	= kidsworld_get_option( 'kidsworld_class_grid_first_child', '#adcb69' );
	$kidsworld_class_grid_second_child	= kidsworld_get_option( 'kidsworld_class_grid_second_child', '#f47c7d' );
	$kidsworld_class_grid_third_child	= kidsworld_get_option( 'kidsworld_class_grid_third_child', '#fbb54d' );

	// Class Single Page
	$kidsworld_class_single_table_icons		= kidsworld_get_option( 'kidsworld_class_single_table_icons', '#ffffff' );
	$kidsworld_class_single_first_text		= kidsworld_get_option( 'kidsworld_class_single_first_text', '#777777' );
	$kidsworld_class_single_second_text		= kidsworld_get_option( 'kidsworld_class_single_second_text', '#8373ce' );
	$kidsworld_class_single_icon_1_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_1_bg', '#adcb69' );
	$kidsworld_class_single_icon_2_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_2_bg', '#f57d7d' );
	$kidsworld_class_single_icon_3_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_3_bg', '#fbb54d' );
	$kidsworld_class_single_icon_4_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_4_bg', '#d07dd2' );
	$kidsworld_class_single_icon_5_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_5_bg', '#78d0e4' );
	$kidsworld_class_single_icon_6_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_6_bg', '#5ec99f' );
	$kidsworld_class_single_icon_7_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_7_bg', '#fdda4f' );
	$kidsworld_class_single_icon_8_bg		= kidsworld_get_option( 'kidsworld_class_single_icon_8_bg', '#d76e9f' );
	$kidsworld_class_single_price_box_bg	= kidsworld_get_option( 'kidsworld_class_single_price_box_bg', '#8474d6' );
	$kidsworld_class_single_price_box_text	= kidsworld_get_option( 'kidsworld_class_single_price_box_text', '#ffffff' );
	$kidsworld_class_single_register_btn_bg	= kidsworld_get_option( 'kidsworld_class_single_register_btn_bg', '#adcb69' );
	$kidsworld_class_single_register_btn_text	= kidsworld_get_option( 'kidsworld_class_single_register_btn_text', '#ffffff' );

	// Events =======================================
	// Event Grid Page
	$kidsworld_event_grid_date_bg	= kidsworld_get_option( 'kidsworld_event_grid_date_bg', '#adcb69' );
	$kidsworld_event_grid_date		= kidsworld_get_option( 'kidsworld_event_grid_date', '#ffffff' );
	$kidsworld_event_grid_time_bg	= kidsworld_get_option( 'kidsworld_event_grid_time_bg', '#fbb54d' );
	$kidsworld_event_grid_time		= kidsworld_get_option( 'kidsworld_event_grid_time', '#ffffff' );
	$kidsworld_event_grid_title		= kidsworld_get_option( 'kidsworld_event_grid_title', '#8374cf' );

	// Event Single Page
	$kidsworld_event_single_table1_bg	= kidsworld_get_option( 'kidsworld_event_single_table1_bg', '#fdc36f' );
	$kidsworld_event_single_table1		= kidsworld_get_option( 'kidsworld_event_single_table1', '#ffffff' );
	$kidsworld_event_single_table2_bg	= kidsworld_get_option( 'kidsworld_event_single_table2_bg', '#78d0e4' );
	$kidsworld_event_single_table2		= kidsworld_get_option( 'kidsworld_event_single_table2', '#ffffff' );
	$kidsworld_event_single_button_bg	= kidsworld_get_option( 'kidsworld_event_single_button_bg', '#adcb69' );
	$kidsworld_event_single_button		= kidsworld_get_option( 'kidsworld_event_single_button', '#ffffff' );

	$kidsworld_woo_addtocart_text				= kidsworld_get_option( 'kidsworld_woo_addtocart_text', '#ffffff' );
	$kidsworld_woo_addtocart_bg					= kidsworld_get_option( 'kidsworld_woo_addtocart_bg', '#adcb69' );
	$kidsworld_woo_featured_product_title_col	= kidsworld_get_option( 'kidsworld_woo_featured_product_title_col', '#8373ce' );
	$kidsworld_woo_single_page_title_col		= kidsworld_get_option( 'kidsworld_woo_single_page_title_col', '#8373ce' );
	$kidsworld_woo_small_sections_title_col		= kidsworld_get_option( 'kidsworld_woo_small_sections_title_col', '#8373ce' );
	$kidsworld_woo_cart_icon_col				= kidsworld_get_option( 'kidsworld_woo_cart_icon_col', '#ffffff' );
	$kidsworld_woo_cart_icon_bg					= kidsworld_get_option( 'kidsworld_woo_cart_icon_bg', '#cb77cf' );
	$kidsworld_woo_cart_icon_hover_color		= kidsworld_get_option( 'kidsworld_woo_cart_icon_hover_color', '#ffffff' );
	$kidsworld_woo_cart_icon_hover_bg			= kidsworld_get_option( 'kidsworld_woo_cart_icon_hover_bg', '#8374cf' );

}
