<?php
/*
Template Name: Classes Page
*/

get_header();

if (function_exists('rwmb_meta')) {

	/* Get class page options */
	$kidsworld_class_items_per_page			= -1;
	$kidsworld_classes_items_pagination 	= intval(rwmb_meta('kidsworld_classes_items_pagination'));
	$kidsworld_class_display_excerpt 		= rwmb_meta('kidsworld_class_display_excerpt');
	$kidsworld_page_pagination_style 		= rwmb_meta('kidsworld_classes_pagination_style');
	$kidsworld_classes_content_position		= rwmb_meta('kidsworld_classes_content_position');

	/* Exclude Class Categories */

	$kidsworld_exclude_classes_categories = rwmb_meta( 'kidsworld_exclude_classes_categories', 'type=taxonomy&taxonomy=classes-categories' );

	$kidsworld_classes_cats  = array();
	$kidsworld_excluce_classes_cats  = array();

	if ( $kidsworld_exclude_classes_categories ) {
		foreach ( $kidsworld_exclude_classes_categories as $term ){
		   $kidsworld_excluce_classes_cats[] .= sprintf( $term->term_id);
		}
	}

	$kidsworld_excluce_classes_cat_tabs = join(',', $kidsworld_excluce_classes_cats);

	?>

	<div class="kidsworld_container kidsworld-<?php echo kidsworld_page_post_layout_type(); ?>" >
		<div class="kidsworld_column kidsworld_custom_two_third">

			<?php
			/* display page content below class items */
			if ( $kidsworld_classes_content_position == 'above_items' ) :
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
			// Classes Navigation

			if (rwmb_meta('kidsworld_onoff_classes_sortable_menu') == true ) {

				if (!$kidsworld_excluce_classes_cat_tabs) {
					$kidsworld_excluce_classes_cat_tabs = '';
				}

				$kidsworld_filter_class_cats = array(
					'orderby' => 'name',
					'show_count' => 0,
					'pad_counts' => 0,
					'hierarchical' => false,
					'taxonomy' => 'classes-categories',
					'title_li' => '',
					'style' => 'none',
					'echo' => 0,
					'order' => 'asc',
					'exclude' => $kidsworld_excluce_classes_cat_tabs,
					'walker' => new Portfolio_Walker()
				);

				$kidsworld_sort_class_cats = wp_list_categories($kidsworld_filter_class_cats);
				$kidsworld_sort_class_cats = str_replace('<br />', '', $kidsworld_sort_class_cats);	  /* remove br tag from list */
				$kidsworld_sort_class_cats = '<a href="#" class="kidsworld-active-sort" data-filter="*">'. esc_html__('View All','kids-world').'</a>'. $kidsworld_sort_class_cats; /* add first default active tab */
				$kidsworld_sort_class_cats = preg_replace('~>\\s+<~m', '><', $kidsworld_sort_class_cats);  /* remove space between two tags */

				?>
				<div class="kidsworld_portfolio_menu kidsworld_universal_filter_items_menu">
					<?php echo $kidsworld_sort_class_cats; ?>
					<div class="clear"></div>
				</div>
			<?php
			}

			?><div class="clear"></div>

			<?php
			// Classes Posts Query
			$args = array(
				'post_type' => 'classes',
				'orderby'	=> 'date',
				'order'     => 'ASC',
				'posts_per_page' => $kidsworld_classes_items_pagination,
				'paged' => $paged,
				'type' => get_query_var('type'),
				'tax_query' => array(
					array(
						'taxonomy' => 'classes-categories',
						'field' => 'id',
						'terms' => $kidsworld_excluce_classes_cats,
						'operator' => 'NOT IN',
						)
				) // end of tax_query
			);

			$wp_query = new WP_Query( $args );
			?>

			<section class="kidsworld_row kidsworld_universal_grid_sort isotope kidsworld_classes_grid kidsworld_universal_filter_items_section" id="kidsworld-item-entries">
				<?php
					while ($wp_query->have_posts()) : $wp_query->the_post();
					$kidsworld_postid = get_the_ID();
					$kidsworld_terms = get_the_terms( get_the_ID(), 'classes-categories' );
					$kidsworld_get_permalink = get_permalink( $kidsworld_postid  );
					$kidsworld_get_the_title = get_the_title( $kidsworld_postid  );

					$kidsworld_get_class_list_image = 'kidsworld-grid-image';
    				$kidsworld_class_list_image = apply_filters( 'kidsworld_class_list_image_size', $kidsworld_get_class_list_image );

					$kidsworld_classes_img = get_the_post_thumbnail($kidsworld_postid,$kidsworld_class_list_image);

					$kidsworld_class_start_date 		= strtotime(rwmb_meta('swmsc_class_start_std_date'));
					$kidsworld_class_years_old			= esc_html(rwmb_meta('swmsc_class_years_old'));
					$kidsworld_class_size				= esc_html(rwmb_meta('swmsc_class_size'));
					$kidsworld_class_duration 			= esc_html(rwmb_meta('swmsc_class_duration'));
					$kidsworld_class_price 				= esc_html(rwmb_meta('swmsc_class_price'));
					$kidsworld_class_price_subtext 		= esc_html(rwmb_meta('swmsc_class_price_subtext'));
					?>

					<article class="kidsworld-infinite-item-selector kidsworld_universal_grid kidsworld_classes_box kidsworld_column3 <?php  if ( !empty( $kidsworld_terms ) ) { foreach ($kidsworld_terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } } ?>  <?php  if ( $kidsworld_classes_img == '' ) { echo 'kidsworld-no-classes-img'; } ?>">

							<div class="kidsworld_column_gap">

								<div class="kidsworld_class_img">
									<a href="<?php echo $kidsworld_get_permalink; ?>" title="<?php echo $kidsworld_get_the_title; ?>">
										<?php echo $kidsworld_classes_img; ?>

										<?php if ( rwmb_meta('swmsc_class_start_std_date') != '' ) { ?>
											<div class="kidsworld_class_date kidsworld_js_center kidsworld_js_center_top">
												<div class="kidsworld_class_date_holder">
													<span class="kidsworld_cd_day"><?php echo date_i18n('M j',$kidsworld_class_start_date); ?></span>
													<span class="kidsworld_cd_year"><?php echo date_i18n('Y',$kidsworld_class_start_date); ?></span>
												</div>
											</div>
										<?php } else { ?>
											<div class="kidsworld_class_date kidsworld_js_center kidsworld_js_center_top kidsworld_classNoDate">
												<span class="kidsworld_classHoverIcon"><i class="fa fa-share"></i></span>
											</div>
										<?php } ?>
									</a>
								</div>

								<div class="kidsworld_class_grid_content_wrap">
									<div class="kidsworld_class_grid_content">

										<div class="kidsworld_class_title_section">

											<div class="kidsworld_class_title">

												<?php if ( $kidsworld_class_price != '' ) { ?>
													<div class="kidsworld_class_price"><?php echo $kidsworld_class_price; ?><span><?php echo $kidsworld_class_price_subtext; ?></span></div>
												<?php } ?>

												<h5><a href="<?php echo $kidsworld_get_permalink; ?>"><?php echo $kidsworld_get_the_title; ?></a></h5>

												<?php if ( $kidsworld_class_duration != '' ) { ?>
													<div class="kidsworld_class_cats">
														<i class="fa fa-clock-o"></i><?php echo $kidsworld_class_duration; ?>
													</div>
												<?php } ?>

											</div>

											<div class="clear"></div>
										</div>

										<?php if ( $kidsworld_class_display_excerpt == true ) { ?>

											<div class="kidsworld_dot_sep"></div>

											<div class="kidsworld_class_excerpt">
												<?php the_excerpt(); ?>
											</div>

										<?php } ?>

									</div>

									<div class="kidsworld_class_grid_meta">
										<ul>
											<li class="kidsworld_class_grid_meta_age"><?php echo __( 'Age:', 'kids-world' );  ?> <?php echo $kidsworld_class_years_old; ?></li>
											<li class="kidsworld_class_grid_meta_size"><?php echo __( 'Class Size:', 'kids-world' );  ?> <?php echo $kidsworld_class_size; ?></li>
											<li class="kidsworld_class_grid_meta_arrow"><a href="<?php echo $kidsworld_get_permalink; ?>"><i class="fa fa-chevron-right"></i></a></li>
										</ul>
									</div>

								</div>

							</div>

					</article> <!-- .kidsworld_classes_box -->

				<?php endwhile;
					?>

			<div class="clear"></div>

			</section>

			<div>
			<?php

			/* pagination  */
				kidsworld_pagination($kidsworld_page_pagination_style);
				wp_reset_query();
			?>
			</div>

			<?php
			/* display page content below class items */
			if ( $kidsworld_classes_content_position == 'below_items' ) :
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