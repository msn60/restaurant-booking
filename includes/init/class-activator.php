<?php
/**
 * Activator Class File
 *
 * This file contains Activator class. If you want to perform some actions
 * in activating of your plugin, you can add your desire methods to it.
 * Actions likes installing separated tables (except WordPress tables),
 * initializing configs for plugin and using update_option, can do with this class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Restaurant_Booking\Includes\Abstracts\{
	Custom_Post_Type, Custom_Taxonomy
};
use Restaurant_Booking\Includes\Database\Table;
use Restaurant_Booking\Includes\Config\Info;
use Restaurant_Booking\Includes\Functions\{
	Check_Type, Current_User, Logger
};

/**
 * Class Activator.
 * If you want to perform some actions in activating of your plugin, you can add your desire methods to it.
 * Actions likes installing separated tables (except WordPress tables),
 * initializing configs for plugin and using update_option, can do with this class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @see        \Restaurant_Booking\Includes\Config\Info
 * @see        \Restaurant_Booking\Includes\Database\Table
 */
class Activator {
	use Logger;
	use Check_Type;
	use Current_User;
	/**
	 * @var int $last_db_version The last version of your plugin database
	 */
	protected $last_db_version;

	/**
	 * @var Custom_Post_Type[] $custom_post_types
	 */
	protected $custom_post_types;


	/**
	 * Activator constructor.
	 */
	public function __construct( $last_db_version = null ) {
		$this->last_db_version = $last_db_version;
	}

	/**
	 * Method activate in Activator Class
	 *
	 * It calls when plugin is activated.
	 *
	 * @access  public
	 */
	public function activate(
		$is_need_table_modification = false,
		array $custom_post_types = null
	) {
		$this->register_activator_user();
		if ( ! is_null( $custom_post_types ) ) {
			$this->custom_post_types = $this->check_array_by_parent_type( $custom_post_types, Custom_Post_Type::class )['valid'];
			if ( ! empty( $this->custom_post_types ) ) {
				$this->register_plugin_custom_post_type();
			}
		}

		$this->append_log_in_text_file( 'Sample to test logger class when plugin is activated', Restaurant_Booking_LOGS . 'activator-logs.txt',
			'Activator Last Log' );

	}

	/**
	 * Register user who activate the plugin
	 */
	public function register_activator_user() {

		$current_user = $this->get_this_login_user();
		$this->append_log_in_text_file(
			'The user with login of: "' . $current_user->user_login . '" and display name of: "' . $current_user->display_name
			. '" activated this plugin',
			Restaurant_Booking_LOGS . 'activator-logs.txt',
			'Activator User' );

	}

	/**
	 * Method to register all of needed custom post types and flush rewrite rules
	 *
	 * @access private
	 * @since  1.0.1
	 */
	private function register_plugin_custom_post_type() {
		if ( ! is_null( $this->custom_post_types ) ) {
			foreach ( $this->custom_post_types as $custom_post_type ) {
				$custom_post_type->add_custom_post_type();
			}
			// ATTENTION: This is *only* done during plugin activation hook in this example!
			// You should *NEVER EVER* do this on every page load!!
			flush_rewrite_rules();
			if ( ! get_option( 'has_rewrite_for_restaurant_booking_new_post_types' ) ) {
				flush_rewrite_rules();
				update_option(
					'has_rewrite_for_restaurant_booking_new_post_types',
					true
				);
			}
		}
	}

}

