<?php
/**
 * Booking_Custom_Post abstract Class File
 *
 * This file contains contract for Booking_Custom_Post class. If you want create a
 * custom post type in WordPress, you must to use this contract.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Parts\Custom_Posts;

use Restaurant_Booking\Includes\Interfaces\Action_Hook_Interface;
use Restaurant_Booking\Includes\Abstracts\Custom_Post_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Booking_Custom_Post.
 * This file contains contract for Booking_Custom_Post class.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @link       https://wpwebmaster.ir
 *
 * @see        https://carlalexander.ca/saving-wordpress-custom-post-types-using-interface/
 * @see        https://developer.wordpress.org/reference/functions/register_post_type/
 * @see        https://carlalexander.ca/designing-entities-wordpress-custom-post-types/
 * @see        https://www.hostinger.com/tutorials/wordpress-custom-post-types
 */
class Booking_Custom_Post extends Custom_Post_Type {

	/**
	 * The name of the product.
	 *
	 * @var string $name
	 */
	private $name;

	/**
	 * The price of the product.
	 *
	 * @var float $price
	 */
	private $price;

	/**
	 * Booking_Custom_Post constructor.
	 *
	 * @param array  $initial_values
	 * @param string $name
	 * @param float  $price
	 */
	public function __construct( array $initial_values, $name = null, $price = null ) {
		parent::__construct( $initial_values );
		$this->name  = $name;
		$this->price = $price;
	}


	/**
	 * Get the post data as a wp_insert_post compatible array.
	 *
	 * @access  public
	 * @return  array
	 */
	public function get_post_data() {
		return array(
			'post_content' => $this->args['description'],
			'post_title'   => $this->args['labels']['name'],
			'post_status'  => 'publish',
			'post_type'    => $this->post_type
		);
	}

	/**
	 * Get all the post meta as a key-value associative array.
	 *
	 * @access  public
	 * @return array
	 */
	public function get_post_meta() {
		return [
			'price' => $this->price,
			'name'  => $this->name
		];
	}

}
