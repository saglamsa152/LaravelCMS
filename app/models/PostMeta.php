<?php

/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 21.02.2014
 * Time: 23:19
 */
class PostMeta extends Eloquent {

	protected $table = 'postMeta';
	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'updated_at' );

	public function post() {
		return $this->belongsTo( 'Post', 'id' );
	}

	/**
	 * @param $id  meta bilgisi alınacak  kullanıcı id
	 * @param $key istenilen meta key
	 *
	 * @return bool|mixed
	 */
	public function getMeta( $id, $key, $unserialize = false ) {
		$meta = $this->where( 'metaKey', '=', $key )->where( 'postId', '=', $id )->pluck( 'metaValue' );
		if ( $unserialize ) $meta = unserialize( $meta );
		return is_null( $meta ) ? false : $meta;
	}

	/**
	 * @param $id meta bilgisi  eklenecek  kullanıcının id numarası
	 * @param $key
	 * @param $value
	 */
	public function setMeta( $id, $key, $value,$serialize = false  ) {
		if ( $serialize ) $value = serialize( $value );
		if ( false !== $this->getMeta( $id, $key ) ) {
			$this->where( 'postId', '=', $id )->where( 'metaKey', '=', $key )->update( array( 'metaValue' => $value ) );
		}
		else {
			$this->create( array( 'postId' => $id, 'metaKey' => $key, 'metaValue' => $value ) );
		}
	}
}