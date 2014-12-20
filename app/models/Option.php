<?php

/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 21.02.2014
 * Time: 23:21
 */
class Option extends Eloquent {

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'updated_at' );

	public function scopeGeneral( $query ) {
		return $query->where( 'optionType', '=', 'general' );
	}

	/**
	 * @param      $key
	 * @param null $type
	 * @param bool $unserialize
	 *
	 * @return bool|mixed
	 */
	public static function getOption( $key, $type = null, $unserialize = false ) {
		//todo statik olmaları tavsiye edilmiyor FACEDES olayi iyi anlaşılmalı
		if ( is_null( $type ) ) $type = 'general';
		$value = self::where( 'optionKey', '=', $key )->where( 'optionType', '=', $type )->pluck( 'optionValue' );
		if ( $unserialize ) $value = unserialize( $value );
		return is_null( $value ) ? false : $value;
	}

	/**
	 * @param      $key
	 * @param      $value
	 * @param null $type
	 * @param bool $serialize
	 */
	public static function setOption( $key, $value, $type = null, $serialize = false ) {
		//todo statik olmaları tavsiye edilmiyor FACEDES olayi iyi anlaşılmalı
		if ( is_null( $type ) ) $type = 'general';
		if ( $serialize ) $value = serialize( $value );
		if ( self::getOption( $key, $type ) !== false ) {
			self::where( 'optionKey', '=', $key )->update( array( 'optionValue' => $value ) );
		}
		else {
			self::create( array( 'optionKey' => $key, 'optionValue' => $value, 'optionType' => $type ) );
		}
	}

	/**
	 * Yılın aylarını dizi olarak döner
	 * @return array
	 */
	public static function months() {
		return array( '01' => _( 'January' ), '02' => _( 'February' ), '03' => _( 'March' ), '04' => _( 'April' ), '05' => _( 'May' ), '06' => _( 'June' ), '07' => _( 'July ' ), '08' => _( 'August' ), '09' => _( 'September' ), '10' => _( 'October' ), '11' => _( 'November' ), '12' => _( 'December' ) );
	}
}