<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 01.01.2016
 * Time: 00:10
 */

namespace App\MyClasses\Post;


use Illuminate\Support\Facades\Facade;

class PostFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'Post'; }
}