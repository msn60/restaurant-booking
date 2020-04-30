<?php
/**
 * Shortcode1 Class File
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
 * Shortcode1 Class File
 *
 * Simple self-closing tag shortcode sample class
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @link       https://wpwebmaster.ir
 */
class Shortcode1 extends Shortcode {

	/**
	 * define_shortcode  method in Shortcode Class
	 *
	 * For each each defined shortcode, you must define callable function
	 * for that. This method has this role as a shortcode callable function
	 * sample for define this shortcode:
	 * [msnshortcode1] OR [msnshortcode1 name="Mehdi Soltani Neshan"]
	 *
	 * @param array  $atts    attributes which can pass throw shortcode in front end
	 * @param string $content The content between starting and closing shortcode tag
	 * @param string $tag     The name of the shortcode tag
	 *
	 * @return string
	 */
	public function define_shortcode_handler( $atts = [], $content = null, $tag = '' ) {

		$args = shortcode_atts( [
				"name" => $this->default_atts['name'],
			]
			, $atts );

		return '<div>Hi ' . $args["name"] . '</div>';
	}


}
