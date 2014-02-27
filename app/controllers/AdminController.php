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
	 * Admin panel giriş sayfasını gösterir
	 * @return mixed
	 */
	public function getLogin() {
		$title = _( 'Login Page' );
		return View::make( 'admin.login' )->with( 'title', $title );
	}

	/**
	 * Admin panel users sayfasını açar
	 * @return mixed
	 */
	public function getUsers() {
		$title = _( 'Users' );
		$users = User::all();
		return View::make( 'admin.list.users' )->with( array( 'users' => $users, 'title' => $title ) );
	}

	public function getAddUser(){
		$title=_('Add New User');
		return View::make('admin.add.user')->with('title',$title);
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getSlider() {
		$title  = _( 'Slider Management Page' );
		$slides = Post::slider()->with( 'postMeta' )->orderBy( 'created_at', 'desc' )->get();
		return View::make( 'admin.list.slider' )->with( array( 'slides' => $slides, 'title' => $title ) );
	}

	public function getAddSlide() {
		$title = _( 'Add New Slide' );
		return View::make( 'admin.add.slide' )->with( 'title', $title );
	}

	/**
	 * @param null $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function getProfile( $id = null ) {
		is_null( $id ) ? $id = Auth::user()->id : $id = $id;
		$user  = User::with( 'post' )->find( $id );
		$title = $user->username . ( ' Profil Page' );
		return View::make( 'admin.profil' )->with( array( 'user' => $user, 'title' => $title ) );
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getNews() {
		$title = _( 'News Management Page' );
		$news  = Post::news()->with( 'postMeta','user' )->orderBy( 'created_at', 'desc' )->get();
		return View::make( 'admin.list.news' )->with( array( 'news' => $news, 'title' => $title ) );
	}

	/**
	 * Yeni gönderi oluşturma sayfası
	 */
	public function getAddNews() {
		$title = 'New Post';
		return View::make( 'admin.add.news' )->with( 'title', $title );
	}

	public function getServices(){
		$title=_('Services');
		$services= Post::with('postMeta','user')->orderBy('created_at','desc')->service()->get();
		return View::make('admin.list.services')->with(array('title'=>$title,'services'=>$services));
	}

	public function getAddService(){
		$title=_('Add New Service');
		return View::make('admin.add.service')->with('title',$title);
	}

	public function getProducts(){
		$title=_('Products');
		$products=Post::with('postMeta','user')->orderBy('created_at','desc')->product()->get();
		return View::make('admin.list.products')->with(array('title'=>$title,'products'=>$products));
	}

	public function getAddProduct(){
		$title=_('Add New Product');
		return View::make('admin.add.product')->with('title',$title);
	}

	public function getContacts(){
		$title=_('Cotacts');
		$contacts=Contact::all();
		return View::make('admin.list.contacts')->with(array('title'=>$title,'contacts'=>$contacts));
	}
	public function getOrders(){
		$title=_('Orders');
		return View::make('admin.list.orders')->with('title',$title);
	}

	public function getOptions(){
		$title=_('Options');
		return View::make('admin.options')->with(array('title'=>$title));
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
	 * YEni haber kaydını denetler
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAddPost() {
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
			return Redirect::action( 'AdminController@getNewNews' )->withInput()->withErrors( $validator->messages() );
		}
		else {
			Post::create( array(
					'author'     => Auth::user()->id,
					'content'    => $postData['content'],
					'title'      => $postData['title'],
					'excerpt'    => mb_substr( $postData['content'], 0, 450, 'UTF-8' ),
					'status'     => 'publish',
					'type'       => $postData['type'],
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
