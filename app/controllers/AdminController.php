<?php

class AdminController extends BaseController {
	public function __construct() {
		/**
		 * login ve register sayfaları  dışındaki  sayfalarda oturum kontrolü
		 */
		$this->beforeFilter( 'auth', array( 'except' => array( 'getLogin', 'getRegister', 'postLogin', 'postRegister' ) ) );
		/**
		 * Post istelkerinde CSRF kontrolü
		 */
		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );

	}

	/**
	 * admin ana sayfasına yönlendirir
	 * @return mixed
	 */
	public function getIndex() {
		$title = _( 'Admin Panel' );
		return View::make( 'admin/index' )->with( 'title', $title );
	}

	/**
	 * Admin panel users sayfasını açar
	 * @return mixed
	 */
	public function getUsers() {
		$title = _( 'Users' );
		$users = User::all();
		return View::make( 'admin.users' )->with( array( 'users' => $users, 'title' => $title ) );
	}

	/**
	 * Admin panel giriş sayfasını gösterir
	 * @return mixed
	 */
	public function getLogin() {
		$title = _( 'Login Page' );
		return View::make( 'admin.login' )->with( 'title', $title );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getSlider() {
		$title  = _( 'Slider Management Page' );
		$slides = Post::slider()->with( 'postMeta' )->orderBy( 'created_at', 'desc' )->get();
		return View::make( 'admin.slider' )->with( array( 'slides' => $slides, 'title' => $title ) );
	}

	public function getNewSlide() {
		$title = 'New Post';
		return View::make( 'admin.newNews' )->with( 'title', $title );
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getLogout() {
		Auth::logout();
		return Redirect::home();
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getRegister() {
		$title = _( 'Register Page' );
		return View::make( 'admin.register' )->with( 'title', $title );
	}

	/**
	 * @param null $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function getProfile( $id = null ) {
		is_null( $id ) ? $id = Auth::user()->id : $id = $id;
		$user  = User::with( 'post' )->find( $id );
		$title = printf( _( '%d Profil Page' ), $user->username );
		return View::make( 'admin.profil' )->with( 'user', $user );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getNews() {
		$title = _( 'News Management Page' );
		$news  = Post::news()->with( 'postMeta' )->orderBy( 'created_at', 'desc' )->get();
		return View::make( 'admin/news' )->with( array( 'news' => $news, 'title' => $title ) );
	}

	/**
	 * Yeni gönderi oluşturma sayfası
	 */
	public function getNewNews() {
		$title = 'New Post';
		return View::make( 'admin.newNews' )->with( 'title', $title );
	}

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
				'username.required' => 'Lütfen kullanıcı adınızı yazın',
				'password.required' => 'Lütfen şifrenizi yazın'
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
				return Redirect::intended( 'admin' ); //todo action kullanılacak  şekilde düzenlenmeli
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

		$rules     = array(
				'email'                 => 'required|email|unique:users',
				'username'              => 'required|min:3|alpha_dash|unique:users',
				'password'              => 'required|min:4|confirmed',
				'password_confirmation' => 'required'
		);
		$messages  = array(
				'username.required'              => 'Lütfen kullanıcı adınızı yazın',
				'username.min'                   => 'Kullanıcını adınız en az 3 karakterden oluşmalıdır',
				'username.unique'                => 'Bu kullanıcı adı zaten kullanılıyor. Lütfen başka bir kullanıcı adı yazın',
				'username.alpha_dash'            => 'Lütfen özel karakter ve boşluk içermeyen kullanıcı adı yazın',
				'email.required'                 => 'Lütfen mail adresinizi yazın',
				'email.email'                    => 'Lütfen geçerli bir mail adresi yazın',
				'email.unique'                   => 'Bu mail adresi zaten kullanılıyor. Lütfen başka bir mail adresi yazın',
				'password.required'              => 'Lütfen şifrenizi yazın',
				'password.min'                   => 'Şifreniz minumum 4 karakterden oluşmalıdır',
				'password.confirmed'             => 'Girdiğiniz şifreler birbiriyle eşleşmiyor',
				'password_confirmation.required' => 'Lütfen şifrenizi doğrulayın'
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
	 * YEni haber kaydını denetler
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddNews() {
		$postData  = Input::all();
		$rules     = array(
				'title'   => 'required|unique:posts',
				'content' => 'required'
		);
		$messages  = array(
				'title.required'   => 'Başlık boş bırakılamaz',
				'content.required' => 'İçerik boş bırakılamaz'
		);
		$validator = Validator::make( $postData, $rules, $messages );

		if ( $validator->fails() ) {
			return Redirect::action( 'AdminController@getNewNews' )->withInput()->withErrors( $validator->messages() );
		}
		else {
			Post::create( array(
					'author'     => Auth::user()->username,
					'content'    => $postData['content'],
					'title'      => $postData['title'],
					'excerpt'    => mb_substr( $postData['content'], 0, 450, 'UTF-8' ),
					'status'     => 'publish',
					'type'       => 'news',
					'url'        => $this->createUrl( $postData['title'] ),
					'created_ip' => Request::getClientIp()
			) );
			//todo post meta eklenecek
			return Redirect::action( 'AdminController@getNews' );
		}
	}

	/**
	 * Girilen string metni url ye uygun metne çevirir
	 *
	 * @param $t Url ye uygun hale  getirilecek  string
	 *
	 * @return mixed|string
	 */
	public function  createUrl( $t ) {
		$tr = array( 'ş', 'Ş', 'ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'ç', 'Ç' );
		$en = array( 's', 's', 'i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c' );
		$t  = str_replace( $tr, $en, $t );
		$t  = strtolower( $t );
		$t  = preg_replace( '/[^a-z0-9-_]+/', '-', $t );
		$t  = preg_replace( '/-+/', '-', $t );
		return $t;
	}


}
