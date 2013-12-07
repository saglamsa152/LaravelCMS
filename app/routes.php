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

Route::get( '/', array('as'=> 'home','uses'=>'HomeController@index'));
Route::get( '/news',array('as'=>'news','uses'=>'NewsController@index'));
Route::get( '/services',array('as'=>'services','uses'=>'ServicesController@index'));
Route::get( '/products',array('as'=>'products','uses'=>'ProductsController@index'));
Route::get( '/contacts',array('as'=>'contacts','uses'=>'ContactsController@index'));
Route::get( '/admin',array('as'=>'admin','uses'=>'AdminController@index'));
Route::get( '/admin/users',array('as'=>'admin/users','uses'=>'AdminController@listUser'));
