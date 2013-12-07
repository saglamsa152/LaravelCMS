<?php
class AdminController extends BaseController {

	public function index() {
		return View::make( 'admin/index' );
	}

	public function listUser() {
		return View::make( 'admin/users' );
	}
}