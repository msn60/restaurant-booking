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

		$this->enqueue_shortcode_styles();
		$args = shortcode_atts( [
				"name" => $this->default_atts['name'],
			]
			, $atts );

		return '<div>Hi ' . $args["name"] . '</div>';
	}

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


}


