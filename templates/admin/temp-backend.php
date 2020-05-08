<?php
if ( isset( $_POST ) && ! empty( $_POST ) && isset( $_POST['recaptcha_response'] ) ) {


	// Build POST request:
	$recaptcha_url      = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptcha_secret   = (string) get_option( 'msn_booking_recaptcha_secret_key' );
	$recaptcha_response = $_POST['recaptcha_response'];
	var_dump( $recaptcha_response );

	// Make and decode POST request:
	$recaptcha = file_get_contents( $recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response );
	var_dump( $recaptcha );
	$recaptcha = json_decode( $recaptcha );
	var_dump( $recaptcha );


	// Take action based on the score returned:
	if ( $recaptcha->score >= 0.5 ) {
		var_dump( $_POST );
	} else {
		var_dump( 'gholam' );
	}
}