<?php
/**
 * CMB2_Initial_Value Class File
 *
 * Role of this class is like RC configuration files in application. If you need
 * to initial value to start your plugin or need them for each time that WordPress
 * run your plugin, you can use from this class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class CMB2_Initial_Value.
 * If you need to initial value to start your plugin or need them for
 * each time that WordPress run your plugin, you can use from this class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
class CMB2_Initial_Value {

	/**
	 * Initial values for Booking_Custom_Post class
	 *
	 * @access public
	 * @return array It returns all of arguments that Booking_Custom_Post class needs.
	 */
	public function get_cmb2_main_box() {
		return [
			'id'           => 'msn_booking_specification_metabox',
			'title'        => esc_html__( 'Table Reservation Detail', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'object_types' => array( 'msn-booking' ), // Post type
			// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
			// 'context'    => 'normal',
			// 'priority'   => 'high',
			// 'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
			// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
			// 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
			/*
			 * The following parameter is any additional arguments passed as $callback_args
			 * to add_meta_box, if/when applicable.
			 *
			 * CMB2 does not use these arguments in the add_meta_box callback, however, these args
			 * are parsed for certain special properties, like determining Gutenberg/block-editor
			 * compatibility.
			 *
			 * Examples:
			 *
			 * - Make sure default editor is used as metabox is not compatible with block editor
			 *      [ '__block_editor_compatible_meta_box' => false/true ]
			 *
			 * - Or declare this box exists for backwards compatibility
			 *      [ '__back_compat_meta_box' => false ]
			 *
			 * More: https://wordpress.org/gutenberg/handbook/extensibility/meta-box/
			 */
			// 'mb_callback_args' => array( '__block_editor_compatible_meta_box' => false ),
		];

	}

	public function get_cmb2_fields() {
		$initial_value = [
			'reserve_id'       => [
				'name'       => esc_html__( 'Booking ID', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'desc'       => esc_html__( 'Reservation number for table booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'id'         => 'msn_booking_reserve_id',
				'type'       => 'text_medium',
				'default'    => esc_attr__( 'reservation id puts here', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'save_field' => false, // Disables the saving of this field.
				'attributes' => array(
					'disabled' => 'disabled',
					'readonly' => 'readonly',
				),
			],
			'reservation_name' => [
				'name'   => esc_html__( 'Reservation Name', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'desc'   => esc_html__( 'Name and Family', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'id'     => 'msn_booking_reservation_name',
				'type'   => 'text_medium',
				'column' => true,
			],
			'guest_count'      => [
				'name' => esc_html__( 'Guests', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'desc' => esc_html__( 'Number of guests', RESTAURANT_BOOKING_TEXTDOMAIN ),
				'id'   => 'msn_booking_guest_count',
				'type' => 'text_number',
			],
		];

		return $initial_value;
	}
}
