<?php

/**
 * @copyright Incsub ( http://incsub.com/ )
 *
 * @license http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 ( GPL-2.0 )
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,
 * MA 02110-1301 USA
 *
 */
if ( ! class_exists( 'CoursePress_MarketPress3_Integration' ) ) {

	/**
	 * CoursePress class for integrating with other plugins
	 *
	 * @since 1.2.6.1
	 *
	 */
	class CoursePress_MarketPress_Integration {

		private static $mp_base = false;
		private static $updated = false;
		private static $course_id = 0;
		private static $product_ctp = 'product';
		private static $looping = false;

		public static function init() {

			add_action( 'admin_init', array( __CLASS__, 'begin_integration' ) );
			add_action( 'init', array( __CLASS__, 'begin_integration' ) );

		}

		public static function begin_integration() {

			if ( ! self::is_active() ) {
				return false;
			}

			if ( false === self::$mp_base ) {
				self::$mp_base = self::get_base();
			}

			// General hooks
			add_action( 'coursepress_course_created', array( __CLASS__, 'update_product_from_course' ) );
			add_action( 'coursepress_course_updated', array( __CLASS__, 'update_product_from_course' ) );
			add_action( 'coursepress_mp_update_product', array( __CLASS__, 'maybe_create_product' ) );
			add_action( 'post_updated', array( __CLASS__, 'update_course_from_product' ), 10, 3 );
			add_filter( 'coursepress_shortcode_course_cost', array( __CLASS__, 'shortcode_cost' ), 10, 2 );

			// Enable Payment Support
			add_filter( 'coursepress_offer_paid_courses', array( __CLASS__, 'enable_payment' ) );

			// Specific hooks
			switch ( self::$mp_base ) {
				case '3.0':
					/**
					 * Enroll upon pay
					 *
					 * Reference to order ID, will need to get the actual product using the MarketPress Order class
					 */
					add_action( 'mp_order_order_paid', array( __CLASS__, 'course_paid_3pt0' ) );

					/**
					 * Override thumbnail placeholder with course list image.
					 * Note: Typically course products won't have thumbnails, but if a product image is set, this filter
					 * will not override the set product image.
					 */
					add_filter( 'mp_product_image_show_placeholder', array( __CLASS__, 'placeholder_to_course_image' ), 10, 2 );

					/**
					 * Return course list image as product image for: `mp_product_images` meta
					 */
					add_filter( 'get_post_metadata', array( __CLASS__, 'course_product_images_meta' ), 10, 4 );

					self::$product_ctp = MP_Product::get_post_type();

					break;

				case '2.0':

					add_action( 'mp_new_order', array( __CLASS__, 'listen_for_paid_status_for_courses_2pt0' ) );
					add_action( 'mp_order_paid', array( __CLASS__, 'listen_for_paid_status_changes_for_courses_2pt0' ) );
					break;
			}


		}

		public static function enable_payment( $payment_supported ) {
			$payment_supported = true;

			return $payment_supported;
		}

		public static function is_active() {

			// Don't allow on campus
			if ( CoursePress_Capabilities::is_campus() ) {
				return false;
			}

			$plugins = get_option( 'active_plugins' );

			if ( is_multisite() ) {
				$active_sitewide_plugins = get_site_option( "active_sitewide_plugins" );
			} else {
				$active_sitewide_plugins = array();
			}

			if ( preg_grep( '/marketpress.php/', $plugins ) || preg_grep( '/marketpress.php/', $active_sitewide_plugins ) ) {
				return true;
			} else {
				return false;
			}

		}

		public static function get_base() {
			$mp_version = self::get_version();

			// Strip out any beta or RC components from version... get base version
			$mp_version    = preg_replace( '/\.\D.*/', '', $mp_version );
			self::$mp_base = version_compare( $mp_version, '3.0' ) > - 1 ? '3.0' : '2.0';

			return self::$mp_base;
		}

		public static function get_version() {
			$mp_version = false;

			if ( defined( 'MP_VERSION' ) ) {
				$mp_version = MP_VERSION;
			} else {
				global $mp_version;
			}

			return $mp_version;
		}

		public static function product_settings( $content, $course_id ) {

			switch ( self::get_base() ) {

				case '3.0':
					return self::mp2_product_settings( $content, $course_id );
					break;


				case '2.0':
					return self::mp2_product_settings( $content, $course_id );
					break;

			}

		}

		// Return settings, this is a filter
		public static function maybe_create_product( $course_id ) {

			self::$course_id = $course_id;

			$mp_product_details = array();
			if ( isset( $course_id ) && $course_id !== 0 ) {
				$mp_product_details = get_post_custom( $course_id );
			}

			$product_id     = isset( $mp_product_details['mp_product_id'] ) ? (int) $mp_product_details['mp_product_id'][0] : false;
			$product_id     = empty( $product_id ) && isset( $mp_product_details['marketpress_product'] ) ? (int) $mp_product_details['marketpress_product'][0] : $product_id;
			$product_status = ! empty( $product_id ) ? get_post_status( $product_id ) : false;
			$product_id     = ! empty( $product_id ) && $product_status ? $product_id : false;

			$is_paid = isset( $mp_product_details['paid_course'] ) && 'on' === $mp_product_details['paid_course'][0] ? true : false;

			// Check if the corresponding product exists, if not, set product ID to false. This happens if the product "accidentally" got deleted.
			$product_id = ! empty( $product_id ) && get_post_status( $product_id ) ? $product_id : false;

			// Assume product does not exist and create one
			if ( false === $product_id && $is_paid ) {

				$course = get_post( $course_id );

				$product = array(
					'post_title'     => $course->post_title,
					'post_content'   => $course->post_content,
					'post_excerpt'   => $course->post_excerpt,
					'post_type'      => self::$product_ctp,
					'ping_status'    => 'closed',
					'comment_status' => 'closed',
					'post_status'    => 'publish'
				);

				$product_id = wp_insert_post( $product );

				// Avoid the looping
				self::$updated = true;
			}

			// If its not paid and a product doesn't exist, do nothing.
			if ( false === $product_id ) {
				return false;
			}

			self::update_product_meta( $product_id, $mp_product_details, $course_id );

			// Make sure we update the product ID in the course
			update_post_meta( $course_id, 'mp_product_id', $product_id );
			update_post_meta( $course_id, 'marketpress_product', $product_id );

			return true;
		}

		public static function update_product_meta( $product_id, $settings, $course_id ) {

			$base = self::get_base();

			$product_meta = array();
			switch ( $base ) {

				case '3.0':
					$product_meta = array(
						'sku'               => $settings['mp_sku'][0],
						'regular_price'     => $settings['mp_price'][0],
						'has_sale'          => $settings['mp_is_sale'][0],
						'sale_price_amount' => $settings['mp_sale_price'][0],
						'course_id'         => $course_id,
						'file_url'          => get_permalink( $course_id )
					);
					break;

				case '2.0':
					$product_meta = array(
						'mp_sku'        => array( $settings['mp_sku'][0] ),
						'mp_price'      => array( $settings['mp_price'][0] ),
						'mp_is_sale'    => $settings['mp_is_sale'][0],
						'mp_sale_price' => array( $settings['mp_sale_price'][0] ),
						'mp_course_id'  => $course_id,
						'mp_file'       => get_permalink( $course_id )
					);

					break;

			}

			// Create Auto SKU
			if ( ! empty( $settings['auto_sku'][0] ) || empty( $settings['mp_sku'][0] ) ) {
				$sku_prefix = apply_filters( 'coursepress_course_sku_prefix', 'CP-' );
				$sku        = $sku_prefix . str_pad( $course_id, 5, "0", STR_PAD_LEFT );

				switch ( $base ) {

					case '3.0':
						$product_meta['sku'] = $sku;
						break;

					case '2.0':
						$product_meta['mp_sku'] = $sku;
						break;

				}

			}

			foreach ( $product_meta as $key => $value ) {
				update_post_meta( $product_id, $key, $value );
			}

		}

		public static function update_product_from_course( $course_id ) {

			self::$course_id = $course_id;

			// Avoid possible messy loop
			if ( self::$updated ) {
				self::$updated = false;

				return;
			}

			$mp_product_details = array();
			if ( isset( $course_id ) && $course_id !== 0 ) {
				$mp_product_details = get_post_custom( $course_id );
			}

			// If course status is no longer paid, but an MP ID exists, then disable the MP product (don't delete)
			$product_id     = isset( $mp_product_details['mp_product_id'] ) ? (int) $mp_product_details['mp_product_id'][0] : false;
			$product_id     = empty( $product_id ) && isset( $mp_product_details['marketpress_product'] ) ? (int) $mp_product_details['marketpress_product'][0] : $product_id;
			$product_status = ! empty( $product_id ) ? get_post_status( $product_id ) : false;
			$product_id     = ! empty( $product_id ) && $product_status ? $product_id : false;

			$is_paid = isset( $mp_product_details['paid_course'] ) && 'on' === $mp_product_details['paid_course'][0] ? true : false;

			// Update and publish
			if ( false !== $product_id && $is_paid ) {
				$post_id = $product_id;
				if ( ! empty( $product_status ) && 'publish' !== $product_status ) {
					$product       = array(
						'ID'          => $product_id,
						'post_status' => 'publish'
					);
					self::$updated = true;
					$post_id = wp_update_post( $product );
				}

				self::update_product_meta( $post_id, $mp_product_details, $course_id );
			}

			// Update and hide
			if ( false !== $product_id && ! $is_paid ) {
				$post_id = $product_id;
				if ( ! empty( $product_status ) && 'publish' === $product_status ) {
					$product       = array(
						'ID'          => $product_id,
						'post_status' => 'draft'
					);
					self::$updated = true;
					$post_id = wp_update_post( $product );
				}

				self::update_product_meta( $post_id, $mp_product_details, $course_id );
			}

		}

		public static function update_course_from_product( $product_id, $post, $before_update ) {

			// If its not a product, exit
			if ( self::$product_ctp !== $post->post_type || ! self::is_active() ) {
				return;
			}

			// If update is caused by this class already, then bail
			if ( self::$updated ) {
				self::$updated = false;

				return;
			}

			$base = self::get_base();

			$course_id = false;
			switch ( $base ) {
				case '3.0':
					$course_id = (int) get_post_meta( $product_id, 'course_id', true );
					break;
				case '2.0':
					$course_id = (int) get_post_meta( $product_id, 'mp_course_id', true );
					break;
			}

			// No point proceeding if there is no associated course
			if ( empty( $course_id ) ) {
				return;
			}

			$sku     = $price = $sale_price = '';
			$is_sale = $is_paid = false;

			switch ( $base ) {

				case '3.0':

					$sku        = isset( $_POST['sku'] ) ? sanitize_text_field( $_POST['sku'] ) : get_post_meta( $product_id, 'sku', true );
					$sku        = is_array( $sku ) ? array_shift( $sku ) : $sku;
					$price      = isset( $_POST['regular_price'] ) ? sanitize_text_field( $_POST['regular_price'] ) : get_post_meta( $product_id, 'regular_price', true );
					$price      = is_array( $price ) ? array_shift( $price ) : $price;
					$sale_price = isset( $_POST['sale_price']['amount'] ) ? sanitize_text_field( $_POST['sale_price']['amount'] ) : get_post_meta( $product_id, 'sale_price_amount', true );
					$sale_price = is_array( $sale_price ) ? array_shift( $sale_price ) : $sale_price;
					$is_sale    = isset( $_POST['has_sale'] ) ? sanitize_text_field( $_POST['has_sale'] ) : get_post_meta( $product_id, 'has_sale', true );
					$is_paid    = 'publish' === $post->post_status;

					break;

				case '2.0':

					$sku        = get_post_meta( $product_id, 'mp_sku', true );
					$sku        = is_array( $sku ) ? array_shift( $sku ) : $sku;
					$price      = get_post_meta( $product_id, 'mp_price', true );
					$price      = is_array( $price ) ? array_shift( $price ) : $price;
					$sale_price = get_post_meta( $product_id, 'mp_sale_price', true );
					$sale_price = is_array( $sale_price ) ? array_shift( $sale_price ) : $sale_price;
					$is_sale    = get_post_meta( $product_id, 'mp_is_sale', true );
					$is_paid    = 'publish' === $post->post_status;

					break;

			}

			$meta = array(
				'mp_sku'           => $sku,
				'mp_price' => $price,
				'mp_is_sale'       => $is_sale,
				'mp_sale_price'    => $sale_price,
				'paid_course'      => $is_paid ? 'on' : 'off'
			);

			foreach ( $meta as $key => $value ) {
				update_post_meta( $course_id, $key, $value );
			}

			self::$updated = true;

		}

		public static function shortcode_cost( $content, $course_id ) {

			$product_id = get_post_meta( $course_id, 'mp_product_id', true );

			return do_shortcode( '[mp_product_price product_id="' . $product_id . '" label=""]' );

		}


		public static function mp2_product_settings( $content, $course_id ) {

			$course      = new Course( (int) $course_id );
			$paid_course = ( CoursePress_MarketPress_Integration::is_active() || cp_use_woo() ) ? $course->details->paid_course : false;

			$auto_sku    = $course->details->auto_sku;
			$mp_settings = get_option( 'mp_settings' );
			$gateways = 0;

			foreach( (array) $mp_settings['gateways']['allowed'] as $gw => $active ) {
				$gateways += (int) $active;
			}

			$gateways = $gateways > 0 ? true : false;

			$hidden_class = ! CoursePress_MarketPress_Integration::is_active() ? 'hidden' : '';

			$content = '
				<div class="cp-markertpress-is-active ' . $hidden_class . '">
			';

			if ( isset( $course_id ) && $course_id !== 0 ) {
				$mp_product_details = get_post_custom( $course_id );
			}

			$product_id     = isset( $mp_product_details['mp_product_id'] ) ? (int) $mp_product_details['mp_product_id'][0] : false;
			$product_id     = empty( $product_id ) && isset( $mp_product_details['marketpress_product'] ) ? (int) $mp_product_details['marketpress_product'][0] : $product_id;
			$mp_product_id  = $product_id;

			$product_exists = 0 != $mp_product_id ? true : false;

			$paid_course = ! isset( $paid_course ) ? 'off' : $paid_course;
			$paid_course = ! $product_exists ? 'off' : $paid_course;

			$paid_course = 'off' === $paid_course && isset( $mp_product_details['paid_course'] ) ? $mp_product_details['paid_course'][0] : $paid_course;

			if ( isset( $marketpress_product ) && $marketpress_product !== '' ) {
				$marketpress_product_sku = $mp_product_details['mp_sku'][0];
			} else {
				$marketpress_product_sku = '';
			}

			$input_state = 'off' == $paid_course ? 'disabled="disabled"' : '';

			$value = ! empty( $mp_product_id ) ? $mp_product_id : '';

			$content .= '
					<input type="hidden" name="meta_mp_product_id" id="mp_product_id" value="' . esc_attr( $value ) . '"/>
			';

			$hidden_class = ( $paid_course != 'on' ) ? 'hidden' : '';

			$content .= '
					<div class="course-paid-course-details ' . $hidden_class . '">
			';

			$content .= '
						<div class="course-sku">
							<p>
								<input type="checkbox" name="meta_auto_sku" ' . ( isset( $auto_sku ) && $auto_sku == 'on' ? 'checked' : '' ) . ' ' . $input_state . '/>
								' . esc_html__( 'Automatically generate Stock Keeping Unit (SKU)', 'cp' ) . '
							</p>
							<input type="text" name="mp_sku" id="mp_sku" placeholder="CP-000001" value="' . esc_attr( isset( $marketpress_product_sku[0] ) ? $marketpress_product_sku[0] : '' ) . '" ' . $input_state . '/>
						</div>
			';

			$content .= '
						<div class="course-price">
							<span class="price-label ' . esc_attr( $paid_course == 'on' ? 'required' : '' ) . '">' . esc_html__( 'Price', 'cp' ) . '</span>
							<input type="text" name="mp_price" id="mp_price" value="' . esc_attr( isset( $mp_product_details['mp_price'][0] ) ? esc_attr( $mp_product_details['mp_price'][0] ) : '' ) . '" ' . $input_state . ' />
						</div>
						<div class="clearfix"></div>
			';

			$mp_is_sale = isset( $mp_product_details["mp_is_sale"][0] ) ? $mp_product_details["mp_is_sale"][0] : 0;
			$content .= '
						<div class="course-sale-price">
							<p>
								<input type="checkbox" id="mp_is_sale" name="mp_is_sale" value="' . esc_attr( $mp_is_sale ) . '" ' . checked( $mp_is_sale, '1', false ) . ' ' . $input_state . ' />
								' . esc_html__( 'Enabled Sale Price', 'cp' ) . '
 							</p>
							<span class="price-label ' . esc_attr( isset( $mp_product_details ) && ! empty( $mp_product_details["mp_is_sale"] ) && checked( $mp_product_details["mp_is_sale"][0], '1', false ) ? "required" : "" ) . '">' . esc_html__( 'Sale Price', 'cp' ) . '</span>
							<input type="text" name="mp_sale_price" id="mp_sale_price" value="' . ( ! empty( $mp_product_details['mp_sale_price'] ) ? esc_attr( $mp_product_details["mp_sale_price"][0] ) : 0 ) . '" ' . $input_state . ' />
						</div>
						<div class="clearfix"></div>
			';

			if ( current_user_can( 'manage_options' ) ) {

				//Try to dequeue need-help script to avoid need-help popup
				wp_dequeue_script( 'mp-need-help' );

				$gateway_url = admin_url( 'edit.php?post_type=' . self::$product_ctp . '&page=marketpress&tab=gateways&cp_admin_ref=cp_course_creation_page' );
				if( self::get_base() === '3.0' ) {
					$gateway_url = admin_url( 'admin.php?page=store-settings-payments&cp_admin_ref=cp_course_creation_page' );
				}

				$content .= '
						<div class="course-enable-gateways ' . esc_attr( $gateways ? 'gateway-active' : 'gateway-undefined' ) . '">
							<a href="' . esc_url_raw( $gateway_url . '&TB_iframe=true&width=600&height=550' ) . '" class="button button-incomplete-gateways thickbox ' . esc_attr( $gateways ? 'hide' : '' ) . '" style="' . esc_attr( $gateways ? 'display:none' : '' ) . '">' . esc_html__( 'Setup Payment Gateways', 'cp' ) . '</a>
							<span class="payment-gateway-required ' . esc_attr( ! $gateways && $paid_course == 'on' ? 'required' : '' ) . '"></span>
							<a href="' . esc_url_raw( $gateway_url . '&TB_iframe=true&width=600&height=550' ) . '" class="button button-edit-gateways thickbox ' . esc_attr( $gateways ? '' : 'hide' ) . '" style="' . esc_attr( $gateways ? '' : 'display:none' ) . '">' . esc_html__( 'Edit Payment Gateways', 'cp' ) . '</a>
						</div>
				';

			} else {

				$content .= '<div class="course-enable-gateways gateway-active"></div>';

			}


			$content .= '
					</div>
				</div>
			';

			return $content;
		}

		public static function course_paid_3pt0 ( $object_id ) {

			// We're dealing with MarketPress 3.x, so lets use its objects to enroll the user
			$order      = new MP_Order( $object_id );
			$order_post = get_post( $order->ID );
			$cart       = $order->get_cart();
			$items      = $cart->get_items();

			foreach( $items as $product_id => $qty ) {

				$course_id = (int) get_post_meta( $product_id, 'course_id', true );
				$user_id = $order_post->post_author;

				// If not enrolled...
				if( ! Student::enrolled_in_course( $course_id, $user_id ) ) {

					//Then enroll..
					Student::enroll( $course_id, $user_id );
				}

			}
		}

		/* Listen for MarketPress purchase status changes */

		public static function listen_for_paid_status_for_courses_2pt0( $order ) {
			global $mp;

			$allowed_mp_statuses = apply_filters( 'cp_allowed_purchase_status_for_enroll', array(
				'order_paid',
				'order_shipped'
			) );

			if ( in_array( $order->post_status, $allowed_mp_statuses ) ) {

				$products = array_keys( $order->mp_cart_info );
				$student  = new Student( $order->post_author );

				foreach ( $products as $product_id ) {
					$course_id = Course::get_course_id_by_marketpress_product_id( $product_id );
					if ( ! empty( $course_id ) ) {
						$student->enroll_in_course( $course_id );
					}
				}
			}
		}

		public static function listen_for_paid_status_changes_for_courses_2pt0( $order ) {
			global $mp;

			$products = array_keys( $order->mp_cart_info );
			$student  = new Student( $order->post_author );

			foreach ( $products as $product_id ) {
				$course_id = Course::get_course_id_by_marketpress_product_id( $product_id );
				if ( ! empty( $course_id ) ) {
					$student->enroll_in_course( $course_id );
				}
			}
		}

		public static function placeholder_to_course_image( $show, $post_id ) {

			$course_id = ! empty( $post_id ) ? get_post_meta( $post_id, 'course_id', true ) : 0;

			if( ! empty ( $course_id ) ) {

				self::$course_id = $course_id;
				add_filter( 'mp_default_product_img', array( __CLASS__, 'replace_image' ) );

				return 1;
			}

			return $show;
		}

		public static function replace_image( $img_src ) {

			$featured_url = get_post_meta( self::$course_id, 'featured_url', true );

			if( ! empty( $featured_url ) ) {
				if ( is_ssl() ) {
					$featured_url = str_replace( 'http://', 'https://', $featured_url );
				}

				$img_src = $featured_url;
			}

			return $img_src;
		}

		public static function course_product_images_meta( $value, $post_id, $meta_key, $single ) {

			if( 'mp_product_images' === $meta_key && ! self::$looping ) {

				// Avoid looping, because we're calling this meta again.
				self::$looping = true;

				$product_images = get_post_meta( $post_id, $meta_key, $single );

				if( empty( $product_images ) ) {
					$course_id = ! empty( $post_id ) ? get_post_meta( $post_id, 'course_id', true ) : 0;
					$featured_url = ! empty( $course_id ) ? get_post_meta( $course_id, 'featured_url', true ) : '';
					$admin_edit = isset( $_GET['action'] ) && 'edit' === $_GET['action'];
					$value = ! empty( $featured_url ) && ! $admin_edit ? $featured_url : $value;
				}

				// No longer looping
				self::$looping = false;
			}

			return $value;
		}



	}

	/**
	 * For Reference:  MP2.0 vs MP 3.0
	 * ===============================
	 *    mp_sku             => sku
	 *    mp_price           => regular_price
	 *    mp_sale_price      => sale_price_amount
	 *    mp_track_inventory => track_inventory
	 *    mp_inventory       => inventory
	 *    mp_special_tax     => special_tax_rate
	 *    mp_is_sale         => has_sale
	 *    mp_shipping        => extra_shipping_cost
	 *    mp_shipping        => weight_extra_shipping_cost
	 *    mp_file            => file_url
	 *    mp_product_link    => external_url
	 */

}


CoursePress_MarketPress_Integration::init();