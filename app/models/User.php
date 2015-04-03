<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * toplu atama yaparken hangi alanların kullanılmayacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_ip' );
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

	/**
	 * post tablosu ile ilişki ayarı
	 * user.id => post.author
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function post() {
		return $this->hasMany( 'Post', 'author' );
	}

	/**
	 * userMeta tablosu ile ilişki ayarı
	 * user.id => userMeta.userID
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function userMeta() {
		return $this->hasMany( 'UserMeta', 'userId' );
	}

	/**
	 * orders tablosu ile ilişki ayarı
	 * user.id => orders.userId
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function orders() {
		return $this->hasMany( 'Orders', 'userId' );
	}

	/**
	 * Kullanıcıların listelendiği tabloda kullanmak için kullanıcı rolüne uygun olarak
	 * bootstrap labeli döndürür
	 * @return string
	 */
	public function getHtmlStatus() {
		$labelClass = array( 'unapproved' => 'label-danger', 'admin' => 'label-success', 'user' => 'label-primary', 'editor' => 'label-warning' );
		return '<span class="label ' . $labelClass[$this->role] . '">' . $this->role . '</span>';
	}

	/**
	 * Kullanıcı rolleri
	 * @return array
	 */
	public static function getRoles() {
		return array( 'unapproved' => _( 'Unapproved' ), 'user' => _( 'User' ), 'editor' => _( 'Editor' ), 'admin' => _( 'Admin' ) );
	}

	/**
	 * Kullanıcı Rolünü döndürür
	 * @return mixed
	 */
	public function getRole() {
		$roles = self::getRoles();
		return $roles[$this->role];
	}

	/**
	 * Kulllanıcının profil resminin adresini döndürür
	 *
	 * eğer bir avatar yüklenmemişse gravatar adresini döndürür
	 *
	 * @param int    $s
	 * @param string $d
	 * @param string $r
	 *
	 * @return mixed|string
	 */
	public function getAvatarUrl( $s = 80, $d = 'mm', $r = 'g' ) {
		$user = $this;
		foreach ( $user->userMeta as $meta ) {
			$user = array_add( $user, $meta->metaKey, $meta->metaValue );
		}
		if ( $user->avatar == null ) { //get_gravatar
			$avatar_url = 'http://www.gravatar.com/avatar/';
			$avatar_url .= md5( strtolower( trim( $user->email ) ) );
			$avatar_url .= "?s=$s&d=$d&r=$r";
		}
		else $avatar_url = $user->avatar;
		return $avatar_url;
	}

	public function getScreenName() {
		return $this->name != '' ? $this->name . ' ' . $this->lastName : $this->username;
	}

	/**
	 * Kullanıcı adına dues tablosnuna kaydedilmiş yılları döner
	 * @return array
	 */
	public function getDuesYears() {
		$years = array();
		foreach ( $this->dues as $dues ):
			$years[$dues->year] = $dues->year;
		endforeach;
		return $years;
	}

	/**
	 * Kullanıcı Şehir bilgisini metin olarak döner
	 * @return mixed
	 */
	public function getCityName(){
		if(isset($this->city)){
			$cities=Option::getOption('cities',null,true);
			return $cities[$this->city];
		}
	}
}