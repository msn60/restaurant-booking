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

		/**
		 * Restaurant_Booking_PATH constant.
		 * It is used to specify plugin path
		 */
		if ( ! defined( 'Restaurant_Booking_PATH' ) ) {
			define( 'Restaurant_Booking_PATH', trailingslashit( plugin_dir_path( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * Restaurant_Booking_URL constant.
		 * It is used to specify plugin urls
		 */
		if ( ! defined( 'Restaurant_Booking_URL' ) ) {
			define( 'Restaurant_Booking_URL', trailingslashit( plugin_dir_url( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * Restaurant_Booking_CSS constant.
		 * It is used to specify css urls inside assets directory. It's used in front end and
		 * using to  load related CSS files for front end user.
		 */
		if ( ! defined( 'Restaurant_Booking_CSS' ) ) {
			define( 'Restaurant_Booking_CSS', trailingslashit( Restaurant_Booking_URL ) . 'assets/css/' );
		}

		/**
		 * Restaurant_Booking_JS constant.
		 * It is used to specify JavaScript urls inside assets directory. It's used in front end and
		 * using to load related JS files for front end user.
		 */
		if ( ! defined( 'Restaurant_Booking_JS' ) ) {
			define( 'Restaurant_Booking_JS', trailingslashit( Restaurant_Booking_URL ) . 'assets/js/' );
		}

		/**
		 * Restaurant_Booking_IMG constant.
		 * It is used to specify image urls inside assets directory. It's used in front end and
		 * using to load related image files for front end user.
		 */
		if ( ! defined( 'Restaurant_Booking_IMG' ) ) {
			define( 'Restaurant_Booking_IMG', trailingslashit( Restaurant_Booking_URL ) . 'assets/images/' );
		}

		/**
		 * Restaurant_Booking_ADMIN_CSS constant.
		 * It is used to specify css urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related CSS files for admin user.
		 */
		if ( ! defined( 'Restaurant_Booking_ADMIN_CSS' ) ) {
			define( 'Restaurant_Booking_ADMIN_CSS', trailingslashit( Restaurant_Booking_URL ) . 'assets/admin/css/' );
		}

		/**
		 * Restaurant_Booking_ADMIN_JS constant.
		 * It is used to specify JS urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'Restaurant_Booking_ADMIN_JS' ) ) {
			define( 'Restaurant_Booking_ADMIN_JS', trailingslashit( Restaurant_Booking_URL ) . 'assets/admin/js/' );
		}

		/**
		 * Restaurant_Booking_ADMIN_IMG constant.
		 * It is used to specify image urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'Restaurant_Booking_ADMIN_IMG' ) ) {
			define( 'Restaurant_Booking_ADMIN_IMG', trailingslashit( Restaurant_Booking_URL ) . 'assets/admin/images/' );
		}

		/**
		 * Restaurant_Booking_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'Restaurant_Booking_TPL' ) ) {
			define( 'Restaurant_Booking_TPL', trailingslashit( Restaurant_Booking_PATH . 'templates' ) );
		}

		/**
		 * Restaurant_Booking_INC constant.
		 * It is used to specify include path inside includes directory.
		 */
		if ( ! defined( 'Restaurant_Booking_INC' ) ) {
			define( 'Restaurant_Booking_INC', trailingslashit( Restaurant_Booking_PATH . 'includes' ) );
		}

		/**
		 * Restaurant_Booking_LANG constant.
		 * It is used to specify language path inside languages directory.
		 */
		if ( ! defined( 'Restaurant_Booking_LANG' ) ) {
			define( 'Restaurant_Booking_LANG', trailingslashit( Restaurant_Booking_PATH . 'languages' ) );
		}

		/**
		 * Restaurant_Booking_TPL_ADMIN constant.
		 * It is used to specify template urls inside templates/admin directory. If you want to
		 * create a template for admin panel or administration purpose, you will use from it.
		 */
		if ( ! defined( 'Restaurant_Booking_TPL_ADMIN' ) ) {
			define( 'Restaurant_Booking_TPL_ADMIN', trailingslashit( Restaurant_Booking_TPL . 'admin' ) );
		}

		/**
		 * Restaurant_Booking_TPL_FRONT constant.
		 * It is used to specify template urls inside templates/front directory. If you want to
		 * create a template for front end or end user purposes, you will use from it.
		 */
		if ( ! defined( 'Restaurant_Booking_TPL_FRONT' ) ) {
			define( 'Restaurant_Booking_TPL_FRONT', trailingslashit( Restaurant_Booking_TPL . 'front' ) );
		}

		/**
		 * Restaurant_Booking_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'Restaurant_Booking_LOGS' ) ) {
			define( 'Restaurant_Booking_LOGS', trailingslashit( Restaurant_Booking_PATH . 'logs' ) );
		}

		/**
		 * Restaurant_Booking_CSS_VERSION constant.
		 * You can use from this constant to apply on main CSS file when you have changed it.
		 */
		if ( ! defined( 'Restaurant_Booking_CSS_VERSION' ) ) {
			define( 'Restaurant_Booking_CSS_VERSION', 1 );
		}
		/**
		 * Restaurant_Booking_JS_VERSION constant.
		 * You can use from this constant to apply on main JS file when you have changed it.
		 */
		if ( ! defined( 'Restaurant_Booking_JS_VERSION' ) ) {
			define( 'Restaurant_Booking_JS_VERSION', 1 );
		}

		/**
		 * Restaurant_Booking_CSS_VERSION constant.
		 * You can use from this constant to apply on main CSS file when you have changed it.
		 */
		if ( ! defined( 'Restaurant_Booking_ADMIN_CSS_VERSION' ) ) {
			define( 'Restaurant_Booking_ADMIN_CSS_VERSION', 1 );
		}
		/**
		 * Restaurant_Booking_JS_VERSION constant.
		 * You can use from this constant to apply on main JS file when you have changed it.
		 */
		if ( ! defined( 'Restaurant_Booking_ADMIN_JS_VERSION' ) ) {
			define( 'Restaurant_Booking_ADMIN_JS_VERSION', 1 );
		}

		/**
		 * Restaurant_Booking_VERSION constant.
		 * It defines version of plugin for management tasks in your plugin
		 */
		if ( ! defined( 'Restaurant_Booking_VERSION') ) {
			define( 'Restaurant_Booking_VERSION', '1.0.1' );
		}

		/**
		 * Restaurant_Booking_PLUGIN constant.
		 * It defines name of plugin for management tasks in your plugin
		 */
		if ( ! defined( 'Restaurant_Booking_PLUGIN') ) {
			define( 'Restaurant_Booking_PLUGIN', 'restaurant-booking' );
		}

		/**
		 * Restaurant_Booking_DB_VERSION constant
		 *
		 * It defines database version
		 * You can use from this constant to apply your changes in updates or
		 * activate plugin again
		 */
		if ( ! defined( 'Restaurant_Booking_DB_VERSION') ) {
			define( 'Restaurant_Booking_DB_VERSION', 1 );
		}

		/**
		 * Restaurant_Booking_TEXTDOMAIN constant
		 *
		 * It defines text domain name for plugin
		 */
		if ( ! defined( 'Restaurant_Booking_TEXTDOMAIN') ) {
			define( 'Restaurant_Booking_TEXTDOMAIN', 'restaurant-booking-textdomain' );
		}
		/*In future maybe I want to add constants for separated upload directory inside plugin directory*/
	}
}
