<?php
class ServicesController extends BaseController {

	public function index() {
		return View::make( 'services/index' );
	}
}