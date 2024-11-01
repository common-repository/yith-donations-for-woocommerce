<?php
/**
 * Is the add donation form for widget
 *
 * @package YITH Donations for WooCommerce\Templates
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="ywcds_form_container">
	<form id="ywcds_add_donation_form" method="get">
		<div class="ywcds_amount_field">
			<label for="ywcds_amount"><?php echo esc_html( $project ); ?></label>
			<input type="text" class="ywcds_amount" name="ywcds_amount"/>
		</div>
		<div class="ywcds_button_field">
			<input type="hidden" class="ywcds_product_id" name="add_donation_to_cart" value="<?php echo esc_attr( $product_id ); ?>" />
			<input type="submit" name="ywcds_submit_widget" class="ywcds_submit_widget <?php echo esc_attr( $button_class ); ?>" value="<?php esc_attr_e( 'Add donation', 'yith-donations-for-woocommerce' ); ?>" />
		</div>
	</form>
	<img src="<?php echo esc_url( YWCDS_ASSETS_URL . 'images/ajax-loader.gif' ); ?>" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
	<div class="ywcds_message woocommerce-message" style="display: none;"></div>
</div>
