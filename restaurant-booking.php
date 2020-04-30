<?php
/**
 * Restaurant Booking Manager
 *
 * A plugin to manage Booking table in restaurant with food reservation and payment
 *
 * @link              https://wpwebmaster.ir
 * @since             1.0.1
 * @package           Restaurant_Booking
 *
 * @wordpress-plugin
 * Plugin Name:       Restaurant Booking Manager
 * Plugin URI:        https://wpwebmaster.ir
 * Description:       A plugin to manage Booking table in restaurant with food reservation and payment
 * Version:           1.0.1
 * Author:            Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * Author URI:        https://wpwebmaster.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
 * Define your namespaces here by use keyword
 * */

use Restaurant_Booking\Includes\Init\{
	Admin_Hook, Core, Constant, Activator, I18n, Public_Hook, Router
};
use Restaurant_Booking\Includes\Config\Initial_Value;
use Restaurant_Booking\Includes\Parts\Other\Remove_Post_Column;
use Restaurant_Booking\Includes\Uninstall\{
	Deactivator, Uninstall
};
use Restaurant_Booking\Includes\Admin\{
	Admin_Menu1, Admin_Sub_Menu1, Admin_Sub_Menu2, Meta_Box3, Meta_Box4,
	Notices\Admin_Notice1, Notices\Woocommerce_Deactive_Notice
};

use Restaurant_Booking\Includes\Functions\Init_Functions;
use Restaurant_Booking\Includes\Database\Table;
use Restaurant_Booking\Includes\Parts\Shortcodes\{
	Shortcode1, Content_For_Login_User_Shortcode, Complete_Shortcode
};
use Restaurant_Booking\Includes\Parts\Custom_Posts\Custom_Post1;
use Restaurant_Booking\Includes\Parts\Custom_Taxonomies\Custom_Taxonomy1;
use Restaurant_Booking\Includes\Hooks\Filters\Custom_Cron_Schedule;

/**
 * If this file is called directly, then abort execution.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class Restaurant_Booking_Plugin
 *
 * This class is primary file of plugin which is used from
 * singletone design pattern.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @see        Restaurant_Booking\Includes\Init\Core Class
 * @see        Restaurant_Booking\Includes\Init\Constant Class
 * @see        Restaurant_Booking\Includes\Init\Activator Class
 * @see        Restaurant_Booking\Includes\Uninstall\Deactivator Class
 * @see        Restaurant_Booking\Includes\Uninstall\Uninstall Class
 */
final class Restaurant_Booking_Plugin {
	/**
	 * Instance property of Restaurant_Booking_Plugin Class.
	 * This is a property in your plugin primary class. You will use to create
	 * one object from Restaurant_Booking_Plugin class in whole of program execution.
	 *
	 * @access private
	 * @var    Restaurant_Booking_Plugin $instance create only one instance from plugin primary class
	 * @static
	 */
	private static $instance;
	/**
	 * @var Initial_Value $initial_values An object  to keep all of initial values for theme
	 */
	protected $initial_values;
	/**
	 * @var Core $core_object An object to keep core class for plugin.
	 */
	private $core_object;

	/**
	 * Restaurant_Booking_Plugin constructor.
	 * It defines related constant, include autoloader class, register activation hook,
	 * deactivation hook and uninstall hook and call Core class to run dependencies for plugin
	 *
	 * @access private
	 */
	public function __construct() {
		/*Define Autoloader class for plugin*/
		$autoloader_path = 'includes/class-autoloader.php';
		/**
		 * Include autoloader class to load all of classes inside this plugin
		 */
		require_once trailingslashit( plugin_dir_path( __FILE__ ) ) . $autoloader_path;
		/*Define required constant for plugin*/
		Constant::define_constant();

		/**
		 * Register activation hook.
		 * Register activation hook for this plugin by invoking activate
		 * in Restaurant_Booking_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is activated.
		 */
		register_activation_hook(
			__FILE__,
			function () {
				$this->activate(
					new Activator( intval( get_option( 'last_restaurant_booking_dbs_version' ) ) )
				);
			}
		);
		/**
		 * Register deactivation hook.
		 * Register deactivation hook for this plugin by invoking deactivate
		 * in Restaurant_Booking_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is deactivated.
		 */
		register_deactivation_hook(
			__FILE__,
			function () {
				$this->deactivate(
					new Deactivator()
				);
			}
		);
		/**
		 * Register uninstall hook.
		 * Register uninstall hook for this plugin by invoking uninstall
		 * in Restaurant_Booking_Plugin class.
		 *
		 * @param string   $file     path to the plugin file.
		 * @param callback $function The function to be run when the plugin is uninstalled.
		 */
		register_uninstall_hook(
			__FILE__,
			array( 'Restaurant_Booking_Plugin', 'uninstall' )
		);
	}

	/**
	 * Call activate method.
	 * This function calls activate method from Activator class.
	 * You can use from this method to run every thing you need when plugin is activated.
	 *
	 * @access public
	 * @since  1.0.1
	 * @see    Restaurant_Booking\Includes\Init\Activator Class
	 */
	public function activate( Activator $activator_object ) {
		global $wpdb;
		$activator_object->activate(
			true,
			[
				new Custom_Post1( $this->initial_values->get_booking_custom_post_type_values() )
			],
			[
				new Custom_Taxonomy1( $this->initial_values->sample_custom_taxonomy1() )
			],
			new Table( $wpdb, Restaurant_Booking_DB_VERSION, get_option( 'has_table_name' ) )
		);
	}

	/**
	 * Call deactivate method.
	 * This function calls deactivate method from Dectivator class.
	 * You can use from this method to run every thing you need when plugin is deactivated.
	 *
	 * @access public
	 * @since  1.0.1
	 */
	public function deactivate( Deactivator $deaactivator_object ) {
		$deaactivator_object->deactivate();
	}

	/**
	 * Create an instance from Restaurant_Booking_Plugin class.
	 *
	 * @access public
	 * @since  1.0.1
	 * @return Restaurant_Booking_Plugin
	 */
	public static function instance() {
		if ( is_null( ( self::$instance ) ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Call uninstall method.
	 * This function calls uninstall method from Uninstall class.
	 * You can use from this method to run every thing you need when plugin is uninstalled.
	 *
	 * @access public
	 * @since  1.0.1
	 */
	public static function uninstall() {
		Uninstall::uninstall();
	}

	/**
	 * Load Core plugin class.
	 *
	 * @access public
	 * @since  1.0.1
	 */
	public function run_restaurant_booking_plugin() {
		$this->initial_values = new Initial_Value();
		$this->core_object    = new Core(
			$this->initial_values,
			new Init_Functions(),
			new I18n(),
			new Admin_Hook( Restaurant_Booking_PLUGIN, Restaurant_Booking_VERSION ),
			new Public_Hook( Restaurant_Booking_PLUGIN, Restaurant_Booking_VERSION ),
			new Router(),
			[
				new Admin_Menu1( $this->initial_values->sample_menu_page() )
			],
			[
				new Admin_Sub_Menu1( $this->initial_values->sample_sub_menu_page1() ),
				new Admin_Sub_Menu2( $this->initial_values->sample_sub_menu_page2() ),
			],
			[
				new Meta_Box3( $this->initial_values->sample_meta_box3() ),
				new Meta_Box4( $this->initial_values->sample_meta_box4() ),
			],
			[
				new Shortcode1( $this->initial_values->sample_shortcode1() ),
				new Complete_Shortcode( $this->initial_values->sample_complete_shortcode() ),
				new Content_For_Login_User_Shortcode( $this->initial_values->sample_content_for_login_user_shortcode() ),
			],
			[
				new Custom_Post1( $this->initial_values->get_booking_custom_post_type_values() )
			],
			[
				new Custom_Taxonomy1( $this->initial_values->sample_custom_taxonomy1() )
			],
			[
				'admin_notice1' => new Admin_Notice1(),
				'woocommerce_deactivate_notice' => new Woocommerce_Deactive_Notice(),
			],
			new Custom_Cron_Schedule( $this->initial_values->sample_custom_cron_schedule() )
		);
		$this->core_object->init_core();
	}
}

$restaurant_booking_plugin_object = Restaurant_Booking_Plugin::instance();
$restaurant_booking_plugin_object->run_restaurant_booking_plugin();