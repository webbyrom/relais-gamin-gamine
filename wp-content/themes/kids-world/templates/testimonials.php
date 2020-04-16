<?php
/*
Template Name: Testimonials Page
*/

get_header(); 

if (function_exists('rwmb_meta')) {

	/* Get testimonials page options */
	$kidsworld_testimonials_items_per_page	= -1;
	$kidsworld_testimonials_items_pagination 	= intval(rwmb_meta('kidsworld_testimonials_items_pagination')); 
	$kidsworld_testimonials_display_column 	= intval(rwmb_meta('kidsworld_testimonials_display_column')); 
	$kidsworld_onoff_testimonials_quote_icon 	= rwmb_meta('kidsworld_onoff_testimonials_quote_icon'); 
	$kidsworld_onoff_testimonials_client_image = rwmb_meta('kidsworld_onoff_testimonials_client_image');
	$kidsworld_onoff_testimonials_colorbox 	= rwmb_meta('kidsworld_onoff_testimonials_colorbox');
	$kidsworld_page_pagination_style 			= rwmb_meta('kidsworld_testimonials_pagination_style');
	$kidsworld_testimonials_content_position 			= rwmb_meta('kidsworld_testimonials_content_position');

	 

	/* Exclude Testimonials Categories */

	$kidsworld_exclude_testimonials_categories = rwmb_meta( 'kidsworld_exclude_testimonials_categories', 'type=taxonomy&taxonomy=testimonials-categories' );

	$kidsworld_testimonials_cats  = array();
	$kidsworld_excluce_testimonials_cats  = array();

	if ( $kidsworld_exclude_testimonials_categories ) {	
		foreach ( $kidsworld_exclude_testimonials_categories as $term ){
		   $kidsworld_excluce_testimonials_cats[] .= sprintf( $term->term_id);
		}
	}

	$kidsworld_excluce_testimonials_cat_tabs = join(',', $kidsworld_excluce_testimonials_cats);
	?>

	<div class="kidsworld_container kidsworld-<?php echo kidsworld_page_post_layout_type(); ?>" >
		<div class="kidsworld_column kidsworld_custom_two_third">	

			<?php
			/* display page content below class items */
			if ( $kidsworld_testimonials_content_position == 'above_items' ) :
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

			<?php
			// Testimonials Navigation
			
			if (rwmb_meta('kidsworld_onoff_testimonials_sortable_menu') == true ) {

				if (!$kidsworld_excluce_testimonials_cat_tabs) {
					$kidsworld_excluce_testimonials_cat_tabs = '';
				}	

				$kidsworld_filter_testimonials_cats = array(
					'orderby' => 'name',
					'show_count' => 0,
					'pad_counts' => 0,
					'hierarchical' => false,
					'taxonomy' => 'testimonials-categories',
					'title_li' => '',
					'style' => 'none',
					'echo' => 0,
					'order' => 'asc', 
					'exclude' => $kidsworld_excluce_testimonials_cat_tabs,
					'walker' => new Portfolio_Walker()
				);

				$kidsworld_testimonials_cats = wp_list_categories($kidsworld_filter_testimonials_cats);
				$kidsworld_testimonials_cats = str_replace('<br />', '', $kidsworld_testimonials_cats);	  /* remove br tag from list */
				$kidsworld_testimonials_cats = '<a href="#" class="kidsworld-active-sort" data-filter="*">'. esc_html__('View All','kids-world').'</a>'. $kidsworld_testimonials_cats; /* add first default active tab */
				$kidsworld_testimonials_cats = preg_replace('~>\\s+<~m', '><', $kidsworld_testimonials_cats);  /* remove space between two tags */

				?>			
				<div class="kidsworld_portfolio_menu kidsworld_universal_filter_items_menu">
					<?php echo $kidsworld_testimonials_cats; ?>
					<div class="clear"></div>
				</div>
			<?php
			}

			?><div class="clear"></div>

			<?php
			// Testimonials Posts Query
			$args = array(
				'post_type' => 'testimonials',
				'orderby'	=> 'date',
				'order'     => 'DESC',
				'posts_per_page' => $kidsworld_testimonials_items_pagination,
				'paged' => $paged,
				'type' => get_query_var('type'),
				'tax_query' => array(
					array(
						'taxonomy' => 'testimonials-categories',
						'field' => 'id',
						'terms' => $kidsworld_excluce_testimonials_cats,
						'operator' => 'NOT IN',
						)
				) // end of tax_query
			);

			$wp_query = new WP_Query( $args );			
			?>

			<section class="kidsworld_row kidsworld_universal_grid_sort isotope kidsworld_testimonials kidsworld_universal_filter_items_section" id="kidsworld-item-entries">

				<?php
					while ($wp_query->have_posts()) : $wp_query->the_post(); 
					$kidsworld_postid = get_the_ID();
					$kidsworld_terms = get_the_terms( get_the_ID(), 'testimonials-categories' );	

					$kidsworld_get_testimonials_list_image = 'kidsworld-grid-image';
    				$kidsworld_testimonials_list_image = apply_filters( 'kidsworld_testimonials_list_image_size', $kidsworld_get_testimonials_list_image );

					$kidsworld_testimonials_img = get_the_post_thumbnail($kidsworld_postid,$kidsworld_testimonials_list_image);

					$kidsworld_colorboxoff = '';
					$kidsworld_featured_image = wp_get_attachment_url(get_post_thumbnail_id($kidsworld_postid));
					$kidsworld_client_details = get_post_meta($kidsworld_postid, 'swmsc_client_details', TRUE);
					$kidsworld_testimonials_p_bg_col = get_post_meta($kidsworld_postid, 'swmsc_testimonials_p_bg_col', TRUE); 
					$kidsworld_testimonials_p_text_col = get_post_meta($kidsworld_postid, 'swmsc_testimonials_p_text_col', TRUE);

					if ( $kidsworld_onoff_testimonials_colorbox ) {
						$kidsworld_testimonials_p_bg_col = '';
						$kidsworld_testimonials_p_text_col = '';
						$kidsworld_colorboxoff = 'kidsworld_testimonials_colorboxoff';
					}
					
				?>

					<article class="kidsworld-infinite-item-selector kidsworld_universal_grid kidsworld_testimonials_block kidsworld_column<?php echo $kidsworld_testimonials_display_column; ?> <?php echo $kidsworld_colorboxoff; ?> <?php  if ( !empty( $kidsworld_terms ) ) { foreach ($kidsworld_terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } } ?> ">		

							<div class="kidsworld_column_gap">

								<div class="kidsworld_testimonials_box">
									<div class="kidsworld_testimonials_top">

										<?php if ( $kidsworld_featured_image && $kidsworld_onoff_testimonials_client_image ) {
											echo get_the_post_thumbnail($kidsworld_postid, 'kidsworld-recent-post-tiny');
										} ?>

					 					<div class="kidsworld_testimonials_title">
											<h5 style="color:<?php echo $kidsworld_testimonials_p_bg_col; ?>; "><?php echo get_the_title(); ?></h5>

											<?php if ($kidsworld_client_details) { ?>
												<span><?php echo $kidsworld_client_details; ?></span>
											<?php } ?>
					 					</div>

										<?php if ( $kidsworld_onoff_testimonials_quote_icon ) { ?>
											<span class="kidsworld_testimonials_quote" style="color:<?php echo $kidsworld_testimonials_p_bg_col; ?>; "><i class="fa fa-quote-left"></i></span>
										<?php } ?>

			 							<div class="clear"></div>
					 				</div>
					 				<div class="kidsworld_testimonials_bottom" style="background:<?php echo $kidsworld_testimonials_p_bg_col; ?>; color:<?php echo $kidsworld_testimonials_p_text_col; ?> ">
					 					<span class="kidsworld_testimonials_arrow" style="color:<?php echo $kidsworld_testimonials_p_bg_col; ?>; "><i class="fa fa-sort-asc"></i></span>
					 					<p><?php echo get_the_content(); ?></p>
					 					<div class="clear"></div>
					 				</div>
					 				<div class="clear"></div>
					 			</div>

					 			<div class="clear"></div>
					 		</div>
						
					</article> <!-- .kidsworld_testimonials_box -->

				<?php endwhile; 
					?>

			<div class="clear"></div>

			</section> <!-- .kidsworld_testimonials_grid -->	
			
			<div>
			<?php

			/* pagination  */				
				kidsworld_pagination($kidsworld_page_pagination_style); 
				wp_reset_query();
			?>
			</div>

			<?php
			/* display page content below class items */
			if ( $kidsworld_testimonials_content_position == 'below_items' ) :
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