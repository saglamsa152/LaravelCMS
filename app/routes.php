<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group( array( 'before' => 'auth' ), function () {
	Route::get( '/admin/profil/{id?}', array( 'as' => 'profil', 'uses' => 'AdminController@showProfile' ) );
} );

Route::post( '/admin/login', array( 'as' => 'login', 'uses' => 'AdminController@login', 'before' => 'csrf' ) );
//Route::post( '/admin/register', array( 'as' => 'register', 'uses' => 'AdminController@register', 'before' => 'csrf' ) );

Route::get( '/', array( 'as' => 'home', 'uses' => 'HomeController@getIndex' ) );

Route::controller( '/admin', 'AdminController');
Route::controller('/','HomeController');