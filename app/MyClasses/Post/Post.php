<?php
/**
 * Created by PhpStorm.
 * User: sametatabasch
 * Date: 31.12.2015
 * Time: 23:25
 */

namespace App\MyClasses\Post;

use Illuminate\Support\Str;
use Symfony\Component\Finder\Exception\AccessDeniedException;


class Post
{
    /**
     * Veri tabanına yeni gönderi ekler ve işlem sonucunun json olarak kullanmak üzere array olarak döner.
     * Sadece ajax ile çalışır
     *
     * @param $postData
     * @return array
     * @throws \Exception
     */
    public function addNew($postData)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));
        try {
            $url = $this->creatUrl($postData);

            $post = \PostModel::create(array(
                'author' => \Auth::user()->id,
                'content' => $postData['content'],
                'title' => $postData['title'],
                'excerpt' => mb_substr(strip_tags($postData['content']), 0, 450, 'UTF-8'),
                'status' => $postData['status'],
                'type' => $postData['type'],
                'url' => $url,
                'created_ip' => \Request::getClientIp()
            ));

            if (isset($postData['postMeta'])) {
                $postMeta = $postData['postMeta'];
                $modelPostMeta = array();
                foreach ($postMeta as $key => $value) {
                    $modelPostMeta[] = new \PostMeta(array('metaKey' => $key, 'metaValue' => $value));
                }
                $post->postMeta()->saveMany($modelPostMeta);
            }
            $actionToType = \Option::getOption('postTypes', 'general', true);
            $redirectAction = 'AdminController@get' . $actionToType[$postData['type']];//gönderinin türü ne ise o türün listesine yönlendirme için
            return $ajaxResponse = array('status' => 'success', 'msg' => _('Processing was carried out successfully'), 'redirect' => \URL::action($redirectAction));

        } catch (\Exception $e) {
            return $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage() . $e->getLine());
        }
    }

    /**
     * Gönderinin urlsini hazırlar
     *
     * eğer aynı urlye sahip başka gönderi var ise yazı urlsini sonuna rakam ekleyerek çakışmayı önler
     *
     * @param $postData
     * @return string
     */
    private function creatUrl($postData)
    {
        // eğer gönderi slayt ise bir dış urlsi var demektir direk onu dönüyoruz
        if ($postData['type'] === 'slider') return $postData['url'];
        else $url = Str::slug_utf8($postData['title']);

        // aynı başlıklı yazı var ise url sonuna sayı ekleyerek benzersiz url üretmek için
        $sayac = 2;// url nin sonuna eklenecek sayı
        $tempSayac = 2;
        $tepmUrl = $url;
        while (\PostModel::where('url', '=', $tepmUrl)->count() > 0) {
            if ($tempSayac < $sayac) {
                $tepmUrl = $url;
                $tempSayac++;
            }
            $tepmUrl .= '-' . $sayac;
            $sayac++;
        }
        return $tepmUrl;
    }

    /**
     * Post sil işlemi
     * belirtilen idlerdeki gönderilerin status değerlerini trashed olarak değiştirir ve soft delete işlemi uygular
     *
     * @param $ids
     * @return array
     * @throws \Exception
     */
    public function delete($ids)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));
        try {
            if (!is_null($ids || !empty($ids))) {
                \PostModel::whereIn('id', $ids)->update(['status' => 'trashed']);
                \PostModel::destroy($ids);
                return $response = array('status' => 'success', 'msg' => 'Deleted Successfully', 'redirect' => '');
            } else throw new \Exception(_('Id(s) not set!'));

        } catch (\Exception $e) {
            return $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage());
        }
    }

}