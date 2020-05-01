<?php
/**
 * Logger Class File
 *
 * This class contains functions to log needed parts
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Functions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Logger Class File
 *
 * This class contains functions to log needed parts
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
trait Activation_Issue {

	/**
	 * Write log file in
	 *
	 * @access  public
	 *
	 * @param string $log_message Message which needs to log in text file
	 * @param string $file_name   File name of log file
	 */
	public function register_error_activation_add_action() {
		add_action( 'activated_plugin', [$this, 'save_plugin_activation_error'] );
	}

	public function save_plugin_activation_error(  ) {
		update_option( 'msn_plugin_activation_error',  ob_get_contents() );
	}

	public function show_plugin_activation_error(  ) {
		echo get_option( 'msn_plugin_activation_error' );
	}

}
