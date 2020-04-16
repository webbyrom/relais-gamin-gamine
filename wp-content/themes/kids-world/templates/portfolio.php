<?php
/*
Template Name: Portfolio Page
*/

get_header();

if (function_exists('rwmb_meta')) {

	/* Get portfolio page options */
	$kidsworld_pf_items_per_page	= -1;
	$kidsworld_page_id = get_the_id();
	$kidsworld_pf_display_type 					= rwmb_meta('kidsworld_portfolio_page_type');
	$kidsworld_pf_display_column				= rwmb_meta('kidsworld_pf_display_column');
	$kidsworld_pf_items_per_page				= intval(rwmb_meta('kidsworld_pf_items_pagination'));
	$kidsworld_onoff_page_title_section 		= rwmb_meta('kidsworld_onoff_page_title_section');
	$kidsworld_pf_item_title_link 				= rwmb_meta('kidsworld_pf_item_title_link');
	$kidsworld_onoff_pf_lightbox 				= rwmb_meta('kidsworld_onoff_pf_lightbox');
	$kidsworld_pf_display_excerpt				= rwmb_meta('kidsworld_pf_display_excerpt');
	$kidsworld_page_pagination_style 			= rwmb_meta('kidsworld_pf_pagination_style');
	$kidsworld_pf_items_space 					= rwmb_meta('kidsworld_pf_items_space');
	$kidsworld_portfolio_content_position		= rwmb_meta('kidsworld_portfolio_content_position');

	/* Exclude Portfolio Categories */

	$kidsworld_terms_pf_exclude_cats = rwmb_meta( 'kidsworld_exclude_pf_categories', 'type=taxonomy&taxonomy=portfolio-categories' );

	$kidsworld_pf_cats  = array();
	$kidsworld_excluce_pf_cats  = array();

	if ( $kidsworld_terms_pf_exclude_cats ) {
		foreach ( $kidsworld_terms_pf_exclude_cats as $term ){
		   $kidsworld_excluce_pf_cats[] .= sprintf( $term->term_id);
		}
	}

	$kidsworld_excluce_pf_cat_tabs = join(',', $kidsworld_excluce_pf_cats);
	?>

	<div class="kidsworld_container kidsworld-<?php echo kidsworld_page_post_layout_type(); ?> kidsworld_portfolio_page_main" >
		<div class="kidsworld_column kidsworld_custom_two_third">
			<?php
			/* display page content below class items */
			if ( $kidsworld_portfolio_content_position == 'above_items' ) :
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
			// Portfolio Navigation

			if (rwmb_meta('kidsworld_portfolio_page_type') == 'Sortable_Portfolio' ) {

				if (!$kidsworld_excluce_pf_cat_tabs) {
					$kidsworld_excluce_pf_cat_tabs = '';
				}

				$kidsworld_filter_portfolio_cats = array(
					'orderby' => 'name',
					'show_count' => 0,
					'pad_counts' => 0,
					'hierarchical' => false,
					'taxonomy' => 'portfolio-categories',
					'title_li' => '',
					'style' => 'none',
					'echo' => 0,
					'order' => 'asc',
					'exclude' => $kidsworld_excluce_pf_cat_tabs,
					'walker' => new Portfolio_Walker()
				);

				$kidsworld_sort_portfolio_cats = wp_list_categories($kidsworld_filter_portfolio_cats);
				$kidsworld_sort_portfolio_cats = str_replace('<br />', '', $kidsworld_sort_portfolio_cats);	  /* remove br tag from list */
				$kidsworld_sort_portfolio_cats = '<a href="#" class="kidsworld-active-sort" data-filter="*">'. esc_html__('View All','kids-world').'</a>'. $kidsworld_sort_portfolio_cats; /* add first default active tab */
				$kidsworld_sort_portfolio_cats = preg_replace('~>\\s+<~m', '><', $kidsworld_sort_portfolio_cats);  /* remove space between two tags */

				?>
				<div class="kidsworld_portfolio_menu kidsworld_universal_filter_items_menu">
					<?php echo $kidsworld_sort_portfolio_cats; ?>
					<div class="clear"></div>
				</div>
			<?php
			} else {
				kidsworld_display_portfolio_menu();
			}

			?><div class="clear"></div>

			<?php
			// Portfolio Posts Query

			$args = array(
				'post_type' => 'portfolio',
				'orderby'=>'date',
				'order'     => 'DESC',
				'posts_per_page' => $kidsworld_pf_items_per_page,
				'paged' => $paged,
				'type' => get_query_var('type'),
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio-categories',
						'field' => 'id',
						'terms' => $kidsworld_excluce_pf_cats,
						'operator' => 'NOT IN',
						)
				) // end of tax_query
			);

			$wp_query = new WP_Query( $args );
			?>

			<section class="kidsworld_row kidsworld_universal_grid_sort isotope kidsworld_portfolio kidsworld_universal_filter_items_section" id="kidsworld-item-entries" style="margin: 0 <?php echo $kidsworld_pf_items_space * -1; ?>px">
				<?php
					while ($wp_query->have_posts()) : $wp_query->the_post();
					$kidsworld_page_id = get_the_id();
					$terms = get_the_terms( get_the_ID(), 'portfolio-categories' );
				?>

						<article
						class="kidsworld-infinite-item-selector kidsworld_universal_grid kidsworld_column<?php echo $kidsworld_pf_display_column; ?> <?php if ( !empty( $terms ) ) { foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } }
						if ( rwmb_meta('swmsc_portfolio_title_bg') == '' ) { echo 'kidsworld_pf_no_bg'; }
						if ( !$kidsworld_onoff_page_title_section ) { echo 'kidsworld_pf_titles';  }
						?> kidsworld_portfolio_box" style="margin-bottom:<?php echo $kidsworld_pf_items_space * 2; ?>px">
							<div class="kidsworld_column_gap" style="padding: 0 <?php echo $kidsworld_pf_items_space; ?>px">

								<div class="kidsworld_portfolio_content">
									<?php kidsworld_portfolio_thumb_title(); ?>
									<div class="clear"></div>
								</div>

							</div>

						</article> <!-- kidsworld_portfolio_box -->
				<?php endwhile;
					?>

			<div class="clear"></div>

			</section> <!-- .kidsworld_portfolio -->

			<div>
			<?php
			/* portfolio pagination  */
				kidsworld_pagination($kidsworld_page_pagination_style);
				wp_reset_query();
			?>
			</div>

			<?php
			/* display page content below class items */
			if ( $kidsworld_portfolio_content_position == 'below_items' ) :
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
		<?php get_sidebar(); ?>
	</div> <!-- end .kidsworld_container -->
	<?php

}

get_footer();