<?php namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;

class OptionsController extends BaseController
{
    public function __construct()
    {
        /**
         * login ve register sayfaları  dışındaki  sayfalarda oturum kontrolü
         */
        $this->middleware('auth');
    }

    /**
     * genel  ayarlar
     */
    public function getIndex()
    {
        if (userCan('manageGeneralOptions')) {
            $title = _('General Options');
            $rightSide = 'options/index';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function getUserPreferences()
    {
        if (userCan('manageOptions')) {
            $title = _('Site Preferences');
            $rightSide = 'options/preferences';
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide'))->withErrors($error);
    }

    public function getPostOptions()
    {
        if (userCan('manageOptions')) {
            $categoryList = array();
            foreach (Category::all(array('id', 'name', 'description', 'parentCat', 'level')) as $category) {
                $categoryList[$category->id] = $category->toArray();
            }
            function findSubCategories(&$categoryList, &$processedCat)
            {
                foreach ($categoryList as $id => $category) {
                    if ($category['parentCat'] == $processedCat['id']) {
                        $processedCat['subCategory'][$id] = $category;
                        findSubCategories($categoryList, $processedCat['subCategory'][$id]);
                    }
                }

            }

            $categoryTree = array();
            foreach ($categoryList as $id => $cat) {
                if ($cat['level'] == 0) {
                    $categoryTree[$id] = $cat;
                    findSubCategories($categoryList, $categoryTree[$id]);
                }
            }

            function createCategoriesSelectArray(&$list)
            {
                global $selectArray; // global yapmayınca sadece üst kategoriler ekleniyor
                $selectArray[0] = '';
                foreach ($list as $id => $cat) {
                    $selectArray[$id] = '' . str_repeat(' - ', $cat['level']) . $cat['name'];
                    if (!empty($cat['subCategory'])) {
                        createCategoriesSelectArray($cat['subCategory']);
                    }
                }
                return $selectArray;
            }

            function createCategoriesArray(&$list)
            {
                global $categoriesArray;

                foreach ($list as $id => $cat) {
                    $cat['name'] = str_repeat(' - ', $cat['level']) . $cat['name'];
                    $categoriesArray[$id] = $cat;
                    if (!empty($cat['subCategory'])) {
                        createCategoriesArray($cat['subCategory']);
                    }
                }
                return $categoriesArray;
            }


            $title = _('Post Options');
            $rightSide = 'options/post';
            $categories = json_decode(json_encode(createCategoriesArray($categoryTree)), false);
            $categoriesSelectArray = createCategoriesSelectArray($categoryTree);
            $error = null;
        } else {
            $title = _('Permission Error');
            $rightSide = 'error';
            $error = _('You do not have permission to access this page');
        }
        return \View::make('admin.index')->with(compact('title', 'rightSide', 'categories', 'categoriesSelectArray'))->withErrors($error);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function postSave()
    {
        if (\Request::ajax()) {
            $postData = \Input::all();
            //todo validation yapılır gerekirse
            $type = $postData['type'];
            switch ($type) {
                case 'general':
                    foreach ($postData['options'] as $key => $value) {
                        \Option::setOption($key, $value, $type);
                    }
                    $ajaxResponse = array('status' => 'success', 'msg' => _('Options Saved'), 'redirect' => '');
                    break;
                case 'preference':
                    foreach ($postData['options'] as $key => $value) {
                        \UserMeta::setMeta(\Auth::user()->id, $key, $value);
                    }
                    $ajaxResponse = array('status' => 'success', 'msg' => _('Options Saved'), 'redirect' => '');
                    break;
            }
            return response()->json($ajaxResponse);
        }
    }

    /**
     * post metodu ile gönderilen il koduna göre ilçeleri döner
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCounties()
    {
        $city_id = \Input::get('city_id');
        if (is_null($city_id)) return;
        $counties = \Option::getOption('counties', null, true);
        asort($counties[$city_id]);
        array_unshift($counties[$city_id], _('Select County'));
        return response()->json($counties[$city_id]);
    }

    public function postSaveCategory()
    {
        try {
            if (\Request::ajax()) {
                $postData = \Input::all();
                $rules = array(
                    'name' => 'required'
                );
                // todo  ingilzce  tercüme
                $messages = array(
                    'title.required' => _('Bir isim belirtmelisiniz'),
                );
                $validator = \Validator::make($postData, $rules, $messages);

                if ($validator->fails()) {
                    $ajaxResponse = array('status' => 'danger', 'msg' => $validator->messages()->toArray()); //todo  burası  olmuyor
                    return response()->json($ajaxResponse);
                } else {

                    $slug = Str::slug_utf8($postData['name']);

                    // aynı url var ise url sonuna sayı ekleyerek benzersiz url üretmek için
                    $sayac = 2;// url nin sonuna eklenecek sayı
                    $tempSayac = 2;
                    $tepmUrl = $slug;
                    while (\PostModel::where('url', '=', $tepmUrl)->count() > 0) {
                        if ($tempSayac < $sayac) {
                            $tepmUrl = $slug;
                            $tempSayac++;
                        }
                        $tepmUrl .= '-' . $sayac;
                        $sayac++;
                    }
                    $postData['slug'] = $tepmUrl;
                    /**
                     * Kategori seviyesi belirleniyor
                     */
                    $parentCat = $postData['parentCat'];
                    if ($parentCat > 0) {
                        $postData['level'] = Category::find($parentCat)->level + 1;
                    } else $postData['level'] = 0;

                    if ($postData['id'] != 0) {
                        Category::find($postData['id'])->fill(array_except($postData, 'id'))->push();
                    } else {
                        Category::create($postData);
                    }

                    $ajaxResponse = array('status' => 'success', 'msg' => _('Processing was carried out successfully'), 'redirect' => '');
                    return response()->json($ajaxResponse);
                }
            }
        } catch (\Exception $e) {
            $ajaxResponse = array('status' => 'danger', 'msg' => $e->getMessage() . $e->getFile() . $e->getLine());
            return response()->json($ajaxResponse);
        }
    }

    /**
     * id verisi ile kategoriyi siler
     */
    public function postDeleteCategory()
    {
        if (\Request::ajax()) {
            $ids = (array)\Input::get('id');
            if (!is_null($ids || !empty($ids))) {
                Category::destroy($ids);
                $response = array('status' => 'success', 'msg' => 'Deleted Successfully', 'redirect' => '');
                return response()->json($response);
            }
        }
    }

}