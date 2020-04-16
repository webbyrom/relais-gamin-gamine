<?php

$kidsworld_woo_page_layout = kidsworld_page_post_layout_type();

if( is_single() ) {
	$kidsworld_woo_page_layout = get_option('kidsworld_woo_product_page_layout');
	$kidsworld_woo_dynamic_sidebar = 'Product Single Page Sidebar';
} else {
	$kidsworld_woo_page_layout = get_option('kidsworld_woo_shop_page_layout');
	$kidsworld_woo_dynamic_sidebar = 'Shop Page Sidebar';
}

get_header(); ?>
	<div class="kidsworld_container kidsworld-<?php echo $kidsworld_woo_page_layout; ?>">
		<div class="kidsworld_column kidsworld_custom_two_third">
			<?php woocommerce_content(); ?>
			<div class="clear"></div>
		</div>

		<?php if ( $kidsworld_woo_page_layout != 'layout-full-width' ) { ?>

			<?php get_sidebar();  ?>

		<?php } ?>

	</div>
	<?php
get_footer();

?>