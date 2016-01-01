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
     * @param array $postData
     * @return array
     * @throws \Exception
     */
    public function addNew(array $postData)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));
        $url = $this->createUrl($postData);

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


    }

    /**
     * Post sil işlemi
     * belirtilen idlerdeki gönderilerin status değerlerini trashed olarak değiştirir ve soft delete işlemi uygular
     *
     * @param array $ids
     * @return array
     * @throws \Exception
     */
    public function delete(array $ids)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));
        if (!is_null($ids || !empty($ids))) {
            \PostModel::whereIn('id', $ids)->update(['status' => 'trashed']);
            \PostModel::destroy($ids);
            return $response = array('status' => 'success', 'msg' => 'Deleted Successfully', 'redirect' => '');
        } else throw new \Exception(_('Id(s) not set!'));
    }

    /**
     * Silinmiş  gönderiyi taslak olarak geri getirir
     *
     * @param array $ids
     * @return array
     * @throws \Exception
     */
    public function restore(array $ids)
    {
        if (\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));

        if (!is_null($ids || !empty($ids))) {
            \PostModel::onlyTrashed()->whereIn('id', $ids)->update(['status' => 'task']);
            \PostModel::onlyTrashed()->whereIn('id', $ids)->restore();

            return $response = array('status' => 'success', 'msg' => 'Restore Successfully', 'redirect' => '');
        }
    }

    /**
     * Çöp kutusunda bulunan gönderiyi kalıcı olarak siler
     *
     * todo #97
     *
     * @param array $ids
     * @return array
     * @throws \Exception
     */
    public function forceDelete(array $ids)
    {
        if (\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));

        if (!is_null($ids || !empty($ids))) {
            \PostModel::onlyTrashed()->whereIn('id', $ids)->forceDelete();

            return $response = array('status' => 'success', 'msg' => 'Deleted Successfully', 'redirect' => '');
        }
    }

    /**
     *  id bilgisi  verilen gönderinin durumunu değiştirir
     *  publish ise task, task ise punlish
     *
     * @param array $ids
     * @return array
     * @throws \Exception
     */
    public function toggleStatus(array $ids)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));

        if (!is_null($ids) || empty($ids)) {
            $status = ['publish' => 'task', 'task' => 'publish'];
            foreach ($ids as $id) {
                $post = \PostModel::find($id);
                $post->status = $status[$post->status];
                $post->save();
            }
            return $response = array('status' => 'success', 'msg' => 'Status Changed', 'redirect' => '');
        }
    }

    /**
     * Gönderi güncelleme işlemini  yapar
     *
     * @param array $postData
     * @return array
     * @throws \Exception
     */
    public function update(array $postData)
    {
        if (!\Request::ajax()) throw new \Exception(_('This request is not Ajax. Accept only ajax request.'));

        $post = \PostModel::find($postData['id']);

        $postData = array_add($postData, 'author', \Auth::user()->id);
        $postData = array_add($postData, 'excerpt', mb_substr(strip_tags($postData['content']), 0, 450, 'UTF-8'));
        $postData = array_add($postData, 'url', Str::slug_utf8($postData['title']));
        $postData = array_add($postData, 'created_ip', \Request::getClientIp());
        // meta bilgilerini  dizinen çıkartalım
        $metas = array_pull($postData, 'postMeta');
        // yeni bilgileri güncelleyelim
        $post->fill($postData)->push();

        if (!empty($metas)) {
            foreach ($metas as $key => $value) {
                if (is_null($value)) continue;
                \PostMeta::setMeta($postData['id'], $key, $value);
            }
        }
        return $response = array('status' => 'success', 'msg' => _('Update Successfully'), 'redirect' => '');
    }


    /**
     * Gönderinin urlsini hazırlar
     *
     * eğer aynı urlye sahip başka gönderi var ise yazı urlsini sonuna rakam ekleyerek çakışmayı önler
     *
     * @param array $postData
     * @return string
     */
    private function createUrl(array $postData)
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
     * Gönderilerin listelendiği tabloda kullanmak için gönderi durumuna uygun olarak
     * bootstrap labeli döndürür
     * @return string
     */
    public function getHtmlStatus($status) {

        $labelClass = array( 'publish' => 'label-success', 'task' => 'label-primary','trashed'=>'label-danger' );
        return '<span class="label ' . $labelClass[$status] . '">' . $status . '</span>';
    }
}