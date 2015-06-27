<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array('id', 'created_at', 'updated_at');


}