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

Route::get( '/services', array( 'as' => 'services', 'uses' => 'ServicesController@index' ) );
Route::get( '/products', array( 'as' => 'products', 'uses' => 'ProductsController@index' ) );
Route::get( '/contacts', array( 'as' => 'contacts', 'uses' => 'ContactsController@index' ) );
Route::get( '/', array( 'as' => 'home', 'uses' => 'HomeController@index' ) );

Route::controller( '/news', 'NewsController' );
Route::controller( '/admin', 'AdminController');