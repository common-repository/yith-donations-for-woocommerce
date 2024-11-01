<?php
/**
 * This file include all basic functions of the plugin.
 *
 * @package YITH Donations for WooCommerce\Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'ywcds_format_number' ) ) {
	/**
	 * Format the number with the right format.
	 *
	 * @author YITH
	 * @param string $number the original number.
	 * @return string
	 */
	function ywcds_format_number( $number ) {

		$number = str_replace( get_option( 'woocommerce_price_thousand_sep' ), '', $number );

		return wc_format_decimal( $number );
	}
}

if ( ! function_exists( 'ywcds_get_product_donation_title' ) ) {

	/**
	 * Get the donation product title.
	 *
	 * @author YITH
	 * @param WC_Product $product The product object.
	 * @return string
	 */
	function ywcds_get_product_donation_title( $product ) {
		/* translators: %s is the product title */
		$donation_name = sprintf( esc_html__( 'Donation ( %s )', 'yith-donations-for-woocommerce' ), $product->get_title() );

		return apply_filters( 'ywcds_get_product_donation_title', $donation_name, $product );
	}
}
