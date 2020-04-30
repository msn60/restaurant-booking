<?php
use Restaurant_Booking\Includes\Functions\Utility;
?>
<div class="wrap">
	<?php
		Utility::load_template('first-page.welcome-panel',[]);
		Utility::load_template('first-page.dashboard-widgets',[]);
	?>
</div>