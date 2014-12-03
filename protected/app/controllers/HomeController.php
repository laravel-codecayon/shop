<?php

class HomeController extends BaseController {

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
		$this->lang = Session::get('lang') == '' ? 'en' : Session::get('lang');
		 $this->layout = "layouts.".CNF_THEME.".index";
		
		
	} 	

	public function page($id){
		$data['id'] = $id;
		$this->data['pageTitle'] = 'Home';
		$this->data['pageNote'] = 'Welcome To Our Site';
		//$this->data['breadcrumb'] = 'inactive';
		$page = 'pages.template.index';


		$page = SiteHelpers::renderHtml($page);
		$this->layout->nest('content',$page,$data)->with('page', $this->data);
	}
	

	public function index()
	{
		if(CNF_FRONT =='false' && Session::get('uid') !=1) :
			if(!Auth::check())  return Redirect::to('user/login');
		endif; 
		$data['items'] = DB::table('products')->where('lang','=',$this->lang)->where('status','=','1')->orderby('created','desc')->limit('20')->get();
		$this->data['pageTitle'] = 'Home';
		$this->data['pageNote'] = 'Welcome To Our Site';
		//$this->data['breadcrumb'] = 'inactive';			
		$page = 'pages.template.home';
		
		$page = SiteHelpers::renderHtml($page);
		

		$this->layout->nest('content',$page,$data)->with('menus', $this->menus );
			
	}

	public function getAddtocart(){
		if($_GET['id'] != '' && $_GET['quality'] != ''){
			$id = $_GET['id'] ;
			$quality = $_GET['quality'] ;
			Session::start();
			$cart = Session::get('addcart');
			if($cart[$id] != ''){
				$cart[$id] = $cart[$id] + $quality;
			}
			else{
				$cart[$id] =  $quality;
			}

			Session::save('addcart',$cart);
			echo 1;die;
		}
		echo 0;die;

	}

	public function productdetail($alias = '',$id = ''){
		$mdPro = new Nproducts();
		$mdCat = new Ncategories();
		$mdImg = new Imagesproduct();
		$product = $mdPro->find($id);
		$cat = $mdCat->find($product->CategoryID);
		$images = $mdImg->getImagesOfProduct($product->ProductID);

		$data['cat'] = $cat;
		$data['cat_link'] = $cat != NULL ? "» <a href='".URL::to('')."/category/".$cat->alias."-".$cat->CategoryID.".html'>".$cat->CategoryName."</a>" : '';
		$data['images'] = $images;
		$data['product'] = $product;
		$seo['pageTitle'] = $product->ProductName;
		$seo['pageNote'] = $cat != NULL ? $cat->CategoryName :'Welcome To Our Site';
		$html = SiteHelpers::renderHtml('pages.template.productdetail');
		$this->layout->nest('content',$html,$data)->with('page', $seo);
	}

	public function categorydetail($alias = '',$id = ''){
		
		$cat = Ncategories::detail($id);
		$sortget = ( Input::get('sort') != '') ? Input::get('sort') : 'ProductID-desc';
		list($sort,$order) = explode('-', $sortget);
		$filter = " AND status = 1 AND CategoryID = $id AND lang = '$this->lang'";
		$page = (!is_null(Input::get('page') && Input::get('page') != '')) ? Input::get('page') : 1;
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null(Input::get('numpage')) ? filter_var(Input::get('numpage'),FILTER_VALIDATE_INT) : $this->perpage ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			//'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		$model = new Nproducts();
		$results = $model->getRows( $params );
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = Paginator::make($results['rows'], $results['total'],$params['limit']);
		$data['cat']		=$cat;
		$data['data']		= $results['rows'];
		$data['page']		= $page;
		$data['sort']		= $sortget;
		$data['numpage']	= $params['limit'];
		// Build Pagination 
		$data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$data['pager'] 		= $this->injectPaginate();

		$html = SiteHelpers::renderHtml('pages.template.category');
		$this->layout->nest('content',$html,$data);
	}
	
	public function  postContactform()
	{
	
		$this->beforeFilter('csrf', array('on'=>'post'));
		$rules = array(
				'name'		=>'required',
				'subject'	=>'required',
				'message'	=>'required|min:20',
				'sender'	=>'required|email'			
		);
		$validator = Validator::make(Input::all(), $rules);	
		if ($validator->passes()) 
		{
			
			$data = array('name'=>Input::get('name'),'sender'=>Input::get('sender'),'subject'=>Input::get('subject'),'notes'=>Input::get('message')); 
			$message = View::make('emails.contact', $data); 		
			
			$to 		= 	CNF_EMAIL;
			$subject 	= Input::get('subject');
			$headers  	= 'MIME-Version: 1.0' . "\r\n";
			$headers 	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers 	.= 'From: '.Input::get('name').' <'.Input::get('sender').'>' . "\r\n";
				//mail($to, $subject, $message, $headers);			

			return Redirect::to('?p='.Input::get('redirect'))->with('message', SiteHelpers::alert('success','Thank You , Your message has been sent !'));	
				
		} else {
			return Redirect::to('?p='.Input::get('redirect'))->with('message', SiteHelpers::alert('error','The following errors occurred'))
			->withErrors($validator)->withInput();
		}		
	}
	public function  getLang($lang='en')
	{
		Session::put('lang', $lang);
		return  Redirect::back();
	}	
}