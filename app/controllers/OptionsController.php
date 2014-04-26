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
		$options = Option::General()->orderBy( 'created_at', 'desc' )->get();
		foreach ( $options as $option ) {
			//$options = array_add( $options, $option->optionKey, $option->optionValue );
			$options->put($option->optionKey,$option->optionValue);
		}
		return View::make( 'admin.index' )->with( array( 'options' => $options, 'title' => _( 'General Options' ), 'rightSide' => 'options/index' ) );
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postSave() {
		if ( Request::ajax() ) {
			$postData = Input::all();
			//todo validation yapılır gerekirse
			$cevap = array( 'status' => 'success', 'msg' => _( 'Options Saved' ) );
			foreach ( $postData['options'] as $key => $value ) {
				$opt=Option::where('optionType','=', $postData['type'])->where('optionKey','=', $key)->get();
				$cevap['msg'] .= $opt.'<br/>';
			}
			return Response::json( $cevap );
		}
	}

}