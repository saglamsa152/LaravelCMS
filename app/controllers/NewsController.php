<?php
class NewsController extends BaseController {

	public function index() {
		return View::make( 'news/index' );
	}
}