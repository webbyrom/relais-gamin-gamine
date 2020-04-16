/*topbar ------------------------------------ */

<?php if ( $kidsworld_topbar_on == 'on' ) { ?>

.kidsworld_topbar { background:<?php echo $kidsworld_topbar_bg; ?>; }
.kidsworld_topbar, .kidsworld_topbar a { color:<?php echo $kidsworld_topbar_color; ?>; font-size: <?php echo $kidsworld_topbar_font_size; ?>;  }
.kidsworld_topbar a:hover { color:<?php echo $kidsworld_topbar_hover_color; ?>; }

<?php } ?>

/*main links ------------------------------------ */

ul.kidsworld_top_nav > li > a > span { 
	font-size: <?php echo $kidsworld_menu_items_size; ?>px;
	text-transform:<?php echo $kidsworld_menu_items_transform; ?>;
}

<?php if ( $kidsworld_min_width_menu_on == 'off' ) { ?>
	ul.kidsworld_top_nav > li { min-width:auto; }
	ul.kidsworld_top_nav > li > a > span,ul.kidsworld_top_nav.kidsworld_no_menu_icon > li > a > span { }
<?php } ?>

/* dropdown ------------------------------------ */

ul.kidsworld_top_nav .sub-menu li a { font-size: <?php echo $kidsworld_menu_dd_font_size; ?>px; }
ul.kidsworld_top_nav li.kidsworld-mega-menu > ul { width:<?php echo $kidsworld_layout_max_width; ?>px; max-width:<?php echo $kidsworld_layout_max_width; ?>px; }

<?php 
$kidsworld_b_layout_max_width = ($kidsworld_layout_max_width * (100 - $kidsworld_layout_width) ) / 100; 
$kidsworld_b_layout_max_width = round($kidsworld_layout_max_width - $kidsworld_b_layout_max_width);
?>
.kidsworld_l_boxed ul.kidsworld_top_nav li.kidsworld-mega-menu > ul { width:<?php echo $kidsworld_b_layout_max_width; ?>px; max-width:<?php echo $kidsworld_b_layout_max_width; ?>px; }

/* sub header ------------------------------------ */

<?php
$kidsworld_meta_header_bg_color = '';
$kidsworld_final_meta_header_bg_images = '';
$kidsworld_get_queried_object_id = get_queried_object_id();

if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {			
	if ( is_shop() ) {
		$kidsworld_get_queried_object_id = wc_get_page_id( 'shop' );
	}	
}

if (function_exists('rwmb_meta')) {
	$kidsworld_meta_sub_header_on = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_on', true );
	if ( !empty($kidsworld_meta_sub_header_on) && $kidsworld_meta_sub_header_on != 'default' ) {
		$kidsworld_sub_header_on = $kidsworld_meta_sub_header_on;
	}
}

if ( $kidsworld_sub_header_on == 'on' ) :

	if ( function_exists('rwmb_meta') && !is_search() && $kidsworld_meta_sub_header_on != 'default' ) :

		$kidsworld_meta_header_bg_color	= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_bg_color', true );
		$kidsworld_meta_header_bg_image	= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_bg_image', true );
		$kidsworld_meta_header_bg_image_src = wp_get_attachment_image_src($kidsworld_meta_header_bg_image,'full');
		$kidsworld_final_meta_header_bg_images = $kidsworld_meta_header_bg_image_src[0];

		if ( ! empty($kidsworld_final_meta_header_bg_images) ) {				
			$kidsworld_sub_header_bg_repeat 		= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_bg_repeat', true );
			$kidsworld_sub_header_bg_position 	= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_bg_position', true );
			$kidsworld_sub_header_bg_attachment 	= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_bg_attachment', true );
		}

		if ( $kidsworld_meta_sub_header_on == 'on' ) {
			$kidsworld_sub_header_top_padding 	= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_top_padding', true );
			$kidsworld_sub_header_bottom_padding 	= get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_bottom_padding', true );
		
			$kidsworld_meta_sub_header_title_color = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_title_color', true );

			if ( $kidsworld_meta_sub_header_title_color != '' ) {
				$kidsworld_sub_header_title_color = $kidsworld_meta_sub_header_title_color;	
			}
		}

	endif;?>

	#kidsworld_sub_header { 	
		padding-top: <?php echo intval($kidsworld_sub_header_top_padding); ?>px; 
		padding-bottom: <?php echo intval($kidsworld_sub_header_bottom_padding); ?>px; 
	}

	<?php
	if (is_category() ) :
		$kidsworld_get_query_var_cat = get_query_var('cat');
		$kidsworld_get_cat = get_category($kidsworld_get_query_var_cat);
		$kidsworld_cat_header_bg = kidsworld_get_option($kidsworld_get_cat->slug.'_bg_img');

		if ( $kidsworld_cat_header_bg ) {
			$kidsworld_sub_header_bg_img = $kidsworld_cat_header_bg;
		}

		$kidsworld_sub_header_title_color = kidsworld_get_option($kidsworld_get_cat->slug.'_title','#ffffff');			
	endif;

	?>

	#kidsworld_sub_header {

		<?php 	
			$kidsworld_final_header_bg_color = empty($kidsworld_meta_header_bg_color) ? $kidsworld_sub_header_bg_color : $kidsworld_meta_header_bg_color;
			$kidsworld_final_header_bg_image = empty($kidsworld_final_meta_header_bg_images) ? $kidsworld_sub_header_bg_img : $kidsworld_final_meta_header_bg_images; 
		?>

		<?php
		if ( $kidsworld_final_meta_header_bg_images == '' && $kidsworld_meta_header_bg_color != '' ) {
			if ( $kidsworld_meta_header_bg_color != '' ) {
				echo 'background-color:' . $kidsworld_meta_header_bg_color . ';' ;
			}
		} else { ?>

			background-color:<?php echo $kidsworld_final_header_bg_color; ?>;
			
			<?php if ( $kidsworld_final_header_bg_image ) { ?>
				background-image:url("<?php echo esc_url($kidsworld_final_header_bg_image); ?>");
				background-position: <?php echo str_replace( '-', ' ', $kidsworld_sub_header_bg_position); ?>;
				background-repeat: <?php echo $kidsworld_sub_header_bg_repeat; ?>;
				background-attachment:<?php echo $kidsworld_sub_header_bg_attachment; ?>;	
			<?php } ?>

		<?php }
		?>

	}

	.kidsworld_sub_header_title,h1.kidsworld_sub_header_title { 
		font-size: <?php echo $kidsworld_sub_header_title_font_size; ?>px; 
		text-transform:<?php echo $kidsworld_sub_header_title_transform; ?>;
		color:<?php echo $kidsworld_sub_header_title_color; ?> 
	}

	.kidsworld_breadcrumbs,
	.kidsworld_search_box_bar .kidsworld_search_box_bar_icon,
	.kidsworld_search_box_bar input { font-size: <?php echo $kidsworld_sub_header_breadcrumb_font_size; ?>px; text-transform:<?php echo $kidsworld_sub_header_breadcrumb_transform; ?>; }

	<?php
endif; ?>


/* mega menu ------------------------------------ */

ul.kidsworld_top_nav li.kidsworld-mega-menu > ul > li > a:first-child span,
ul.kidsworld_top_nav li.kidsworld-mega-menu > ul > li:hover > a:first-child span { 
	font-size: <?php echo $kidsworld_menu_dd_mm_font_size; ?>px; 
}

ul.kidsworld_top_nav > li.kidsworld-mega-menu:not(.menu-item-object-category) ul li { padding-top:<?php echo $kidsworld_menu_dd_mm_item_space; ?>px; padding-bottom:<?php echo $kidsworld_menu_dd_mm_item_space; ?>px; }


/* mobile resolution ------------------------------------ */

#kidsworld_mobi_nav_btn,.mobile_search_icon i { color:<?php echo $kidsworld_menu_items_color; ?>; } 
#kidsworld_mobi_nav ul li { font-size: <?php echo $kidsworld_menu_dd_font_size; ?>px; } 
#kidsworld_mobi_nav ul li a,#kidsworld_mobi_nav .kidsworld-mini-menu-arrow  { color: <?php echo $kidsworld_menu_dd_font_color; ?>; } 

/* mobie menu ------------------------------------ */

@media only screen and (max-width: <?php echo $kidsworld_mobile_menu_min_resolution; ?>px) {

	#kidsworld_mobi_nav  { display: block; }
	.kidsworld_main_nav,.kidsworld_thickborder,
	ul#kidsworld_top_nav > li.kidsworld_m_active > a:before,
	#kidsworldHeader.kidsworld_smaller_menu ul.kidsworld_top_nav > li.kidsworld_m_active > a:before,
	ul#kidsworld_top_nav > li > a > span:before,
	ul#kidsworld_top_nav > li > a > span:after,
	ul#kidsworld_top_nav > li > a > span > i:after,
	.kidsworld_main_nav > ul.kidsworld_top_nav > li > a > span:before
	 { display:none; }

	ul#kidsworld_top_nav > li > a > span > i { width:auto; display:inline-block; height:auto; margin-right:8px; }

	.kidsworld_logo { margin-right:30px; }

}


