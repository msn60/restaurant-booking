<?php
/**
 * Ajax Abstract Class File
 *
 * This file contains an abstract class that specify how you must handle ajax requests in your theme
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Abstracts;

use Restaurant_Booking\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * abstract Class Ajax.
 * This file contains an abstract class that specify how you must handle ajax requests in your theme
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
abstract class Ajax implements Action_Hook_Interface {
	/**
	 * Data that need for wp_ajax_sample_ajax_call_1
	 *
	 * @since    1.0.1
	 * @access   protected
	 * @var      array $ajax_data1 array of ata that need for wp_ajax_sample_ajax_call.
	 */
	/**
	 * @var string $ajax_url Use to identify admin-ajax.php.
	 */
	protected $ajax_url;
	/**
	 * @var string Action name for wp_create_nonce.
	 */
	protected $ajax_nonce;
	/**
	 * @var string action name for ajax call
	 */
	protected $action;

	/**
	 * Main constructor.
	 * This is constructor of Ajax abstract class
	 *
	 * @access public
	 * @since  1.0.1
	 *
	 * @param string $action Action name for ajax call
	 */
	public function __construct( $action ) {
		require_once( ABSPATH . 'wp-includes/pluggable.php' );
		$this->ajax_url   = admin_url( 'admin-ajax.php' );
		$this->ajax_nonce = wp_create_nonce( 'msn_booking_ajax_nonce' );
		$this->action     = $action;

	}

	/**
	 * Method to define add_action for using in theme or plugin
	 *
	 * @access public
	 * @since  1.0.1
	 *
	 */
	public function register_add_action() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_script' ), 10 );
		//hook to add your ajax request
		add_action( 'wp_ajax_' . $this->action, [ $this, 'handle' ] );
		add_action( 'wp_ajax_nopriv_' . $this->action, [ $this, 'handle' ] );
	}


	/**
	 * Method to register script and localize it
	 *
	 * @access public
	 * @since  1.0.1
	 *
	 */
	public function register_script() {
		//only use when you u
		/*wp_enqueue_script(
			RESTAURANT_BOOKING_PLUGIN  . '-public-script',
			RESTAURANT_BOOKING_JS . 'restaurant-booking-public-ver-' . RESTAURANT_BOOKING_JS_VERSION . '.js',
			array( 'jquery' ),
			null,
			true
		);*/
		/*
		 * localize script to handle ajax call
		 * */
		wp_localize_script( RESTAURANT_BOOKING_PLUGIN . '-public-script', 'global_booking_data', $this->sending_ajax_data() );
	}


	/**
	 * Method to prepare primary values to send from PHP to Javascript file
	 *
	 * This method prepares data for wp_localize_script
	 *
	 * @access public
	 * @since  1.0.1
	 *
	 */
	public function sending_ajax_data() {
		$initial_value = [
			'ajax_url'        => $this->ajax_url,
			'ajax_nonce'      => $this->ajax_nonce,
			'msn_ajax_sample' => 'Ajax sample for OOP plugin',
		];

		return $initial_value;
	}

	/*
	 * Handle method for ajax request in back-end
	 * */
	//abstract public function handle();

	public function handle() {

	}

	/**
	 * Sends a JSON response with the details of the given error.
	 *
	 * @param \WP_Error $error
	 */
	private function send_error( \WP_Error $error ) {
		wp_send_json( array(
			'code'    => $error->get_error_code(),
			'message' => $error->get_error_message()
		) );
	}


}
