<?php
class AdminController extends BaseController {
	/**
	 * admin ana sayfasına yönlendirir
	 * @return mixed
	 */
	public function index() {
		return View::make( 'admin/index' );
	}

	/**
	 * Admin panel users sayfasını açar
	 * @return mixed
	 */
	public function listUser() {
		return View::make( 'admin/users' );
	}

	/**
	 * Admin panel giriş sayfasını gösterir
	 * @return mixed
	 */
	public function loginForm() {
		return View::make( 'admin/login' );
	}

	public function login() {
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
			return Redirect::route( 'loginForm' )->withInput()->withErrors( $validator->messages() );
		}
		else {
			//kontroller doğruysa böyle bir kullanıcı olup olmadığına bakalım
			if ( Auth::attempt( array( 'username' => $postData['username'], 'password' => $postData['password'] ),$remember ) ) {
				//oturum açılmış oldu
				return Redirect::intended( 'admin' );
			}
			else {
				//girilen bilgiler hatalı mesajı verelim
				return Redirect::route( 'loginForm' )->withInput->withErrors( array( 'Girdiğiniz bilgiler yanlış' ) );
			}
		}
	}

	public function logout() {
		Auth::logout();
		return Redirect::route( 'home' );
	}

	public function registerForm() {
		return View::make( 'admin.register' );
	}

	public function register() {
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
			return Redirect::route( 'registerForm' )->withInput()->withErrors( $validator->messages() );
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
			return Redirect::route( 'admin' );
		}
	}

	public function showProfile($id=null){
		is_null($id)? $id=Auth::user()->id: $id=$id;
		$user=User::find($id);
		return View::make('admin.profil')->with('user',$user);
	}
}