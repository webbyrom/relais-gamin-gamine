<?php get_header(); ?>
	<div class="kidsworld_container kidsworld-layout-full-width kidsworld_post_sidebar_page" >	
		
		<div class="kidsworld_column kidsworld_custom_two_third">
			<div class="kidsworld_page_container <?php echo kidsworld_get_option('kidsworld_page_content_style','page_style_box'); ?>">
				<div class="kidsworld_page_content">

					<?php  
						global $wp_query;
						$kidsworld_search_term = trim(get_search_query());
						$kidsworld_search_result = '';
						$kidsworld_no_search_result = '';

						if ( $kidsworld_search_term == '' ) {
							$kidsworld_search_result = '0';
							$kidsworld_no_search_result = 'kidsworld_no_search_result_title';
						} else {
							$kidsworld_search_result = $wp_query->found_posts;
						}
					?>

					<h4 class="kidsworld_search_pg_subtitle <?php echo $kidsworld_no_search_result; ?>"><?php
						echo $kidsworld_search_result . ' ' .sprintf( esc_html__( 'results for &quot;%1$s&quot;','kids-world' ), esc_html( get_search_query() ) ); ?>
					</h4>	
					
					<?php
					
					if ( $kidsworld_search_term != '' ) { ?>

						<div class="search_pg_box">

							<ul class="kidsworld_search_list">		
								<?php

								/* ----------------------------------------------------------------------------------
									Search List
								---------------------------------------------------------------------------------- */						
								
								if (have_posts()) : 
									while (have_posts()) : the_post(); ?>			
											
										<li>										
											
											<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {	 ?>
												<div class="kidsworld_search_featured_img">	
												<a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ); ?></a>									
												</div>
											<?php } ?>
											

											<div class="kidsworld_search_page_text">
												<h5><a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>"><?php esc_html(the_title()); ?></a></h5>

												<div class="kidsworld_search_meta">
										            <ul>									               
														<li><?php echo get_the_date(); ?></li>								               
														<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></li>
														<li><a href="<?php echo esc_url(get_comments_link()); ?>"><?php kidsworld_get_comments_number(); ?></a></li>
													</ul>
										        </div>

												<p>
													<?php
													ob_start();
													the_content();
													$kidsworld_old_content = ob_get_clean();
													$kidsworld_new_content = strip_tags($kidsworld_old_content);
													echo substr($kidsworld_new_content,0,300).'...';
													?>
												</p>
												<p class="kidsworld_search_page_readmore"><a href="<?php esc_url( the_permalink() ); ?>" class="kidsworld_skin_text" >Read more <i class="fa fa-angle-right"></i></a></p>
											</div>										

											<div class="clear"></div>
										</li>									

									<?php 
								endwhile; 					

								else: ?>
									<div class="kidsworld_page_box_content kidsworld_search_page_no_result_text">
										<?php 
										kidsworld_search_page_no_result_text();
										get_search_form();	?>
										</div><?php
								endif;
								wp_reset_postdata();
								?>						
							</ul>
						
						</div>
						<div class="clear"></div>					

						<?php
					} else { 	?>	
						
						<div class="search_pg_box">
						<div class="kidsworld_page_box_content kidsworld_search_page_no_result_text">
							<?php 
							kidsworld_search_page_no_result_text();
							get_search_form();	?>
						</div>
						</div>
						<?php
					}	
					?>			

					<?php 

					if ( $kidsworld_search_term != '' ) { 
						kidsworld_standard_pagination($wp_query->max_num_pages);
					}

					?>
					<?php wp_reset_postdata(); ?>			
					
					<div class="clear"></div>
				</div>
			</div>
		</div>

	</div>	<?php
 
get_footer(); 

?>