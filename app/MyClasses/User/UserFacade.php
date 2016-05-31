<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 31.05.2016
 * Time: 16:38
 */
namespace App\MyClasses\User;


use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'User'; }
}