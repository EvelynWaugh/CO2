<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>


<section class="lp_cart_wrap">
	<div class="container">
		<div class="row">
			<div class="lp_cart_tabs">
				<a href="<?php echo wc_get_cart_url(); ?>" class="lp_cart_tab <?php echo is_cart() ? 'active' : ''; ?>">Cart</a>
				<a href="<?php echo wc_get_checkout_url(); ?>" class="lp_cart_tab <?php echo is_checkout() ? 'active' : ''; ?>">Billing</a>
			</div>
		</div>
		<div class="row">
			<div class="lp_cart_block">


				<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
					<?php do_action('woocommerce_before_cart_table'); ?>

					<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents lp_cart" cellspacing="0">
						<div class="lp_cart_header">Your cart of Offsets</div>
						<div class="lp_cart_line"></div>
						<div class="lp_cart_items_text">Selected project:</div>

						<?php do_action('woocommerce_before_cart_contents'); ?>

						<?php
						foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
							$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
							$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

							if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
								$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
						?>
								<div class="lp_cart_item cart_item">
									<div class="lp_cart_item_left">
										<div class="product-name lp_cart_item_title" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
											<?php
											if (!$product_permalink) {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
											} else {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
											}

											do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

											// Meta data.
											echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

											// Backorder notification.
											if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
											}
											?>
										</div>

										<select class="lp_cart_item_select">
											<option>One time</option>
										</select>
									</div>
									<div class="lp_cart_item_right">

										<div class="product-quantity lp_cart_item_right_one" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
											<?php
											if ($_product->is_sold_individually()) {
												$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
											} else {
												$product_quantity = woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
											}

											echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
											?>
											<div class="co2-tonnes-cart"><?php _e('tonnes', 'co2') ?></div>
										</div>

										<div class="lp_cart_item_right_two">
											<div class="product-price lp_cart_item_price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
												<?php
												echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
												?>
											</div>
											<div class="product-remove lp_cart_item_del_btn">
												<?php
												echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
													'woocommerce_cart_item_remove_link',
													sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img src="' . get_template_directory_uri() . '/img/lp_cart_del.svg" alt=""></a>',
														esc_url(wc_get_cart_remove_url($cart_item_key)),
														esc_html__('Remove this item', 'woocommerce'),
														esc_attr($product_id),
														esc_attr($_product->get_sku())
													),
													$cart_item_key
												);
												?>
											</div>

										</div>
									</div>
									<select class="lp_cart_item_select_m">
										<option>One time</option>
									</select>
								</div>
						<?php
							}
						}
						?>

						<?php do_action('woocommerce_cart_contents'); ?>

						<div class="co2-cart-update">
							<div colspan="6" class="actions">

								<?php if (wc_coupons_enabled()) { ?>
									<div class="coupon">
										<label for="coupon_code"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
										<?php do_action('woocommerce_cart_coupon'); ?>
									</div>
								<?php } ?>

								<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

								<?php do_action('woocommerce_cart_actions'); ?>

								<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
							</div>
						</div>

						<?php do_action('woocommerce_after_cart_contents'); ?>

					</div>
					<?php do_action('woocommerce_after_cart_table'); ?>
				</form>

			</div>

			<?php do_action('woocommerce_before_cart_collaterals'); ?>

			<div class="cart-collaterals lp_order_block">
				<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action('woocommerce_cart_collaterals');
				?>
			</div>

			<?php do_action('woocommerce_after_cart'); ?>


		</div>
		<div class="row">

			<div class="lp_cart_send">
				<div class="lp_cart_send_checkbox">
					<input type="checkbox" id="lp_checkbox">
					<label for="lp_checkbox">Email me a certificate</label>
				</div>
				<?php do_action('woocommerce_cart_totals_after_order_total'); ?>



				<?php do_action('woocommerce_proceed_to_checkout'); ?>


				<?php do_action('woocommerce_after_cart_totals'); ?>

			</div>
		</div>
	</div>
</section>