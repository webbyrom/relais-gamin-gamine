<?php get_header(); ?>

	<div class="kidsworld_container" >
		<div class="kidsworld_column kidsworld_two_third first">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();

					$kidsworld_class_start_date 		= strtotime(rwmb_meta('swmsc_class_start_std_date'));
					$kidsworld_class_years_old			= esc_html(rwmb_meta('swmsc_class_years_old'));
					$kidsworld_class_size					= esc_html(rwmb_meta('swmsc_class_size'));
					$kidsworld_class_duration 			= esc_html(rwmb_meta('swmsc_class_duration'));
					$kidsworld_class_transportation 		= esc_html(rwmb_meta('swmsc_class_transportation'));
					$kidsworld_class_extra_field1 		= esc_html(rwmb_meta('swmsc_class_extra_field1'));
					$kidsworld_class_extra_field1_desc 	= esc_html(rwmb_meta('swmsc_class_extra_field1_desc'));
					$kidsworld_class_extra_field1_icon 	= esc_html(rwmb_meta('swmsc_class_extra_field1_icon'));
					$kidsworld_class_extra_field2 		= esc_html(rwmb_meta('swmsc_class_extra_field2'));
					$kidsworld_class_extra_field2_desc 	= esc_html(rwmb_meta('swmsc_class_extra_field2_desc'));
					$kidsworld_class_extra_field2_icon 	= esc_html(rwmb_meta('swmsc_class_extra_field2_icon'));
					$kidsworld_class_extra_field3 		= esc_html(rwmb_meta('swmsc_class_extra_field3'));
					$kidsworld_class_extra_field3_desc 	= esc_html(rwmb_meta('swmsc_class_extra_field3_desc'));
					$kidsworld_class_extra_field3_icon 	= esc_html(rwmb_meta('swmsc_class_extra_field3_icon'));
					$kidsworld_class_organizer_heading 	= esc_html(rwmb_meta('swmsc_class_organizer_heading'));
					$kidsworld_class_price 				= esc_html(rwmb_meta('swmsc_class_price'));
					$kidsworld_class_price_subtext 		= esc_html(rwmb_meta('swmsc_class_price_subtext'));
					$kidsworld_class_register_button 		= esc_html(rwmb_meta('swmsc_class_register_button'));
					$kidsworld_class_register_button_link	= esc_html(rwmb_meta('swmsc_class_register_button_link'));

					if ( kidsworld_get_option('kidsworld_class_single_featured_img_on','on') == 'on') { ?>

						<div class="kidsworld_class_single_featured_img">
							<?php echo get_the_post_thumbnail(get_the_ID(),'kidsworld-blog-featured'); ?>
						</div>
						<?php
					}

					the_content('');

				endwhile;
			endif;

			wp_reset_postdata();

			if ( kidsworld_get_option('kidsworld_class_comments_on','off') == 'on') {
				comments_template('', true);
			}

			wp_reset_postdata();
			?>

			<div class="clear"></div>
		</div>

		<div class="kidsworld_column kidsworld_one_third">

			<div class="kidsworld_class_table">
				<ul>
					<?php if ( rwmb_meta('swmsc_class_start_std_date') != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-calendar"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo esc_html__( 'Start Date', 'kids-world' ); ?></span>
								<span><?php echo date_i18n(get_option('date_format'),$kidsworld_class_start_date); ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_years_old != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-birthday-cake"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo esc_html__( 'Years Old', 'kids-world' ); ?></span>
								<span><?php echo $kidsworld_class_years_old; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_size != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-bank"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo esc_html__( 'Class Size', 'kids-world' ); ?></span>
								<span><?php echo $kidsworld_class_size; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_duration != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-clock-o"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo esc_html__( 'Class Duration', 'kids-world' ); ?></span>
								<span><?php echo $kidsworld_class_duration; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_transportation != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-bus"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo esc_html__( 'Transportation', 'kids-world' ); ?></span>
								<span><?php echo $kidsworld_class_transportation; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_extra_field1 != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-<?php echo $kidsworld_class_extra_field1_icon; ?>"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo $kidsworld_class_extra_field1; ?></span>
								<span><?php echo $kidsworld_class_extra_field1_desc; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_extra_field2 != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-<?php echo $kidsworld_class_extra_field2_icon; ?>"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo $kidsworld_class_extra_field2; ?></span>
								<span><?php echo $kidsworld_class_extra_field2_desc; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

					<?php if ( $kidsworld_class_extra_field3 != '' ) { ?>
						<li>
							<div class="kidsworld_ct_icon"><i class="fa fa-<?php echo $kidsworld_class_extra_field3_icon; ?>"></i></div>
							<div class="kidsworld_ct_text">
								<span class="kidsworld_ct_light_text"><?php echo $kidsworld_class_extra_field3; ?></span>
								<span><?php echo $kidsworld_class_extra_field3_desc; ?></span>
							</div>
							<div class="clear"></div>
						</li>
					<?php } ?>

				</ul>
			</div>

			<div class="kidsworld_class_price_button">
				<?php if ( $kidsworld_class_price != '' ) { ?>
					<span class="kidsworld_class_price_box">
						<div class="kidsworld_class_price_box_holder">
							<?php echo $kidsworld_class_price; ?> <span><?php echo $kidsworld_class_price_subtext; ?></span>
						</div>
					</span>
				<?php } ?>
				<?php if ( $kidsworld_class_register_button != '' ) { ?>
					<span class="kidsworld_class_register_btn">
						<a href="<?php echo $kidsworld_class_register_button_link; ?>"><i class="fa fa-edit"></i><?php echo $kidsworld_class_register_button; ?></a>
					</span>
				<?php } ?>
			</div>

		</div>

	</div>

<?php get_footer(); ?>