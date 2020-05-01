<?php
/**
 * Activation_Issue Class File
 *
 * This class contains functions to log activation issues when plugin is activated
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
 * Activation_Issue Class File
 *
 * This class contains functions to log activation issues when plugin is activated
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
trait Activation_Issue {

	/**
	 * Register 'activated_plugin' add_action to call related method to log error
	 */
	public function register_error_activation_add_action() {
		add_action( 'activated_plugin', [$this, 'save_plugin_activation_error'] );
	}

	/**
	 * Save activation error or warnings or notices in option table
	 */
	public function save_plugin_activation_error(  ) {
		update_option( 'msn_plugin_activation_error',  ob_get_contents() );
	}

	/**
	 * Show plugin activation errors or warnings or notices by echoing it
	 */
	public function show_plugin_activation_error(  ) {
		echo get_option( 'msn_plugin_activation_error' );
	}

}
