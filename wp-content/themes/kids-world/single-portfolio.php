<?php 

get_header(); ?>
				
	<div class="kidsworld_container kidsworld-<?php echo kidsworld_page_post_layout_type(); ?>" >	
			<div class="kidsworld_column kidsworld_custom_two_third">			

				<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
						?>
						<div class="raw">
							<?php
								the_content('');
							?>
						</div>
						<?php
					endwhile;					
				endif;
				?>

				<div class="clear"></div>

				<?php
					if (kidsworld_get_option('kidsworld_portfolio_comments_on','off') == 'on') {						
						comments_template('', true);						
					}
				?>
			
				<div class="clear"></div>
			</div>			
		
		<?php get_sidebar(); ?>

	</div>	<?php
 
get_footer();