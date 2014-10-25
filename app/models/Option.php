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
	 * @param string $key
	 * @param string $type
	 *
	 * @return bool|mixed
	 */
	public function getOption( $key, $type = null ) {
		if ( is_null( $type ) ) $type = 'general';
		$value = $this->where( 'optionKey', '=', $key )->where( 'optionType', '=', $type )->pluck( 'optionValue' );
		return is_null( $value ) ? false : $value;
	}

	public function setOption( $key, $value, $type = null ) {
		if ( is_null( $type ) ) $type = 'general';
		if ( $this->getOption( $key, $type ) !== false ) {
			$this->where( 'optionKey', '=', $key )->update( array( 'optionValue' => $value ) );
		}
		else {
			$this->create( array( 'optionKey' => $key, 'optionValue' => $value, 'optionType' => $type ) );
		}
	}


}