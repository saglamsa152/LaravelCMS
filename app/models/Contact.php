<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 21.02.2014
 * Time: 23:22
 */
class Contact extends Eloquent {

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array('id', 'created_at', 'updated_at');


}