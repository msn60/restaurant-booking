<?php
/**
 * Initial_Value Class File
 *
 * Role of this class is like RC configuration files in application. If you need
 * to initial value to start your plugin or need them for each time that WordPress
 * run your plugin, you can use from this class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Initial_Value.
 * If you need to initial value to start your plugin or need them for
 * each time that WordPress run your plugin, you can use from this class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
class Initial_Value {


	/**
	 * Initial values to create admin menu page.
	 *
	 * @access public
	 * @return array It returns all of arguments that add_menu_page function needs.
	 * @see    Includes/Abstract/Admin_Menu
	 */
	public function sample_menu_page() {
		$initial_value = [
			'page_title'        => esc_html__( 'Msn Plugin', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Msn Plugin', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'restaurant-booking-option-page-url',
			'callable_function' => 'management_panel_handler',//it can be null
			'icon_url'          => 'dashicons-welcome-widgets-menus',
			'position'          => 7,
			'identifier'        => 'plugin_menu_page1'
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 * @see    Includes/Abstract/Admin_Sub_Menu
	 */
	public function sample_sub_menu_page1() {
		$initial_value = [
			'parent-slug'       => 'restaurant-booking-option-page-url',
			'page_title'        => esc_html__( 'Plugin Submenu 1', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 1', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'restaurant-booking-option-page-url',
			'callable_function' => 'sub_menu1_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 * @see    Includes/Abstract/Admin_Sub_Menu
	 */
	public function sample_sub_menu_page2() {
		$initial_value = [
			'parent-slug'       => 'restaurant-booking-option-page-url',
			'page_title'        => esc_html__( 'Plugin Submenu 2', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 2', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'restaurant-booking-option-page-url-2',
			'callable_function' => 'sub_menu2_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values for sample shortcode  1
	 *
	 * @access public
	 * @return array It returns all of arguments that shortcode class needs.
	 */
	public function sample_shortcode1() {
		$initial_value = [
			'tag'          => 'msnnewshortcode1',
			'default_atts' => [
				'name' => 'Agha Gholam'
			],
		];

		return $initial_value;
	}

	/**
	 * Initial values for show content only for login user shortcode
	 *
	 * @access public
	 * @return array It returns all of arguments that shortcode class needs.
	 */
	public function sample_content_for_login_user_shortcode() {
		$initial_value = [
			'tag'          => 'msn_new_content_for_login_user',
			'default_atts' => [],
		];

		return $initial_value;
	}

	/**
	 * Initial values for complete shortcode class
	 *
	 * @access public
	 * @return array It returns all of arguments that shortcode class needs.
	 */
	public function get_booking_shortcode_values() {
		$initial_value = [
			'tag'          => 'msn_booking_shortcode',
			'default_atts' => [
				'link' => 'https://wpwebmaster.ir',
				'name' => 'Webmaster WordPress'
			],
		];

		return $initial_value;
	}

	/**
	 * Initial values for Booking_Custom_Post class
	 *
	 * @access public
	 * @return array It returns all of arguments that Booking_Custom_Post class needs.
	 */
	public function get_booking_custom_post_type_values() {
		//TODO: Add notification counter in custom post type
		/**
		 * @see https://wisdmlabs.com/blog/display-dashboard-notifications-custom-post-types-menus/
		 * @see https://rudrastyh.com/wordpress/notification-counter-bubbles.html
		 * @see https://www.skyverge.com/blog/add-admin-menu-notification-bubble/
		 * @see https://stackoverflow.com/questions/8625674/how-can-i-add-notification-bubble-to-wordpress-admin-menu
		 */

		$labels = array(
			'name'               => _x( 'Booking', 'post type general name', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'singular_name'      => _x( 'Booking', 'post type singular name', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'menu_name'          => _x( 'Booking', 'admin menu', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'name_admin_bar'     => _x( 'Booking !', 'add new on admin bar', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'add_new'            => _x( 'Add New ', 'Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'add_new_item'       => __( 'Add New Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'new_item'           => __( 'New Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'edit_item'          => __( 'Edit Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'view_item'          => __( 'View Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'all_items'          => __( 'All Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'search_items'       => __( 'Search Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'parent_item_colon'  => __( 'Parent Booking:', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'not_found'          => __( 'No Booking found', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'not_found_in_trash' => __( 'No Booking found in Trash', RESTAURANT_BOOKING_TEXTDOMAIN ),

		);

		$args          = array(
			'labels'             => $labels,
			'description'        => __( 'Restaurant Booking', RESTAURANT_BOOKING_TEXTDOMAIN ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'msn-restaurant-booking' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-calendar-alt',
			'show_in_rest'       => true,
			'supports'           => array( 'title', 'thumbnail' )
		);
		$initial_value = [
			'post_type' => 'msn-booking',
			'args'      => $args,
		];

		return $initial_value;
	}

}
