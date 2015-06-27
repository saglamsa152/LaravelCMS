<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model{
	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $guarded = array( 'id', 'created_at', 'updated_at' );

	/**
	 * users tablosu ile ilişki ayarı
	 * orders.userID => user.id
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(){
		return $this->belongsTo('App\Models\User','userId');
	}
}