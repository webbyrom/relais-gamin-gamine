<?php
/**
 * The template for displaying product content within loops
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }  // Exit if accessed directly

global $product, $woocommerce_loop;

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<div class="kidsworld-featured-product-block">

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="kidsworld_woo_featuredimg">
			<a href="<?php the_permalink(); ?>" class="product-images">
				<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
			</a>
			<div class="clear"></div>
		</div>

		<div class="kidsworld-product-details">
			<div class="kidsworld-product-price-cart">
				<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>

				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>

				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</li>





