<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before( function ( $request ) {
	$accpetLanguages = Request::getLanguages();
	if ( strpos( $accpetLanguages[0], 'tr' ) !== false ) {
		$language = 'tr_TR';
	}
	elseif ( strpos( $accpetLanguages[0], 'en' ) !== false ) {
		$language = 'en_US';
	}
	// dili belirtiyoruz
	$language = $language . '.UTF-8';
	putenv( 'LC_ALL=' . $language );
	setlocale( LC_ALL, $language );

// burada hangi kataloğumuzu kullanacağımızı
// ve dil dosyaların hangi dizinde olduğunu
// yani: /diller/en_US/LC_MESSAGES/projemiz.po
	$katalog = 'ilklaravel';
	bindtextdomain( $katalog, __DIR__ . "/lang" );

// burada da kataloğumuzun adını belirtiyoruz.
	textdomain( $katalog );
	/**
	 * kullanıcı yetkisine göre yapabileceği işlemleri  belirliyen fonksiyon
	 * todo bu işle  Auth sınıfı  genişletilerek yapılmalı
	 *
	 * @param $action
	 *
	 * @return bool
	 */
	function userCan( $action ) {
		$user    = Auth::user();
		$result  = false;
		if(is_null($user))return $result;
		$actions = array(
				'manageUsers'          => [ 'admin', 'editor' ],
				'editUserRole'         => [ 'admin' ],
				'deleteUser'           => [ 'admin' ],
				'addUser'              => [ 'admin' ],
				'manageNews'           => [ 'admin', 'editor' ],
				'manageUserRole'       => [ 'admin' ],
				'manageOptions'        => [ 'admin', 'editor', 'user' ],
				'manageGeneralOptions' => [ 'admin', 'editor' ],
				'manageSlider'         => [ 'admin', 'editor' ],
				'manageService'        => [ 'admin', 'editor' ],
				'manageProduct'        => [ 'admin', 'editor' ],
				'manageOrders'         => [ 'admin', 'editor' ],
				'manageContact'        => [ 'admin', 'editor' ],
				'manageDues'           => [ 'admin' ],
				'viewDashboard'        => [ 'admin', 'editor', 'user' ]
		);
		if ( is_array( $action ) ) {
			foreach ( $action as $a ) {
				if ( array_key_exists( $a, $actions ) ) {
					$acceptRoles = $actions[$a];
					if ( in_array( $user->role, $acceptRoles ) ) $result = true;
				}
			}
		}
		else {
			if ( array_key_exists( $action, $actions ) ) {
				$acceptRoles = $actions[$action];
				if ( in_array( $user->role, $acceptRoles ) ) $result = true;
			}
		}

		return $result;
	}

} );


App::after( function ( $request, $response ) {
	//
} );

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter( 'auth', function () {
	if ( Auth::guest() ) return Redirect::guest( 'admin/login' )->withErrors( array( 'Bu işlemi yapabilmek için sisteme giriş yapmalısınız.' ) );
} );


Route::filter( 'auth.basic', function () {
	return Auth::basic();
} );

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter( 'guest', function () {
	if ( Auth::check() ) return Redirect::to( '/' );
} );

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter( 'csrf', function () {
	if ( Session::token() !== Input::get( '_token' ) ) {
		throw new Illuminate\Session\TokenMismatchException;
	}
} );