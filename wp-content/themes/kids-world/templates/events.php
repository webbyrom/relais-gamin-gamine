<?php
/*
Template Name: Events Page
*/

get_header(); 

if (function_exists('rwmb_meta')) {

	/* Get event page options */
	$kidsworld_event_items_per_page	= -1;
	$kidsworld_events_items_pagination 	= intval(rwmb_meta('kidsworld_events_items_pagination')); 
	$kidsworld_page_pagination_style 		= rwmb_meta('kidsworld_events_pagination_style');
	$kidsworld_events_content_position 		= rwmb_meta('kidsworld_events_content_position');

	
	/* Exclude Event Categories */
	$kidsworld_exclude_events_categories = rwmb_meta( 'kidsworld_exclude_events_categories', 'type=taxonomy&taxonomy=events-categories' );
	$kidsworld_events_cats  = array();
	$kidsworld_excluce_events_cats  = array();

	if ( $kidsworld_exclude_events_categories ) {	
		foreach ( $kidsworld_exclude_events_categories as $term ){
		   $kidsworld_events_cats[] .= sprintf( $term->slug);
		}
	}
	               
	foreach ( $kidsworld_events_cats  as $cat ) {                     
		$kidsworld_events_exclude_catid = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug='$cat'");
		$kidsworld_excluce_events_cats[] = $kidsworld_events_exclude_catid;
	}

	$kidsworld_excluce_events_cat_tabs = join(',', $kidsworld_excluce_events_cats);
	

	?>
	<div class="kidsworld_container kidsworld-<?php echo kidsworld_page_post_layout_type(); ?>" >
		<div class="kidsworld_column kidsworld_custom_two_third">

			<?php
			/* display page content below class items */
			if ( $kidsworld_events_content_position == 'above_items' ) :
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						<div class="raw">
							<?php the_content(''); ?> 
						</div>
						<div class="clear"></div>
						<?php
					endwhile;
				endif;
			endif; 
			?>
		
			<div class="kidsworld_horizontal_menu">
				<?php kidsworld_events_horizontal_menu(); ?>	
				<div class="clear"></div>		
			</div>

			<div class="clear"></div>

			<section class="kidsworld_row kidsworld_universal_grid_sort kidsworld_events_grid isotope" id="kidsworld-item-entries">

				<?php

				$kidsworld_current_date = date('Y-m-d');
				$kidsworld_meta_events_type = rwmb_meta('kidsworld_meta_events_type'); 

				if ( $kidsworld_meta_events_type == 'upcoming' ) {	
					$kidsworld_event_compare = '>=';
					$kidsworld_event_order = 'ASC';
				} else {
					$kidsworld_event_compare = '<=';
					$kidsworld_event_order = 'DESC';
				}

				// Events Posts Query
				$args = array(
					'post_type' => 'events',
					'posts_per_page' => $kidsworld_events_items_pagination,
					'paged' => $paged,
					'order'     => $kidsworld_event_order,
					'orderby'	=> 'meta_value',
					'meta_key' 	=> 'swmsc_event_end_date',
					'meta_query' => array(
		                array(
		                        'key' => 'swmsc_event_end_date',
		                        'value' => $kidsworld_current_date,
		                        'compare' => $kidsworld_event_compare,
		                        'type' => 'CHAR'
		                    )	                
					),
					'tax_query' => array(
						array(
							'taxonomy' => 'events-categories',
							'field' => 'id',
							'terms' => $kidsworld_excluce_events_cats,
							'operator' => 'NOT IN',
							)
					) 
				);

				$wp_query = new WP_Query( $args );			

				while ($wp_query->have_posts()) : $wp_query->the_post();

					$kidsworld_postid = get_the_ID();
					$kidsworld_terms = get_the_terms( get_the_ID(), 'events-categories' );	
					$kidsworld_get_permalink = get_permalink( $kidsworld_postid  );
					$kidsworld_get_the_title = get_the_title( $kidsworld_postid  );

					$kidsworld_get_event_list_image = 'kidsworld-grid-image';
    				$kidsworld_event_list_image = apply_filters( 'kidsworld_event_list_image_size', $kidsworld_get_event_list_image );

					$kidsworld_event_img = get_the_post_thumbnail($kidsworld_postid,$kidsworld_event_list_image);

					$kidsworld_event_start_date 			= strtotime(rwmb_meta('swmsc_event_date'));

					$kidsworld_event_start_time 			= esc_html(rwmb_meta('swmsc_event_start_time'));
					$kidsworld_event_venue_name 			= esc_html(rwmb_meta('swmsc_event_venue_name'));
					$kidsworld_event_venue_address_street	= esc_html(rwmb_meta('swmsc_event_venue_address_street'));
					$kidsworld_event_venue_address_city	= esc_html(rwmb_meta('swmsc_event_venue_address_city'));									
					?>

					<article class="kidsworld-infinite-item-selector kidsworld_universal_grid kidsworld_events_box kidsworld_column3 <?php  if ( !empty( $kidsworld_terms ) ) { foreach ($kidsworld_terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } } ?> kidsworld_events_isotope ">

							<div class="kidsworld_column_gap">
								
								<div class="kidsworld_event_img">
									<a href="<?php echo $kidsworld_get_permalink; ?>">
										<?php echo $kidsworld_event_img; ?>	
										<div class="kidsworld_event_arrow kidsworld_js_center kidsworld_js_center_top">
											<div class="kidsworld_event_arrow_holder">
												<span><i class="fa fa-mail-forward"></i></span>
											</div>						
										</div>
									</a>
								</div>

								<div class="kidsworld_event_grid_content_wrap">
									<div class="kidsworld_event_grid_content">

										<div class="kidsworld_event_meta">
											<span class="kidsworld_event_date"><i class="fa fa-calendar"></i><?php echo date_i18n(get_option('date_format'),$kidsworld_event_start_date); ?></span>
											<span class="kidsworld_event_time"><i class="fa fa-clock-o"></i><?php echo $kidsworld_event_start_time; ?></span>
											<div class="clear"></div>
										</div>				
										
										<div class="kidsworld_event_title">
											<h5><a href="<?php echo $kidsworld_get_permalink; ?>"><?php echo $kidsworld_get_the_title; ?></a></h5>
										</div>	
										
										<div class="kidsworld_event_excerpt">
											<?php the_excerpt(); ?>
										</div>

									</div>

									<?php if ( $kidsworld_event_venue_address_street != '' ) { ?>
										<div class="kidsworld_event_grid_meta">
											<span><i class="fa fa-map-marker"></i><?php 

												echo $kidsworld_event_venue_address_street;
												
												if ( $kidsworld_event_venue_address_city != '' ) {
													echo ', ' . $kidsworld_event_venue_address_city.'.';
												} 
											?></span>
										</div>
									<?php } ?>
									
								</div>			

							</div>
						
					</article> <!-- .kidsworld_events_box --> <?php

				endwhile; 

			?>

			<div class="clear"></div>

			</section> 

				<?php
			/* pagination  */				
				kidsworld_pagination($kidsworld_page_pagination_style); 
				wp_reset_query();
				?>
		
			<?php
			/* display page content below class items */
			if ( $kidsworld_events_content_position == 'below_items' ) :
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						<div class="raw">
							<?php the_content(''); ?> 
						</div>
						<div class="clear"></div>
						<?php
					endwhile;
				endif;
			endif; 
			?>
			
			<div class="clear"></div>

		</div>	
		<?php get_sidebar(); 	?>
	</div> <!-- end .kidsworld_container -->
	<?php

}

get_footer();