/* Contact Footer  ------------------------------------ */
<?php if ( $kidsworld_cf_bg_img ) { ?>
	.kidsworld_cotact_footer { background-image:url(<?php echo esc_url($kidsworld_cf_bg_img); ?>); }
<?php } ?>
.kidsworld_cotact_footer { background-color:<?php echo $kidsworld_cf_bg_color; ?>; }
.kidsworld_cotact_footer ul,.kidsworld_cotact_footer p,.kidsworld_cotact_footer a { font-size: <?php echo $kidsworld_cf_font_size; ?>px; color:<?php echo $kidsworld_cf_color; ?>; }
.kidsworld_cotact_footer a:hover { color:<?php echo $kidsworld_cf_text_hover; ?>; }
.kidsworld_contact_icon { color:<?php echo $kidsworld_cf_icons_col; ?>; }
.ci_home,.kidsworld_column_gap.cf_home:before,.cf_home .kidsworld_contact_icon { background: <?php echo $kidsworld_cf_icon_location; ?>; }
.ci_phone,.kidsworld_column_gap.cf_phone:before,.cf_phone .kidsworld_contact_icon { background: <?php echo $kidsworld_cf_icon_phone; ?>; }
.ci_email,.kidsworld_column_gap.cf_email:before,.cf_email .kidsworld_contact_icon { background: <?php echo $kidsworld_cf_icon_email; ?>; }
.ci_smedia,.kidsworld_column_gap.cf_social:before,.cf_social .kidsworld_contact_icon { background: <?php echo $kidsworld_cf_icon_social; ?>; }

.cf_home .kidsworld_contact_icon:before { border-bottom: 13px solid <?php echo $kidsworld_cf_icon_location; ?>;}
.cf_home .kidsworld_contact_icon:after { border-top: 13px solid <?php echo $kidsworld_cf_icon_location; ?>;}

.cf_phone .kidsworld_contact_icon:before { border-bottom: 13px solid <?php echo $kidsworld_cf_icon_phone; ?>; }
.cf_phone .kidsworld_contact_icon:after { border-top: 13px solid <?php echo $kidsworld_cf_icon_phone; ?>; }

.cf_email .kidsworld_contact_icon:before { border-bottom: 13px solid <?php echo $kidsworld_cf_icon_email; ?>; }
.cf_email .kidsworld_contact_icon:after { border-top: 13px solid <?php echo $kidsworld_cf_icon_email; ?>; }

.cf_social .kidsworld_contact_icon:before { border-bottom: 13px solid  <?php echo $kidsworld_cf_icon_social; ?>; }
.cf_social .kidsworld_contact_icon:after { border-top: 13px solid  <?php echo $kidsworld_cf_icon_social; ?>; }


/* Widget Footer  ------------------------------------ */

<?php $kidsworld_footer_text_color = 'color:'.$kidsworld_footer_color.';'; ?>

.footer {
	<?php if ( $kidsworld_footer_bg_img ) { ?>
		background-image:url(<?php echo esc_url($kidsworld_footer_bg_img); ?>);
	<?php } ?>
	background-color:<?php echo $kidsworld_footer_bg_color; ?>; 
	<?php echo $kidsworld_footer_text_color; ?> 	
}

.footer,.footer p { font-size:<?php echo $kidsworld_footer_text_size; ?>px; }

.kidsworld_footer_border { background:<?php echo $kidsworld_footer_top_border_color; ?>; }

.footer ul li a,
.footer .tagcloud a,
.footer .recent_posts_slider_title p a,
.footer .recent_posts_slider_title span a,
.footer .wp-caption { <?php echo $kidsworld_footer_text_color; ?> }

.footer a { color:<?php echo $kidsworld_footer_links_color; ?>; }

.footer a:hover,
.footer #wp-calendar tbody td a,
.footer ul.menu > li ul li.current-menu-item > a,
.footer .widget_nav_menu ul li.current-menu-item > a,
.footer .widget_nav_menu ul li.current-menu-item:before,
.footer .widget_categories ul li.current-cat > a,
.footer .widget_categories ul li.current-cat:before,
.footer .widget.woocommerce ul li.current-cat a,
.footer .widget ul li a:hover,
.footer .recent_posts_slider_title p a:hover,
.footer .recent_posts_slider_title span a:hover,
.footer a.twitter_time:hover { color:<?php echo $kidsworld_footer_links_hover_color; ?>; }

.footer .widget_search #kidsworld_search_form input[type="text"] { color:<?php echo $kidsworld_footer_text_color; ?> text-shadow:none; }
.footer .widget_search #kidsworld_search_form input[type="text"]::-webkit-input-placeholder { color:<?php echo $kidsworld_footer_text_color; ?> opacity:.5; }
.footer .widget_search #kidsworld_search_form input[type="text"]::-moz-placeholder { color:<?php echo $kidsworld_footer_text_color; ?> opacity:.5; }
.footer .widget_search #kidsworld_search_form input[type="text"]::-ms-placeholder { color:<?php echo $kidsworld_footer_text_color; ?> opacity:.5; }
.footer .widget_search #kidsworld_search_form input[type="text"]::placeholder { color:<?php echo $kidsworld_footer_text_color; ?> opacity:.5; }

.footer ul li,
.footer #widget_search_form #searchform #s,
.footer #widget_search_form #searchform input.button,
.footer .widget_rss ul li,
.footer .widget_meta ul li,
.footer .widget_categories ul li,
.footer .widget_pages ul li,
.footer .widget_archive ul li,
.footer .widget_recent_comments ul li,
.footer .widget_recent_entries ul li,
.footer .widget_nav_menu ul li,
.footer ul.swmsc_cat_widget_items li.cat-item small,
.footer .tagcloud a,
.footer .kidsworld_wid_tabs_container,
.footer .widget_nav_menu ul { border-color: <?php echo $kidsworld_footer_border_color;?>; }

.footer .input-text,
.footer input[type="text"],  
.footer input[type="password"], 
.footer input[type="email"], 
.footer input[type="number"], 
.footer input[type="url"], 
.footer input[type="tel"], 
.footer input[type="search"], 
.footer textarea, 
.footer select,
.footer #wp-calendar thead th,
.footer #wp-calendar caption,
.footer #wp-calendar tbody td,
.footer #wp-calendar tbody td:hover,
.footer input[type="text"]:focus, 
.footer input[type="password"]:focus, 
.footer input[type="email"]:focus, 
.footer input[type="number"]:focus, 
.footer input[type="url"]:focus, 
.footer input[type="tel"]:focus, 
.footer input[type="search"]:focus, 
.footer textarea:focus,
.footer #widget_search_form #searchform #s:focus { <?php echo $kidsworld_footer_text_color; ?> border-color: <?php echo $kidsworld_footer_border_color;?>;}

.footer .kidsworld_footer_widget h3 span { 
	font-size: <?php echo $kidsworld_footer_wid_title_size; ?>px; 
	color:<?php echo $kidsworld_footer_wid_title_color; ?>; 
	letter-spacing: <?php echo $kidsworld_footer_title_letter_space; ?>px;  
	text-transform: <?php echo $kidsworld_footer_title_transform; ?>; 
	line-height:<?php echo $kidsworld_footer_title_lineheight; ?>px;
	font-style:<?php echo $kidsworld_footer_title_text_style; ?>;
}

.kidsworld_footer_widget h3 span:after, .kidsworld_footer_widget h3 span:before { background:<?php echo $kidsworld_footer_title_border_one; ?> }

.footer .kidsworld_footer_widget,.footer .kidsworld_fb_subscribe_wid { margin-bottom:<?php echo $kidsworld_footer_widget_space;?>px; }

.footer .widget_meta ul li:before,
.footer .widget_categories ul li:before,
.footer .widget_pages ul li:before,
.footer .widget_archive ul li:before,
.footer .widget_recent_comments ul li:before,
.footer .widget_recent_entries ul li:before,
.footer .widget_nav_menu ul li:before,
.footer .widget_product_categories ul li:before,
.footer .archives-link ul li:before,
.footer .widget_rss ul li:before,
.footer .widget_search #kidsworld_search_form button.kidsworld_search_button { <?php echo $kidsworld_footer_text_color; ?> }

<?php $kidsworld_footer_select_bg = is_rtl() ? 'left' : 'right'; ?>

.footer select { background:<?php echo $kidsworld_footer_bg_color_two; ?> url(<?php echo get_template_directory_uri(); ?>/images/select3.png) no-repeat center <?php echo $kidsworld_footer_select_bg; ?>;  }

.footer #wp-calendar thead th,
.footer #wp-calendar caption,
.footer #wp-calendar tbody td,
.footer .tagcloud a:hover,
.footer ul li.cat-item small,
.footer .wp-caption { background:<?php echo $kidsworld_footer_bg_color_two; ?> }

.footer,.footer p { line-height:<?php echo $kidsworld_footer_line_height; ?>px; }

.kidsworld_footer_copyright p { font-size:<?php echo $kidsworld_footer_copyright_text_size; ?>px; }
	