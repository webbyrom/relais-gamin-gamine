<?php get_header(); ?>

	<div class="kidsworld_container kidsworld-<?php echo esc_attr(kidsworld_page_post_layout_type()); ?> kidsworld_post_sidebar_page">
		<div class="clear"></div>
		<div class="kidsworld_column kidsworld_custom_two_third">
			<div class="kidsworld_page_container <?php echo kidsworld_get_option('kidsworld_page_content_style','page_style_box'); ?>">
		
				<?php
				if ( have_posts() ) while ( have_posts() ) : the_post();

					if ( get_the_post_thumbnail(get_the_ID(), 'full' ) != '' ) { ?>
						<!-- Featured Image -->
						<div class="kidsworld_page_featured_img">

						<?php the_post_thumbnail(get_the_ID(), 'full' ); ?>

						</div>
					<?php } ?>					

					<div class="kidsworld_page_content">

					<?php

					the_content();	

					$args = array(
						'before'           => '<div class="clear"></div><div class="kidsworld_pagination_menu">',
						'after'            => '</div>',
						'link_before'      => '<span class="wp_link_pages_custom">',
						'link_after'       => '</span>',
						'next_or_number'   => 'number',
						'nextpagelink'     => esc_html__('Next Page ', 'kids-world'),
						'previouspagelink' => esc_html__('Previous Page ', 'kids-world'),
						'pagelink'         => '%',
						'echo'             => 1
					);

					wp_link_pages( $args );	?>

					<?php			
					/* ----------------------------------------------------------------------------------
							Page Comments
					---------------------------------------------------------------------------------- */	
					
					if (kidsworld_get_option('kidsworld_page_comments_on','off') == 'on') {	
						comments_template('', true); 	
					}
					?>

					<div class="clear"></div>
					</div>

				<?php endwhile; ?>

			</div>

			<div class="clear"></div>			
			
		</div>	
		
		<?php 
		get_sidebar();  ?>
		<div class="clear"></div>	
	</div>

	<?php

get_footer(); 

?>