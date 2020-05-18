<?php
/**
 * Constant Class File
 *
 * This file contains Constant class which defines needed constants to ease
 * your plugin development processes.
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

/**
 * Class Constant
 *
 * This class defines needed constants that you will use in plugin development.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
class Constant {

	/**
	 * Define define_constant method in Constant class
	 *
	 * It defines all of constants that you need
	 *
	 * @access  public
	 * @static
	 */
	public static function define_constant() {

		/*
		 * Restaurant_Booking_PATH
		 * Restaurant_Booking_URL
		 * Restaurant_Booking_CSS
		 * Restaurant_Booking_JS
		 * Restaurant_Booking_IMG
		 * Restaurant_Booking_ADMIN_CSS
		 * Restaurant_Booking_ADMIN_JS
		 * RESTAURANT_BOOKING_ADMIN_IMG
		 * Restaurant_Booking_TPL
		 * RESTAURANT_BOOKING_INC
		 * RESTAURANT_BOOKING_LANG
		 * Restaurant_Booking_LOGS
		 * Restaurant_Booking_VERSION
		 * Restaurant_Booking_PLUGIN
		 * Restaurant_Booking_TEXTDOMAIN
		 * */

		/**
		 * RESTAURANT_BOOKING_PATH constant.
		 * It is used to specify plugin path
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_PATH' ) ) {
			define( 'RESTAURANT_BOOKING_PATH', trailingslashit( plugin_dir_path( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * RESTAURANT_BOOKING_URL constant.
		 * It is used to specify plugin urls
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_URL' ) ) {
			define( 'RESTAURANT_BOOKING_URL', trailingslashit( plugin_dir_url( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * RESTAURANT_BOOKING_ASSETS constant.
		 * It is used to specify assets urls inside assets directory.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_ASSETS' ) ) {
			define( 'RESTAURANT_BOOKING_ASSETS', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/' );
		}

		/**
		 * RESTAURANT_BOOKING_CSS constant.
		 * It is used to specify css urls inside assets directory. It's used in front end and
		 * using to  load related CSS files for front end user.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_CSS' ) ) {
			define( 'RESTAURANT_BOOKING_CSS', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/css/' );
		}

		/**
		 * RESTAURANT_BOOKING_JS constant.
		 * It is used to specify JavaScript urls inside assets directory. It's used in front end and
		 * using to load related JS files for front end user.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_JS' ) ) {
			define( 'RESTAURANT_BOOKING_JS', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/js/' );
		}

		/**
		 * RESTAURANT_BOOKING_IMG constant.
		 * It is used to specify image urls inside assets directory. It's used in front end and
		 * using to load related image files for front end user.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_IMG' ) ) {
			define( 'RESTAURANT_BOOKING_IMG', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/images/' );
		}

		/**
		 * RESTAURANT_BOOKING_ADMIN_CSS constant.
		 * It is used to specify css urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related CSS files for admin user.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_ADMIN_CSS' ) ) {
			define( 'RESTAURANT_BOOKING_ADMIN_CSS', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/admin/css/' );
		}

		/**
		 * RESTAURANT_BOOKING_ADMIN_JS constant.
		 * It is used to specify JS urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_ADMIN_JS' ) ) {
			define( 'RESTAURANT_BOOKING_ADMIN_JS', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/admin/js/' );
		}

		/**
		 * RESTAURANT_BOOKING_ADMIN_IMG constant.
		 * It is used to specify image urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_ADMIN_IMG' ) ) {
			define( 'RESTAURANT_BOOKING_ADMIN_IMG', trailingslashit( RESTAURANT_BOOKING_URL ) . 'assets/admin/images/' );
		}

		/**
		 * RESTAURANT_BOOKING_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_TPL' ) ) {
			define( 'RESTAURANT_BOOKING_TPL', trailingslashit( RESTAURANT_BOOKING_PATH . 'templates' ) );
		}

		/**
		 * RESTAURANT_BOOKING_INC constant.
		 * It is used to specify include path inside includes directory.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_INC' ) ) {
			define( 'RESTAURANT_BOOKING_INC', trailingslashit( RESTAURANT_BOOKING_PATH . 'includes' ) );
		}

		/**
		 * RESTAURANT_BOOKING_LANG constant.
		 * It is used to specify language path inside languages directory.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_LANG' ) ) {
			define( 'RESTAURANT_BOOKING_LANG', trailingslashit( RESTAURANT_BOOKING_PATH . 'languages' ) );
		}

		/**
		 * RESTAURANT_BOOKING_TPL_ADMIN constant.
		 * It is used to specify template urls inside templates/admin directory. If you want to
		 * create a template for admin panel or administration purpose, you will use from it.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_TPL_ADMIN' ) ) {
			define( 'RESTAURANT_BOOKING_TPL_ADMIN', trailingslashit( RESTAURANT_BOOKING_TPL . 'admin' ) );
		}

		/**
		 * RESTAURANT_BOOKING_TPL_FRONT constant.
		 * It is used to specify template urls inside templates/front directory. If you want to
		 * create a template for front end or end user purposes, you will use from it.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_TPL_FRONT' ) ) {
			define( 'RESTAURANT_BOOKING_TPL_FRONT', trailingslashit( RESTAURANT_BOOKING_TPL . 'front' ) );
		}

		/**
		 * RESTAURANT_BOOKING_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_LOGS' ) ) {
			define( 'RESTAURANT_BOOKING_LOGS', trailingslashit( RESTAURANT_BOOKING_PATH . 'logs' ) );
		}

		/**
		 * RESTAURANT_BOOKING_CSS_VERSION constant.
		 * You can use from this constant to apply on main CSS file when you have changed it.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_CSS_VERSION' ) ) {
			define( 'RESTAURANT_BOOKING_CSS_VERSION', 1 );
		}
		/**
		 * RESTAURANT_BOOKING_JS_VERSION constant.
		 * You can use from this constant to apply on main JS file when you have changed it.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_JS_VERSION' ) ) {
			define( 'RESTAURANT_BOOKING_JS_VERSION', 1 );
		}

		/**
		 * RESTAURANT_BOOKING_CSS_VERSION constant.
		 * You can use from this constant to apply on main CSS file when you have changed it.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_ADMIN_CSS_VERSION' ) ) {
			define( 'RESTAURANT_BOOKING_ADMIN_CSS_VERSION', 1 );
		}
		/**
		 * RESTAURANT_BOOKING_ADMIN_JS_VERSION constant.
		 * You can use from this constant to apply on main JS file when you have changed it.
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_ADMIN_JS_VERSION' ) ) {
			define( 'RESTAURANT_BOOKING_ADMIN_JS_VERSION', 1 );
		}

		/**
		 * RESTAURANT_BOOKING_VERSION constant.
		 * It defines version of plugin for management tasks in your plugin
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_VERSION' ) ) {
			define( 'RESTAURANT_BOOKING_VERSION', '1.0.1' );
		}

		/**
		 * RESTAURANT_BOOKING_PLUGIN constant.
		 * It defines name of plugin for management tasks in your plugin
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_PLUGIN' ) ) {
			define( 'RESTAURANT_BOOKING_PLUGIN', 'restaurant-booking' );
		}

		/**
		 * RESTAURANT_BOOKING_DB_VERSION constant
		 *
		 * It defines database version
		 * You can use from this constant to apply your changes in updates or
		 * activate plugin again
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_DB_VERSION' ) ) {
			define( 'RESTAURANT_BOOKING_DB_VERSION', 1 );
		}

		/**
		 * RESTAURANT_BOOKING_TEXTDOMAIN constant
		 *
		 * It defines text domain name for plugin
		 */
		if ( ! defined( 'RESTAURANT_BOOKING_TEXTDOMAIN' ) ) {
			define( 'RESTAURANT_BOOKING_TEXTDOMAIN', 'restaurant-booking-textdomain' );
		}
		/*In future maybe I want to add constants for separated upload directory inside plugin directory*/
	}
}
