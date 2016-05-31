<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 * Post Type:
 * -news
 * -slider
 * -service
 * -product
 *
 * Post Status:
 * -publish
 * -task
 * -trashed
 */
class PostModel extends Model {

	use SoftDeletes;

	protected $table= 'posts';

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $fillable = array( 'author', 'content', 'title', 'excerpt', 'status', 'type', 'url', 'created_ip' );

	/*
	 * 4.1 den 4.2 ye güncellleme klavuzunda yazıyor
	 */
	protected $dates = [ 'deleted_at' ];

	/**
	 * postMeta tablosu ile ilişki ayarı
	 * post.id => postMeta.postId
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function postMeta() {
		return $this->hasMany( 'App\Models\PostMeta', 'postId' );
	}

	/**
	 * user tablosu ile ilişki ayarı
	 * post.author => user.id
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo( 'App\Models\UserModel', 'author' );
	}

	/**
	 * Haberler için sorgu kapsamı haberlere Post::news(); ile ulaşılması için
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopeNews( $query ) {
		return $query->where( 'type', '=', 'news' );
	}

	/**
	 * Slider için sorgu kapsamı haberlere Post::slider(); ile ulaşılması için
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopeSlider( $query ) {
		return $query->where( 'type', '=', 'slider' );
	}

	/**
	 * Ürünler için sorgu kapsamı haberlere Post::product(); ile ulaşılması için
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopeProduct( $query ) {
		return $query->where( 'type', '=', 'product' );
	}

	/**
	 * Hizmetler için sorgu kapsamı haberlere Post::service(); ile ulaşılması için
	 *
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopeService( $query ) {
		return $query->where( 'type', '=', 'service' );
	}
}