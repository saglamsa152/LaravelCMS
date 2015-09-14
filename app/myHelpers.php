<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 26.04.2015
 * Time: 14:50
 * Bu dosya composer autoload ile sisteme dahil edilmektedir.
 *
 */
use Illuminate\Support\Facades\Auth;
/**
 * kullanıcı yetkisine göre yapabileceği işlemleri  belirliyen fonksiyon
 * todo bu işlem  Auth sınıfı  genişletilerek yapılmalı
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
		'viewUsers'            => [ 'admin', 'editor', 'user' ],
		'manageNews'           => [ 'admin', 'editor' ],
		'manageOptions'        => [ 'admin', 'editor', 'user' ],
		'manageGeneralOptions' => [ 'admin', 'editor' ],
		'manageSlider'         => [ 'admin', 'editor' ],
		'manageService'        => [ 'admin', 'editor' ],
		'manageProduct'        => [ 'admin', 'editor' ],
		'manageOrders'         => [ 'admin', 'editor' ],
		'manageContact'        => [ 'admin', 'editor' ],
		'manageDues'           => [ 'admin' ],
		'viewDashboard'        => [ 'admin', 'editor', 'user' ],
		'manageMailbox'        => [ 'admin', 'editor', 'user' ],
		'manageMailSettings'   => [ 'admin' ]
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

function fileManager(){
	return new FileManager();
}
