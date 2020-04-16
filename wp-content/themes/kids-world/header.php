<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
wp_head();
?>
</head>
<body <?php body_class(); ?> id="page_body">

<?php if ( kidsworld_get_option('kidsworld_page_preloader_on','off' ) == 'on' ) { ?>

	<div class="kidsworld_site_loader">
		<div class="kidsworld_loader"></div>
	</div>

<?php } ?>

<div class="kidsworld_main_container kidsworld_header_container">
	<div class="kidsworld_header" id="kidsworld_header">

			<div id="kidsworldHeader">
				<div class="kidsworld_logo_menu_header" id="mainHeader">

					<?php if ( kidsworld_get_option( 'kidsworld_topbar_on','off' ) == 'on' ) { ?>

						<div class="kidsworld_topbar">
							<div class="kidsworld_container">
								<div class="kidsworld_topbar_holder">
									<ul class="kidsworld_topbar_left">
										<?php
										$kidsworld_topbar_intro_text = kidsworld_get_option( 'kidsworld_topbar_intro_text', 'Have any questions?' );
										$kidsworld_topbar_phone_text = kidsworld_get_option( 'kidsworld_topbar_phone_text', '987-654-3210' );
										$kidsworld_topbar_email_text = kidsworld_get_option( 'kidsworld_topbar_email_text', 'info@loremips.com' );

										if ( $kidsworld_topbar_intro_text != '' ) {
											echo '<li>'.$kidsworld_topbar_intro_text.'</li>';
										}
										if ( $kidsworld_topbar_phone_text != '' ) {
											echo '<li>'.$kidsworld_topbar_phone_text.'</li>';
										}
										if ( $kidsworld_topbar_email_text != '' ) {
											echo '<li><a href="mailto:'.$kidsworld_topbar_email_text.'">'.$kidsworld_topbar_email_text.'</a></li>';
										}
										?>
									</ul>

									<?php if ( kidsworld_get_option( 'kidsworld_topbar_social_on','on' ) == 'on' ) { ?>
										<ul class="kidsworld_topbar_right">
											<?php kidsworld_display_social_media(); ?>
										</ul>
									<?php } ?>

									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>

					<?php } ?>

					<div class="kidsworld_thickborder">
						<span class="kidsworld_header_thick_border"></span>
					</div>

					<div class="kidsworld_logo_menu_holder">

						<div class="kidsworld_container" data-max-width="<?php echo kidsworld_get_option('kidsworld_layout_max_width',1100) ;?>" data-site-width="<?php echo kidsworld_get_option('kidsworld_layout_width',90) ;?>" >

							<?php
							$kidsworld_woo_next_prev_links_options = get_option('kidsworld_woo_cart_icon_onoff');

							if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE && $kidsworld_woo_next_prev_links_options == 'yes' ) {
								global $woocommerce; ?>

								<div class="kidsworld_cart_icon_wrap">
									<div class="kidsworld_cart_icon">
										<div class="kidsworld_cart_icon_holder">
											<a href="<?php echo wc_get_cart_url(); ?>" title="<?php echo esc_html__( 'View Cart','kids-world' );?>"><span class="kidsworld_ci_holder"><i class="fa fa-shopping-cart"></i></span></a>
											<div class="kidsworld_cart_icon_hover">
												<a href="<?php echo wc_get_cart_url(); ?>" title="<?php echo esc_html__( 'View Cart','kids-world' );?>"><span class="kidsworld_ci_total_price"><?php echo $woocommerce->cart->get_cart_total(); ?></span><span class="kidsworld_ci_total_items"><?php echo sprintf(_n('%d Item', '%d Items', $woocommerce->cart->cart_contents_count, 'kids-world'), $woocommerce->cart->cart_contents_count); ?></span></a>
											</div>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							<?php } ?>

							<div class="kidsworld_nav">

								<?php kidsworld_logo(); ?>

								<div class="kidsworld_main_nav">
									<?php echo kidsworld_primary_nav(); ?>
									<div class="clear"></div>
								</div>

								<div id="kidsworld_mobi_nav">
									<div id="kidsworld_mobi_nav_btn"><span><i class="fa fa-bars"></i></span></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>

				</div>
			</div> <!-- #kidsworldHeader -->

	</div> <!-- .kidsworld_header -->
	<div class="clear"></div>

</div> <!-- .kidsworld_main_container - header sections -->

<div class="kidsworld_containers_holder">

	<div class="kidsworld_main_container">
		<?php
		$kidsworld_get_sub_header_on = kidsworld_get_option('kidsworld_sub_header_on','on');

		$kidsworld_get_queried_object_id = get_queried_object_id();

		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
			if ( is_shop() ) {
				$kidsworld_get_queried_object_id = wc_get_page_id( 'shop' );
			}
		}

		if ( function_exists('rwmb_meta') ) {
			$kidsworld_meta_sub_header_on = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_on', true );

			if ( !empty($kidsworld_meta_sub_header_on) && $kidsworld_meta_sub_header_on != 'default') {
				$kidsworld_get_sub_header_on = $kidsworld_meta_sub_header_on;
			}
		}

		if ( is_front_page() && is_home() ) {
			$kidsworld_meta_header_style = kidsworld_get_option('kidsworld_home_blog_header_style','standard');
			$kidsworld_get_sub_header_on = kidsworld_get_option('kidsworld_home_blog_header','on');
			$kidsworld_header_rev_slider_name = kidsworld_get_option('kidsworld_header_rev_slider_shortcode');
		} else {
			$kidsworld_meta_header_style = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_style', true );
			$kidsworld_header_rev_slider_name = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_header_revolution', true );
		}

		if ( $kidsworld_get_sub_header_on == 'on' ) {

			if ( $kidsworld_meta_header_style == 'revolution_slider' && $kidsworld_header_rev_slider_name != '' ) {
				?>
				<div class="kidsworld_header_slider">
					<?php
					echo do_shortcode( '[rev_slider alias="'.$kidsworld_header_rev_slider_name.'"]' );
					?>
				</div>
				<?php
			} elseif ( $kidsworld_meta_header_style == 'google_map_embed' ) {
				$kidsworld_google_map_embed_code = wp_kses(get_post_meta( get_the_ID(), 'kidsworld_google_map_embed_code', true ),kidsworld_kses_allowed_textarea());
				echo '<div class="kidsworld_google_map_embed_code">'.$kidsworld_google_map_embed_code.'</div><div class="clear"></div>';
			} elseif ( $kidsworld_meta_header_style == 'google_map' ) {

				$kidsworld_google_map_arg_height 	= intval(rwmb_meta('kidsworld_google_map_arg_height'));
				$kidsworld_google_map_arg_zoom 	= intval(rwmb_meta('kidsworld_google_map_arg_zoom'));
				$kidsworld_google_map_arg_title 	= esc_html(rwmb_meta('kidsworld_google_map_arg_title'));
				$kidsworld_google_map_arg_desc 	= wp_kses(rwmb_meta('kidsworld_google_map_arg_desc'),kidsworld_kses_allowed_textarea());

				$kidsworld_google_map_arg_title_all = '<div class="kidsworld_header_googlemap_title">'.$kidsworld_google_map_arg_title.'</div><div class="kidsworld_header_googlemap_info">'.$kidsworld_google_map_arg_desc.'</div>';

				$kidsworld_get_meta_header_google_map = array(
				    'type'         => 'map',
				    'width'        => '100%',
				    'height'       => $kidsworld_google_map_arg_height.'px',
				    'marker'       => true,
				    'marker_title' => $kidsworld_google_map_arg_title,
				    'info_window'  => $kidsworld_google_map_arg_title_all,
				    'js_options'   => array(
				        'zoomControl' => true,
				        'zoom'        => $kidsworld_google_map_arg_zoom
				    ),
				);

				?>
				<div class="kidsworld_header_google_map">
					<?php
					echo rwmb_meta( 'kidsworld_meta_header_google_map', $kidsworld_get_meta_header_google_map );
					?>
				</div>
				<?php
			} else {
				?>
				<div id="kidsworld_sub_header" class="kidsworld_sub_header">
					<div class="kidsworld_sub_header_bg"></div>
					<div class="kidsworld_container kidsworld_css_transition">
						<?php echo kidsworld_main_titles(); ?>
					</div>
				</div> <!-- #kidsworld_sub_header -->
			<?php

			}

		} ?>

		<?php if ( $kidsworld_get_sub_header_on == 'on' && !is_front_page() ) { ?>

			<div class="kidsworld_search_breadcrumb_container">

				<div class="kidsworld_container">

					<?php if ( kidsworld_get_option('kidsworld_sub_header_breadcrumb_on','on') == 'on' && !is_front_page() ) { ?>

						<?php
						$kidsworld_breadcrumb_onoff = 'show_breadcrumb';
						$kidsworld_meta_sub_header_breadcrumb_on = '';

						if (function_exists('rwmb_meta')) {
							$kidsworld_meta_sub_header_breadcrumb_on = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_breadcrumb_on', true );
						}

						if ( $kidsworld_meta_sub_header_breadcrumb_on != '' && $kidsworld_meta_sub_header_breadcrumb_on == 'off') {
							$kidsworld_breadcrumb_onoff = 'hide_bradcrumb';
						}

						if ( $kidsworld_breadcrumb_onoff != 'hide_bradcrumb') { ?>
							<div class="kidsworld_bc_bg"></div>
							<div class="kidsworld_breadcrumb_container left">
								<?php echo kidsworld_breadcrumb_trail(); ?>
							</div>
						<?php
						}

					} ?>

					<?php if ( kidsworld_get_option('kidsworld_search_bar_header_on','on') == 'on' ) { ?>

						<?php $kidsworld_searchbar_onoff = 'show_search';
						$kidsworld_meta_sub_header_search_on = '';

						if (function_exists('rwmb_meta')) {
							$kidsworld_meta_sub_header_search_on = get_post_meta( $kidsworld_get_queried_object_id, 'kidsworld_meta_sub_header_search_on', true );
						}

						if ( $kidsworld_meta_sub_header_search_on != '' && $kidsworld_meta_sub_header_search_on == 'off') {
							$kidsworld_searchbar_onoff = 'kidsworld_hide_search';
						}

						if ( $kidsworld_searchbar_onoff != 'kidsworld_hide_search') { ?>

							<div class="kidsworld_search_container right">
								<div class="kidsworld_search_box_bar">
									<span class="kidsworld_search_box_bar_icon"><i class="fa fa-search"></i></span>
									<?php get_search_form(); ?>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="kidsworld_search_bg"></div>
							<div class="clear"></div>

						<?php
						}
					}

					?>

				</div>
			</div>

		<?php } ?>

	</div>

	<div class="kidsworld_main_container kidsworld_site_content kidsworld_css_transition ">