<?php
if (!function_exists('kidsworld_image_sizes')) {
	function kidsworld_image_sizes() {

		$kidsworld_featured_img_height 				= intval(kidsworld_get_option('kidsworld_featured_img_height','520' ));
		$kidsworld_featured_fullwidth_img_height 	= intval(kidsworld_get_option('kidsworld_featured_fullwidth_img_height','520' ));
		$kidsworld_layout_max_width 				= intval(kidsworld_get_option('kidsworld_layout_max_width','1180' ));

		add_image_size('kidsworld-blog-featured',900,$kidsworld_featured_img_height,true);
		add_image_size('kidsworld-blog-full',$kidsworld_layout_max_width,$kidsworld_featured_fullwidth_img_height,true);
		add_image_size('kidsworld-related-posts',500,344, true);
		add_image_size('kidsworld-recent-post-tiny',75,75, true);
		add_image_size('kidsworld-grid-image',850,999999, true);
		add_image_size('kidsworld-square-image',850,850, true);

	}
}

add_action( 'init', 'kidsworld_image_sizes' );