<?php
/**
 * Plugin option configuration
 *
 * @package YITH Donations for WooCommerce\Plugin Options
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$setting = array(

	'settings' => array(
		'section_general_settings'     => array(
			'name' => esc_html__( 'General settings', 'yith-donations-for-woocommerce' ),
			'type' => 'title',
			'id'   => 'ywcds_section_general',
		),
		'projecy_name'                 => array(
			'name'      => esc_html__( 'Donation Label ', 'yith-donations-for-woocommerce' ),
			'desc'      => esc_html__( 'Enter your Donation label', 'yith-donations-for-woocommerce' ),
			'type'      => 'yith-field',
			'yith-type' => 'text',
			'id'        => 'ywcds_message_for_donation',
			'std'       => esc_html__( 'Enter a donation', 'yith-donations-for-woocommerce' ),
			'default'   => esc_html__( 'Enter a donation', 'yith-donations-for-woocommerce' ),
		),

		'select_product_for_donation'  => array(
			'type'        => 'yith-field',
			'yith-type'   => 'ajax-products',
			'id'          => 'ywcds_product_donation',
			'name'        => esc_html__( 'Select a product', 'yith-donations-for-woocommerce' ),
			'desc'        => esc_html__( 'Choose a product to associate with the donation', 'yith-donations-for-woocommerce' ),
			'placeholder' => esc_html__( 'Search for a product', 'yith-donations-for-woocommerce' ),
			'multiple'    => false,
			'std'         => '',
			'default'     => '',
		),

		'link_product_donation'        => array(
			'name'        => '',
			'desc'        => '',
			'type'        => 'yith-field',
			'yith-type'   => 'donation-product-link',
			'link_text'   => esc_html__( 'click here', 'yith-donations-for-woocommerce' ),
			'before_text' => esc_html__( 'To let the plugin work correctly, a special product has been created to manage your donations. ', 'yith-donations-for-woocommerce' ),
			'after_text'  => esc_html__( ' Show it', 'yith-donations-for-woocommerce' ),
			'post_id'     => get_option( '_ywcds_donation_product_id' ),
			'id'          => 'ywcds_product_link',
		),

		'section_general_settings_end' => array(
			'type' => 'sectionend',
			'id'   => 'ywtm_section_general_end',
		),
	),
);

return apply_filters( 'yith_wc_donations__free_settings', $setting );
