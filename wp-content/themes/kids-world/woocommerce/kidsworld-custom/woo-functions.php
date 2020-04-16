<?php

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

//sort featured products
add_action('woocommerce_before_shop_loop', 'kidsworld_woocommerce_catalog_ordering', 30);
if(!function_exists('kidsworld_woocommerce_catalog_ordering')) {
	function kidsworld_woocommerce_catalog_ordering() {

		parse_str($_SERVER['QUERY_STRING'], $params);

		$kidsworld_products_per_page = (get_option('kidsworld_show_product_per_page') <> '') ? esc_attr(get_option('kidsworld_show_product_per_page')) : 12;

		$product_order['default'] 		= esc_html__("Default Order",'kids-world');
		$product_order['name'] 			= esc_html__("Name",'kids-world');
		$product_order['price'] 		= esc_html__("Price",'kids-world');
		$product_order['date'] 			= esc_html__("Date",'kids-world');
		$product_order['rating'] 		= esc_html__("Rating",'kids-world');
		$product_order['popularity'] 	= esc_html__("Popularity",'kids-world');
		$product_sort['asc'] 			= esc_html__("Sort Ascending",  'kids-world');
		$product_sort['desc'] 			= esc_html__("Sort Descending",  'kids-world');
		$kidsworld_p_items_per_page 			= esc_html__("Products",'kids-world');

		$kidsworld_pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
		$kidsworld_po = !empty($params['product_order'])  ? $params['product_order'] : 'asc';
		$kidsworld_pc = !empty($params['product_count']) ? $params['product_count'] : $kidsworld_products_per_page;
		$kidsworld_total_woo_products = count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) );

		$kidsworld_woo_sort_by_default_menu_onoff = get_option('kidsworld_woo_sort_by_default_menu_onoff');
		$kidsworld_woo_show_number_of_product_menu_onoff = get_option('kidsworld_woo_show_number_of_product_menu_onoff');

		if ( $kidsworld_woo_sort_by_default_menu_onoff != 'yes' || $kidsworld_woo_show_number_of_product_menu_onoff != 'yes' ) {

			$output = '';
			$output .= '<div class="kidsworld-woo-sort-order">';

			if ( $kidsworld_woo_sort_by_default_menu_onoff != 'yes' ) {

					$output .= '<div class="left">
								<ul class="sortBy kidsworld-sort-menu">
									<li>
									<span class="current-select">'.esc_html__('Sort by','kids-world').' '.ucfirst($kidsworld_pob).' </span>
									<ul>
									<li '.kidsworld_woo_current_class($kidsworld_pob, 'default').'><a href="'.kidsworld_woo_url_parameter($params, 'product_orderby', 'default').'">'.$product_order['default'].'</a></li>
									<li '.kidsworld_woo_current_class($kidsworld_pob, 'name').'><a href="'.kidsworld_woo_url_parameter($params, 'product_orderby', 'name').'">'.$product_order['name'].'</a></li>
									<li '.kidsworld_woo_current_class($kidsworld_pob, 'price').'><a href="'.kidsworld_woo_url_parameter($params, 'product_orderby', 'price').'">'.$product_order['price'].'</a></li>
									<li '.kidsworld_woo_current_class($kidsworld_pob, 'date').'><a href="'.kidsworld_woo_url_parameter($params, 'product_orderby', 'date').'">'.$product_order['date'].'</a></li>
									<li '.kidsworld_woo_current_class($kidsworld_pob, 'popularity').'><a href="'.kidsworld_woo_url_parameter($params, 'product_orderby', 'popularity').'">'.$product_order['popularity'].'</a></li>
									<li '.kidsworld_woo_current_class($kidsworld_pob, 'rating').'><a href="'.kidsworld_woo_url_parameter($params, 'product_orderby', 'rating').'">'.$product_order['rating'].'</a></li>
									</ul>
									</li>
								</ul>
								<ul class="ascDesc">';
					if($kidsworld_po == 'desc') {
						$output .= 			'<li class="desc"><a class="tipUp" title="'.$product_sort['asc'].'" href="'.kidsworld_woo_url_parameter($params, 'product_order', 'asc').'"><i class="fa fa-arrow-up"></i></a></li>';
					}
					if($kidsworld_po == 'asc') {
						$output .= 			'<li class="asc"><a class="tipUp" title="'.$product_sort['desc'].'" href="'.kidsworld_woo_url_parameter($params, 'product_order', 'desc').'"><i class="fa fa-arrow-down"></i></a></li>';
					}
					$output .= 			'</ul><div class="clear"></div>
									</div>';

			}

			if ( $kidsworld_woo_show_number_of_product_menu_onoff != 'yes' ) {
				if ( $kidsworld_total_woo_products > $kidsworld_products_per_page ) {

					$output .=	'<ul class="sort-count kidsworld-sort-menu">
									<li>
										<span class="current-select">'.esc_html__('Show','kids-world').' '.$kidsworld_pc.' '.$kidsworld_p_items_per_page.'</span>
										<ul>
											<li '.kidsworld_woo_current_class($kidsworld_pc, $kidsworld_products_per_page).'><a href="'.kidsworld_woo_url_parameter($params, 'product_count', $kidsworld_products_per_page).'">'.$kidsworld_products_per_page.' '.$kidsworld_p_items_per_page.'</a></li>
											<li '.kidsworld_woo_current_class($kidsworld_pc, $kidsworld_products_per_page*2).'><a href="'.kidsworld_woo_url_parameter($params, 'product_count', $kidsworld_products_per_page * 2).'">'.($kidsworld_products_per_page * 2).' '.$kidsworld_p_items_per_page.'</a></li>
											<li '.kidsworld_woo_current_class($kidsworld_pc, $kidsworld_products_per_page*3).'><a href="'.kidsworld_woo_url_parameter($params, 'product_count', $kidsworld_products_per_page * 3).'">'.($kidsworld_products_per_page * 3).' '.$kidsworld_p_items_per_page.'</a></li>
										</ul>
									</li>
								</ul>';
				}
			}

			$output .= '<div class="clear"></div></div>';

			echo $output;

		}

	}
}

//Set active class for list item
if(!function_exists('kidsworld_woo_current_class')) {
	function kidsworld_woo_current_class($key1, $key2) {
		if($key1 == $key2) {return "class='current'";}
		else { return " "; }
	}
}

//create url as per query
if(!function_exists('kidsworld_woo_url_parameter')) {
	function kidsworld_woo_url_parameter($params = array(), $overwrite_key, $overwrite_value)	{
		$params[$overwrite_key] = $overwrite_value;
		$paged = (array_key_exists('product_count', $params)) ? 'paged=1&' : '';
		return "?" . $paged . http_build_query($params);
	}
}

// catalog order
add_action('woocommerce_get_catalog_ordering_args', 'kidsworld_woocommerce_get_catalog_ordering_args', 20);
if(!function_exists('kidsworld_woocommerce_get_catalog_ordering_args')) {
	function kidsworld_woocommerce_get_catalog_ordering_args($args) {
		parse_str($_SERVER['QUERY_STRING'], $params);

		$pob = !empty($params['product_orderby']) ? $params['product_orderby'] : 'default';
		$po = !empty($params['product_order'])  ? $params['product_order'] : 'asc';

		switch($pob) {
			case 'date':
				$orderby = 'date';
				$order = 'desc';
				$meta_key = '';
			break;
			case 'price':
				$orderby = 'meta_value_num';
				$order = 'asc';
				$meta_key = '_price';
			break;
			case 'popularity':
				$orderby = 'meta_value_num';
				$order = 'desc';
				$meta_key = 'total_sales';
			break;
			case 'title':
				$orderby = 'title';
				$order = 'asc';
				$meta_key = '';
			break;
			case 'rating':
				$orderby = 'rating';
				$order = 'desc';
				$meta_key = '';
			break;
			case 'default':
			default:
				$orderby = 'menu_order title';
				$order = 'asc';
				$meta_key = '';
			break;
		}

		switch($po) {
			case 'desc':
				$order = 'desc';
			break;
			case 'asc':
				$order = 'asc';
			break;
			default:
				$order = 'asc';
			break;
		}

		$args['orderby'] = $orderby;
		$args['order'] = $order;
		$args['meta_key'] = $meta_key;

		return $args;
	}
}

// set products per page
add_filter('loop_shop_per_page', 'kidsworld_loop_shop_per_page');
if(!function_exists('kidsworld_loop_shop_per_page')) {
	function kidsworld_loop_shop_per_page() {
		parse_str($_SERVER['QUERY_STRING'], $params);
		$per_page = (get_option('kidsworld_show_product_per_page') <> '') ? esc_attr(get_option('kidsworld_show_product_per_page')) : 12;
		$products_per_page = !empty($params['product_count']) ? $params['product_count'] : $per_page;
		return $products_per_page;
	}
}

//featured image
add_action('woocommerce_before_shop_loop_item_title', 'kidsworld_woocommerce_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
if(!function_exists('kidsworld_woocommerce_thumbnail')) {
	function kidsworld_woocommerce_thumbnail() {
		global $product, $woocommerce;

		$rating = wc_get_rating_html( $product->get_average_rating() );
		$items_in_cart = array();

		if($woocommerce->cart->get_cart() && is_array($woocommerce->cart->get_cart())) {
			foreach($woocommerce->cart->get_cart() as $cart) {
				$items_in_cart[] = $cart['product_id'];
			}
		}

		$id = kidsworld_get_id();
		$in_cart = in_array($id, $items_in_cart);
		$kidsworld_get_product_image_size = 'kidsworld-grid-image';
    	$size = apply_filters( 'kidsworld_product_image_size', $kidsworld_get_product_image_size );

		$gallery = get_post_meta($id, '_product_image_gallery', true);
		$attachment_image = '';
		if(!empty($gallery)) {
			$gallery = explode(',', $gallery);
			$first_image_id = $gallery[0];
			$attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image'));
		}
		$thumb_image = get_the_post_thumbnail($id , $size);

		if($attachment_image) {
			$classes = 'crossfade-images';
		} else {
			$classes = 'standard-featured-image';
		}

		echo '<div class="'.$classes.'">';
		echo $attachment_image;
		echo $thumb_image;

		if($in_cart) {
			echo '<span class="cart-loading"><i class="fa fa-check"></i></span>';
		} else {
			echo '<span class="cart-loading"><i class="fa fa-spinner"></i></span>';
		}
		echo '</div>';
	}
}

// Remove Lightbox options from WooCommerce plugin pages
add_filter('woocommerce_general_settings','kidsworld_woocommerce_general_settings_filter');
add_filter('woocommerce_page_settings','kidsworld_woocommerce_general_settings_filter');
add_filter('woocommerce_catalog_settings','kidsworld_woocommerce_general_settings_filter');
add_filter('woocommerce_inventory_settings','kidsworld_woocommerce_general_settings_filter');
add_filter('woocommerce_shipping_settings','kidsworld_woocommerce_general_settings_filter');
add_filter('woocommerce_tax_settings','kidsworld_woocommerce_general_settings_filter');

if(!function_exists('kidsworld_woocommerce_general_settings_filter')) {
	function kidsworld_woocommerce_general_settings_filter($options) {
		$remove   = array('woocommerce_enable_lightbox', 'woocommerce_frontend_css');

		foreach ($options as $key => $option) {
			if( isset($option['id']) && in_array($option['id'], $remove) ) {
				unset($options[$key]);
			}
		}

		return $options;
	}
}

//Breadcrumbs
if(!function_exists('kidsworld_woocommerce_breadcrumbs')) {
	function kidsworld_woocommerce_breadcrumbs() {
	    return array(
	            'delimiter'   => '<span class="breadcrumb_seperator">/</span>',
	            'wrap_before' => '<nav class="kidsworld_woo_breadcrumbs" itemprop="breadcrumb">',
	            'wrap_after'  => '</nav>',
	            'before'      => '<span>',
	            'after'       => '</span>',
	            'show_posts_page' => true,
	            'home'        => _x( 'Home', 'breadcrumb', 'kids-world' ),
	        );
	}
}
add_filter( 'woocommerce_breadcrumb_defaults', 'kidsworld_woocommerce_breadcrumbs' );

//related products column and numbers
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'kidsworld_woocommerce_output_related_products', 20);

if(!function_exists('kidsworld_woocommerce_output_related_products')) {
	function kidsworld_woocommerce_output_related_products() {

		$output = "";

		$kidsworld_woo_related_p_column = (get_option('kidsworld_woo_related_p_column') <> '') ? esc_attr(get_option('kidsworld_woo_related_p_column')) : 4;
		$kidsworld_woo_related_p_nos = (get_option('kidsworld_woo_related_p_nos') <> '') ? esc_attr(get_option('kidsworld_woo_related_p_nos')) : 12;

		$atts = array(
			'posts_per_page' => $kidsworld_woo_related_p_nos,
			'columns' 	     => $kidsworld_woo_related_p_column,
			'orderby'        => 'rand',
		);

		ob_start();
		woocommerce_related_products($atts); // no. of products, no. of columns
		$content = ob_get_clean();
		if($content) {
			$output .= "<div class='product_column shop-column-".$kidsworld_woo_related_p_column."'>";
			$output .= $content;
			$output .= "</div>";
		}

		echo $output;

	}
}

// Shop page pagination
remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
if(!function_exists('woocommerce_pagination')) {
	function woocommerce_pagination() {

		global $wp_query;
		$output = '';
	   	$prevPage = esc_html__( 'Prev', 'kids-world' );
		$nextPage = esc_html__( 'Next', 'kids-world' );

		$output .= '<div class="kidsworld_pagination_wrap">
						<nav class="kidsworld_pagination">';

		$output .= paginate_links( apply_filters( 'woocommerce_pagination_args', array(
					'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
					'format' 		=> '',
					'current' 		=> max( 1, get_query_var('paged') ),
					'total' 		=> $wp_query->max_num_pages,
					'prev_text' 	=> "<i class='fa fa-angle-left'></i>",
					'next_text' 	=> "<i class='fa fa-angle-right'></i>",
					'type'			=> 'plain',
					"add_args" 		=> false,
					'end_size'		=> 3,
					'mid_size'		=> 3
				) ) );

		$output .= '	</nav>
					</div>';

		echo $output;
	}
}
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

//gallery thumbnail count
add_filter ( 'woocommerce_product_thumbnails_columns', 'kidsworld_woo_product_thumbnails_columns' );
if(!function_exists('kidsworld_woo_product_thumbnails_columns')) {
	function kidsworld_woo_product_thumbnails_columns() {
	 	$single_page_gallery_thumbnails = (get_option('kidsworld_woo_single_page_gallery_thumbnails') <> '') ? esc_attr(get_option('kidsworld_woo_single_page_gallery_thumbnails')) : 5;
	     return $single_page_gallery_thumbnails;
	}
}

// gallery thumbnail columns
//add_filter( 'woocommerce_single_product_image_thumbnail_html', 'kidsworld_woocommerce_single_product_image_thumbnail_html', 15, 4 );
if(!function_exists('kidsworld_woocommerce_single_product_image_thumbnail_html')) {
	function kidsworld_woocommerce_single_product_image_thumbnail_html( $html, $attachment_id ) {
	    $single_page_gallery_thumbnails = (get_option('kidsworld_woo_single_page_gallery_thumbnails') <> '') ? esc_attr(get_option('kidsworld_woo_single_page_gallery_thumbnails')) : 5;
	    $newclass = 'class="t-col-'.$single_page_gallery_thumbnails.' ';
	    $watermarked = str_replace( 'class="', $newclass, $html );
	    return $watermarked;
	}
}

// product single page bredcrumbs and next previous links

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
add_action('woocommerce_single_product_summary', 'kidsworld_woocommerce_single_product_summary',5);
if ( ! function_exists( 'kidsworld_woocommerce_single_product_summary' ) ) {
	function kidsworld_woocommerce_single_product_summary() {

	    $kidsworld_woo_next_prev_links_options = get_option('kidsworld_woo_next_prev_links_options');

		if ( $kidsworld_woo_next_prev_links_options == 'yes' ) { ?>
				<div class="kidsworld_woo_next_prev">
					<span class="kidsworld_woo_prev"> <?php previous_post_link('%link',''); ?></span>
					<span class="kidsworld_woo_next">	<?php next_post_link('%link',''); ?></span>
				</div>

		<?php
		} ?>

		<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1> <?php
	}
}

// product categories list
add_action( 'woocommerce_before_subcategory', 'kidsworld_woo_category_before' );
if ( ! function_exists( 'kidsworld_woo_category_before' ) ) {
	function kidsworld_woo_category_before() {
		echo '<div class="kidsworld-featured-product-block p_category">';
	}
}

add_action( 'woocommerce_after_subcategory', 'kidsworld_woo_category_after' );
	if ( ! function_exists( 'kidsworld_woo_category_after' ) ) {
	function kidsworld_woo_category_after() {
		echo '</div>';
	}
}

add_action( 'woocommerce_before_subcategory_title', 'kidsworld_woo_category_title_before' );
	if ( ! function_exists( 'kidsworld_woo_category_title_before' ) ) {
	function kidsworld_woo_category_title_before() {
		echo '<div class="kidsworld-product-details">';
	}
}

add_action( 'woocommerce_after_subcategory_title', 'kidsworld_woo_category_title_after' );
	if ( ! function_exists( 'kidsworld_woo_category_title_after' ) ) {
	function kidsworld_woo_category_title_after() {
		echo '</div>';
	}
}

//Tag Cloud Font size
function kidsworld_woocommerce_product_tag_cloud_widget_args($args) {
	$args['largest'] = 11; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'kidsworld_woocommerce_product_tag_cloud_widget_args' );

// enable ajax mode for cart icon dropdown menu
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

if ( ! function_exists( 'woocommerce_header_add_to_cart_fragment' ) ) {
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
		<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'kids-world'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'kids-world'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
		<?php
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
}


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'kidsworld_woocommerce_output_upsells', 15 );

if(!function_exists('kidsworld_woocommerce_output_upsells')) {
	function kidsworld_woocommerce_output_upsells() {

		$output = "";

		$kidsworld_woo_upsells_p_column = (get_option('kidsworld_woo_upsells_p_column') <> '') ? esc_attr(get_option('kidsworld_woo_upsells_p_column')) : 4;
		$kidsworld_woo_upsells_p_nos = (get_option('kidsworld_woo_upsells_p_nos') <> '') ? esc_attr(get_option('kidsworld_woo_upsells_p_nos')) : 12;

		ob_start();
		woocommerce_upsell_display($kidsworld_woo_upsells_p_nos,$kidsworld_woo_upsells_p_column); // no. of products, no. of columns
		$content = ob_get_clean();
		if($content) {
			$output .= "<div class='product_column shop-column-".$kidsworld_woo_upsells_p_column."'>";
			$output .= $content;
			$output .= "</div>";
		}

		echo $output;
	}
}

// move Cross-Sells products below cart
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'kidsworld_woocommerce_cross_sell_display' , 10);


if(!function_exists('kidsworld_woocommerce_cross_sell_display')) {
	function kidsworld_woocommerce_cross_sell_display() {

		$output = "";

		$kidsworld_woo_cross_sells_p_column = (get_option('kidsworld_woo_cross_sells_p_column') <> '') ? esc_attr(get_option('kidsworld_woo_cross_sells_p_column')) : 4;
		$kidsworld_woo_cross_sells_p_nos = (get_option('kidsworld_woo_cross_sells_p_nos') <> '') ? esc_attr(get_option('kidsworld_woo_cross_sells_p_nos')) : 12;

		ob_start();
		woocommerce_cross_sell_display($kidsworld_woo_cross_sells_p_nos,$kidsworld_woo_cross_sells_p_column,'rand'); // no. of products, no. of columns
		$content = ob_get_clean();
		if($content) {
			$output .= "<div class='clear'></div>";
			$output .= "<div class='product_column shop-column-".$kidsworld_woo_cross_sells_p_column." kidsworld_cross_sales_p'>";
			$output .= $content;
			$output .= "</div>";
		}

		echo $output;
	}
}


if ( ! function_exists( 'kidsworld_display_kidsworld_woo_ajax_cart' ) ) {
	function kidsworld_display_kidsworld_woo_ajax_cart() { ?>
		<div class="main_hover_cart_menu">
			<div class="kidsworld_woo_cart_menu">
				<a class="my-cart-link" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
					<i class="fa fa-shopping-cart"></i><?php _e('Cart','kids-world'); ?>
				</a>
			</div>

			<div class="kidsworld_woo_cart_hover_menu">
				<div class="widget_shopping_cart_content"></div>
			</div>
		</div>
		<?php
	}
}


// widget product search
if ( ! function_exists( 'woo_custom_product_searchform' ) ) {
	function woo_custom_product_searchform( $form ) {
		$form = '
		<div id="widget_search_form">
			<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
				<div>
					<input type="submit" class="button" id="searchsubmit" value="&#xf002;" />
					<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_html__( 'Search Products', 'kids-world' ) . '" />
					<input type="hidden" name="post_type" value="product" />
				</div>
			</form>
		</div>';
		return $form;
	}
}

add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );



// new functions starts

// Remove default formatting of link before and after image to price content
// you can add custom function by add action and same action name with custom function

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'kidsworld_woocommerce_product_title_and_add_to_cart', 10 );


if ( ! function_exists( 'kidsworld_woocommerce_product_title_and_add_to_cart' ) ) {

	/**
	 * Get the add to cart template for the loop.
	 *
	 * @subpackage	Loop
	 */
	function kidsworld_woocommerce_product_title_and_add_to_cart( $args = array() ) {
		global $product;

		echo '<div class="kidsworld_woo_add_to_cart kidsworld_js_center">';

		if ( $product ) {
			$defaults = array(
				'quantity' => 1,
				'class'    => implode( ' ', array_filter( array(
						'button',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
				) ) ),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
			}

			wc_get_template( 'loop/add-to-cart.php', $args );
		}

		echo '<div class="clear"></div>';
		echo '</div>';

		echo '<h3 class="kidsworld-product-title"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h3>';

	}
}

// shop as category title etc.

remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', 'kidsworld_woocommerce_shop_as_category_title', 10 );

if ( ! function_exists( 'kidsworld_woocommerce_shop_as_category_title' ) ) {
	function kidsworld_woocommerce_shop_as_category_title( $category ) {

		$category_count = '';
		$woo_cat_slug = $category->slug;

		if ( $category->count > 0 ) {
			$category_count = ' (' . $category->count . ')';
		}

		$category_title = '<h3 class="kidsworld-product-title kidsworld-product-cat-title">
								<a href="'.get_term_link( $woo_cat_slug, 'product_cat' ).'">'. $category->name . $category_count . '</a>
							</h3>';

		echo $category_title;

	}
}


// login form - add custom div tag for customization

add_action( 'woocommerce_before_customer_login_form', 'kidsworld_woocommerce_before_customer_login_form', 10 );
add_action( 'woocommerce_after_customer_login_form', 'kidsworld_woocommerce_after_customer_login_form', 10 );

if ( ! function_exists( 'kidsworld_woocommerce_before_customer_login_form' ) ) {
	function kidsworld_woocommerce_before_customer_login_form( $form ) {
		echo '<div class="kidsworld_woo_customer_login_form">';
	}
}

if ( ! function_exists( 'kidsworld_woocommerce_after_customer_login_form' ) ) {
	function kidsworld_woocommerce_after_customer_login_form( $form ) {
		echo '</div>';
	}
}


// cart widget - product thumbnail

if (!function_exists('kidsworld_cart_item_thumbnail')) {
	function kidsworld_cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) {

		$product = wc_get_product( $cart_item['product_id'] );
		return $product->get_image( 'kidsworld-recent-post-tiny' );
	}

	add_filter( 'woocommerce_cart_item_thumbnail', 'kidsworld_cart_item_thumbnail', 10, 3 );
}

// search widget - search form

if (!function_exists('kidsworld_get_product_search_form')) {
	function kidsworld_get_product_search_form( ) {

	    $kidsworld_woo_product_search_form = '<form role="search" method="get" action="'.esc_url( home_url() ).'/" class="woocommerce-product-search kidsworld_search_form" id="kidsworld_product_search_form">
										<div class="kidsworld_search_form_inner">
											<input type="text" placeholder="'.esc_attr__('Search Products','kids-world').'" name="s" class="kidsworld_search_form_input" autocomplete="off" value="'.get_search_query().'" />
											<button type="submit" id="searchsubmit" class="kidsworld_search_button"><i class="fa fa-search"></i></button>
											<input type="hidden" name="post_type" value="product" />
											<div class="clear"></div>
										</div>
									</form>';

	    return $kidsworld_woo_product_search_form;
	}

	add_filter( 'get_product_search_form', 'kidsworld_get_product_search_form' );
}

// tags widget

if (!function_exists('kidsworld_woocommerce_tag_cloud_widget')) {
	function kidsworld_woocommerce_tag_cloud_widget($args) {

		$args['number'] = 0; //adding a 0 will display all tags
		$args['largest'] = 90; //largest tag
		$args['smallest'] = 90; //smallest tag
		$args['unit'] = '%'; //tag font unit
		return $args;
	}

	add_filter( 'woocommerce_product_tag_cloud_widget_args', 'kidsworld_woocommerce_tag_cloud_widget' );

}

add_filter('woocommerce_add_to_cart_fragments', 'kidsworld_woocommerce_cart_link');

function kidsworld_woocommerce_cart_link($fragments) {
    global $woocommerce;

    ob_start();
    ?>
	<div class="kidsworld_cart_icon_hover">
		<a href="<?php echo wc_get_cart_url(); ?>" title="<?php echo esc_html__( 'View Cart','kids-world' );?>">
			<span class="kidsworld_ci_total_price"><?php echo $woocommerce->cart->get_cart_total(); ?></span>
			<span class="kidsworld_ci_total_items"><?php echo sprintf(_n('%d Item', '%d Items', $woocommerce->cart->cart_contents_count, 'kids-world'), $woocommerce->cart->cart_contents_count); ?></span>
		</a>
	</div>
    <?php
    $fragments['.kidsworld_cart_icon_hover'] = ob_get_clean();

    return $fragments;

}

// Define the loop_shop_columns callback

function kidsworld_filter_loop_shop_columns( $int ) {

    $int = (get_option('kidsworld_woo_shop_p_column') <> '') ? esc_attr(get_option('kidsworld_woo_shop_p_column')) : 4;

    return $int;
};

add_filter( 'loop_shop_columns', 'kidsworld_filter_loop_shop_columns', 10, 1 );
