<?php
/**
 * Booking_Fields Class File
 *
 * This file contains Booking_Fields class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Admin;

use Restaurant_Booking\Includes\Abstracts\CMB2_Fields;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Booking_Fields.
 * This file contains Booking_Fields class. It's used for creating booking fields.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
class Booking_Fields extends CMB2_Fields {

	/**
	 * Register actions that the object needs to be subscribed to.
	 *
	 */
	public function register_add_action() {
		add_action( 'cmb2_render_text_number', [ $this, 'render_text_number' ], 10, 5 );
		add_filter( 'cmb2_sanitize_text_number', [ $this, 'sanitize_text_number' ], 10, 2 );
		add_action( 'cmb2_admin_init', [ $this, 'set_cmb2_meta_boxes' ] );
	}


	public function render_text_number( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
		echo $field_type_object->input( array( 'class' => 'cmb2-text-small', 'type' => 'number' ) );
	}

// sanitize the field

	public function sanitize_text_number( $null, $new ) {
		$new = preg_replace( "/[^0-9]/", "", $new );

		return $new;
	}

	public function set_cmb2_meta_boxes() {
		/**
		 * Sample metabox to demonstrate each field type included
		 */
		$this->cmb2_object = new_cmb2_box( $this->cmb2_data );

		$this->cmb2_object->add_field( $this->cmb2_fields['reserve_id'] );

		$this->cmb2_object->add_field( $this->cmb2_fields['reservation_name'] );

		$this->cmb2_object->add_field( $this->cmb2_fields['guest_count'] );

		$this->cmb2_object->add_field( $this->cmb2_fields['phone_number'] );

		$this->cmb2_object->add_field( $this->cmb2_fields['email'] );

		$this->cmb2_object->add_field( $this->cmb2_fields['date'] );

		$this->cmb2_object->add_field( $this->cmb2_fields['time'] );
	}

}
