<?php get_header();

if (function_exists('rwmb_meta')) {
?>

	<div class="kidsworld_container" >
		<div class="kidsworld_column kidsworld_two_third first">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();

					$kidsworld_event_start_date 			= strtotime(rwmb_meta('swmsc_event_date'));
					$kidsworld_event_end_date 				= strtotime(rwmb_meta('swmsc_event_end_date'));

					$kidsworld_event_start_time 			= esc_html(rwmb_meta('swmsc_event_start_time'));
					$kidsworld_event_start_end_time 		= esc_html(rwmb_meta('swmsc_event_start_end_time'));
					$kidsworld_event_venue_name 			= esc_html(rwmb_meta('swmsc_event_venue_name'));
					$kidsworld_event_venue_address_street	= esc_html(rwmb_meta('swmsc_event_venue_address_street'));
					$kidsworld_event_venue_address_city	= esc_html(rwmb_meta('swmsc_event_venue_address_city'));
					$kidsworld_event_venue_address_zipcode = esc_html(rwmb_meta('swmsc_event_venue_address_zipcode'));
					$kidsworld_event_google_link 			= esc_html(rwmb_meta('swmsc_event_google_link'));
					$kidsworld_event_register_button 		= esc_html(rwmb_meta('swmsc_event_register_button'));
					$kidsworld_event_register_button_link	= esc_html(rwmb_meta('swmsc_event_register_button_link'));
					$kidsworld_event_organizer_heading	= esc_html(rwmb_meta('swmsc_event_organizer_heading'));
					$kidsworld_event_organizer_name 		= esc_html(rwmb_meta('swmsc_event_organizer_name'));
					$kidsworld_event_organizer_info 		= esc_html(rwmb_meta('swmsc_event_organizer_info'));
					$kidsworld_event_organizer_phone 		= esc_html(rwmb_meta('swmsc_event_organizer_phone'));
					$kidsworld_event_organizer_email 		= esc_html(rwmb_meta('swmsc_event_organizer_email'));
					$kidsworld_event_organizer_website	= esc_html(rwmb_meta('swmsc_event_organizer_website'));

					if ( kidsworld_get_option('kidsworld_event_single_featured_img_on','on') == 'on') { ?>

						<div class="kidsworld_event_single_featured_img">
							<?php echo get_the_post_thumbnail(get_the_ID(),'kidsworld-blog-featured'); ?>
						</div>
						<?php
					}

					the_content('');

				endwhile;
			endif;

			wp_reset_postdata();

			if ( kidsworld_get_option('kidsworld_event_comments_on','off') == 'on') {
				comments_template('', true);
			}

			wp_reset_postdata();
			?>

			<div class="clear"></div>
		</div>

		<div class="kidsworld_column kidsworld_one_third">

				<div class="kidsworld_event_date_time_box">
					<div class="kidsworld_event_dt_title">
						<span><?php echo esc_html__( 'Date, Time and Venue', 'kids-world' ); ?></span>
					</div>
					<div class="kidsworld_event_meta_text">
						<ul>
							<li class="kidsworld_event_meta_date"><?php

							echo date_i18n(get_option('date_format'),$kidsworld_event_start_date);

							if ( $kidsworld_event_end_date != '' && $kidsworld_event_end_date != $kidsworld_event_start_date ) {
								echo ' - '.date_i18n(get_option('date_format'),$kidsworld_event_end_date);
							}

							?></li>

							<li class="kidsworld_event_meta_time"><?php echo $kidsworld_event_start_end_time; ?></li>

							<li class="kidsworld_event_meta_venue">
								<p><strong><?php echo $kidsworld_event_venue_name; ?></strong></p>

								<?php if ( $kidsworld_event_venue_address_street != '' ) { ?>
									<p><?php echo $kidsworld_event_venue_address_street; ?>,</p>
								<?php } ?>

								<?php if ( $kidsworld_event_venue_address_street != '' ) { ?>
									<p><?php echo $kidsworld_event_venue_address_city; ?><?php if ( $kidsworld_event_venue_address_zipcode != '' ) { echo ', '.$kidsworld_event_venue_address_zipcode; } ?></p>
								<?php } ?>

							</li>

							<?php if ( $kidsworld_event_google_link != '' ) { ?>
								<li class="kidsworld_event_meta_gmap"><a href="<?php echo $kidsworld_event_google_link; ?>" target="_blank"><?php echo esc_html__( 'Google Map', 'kids-world' ); ?></a></li>
							<?php } ?>

						</ul>
					</div>
				</div> <!-- .kidsworld_event_date_time_box -->

				<?php if ( $kidsworld_event_organizer_name != '' ) { ?>
					<div class="kidsworld_event_organizer_box">
						<div class="kidsworld_event_orgbox_title">
							<span><?php echo esc_html__( 'About Organizer', 'kids-world' ); ?></span>
						</div>
						<div class="kidsworld_event_orgbox_meta_text">
							<p><strong><?php echo $kidsworld_event_organizer_name; ?></strong><?php if ( $kidsworld_event_organizer_info != '' ) { ?><br /><?php echo $kidsworld_event_organizer_info; ?><?php } ?></p>
							<ul>
								<?php if ( $kidsworld_event_organizer_phone != '' ) { ?>
									<li class="kidsworld_event_orgbox_meta_phone"><?php echo $kidsworld_event_organizer_phone; ?></li>
								<?php } ?>
								<?php if ( $kidsworld_event_organizer_email != '' ) { ?>
									<li class="kidsworld_event_orgbox_meta_email"><a href="mailto:<?php echo $kidsworld_event_organizer_email; ?>"><?php echo $kidsworld_event_organizer_email; ?></a></li>
								<?php } ?>
								<?php if ( $kidsworld_event_organizer_website != '' ) { ?>
									<li class="kidsworld_event_orgbox_meta_website"><a href="<?php echo $kidsworld_event_organizer_website; ?>" target="_blank"><?php echo $kidsworld_event_organizer_website; ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				<?php } ?>

				<?php if ( $kidsworld_event_register_button != '' ) { ?>
					<div class="kidsworld_event_register_button">
						<a href="<?php echo $kidsworld_event_register_button_link; ?>">
							<span class="kidsworld_event_rg_btn_text"><?php echo $kidsworld_event_register_button; ?></span>
							<span class="kidsworld_event_rg_btn_icon"><i class="fa fa-angle-right"></i></span>
							<div class="clear"></div>
						</a>
						<div class="clear"></div>
					</div>
				<?php } ?>

		</div>

	</div>

<?php

}

get_footer(); ?>