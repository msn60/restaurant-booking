<?php
/**
 * Booking_Shortcode Class File
 *
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Parts\Shortcodes;

use Restaurant_Booking\Includes\Abstracts\Shortcode;
use Restaurant_Booking\Includes\Functions\Template_Builder;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Booking_Shortcode Class File
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @link       https://wpwebmaster.ir
 */
class Booking_Shortcode extends Shortcode {
	use Template_Builder;

	/**
	 * @var string $recaptcha_site_key
	 */
	protected $recaptcha_site_key;

	/**
	 * define_shortcode  method in Shortcode Class
	 *
	 * For each each defined shortcode, you must define callable function
	 * for that. This method has this role as a shortcode callable function
	 * sample for define this shortcode:
	 * [msn_booking_shortcode]
	 *
	 * @param array  $atts    attributes which can pass throw shortcode in front end
	 * @param string $content The content between starting and closing shortcode tag
	 * @param string $tag     The name of the shortcode tag
	 *
	 * @return string
	 */
	public function set_shortcode_handler( $atts = [], $content = null, $tag = '' ) {
		$this->recaptcha_site_key = get_option('msn_booking_recaptcha_site_key');
		$this->enqueue_shortcode_styles();
		$this->enqueue_shortcode_scripts();

		$args = shortcode_atts( [
				"name" => $this->default_atts['name'],
			]
			, $atts );

		/*return '<div>Hi ' . $args["name"] . '</div>';*/
		//$this->load_template('temp-backend',[]);
		ob_start();
		$this->load_template('booking-form', array(), 'front' );
		return ob_get_clean();

	}

	/**
	 * Enqueueing styles for shortcode
	 */
	public function enqueue_shortcode_styles() {
		wp_enqueue_style(
			'msn-booking-material-fonts',
			RESTAURANT_BOOKING_ASSETS . 'fonts/material-design-iconic-font/css/material-design-iconic-font.css',
			array(),
			null,
			'all'
		);
		wp_enqueue_style(
			'msn-booking-default-date-picker',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/css/default.css',
			array(),
			null,
			'all'
		);
		wp_enqueue_style(
			'msn-booking-date-picker',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/css/default.date.css',
			array(),
			null,
			'all'
		);
		wp_enqueue_style(
			'msn-booking-time-picker',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/css/default.time.css',
			array(),
			null,
			'all'
		);
		wp_enqueue_style(
			'msn-booking-main-style',
			RESTAURANT_BOOKING_CSS . 'booking-style-ver-1.css',
			array(),
			null,
			'all'
		);
	}

	/**
	 * Enqueueing scripts for shortcode
	 *
	 * @see https://wpengine.com/support/including-a-different-jquery-version-in-wordpress/
	 * @see https://wordpress.stackexchange.com/questions/21431/how-to-control-what-jquery-version-to-include-with-wp-enqueue-script
	 * @see https://wpquark.com/kb/misc/wordpress/themes-jquery-jquery-ui-enqueue-problem/
	 *
	 * @see https://wpengine.com/support/including-a-different-jquery-version-in-wordpress/
	 * @see https://wpquark.com/kb/misc/wordpress/themes-jquery-jquery-ui-enqueue-problem/
	 */
	public function enqueue_shortcode_scripts() {
		//TODO: Add site key to setting page
		wp_enqueue_script(
			'google-recaptcha-script',
			'https://www.google.com/recaptcha/api.js?render='.$this->recaptcha_site_key,
			[],
			null,
			true
		);
		wp_enqueue_script(
			'msn-recaptcha-fire-script',
			RESTAURANT_BOOKING_JS . 'client-google-recaptcha.js',
			[ 'google-recaptcha-script' ],
			null,
			true
		);
		/*		wp_enqueue_script(
			'jquery-3.5.1',
			'https://code.jquery.com/jquery-3.5.1.min.js',
			[],
			null,
			true
		);*/
		//add_filter( 'script_loader_tag', [ $this, 'add_jquery_cdn_attributes' ], 10, 3 );
		//wp_add_inline_script( 'jquery-3.5.1', 'var jQuery3_5_1 = $.noConflict(true);' );
		wp_enqueue_script(
			'msn-booking-default-date-script',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/js/picker.js',
			[ 'jquery' ],
			null,
			true
		);
		wp_enqueue_script(
			'msn-booking-date-script',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/js/picker.date.js',
			[ 'jquery', 'msn-booking-default-date-script' ],
			null,
			true
		);
		wp_enqueue_script(
			'msn-booking-time-script',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/js/picker.time.js',
			[ 'jquery', 'msn-booking-default-date-script' ],
			null,
			true
		);
		wp_enqueue_script(
			'msn-booking-legacy-script',
			RESTAURANT_BOOKING_ASSETS . 'vendor/date-picker/js/legacy.js',
			[ 'jquery', 'msn-booking-default-date-script' ],
			null,
			true
		);
		wp_enqueue_script(
			'msn-booking-main-script',
			RESTAURANT_BOOKING_JS . 'booking-script-ver-1.js',
			[ 'jquery', 'msn-booking-default-date-script', 'msn-booking-date-script', 'msn-booking-time-script' ],
			null,
			true
		);
	}

	/**
	 * Add jquery cdn attributes
	 *
	 * @see https://wordpress.stackexchange.com/questions/317035/how-to-add-crossorigin-and-integrity-to-wp-register-style-font-awesome-5
	 */
	public function add_jquery_cdn_attributes( $tag, $handle, $src ) {

		if ( 'jquery-3.5.1' === $handle ) {
			return str_replace( "src='https://code.jquery.com/jquery-3.5.1.min.js'",
				"src='https://code.jquery.com/jquery-3.5.1.min.js' integrity='sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=' crossorigin='anonymous'",
				$tag );
		}

		return $tag;

	}


}


