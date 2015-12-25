<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $table='category';

    /**
     * toplu atama yaparken hangi alanların kullanılmayacağını belirler (laravel kitap s145)
     * @var array
     */
    protected $guarded = array( 'id', 'created_at', 'updated_at' );
}