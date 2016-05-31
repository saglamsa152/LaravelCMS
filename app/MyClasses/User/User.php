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


}