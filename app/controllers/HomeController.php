<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct() {
		/**
		 * Post istelkerinde CSRF kontrolü
		 */
		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );

	}

	public function getIndex() {
		return View::make( 'home/index' );
	}

	/**
	 * News sayfasını  kontrol eder
	 *
	 * @param null $url
	 *
	 * @return \Illuminate\View\View
	 */
	public function getNews( $url = null ) {
		if ( is_null( $url ) ):
			$posts = Post::where( 'type', '=', 'news' )->paginate( 5 );
			return View::make( 'news/index' )->with( 'posts', $posts );
		else:
			$post = Post::whereRaw( "url= '$url'" )->first();
			return View::make( 'news/single' )->with( array( 'post' => $post, 'title' => $post->title ) );
		endif;
	}

	public function getContacts() {
		return View::make( 'contacts/index' );
	}

	public function getProducts() {
		return View::make( 'products/index' );
	}

	public function getServices() {
		return View::make( 'services/index' );
	}
}