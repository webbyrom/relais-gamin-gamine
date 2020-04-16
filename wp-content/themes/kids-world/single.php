<?php get_header(); ?>

	<div class="kidsworld_container kidsworld-<?php echo esc_attr(kidsworld_page_post_layout_type()); ?> kidsworld_post_sidebar_page" >	
		<div class="kidsworld_column kidsworld_custom_two_third">
			<section>
				<div id="kidsworld-item-entries" class="kidsworld_row">				
				
					<?php				
					if (have_posts()) : 
						while (have_posts()) : the_post();	
							
							$kidsworld_get_post_format = get_post_format() ? get_post_format() : 'standard';
							$kidsworld_post_pf_icon = is_single() ? kidsworld_get_option('kidsworld_single_pf_icon_on','on') : kidsworld_get_option('kidsworld_pf_icon_on','on');
							$kidsworld_post_single_classes = array();

							$kidsworld_post_single_classes[] = 'post-entry kidsworld_blog_post';

							if ( $kidsworld_post_pf_icon == 'off') {		$kidsworld_post_single_classes[] = 'kidsworld_no_pf_icon'; 	}
							if (is_sticky()) {						$kidsworld_post_single_classes[] = 'post-sticky'; 	}

							if ( has_post_thumbnail() || $kidsworld_get_post_format == 'video' || $kidsworld_get_post_format == 'audio' ) {
								$kidsworld_post_has_thumb = '';
							} else {
								$kidsworld_post_has_thumb = 'kidsworld_pf_no_thumb';
							}		
							?>
							<article class="<?php echo implode(" ", get_post_class($kidsworld_post_single_classes)); ?>" >
								<div class="kidsworld_column_gap">
									<div class="<?php echo $kidsworld_post_has_thumb; ?>">
										<?php get_template_part('parts/posts/post-standard'); ?>
									</div>
								</div>			
								<div class="clear"></div>				
							</article>

							<?php	

						endwhile;
					endif; ?>

				</div>
			</section>	

			<div class="kidsworld_single_section">
				<?php			

				wp_reset_postdata();			
				
				$kidsworld_post_single_sections = kidsworld_sort_single_sections();

				if ( $kidsworld_post_single_sections != '' ) {

					foreach ( $kidsworld_post_single_sections as $section ) : 

						switch($section) 
						{
							case 'pagination':
					    		get_template_part( 'parts/single-pagination');
							break;

							case 'about_author':
					    		echo kidsworld_about_author();
							break;

							case 'related_posts':
					    		get_template_part( 'parts/related-posts');
							break;

							case 'comments':
					    		comments_template('', true);
							break;				

					    }

					endforeach; 

				}
				
				wp_reset_postdata();

				?>
			</div>	

				

			<div class="clear"></div>
		</div>	
	
		<?php get_sidebar(); ?>

	</div>	

<?php get_footer(); ?>