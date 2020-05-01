<?php
/**
 * De-activator Class File
 *
 * This class defines tasks that must be run when plugin is deactivated.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Uninstall;

use Restaurant_Booking\Includes\Functions\Current_User;
use Restaurant_Booking\Includes\Functions\Logger;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Deactivator.
 * You can run desire tasks with this class when your plugin is de-activated.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
class Deactivator {
	use Current_User;
	use Logger;

	/**
	 * Run related tasks when plugin is deactivated
	 *
	 * @access public
	 * @since  1.0.1
	 */
	public function deactivate() {

		$this->register_deactivator_user();
	}

	/**
	 * Register user who de-activate the plugin
	 */
	public function register_deactivator_user() {

		$current_user = $this->get_this_login_user();
		$this->append_log_in_text_file(
			'The user with login of: "' . $current_user->user_login . '" and display name of: "' . $current_user->display_name
			. '" de-activated this plugin',
			Restaurant_Booking_LOGS . 'deactivator-logs.txt',
			'De-Activator User' );

	}

}


