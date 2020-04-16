<?php 
/*
Template Name: Archives Page
*/

get_header(); 

$kidsworld_archive_layout = kidsworld_page_post_layout_type();

?>
				
	<div class="kidsworld_container kidsworld-<?php echo kidsworld_page_post_layout_type(); ?> kidsworld_post_sidebar_page">
		<div class="clear"></div>
		<div class="kidsworld_column kidsworld_custom_two_third">
			<div class="kidsworld_page_container <?php echo kidsworld_get_option('kidsworld_page_content_style','page_style_box'); ?>">
		
				<div class="kidsworld_page_content kidsworld_archives_content">
				
					<?php
						$args = array(
							
							'order'	=> 'desc',
							'orderby'	=> 'date',
							'posts_per_page' => 30,
							'paged' => get_query_var( 'paged' )
						);
						$kidsworld_blog_query = new WP_Query($args);
					?>
					<div>
						<h3><?php esc_html_e('Last 30 Posts', 'kids-world')?></h3>
						<ul>				
							<?php					
							if (have_posts()) : while ($kidsworld_blog_query->have_posts()) : $kidsworld_blog_query->the_post(); ?>				
							
								<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">									
									<span class="kidsworld_archive_page_date"><?php echo get_the_date('M j, Y'); ?></span><span class="kidsworld_archive_page_titles"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title_attribute() ) ?>" rel="bookmark"><?php the_title() ?></a></span>									
								</li>			
							
							<?php endwhile; ?>
							<?php endif; ?>				
						</ul>				
					</div>		
					<div class="clear"></div>

					<div class="kidsworld_column kidsworld_one_half first">
						<h3><?php esc_html_e('Archives by Month', 'kids-world')?></h3>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => 'true' ) ); ?>
						</ul>

					</div>	
					<div class="kidsworld_column kidsworld_one_half">			
						<h3><?php esc_html_e('Archives by Category', 'kids-world')?></h3 >
						<ul>
							 <?php wp_list_categories('title_li=&show_count=1&hierarchical=0'); ?>
						</ul>
					</div>

					<div class="clear"></div>

				</div>		

				<div class="clear"></div>
			</div>
		</div>
		<?php 
		if ( $kidsworld_archive_layout != 'layout-full-width' ) {
			get_sidebar(); 	
		}
		 ?>
	</div>	<?php
 
get_footer();

















?>