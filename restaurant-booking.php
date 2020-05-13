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
use Restaurant_Booking\Includes\Config\CMB2_Initial_Value;
use Restaurant_Booking\Includes\Uninstall\{
	Deactivator, Uninstall
};
use Restaurant_Booking\Includes\Admin\{
	Admin_Menu1, Admin_Sub_Menu1, Admin_Sub_Menu2, Booking_Fields,
	Notices\Admin_Notice1, Notices\Woocommerce_Deactive_Notice
};

use Restaurant_Booking\Includes\Parts\Shortcodes\Booking_Shortcode;
use Restaurant_Booking\Includes\Parts\Custom_Posts\Booking_Custom_Post;
use Restaurant_Booking\Includes\Parts\Ajax\Booking_Ajax;

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
	 * @var CMB2_Initial_Value $cmb2_initial_values
	 */
	protected $cmb2_initial_values;
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
		$autoloader_path     = 'includes/class-autoloader.php';
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
					new Activator()
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
		$activator_object->activate(
			true,
			[
				new Booking_Custom_Post( $this->initial_values->get_booking_custom_post_type_values() )
			]
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
		$this->initial_values      = new Initial_Value();
		$this->cmb2_initial_values = new CMB2_Initial_Value();
		$this->core_object         = new Core(
			$this->initial_values,
			new I18n(),
			new Admin_Hook( RESTAURANT_BOOKING_PLUGIN, RESTAURANT_BOOKING_VERSION ),
			new Public_Hook( RESTAURANT_BOOKING_PLUGIN, RESTAURANT_BOOKING_VERSION ),
			new Router(),
			[
				new Admin_Menu1( $this->initial_values->sample_menu_page() )
			],
			[
				new Admin_Sub_Menu1( $this->initial_values->sample_sub_menu_page1() ),
				new Admin_Sub_Menu2( $this->initial_values->sample_sub_menu_page2() ),
			],
			[
				new Booking_Shortcode( $this->initial_values->get_booking_shortcode_values() ),
			],
			[
				new Booking_Custom_Post( $this->initial_values->get_booking_custom_post_type_values() )
			],
			[
				new Booking_Fields( $this->cmb2_initial_values->get_cmb2_main_box(), $this->cmb2_initial_values->get_cmb2_fields() )
			],
			[
				'admin_notice1'                 => new Admin_Notice1(),
				'woocommerce_deactivate_notice' => new Woocommerce_Deactive_Notice(),
			],
			[
				new Booking_Ajax('msn_booking_ajax_call'),
			]
		);
		$this->core_object->init_core();
	}
}

$restaurant_booking_plugin_object = Restaurant_Booking_Plugin::instance();
$restaurant_booking_plugin_object->run_restaurant_booking_plugin();