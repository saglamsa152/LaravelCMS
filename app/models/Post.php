<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 13.02.2014
 * Time: 13:49
 */

class Post extends Eloquent {

	/**
	 * toplu atama yaparken hangi alanların kullanılacağını belirler (laravel kitap s145)
	 * @var array
	 */
	protected $fillable = array('author', 'content', 'title','excerpt', 'status', 'type','created_ip');
} 