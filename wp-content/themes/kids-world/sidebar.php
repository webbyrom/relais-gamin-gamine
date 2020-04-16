<?php
$kidsworld_page_post_layout_type = kidsworld_page_post_layout_type();

if ( $kidsworld_page_post_layout_type == 'layout-full-width' ) return; 
$kidsworld_post_type = get_post_type();
?>	
<aside class="kidsworld_column sidebar kidsworld_css_transition" id="sidebar">		
	<?php

		$kidsworld_blog_sidebar = 'blog-sidebar';
		$kidsworld_archive_pages_sidebar = kidsworld_get_option('kidsworld_archives_sidebar',$kidsworld_blog_sidebar);
		$kidsworld_shop_sidebar = 'kidsworld-shop-page-sidebar';

		if ( is_archive() && is_active_sidebar($kidsworld_archive_pages_sidebar) ){			

			if ( KIDSWORLD_WOOCOMMERCE_IS_ACTIVE ) {
				if ( is_shop() || is_product_category() || is_product_tag() ) {
					if (is_active_sidebar($kidsworld_shop_sidebar) ){
						dynamic_sidebar($kidsworld_shop_sidebar);
					}
				} else {
					dynamic_sidebar($kidsworld_archive_pages_sidebar);
				}
			} else {
				dynamic_sidebar($kidsworld_archive_pages_sidebar);
			}		

		} else {
			swmsc_generated_dynamic_sidebar();
		}
	?>		
	<div class="clear"></div>

</aside>