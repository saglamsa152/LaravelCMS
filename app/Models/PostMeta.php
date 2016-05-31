<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostMeta extends Model {
	use SoftDeletes;

	protected $table = 'postMeta';
	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'updated_at' );

	/**
	 * post tablosu ile ilişki ayarı
	 * postMeta.postId => post.id
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function post() {
		return $this->belongsTo( 'App\Models\PostModel', 'postId' );
	}

	/**
	 * @param $id  int "meta bilgisi alınacak  kullanıcı id"
	 * @param $key string "istenilen meta key"
	 *
	 * @return bool|mixed
	 */
	public static  function getMeta( $id, $key, $unserialize = false ) {
		$meta = self::where( 'metaKey', '=', $key )->where( 'postId', '=', $id )->pluck( 'metaValue' );
		if ( $unserialize ) $meta = unserialize( $meta );
		return is_null( $meta ) ? false : $meta;
	}

	/**
	 * @param $id int "meta bilgisi  eklenecek  kullanıcının id numarası"
	 * @param $key string
	 * @param $value
	 */
	public static  function setMeta( $id, $key, $value,$serialize = false  ) {
		if ( $serialize ) $value = serialize( $value );
		if ( false !== self::getMeta( $id, $key ) ) {
			self::where( 'postId', '=', $id )->where( 'metaKey', '=', $key )->update( array( 'metaValue' => $value ) );
		}
		else {
			self::create( array( 'postId' => $id, 'metaKey' => $key, 'metaValue' => $value ) );
		}
	}
}