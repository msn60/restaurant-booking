<?php
/**
 * CMB2_Fields Class File
 *
 * This file contains CMB2_Fields class. If you want create custom fields with CMB2 plugin
 * you must use this contract
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Abstracts;

use \CMB2;
use Restaurant_Booking\Includes\Interfaces\Action_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class CMB2_Fields.
 * This file contains CMB2_Fields class. If you want create custom fields with CMB2 plugin
 * you can use it
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 *
 */
abstract class CMB2_Fields implements Action_Hook_Interface {

	/**
	 * @var CMB2 object Instantiated CMB2 object
	 */
	protected $cmb2_object;

	/**
	 * @var array $cmb2_data
	 */
	protected $cmb2_data;

	/**
	 * @var array $cmb2_fields
	 */
	protected $cmb2_fields;

	/**
	 * CMB2_Fields constructor.
	 *
	 * @param CMB2  $cmb2_object
	 * @param array $fields
	 */
	public function __construct( array $cmb2_data, array $cmb2_fields ) {
		$this->cmb2_data = $cmb2_data;
		$this->cmb2_fields = $cmb2_fields;
	}
	/**
	 * Register actions that the object needs to be subscribed to.
	 *
	 */
	abstract public function register_add_action();

	/**
	 * set metaboxes for CMB2 ojbect
	 */
	abstract public function set_cmb2_meta_boxes();
}
