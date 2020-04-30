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
			'page_title'        => esc_html__( 'Msn Plugin', Restaurant_Booking_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Msn Plugin', Restaurant_Booking_TEXTDOMAIN ),
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
			'page_title'        => esc_html__( 'Plugin Submenu 1', Restaurant_Booking_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 1', Restaurant_Booking_TEXTDOMAIN ),
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
			'page_title'        => esc_html__( 'Plugin Submenu 2', Restaurant_Booking_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 2', Restaurant_Booking_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'restaurant-booking-option-page-url-2',
			'callable_function' => 'sub_menu2_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create meta box 1.
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/functions/get_post_meta/
	 * @see    https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @return array It returns all of arguments that add_meta_box function needs.
	 */
	public function sample_meta_box3() {
		$initial_value = [

			'id'            => 'meta_box_3_id',
			'title'         => esc_html__( 'Meta box3 Headline', Restaurant_Booking_TEXTDOMAIN ),
			'callback'      => 'render_content', //It always has this name for all of meta boxes
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'advanced', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_restaurant_booking_meta_box_key_3',
			'single'        => true, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'restaurant_booking_meta_box3',
			'nonce_name'    => 'restaurant_booking_meta_box3_nonce'

		];

		return $initial_value;
	}

	/**
	 * Initial values to create meta box 1.
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/functions/get_post_meta/
	 * @see    https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @return array It returns all of arguments that add_meta_box function needs.
	 */
	public function sample_meta_box4() {
		$initial_value = [

			'id'            => 'meta_box_4_id',
			'title'         => esc_html__( 'Meta box4 Headline', Restaurant_Booking_TEXTDOMAIN ),
			'callback'      => 'render_content',
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'side', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_restaurant_booking_meta_box_key_4',
			'single'        => false, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'restaurant_booking_meta_box4',
			'nonce_name'    => 'restaurant_booking_meta_box4_nonce'

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
	public function sample_complete_shortcode() {
		$initial_value = [
			'tag'          => 'msn_new_complete_shortcode',
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

		$labels = array(
			'name'               => _x( 'Booking', 'post type general name', Restaurant_Booking_TEXTDOMAIN ),
			'singular_name'      => _x( 'Booking', 'post type singular name', Restaurant_Booking_TEXTDOMAIN ),
			'menu_name'          => _x( 'Booking', 'admin menu', Restaurant_Booking_TEXTDOMAIN ),
			'name_admin_bar'     => _x( 'Booking !', 'add new on admin bar', Restaurant_Booking_TEXTDOMAIN ),
			'add_new'            => _x( 'Add New ', 'Booking', Restaurant_Booking_TEXTDOMAIN ),
			'add_new_item'       => __( 'Add New Booking', Restaurant_Booking_TEXTDOMAIN ),
			'new_item'           => __( 'New Booking', Restaurant_Booking_TEXTDOMAIN ),
			'edit_item'          => __( 'Edit Booking', Restaurant_Booking_TEXTDOMAIN ),
			'view_item'          => __( 'View Booking', Restaurant_Booking_TEXTDOMAIN ),
			'all_items'          => __( 'All Booking', Restaurant_Booking_TEXTDOMAIN ),
			'search_items'       => __( 'Search Booking', Restaurant_Booking_TEXTDOMAIN ),
			'parent_item_colon'  => __( 'Parent Booking:', Restaurant_Booking_TEXTDOMAIN ),
			'not_found'          => __( 'No Booking found', Restaurant_Booking_TEXTDOMAIN ),
			'not_found_in_trash' => __( 'No Booking found in Trash', Restaurant_Booking_TEXTDOMAIN )
		);

		$args          = array(
			'labels'             => $labels,
			'description'        => __( 'Restaurant Booking', Restaurant_Booking_TEXTDOMAIN ),
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
			'supports'           => array( 'title', 'thumbnail', 'excerpt' )
		);
		$initial_value = [
			'post_type' => 'msn-booking',
			'args'      => $args,
		];

		return $initial_value;
	}

	/**
	 * Initial values for Custom_Taxonomy1 class
	 *
	 * Sample of args:
	 * $args = array(
	 *    'labels' => array(),
	 *    'description' => '',
	 *    'public' => null,
	 *    'publicly_queryable' => null,
	 *    'hierarchical' => false,
	 *    'show_ui' => true,
	 *    'show_in_menu' => true,
	 *    'show_in_nav_menus' => true,
	 *    'show_in_rest' => null,
	 *    'rest_base' => is $taxonomy,
	 *    'rest_controller_class' => 'WP_REST_Terms_Controller',
	 *    'show_tagcloud' => true,
	 *    'show_in_quick_edit' => true,
	 *    'show_admin_column' => false,
	 *    'capabilities' => array(
	 *        'manage_terms' => 'manage_categories',
	 *        'edit_terms' => 'manage_categories',
	 *        'delete_terms' => 'manage_categories',
	 *        'assign_terms' => 'edit_posts'
	 *    ),
	 *    'rewrite' => array(
	 *        'slug' => '$taxonomy key',
	 *        'with_front' => true,
	 *        'hierarchical' => false,
	 *        'ep_mask' => 'EP_NONE'
	 *    ),
	 *    'meta_box_cb' => null
	 * );
	 *
	 *
	 * @access public
	 * @return array It returns all of arguments that Custom_Taxonomy1 class needs.
	 *
	 * @see    http://hookr.io/functions/register_taxonomy/
	 * @see    https://developer.wordpress.org/reference/functions/register_taxonomy/
	 */
	public function sample_custom_taxonomy1() {
		// Add new taxonomy, with hierarchical structure (like Category)
		$labels = array(
			'name'                       => _x( 'Taxonomies 1', 'taxonomy general name', Restaurant_Booking_TEXTDOMAIN ),
			'singular_name'              => _x( 'Taxonomy 1', 'taxonomy singular name', Restaurant_Booking_TEXTDOMAIN ),
			'search_items'               => __( 'Search Taxonomies 1', Restaurant_Booking_TEXTDOMAIN ),
			'popular_items'              => __( 'Popular Taxonomies 1', Restaurant_Booking_TEXTDOMAIN ),
			'all_items'                  => __( 'Taxonomies 1', Restaurant_Booking_TEXTDOMAIN ),
			'parent_item'                => __( 'Parent Taxonomy 1', Restaurant_Booking_TEXTDOMAIN ), //if not hierarchical it will be null
			'parent_item_colon'          => __( 'Parent Taxonomy 1:', Restaurant_Booking_TEXTDOMAIN ), //if not hierarchical it will be null
			'edit_item'                  => __( 'Edit Taxonomy 1', Restaurant_Booking_TEXTDOMAIN ),
			'update_item'                => __( 'Update Taxonomy 1', Restaurant_Booking_TEXTDOMAIN ),
			'add_new_item'               => __( 'Add New Taxonomy 1', Restaurant_Booking_TEXTDOMAIN ),
			'new_item_name'              => __( 'New  Taxonomy 1 Name', Restaurant_Booking_TEXTDOMAIN ),
			'separate_items_with_commas' => __( 'Separate Taxonomy 1 with commas', Restaurant_Booking_TEXTDOMAIN ),
			'add_or_remove_items'        => __( 'Add or remove  Taxonomies 1', Restaurant_Booking_TEXTDOMAIN ),
			'choose_from_most_used'      => __( 'Choose from the most used Taxonomies 1', Restaurant_Booking_TEXTDOMAIN ),
			'not_found'                  => __( 'No Taxonomies 1 found.', Restaurant_Booking_TEXTDOMAIN ),
			'menu_name'                  => __( 'Taxonomies 1', Restaurant_Booking_TEXTDOMAIN ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_menu'      => true,
			'show_in_rest'      => true,
			//'update_count_callback' => '_update_post_term_count',
			//The statement: If you want to ensure that your custom taxonomy behaves like a tag, you must add the option
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'sample-new-taxonomy1' ),
		);

		$initial_value = [
			'taxonomy'    => 'msn-sample-new-taxonomy1',
			'object_type' => [
				'msn-newnewname1',
				'post',
				'msn-events',
			],
			'args'        => $args,
		];

		return $initial_value;
	}

	/**
	 * Return custom values to have custom cron schedule for wp_schedule_event
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_get_schedules/
	 * @return array
	 */
	public function sample_custom_cron_schedule() {
		$initial_value = [
			'weekly'      => [
				'interval' => 604800,
				'display'  => __( 'Once Weekly' )
			],
			'twiceweekly' => [
				'interval' => 1209600,
				'display'  => __( 'Twice Weekly' )
			]
		];

		return $initial_value;
	}
}
