<?php

class WardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected  $perpage = 12;

	public function __construct() {
		
		parent::__construct();
		$this->lang = Session::get('lang') == '' ? CNF_LANG : Session::get('lang');
		 $this->layout = "layouts.".CNF_THEME.".index";
		$this->model = new Nproducts();
		
	}
}
?>