<?php

if ( ! function_exists('kidsworld_register_sidebars')) {
	function kidsworld_register_sidebars() {			

		register_sidebar( array(
		'name' => esc_html__('Blog Sidebar', 'kids-world'),
		'id' => 'blog-sidebar',
		'description' => 'Sidebar for blog section',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_widget_box"><div class="kidsworld_widget_content">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<div class="kidsworld_sidebar_ttl"><h3><span>',
		'after_title' => '</span><div class="kidsworld_sidebar_title_border"></div></h3><div class="clear"></div></div><div class="clear"></div>'
		));

		register_sidebar( array(
		'name' => esc_html__('Page Sidebar', 'kids-world'),
		'id' => 'page-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_widget_box"><div class="kidsworld_widget_content">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<div class="kidsworld_sidebar_ttl"><h3><span>',
		'after_title' => '</span><div class="kidsworld_sidebar_title_border"></div></h3><div class="clear"></div></div><div class="clear"></div>'
		));

		register_sidebar(array(
		'name' => esc_html__('Footer Column 1', 'kids-world'),
		'id' => 'kidsworld-footer-1',
		'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_footer_widget"><div class="kidsworld_widget_content">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3><div class="clear"></div>'
		));

		register_sidebar(array(
		'name' => esc_html__('Footer Column 2', 'kids-world'),
		'id' => 'kidsworld-footer-2',
		'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_footer_widget"><div class="kidsworld_widget_content">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3><div class="clear"></div>'
		));

		register_sidebar(array(
		'name' => esc_html__('Footer Column 3', 'kids-world'),
		'id' => 'kidsworld-footer-3',
		'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_footer_widget"><div class="kidsworld_widget_content">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3><div class="clear"></div>'
		));

		register_sidebar(array(
		'name' => esc_html__('Footer Column 4', 'kids-world'),
		'id' => 'kidsworld-footer-4',
		'description' => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_footer_widget"><div class="kidsworld_widget_content">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3><div class="clear"></div>'
		));	

		if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {

			register_sidebar( array(
			'name' => esc_html__('Shop Page Sidebar', 'kids-world'),
			'id' => 'kidsworld-shop-page-sidebar',
			'description' => 'Sidebar for shop page',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_widget_box"><div class="kidsworld_widget_content">',
			'after_widget' => '<div class="clear"></div></div></div></div>',
			'before_title' => '<div class="kidsworld_sidebar_ttl"><h3><span>',
			'after_title' => '</span><div class="kidsworld_sidebar_title_border"></div></h3><div class="clear"></div></div><div class="clear"></div>'
			));	

			register_sidebar( array(
			'name' => esc_html__('Product Single Page Sidebar', 'kids-world'),
			'id' => 'product-single-page-sidebar',
			'description' => 'Sidebar for product single (product overview) page',
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="kidsworld_widget_box"><div class="kidsworld_widget_content">',
			'after_widget' => '<div class="clear"></div></div></div></div>',
			'before_title' => '<div class="kidsworld_sidebar_ttl"><h3><span>',
			'after_title' => '</span><div class="kidsworld_sidebar_title_border"></div></h3><div class="clear"></div></div><div class="clear"></div>'
			));
		}

	}
}

 add_action( 'widgets_init', 'kidsworld_register_sidebars' );
	
?>