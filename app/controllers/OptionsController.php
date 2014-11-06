<?php

/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 23.04.2014
 * Time: 22:01
 */
class OptionsController extends BaseController {
	public function __construct() {
		/**
		 * login ve register sayfaları  dışındaki  sayfalarda oturum kontrolü
		 */
		$this->beforeFilter( 'auth' );
		/**
		 * Post istelkerinde CSRF kontrolü
		 */
		$this->beforeFilter( 'csrf', array( 'on' => 'post', 'except' => array( 'postCounties' ) ) );
	}

	/**
	 * genel  ayarlar
	 */
	public function getIndex() {
		$title     = _( 'General Options' );
		$rightSide = 'options/index';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postSave() {
		if ( Request::ajax() ) {
			$postData = Input::all();
			//todo validation yapılır gerekirse
			//todo save işlemi yapılacak
			$type = $postData['type'];
			foreach ( $postData['options'] as $key => $value ) {
				Option::setOption( $key, $value, $type );
			}
			$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Options Saved' ) );
			return Response::json( $ajaxResponse );
		}
	}

	/**
	 * post metodu ile gönderilen il koduna göre ilçeleri döner
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postCounties() {
		$city_id = Input::get('city_id');
		if ( is_null( $city_id ) ) return;
		$counties = unserialize( Option::getOption( 'counties' ) );
		asort($counties[$city_id]);
		array_unshift($counties[$city_id],_('Select County'));
		return Response::json( $counties[$city_id] );
	}

}