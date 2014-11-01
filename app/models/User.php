<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'created_ip' );
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/*
	 * 4.1 den 4.2 ye güncellleme klavuzunda yazıyor
	 */
	protected $dates = [ 'deleted_at' ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password' );

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {
		return $this->email;
	}

	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken( $value ) {
		$this->remember_token = $value;
	}

	public function getRememberTokenName() {
		return 'remember_token';
	}

	public function post() {
		return $this->hasMany( 'Post', 'author' );
	}

	public function userMeta() {
		return $this->hasMany( 'UserMeta', 'userId' );
	}

	/**
	 * Kullanıcı rolleri
	 * @return array
	 */
	public static  function getRoles() {
		return array( 'user'=>_('User'), 'admin'=>_('Admin') );
	}

}