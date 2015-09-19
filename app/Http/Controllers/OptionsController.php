<?php namespace App\Http\Controllers;

class OptionsController extends BaseController {
	public function __construct() {
		/**
		 * login ve register sayfaları  dışındaki  sayfalarda oturum kontrolü
		 */
		$this->middleware( 'auth' );
	}

	/**
	 * genel  ayarlar
	 */
	public function getIndex() {
		if ( userCan( 'manageGeneralOptions' ) ) {
			$title     = _( 'General Options' );
			$rightSide = 'options/index';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return \View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	public function getUserPreferences() {
		if ( userCan( 'manageOptions' ) ) {
			$title     = _( 'Site Preferences' );
			$rightSide = 'options/preferences';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return \View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postSave() {
		if ( \Request::ajax() ) {
			$postData = \Input::all();
			//todo validation yapılır gerekirse
			$type = $postData['type'];
			switch ( $type ) {
				case 'general':
					foreach ( $postData['options'] as $key => $value ) {
						\Option::setOption( $key, $value, $type );
					}
					$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Options Saved' ), 'redirect' => '' );
					break;
				case 'preference':
					foreach ( $postData['options'] as $key => $value ) {
						\UserMeta::setMeta( \Auth::user()->id, $key, $value );
					}
					$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Options Saved' ), 'redirect' => '' );
					break;
			}
			return response()->json( $ajaxResponse );
		}
	}

	/**
	 * post metodu ile gönderilen il koduna göre ilçeleri döner
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postCounties() {
		$city_id = \Input::get( 'city_id' );
		if ( is_null( $city_id ) ) return;
		$counties = \Option::getOption( 'counties', null, true );
		asort( $counties[$city_id] );
		array_unshift( $counties[$city_id], _( 'Select County' ) );
		return response()->json( $counties[$city_id] );
	}

}