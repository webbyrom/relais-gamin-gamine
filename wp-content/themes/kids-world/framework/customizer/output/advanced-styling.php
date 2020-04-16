
/* Header - Top Menu, Logo ------------------------------------ */

.kidsworld_logo_menu_header { background:<?php echo $kidsworld_main_header_bg; ?>; }
.kidsworld_header_thick_border { background:<?php echo $kidsworld_header_thick_border; ?>; }

<?php if ( $kidsworld_menu_bg_image_on == 'off') { ?>
	ul.kidsworld_top_nav > li > a > span > i,
	ul.kidsworld_top_nav > li > a > span:before,
	.kidsworld_logo_menu_header:after { background-image:none; }
<?php } ?>

ul.kidsworld_top_nav > li > a { color:<?php echo $kidsworld_topmenu_links_text_color; ?>; }
ul.kidsworld_top_nav > li > a > span > i,ul.kidsworld_top_nav > li:hover > a > span > i { color:<?php echo $kidsworld_topmenu_icons_color; ?>; }

/*Menu Link 1*/
ul.kidsworld_top_nav > li.kidsworld_m_active:first-child > a,ul.kidsworld_top_nav > li:first-child:hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:first-child > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:first-child > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link1_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:first-child > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:first-child > a:before { border-top-color:<?php echo $kidsworld_topmenu_link1_color; ?>; }
ul.kidsworld_top_nav > li:first-child > ul li:hover,
ul.kidsworld_top_nav > li:first-child > a > span > i,
ul.kidsworld_top_nav > li:first-child > a > span:before,
ul.kidsworld_top_nav > li:first-child > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:first-child > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:first-child > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link1_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:first-child > a > span > i:after,
ul.kidsworld_top_nav > li > ul > li:first-child,
ul.kidsworld_top_nav > li:first-child.kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link1_color; ?>; }

/*Menu Link 2*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(2) > a,ul.kidsworld_top_nav > li:nth-child(2):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(2) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(2) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link2_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(2) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(2) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link2_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(2) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(2) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(2) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(2) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(2) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(2) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link2_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(2) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(2) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(2).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link2_color; ?>; }

/*Menu Link 3*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(3) > a,ul.kidsworld_top_nav > li:nth-child(3):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(3) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(3) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link3_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(3) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(3) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link3_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(3) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(3) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(3) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(3) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(3) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(3) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link3_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(3) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(3) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(3).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link3_color; ?>; }

/*Menu Link 4*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(4) > a,ul.kidsworld_top_nav > li:nth-child(4):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(4) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(4) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link4_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(4) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(4) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link4_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(4) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(4) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(4) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(4) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(4) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(4) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link4_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(4) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(4) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(4).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link4_color; ?>; }

/*Menu Link 5*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(5) > a,ul.kidsworld_top_nav > li:nth-child(5):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(5) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(5) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link5_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(5) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(5) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link5_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(5) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(5) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(5) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(5) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(5) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(5) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link5_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(5) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(5) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(5).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link5_color; ?>; }

/*Menu Link 6*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(6) > a,ul.kidsworld_top_nav > li:nth-child(6):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(6) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(6) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link6_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(6) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(6) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link6_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(6) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(6) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(6) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(6) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(6) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(6) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link6_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(6) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(6) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(6).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link6_color; ?>; }

/*Menu Link 7*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(7) > a,ul.kidsworld_top_nav > li:nth-child(7):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(7) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(7) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link7_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(7) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(7) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link7_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(7) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(7) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(7) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(7) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(7) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(7) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link7_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(7) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(7) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(7).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link7_color; ?>; }

/*Menu Link 8*/
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(8) > a,ul.kidsworld_top_nav > li:nth-child(8):hover > a,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(8) > ul > li > a:first-child span,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(8) > ul > li:hover > a:first-child span { color:<?php echo $kidsworld_topmenu_link8_color; ?>; } 
ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(8) > a:before,
#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active:nth-child(8) > a:before { border-top-color:<?php echo $kidsworld_topmenu_link8_color; ?>; }
ul.kidsworld_top_nav > li:nth-child(8) > ul li:hover,
ul.kidsworld_top_nav > li:nth-child(8) > a > span > i,
ul.kidsworld_top_nav > li:nth-child(8) > a > span:before,
ul.kidsworld_top_nav > li:nth-child(8) > a > span:after,
ul.kidsworld_top_nav > li.kidsworld-mega-menu.menu-item-object-category:nth-child(8) > ul > li:hover,
ul.kidsworld_top_nav > li.kidsworld-mega-menu:nth-child(8) > ul li:hover > a:before { background-color:<?php echo $kidsworld_topmenu_link8_color; ?>; color:<?php echo $kidsworld_topmenu_icons_color; ?>; } 
ul.kidsworld_top_nav > li:nth-child(8) > a > span > i:after,
ul.kidsworld_top_nav > li:nth-child(8) > ul > li:first-child,
ul.kidsworld_top_nav > li:nth-child(8).kidsworld-mega-menu > ul { border-color:<?php echo $kidsworld_topmenu_link8_color; ?>; }

/*Dropdown*/
ul.kidsworld_top_nav li ul li:hover a,
ul.kidsworld_top_nav ul.sub-menu > li:hover > a > span,
ul.kidsworld_top_nav ul.sub-menu > li.menu-item-has-children:hover > a:after,
ul.kidsworld_top_nav li.kidsworld-mega-menu > ul.sub-menu ul.sub-menu li:hover > a span,
ul.kidsworld_top_nav li.kidsworld-mega-menu ul li a:hover { color:<?php echo $kidsworld_topmenu_icons_color; ?>; }
ul.kidsworld_top_nav > li > ul li,
ul.kidsworld_top_nav ul,
ul.kidsworld_top_nav ul.sub-menu li,
ul.kidsworld_top_nav li.kidsworld-mega-menu > ul > li:hover,
ul.kidsworld_top_nav li.kidsworld-mega-menu > ul { background:<?php echo $kidsworld_dd_bg_color; ?>; }

ul.kidsworld_top_nav .sub-menu li a span,
ul.kidsworld_top_nav .sub-menu li,
ul.kidsworld_top_nav li.kidsworld-mega-menu ul li > a,
ul.kidsworld_top_nav .sub-menu li.menu-item-has-children > a:after,
ul.kidsworld_top_nav li.kidsworld-mega-menu .sub-menu li:hover a span,
ul.kidsworld_top_nav li.kidsworld-mega-menu ul li .kidsworld_nav_p_meta span { color:<?php echo $kidsworld_dd_text_color; ?> }

/* Sub Header ------------------------------------ */

.kidsworld_breadcrumbs,.kidsworld_breadcrumbs a,.kidsworld_breadcrumbs a:hover,.kidsworld_breadcrumbs span.kidsworld-bc-trail-end { color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>; }
.kidsworld_bc_bg { background:<?php echo $kidsworld_breadcrumbs_bg; ?>; }
.kidsworld_breadcrumbs { background:<?php echo $kidsworld_breadcrumbs_bg; ?>; }
.kidsworld_search_bg { background:<?php echo $kidsworld_search_bar_bg; ?>; }
.kidsworld_search_box_bar { background:<?php echo $kidsworld_search_bar_bg; ?>; }
.kidsworld_search_box_bar .kidsworld_search_box_bar_icon { color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>; }
.kidsworld_search_box_bar input[type="text"].kidsworld_search_form_input { color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>; }
.kidsworld_search_box_bar form.kidsworld_search_form input::-webkit-input-placeholder{color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>;} 
.kidsworld_search_box_bar form.kidsworld_search_form input:-moz-placeholder{color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>;} 
.kidsworld_search_box_bar form.kidsworld_search_form input::-moz-placeholder{color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>;} 
.kidsworld_search_box_bar form.kidsworld_search_form input:-ms-input-placeholder{color:<?php echo $kidsworld_search_breadcrumbs_text_color; ?>;}

/* Sidebar ------------------------------------ */

#sidebar div:first-child .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w1_title; ?>; }
#sidebar div:first-child .kidsworld_widget_box h3:after,
#sidebar div:first-child .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w1_title; ?>; }

#sidebar div:nth-child(2) .kidsworld_widget_box h3:before,
#sidebar div:nth-child(12) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w2_title; ?>; }
#sidebar div:nth-child(2) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(12) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(2) .kidsworld_sidebar_title_border,
#sidebar div:nth-child(12) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w2_title; ?>; }

#sidebar div:nth-child(3) .kidsworld_widget_box h3:before,
#sidebar div:nth-child(13) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w3_title; ?>; }
#sidebar div:nth-child(3) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(13) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(3) .kidsworld_sidebar_title_border,
#sidebar div:nth-child(13) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w3_title; ?>; }

#sidebar div:nth-child(4) .kidsworld_widget_box h3:before,
#sidebar div:nth-child(14) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w4_title; ?>; }
#sidebar div:nth-child(4) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(14) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(4) .kidsworld_sidebar_title_border,
#sidebar div:nth-child(14) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w4_title; ?>; }

#sidebar div:nth-child(5) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w5_title; ?>; }
#sidebar div:nth-child(5) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(5) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w5_title; ?>; }

#sidebar div:nth-child(6) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w6_title; ?>; }
#sidebar div:nth-child(6) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(6) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w6_title; ?>; }

#sidebar div:nth-child(7) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w7_title; ?>; }
#sidebar div:nth-child(7) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(7) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w7_title; ?>; }

#sidebar div:nth-child(8) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w8_title; ?>; }
#sidebar div:nth-child(8) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(8) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w8_title; ?>; }

#sidebar div:nth-child(9) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w9_title; ?>; }
#sidebar div:nth-child(9) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(9) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w9_title; ?>; }

#sidebar div:nth-child(10) .kidsworld_widget_box h3:before { border-color:<?php echo $kidsworld_sidebar_w10_title; ?>; }
#sidebar div:nth-child(10) .kidsworld_widget_box h3:after,
#sidebar div:nth-child(10) .kidsworld_sidebar_title_border { background:<?php echo $kidsworld_sidebar_w10_title; ?>; }

/* Classes ------------------------------------ */

.kidsworld_class_date span.kidsworld_cd_year { background:<?php echo $kidsworld_class_grid_year_bg; ?>; }
.kidsworld_site_content .kidsworld_class_title h5 a { color:<?php echo $kidsworld_class_grid_title; ?>; }
.kidsworld_site_content .kidsworld_class_cats,.kidsworld_class_price span { color:<?php echo $kidsworld_class_grid_time; ?>; }
.kidsworld_class_price { color:<?php echo $kidsworld_class_grid_price; ?>; }
.kidsworld_class_grid_meta ul,
.kidsworld_class_grid_meta li a,.kidsworld_class_grid_meta li a:hover { color:<?php echo $kidsworld_class_grid_meta_text;?>; }
.kidsworld_class_grid_meta li:first-child { background:<?php echo $kidsworld_class_grid_first_child; ?>; }
.kidsworld_class_grid_meta li:nth-child(2) { background:<?php echo $kidsworld_class_grid_second_child; ?>; }
.kidsworld_class_grid_meta li:last-child { background:<?php echo $kidsworld_class_grid_third_child; ?>; }

.kidsworld_ct_icon { color:<?php echo $kidsworld_class_single_table_icons; ?>; }
.kidsworld_ct_text { color:<?php echo $kidsworld_class_single_second_text; ?>; }
.kidsworld_ct_text span.kidsworld_ct_light_text { color:<?php echo $kidsworld_class_single_first_text; ?>; }
.kidsworld_class_table li:first-child .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_1_bg; ?>; }
.kidsworld_class_table li:nth-child(2) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_2_bg; ?>; }
.kidsworld_class_table li:nth-child(3) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_3_bg; ?>; }
.kidsworld_class_table li:nth-child(4) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_4_bg; ?>; }
.kidsworld_class_table li:nth-child(5) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_5_bg; ?>; }
.kidsworld_class_table li:nth-child(6) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_6_bg; ?>; }
.kidsworld_class_table li:nth-child(7) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_7_bg; ?>; }
.kidsworld_class_table li:nth-child(8) .kidsworld_ct_icon { background:<?php echo $kidsworld_class_single_icon_8_bg; ?>; }
.kidsworld_class_price_button { color:<?php echo $kidsworld_class_single_price_box_text; ?>; }
.kidsworld_class_price_box_holder { background:<?php echo $kidsworld_class_single_price_box_bg; ?>; }
.kidsworld_class_register_btn a { background:<?php echo $kidsworld_class_single_register_btn_bg; ?>; }
.kidsworld_site_content .kidsworld_class_register_btn a,.kidsworld_site_content .kidsworld_class_register_btn a:hover { color:<?php echo $kidsworld_class_single_register_btn_text; ?>; }

/* Events ------------------------------------ */

.kidsworld_event_meta span.kidsworld_event_date { background:<?php echo $kidsworld_event_grid_date_bg; ?>; color:<?php echo $kidsworld_event_grid_date; ?>; }
.kidsworld_event_meta span.kidsworld_event_time { background:<?php echo $kidsworld_event_grid_time_bg; ?>; color:<?php echo $kidsworld_event_grid_time; ?>; }
.kidsworld_site_content .kidsworld_event_title h5 a { color:<?php echo $kidsworld_event_grid_title; ?>; }

.kidsworld_event_dt_title { background:<?php echo $kidsworld_event_single_table1_bg; ?>; color:<?php echo $kidsworld_event_single_table1; ?>; }
.kidsworld_event_meta_text li:before,.kidsworld_site_content .kidsworld_event_date_time_box a { color:<?php echo $kidsworld_event_single_table1_bg; ?>; }
.kidsworld_event_orgbox_title { background:<?php echo $kidsworld_event_single_table2_bg; ?>; color:<?php echo $kidsworld_event_single_table2; ?>; }
.kidsworld_event_orgbox_meta_text li:before,.kidsworld_site_content .kidsworld_event_organizer_box a { color:<?php echo $kidsworld_event_single_table2_bg; ?>; }
.kidsworld_event_register_button a { background:<?php echo $kidsworld_event_single_button_bg; ?>; }
.kidsworld_site_content .kidsworld_event_register_button a,.kidsworld_site_content .kidsworld_event_register_button a:hover { color:<?php echo $kidsworld_event_single_button; ?>; }
.kidsworld_event_rg_btn_icon { border:2px solid <?php echo $kidsworld_event_single_button; ?>; }
