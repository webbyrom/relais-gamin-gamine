<?php 
get_header(); 

$kidsworld_blog_page_layout = kidsworld_get_option( 'kidsworld_blog_page_layout', 'layout-sidebar-right' );

?>				
	<div class="kidsworld_container kidsworld-<?php echo esc_attr($kidsworld_blog_page_layout); ?> kidsworld_post_sidebar_page" >	
		<div class="kidsworld_column kidsworld_custom_two_third">			
			<?php get_template_part('loop', 'post'); ?>
			<div class="clear"></div>
		</div>		
	
	<?php get_sidebar(); 	?>

	</div>	<?php
 
get_footer(); 

?>