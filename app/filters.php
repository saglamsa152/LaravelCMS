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
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string     $email The email address
	 * @param int|string $s     Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string     $d     Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string     $r     Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param bool       $img   True to return a complete IMG tag False for just the URL
	 * @param array      $atts  Optional, additional key/value attributes to include in the IMG tag
	 *
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	function get_gravatar( $email = null, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
		//todo before filtresinden kaldırılmalı heryerde kullanabilmek için yaptım böyle ama uygun değil gibi
		if(is_null($email))$email=Auth::user()->email;
		$url = 'http://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val ) {
				$url .= ' ' . $key . '="' . $val . '"';
			}
			$url .= ' />';
		}
		return $url;
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
	if ( Session::token() != Input::get( '_token' ) ) {
		throw new Illuminate\Session\TokenMismatchException;
	}
} );