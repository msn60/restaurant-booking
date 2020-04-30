<?php
/**
 * Sample Page Handler Class File
 *
 * This file contains Second_Page_Handler class which is used to render a page in your project
 * with a specific route or url.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\PageHandlers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Restaurant_Booking\Includes\Functions\Template_Builder;
use Restaurant_Booking\Includes\PageHandlers\Contracts\Page_Handler;
use Restaurant_Booking\Includes\Functions\Utility;

/**
 * Class Second_Page_Handler.
 * This class  is used to render a page in your project with a specific route or url.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @see        \Restaurant_Booking\Includes\Functions\Utility
 * @see        \Restaurant_Booking\Includes\PageHandlers\Contracts\Page_Handler
 */
class Second_Page_Handler implements Page_Handler {
	use Template_Builder;

	/**
	 * Method render in First_Page_Handler Class
	 *
	 * It calls when you need to render a view in your website.
	 *
	 * @access  public
	 */
	public function render() {

		$sample_variable = 'Mehdi Soltani Neshan';
		$this->load_template( 'second-page-sample', compact( 'sample_variable' ), 'front' );
		exit;
	}
}
