<?php
class ProductsController extends BaseController {

	public function index() {
		return View::make( 'products/index' );
	}
}