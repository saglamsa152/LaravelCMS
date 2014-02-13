<?php
class NewsController extends BaseController {

	public function getIndex() {
		$posts=Post::where('type','=','news')->paginate(5);
		return View::make( 'news/index' )->with('posts',$posts);
	}
}