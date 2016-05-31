<?php namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\PostModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;
use App\MyClasses\Post\PostFacade as Post;

class AdminController extends BaseController
{
    public function __construct()
    {
        /**
         * login ve register sayfaları  dışındaki  sayfalarda oturum kontrolü
         */
        $this->middleware('auth', ['except' => array('getLogin', 'getRegister', 'postLogin', 'postRegister')]);
        /**
         * Post istelkerinde CSRF güvenlik kontrolü
         */
        $this->beforeFilter('csrf', array('on' => 'post', 'except' => 'postMarkAsReadContact'));

    }

    /**
     * admin ana sayfasına yönlendirir
     * @return mixed
     */
    public function getIndex()
    {
        if (userCan('viewDashboard')) {
            $title = _('Admin Panel');
            $rightSide = 'default';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin/index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    /**
     * Kullanıcı oturumunu sonlandırır
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        \Auth::logout();
        return \Redirect::home();
    }

    /**
     * Üye ol sayfasına yönlendirir
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        $title = _('Register Page');
        return \View::make('admin.register')->with('title', $title);
    }

    /**
     * Admin panel giriş sayfasına yönlendirir
     * @return mixed
     */
    public function getLogin()
    {
        $title = _('Login Page');
        return \View::make('admin.login')->with('title', $title);
    }

    /* User */
    /**
     * Admin panel users sayfasına yönlendirir
     * @return mixed
     */
    public function getUsers()
    {
        if (userCan('viewUsers')) {
            $title = _('Members');
            $rightSide = 'list/users';
            $users = \UserModel::all();
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('users', 'title', 'rightSide'))->withErrors($error);
    }

    /**
     * Id ile belirtilen kullanıcının profil sayfasına yönlendirir
     *
     * @param null $id
     * @return \Illuminate\View\View
     */
    public function getProfile($id = null)
    {
        /*
         * Eğer kullanıcının kullanıcıları düzenleme yetkisi yok ise
         * veya id değeri null  ise kullanıcının kendi  sayfası gösterilsin
         */
        if (!userCan('manageUsers') || is_null($id)) {
            $id = \Auth::user()->id;
        }
        $user = \UserModel::find($id);//kullanıcıyı getiriyoruz
        //kullanıcı metabilgileri user değişkenine aktarılıyor
        foreach ($user->userMeta as $meta) {
            $user = array_add($user, $meta->metaKey, $meta->metaValue);
        }
        $title = $user->getScreenName() . (' Profile Page');
        $rightSide = 'profile';
        return \View::make('admin.index')->with(compact('user', 'title', 'rightSide'));
    }

    public function getAddUser()
    {
        if (userCan('addUser')) {
            $title = _('Add New Member');
            $rightSide = 'add/user';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function postUpdateUser()
    {
        try {
            if (\Request::ajax()) {
                $postData = \Input::all();
                //kurallar
                $rules = array(
                    'username' => 'required|min:3',
                    'email' => 'required|email'
                );
                // todo  ingilzce  tercüme
                $messages = array(
                    'username.required' => _('Bir kullanıcı adı tanımlamalısınız'),
                    'content.required' => _('Bir e-mail belirtmelisiniz'),
                    'username.unique' => _('Kullanıcı adı kullanılıyor'),
                    'email.unique' => _('Mail adresi kullanılıyor'),
                    'username.min' => _('Kullanıcını adınız en az 3 karakterden oluşmalıdır'),
                );
                $validator = \Validator::make($postData, $rules, $messages);

                if ($validator->fails()) {
                    $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray()); //todo  burası  olmuyor
                    return response()->json($ajaxResponse);
                } else {
                    $user = \UserModel::find($postData['id']);
                    // meta bilgilerini  dizinen çıkartalım
                    $metas = array_pull($postData, 'meta');
                    // yeni bilgileri güncelleyelim
                    $user->fill($postData)->push();

                    foreach ($metas as $key => $value) {
                        if (is_null($value)) continue;
                        \UserMeta::setMeta($postData['id'], $key, $value);
                    }
                    $response = array('status' => 'success', 'msg' => _('Saved successfully'), 'redirect' => \URL::action('AdminController@getProfile', $postData['id']));
                    return response()->json($response);
                }
            }
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
            return response()->json($ajaxResponse);
        }
    }

    public function postAddUser()
    {
        try {
            if (\Request::ajax()) {
                $postData = \Input::all();
                //kurallar
                $rules = array(
                    'username' => 'required|min:3|unique:users,username',
                    'email' => 'required|email|unique:users,email'
                );
                // todo  ingilzce  tercüme
                $messages = array(
                    'username.required' => _('Bir kullanıcı adı tanımlamalısınız'),
                    'content.required' => _('Bir e-mail belirtmelisiniz'),
                    'username.unique' => _('Kullanıcı adı kullanılıyor'),
                    'email.unique' => _('Mail adresi kullanılıyor'),
                    'username.min' => _('Kullanıcını adınız en az 3 karakterden oluşmalıdır'),
                );
                $validator = \Validator::make($postData, $rules, $messages);

                if ($validator->fails()) {
                    $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray());
                    return response()->json($ajaxResponse);
                } else {
                    $password = str_random(6);
                    //meta verileini diziden çıkartalım ve $userMeta değişkenine atayalım
                    $userMeta = array_pull($postData, 'meta');
                    //password ve created_ip alanlarını  diziye ekleyelim
                    $postData['password'] = \Hash::make($password);
                    $postData['created_ip'] = \Request::getClientIp();

                    // kullanıcıyı oluşturalım
                    $user = \UserModel::create($postData);//kulllanıcıyı kaydedelim

                    if ($user) {
                        /**
                         * yeni oluşturulan kullanıcının şifresini kullanıcının mail adresime mail olark gönderelim
                         */
                        $mailData = array('username' => $postData['username'], 'password' => $password);
                        \Mail::send('emails.welcome', $mailData, function ($message) use ($postData) {
                            $message->to($postData['email'], $postData['name'] . ' ' . $postData['lastName'])->subject('Hoş geldiniz!');
                            $message->from(Option::getOption('mainMailAddress'), Option::getOption('siteName'));
                        });

                        //kullanıcı meta verilerini  kaydedelim
                        foreach ($userMeta as $key => $value) {
                            \UserMeta::setMeta($user->id, $key, $value);
                        }
                    }
                    $ajaxResponse = array('status' => 'success', 'msg' => _('Yeni Üye oluşturuldu'), 'redirect' => \URL::action('AdminController@getProfile', $user->id));
                    return response()->json($ajaxResponse);
                }
            }
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage() . $e->getFile() . $e->getLine());
            return response()->json($ajaxResponse);
        }
    }

    public function postUpdateUserPassword()
    {
        $postData = \Input::all();
        $rules = array(
            'currentPassword' => 'required',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        );
        // todo  İngilizce  tercüme yapılacak
        $messages = array(
            'currentPassword.required' => _('Lütfen şuanki şifrenizi yazın'),
            'password.required' => _('Lütfen şifrenizi yazın'),
            'password.min' => _('Şifreniz minumum 4 karakterden oluşmalıdır'),
            'password.confirmed' => _('Girdiğiniz şifreler birbiriyle eşleşmiyor'),
            'password_confirmation.required' => _('Lütfen şifrenizi doğrulayın')
        );
        $validator = \Validator::make($postData, $rules, $messages);

        if ($validator->fails()) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray());
            return response()->json($ajaxResponse);
        } else {
            if (isset($postData['id'])) {
                $user = \UserModel::findOrFail($postData['id']);
                if ($postData['currentPassword'] !== $postData['password']) {
                    if (\Hash::check($postData['currentPassword'], $user->getAuthPassword())) {
                        $user->password = \Hash::make($postData['password']);
                        $user->save();
                        $ajaxResponse = array('status' => 'info', 'msg' => '');
                    } else {
                        $ajaxResponse = array('status' => 'danger', 'msg' => array('currentPassword' => _('Incorrect Password')));
                    }
                } else $ajaxResponse = array('status' => 'danger', 'msg' => array('password' => _('Passwords mustn\'t same')));
            }
            return response()->json($ajaxResponse);
        }
    }

    public function postDeleteUser()
    {
        if (\Request::ajax()) {
            $ids = (array)\Input::get('id');
            if (!is_null($ids)) {
                if (!in_array('1', $ids)):
                    \UserModel::destroy($ids);
                    $response = array('status' => 'success', 'msg' => _('Deleted Successfully'), 'redirect' => \URL::action('AdminController@getUsers'));
                else:
                    $response = array('status' => 'danger', 'msg' => _('Admin can not be delete'));
                endif;
            }
            return response()->json($response);
        }
    }

    public function postApproveUser()
    {
        try {
            if (\Request::ajax()) {
                $ids = (array)\Input::get('id');
                if (!is_null($ids || !empty($ids))) {
                    $users = \UserModel::find($ids);
                    foreach ($users as $user) {
                        if ($user->role == 'unapproved') $user->role = 'user';
                        else if ($user->id != '1') $user->role = 'unapproved';
                        $user->save();
                    }
                    $response = array('status' => 'success', 'msg' => _('Successful'), 'redirect' => \URL::action('AdminController@getUsers'));
                }
            }
        } catch (Exception $e) {
            $response = array('status' => 'danger', 'msg' => $e->getMessage());
        }
        return response()->json($response);
    }

    /* News */
    public function getNews()
    {
        if (userCan('manageNews')) {
            $title = _('News Management Page');
            $rightSide = 'list/news';
            $news = \PostModel::news()->with('postMeta', 'user')->orderBy('created_at', 'desc')->get();
            foreach ($news as $new) {
                foreach ($new->postMeta as $meta) {
                    $new = array_add($new, $meta->metaKey, $meta->metaValue);
                }
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide', 'news'))->withErrors($error);
    }

    /**
     * Yeni gönderi oluşturma sayfasına yönlendirir
     */
    public function getAddNews()
    {
        if (userCan('manageNews')) {
            $title = _('Add News');
            $rightSide = 'add/news';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function getUpdateNews($id = null)
    {
        if (is_null($id)) return false;
        if (userCan('manageNews')) {
            $title = _('Update News');
            $news = \PostModel::news()->with('postMeta')->find($id);
            $rightSide = 'update/news';
            foreach ($news->postMeta as $meta) {
                $news = array_add($news, $meta->metaKey, $meta->metaValue);
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide', 'news'))->withErrors($error);
    }

    public function getNewsTrash()
    {
        if (userCan('manageNews')) {
            $title = _('News Trash');
            $rightSide = 'list/newsTrash';
            $news = \PostModel::news()->with('postMeta', 'user')->onlyTrashed()->orderBy('created_at', 'desc')->get();
            foreach ($news as $new) {
                foreach ($new->postMeta as $meta) {
                    $new = array_add($new, $meta->metaKey, $meta->metaValue);
                }
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide', 'news'))->withErrors($error);

    }

    /* Slider */

    public function getSlider()
    {
        if (userCan('manageSlider')) {
            $title = _('Slider Management Page');
            $slides = \PostModel::slider()->with('postMeta')->orderBy('created_at', 'desc')->get();
            $rightSide = 'list/slider';
            foreach ($slides as $slide) {
                foreach ($slide->postMeta as $meta) {
                    $slide = array_add($slide, $meta->metaKey, $meta->metaValue);
                }
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'slides', 'rightSide'))->withErrors($error);
    }

    public function postUpdateSlide()
    {
        try {
            $slides = \Input::only('slide');
            $slides = $slides['slide'];
            foreach ($slides as $id => $slide) {
                $post = \PostModel::find($id);
                $metas = array_pull($slide, 'meta');// diziden metaların tutulduğu diziyi  alıyoruz
                $post->fill($slide)->push();// meta hariç  diğer bilgileri  kaydediyoruz.
                if (!empty($metas)) {
                    foreach ($metas as $key => $value) {
                        if (is_null($value)) continue;
                        \PostMeta::setMeta($id, $key, $value);// meta varsa ve boş değilse metaları kaydediyoruz
                    }
                }
            }
            $response = array('status' => 'success', 'msg' => '');
        } catch (Exception $e) {
            $response = array('status' => 'danger', 'msg' => $e->getMessage());
        }
        return response()->json($response);
    }

    public function postUploadSliderImage()
    {
        $allowed = array('png', 'jpg', 'gif');
        $file = \Input::file('fileupload');
        if (\Input::hasFile('fileupload') && $file->getError() == 0) {

            $extension = $file->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowed)) {
                $response = array('status' => 'danger', 'msg' => _('Extension not allowed'));
                return response()->json($response);
            }
            if ($file->move(public_path() . '/assets/uploads/slider/', $file->getClientOriginalName())) {
                $response = array('status' => 'success', 'msg' => _('File uploaded successfully'), 'url' => '/assets/uploads/slider/' . $file->getClientOriginalName());
                return response()->json($response);
            }

        } else {
            $response = array('status' => 'danger', 'msg' => \Input::file('fileupload')->getErrorMessage());
            return response()->json($response);
        }
    }

    /* Services */

    public function getService()
    {
        if (userCan('manageService')) {
            $title = _('Services');
            $services = \PostModel::service()->with('postMeta', 'user')->orderBy('created_at', 'desc')->get();
            $rightSide = 'list/services';
            foreach ($services as $service) {
                foreach ($service->postMeta as $meta) {
                    $service = array_add($service, $meta->metaKey, $meta->metaValue);
                }
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'services', 'rightSide'))->withErrors($error);
    }

    public function getAddService()
    {
        if (userCan('manageService')) {
            $title = _('Add New Service');
            $rightSide = 'add/service';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function getUpdateService($id = null)
    {
        if (is_null($id)) return false;
        if (userCan('manageService')) {
            $title = _('Update Service');
            $rightSide = 'update/service';
            $service = \PostModel::service()->with('postMeta')->find($id);
            foreach ($service->postMeta as $meta) {
                $service = array_add($service, $meta->metaKey, $meta->metaValue);
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide', 'service'))->withErrors($error);
    }

    public function getServiceTrash()
    {
        if (userCan('manageService')) {
            $title = _('Services');
            $services = \PostModel::service()->with('postMeta', 'user')->onlyTrashed()->orderBy('created_at', 'desc')->get();
            $rightSide = 'list/servicesTrash';
            foreach ($services as $service) {
                foreach ($service->postMeta as $meta) {
                    $service = array_add($service, $meta->metaKey, $meta->metaValue);
                }
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'services', 'rightSide'))->withErrors($error);

    }

    /* Products */

    public function getProducts()
    {
        if (userCan('manageProduct')) {
            $title = _('Products');
            $products = \PostModel::with('postMeta', 'user')->orderBy('created_at', 'desc')->product()->get();
            $rightSide = 'list/products';
            foreach ($products as $product) {
                foreach ($product->postMeta as $meta) {
                    $product = array_add($product, $meta->metaKey, $meta->metaValue);
                }
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'products', 'rightSide'))->withErrors($error);
    }

    public function getAddProduct()
    {
        if (userCan('manageProduct')) {
            $title = _('Add New Product');
            $rightSide = 'add/product';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function getUpdateProduct($id = null)
    {
        if (is_null($id)) return false;
        if (userCan('manageProduct')) {
            $title = _('Update News');
            $rightSide = 'update/product';
            $product = \PostModel::product()->with('postMeta')->find($id);
            foreach ($product->postMeta as $meta) {
                $product = array_add($product, $meta->metaKey, $meta->metaValue);
            }
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.update.product')->with(compact('title', 'rightSide', 'product'))->withErrors($error);
    }

    /* Mail */

    public function getMailbox()
    {
        if (userCan('manageMailbox')) {
            $title = _('Mailbox');
            $rightSide = 'mail/mailbox';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function getMailSettings()
    {
        if (userCan('manageMailbox')) {
            $title = _('Mail Settings');
            $rightSide = 'mail/settings';
            $error = null;
            //domain adresine tanımlı mail adresleri todo domain otomatik alınacak
            $emails = DB::connection('mysql_mail')->table('virtual_users')->whereRaw('email like "%@gencbilisim%" AND email NOT like "system@%"')->lists('email');
            $emaillist = array();
            foreach ($emails as $email) {
                $emaillist[$email] = $email;
            }
            $emails = $emaillist;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide', 'emails'))->withErrors($error);
    }

    /**
     * mail kullanıcısının şifresini  değiştirir
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUpdateMailUserPassword()
    {
        $postData = \Input::all();
        $rules = array(
            'currentPassword' => 'required',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        );
        // todo  İngilizce  tercüme yapılacak
        $messages = array(
            'currentPassword.required' => _('Lütfen şuanki şifrenizi yazın'),
            'password.required' => _('Lütfen şifrenizi yazın'),
            'password.min' => _('Şifreniz minumum 4 karakterden oluşmalıdır'),
            'password.confirmed' => _('Girdiğiniz şifreler birbiriyle eşleşmiyor'),
            'password_confirmation.required' => _('Lütfen şifrenizi doğrulayın')
        );
        $validator = \Validator::make($postData, $rules, $messages);

        if ($validator->fails()) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray());
            return \response()->json($ajaxResponse);
        } else {
            extract(\Input::all());// post ile gelen verileri değişken olarak tanımladık.

            if (strpos($emailUser, 'gencbilisim.net')) { // todo bu kısım domaini otomatik alacak şekilde değiştirilecek
                try {
                    $currentpass = "ENCRYPT('$currentPassword', CONCAT('$6$', SUBSTRING(SHA(RAND()), -16)))";
                    $pass = "ENCRYPT('$password', CONCAT('$6$', SUBSTRING(SHA(RAND()), -16)))";
                    if (DB::connection('mysql_mail')->statement("select * from virtual_users where password=ENCRYPT('$currentPassword', CONCAT('$6$', SUBSTRING(SHA(RAND()), -16)))")) {
                        DB::connection('mysql_mail')->statement("UPDATE virtual_users SET password=ENCRYPT('$password', CONCAT('$6$', SUBSTRING(SHA(RAND()), -16))) WHERE email='$emailUser'");
                        $ajaxResponse = array('status' => 'success', 'msg' => _('Password changed successful'));
                    } else {
                        $ajaxResponse = array('status' => 'danger', 'msg' => _('wrong password'));
                    }
                } catch (Exception $e) {
                    $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
                    return response()->json($ajaxResponse);
                }
            } else {
                $ajaxResponse = array('status' => 'danger', 'msg' => 'Permission Error' . $emailUser);
            }
            return response()->json($ajaxResponse);
        }
    }

    /**
     * İletişim formundan yollana mesajlar 1 idli kullaıcının tanımlı mail adresine göderiliyor.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSendContactMessage()
    {
        if (\Request::ajax()) {
            extract(\Input::all());
            $admin = \UserModel::find(1);
            $mailData = array('name' => $name, 'email' => $email, 'phone' => $phone, 'contactMessage' => $message);
            Mail::send('emails.contact', $mailData, function ($message) use ($admin) {
                $message->to($admin->email, $admin->getScreenName())->subject(_('Contact Message'));
            });
        }
    }

    /* Orders */

    public function getOrders()
    {
        if (userCan('manageOrders')) {
            $title = _('Orders');
            $rightSide = 'list/orders';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    /*
     * Dues todo silinecek
     */
    public function postDues()
    {
        if (\Request::ajax()) {
            try {
                $postData = \Input::all();
                $duesAmount = Option::getOption('duesAmount');

                if (isset($postData['dues'])) {
                    $userDues = \UserMeta::getMeta($postData['userId'], 'dues', true);
                    $total = 0;
                    foreach ($postData['dues'] as $dues) {
                        $dues = explode('-', $dues);
                        $total += $duesAmount;
                        if (array_key_exists($dues[0], $userDues)) {
                            $userDues[$dues[0]][$dues[1]] = 1;// usrmeta tablosunda aidatı ödendi olarak ayarlayalım
                            \UserMeta::setMeta($postData['userId'], 'dues', $userDues, true);// güncel bilgileri veri tabanına kaydettik
                        }

                    }
                    //ödeme bilgisini  veri tabanına kaydedelim
                    $order = Orders::create(array(
                        'userId' => $postData['userId'],
                        'type' => 'dues',
                        'price' => $total,
                        'description' => $postData['description'],
                        'meta' => ''
                    ));
                    if ($order) {
                        \UserMeta::setMeta($postData['userId'], 'dues', $userDues, true);// güncel bilgileri veri tabanına kaydettik
                    }
                }
                if (isset($postData['donate']) && $postData['donate']) {
                    //ödeme bilgisini  veri tabanına kaydedelim
                    $order = Orders::create(array(
                        'userId' => $postData['userId'],
                        'type' => 'donate',
                        'price' => $postData['donateAmount'],
                        'description' => $postData['description'],
                        'meta' => ''
                    ));
                }
                $response = array('status' => 'success', 'msg' => _('Payed Successfully'), 'redirect' => '');
            } catch
            (Exception $e) {
                $response = array('status' => 'danger', 'msg' => $e->getMessage());
            }
            return response()->json($response);
        }
    }

    /*
     * Type Ahead eklentisi  için json çıktıları
     * todo kullanımı araştırılıp gerekiyorsa silinecek muhtemelen sadece aidat sayfasında kullanıcı aramak için kullanılıyordu.
     */
    public function getUserTypeAhead($column = '', $value = '')
    {
        try {
            $response = \UserModel::where($column, 'like', "%" . $value . "%")->get([$column . ' as value']);
        } catch (Exception $e) {
            $response = array('status' => 'danger', 'msg' => $e->getMessage());
        }
        return response()->json($response);
    }

    /*
     * post istekleri
     */

    /**
     * Login işlemini denetler
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin()
    {
        // POST İLE GÖNDERİLEN DEĞERLERİ ALALIM.
        $postData = \Input::all();
        isset($postData['remember']) ? $remember = true : $remember = false;

        // FORM KONTROLLERİNİ BELİRLEYELİM
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        // HATA MESAJLARINI OLUŞTURALIM
        $messages = array(
            'username.required' => _('Please enter user name'),
            'password.required' => _('Please enter password')
        );
        // Kontrol (Validation) işlemlerini gerçekleştirelim
        $validator = \Validator::make($postData, $rules, $messages);

        if ($validator->fails()) {
            //validator işlemi  olumsuzsa hata mesajlarını ve input değerlerini
            return \Redirect::action('AdminController@getLogin')->withInput()->withErrors($validator->messages());
        } else {
            //kontroller doğruysa böyle bir kullanıcı olup olmadığına bakalım
            if (\Auth::attempt(array('username' => $postData['username'], 'password' => $postData['password']), $remember)) {
                //oturum açılmış oldu
                return \Redirect::intended('/admin'); //todo action kullanılacak  şekilde düzenlenmeli
            } else {
                //girilen bilgiler hatalı mesajı verelim
                return \Redirect::action('AdminController@getLogin')->withInput()->withErrors(array('Girdiğiniz bilgiler yanlış'));
            }
        }
    }

    /**
     * Yeni üye kaydını denetler
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister()
    {
        $postData = \Input::all();

        $rules = array(
            'email' => 'required|email|unique:users,email',
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required'
        );
        // todo  İngilizce  tercüme yapılacak
        $messages = array(
            'username.required' => _('Lütfen kullanıcı adınızı yazın'),
            'username.min' => _('Kullanıcını adınız en az 3 karakterden oluşmalıdır'),
            'username.unique' => _('Bu kullanıcı adı zaten kullanılıyor. Lütfen başka bir kullanıcı adı yazın'),
            'username.alpha_dash' => _('Lütfen özel karakter ve boşluk içermeyen kullanıcı adı yazın'),
            'email.required' => _('Lütfen mail adresinizi yazın'),
            'email.email' => _('Lütfen geçerli bir mail adresi yazın'),
            'email.unique' => _('Bu mail adresi zaten kullanılıyor. Lütfen başka bir mail adresi yazın'),
            'password.required' => _('Lütfen şifrenizi yazın'),
            'password.min' => _('Şifreniz minumum 4 karakterden oluşmalıdır'),
            'password.confirmed' => _('Girdiğiniz şifreler birbiriyle eşleşmiyor'),
            'password_confirmation.required' => _('Lütfen şifrenizi doğrulayın')
        );
        $validator = \Validator::make($postData, $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::action('AdminController@getRegister')->withInput()->withErrors($validator->messages());
        } else {
            $user = \UserModel::create(array(
                'username' => $postData['username'],
                'email' => $postData['email'],
                'password' => \Hash::make($postData['password']),
                'role' => 'unapproved',
                'created_ip' => \Request::getClientIp()
            ));

            //oturum açalım
            \Auth::Login($user);
            return \Redirect::action('AdminController@getProfile');
        }
    }

    /**
     * Yeni Gönderi kayıt işlemine yönlendirir
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddPost()
    {
        try {
            /*
             * Get Post Request Data
             */
            $postData = \Input::all();
            /*
             * Validator Rules
             */
            $rules = array(
                'title' => 'required',
                'content' => 'required'
            );
            /*
             * Varlidator Error Message
             */
            $messages = array(
                'title.required' => _('Başlık boş bırakılamaz'),
                'content.required' => _('İçerik boş bırakılamaz')
            );
            /*
             * Set Validator
             */
            $validator = \Validator::make($postData, $rules, $messages);

            /*
             * Check validate
             */
            if ($validator->fails()) {
                $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray()); //todo  burası  olmuyor
                return response()->json($ajaxResponse);
            } else
                return response()->json(Post::addNew($postData));

        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage() . $e->getFile() . $e->getLine());
            return response()->json($ajaxResponse);
        }
    }

    /**
     * Post sil işlemi
     * belirtilen idlerdeki gönderilerin statu s değerlerini trashed olarak değiştirir ve soft delete işlemi uygular
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDeletePost()
    {
        try {
            return response()->json(Post::delete((array)\Input::get('id')));
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
            return response()->json($ajaxResponse);
        }
    }

    /**
     * id değerleri verilen gönderilerin kalıcı olarak siler
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postForceDeletePost()
    {
        try {
            return response()->json(Post::forceDelete((array)\Input::get('id')));
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
            return response()->json($ajaxResponse);
        }
    }

    public function postRestorePost()
    {
        try {
            return response()->json(Post::restore((array)\Input::get('id')));
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
            return response()->json($ajaxResponse);
        }
    }

    /**
     * Post Güncelleme işlemi
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdatePost()
    {
        try {
            /*
             * Get Post Request Data
             */
            $postData = \Input::all();
            /*
             * Validator Rules
             */
            $rules = array(
                'title' => 'required',
                'content' => 'required'
            );
            /*
             * Varlidator Error Message
             *  todo  ingilzce  tercüme
             */
            $messages = array(
                'title.required' => _('Başlık boş bırakılamaz'),
                'content.required' => _('İçerik boş bırakılamaz')
            );
            /*
             * Set Validator
             */
            $validator = \Validator::make($postData, $rules, $messages);

            /*
             * Check validate
             */
            if ($validator->fails()) {
                $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray()); //todo  burası  olmuyor
                return response()->json($ajaxResponse);
            } else
                return response()->json(Post::update($postData));

        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage() . $e->getFile() . $e->getLine());
            return response()->json($ajaxResponse);
        }

    }

    /**
     * id bilgisi  verilen gönderinin durumunu değiştirir
     * publish ise task, task ise punlish
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTogglePostStatus()
    {
        try {
            return response()->json(Post::toggleStatus((array)\Input::get('id')));
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
            return response()->json($ajaxResponse);
        }
    }

    public function postSendMessageToAdmin()
    {
        try {
            /*
             * name, email, message
             */
            $postData = \Input::all();
            extract($postData);
            $mailData = array('name' => $name, 'contactMessage' => $message, 'email' => $email);
            \Mail::send('emails.contact', $mailData, function ($message) use ($postData) {
                $message->to('sametatabasch@gmail.com', 'Samet ATABAŞ')->subject('Admin Panelden Mesaj');
                $message->from($postData['email'], $postData['name']);
            });
            $ajaxResponse = array('status' => 'success', 'msg' => _('Message Sent'));
            return response()->json($ajaxResponse);
        } catch (Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
            return response()->json($ajaxResponse);
        }
    }
}