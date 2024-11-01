<?php // phpcs:ignore WordPress.Files.FileName
/**
 * This is the class that manage the summary Widget.
 *
 * @author YITH
 * @package YITH Donations for WooCommerce\Widgets
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'YITH_Donations_Form_Widget' ) ) {

	/**
	 * The class that add the form Widget
	 *
	 * @author YITH.
	 * @since 1.0.0
	 */
	class YITH_Donations_Form_Widget extends WP_Widget {


		/**
		 * The construct
		 *
		 * @author YITH
		 * @since 1.0.0
		 */
		public function __construct() {
			parent::__construct(
				'yith_wc_donations_form',
				esc_html__( 'YITH Donations for WooCommerce - Form', 'yith-donations-for-woocommerce' ),
				array( 'description' => esc_html__( 'Add a simple form to add donations into your cart!', 'yith-donations-for-woocommerce' ) )
			);
		}

		/**
		 * Show the widget form in backend
		 *
		 * @param array $instance the widget instance.
		 *
		 * @author YITH
		 */
		public function form( $instance ) {
			$title = isset( $instance['title'] ) ? $instance['title'] : '';

			?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'yith-donations-for-woocommerce' ); ?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
            </p>
			<?php

		}

		/**
		 * The update instance method.
		 *
		 * @param array $new_instance the new widget instance.
		 * @param array $old_instance the old widget instance.
		 *
		 * @return array
		 * @author YITH
		 */
		public function update( $new_instance, $old_instance ) {

			$instance = array();

			$instance['title'] = isset( $new_instance['title'] ) ? $new_instance['title'] : '';

			return $instance;

		}

		/**
		 * Show the widget in frontend.
		 *
		 * @param array $args Widget args.
		 * @param array $instance the widget instance.
		 */
		public function widget( $args, $instance ) {

			global $YITH_Donations; // phpcs:ignore WordPress.NamingConventions.ValidVariableName
			$ajax_cart_en = 'yes' === get_option( 'woocommerce_enable_ajax_add_to_cart' );
			$ajax_class   = $ajax_cart_en ? 'ywcds_ajax_add_donation' : '';

			$args_form = array(
				'project'      => get_option( 'ywcds_project_title' ),
				'button_class' => 'button alt ' . $ajax_class,
				'product_id'   => get_option( '_ywcds_donation_product_id' ),
				'button_text'  => $YITH_Donations->get_message( 'text_button' ), // phpcs:ignore WordPress.NamingConventions.ValidVariableName
			);

			ob_start();
			echo $args['before_widget']; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
			echo $args['before_title'] . $instance['title'] . $args['after_title']; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
			echo wc_get_template_html( 'add-donation-form-widget.php', $args_form, YWCDS_TEMPLATE_PATH, YWCDS_TEMPLATE_PATH ); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
			echo $args['after_widget']; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
			$content = ob_get_clean();

			echo $content; // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped
		}
	}
}
