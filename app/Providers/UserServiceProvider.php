<?php namespace App\Providers;
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 31.05.2016
 * Time: 19:33
 */

use Illuminate\Support\ServiceProvider;
use App;

class UserServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('User', function()
        {
            return new \App\MyClasses\User\User;
        });
    }

}
