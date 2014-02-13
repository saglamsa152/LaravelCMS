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
	Route::get( '/admin/users', array( 'as' => 'admin/users', 'uses' => 'AdminController@listUser' ) );
	Route::get( '/admin/posts', array( 'as' => 'admin/posts', 'uses' => 'AdminController@listPost' ) );
	Route::get( '/admin', array( 'as' => 'admin', 'uses' => 'AdminController@index' ) );
} );

Route::get( '/admin/login', array( 'as' => 'loginForm', 'uses' => 'AdminController@loginForm' ) );
Route::post( '/admin/login', array( 'as' => 'login', 'uses' => 'AdminController@login', 'before' => 'csrf' ) );
Route::get( '/admin/register', array( 'as' => 'registerForm', 'uses' => 'AdminController@registerForm' ) );
Route::post( '/admin/register', array( 'as' => 'register', 'uses' => 'AdminController@register', 'before' => 'csrf' ) );
Route::get( '/admin/logout', array( 'as' => 'logout', 'uses' => 'AdminController@logout' ) );

Route::get( '/services', array( 'as' => 'services', 'uses' => 'ServicesController@index' ) );
Route::get( '/products', array( 'as' => 'products', 'uses' => 'ProductsController@index' ) );
Route::get( '/contacts', array( 'as' => 'contacts', 'uses' => 'ContactsController@index' ) );
//Route::get( '/news', array( 'as' => 'news', 'uses' => 'NewsController@index' ) );
Route::get( '/', array( 'as' => 'home', 'uses' => 'HomeController@index' ) );

Route::controller( '/news', 'NewsController' );