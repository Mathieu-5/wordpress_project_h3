<?php

/**
 * Class for sending emails in SpeakOut! Email Petitions plugin for WordPress
 */
class dk_speakout_Mail
{

	/**
	 * Sends confirmation email
	 * includes a link to confirm ownership of email account used to sign petition
	 *
	 * @param object $petition the petition being signed
	 * @param object $signature the signature
	 * @param array $options custom wp_options for this plugin
	 */
	public static function send_confirmation( $petition, $signature, $options )
	{
		$email   = stripslashes( $signature->email );
		$subject = stripslashes( $options['confirm_subject'] );
		$message = stripslashes( $options['confirm_message'] );
		$message = nl2br($message);

		$doBCC = isset($_POST['bcc']) && $_POST['bcc']=="on" ? 1 : 0;

		// construct confirmation URL
		$lang = isset( $_POST['lang'] ) ? $_POST['lang'] : ''; // WPML
		$confirmation_url = '<a href="' . home_url() . '/?dkspeakoutconfirm=' . $signature->confirmation_code . '&b=' . $doBCC  . '&lang=' . $lang . '">' . home_url() . '/?dkspeakoutconfirm=' . $signature->confirmation_code . '&b=' . $doBCC . '&lang=' . $lang . '</a>'; 

		// add confirmation link to email if user left it out
		if ( strpos( $message, '%confirmation_link%' ) == false ) {
			$message = $message . "\r\n" . $confirmation_url;
		}

		// replace user-supplied variables
		$search  = array( '%honorific%', '%first_name%', '%last_name%', '%petition_title%', '%confirmation_link%' );
		$replace = array( $signature->honorific, $signature->first_name, $signature->last_name, $petition->title, $confirmation_url );
		$message = stripslashes( str_replace( $search, $replace, $message ) );

		// construct email headers
		$headers = "From: " . $options['confirm_email'] . "\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$charset = get_bloginfo( 'charset' );
		$headers .= "Content-Type: text/html; charset=" . $charset . "\r\n";
		//$headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n"; 
 		

		// send the confirmation email
		self::send( $email, $subject, $message, $headers );
	}

	/**
	 * Sends petition email
	 *
	 * @param object $petition the petition being signed
	 * @param object $signature the signature
	 */
	public static function send_petition( $petition, $signature, $doBCC )
	{
		$subject = stripslashes( $petition->email_subject );

		// use custom petition message if provided
		$message = $petition->petition_message;
		if ( $signature->custom_message != '' ) {
			$message = $signature->custom_message;
		}
		
		$footer = $petition->petition_footer;

		// add new line after greeting if provided
		$greeting = '';
		if ( $petition->greeting != '' ) {
			$greeting = $petition->greeting . "\r\n\r\n";
		}

		// construct email message
		$email_message  = stripslashes( $greeting );
		$email_message .= stripslashes( $message );
		$email_message .= "\r\n\r\n--";
		$email_message .= "\r\n" . stripslashes( $signature->honorific . " " . $signature->first_name . ' ' . $signature->last_name );
		$email_message .= "\r\n" . $signature->email;
		$email_message .= self::format_address( $signature );
		$email_message .= "\r\n\r\n" . stripslashes( $footer );

		// construct email headers
		$headers = "From: " . stripslashes( $signature->first_name ) . " " . stripslashes( $signature->last_name ) . " <" . $signature->email . ">" . "\r\n";
		//only add CC header if there is value in CC field
		if(stripslashes( $petition->target_email_CC ) > "" ) {
		    $headers .= "CC:" . stripslashes( $petition->target_email_CC ) . "\r\n";
		}
		
		// if BCC box is checked, $doBCC is return from confirmations.php
			if((isset($_POST['bcc']) && $_POST['bcc']=="on") || $doBCC == 1 ){
			$headers .= "Bcc: " . $signature->email . "\r\n";
		}
		
		// send the petition email
		self::send( $petition->target_email, $subject, $email_message, $headers );
	}

	//********************************************************************************
	//* Private
	//********************************************************************************

	/**
	 * Formats address portion of email signature using appropriate commas, spaces, and new-line characters
	 *
	 * @param object $signature the signature
	 * @return string address
	 */
	public static function format_address( $signature )
	{
		$address  = '';

		// street address gets its own line
		if ( $signature->street_address != '' ) {
			$address .=  "\r\n" . stripslashes( $signature->street_address );
		}

		// format 'city, state postcode' line with appropriate line-break, comma and spaces
		if ( $signature->city != '' || $signature->state != '' || $signature->postcode != '' ) {
			$address .= "\r\n";

			if ( $signature->city != '' ) {
				$address .= stripslashes( $signature->city );
			}

			// if both city & state are present, separate with a comma
			if ( $signature->city != '' && $signature->state != '' ) {
				$address .= ", " ;
			}

			if ( $signature->state != '' ) {
				$address .= stripslashes( $signature->state );
			}

			if ( $signature->postcode != '' ) {
				if ( $signature->city != '' || $signature->state != '' ) {
					$address .= " ";
				}
				$address .= stripslashes( $signature->postcode );
			}
		}

		// country gets its own line
		if ( $signature->country != '' ) {
			$address .= "\r\n" . stripslashes( $signature->country );
		}

		// custom_field gets its own line
		if ( $signature->custom_field != '' ) {
			$address .= "\r\n" . stripslashes( $signature->custom_field );
		}

		return $address;
	}

	/**
	 * Sends email using WordPress' wp_mail()
	 *
	 * @param string $to email address
	 * @param string $subject email subject
	 * @param string $message email message
	 * @param string $headers email headers, should end in newline character "\r\n"
	 */
	public static function send( $to, $subject, $message, $headers )
	{
		wp_mail( $to, $subject, $message, $headers );
	}

}

?>