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
		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );
	}

	/**
	 * admin ana sayfasına yönlendirir
	 * @return mixed
	 */
	public function getIndex() {
		$title = _( 'Admin Panel' );
		return View::make( 'admin/index' )->with( array( 'title' => $title, 'rightSide' => 'default' ) );
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

	/*
	 * Listeler
	 */

	/**
	 * Admin panel users sayfasını açar
	 * @return mixed
	 */
	public function getUsers() {
		$title     = _( 'Users' );
		$rightSide = 'list/users';
		$users     = User::all();
		/* User meta tablosu  eklenince  aktif  edilecek
		 * foreach ( $users as $user ) {
			foreach($user->userMeta as $meta){
				$user=array_add($user,$meta->metaKey,$meta->metaValue);
			}
		}*/
		return View::make( 'admin.index' )->with( compact( 'users', 'title', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getSlider() {
		$title     = _( 'Slider Management Page' );
		$slides    = Post::slider()->with( 'postMeta' )->orderBy( 'created_at', 'desc' )->get();
		$rightSide = 'list/slider';
		foreach ( $slides as $slide ) {
			foreach ( $slide->postMeta as $meta ) {
				$slide = array_add( $slide, $meta->metaKey, $meta->metaValue );
			}
		}

		return View::make( 'admin.index' )->with( compact( 'title', 'slides', 'rightSide' ) );
	}

	/**
	 * @param null $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function getProfile( $id = null ) {
		is_null( $id ) ? $id = Auth::user()->id : $id = $id;
		$user = User::with( 'post' )->find( $id );
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
	public function getNews() {
		$title = _( 'News Management Page' );
		$news  = Post::news()->with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->get();
		foreach ( $news as $new ) {
			foreach ( $new->postMeta as $meta ) {
				$new = array_add( $new, $meta->metaKey, $meta->metaValue );
			}
		}
		return View::make( 'admin.index' )->with( array( 'news' => $news, 'title' => $title, 'rightSide' => 'list/news' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getServices() {
		$title     = _( 'Services' );
		$services  = Post::with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->service()->get();
		$rightSide = 'list/services';
		foreach ( $services as $service ) {
			foreach ( $service->postMeta as $meta ) {
				$service = array_add( $service, $meta->metaKey, $meta->metaValue );
			}
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'services', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getProducts() {
		$title     = _( 'Products' );
		$products  = Post::with( 'postMeta', 'user' )->orderBy( 'created_at', 'desc' )->product()->get();
		$rightSide = 'list/products';
		foreach ( $products as $product ) {
			foreach ( $product->postMeta as $meta ) {
				$product = array_add( $product, $meta->metaKey, $meta->metaValue );
			}
		}
		return View::make( 'admin.index' )->with( compact( 'title', 'products', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getContacts() {
		$title     = _( 'Cotacts' );
		$contacts  = Contact::all();
		$rightSide = 'list/contacts';
		return View::make( 'admin.index' )->with( compact( 'title', 'contacts', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getOrders() {
		$title     = _( 'Orders' );
		$rightSide = 'list/orders';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/*
	 * Yeni Oluşturma
	 */
	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddUser() {
		$title     = _( 'Add New User' );
		$rightSide = 'add/user';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddSlide() {
		$title     = _( 'Add New Slide' );
		$rightSide = 'add/slide';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/**
	 * Yeni gönderi oluşturma sayfası
	 */
	public function getAddNews() {
		$title     = 'New Post';
		$rightSide = 'add/news';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddService() {
		$title     = _( 'Add New Service' );
		$rightSide = 'add/service';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getAddProduct() {
		$title     = _( 'Add New Product' );
		$rightSide = 'add/product';
		return View::make( 'admin.index' )->with( compact( 'title', 'rightSide' ) );
	}

	/*
	 * Güncellemeler
	 */
	/**
	 * @param null $id
	 *
	 * @return bool|\Illuminate\View\View
	 */
	public function getUpdateSlide( $id = null ) {
		if ( is_null( $id ) ) return false; //todo hata sayfası
		$title = _( 'Update Slide' );
		$slide = Post::slider()->with( 'postMeta' )->find( $id );
		foreach ( $slide->postMeta as $meta ) {
			$slide = array_add( $slide, $meta->metaKey, $meta->metaValue );
		}
		return View::make( 'admin.update.slide' )->with( array( 'slide' => $slide, 'title' => $title ) );
	}

	/**
	 * @param null $id
	 *
	 * @return bool|\Illuminate\View\View
	 */
	public function getUpdateNews( $id = null ) {
		if ( is_null( $id ) ) return false; //todo hata sayfası
		$title = _( 'Update News' );
		$news  = Post::news()->with( 'postMeta' )->find( $id );
		foreach ( $news->postMeta as $meta ) {
			$news = array_add( $news, $meta->metaKey, $meta->metaValue );
		}
		return View::make( 'admin.update.news' )->with( array( 'news' => $news, 'title' => $title ) );
	}

	public function getUpdateProduct( $id = null ) {
		if ( is_null( $id ) ) return false; //todo hata sayfası
		$title   = _( 'Update News' );
		$product = Post::product()->with( 'postMeta' )->find( $id );
		foreach ( $product->postMeta as $meta ) {
			$product = array_add( $product, $meta->metaKey, $meta->metaValue );
		}
		return View::make( 'admin.update.product' )->with( array( 'product' => $product, 'title' => $title ) );
	}

	public function getUpdateService( $id = null ) {
		if ( is_null( $id ) ) return false; //todo hata sayfası
		$title   = _( 'Update News' );
		$service = Post::service()->with( 'postMeta' )->find( $id );
		foreach ( $service->postMeta as $meta ) {
			$service = array_add( $service, $meta->metaKey, $meta->metaValue );
		}
		return View::make( 'admin.update.service' )->with( array( 'service' => $service, 'title' => $title ) );
	}

	/*
	 * post işlemleri
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
				'email'                 => 'required|email|unique:users',
				'username'              => 'required|min:3|alpha_dash|unique:users',
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
					'role'       => 'user',
					'created_ip' => Request::getClientIp()
			) );

			//oturum açalım
			Auth::Login( $user );
			return Redirect::action( 'AdminController@getIndex' );
		}
	}

	/**
	 * Yeni haber kaydını denetler
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddPost() {
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
				$post = Post::create( array(
						'author'     => Auth::user()->id,
						'content'    => $postData['content'],
						'title'      => $postData['title'],
						'excerpt'    => mb_substr( $postData['content'], 0, 450, 'UTF-8' ),
						'status'     => $postData['status'],
						'type'       => $postData['type'],
						'url'        => Str::slug( $postData['title'] ),
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
				$ajaxResponse = array( 'status' => 'success', 'msg' => _( 'Processing was carried out successfully' ) );
				return Response::json( $ajaxResponse );
			}
		}
	}

	/**
	 * Post sil işlemi
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postDeletePost() {
		if ( Request::ajax() ) {
			$id = Input::get( 'id' );
			if ( ! is_null( $id ) ) {
				Post::destroy( $id );
				$response = array( 'status' => 'success', 'msg' => 'Deleted Successfully' );
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
		$postData = Input::all();
		$id       = $postData['id'];
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
			return Redirect::back()->withInput()->withErrors( $validator->messages() );
		}
		else {
			$post = Post::find( $id );

			$post->author     = Auth::user()->id;
			$post->content    = $postData['content'];
			$post->title      = $postData['title'];
			$post->excerpt    = mb_substr( $postData['content'], 0, 450, 'UTF-8' );
			$post->status     = $postData['status'];
			$post->type       = $postData['type'];
			$post->url        = Str::slug( $postData['title'] );
			$post->created_ip = Request::getClientIp();

			if ( isset( $postData['postMeta'] ) ) {
				$postMeta = $postData['postMeta'];
				foreach ( $postMeta as $key => $value ) {
					$post->postMeta()->where( 'metaKey', '=', $key )->update( array( 'metaValue' => $value ) );
				}
			}
			$post->push();

			return Redirect::back(); //todo burada bunu kullanmak doğrumu
		}
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postUpdateProfile() {
		if ( Request::ajax() ) {
			$postData = Input::all();
			$user     = User::find( $postData['id'] );
			// meta bilgilerini  dizinen çıkartalım
			$metas = array_pull( $postData, 'meta' );
			// yeni bilgileri güncelleyelim
			$user->fill( $postData )->push();
			//userMeta modelini statik olmayan metodlarını kullanmak değişkene aktarıyoruz
			$userMeta = new UserMeta();
			foreach ( $metas as $key => $value ) {
				if ( $value == '' ) continue;
				$userMeta->setMeta( $postData['id'], $key, $value );
			}
			$response = array( 'status' => 'success', 'msg' => 'Saved successfully' );
			return Response::json( $response );
		}
	}

	/**
	 * İletişim işlemleri
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddContact() {
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
	 * İletişim mesajını  okundu yada okunmadı olarak işaretler
	 *
	 * @param null $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getMarkAsReadContact( $id = null ) {
		if ( ! is_null( $id ) ) {
			$contact         = Contact::find( $id );
			$contact->isRead = ! $contact->isRead;
			$contact->save();
			return Redirect::back();
		}
		else {
			return Redirect::intended();
		}
	}

	/**
	 * todo upload işlemleri  yapılınca taşınacak
	 * mini-ajx-upload-file uygulamasını upload işlemi
	 * resim yükleme işlemini gerçekleştiriyor
	 */
	public function postMiniAjaxUpload() {
		// A list of permitted file extensions
		$allowed = array( 'png', 'jpg', 'gif', 'zip' );
		$file    = Input::file( 'upl' );
		if ( Input::hasFile( 'upl' ) && Input::file( 'upl' )->getError() == 0 ) {

			$extension = Input::file( 'upl' )->getClientOriginalExtension();

			if ( ! in_array( strtolower( $extension ), $allowed ) ) {
				echo '{"status":"error"}';
				exit;
			}
			//Input::file('upl')->move(public_path().'/uploads/', time());// todo  if  ile  bunu  kullanımını  bulmak lazım
			if ( Input::file( 'upl' )->move( public_path() . '/uploads/', time() . '_' . $file->getClientOriginalName() . '.' . $extension ) ) {
				echo '{"status":"success"}';
				exit;
			}

		}

		echo '{"status":"error"}';
		exit;
	}

}
