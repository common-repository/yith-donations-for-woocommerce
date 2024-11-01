<?php
/**
 * This is the template to show the donation form in the product page.
 *
 * @author YITH
 * @version 1.0.0
 * @package YITH Donations for WooCommerce\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$donation_is_obligatory = isset( $is_obligatory ) ? $is_obligatory : 'false';
$min_don                = isset( $min_don ) ? $min_don : '';
$max_don                = isset( $max_don ) ? $max_don : '';
$message_for_donation   = isset( $message_for_donation ) ? $message_for_donation : '';

$data_attributes = array(
	'donation_is_obligatory' => $donation_is_obligatory,
	'min_donation'           => $min_don,
	'max_donation'           => $max_don,
);
$data_attributes = yith_plugin_fw_html_data_to_string( $data_attributes );
?>
<div class="ywcds_form_container_single_product <?php echo $data_attributes;// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
	<div id="ywcds_add_donation_form_single_product ">
		<div class="ywcds_amount_field">
			<label for="ywcds_amount"><?php echo esc_html( $message_for_donation ); ?></label>
			<input type="text" class="ywcds_amount_single_product" name="amount_single_product" value="" />
			<input type="hidden" name="donation_product" value="<?php echo esc_attr( $product_id ); ?>" />
		</div>

	</div>
</div>
