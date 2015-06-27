<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Post;
use App\Models\Option;
use Illuminate\Support\Facades\Response;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		/**
		 * Post istelkerinde CSRF kontrolü
		 */
		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );
		View::share('mainMailAddress',Option::getOption( 'mainMailAddress' ));
	}

	public function getIndex() {
		$title=Option::getOption('siteName');
		$slides = Post::slider()->with('postMeta')->orderBy( 'created_at', 'desc' )->get();
		return View::make( 'home/index' )->with(compact('slides','title'));
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
		$title    = _( 'Services' );
		$services = Post::service()->with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->get();

		foreach ( $services as $service ) {
			foreach ( $service->postMeta as $meta ) {
				$service = array_add( $service, $meta->metaKey, $meta->metaValue );
			}
		}

		return View::make( 'services/index' )->with( compact('title','services' ) );
	}

	public function getMembership() {
		$title=_('Membership');
		return View::make( 'membership/index' )->with('title',$title);
	}

	public function getSource($source){
		echo Response::view(public_path('assets/admin/js/plugins/ResponsiveFilemanager/source/').$source);
	}
}