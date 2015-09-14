<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 26.04.2015
 * Time: 14:50
 * Bu dosya composer autoload ile sisteme dahil edilmektedir.
 *
 */
use Illuminate\Support\Facades\Auth;

/**
 * kullanıcı yetkisine göre yapabileceği işlemleri  belirliyen fonksiyon
 * todo bu işlem  Auth sınıfı  genişletilerek yapılmalı
 *
 * @param $action
 *
 * @return bool
 */
function userCan($action)
{
    $user = Auth::user();
    $result = false;
    if (is_null($user)) return $result;
    $actions = array(
        'manageUsers' => ['admin', 'editor'],
        'editUserRole' => ['admin'],
        'deleteUser' => ['admin'],
        'addUser' => ['admin'],
        'viewUsers' => ['admin', 'editor', 'user'],
        'manageNews' => ['admin', 'editor'],
        'manageOptions' => ['admin', 'editor', 'user'],
        'manageGeneralOptions' => ['admin', 'editor'],
        'manageSlider' => ['admin', 'editor'],
        'manageService' => ['admin', 'editor'],
        'manageProduct' => ['admin', 'editor'],
        'manageOrders' => ['admin', 'editor'],
        'manageContact' => ['admin', 'editor'],
        'manageDues' => ['admin'],
        'viewDashboard' => ['admin', 'editor', 'user'],
        'manageMailbox' => ['admin', 'editor', 'user'],
        'manageMailSettings' => ['admin']
    );
    if (is_array($action)) {
        foreach ($action as $a) {
            if (array_key_exists($a, $actions)) {
                $acceptRoles = $actions[$a];
                if (in_array($user->role, $acceptRoles)) $result = true;
            }
        }
    } else {
        if (array_key_exists($action, $actions)) {
            $acceptRoles = $actions[$action];
            if (in_array($user->role, $acceptRoles)) $result = true;
        }
    }

    return $result;
}

/**
 * Filemanager sınıfını kullanmak için
 * @return FileManager
 */
function fileManager()
{
    return new FileManager();
}



/**
 * Yolu belirtilen resim dosyasının belirtilen ölçülerde yeniden oluşturup oluşturulan resmin yolunu döner
 *
 * @param $image <p>image path in public dir</p>
 * @param $arg <p>
 * width     integer    Maximum width of the image
 * height    integer    Maximum height of the image
 * crop      boolean    Crop the image to fit exactly in the width and height parameters
 * grayscale boolean    Make the image in black and white
 * negative  boolean    Invert the image
 * rotate    float      Rotate the image
 * gamma     float      Control the gamma of the image
 * blur      float      Apply some blur on the image
 * colorize  string     Colorize the image. (Hex color value)
 * </p>
 * @return string
 */
function thumbImageUrl($image, $arg = array())
{
    // set default
    $options = array(
        'width' => 150,
        'height' => 150,
        'crop' => false,
        'grayscale' => false
    );
    $options = array_merge($options, $arg);
    extract($options);
    if (File::exists($image)) {
        $extension = File::extension($image);
        $whitoutext =str_replace('.'.$extension,'',$image);
        Image::make($image, $options)->save($whitoutext . '-' . $width . 'x' . $height . '.' . $extension);//todo bütün parametrelern resim ismine eklenmeli
        return $whitoutext . '-' . $width . 'x' . $height . '.' . $extension;
    }
}