<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->before( function ( $request ) {
			$accpetLanguages = Request::getLanguages();
			if ( strpos( $accpetLanguages[0], 'tr' ) !== false ) {
				$language = 'tr_TR';
			}
			elseif ( strpos( $accpetLanguages[0], 'en' ) !== false ) {
				$language = 'en_US';
			}
			// dili belirtiyoruz
			$language = $language . '.UTF-8';
			putenv( 'LC_ALL=' . $language );
			setlocale( LC_ALL, $language );

			// burada hangi kataloğumuzu kullanacağımızı
			// ve dil dosyaların hangi dizinde olduğunu
			// yani: /diller/en_US/LC_MESSAGES/projemiz.po
			$katalog = 'ilklaravel';
			bindtextdomain( $katalog, base_path("/resources/lang") );

			// burada da kataloğumuzun adını belirtiyoruz.
			textdomain( $katalog );

		} );

		$router->after( function ( $request, $response ) {
			//
		} );


	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
