<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\PostModel;
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
		$slides = PostModel::slider()->with('postMeta')->orderBy( 'created_at', 'desc' )->get();
		$contentName='default';
		return View::make( 'home/index' )->with(compact('slides','title','contentName'));
	}

	/**
	 * News sayfasını  kontrol eder
	 *
	 * @param null $url
	 *
	 * @return \Illuminate\View\View
	 */
	public function getBlog($url = null ) {
		if ( is_null( $url ) ):
			$posts      = PostModel::news()->with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->paginate( 5 );
			foreach ( $posts as $post ) {
				foreach ( $post->postMeta as $meta ) {
					$post = array_add( $post, $meta->metaKey, $meta->metaValue );
				}
			}
			$title=_('Blog');
			$contentName='blog';
			return View::make( 'home/index' )->with( compact('posts','title','contentName') );
		else:
			$post      = PostModel::news()->with( 'postMeta', 'user' )->whereRaw( "url= '$url'" )->first();
			foreach ( $post->postMeta as $meta ) {
				$post = array_add( $post, $meta->metaKey, $meta->metaValue );
			}
			$title=$post->title;
			$contentName='blogSingle';
			return View::make( 'home/index' )->with(compact('post','title','contentName') );
		endif;
	}

	public function getContact() {
		$title=_('Contact');
		$contentName='contact';
		return View::make( 'home/index' )->with(compact('title','contentName') );
	}

	public function getAbout() {
		$title=_('About');
		$contentName='about';
		return View::make( 'home/index' )->with(compact('title','contentName') );
	}

	public function getProducts() {
		$title=_('Products');
		$contentName='products';
		return View::make( 'home/index' )->with(compact('title','contentName' ));
	}

	public function getServices() {
		$title    = _( 'Services' );
		$services = PostModel::service()->with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->get();

		foreach ( $services as $service ) {
			foreach ( $service->postMeta as $meta ) {
				$service = array_add( $service, $meta->metaKey, $meta->metaValue );
			}
		}
		$contentName='services';
		return View::make( 'home/index' )->with( compact('title','services','contentName' ) );
	}

	public function getSource($source){
		echo Response::view(public_path('assets/admin/js/plugins/ResponsiveFilemanager/source/').$source);
	}
}