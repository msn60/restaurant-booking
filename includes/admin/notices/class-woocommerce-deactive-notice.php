<?php
/**
 * Woocommerce_Deactive_Notice Class File
 *
 * This file contains admin notices to show that Woocommerce is deactivated in admin panel
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 */

namespace Restaurant_Booking\Includes\Admin\Notices;


use Restaurant_Booking\Includes\Abstracts\Admin_Notice;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Woocommerce_Deactive_Notice Class File
 *
 * This file contains admin notices to show that Woocommerce is deactivated in admin panel
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @link       https://wpwebmaster.ir
 *
 * @see        https://code.tutsplus.com/series/persisted-wordpress-admin-notices--cms-1252
 * @see        https://code.tutsplus.com/tutorials/persisted-wordpress-admin-notices-part-1--cms-30134
 */
class Woocommerce_Deactive_Notice extends Admin_Notice {


	/**
	 * Method to show admin notice which is Woocommerce is not activated.
	 *
	 * @param array $args Arguments which are needed to show on notice
	 */
	public function show_admin_notice() {
		?>
        <div class="notice notice-error">
            <p>
				<?php _e(
					'Unfortunately Woocommerce is not activate. So you can not use feature of this plugin ',
                    RESTAURANT_BOOKING_TEXTDOMAIN
				) ?>
            </p>
        </div>

		<?php
	}

}
