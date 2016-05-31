<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

	protected $table = 'userMeta';
	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'updated_at' );

	/**
	 * user tablosu ile ilişki ayarı
	 * userMeta.userId => user.id
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo( 'App\Models\UserModel', 'userId' );
	}

	/**
	 * @param $id  int "meta bilgisi alınacak  kullanıcı id"
	 * @param $key string "istenilen meta key"
	 *
	 * @return bool|mixed
	 */
	public static  function getMeta( $id, $key, $unserialize = false ) {
		$meta = self::where( 'metaKey', '=', $key )->where( 'userId', '=', $id )->pluck( 'metaValue' );
		if ( $unserialize ) $meta = unserialize( $meta );
		return is_null( $meta ) ? false : $meta;
	}

	/**
	 * @param $id int "meta bilgisi  eklenecek  kullanıcının id numarası"
	 * @param $key string
	 * @param $value
	 */
	public static  function setMeta( $id, $key, $value, $serialize = false ) {
		if ( $serialize ) $value = serialize( $value );
		if ( false !== self::getMeta( $id, $key ) ) {
			self::where( 'userId', '=', $id )->where( 'metaKey', '=', $key )->update( array( 'metaValue' => $value ) );
		}
		else {
			self::create( array( 'userId' => $id, 'metaKey' => $key, 'metaValue' => $value ) );
		}
	}

}