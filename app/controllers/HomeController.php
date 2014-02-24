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
			$posts = Post::news()->orderBy('created_at','desc')->paginate( 5 );
			return View::make( 'news/index' )->with( 'posts', $posts );
		else:
			$post = Post::news()->whereRaw( "url= '$url'" )->first();
			return View::make( 'news/single' )->with( array( 'post' => $post, 'title' => $post->title ) );
		endif;
	}

	public function getContacts() {
		$title=_('Contact');
		return View::make( 'contacts/index' )->with('title',$title);
	}

	public function getProducts() {
		$title=_('Products');
		return View::make( 'products/index' )->with('title',$title);
	}

	public function getServices() {
		$title=_('Services');
		return View::make( 'services/index' )->with('title',$title);
	}
}