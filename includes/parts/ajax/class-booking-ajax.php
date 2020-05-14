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
 *
 * @see        https://stackoverflow.com/questions/7005860/php-json-encode-class-private-members
 */
class Booking_Ajax extends Ajax implements \JsonSerializable {

	//TODO: add docblock here
	protected $reserve_id;
	protected $confirmation_status;
	protected $reservation_name;
	protected $guest_count;
	protected $phone_number;
	protected $email_address;
	protected $date;
	protected $time;

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
			$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
			//TODO: Add secret key to setting page
			$recaptcha_secret   = (string) get_option( 'msn_booking_recaptcha_secret_key' );
			$recaptcha_response = $_POST['recaptcha_response'];
			// Make and decode POST request:
			$recaptcha = file_get_contents( $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response );
			$recaptcha = json_decode( $recaptcha );


			// Take action based on the score returned:
			if ( $recaptcha->score >= 0.5 ) {
				$this->sanitize_input_fields( $_POST );
				$this->check_guest_number();
				$this->set_confirmation_status();
				$this->set_reserve_id();
				/*$temp = [
					'name' => $this->reservation_name,
					'id'   => $this->reserve_id
				];*/
				wp_die( json_encode( $this ) );

			} else {
				$this->return_with_problem(
					'Goolge Recaptcha',
					null,
					true
				);
			}
		}
		wp_die();
	}

	private function sanitize_input_fields( $inputs ) {
		$this->reservation_name = sanitize_text_field( $inputs['reservation_name'] );
		$this->guest_count      = (int) sanitize_text_field( $inputs['guest_count'] );
		$this->email_address    = sanitize_email( $inputs['email'] );
		$this->phone_number     = sanitize_text_field( $inputs['phone_number'] );
		$this->date             = sanitize_text_field( $inputs['date'] );
		$this->time             = sanitize_text_field( $inputs['time'] );
	}

	private function check_guest_number() {
		//TODO: add this section to setting page
		if ( $this->guest_count <= 0 or $this->guest_count >= 40 ) {
			$this->return_with_problem(
				'Guest numbers',
				'The maximum of guest count can be 40 person. You put out of range guest number. Please refresh the page and try to submit form again.',
				false
			);
		}

	}

	private function return_with_problem( $problem_name, $message = null, $is_need_remove_form_status = false ) {
		$result = [
			'submitting_problem'  => true,
			'problem_name'        => $problem_name,
			'message'             => [
				'header' => 'Problem in submitting your reservation',
				'issue'  => 'Problem in ' . $problem_name,
				'body'   => $message ?? 'You can not submit your booking. Please refresh the page and try to submit form again.'
			],
			'is_need_remove_form' => $is_need_remove_form_status,
		];
		wp_die( json_encode( $result ) );
	}

	private function set_confirmation_status() {
		if ( $this->guest_count <= 10 ) {
			$this->confirmation_status = 'Completed';
		} else {
			$this->confirmation_status = 'Uncompleted';
		}
	}

	private function set_reserve_id() {
		$this->reserve_id = 'msn-20200398';
	}


	/**
	 * Specify data which should be serialized to JSON
	 *
	 * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	function jsonSerialize() {
		$vars = get_object_vars( $this );

		return $vars;
	}
}
