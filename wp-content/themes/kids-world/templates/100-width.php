<?php
/*
Template Name: 100% Width Page
*/ 

get_header(); 

			if ( have_posts() ) while ( have_posts() ) : the_post();	
				$kidsworld_get_the_content = get_the_content();

				if ($kidsworld_get_the_content == '') {
					?> &nbsp; <?php
				} else {
					the_content();
				}	

				$args = array(
					'before'           => '<div class="clear"></div><div class="kidsworld_pagination_menu">' . esc_html__('Pages: ', 'kids-world'),
					'after'            => '</div>',
					'link_before'      => '<span class="wp_link_pages_custom">',
					'link_after'       => '</span>',
					'next_or_number'   => 'number',
					'nextpagelink'     => esc_html__('Next Page ', 'kids-world'),
					'previouspagelink' => esc_html__('Previous Page ', 'kids-world'),
					'pagelink'         => '%',
					'echo'             => 1
				);

				wp_link_pages( $args );				

			endwhile;				

			/* ----------------------------------------------------------------------------------
				Page Comments
			---------------------------------------------------------------------------------- */				

			if (kidsworld_get_option('kidsworld_page_comments_on','off') == 'on') {	
				comments_template('', true); 	
			}			

			?>
			<div class="clear"></div>
<?php get_footer(); ?>