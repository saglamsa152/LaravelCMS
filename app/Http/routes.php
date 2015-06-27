<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get( '/', array( 'as' => 'home', 'uses' => 'HomeController@getIndex' ) );
Route::controller( '/admin/options', 'OptionsController' );
Route::controller( '/admin', 'AdminController' );
Route::controller( '/password', 'RemindersController' );
Route::controller( '/', 'HomeController' );


/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
