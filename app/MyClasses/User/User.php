<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 31.05.2016
 * Time: 16:36
 */

namespace App\MyClasses\User;

class User
{
    /**
     * Create New User
     *
     * @param array $userData
     * @return array
     * @throws \Exception
     */
    public function add(array $userData)
    {

        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));
        $password = str_random(6);
        //meta verileini diziden çıkartalım ve $userMeta değişkenine atayalım
        $userMeta = array_pull($userData, 'meta');
        //password ve created_ip alanlarını  diziye ekleyelim
        $userData['password'] = \Hash::make($password);
        $userData['created_ip'] = \Request::getClientIp();

        // kullanıcıyı oluşturalım
        $user = \UserModel::create($userData);//kulllanıcıyı kaydedelim

        if ($user) {
            /**
             * yeni oluşturulan kullanıcının şifresini kullanıcının mail adresime mail olark gönderelim
             */
            $mailData = array('username' => $userData['username'], 'password' => $password);
            \Mail::send('emails.welcome', $mailData, function ($message) use ($userData) {
                $message->to($userData['email'], $userData['name'] . ' ' . $userData['lastName'])->subject('Hoş geldiniz!');
                $message->from(Option::getOption('mainMailAddress'), Option::getOption('siteName'));
            });

            //kullanıcı meta verilerini  kaydedelim
            foreach ($userMeta as $key => $value) {
                \UserMeta::setMeta($user->id, $key, $value);
            }
        }
        $ajaxResponse = array('status' => 'success', 'msg' => _('Yeni Üye oluşturuldu'), 'redirect' => \URL::action('AdminController@getProfile', $user->id));
        return $ajaxResponse;
    }

    /**
     * Update User Data
     *
     * @param array $userData
     * @return array
     * @throws \Exception
     */
    public function update(array $userData)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));

        $user = \UserModel::find($userData['id']);
        // meta bilgilerini  dizinen çıkartalım
        $metas = array_pull($userData, 'meta');
        // yeni bilgileri güncelleyelim
        $user->fill($userData)->push();

        foreach ($metas as $key => $value) {
            if (is_null($value)) continue;
            \UserMeta::setMeta($userData['id'], $key, $value);
        }
        return $response = array('status' => 'success', 'msg' => _('Saved successfully'), 'redirect' => \URL::action('AdminController@getProfile', $userData['id']));
    }

    public function updatePassword(array $passwordData)
    {

        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));

        if (isset($passwordData['id'])) {
            $user = \UserModel::findOrFail($passwordData['id']);
            if ($passwordData['currentPassword'] !== $passwordData['password']) {
                if (\Hash::check($passwordData['currentPassword'], $user->getAuthPassword())) {
                    $user->password = \Hash::make($passwordData['password']);
                    $user->save();
                    $ajaxResponse = array('status' => 'info', 'msg' => '');
                } else {
                    $ajaxResponse = array('status' => 'danger', 'msg' => array('currentPassword' => _('Incorrect Password')));
                }
            } else $ajaxResponse = array('status' => 'danger', 'msg' => array('password' => _('Passwords mustn\'t same')));
        } else throw new \Exception(_('Id not set!'));
        
        return $ajaxResponse;
    }


}