<?php
/**
 * This is an admin field
 *
 * @package YITH Donations for WooCommerce\Admin
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

extract( $field ); // @codingStandardsIgnoreLine

$donation_link    = isset( $field['link_text'] ) ? $field['link_text'] : '';
$before_text      = isset( $field['before_text'] ) ? $field['before_text'] : '';
$after_text       = isset( $field['after_text'] ) ? $field['after_text'] : '';
$donation_post_id = isset( $field['post_id'] ) ? $field['post_id'] : '';
?>
<style>
	.forminp-donation-product-link {
		font-size: 13px;
		font-style: italic;
		padding-left: 20px;
	}

</style>


<?php edit_post_link( $donation_link, $before_text, $after_text, $donation_post_id ); ?>
