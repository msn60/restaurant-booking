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
	protected $default_comparing_guest_count;
	protected $phone_number;
	protected $email_address;
	protected $date;
	protected $time;
	protected $post_id;
	protected $consumer_key;
	protected $consumer_secret;
	protected $table_reservation_product_id;
	protected $table_reservation_product_price;

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
		//TODO: put it in setting
		$this->default_comparing_guest_count = 10;
		//TODO: put it in setting
		$this->table_reservation_product_id    = 2135;
		$this->table_reservation_product_price = get_post_meta( $this->table_reservation_product_id, '_regular_price', true );
		$this->confirmation_status             = 'Uncompleted';
		$this->consumer_key                    = 'ck_9ee08c94c8ec32eb0977b36d0290184ee5253029';
		$this->consumer_secret                 = 'cs_d0770dba19b6758c67c5e9b61268543be5cceb4b';
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
		wp_enqueue_script(
			'msn-booking-script-ver-1',
			RESTAURANT_BOOKING_JS . 'booking-script-ver-1.js',
			[ 'jquery' ],
			null,
			true
		);
		/*
		 * localize script to handle ajax call
		 * */
		wp_localize_script( 'msn-booking-script-ver-1', 'global_booking_data', $this->sending_ajax_data() );
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
				//$this->set_confirmation_status();
				$this->post_id = $this->add_new_booking();
				if ( $this->post_id ) {
					$this->set_reserve_id();
				} else {
					//TODO: adjust to get phone number to call dynamically (not hard code)
					$this->return_with_problem(
						'Problem in submitting your reserve',
						'We can not add your reservation in our system. Please try again or call with: 22332233',
						false
					);
				}
				//TODO: sending confirmation email for reserver and also owner
				$this->send_reservation_detail();


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
		if ( $this->guest_count <= 0 or $this->guest_count >= 60 ) {
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

	private function add_new_booking() {
		$post_id = wp_insert_post(
			[
				'post_title'  => $this->reservation_name . ' - ' . $this->date,
				'post_type'   => 'msn-booking',
				'post_status' => 'publish',
				'meta_input'  => [
					'msn_booking_reservation_name'    => $this->reservation_name,
					'msn_booking_guest_count'         => $this->guest_count,
					'msn_booking_phone_number'        => $this->phone_number,
					'msn_booking_email_address'       => $this->email_address,
					'msn_booking_date'                => $this->date,
					'msn_booking_time'                => $this->time,
					//TODO: get number of guest from settings (not hard code)
					'msn_booking_confirmation_status' => $this->guest_count > $this->default_comparing_guest_count ? 'Uncompleted' : 'Completed',

				]
			]
		);

		return $post_id;

	}

	private function set_reserve_id() {
		$this->reserve_id = str_replace( '-', '', $this->date );
		$this->reserve_id .= rand( 1001, 9999 );
		add_post_meta( $this->post_id, 'msn_booking_reserve_id', $this->reserve_id );
	}

	private function send_reservation_detail() {
		$temp_object = $this;
		unset( $temp_object->ajax_nonce );
		unset( $temp_object->ajax_url );
		unset( $temp_object->action );
		if ( $this->guest_count <= $this->default_comparing_guest_count ) {
			unset( $temp_object->consumer_key );
			unset( $temp_object->consumer_secret );
		}
		unset( $temp_object->default_comparing_guest_count );
		setcookie( "msn_reserve_id", $this->post_id, time() + ( 86400 * 2 ), "/" );
		wp_die( json_encode( $temp_object ) );
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

	private function set_confirmation_status() {
		if ( $this->guest_count <= $this->default_comparing_guest_count ) {
			$this->confirmation_status = 'Completed';
		} else {
			$this->confirmation_status = 'Uncompleted';
		}
	}
}
