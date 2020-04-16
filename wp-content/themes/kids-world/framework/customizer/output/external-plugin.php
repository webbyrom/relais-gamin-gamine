a.swmsc_button.kidsworld_skin_color,
button.swmsc_button.kidsworld_skin_color,
input.swmsc_button[type="submit"],
.swmsc_recent_posts_square_date span.swmsc_recent_posts_square_d_year,
.swmsc_horizontal_menu li a.active,
.swmsc_horizontal_menu li.current_page_item a,
.swmsc_dropcap.dark { background:<?php echo $kidsworld_skin_color; ?>;  }

.swmsc_recent_posts_square_date span.swmsc_recent_posts_square_d_year,
.swmsc_dropcap.dark,
a.swmsc_button.kidsworld_skin_color,
button.swmsc_button.kidsworld_skin_color,
input.swmsc_button[type="submit"],
a.swmsc_button.kidsworld_skin_color:hover,
.swmsc_horizontal_menu li a.active,
.swmsc_horizontal_menu li.current_page_item a,
.swmsc_dropcap.dark { color:<?php echo $kidsworld_skin_text_color; ?>; }

.swmsc_team_members img,
.swmsc_dropcap.dark { border-color:<?php echo $kidsworld_skin_color; ?>; }

.steps_with_circle ol li span,
.swmsc_sm_icons_sc ul li a,
.swmsc_sm_icons_sc ul li a:hover,
.swmsc_recent_posts_square_title a,
.swmsc_recent_posts_square_date a,
.swmsc_horizontal_menu li a,
.swmsc_recent_posts_tiny_title a { color:<?php echo $kidsworld_content_color; ?> }

.swmsc_recent_posts_square_content a:hover,
.swmsc_recent_posts_square_posts ul li .swmsc_recent_posts_square_grid_date a:hover { color:<?php echo $kidsworld_content_link_hover_color; ?>; }

.swmsc_container { max-width:<?php echo $kidsworld_layout_max_width; ?>px; width:<?php echo $kidsworld_layout_width; ?>%; }

.sidebar .swmsc_widget_tabs .swmsc_wid_tabs li { background:<?php echo $kidsworld_tab_wid_std_bg;?>; }
.sidebar .swmsc_widget_tabs .swmsc_wid_tabs li.active {background:<?php echo $kidsworld_tab_wid_active_bg;?>;}
.sidebar .swmsc_widget_tabs .swmsc_wid_tabs li.active a { color: <?php echo $kidsworld_tab_wid_active_col;?>;  }
.sidebar .swmsc_widget_tabs .swmsc_wid_tabs li a {
	color: <?php echo $kidsworld_tab_wid_std_col;?>;
	font-size:<?php echo $kidsworld_tab_wid_title_size;?>px;
	letter-spacing:<?php echo $kidsworld_tab_wid_title_letter_space;?>px;
	line-height:<?php echo $kidsworld_tab_wid_title_lineheight;?>px;
	font-weight:<?php echo $kidsworld_tab_wid_title_weight;?>;
	text-transform:<?php echo $kidsworld_tab_wid_title_transform;?>; }

.footer .swmsc_widget_tabs .swmsc_wid_tabs li { background:<?php echo $kidsworld_f_tab_wid_std_bg;?>; }
.footer .swmsc_widget_tabs .swmsc_wid_tabs li.active {background:<?php echo $kidsworld_f_tab_wid_active_bg;?>;}
.footer .swmsc_widget_tabs .swmsc_wid_tabs li.active a { color: <?php echo $kidsworld_f_tab_wid_active_col;?>;  }
.footer .swmsc_widget_tabs .swmsc_wid_tabs li a,.footer .swmsc_widget_tabs .swmsc_wid_tabs li a:hover {
	color: <?php echo $kidsworld_f_tab_wid_std_col;?>;
	font-size:<?php echo $kidsworld_f_tab_wid_title_size;?>px;
	letter-spacing:<?php echo $kidsworld_f_tab_wid_title_letter_space;?>px;
	line-height:<?php echo $kidsworld_f_tab_wid_title_lineheight;?>px;
	font-weight:<?php echo $kidsworld_f_tab_wid_title_weight;?>;
	text-transform:<?php echo $kidsworld_f_tab_wid_title_transform;?>; }

.footer .tp_recent_tweets .twitter_time { color:<?php echo $kidsworld_footer_color; ?> }


<?php  if ( kidsworld_get_option('kidsworld_advanced_styling_on','off') == 'on' ) {   ?>

	/* Classes ------------------------------------ */

	.swmsc_class_date span.swmsc_cd_year { background:<?php echo $kidsworld_class_grid_year_bg; ?>; }
	.kidsworld_site_content .swmsc_class_title h5 a { color:<?php echo $kidsworld_class_grid_title; ?>; }
	.kidsworld_site_content .swmsc_class_cats,.swmsc_class_price span { color:<?php echo $kidsworld_class_grid_time; ?>; }
	.swmsc_class_price { color:<?php echo $kidsworld_class_grid_price; ?>; }
	.swmsc_class_grid_meta ul,
	.swmsc_class_grid_meta li a,.swmsc_class_grid_meta li a:hover { color:<?php echo $kidsworld_class_grid_meta_text;?>; }
	.swmsc_class_grid_meta li:first-child { background:<?php echo $kidsworld_class_grid_first_child; ?>; }
	.swmsc_class_grid_meta li:nth-child(2) { background:<?php echo $kidsworld_class_grid_second_child; ?>; }
	.swmsc_class_grid_meta li:last-child { background:<?php echo $kidsworld_class_grid_third_child; ?>; }

	/* Events ------------------------------------ */

	.swmsc_event_meta span.swmsc_event_date { background:<?php echo $kidsworld_event_grid_date_bg; ?>; color:<?php echo $kidsworld_event_grid_date; ?>; }
	.swmsc_event_meta span.swmsc_event_time { background:<?php echo $kidsworld_event_grid_time_bg; ?>; color:<?php echo $kidsworld_event_grid_time; ?>; }
	.kidsworld_site_content .swmsc_event_title h5 a { color:<?php echo $kidsworld_event_grid_title; ?>; }

	/* WooCommerce ------------------------------------ */

	.kidsworld_woo_add_to_cart a.button { background:<?php echo $kidsworld_woo_addtocart_bg; ?>; }

	.woocommerce .kidsworld_woo_add_to_cart a.button:before,.kidsworld_woo_add_to_cart a.button,.kidsworld_woo_add_to_cart a.add_to_cart_button:hover,.woocommerce ul.products li.product a.button.add_to_cart_button { color:<?php echo $kidsworld_woo_addtocart_text; ?>; }

	h3.kidsworld-product-title a { color:<?php echo $kidsworld_woo_featured_product_title_col; ?>; }

	.single-product .summary.entry-summary h1 { color:<?php echo $kidsworld_woo_single_page_title_col; ?>; }

	.woocommerce-checkout .woocommerce #customer_details h3,
	.woocommerce-checkout .woocommerce h3#order_review_heading,
	h3#ship-to-different-address label,
	.woocommerce-order-received .woocommerce h2,
	.kidsworld_site_content .woocommerce h2,
	.woocommerce .edit-account fieldset legend,
	.kidsworld_site_content .related.products h2,
	.kidsworld_site_content .upsells.products h2
	{ color:<?php echo $kidsworld_woo_small_sections_title_col; ?>; }


	/*cart icon*/
	.kidsworld_cart_icon_holder a span.kidsworld_ci_holder { background:<?php echo $kidsworld_woo_cart_icon_bg; ?>; }
	.kidsworld_cart_icon_holder a span.kidsworld_ci_holder i { color:<?php echo $kidsworld_woo_cart_icon_col; ?>;}
	.kidsworld_cart_icon_hover { background:<?php echo $kidsworld_woo_cart_icon_hover_bg; ?>; }
	.kidsworld_cart_icon_hover span.kidsworld_ci_total_price:before {border-bottom-color:<?php echo $kidsworld_woo_cart_icon_hover_bg; ?>;}
	.kidsworld_cart_icon_hover span { color:<?php echo $kidsworld_woo_cart_icon_hover_color; ?>;  }

<?php } ?>

<?php if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) { ?>

	.footer .widget.woocommerce ul li a { color:<?php echo $kidsworld_footer_color; ?> }
	.footer .widget.woocommerce ul li.current-cat a,.footer .widget.woocommerce ul li.current-cat:before { color:<?php echo $kidsworld_footer_links_hover_color; ?>; }
	.footer .widget.woocommerce ul li:first-child { border-color: <?php echo $kidsworld_footer_border_color; ?>; }
	.footer .widget.woocommerce ul li:before { color:<?php echo $kidsworld_footer_color; ?>; }
	#footer ins,#footer .price_slider_amount .price_label { color:<?php echo $kidsworld_footer_color; ?>; font-size:<?php echo $kidsworld_footer_text_size; ?>; }

	<?php
	/*Onsale colors*/
	$kidsworld_onsale_bg = (get_option('kidsworld_onsale_badge_background') <> '') ? get_option('kidsworld_onsale_badge_background') : '#d07dd2';
	$kidsworld_onsale_text = (get_option('kidsworld_onsale_badge_font_color') <> '') ? get_option('kidsworld_onsale_badge_font_color') : '#ffffff';

	?>
	span.onsale { background:<?php echo $kidsworld_onsale_bg; ?>; color:<?php echo $kidsworld_onsale_text; ?>; }

	#reviews #comments ol.commentlist li .meta,.kidsworld-woo-sort-order a { color:<?php echo $kidsworld_content_color; ?>; }

	p.price ins,p.price > span.amount,
	.single_variation span.price span.amount,
	table.group_table .price ins,
	.product_meta > span > a,
	a.reset_variations,
	.single_variation span ins,
	#comments p.noreviews a,
	table.cart td.product-name a,
	a.woocommerce-remove-coupon,
	.order-total span.amount,
	.woocommerce-info a,
	.woocommerce-message:before,
	p.lost_password a,
	p.form-row.terms a,
	td.product-name strong.product-quantity,
	.order_details li strong,
	table.shop_table.order_details tfoot tr:last-child td,
	ul.product_list_widget li ins,
	ul.product_list_widget li span.amount,
	.widget_shopping_cart_content span.amount,
	.widget_layered_nav ul li.chosen a,
	.widget_layered_nav_filters ul li a,
	p.stars span a:focus,
	.star-rating,
	p.stars span a:hover,
	.woocommerce p.stars a:before,
	.kidsworld-product-details h3 a:hover,
	.kidsworld-product-details h3 a:hover mark,
	.kidsworld-featured-product-block.p_category:hover a h3,
	.kidsworld-featured-product-block.p_category:hover a h3 mark,
	#reviews #comments ol.commentlist li .comment-text p.meta strong,
	.kidsworld-featured-product-block span.amount,
	.product .woocommerce-tabs ul.tabs li.active:after,
	.cart_totals a.shipping-calculator-button,
	.woocommerce-account .addresses .title a.edit,
	.woocommerce .myaccount_user a { color:<?php echo $kidsworld_skin_color; ?>; }

	.cart-loading,table.shop_table.cart th,
	table.shop_table.woocommerce-checkout-review-order-table thead th,
	table.shop_table.order_details thead tr { background-color:<?php echo $kidsworld_skin_color; ?>; }

	.kidsworld_woo_next_prev span a:hover { background: <?php echo $kidsworld_skin_color; ?>; }
	.kidsworld_woo_next_prev span a:hover { border-color:<?php echo $kidsworld_skin_color; ?>; }
	.product .woocommerce-tabs ul.tabs li a:hover,.product .woocommerce-tabs ul.tabs li.active a { background:<?php echo $kidsworld_skin_color; ?>; }

	/*Text Color on Skin Color Background*/
	.kidsworld_woo_next_prev span a:hover:before,
	.product .woocommerce-tabs ul.tabs li a:hover,
	.product .woocommerce-tabs ul.tabs li.active a,
	.cart-loading,table.shop_table.cart th,
	table.shop_table.woocommerce-checkout-review-order-table thead th,
	table.shop_table.order_details thead tr,
	.widget_shopping_cart_content a.button,
	.woocommerce-account .woocommerce a.button { color:<?php echo $kidsworld_skin_text_color; ?>; }

	.product .woocommerce-tabs .panel h2 { color:<?php echo $kidsworld_post_single_section_ttl_col; ?>;
	font-size:<?php echo $kidsworld_post_single_section_ttl_size; ?>px;
	letter-spacing:<?php echo $kidsworld_post_single_section_ttl_letter_space; ?>px;
	text-transform:<?php echo $kidsworld_post_single_section_ttl_transform; ?>;
	font-style:<?php echo $kidsworld_post_single_section_ttl_style; ?>;
	line-height:<?php echo $kidsworld_post_single_section_ttl_lineheight; ?>px; }

	.footer .widget_product_search #kidsworld_product_search_form input[type="text"] { color:<?php echo $kidsworld_footer_text_color; ?>; text-shadow:none; }
	.footer .widget_product_search #kidsworld_product_search_form input[type="text"]::-webkit-input-placeholder { color:<?php echo $kidsworld_footer_text_color; ?>; opacity:.5; }
	.footer .widget_product_search #kidsworld_product_search_form input[type="text"]::-moz-placeholder { color:<?php echo $kidsworld_footer_text_color; ?>; opacity:.5; }
	.footer .widget_product_search #kidsworld_product_search_form input[type="text"]::-ms-placeholder { color:<?php echo $kidsworld_footer_text_color; ?>; opacity:.5; }
	.footer .widget_product_search #kidsworld_product_search_form input[type="text"]::placeholder { color:<?php echo $kidsworld_footer_text_color; ?>; opacity:.5; }
	.kidsworld_cart_icon_wrap { width:<?php echo $kidsworld_logo_standard_width ?>; }

	<?php
		$kidsworld_shop_product_box_title = (get_option('kidsworld_shop_product_box_title') <> '') ? esc_attr(get_option('kidsworld_shop_product_box_title')) : 22;
		$kidsworld_shop_product_box_price = (get_option('kidsworld_shop_product_box_price') <> '') ? esc_attr(get_option('kidsworld_shop_product_box_price')) : 18;
		$kidsworld_shop_single_page_title = (get_option('kidsworld_shop_single_page_title') <> '') ? esc_attr(get_option('kidsworld_shop_single_page_title')) : 27;
		$kidsworld_shop_single_page_sections_title = (get_option('kidsworld_shop_single_page_sections_title') <> '') ? esc_attr(get_option('kidsworld_shop_single_page_sections_title')) : 22;
	?>

	.kidsworld-featured-product-block span.amount { font-size:<?php echo intval($kidsworld_shop_product_box_price); ?>px; }
	h3.kidsworld-product-title a { font-size:<?php echo intval($kidsworld_shop_product_box_title); ?>px; }
	.single-product .summary.entry-summary h1 { font-size: <?php echo intval($kidsworld_shop_single_page_title); ?>px; line-height:<?php echo $kidsworld_h3_font_lineheight; ?>px; }
	.kidsworld_site_content .woocommerce h2, .kidsworld_site_content .woocommerce h3, .kidsworld_site_content .related.products h2, .kidsworld_site_content .upsells.products h2, h3#ship-to-different-address label, .woocommerce .edit-account fieldset legend, .woocommerce-checkout .woocommerce #customer_details h3, .woocommerce-checkout .woocommerce h3#order_review_heading, .woocommerce-order-received .woocommerce h2 { font-size: <?php echo intval($kidsworld_shop_single_page_sections_title); ?>px; }
<?php } ?>

<?php if ( KIDSWORLD_TIMETABLE_IS_ACTIVE ) { ?>

	/* TimeTable ------------------------------------ */

	.sched-sort .sched-sort-dropdown,
	.sched-sort.sched-sort-open .sched-sort-dropdown,
	.sched-sort .sched-sort-dropdown .sched-sort-dropdown-select,
	.sched-sort .sched-sort-dropdown .sched-sort-dropdown-select:after { background:<?php echo $kidsworld_skin_color; ?>; color:<?php echo $kidsworld_skin_text_color; ?>; }

<?php } ?>
