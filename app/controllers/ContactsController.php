<?php
class ContactsController extends BaseController {

	public function index() {
		return View::make( 'contacts/index' );
	}
}