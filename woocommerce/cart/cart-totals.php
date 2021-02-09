<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;

?>



<div class="cart_totals lp_order  <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

	<?php do_action('woocommerce_before_cart_totals'); ?>

	<h2 class="lp_order_header"><?php esc_html_e('Order Summary', 'woocommerce'); ?></h2>
	<div class="lp_cart_line"></div>
	<div class="shop_table shop_table_responsive">
		<?php
		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$quantity = $cart_item['quantity'];
			$_product = $cart_item['data'];
			$_product_id = $cart_item['product_id'];

		?>
			<div class="lp_order_item">
				<div class="lp_order_item_left">
					<div class="lp_order_item_name"><?php echo $_product->get_name(); ?></div>
				</div>
				<div class="lp_order_item_right">
					<div class="lp_order_item_count">One time</div>
					<div class="lp_order_item_price">
						<span><?php printf('%s X', $quantity) ?></span> <?php echo WC()->cart->get_product_price($_product); ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

	<div class="order-total lp_order_total">
		<div class="lp_order_total_text"><?php esc_html_e('Total', 'woocommerce'); ?></div>
		<div class="lp_order_total_price" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
	</div>

</div>