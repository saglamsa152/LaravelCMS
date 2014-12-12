<?php

class AdminController extends BaseController {
	public function __construct() {
		/**
		 * login ve register sayfaları  dışındaki  sayfalarda oturum kontrolü
		 */
		$this->beforeFilter( 'auth', array( 'except' => array( 'getLogin', 'getRegister', 'postLogin', 'postRegister' ) ) );
		/**
		 * Post istelkerinde CSRF güvenlik kontrolü
		 */
		$this->beforeFilter( 'csrf', array( 'on' => 'post', 'except' => 'postMarkAsReadContact' ) );
	}

	/**
	 * admin ana sayfasına yönlendirir
	 * @return mixed
	 */
	public function getIndex() {
		if ( userCan( 'viewDashboard' ) ) {
			$title     = _( 'Admin Panel' );
			$rightSide = 'default';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin/index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * Kullanıcı oturumunu sonlandırır
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getLogout() {
		Auth::logout();
		return Redirect::home();
	}

	/**
	 * Üye ol sayfası
	 * @return \Illuminate\View\View
	 */
	public function getRegister() {
		$title = _( 'Register Page' );
		return View::make( 'admin.register' )->with( 'title', $title );
	}

	/**
	 * Admin panel giriş sayfasını gösterir
	 * @return mixed
	 */
	public function getLogin() {
		$title = _( 'Login Page' );
		return View::make( 'admin.login' )->with( 'title', $title );
	}

	/* User */
	/**
	 * Admin panel users sayfasını açar
	 * @return mixed
	 */
	public function getUsers() {
		if ( userCan( 'manageUsers' ) ) {
			$title     = _( 'Members' );
			$rightSide = 'list/users';
			$users     = User::all();
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'users', 'title', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * @param null $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function getProfile( $id = null ) {
		/*
		 * Eğer kullanıcının kullanıcıları düzenleme yetkisi yok ise
		 * veya id değeri null  ise kullanıcının kendi  sayfası gösterilsin
		 */
		if ( !userCan( 'manageUsers' ) || is_null( $id ) ) {
			$id = Auth::user()->id;
		}
		$user = User::with( 'post' )->find( $id );//Kullanıcıya ait  gönderilerle birlikte kullanıcıyı getiriyoruz
		foreach ( $user->userMeta as $meta ) {
			$user = array_add( $user, $meta->metaKey, $meta->metaValue );
		}
		$user->name != '' ? $title = $user->name . ' ' . $user->lastName . ( ' Profile Page' ) : $title = $user->username . ( ' Profile Page' );
		$rightSide = 'profile';
		return View::make( 'admin.index' )->with( compact( 'user', 'title', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddUser() {
		if ( userCan( 'addUser' ) ) {
			$title     = _( 'Add New Member' );
			$rightSide = 'add/user';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postUpdateUser() {
		if ( Request::ajax() ) {
			$postData = Input::all();
			//kurallar
			$rules = array(
					'username' => 'required|min:3',
					'email'    => 'required|email'
			);
			// todo  ingilzce  tercüme
			$messages  = array(
					'username.required' => _( 'Bir kullanıcı adı tanımlamalısınız' ),
					'content.required'  => _( 'Bir e-mail belirtmelisiniz' ),
					'username.unique'   => _( 'Kullanıcı adı kullanılıyor' ),
					'email.unique'      => _( 'Mail adresi kullanılıyor' ),
					'username.min'      => _( 'Kullanıcını adınız en az 3 karakterden oluşmalıdır' ),
			);
			$validator = Validator::make( $postData, $rules, $messages );

			if ( $validator->fails() ) {
				$ajaxResponse = array( 'status' => 'danger', 'msg' => $validator->messages()->toArray() ); //todo  burası  olmuyor
				return Response::json( $ajaxResponse );
			}
			else {
				$user = User::find( $postData['id'] );
				// meta bilgilerini  dizinen çıkartalım
				$metas = array_pull( $postData, 'meta' );
				// yeni bilgileri güncelleyelim
				$user->fill( $postData )->push();
				foreach ( $metas as $key => $value ) {
					if ( is_null( $value ) ) continue;
					UserMeta::setMeta( $postData['id'], $key, $value );
				}
				$response = array( 'status' => 'success', 'msg' => 'Saved successfully', 'redirect' => URL::action( 'AdminController@getProfile', $postData['id'] ) );
				return Response::json( $response );
			}
		}
	}


	public function postAddUser() {
		if ( Request::ajax() ) {
			$postData = Input::all();
			//kurallar
			$rules = array(
					'username' => 'required|min:3|unique:users,username',
					'email'    => 'required|email|unique:users,email'
			);
			// todo  ingilzce  tercüme
			$messages  = array(
					'username.required' => _( 'Bir kullanıcı adı tanımlamalısınız' ),
					'content.required'  => _( 'Bir e-mail belirtmelisiniz' ),
					'username.unique'   => _( 'Kullanıcı adı kullanılıyor' ),
					'email.unique'      => _( 'Mail adresi kullanılıyor' ),
					'username.min'      => _( 'Kullanıcını adınız en az 3 karakterden oluşmalıdır' ),
			);
			$validator = Validator::make( $postData, $rules, $messages );

			if ( $validator->fails() ) {
				$ajaxResponse = array( 'status' => 'danger', 'msg' => $validator->messages()->toArray() );
				return Response::json( $ajaxResponse );
			}
			else {
				$password = str_random( 6 );
				//meta verileini diziden çıkartalım ve $userMeta değişkenine atayalım
				$userMeta = array_pull( $postData, 'meta' );
				//password ve created_ip alanlarını  diziye ekleyelim
				$postData['password']   = Hash::make( $password );
				$postData['created_ip'] = Request::getClientIp();
				$user                   = User::create( $postData );

				$mailData = array( 'username' => $postData['username'], 'password' => $password );
				Mail::send( 'emails.welcome', $mailData, function ( $message ) use ( $postData ) {
					$message->to( $postData['email'], $postData['name'] . ' ' . $postData['lastName'] )->subject( 'Hoş geldiniz!' );
				} );

				$modelUserMeta = array();
				foreach ( $userMeta as $key => $value ) {
					$modelUserMeta[] = new UserMeta( array( 'metaKey' => $key, 'metaValue' => $value ) );
				}
				$user->userMeta()->saveMany( $modelUserMeta );
				$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Yeni Üye oluşturuldu' ), 'redirect' => URL::action( 'AdminController@getProfile', $user->id ) );
				return Response::json( $ajaxResponse );
			}
		}
	}

	public function postUpdateUserPassword() {
		$postData = Input::all();
		$rules    = array(
				'currentPassword'       => 'required',
				'password'              => 'required|min:4|confirmed',
				'password_confirmation' => 'required'
		);
		// todo  İngilizce  tercüme yapılacak
		$messages  = array(
				'currentPassword.required'       => _( 'Lütfen şuanki şifrenizi yazın' ),
				'password.required'              => _( 'Lütfen şifrenizi yazın' ),
				'password.min'                   => _( 'Şifreniz minumum 4 karakterden oluşmalıdır' ),
				'password.confirmed'             => _( 'Girdiğiniz şifreler birbiriyle eşleşmiyor' ),
				'password_confirmation.required' => _( 'Lütfen şifrenizi doğrulayın' )
		);
		$validator = Validator::make( $postData, $rules, $messages );

		if ( $validator->fails() ) {
			$ajaxResponse = array( 'status' => 'danger', 'msg' => $validator->messages()->toArray() );
			return Response::json( $ajaxResponse );
		}
		else {
			if ( isset( $postData['id'] ) ) {
				$user = User::findOrFail( $postData['id'] );
				if ( $postData['currentPassword'] !== $postData['password'] ) {
					if ( Hash::check( $postData['currentPassword'], $user->getAuthPassword() ) ) {
						$user->password = Hash::make( $postData['password'] );
						$user->save();
						$ajaxResponse = array( 'status' => 'info', 'msg' => '' );
					}
					else {
						$ajaxResponse = array( 'status' => 'danger', 'msg' => array( 'currentPassword' => _( 'Incorrect Password' ) ) );
					}
				}
				else $ajaxResponse = array( 'status' => 'danger', 'msg' => array( 'password' => _( 'Passwords mustn\'t same' ) ) );
			}
			return Response::json( $ajaxResponse );
		}
	}

	public function postDeleteUser() {
		if ( Request::ajax() ) {
			$ids = (array) Input::get( 'id' );
			if ( !is_null( $ids ) ) {
				if ( !in_array( '1', $ids ) ):
					User::destroy( $ids );
					$response = array( 'status' => 'success', 'msg' => _( 'Deleted Successfully' ), 'redirect' => URL::action( 'AdminController@getUsers' ) );
				else:
					$response = array( 'status' => 'danger', 'msg' => _( 'Admin can not be delete' ) );
				endif;
			}
			return Response::json( $response );
		}
	}

	public function postApproveUser() {
		try {
			if ( Request::ajax() ) {
				$ids = (array) Input::get( 'id' );
				if ( !is_null( $ids || !empty( $ids ) ) ) {
					$users = User::find( $ids );
					foreach ( $users as $user ) {
						if ( $user->role == 'unapproved' ) $user->role = 'user';
						else if ( $user->id != '1' ) $user->role = 'unapproved';
						$user->save();
					}
					$response = array( 'status' => 'success', 'msg' => _( 'Successful' ), 'redirect' => URL::action( 'AdminController@getUsers' ) );
				}
			}
		} catch ( Exception $e ) {
			$response = array( 'status' => 'danger', 'msg' => $e->getMessage() );
		}
		return Response::json( $response );
	}

	/* News */
	/**
	 * @return \Illuminate\View\View
	 */
	public function getNews() {
		if ( userCan( 'manageNews' ) ) {
			$title     = _( 'News Management Page' );
			$rightSide = 'list/news';
			$news      = Post::news()->with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->get();
			foreach ( $news as $new ) {
				foreach ( $new->postMeta as $meta ) {
					$new = array_add( $new, $meta->metaKey, $meta->metaValue );
				}
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide', 'news' ) )->withErrors( $error );
	}

	/**
	 * Yeni gönderi oluşturma sayfası
	 */
	public function getAddNews() {
		if ( userCan( 'manageNews' ) ) {
			$title     = 'New Post';
			$rightSide = 'add/news';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * @param null $id
	 *
	 * @return bool|\Illuminate\View\View
	 */
	public function getUpdateNews( $id = null ) {
		if ( is_null( $id ) ) return false;
		if ( userCan( 'manageNews' ) ) {
			$title     = _( 'Update News' );
			$news      = Post::news()->with( 'postMeta' )->find( $id );
			$rightSide = 'update/news';
			foreach ( $news->postMeta as $meta ) {
				$news = array_add( $news, $meta->metaKey, $meta->metaValue );
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide', 'news' ) )->withErrors( $error );
	}

	/* Slider */

	/**
	 * @return \Illuminate\View\View
	 */
	public function getSlider() {
		if ( userCan( 'manageSlider' ) ) {
			$title     = _( 'Slider Management Page' );
			$slides    = Post::slider()->with( 'postMeta' )->orderBy( 'created_at', 'desc' )->get();
			$rightSide = 'list/slider';
			foreach ( $slides as $slide ) {
				foreach ( $slide->postMeta as $meta ) {
					$slide = array_add( $slide, $meta->metaKey, $meta->metaValue );
				}
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'slides', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 *
	 *
	 *
	 */
	public function postUpdateSlide() {
		try {
			$slides = Input::only( 'slide' );
			$slides = $slides['slide'];
			foreach ( $slides as $id => $slide ) {
				$post  = Post::find( $id );
				$metas = array_pull( $slide, 'meta' );// diziden metaların tutulduğu diziyi  alıyoruz
				$post->fill( $slide )->push();// meta hariç  diğer bilgileri  kaydediyoruz.
				if ( !empty( $metas ) ) {
					foreach ( $metas as $key => $value ) {
						if ( is_null( $value ) ) continue;
						PostMeta::setMeta( $id, $key, $value );// meta varsa ve boş değilse metaları kaydediyoruz
					}
				}
			}
			$response = array( 'status' => 'success', 'msg' => '' );
		} catch ( Exception $e ) {
			$response = array( 'status' => 'danger', 'msg' => $e->getMessage() );
		}
		return Response::json( $response );
	}

	public function postUploadSliderImage() {
		$allowed = array( 'png', 'jpg', 'gif' );
		$file    = Input::file( 'fileupload' );
		if ( Input::hasFile( 'fileupload' ) && $file->getError() == 0 ) {

			$extension = $file->getClientOriginalExtension();

			if ( !in_array( strtolower( $extension ), $allowed ) ) {
				$response = array( 'status' => 'danger', 'msg' => _( 'Extension not allowed' ) );
				return Response::json( $response );
			}
			if ( $file->move( public_path() . '/assets/uploads/slider/', $file->getClientOriginalName() ) ) {
				$response = array( 'status' => 'success', 'msg' => _( 'File uploaded successfully' ), 'url' => '/assets/uploads/slider/' . $file->getClientOriginalName() );
				return Response::json( $response );
			}

		}
		else {
			$response = array( 'status' => 'danger', 'msg' => Input::file( 'fileupload' )->getErrorMessage() );
			return Response::json( $response );
		}
	}

	/* Services */

	/**
	 * @return \Illuminate\View\View
	 */
	public function getServices() {
		if ( userCan( 'manageService' ) ) {
			$title     = _( 'Services' );
			$services  = Post::with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->service()->get();
			$rightSide = 'list/services';
			foreach ( $services as $service ) {
				foreach ( $service->postMeta as $meta ) {
					$service = array_add( $service, $meta->metaKey, $meta->metaValue );
				}
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'services', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddService() {
		if ( userCan( 'manageService' ) ) {
			$title     = _( 'Add New Service' );
			$rightSide = 'add/service';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	public function getUpdateService( $id = null ) {
		if ( is_null( $id ) ) return false;
		if ( userCan( 'manageService' ) ) {
			$title     = _( 'Update News' );
			$rightSide = 'update/service';
			$service   = Post::service()->with( 'postMeta' )->find( $id );
			foreach ( $service->postMeta as $meta ) {
				$service = array_add( $service, $meta->metaKey, $meta->metaValue );
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide', 'service' ) )->withErrors( $error );
	}

	/* Products */

	/**
	 * @return \Illuminate\View\View
	 */
	public function getProducts() {
		if ( userCan( 'manageProduct' ) ) {
			$title     = _( 'Products' );
			$products  = Post::with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->product()->get();
			$rightSide = 'list/products';
			foreach ( $products as $product ) {
				foreach ( $product->postMeta as $meta ) {
					$product = array_add( $product, $meta->metaKey, $meta->metaValue );
				}
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'products', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddProduct() {
		if ( userCan( 'manageProduct' ) ) {
			$title     = _( 'Add New Product' );
			$rightSide = 'add/product';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	public function getUpdateProduct( $id = null ) {
		if ( is_null( $id ) ) return false;
		if ( userCan( 'manageProduct' ) ) {
			$title     = _( 'Update News' );
			$rightSide = 'update/product';
			$product   = Post::product()->with( 'postMeta' )->find( $id );
			foreach ( $product->postMeta as $meta ) {
				$product = array_add( $product, $meta->metaKey, $meta->metaValue );
			}
			$error = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.update.product' )->with( compact( 'title', 'rightSide', 'product' ) )->withErrors( $error );
	}

	/* Contacts */

	/**
	 * @return \Illuminate\View\View
	 */
	public function getContacts() {
		if ( userCan( 'manageContact' ) ) {
			$title     = _( 'Cotacts' );
			$rightSide = 'list/contacts';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	/**
	 * İletişim işlemleri
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddContact() {
		//todo veri tabanına kayıt yerine direk mail olarak gönderilir ve contact sayfasında ilgili mail hesabı açılır
		$postData = Input::all();

		$rules = array(
				'name'    => 'required|min:3|alpha_dash',
				'email'   => 'required|email',
				'message' => 'required|min:10',
		);
		// todo  İngilizce  tercüme yapılacak
		$messages  = array(
				'email.required'   => _( 'Lütfen mail adresinizi yazın' ),
				'email.email'      => _( 'Lütfen geçerli bir mail adresi yazın' ),
				'name.required'    => _( 'Please Enter Your Name' ),
				'name.min'         => _( 'İsim en az 3 karakter olabilir' ),
				'name.alpha_dash'  => _( 'İsimda sadece harf kullanınız' ),
				'message.required' => _( 'Please enter message' ),
				'message.min'      => _( 'Mesaj en  az 10 karakter olabilir.' )
		);
		$validator = Validator::make( $postData, $rules, $messages );

		if ( $validator->failed() ) {
			return Redirect::action( 'HomeController@getContacts' )->withErrors( $validator->messages() )->withInput();
		}
		else {
			$meta = array(
					'name'  => $postData['name'],
					'email' => $postData['email']
			);
			Contact::create( array(
					'meta'    => serialize( $meta ),
					'message' => $postData['message'],
					'isRead'  => false
			) );
			//todo Options modelinden contact mail  adresini alıp  o  adrese mail  olarak  da  yollanacak
			return Redirect::action( 'HomeController@getIndex' );
		}
	}

	/**
	 * İletişim mesajını okundu yada okunmadı olarak işaretler
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postMarkAsReadContact() {
		if ( Request::ajax() ) {
			$ids = (array) Input::get( 'id' );
			is_null( Input::get( 'toggle' ) ) ? $toggle = true : $toggle =  Input::get( 'toggle' );
			if ( !is_null( $ids || !empty( $ids ) ) ) {
				$contacts = Contact::find( $ids );
				foreach ( $contacts as $contact ) {
					filter_var( $toggle, FILTER_VALIDATE_BOOLEAN ) ? $contact->isRead = !$contact->isRead : $contact->isRead = true;
					$contact->save();
				}
				$response = array( 'status' => 'success', 'msg' => _( 'Successful' ) . $toggle, 'redirect' => '' );
				return Response::json( $response );
			}
		}
	}

	public function postAnswerContact() {
		if ( Request::ajax() ) {
			try {
				$postData = Input::only( array( 'email', 'subject', 'answer', 'name' ) );
				$mailData = array( 'answer' => $postData['answer'] );
				Mail::send( 'emails.contact', $mailData, function ( $message ) use ( $postData ) {
					$message->to( $postData['email'], $postData['name'] )->subject( $postData['subject'] );
				} );
				$response = array( 'status' => 'success', 'msg' => _( 'Mail send Successfully' ), 'redirect' => '' );
			} catch ( Exception $e ) {
				$response = array( 'status' => 'danger', 'msg' => $e->getMessage() );
			}
			return Response::json( $response );
		}
	}

	public function postDeleteContact() {
		if ( Request::ajax() ) {
			try {
				$ids = (array) Input::get( 'id' );
				if ( !is_null( $ids || !empty( $ids ) ) ) {
					Contact::destroy( $ids );
					$response = array( 'status' => 'success', 'msg' => _( 'Mail Delete Successfully' ), 'redirect' => '' );
				}
			} catch ( Exception $e ) {
				$response = array( 'status' => 'danger', 'msg' => $e->getMessage() );
			}
			return Response::json( $response );
		}
	}

	/* Orders */

	/**
	 * @return \Illuminate\View\View
	 */
	public function getOrders() {
		if ( userCan( 'manageOrders' ) ) {
			$title     = _( 'Orders' );
			$rightSide = 'list/orders';
			$error     = null;
		}
		else {
			$title     = _( 'Permission Error' );
			$rightSide = 'error';
			$error     = _( 'You do not have permission to access this page' );
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) )->withErrors( $error );
	}

	/*
	 * post istekleri
	 */

	/**
	 * Login işlemini denetler
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postLogin() {
		// POST İLE GÖNDERİLEN DEĞERLERİ ALALIM.
		$postData = Input::all();
		isset( $postData['remember'] ) ? $remember = true : $remember = false;

		// FORM KONTROLLERİNİ BELİRLEYELİM
		$rules = array(
				'username' => 'required',
				'password' => 'required'
		);

		// HATA MESAJLARINI OLUŞTURALIM
		$messages = array(
				'username.required' => _( 'Please enter user name' ),
				'password.required' => _( 'Please enter password' )
		);
		// Kontrol (Validation) işlemlerini gerçekleştirelim
		$validator = Validator::make( $postData, $rules, $messages );

		if ( $validator->fails() ) {
			//validator işlemi  olumsuzsa hata mesajlarını ve input değerlerini
			return Redirect::action( 'AdminController@getLogin' )->withInput()->withErrors( $validator->messages() );
		}
		else {
			//kontroller doğruysa böyle bir kullanıcı olup olmadığına bakalım
			if ( Auth::attempt( array( 'username' => $postData['username'], 'password' => $postData['password'] ), $remember ) ) {
				//oturum açılmış oldu
				return Redirect::intended( '/admin' ); //todo action kullanılacak  şekilde düzenlenmeli
			}
			else {
				//girilen bilgiler hatalı mesajı verelim
				return Redirect::action( 'AdminController@getLogin' )->withInput()->withErrors( array( 'Girdiğiniz bilgiler yanlış' ) );
			}
		}
	}

	/**
	 * Yeni üye kaydını denetler
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postRegister() {
		$postData = Input::all();

		$rules = array(
				'email'                 => 'required|email|unique:users,email',
				'username'              => 'required|min:3|unique:users,username',
				'password'              => 'required|min:4|confirmed',
				'password_confirmation' => 'required'
		);
		// todo  İngilizce  tercüme yapılacak
		$messages  = array(
				'username.required'              => _( 'Lütfen kullanıcı adınızı yazın' ),
				'username.min'                   => _( 'Kullanıcını adınız en az 3 karakterden oluşmalıdır' ),
				'username.unique'                => _( 'Bu kullanıcı adı zaten kullanılıyor. Lütfen başka bir kullanıcı adı yazın' ),
				'username.alpha_dash'            => _( 'Lütfen özel karakter ve boşluk içermeyen kullanıcı adı yazın' ),
				'email.required'                 => _( 'Lütfen mail adresinizi yazın' ),
				'email.email'                    => _( 'Lütfen geçerli bir mail adresi yazın' ),
				'email.unique'                   => _( 'Bu mail adresi zaten kullanılıyor. Lütfen başka bir mail adresi yazın' ),
				'password.required'              => _( 'Lütfen şifrenizi yazın' ),
				'password.min'                   => _( 'Şifreniz minumum 4 karakterden oluşmalıdır' ),
				'password.confirmed'             => _( 'Girdiğiniz şifreler birbiriyle eşleşmiyor' ),
				'password_confirmation.required' => _( 'Lütfen şifrenizi doğrulayın' )
		);
		$validator = Validator::make( $postData, $rules, $messages );

		if ( $validator->fails() ) {
			return Redirect::action( 'AdminController@getRegister' )->withInput()->withErrors( $validator->messages() );
		}
		else {
			$user = User::create( array(
					'username'   => $postData['username'],
					'email'      => $postData['email'],
					'password'   => Hash::make( $postData['password'] ),
					'role'       => 'unapproved',
					'created_ip' => Request::getClientIp()
			) );

			//oturum açalım
			Auth::Login( $user );
			return Redirect::action( 'AdminController@getProfile' );
		}
	}

	/**
	 * Yeni haber kaydını denetler
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddPost() {
		try {
			if ( Request::ajax() ) {
				$postData = Input::all();
				$rules    = array(
						'title'   => 'required|unique:posts',
						'content' => 'required'
				);
				// todo  ingilzce  tercüme
				$messages  = array(
						'title.required'   => _( 'Başlık boş bırakılamaz' ),
						'content.required' => _( 'İçerik boş bırakılamaz' )
				);
				$validator = Validator::make( $postData, $rules, $messages );

				if ( $validator->fails() ) {
					$ajaxResponse = array( 'status' => 'danger', 'msg' => $validator->messages()->toArray() ); //todo  burası  olmuyor
					return Response::json( $ajaxResponse );
				}
				else {
					$postData['type'] === 'slider' ? $url = $postData['url'] : $url = Str::slug( $postData['title'] );
					$post = Post::create( array(
							'author'     => Auth::user()->id,
							'content'    => $postData['content'],
							'title'      => $postData['title'],
							'excerpt'    => mb_substr( $postData['content'], 0, 450, 'UTF-8' ),
							'status'     => $postData['status'],
							'type'       => $postData['type'],
							'url'        => $url,
							'created_ip' => Request::getClientIp()
					) );

					if ( isset( $postData['postMeta'] ) ) {
						$postMeta      = $postData['postMeta'];
						$modelPostMeta = array();
						foreach ( $postMeta as $key => $value ) {
							$modelPostMeta[] = new PostMeta( array( 'metaKey' => $key, 'metaValue' => $value ) );
						}
						$post->postMeta()->saveMany( $modelPostMeta );
					}
					$actionToType   = Option::getOption( 'postTypes', 'general', true );
					$redirectAction = 'AdminController@get' . $actionToType[$postData['type']];//gönderinin türü ne ise o türün listesine yönlendirme için
					$ajaxResponse   = array( 'status' => 'success', 'msg' => _( 'Processing was carried out successfully' ), 'redirect' => URL::action( $redirectAction ) );
					return Response::json( $ajaxResponse );
				}
			}
		}catch (Exception $e){
			$ajaxResponse   = array( 'status' => 'danger', 'msg' => $e->getMessage() );
			return Response::json( $ajaxResponse );
		}
	}

	/**
	 * Post sil işlemi
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postDeletePost() {
		if ( Request::ajax() ) {
			$ids = (array) Input::get( 'id' );
			if ( !is_null( $ids || !empty( $ids ) ) ) {
				Post::destroy( $ids );
				$response = array( 'status' => 'success', 'msg' => 'Deleted Successfully', 'redirect' => '' );
				return Response::json( $response );
			}
		}
	}

	/**
	 * Post Güncelleme işlemi
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postUpdatePost() {
		if ( Request::ajax() ) {
			$postData = Input::all();
			$rules    = array(
					'title'   => 'required',
					'content' => 'required'
			);
			// todo  ingilzce  tercüme
			$messages  = array(
					'title.required'   => _( 'Başlık boş bırakılamaz' ),
					'content.required' => _( 'İçerik boş bırakılamaz' )
			);
			$validator = Validator::make( $postData, $rules, $messages );

			if ( $validator->fails() ) {
				$response = array( 'status' => 'danger', 'msg' => $validator->messages() );
				return Response::json( $response );
			}
			else {
				$post = Post::find( $postData['id'] );

				$postData = array_add( $postData, 'author', Auth::user()->id );
				$postData = array_add( $postData, 'excerpt', mb_substr( $postData['content'], 0, 450, 'UTF-8' ) );
				$postData = array_add( $postData, 'url', Str::slug( $postData['title'] ) );
				$postData = array_add( $postData, 'created_ip', Request::getClientIp() );
				// meta bilgilerini  dizinen çıkartalım
				$metas = array_pull( $postData, 'meta' );
				// yeni bilgileri güncelleyelim
				$post->fill( $postData )->push();

				if ( !empty( $metas ) ) {
					foreach ( $metas as $key => $value ) {
						if ( is_null( $value ) ) continue;
						PostMeta::setMeta( $postData['id'], $key, $value );
					}
				}
				$response = array( 'status' => 'success', 'msg' => _( 'Update Successfully' ), 'redirect' => '' );
				return Response::json( $response );
			}
		}
	}

	/**
	 * id bilgisi  verilen gönderinin durumunu değiştirir
	 * publish ise task, task ise punlish
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postTogglePostStatus() {
		if ( Request::ajax() ) {
			$ids = (array) Input::get( 'id' );
			if ( !is_null( $ids ) || empty( $ids ) ) {
				$status = [ 'publish' => 'task', 'task' => 'publish' ];
				foreach ( $ids as $id ) {
					$post         = Post::find( $id );
					$post->status = $status[$post->status];
					$post->save();
				}
				$response = array( 'status' => 'success', 'msg' => 'Status Changed', 'redirect' => '' );
			}
			return Response::json( $response );
		}
	}

	/**
	 * todo upload işlemleri  yapılınca taşınacak
	 * mini-ajx-upload-file uygulamasını upload işlemi
	 * resim yükleme işlemini gerçekleştiriyor
	 */
	public function postAvatarUpload() {
		// A list of permitted file extensions
		$allowed = array( 'png', 'jpg', 'gif' );
		$file    = Input::file( 'upl' );
		if ( Input::hasFile( 'upl' ) && Input::file( 'upl' )->getError() == 0 ) {

			$extension = Input::file( 'upl' )->getClientOriginalExtension();

			if ( !in_array( strtolower( $extension ), $allowed ) ) {
				echo '{"status":"error"}';
				exit;
			}
			if ( Input::file( 'upl' )->move( public_path() . '/assets/uploads/profile_image/', $file->getClientOriginalName() ) ) {
				echo '{"status":"success"}';
				exit;
			}

		}

		echo '{"status":"error"}';
		exit;
	}
}
