<?php
/**
 * Members related functions.
 */

if ( ! function_exists( 'ere_ajax_reset_password' ) ) :
	/**
	 * AJAX reset password request handler
	 */
	function ere_ajax_reset_password() {

		// First check the nonce, if it fails the function will break
		check_ajax_referer( 'inspiry-ajax-forgot-nonce', 'inspiry-secure-reset' );

		if ( class_exists( 'Easy_Real_Estate' ) ) {
			/* Verify Google reCAPTCHA */
			ere_verify_google_recaptcha();
		}

		$account = $_POST[ 'reset_username_or_email' ];
		$error = "";
		$get_by = "";

		if ( empty( $account ) ) {
			$error = esc_html__( 'Provide a valid username or email address!', 'easy-real-estate' );
		} else {
			if ( is_email( $account ) ) {
				if ( email_exists( $account ) ) {
					$get_by = 'email';
				} else {
					$error = esc_html__( 'No user found for given email!', 'easy-real-estate' );
				}
			} elseif ( validate_username( $account ) ) {
				if ( username_exists( $account ) ) {
					$get_by = 'login';
				} else {
					$error = esc_html__( 'No user found for given username!', 'easy-real-estate' );
				}
			} else {
				$error = esc_html__( 'Invalid username or email!', 'easy-real-estate' );
			}
		}

		if ( empty ( $error ) ) {

			// Generate new random password
			$random_password = wp_generate_password();

			// Get user data by field ( fields are id, slug, email or login )
			$target_user = get_user_by( $get_by, $account );

			$update_user = wp_update_user( array(
				'ID' => $target_user->ID,
				'user_pass' => $random_password
			) );

			// if  update_user return true then send user an email containing the new password
			if ( $update_user ) {

				$to = $target_user->user_email;

				/*
				 * The blogname option is escaped with esc_html on the way into the database in sanitize_option
				 * we want to reverse this for the plain text arena of emails.
				 */
				$website_name = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

				$subject = sprintf( __( 'Your New Password For %s', 'easy-real-estate' ), $website_name );
				$message = sprintf( __( 'Your new password is: %s', 'easy-real-estate' ), $random_password );

				/*
			     * Email Headers ( Reply To and Content Type )
			     */
				$headers = array();
				$headers[] = "Content-Type: text/html; charset=UTF-8";
				$headers = apply_filters( "inspiry_password_reset_header", $headers );    // just in case if you want to modify the header in child theme

				$mail = wp_mail( $to, $subject, $message, $headers );

				if ( $mail ) {
					$success = esc_html__( 'Check your email for new password', 'easy-real-estate' );
				} else {
					$error = esc_html__( 'Failed to send you new password email!', 'easy-real-estate' );
				}

			} else {
				$error = esc_html__( 'Oops! Something went wrong while resetting your password!', 'easy-real-estate' );
			}
		}

		if ( ! empty( $error ) ) {
			echo json_encode(
				array(
					'success' => false,
					'message' => $error
				)
			);
		} elseif ( ! empty( $success ) ) {
			echo json_encode(
				array(
					'success' => true,
					'message' => $success
				)
			);
		}

		die();
	}

	// Enable the user with no privileges to request ajax password reset
	add_action( 'wp_ajax_nopriv_inspiry_ajax_forgot', 'ere_ajax_reset_password' );

endif;


if ( ! function_exists( 'ere_new_user_notification' ) ) :
	/**
	 * Email confirmation email to newly-registered user.
	 *
	 * A new user registration notification is sent to admin email
	 */
	function ere_new_user_notification( $user_id, $user_password ) {

		$user = get_userdata( $user_id );

		// The blogname option is escaped with esc_html on the way into the database in sanitize_option
		// we want to reverse this for the plain text arena of emails.
		$blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

		/**
		 * Admin Email
		 */
		$message = sprintf( __( 'New user registration on your site %s:', 'easy-real-estate' ), $blogname ) . "\r\n\r\n";
		$message .= sprintf( __( 'Username: %s', 'easy-real-estate' ), $user->user_login ) . "\r\n\r\n";
		$message .= sprintf( __( 'Email: %s', 'easy-real-estate' ), $user->user_email ) . "\r\n";

		wp_mail( get_option( 'admin_email' ), sprintf( __( '[%s] New User Registration', 'easy-real-estate' ), $blogname ), $message );

		/**
		 * Newly Registered User Email
		 */
		$message = sprintf( __( 'Welcome to %s', 'easy-real-estate' ), $blogname ) . "\r\n\r\n";
		$message .= sprintf( __( 'Your username is: %s', 'easy-real-estate' ), $user->user_login ) . "\r\n\r\n";
		$message .= sprintf( __( 'You can login using following password: %s', 'easy-real-estate' ), $user_password ) . "\r\n\r\n";
		$message .= esc_html__( 'It is highly recommended to change your password after login.', 'easy-real-estate' ) . "\r\n\r\n";
		$message .= esc_html__( 'For more details visit:', 'easy-real-estate' ) . ' ' . home_url( '/' ) . "\r\n";

		wp_mail( $user->user_email, sprintf( __( 'Welcome to %s', 'easy-real-estate' ), $blogname ), $message );
	}
endif;


if ( ! function_exists( 'ere_is_user_restricted' ) ) :
	/**
	 * Checks if current user is restricted or not
	 *
	 * @return bool
	 */
	function ere_is_user_restricted() {
		$current_user = wp_get_current_user();

		// get restricted level from theme options
		$restricted_level = get_option( 'theme_restricted_level' );
		if ( ! empty( $restricted_level ) ) {
			$restricted_level = intval( $restricted_level );
		} else {
			$restricted_level = 0;
		}

		// Redirects user below a certain user level to home url
		// Ref: https://codex.wordpress.org/Roles_and_Capabilities#User_Level_to_Role_Conversion
		if ( $current_user->user_level <= $restricted_level ) {
			return true;
		}

		return false;
	}
endif;


if ( ! function_exists( 'ere_hide_admin_bar' ) ) :
	/**
	 * Hide the admin bar on front end for users with user level equal to or below restricted level
	 */
	function ere_hide_admin_bar() {
		if ( is_user_logged_in() ) {
			if ( ere_is_user_restricted() ) {
				add_filter( 'show_admin_bar', '__return_false' );
			}
		}
	}

	add_action( 'init', 'ere_hide_admin_bar', 9 );
endif;