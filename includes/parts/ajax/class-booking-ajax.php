<?php
/**
 * Booking_Ajax Class File
 *
 * This file contains a class that handle all of booking ajax calls
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Parts\Ajax;

use Restaurant_Booking\Includes\Abstracts\Ajax;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Booking_Ajax
 *
 * This file contains a class that handle all of booking ajax calls
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
class Booking_Ajax extends Ajax {

	/**
	 * Main constructor.
	 * This is constructor of Ajax class
	 *
	 * @access public
	 * @since  1.0.1
	 *
	 * @param string $action Action name for ajax call
	 */
	public function __construct( $action ) {
		parent::__construct( $action );
	}


	/**
	 * First method to handle ajax request
	 *
	 * This method is designed for handling ajax request in backend.
	 *
	 * @access  public
	 * @see     https://developer.wordpress.org/reference/functions/check_ajax_referer/
	 * @see     https://eric.blog/2013/06/18/how-to-add-a-wordpress-ajax-nonce/
	 * @see     https://developer.wordpress.org/reference/functions/check_ajax_referer/
	 */
	public function handle() {

		check_ajax_referer( 'msn_booking_ajax_nonce', 'security' );
		if ( isset( $_POST ) && ! empty( $_POST ) && isset( $_POST['recaptcha_response'] ) ) {

			//TODO: recaptcha url in setting page
			// Build POST request:
			$recaptcha_url      = 'https://www.google.com/recaptcha/api/siteverify';
			//TODO: Add secret key to setting page
			$recaptcha_secret   = (string) get_option( 'msn_booking_recaptcha_secret_key' );
			$recaptcha_response = $_POST['recaptcha_response'];
			// Make and decode POST request:
			$recaptcha = file_get_contents( $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response );
			$recaptcha = json_decode( $recaptcha );



			// Take action based on the score returned:
			if ( $recaptcha->score >= 0.5 ) {
				var_dump( $_POST );
			} else {
				$result = [
					'recaptcha_problem' => true,
					'message' => [
						'header' => 'Problem in submitting your reservation',
						'body' => 'You can not submit your booking. Please refresh the page and try to submit form again.'
					],
				];
				wp_die( json_encode( $result ) );
			}
		}
		wp_die();
	}


}
