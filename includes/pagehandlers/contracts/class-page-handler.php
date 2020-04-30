<?php
/**
 * Page Handler Interface File
 *
 * This file contains interface which you must implement whenever you want
 * to load a page.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\PageHandlers\Contracts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Interface Page_Handler
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 */
interface Page_Handler {

	/**
	 * Render method to render a page with router
	 *
	 * This method must be implement by children who implement this interface.
	 *
	 * @since   1.0.1
	 * @access  public
	 */
	public function render();
}
