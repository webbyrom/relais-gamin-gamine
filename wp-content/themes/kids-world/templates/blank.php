<?php
/*
Template Name: Blank Page
*/ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<?php 
wp_head();
?>
</head>
<body <?php body_class(); ?> id="page_body">

<?php if ( kidsworld_get_option('kidsworld_page_preloader_on','off' ) == 'on' ) { ?>
	
	<div class="kidsworld_site_loader">
		<div class="kidsworld_loader"></div>
	</div>

<?php } ?>

<div class="kidsworld_containers_holder blank_pg_wrap">
	<div class="kidsworld_site_content kidsworld_css_transition blank_pg_holder "> 
<?php
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

		?>

		<div class="clear"></div>		

	</div> <!-- .kidsworld_main_container -->

</div> <!-- .kidsworld_containers_holder -->

<?php wp_footer(); ?>
</body>
</html>