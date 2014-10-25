<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 13.02.2014
 * Time: 13:49
 *
 * Post Type:
 * -news
 * -slider
 * -service
 * -product
 *
 * Post Status:
 * -publish
 */
class Post extends Eloquent {

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $fillable = array( 'author', 'content', 'title', 'excerpt', 'status', 'type', 'url', 'created_ip' );
	/**
	 * Belirsiz silme aktif
	 *
	 */
	use SoftDeletingTrait;
	/*
	 * 4.1 den 4.2 ye güncellleme klavuzunda yazıyor
	 */
	protected $dates = [ 'deleted_at' ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function postMeta() {
		return $this->hasMany( 'PostMeta', 'postId' );
	}

	public function user() {
		return $this->belongsTo( 'User', 'author' );
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