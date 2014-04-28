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
		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );
	}

	/**
	 * genel  ayarlar
	 */
	public function getIndex() {
		$options   = new Option;
		$title     = _( 'General Options' );
		$rightSide = 'options/index';
		return View::make( 'admin.index' )->with( compact( 'options', 'title', 'rightSide' ) );
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
			$option=new Option();
			foreach ( $postData['options'] as $key => $value ) {
				$option->setOption( $key, $value, $type );
			}
			$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Options Saved' ) );
			return Response::json( $ajaxResponse );
		}
	}

}