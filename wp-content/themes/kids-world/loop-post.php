<?php 
$kidsworld_post_type = kidsworld_get_option('kidsworld_blog_post_style','kidsworld_post_default');
$kidsworld_blog_grid_section = '';

if ( $kidsworld_post_type == 'kidsworld_post_masonry' ) {
	$kidsworld_blog_grid_section = 'kidsworld_blog_grid_sort isotope kidsworld_blog_grid_section';				
}

?>

<div class="kidsworld_posts_list">
	<div id="kidsworld-item-entries" class="<?php echo $kidsworld_blog_grid_section; ?> kidsworld_row ">
		<?php

			while ( have_posts() ) : the_post();
			
				$kidsworld_get_post_format = get_post_format() ? get_post_format() : 'standard';
				$kidsworld_post_pf_icon 	 = is_single() ? kidsworld_get_option('kidsworld_single_pf_icon_on','on') : kidsworld_get_option('kidsworld_pf_icon_on','on');
				$kidsworld_post_classes 	 = array();
				$kidsworld_blog_post_style = kidsworld_get_option('kidsworld_blog_post_style','kidsworld_post_default');
				$kidsworld_post_classes[]  = 'post-entry kidsworld_blog_post kidsworld-infinite-item-selector';

				if ( $kidsworld_blog_post_style == 'kidsworld_post_masonry' ) {
					$kidsworld_post_classes[] = 'kidsworld_blog_grid kidsworld_blog_grid_isotope isotope-item kidsworld_column3';
				}

				if ( $kidsworld_post_pf_icon == 'off') {		$kidsworld_post_classes[] = 'kidsworld_no_pf_icon'; 	}
				if (is_sticky()) {						$kidsworld_post_classes[] = 'post-sticky'; 	}

				if ( has_post_thumbnail() || $kidsworld_get_post_format == 'video' || $kidsworld_get_post_format == 'audio' ) {
					$kidsworld_post_has_thumb = '';
				} else {
					$kidsworld_post_has_thumb = 'kidsworld_pf_no_thumb';
				}

				if (function_exists('rwmb_meta')) {								
					$kidsworld_meta_only_quote_text = rwmb_meta('kidsworld_meta_only_quote_text');
					$kidsworld_post_classes[] = 'pf_'.rwmb_meta('kidsworld_meta_gallery');

					if ( !empty($kidsworld_meta_only_quote_text) && $kidsworld_meta_only_quote_text == 'on' ) {
						$kidsworld_post_classes[] = 'kidsworld_only_quote_text';
					}
				}

				?>

				<article class="<?php echo implode(" ", get_post_class($kidsworld_post_classes)); ?>" >
					<div class="kidsworld_column_gap">
						<div class="kidsworld_post_inner_bg <?php echo $kidsworld_post_has_thumb; ?>">
							<?php 
							if ( $kidsworld_blog_post_style == 'kidsworld_post_masonry' ) {
								get_template_part('parts/posts/post-grid');
							} else {
								get_template_part('parts/posts/post-standard');
							}
							?>
						</div>
					</div>
					<div class="clear"></div>
				</article>

			<?php endwhile; ?>
	
		<div class="clear"></div>
	</div>
	<div class="clear"></div>

	<?php echo kidsworld_blog_pagination(); ?>
	<?php wp_reset_postdata(); ?>

</div>