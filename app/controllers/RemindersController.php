<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind() {
		return View::make( 'password.remind' );
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind() {
		if ( Request::ajax() ) {
			switch ( $response = Password::remind( Input::only( 'email' ), function ( $message ) {
				$message->subject( _('Password Reminder') );
			} ) ) {
				case Password::INVALID_USER:
					$ajaxResponse = array( 'status' => 'danger', 'msg' => _( 'E-mail not found' ) );
					return Response::json( $ajaxResponse );

				case Password::REMINDER_SENT:
					$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Your request received. Please check your e-mails' ) );
					return Response::json( $ajaxResponse );
			}
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string $token
	 *
	 * @return Response
	 */
	public function getReset( $token = null ) {
		if ( is_null( $token ) ) App::abort( 404 );

		return View::make( 'password.reset' )->with( 'token', $token );
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset() {
		if ( Request::ajax() ) {
			$credentials = Input::only(
					'email', 'password', 'password_confirmation', 'token'
			);

			Password::validator( function ( $credentials ) {
				return strlen( $credentials['password'] ) >= 4; //minumum 4 karakter
			} );

			$response = Password::reset( $credentials, function ( $user, $password ) {
				$user->password = Hash::make( $password );

				$user->save();
			} );
			switch ( $response ) {
				case Password::INVALID_PASSWORD:
				case Password::INVALID_TOKEN:
				case Password::INVALID_USER:
					$ajaxResponse = array( 'status' => 'danger', 'msg' => Lang::get( $response ) );
					return Response::json( $ajaxResponse );

				case Password::PASSWORD_RESET:
					$ajaxResponse = array( 'status' => 'success', 'msg' => Lang::get( $response ), 'redirect' => URL::action( 'AdminController@getLogin' ) );
					return Response::json( $ajaxResponse );
			}
		}
	}

}
