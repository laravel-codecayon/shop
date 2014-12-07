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
		$mdPage = new Pages();
		$item = $mdPage->find($id);

		$data['page'] = $item;
		$this->data['pageTitle'] = $item->title;
		$this->data['pageNote'] = 'Welcome To Our Site';

		//$this->data['breadcrumb'] = 'inactive';
		$page = 'pages.template.index';


		$page = SiteHelpers::renderHtml($page);
		$this->layout->nest('content',$page,$data)->with('page', $this->data);
	}

	public function cart()
	{
		$cart = Session::get('addcart');
		if(count($cart) <= 0){
			return Redirect::to('')->with('message', SiteHelpers::alert('success','Thank You , Your message has been sent !'));	
		}
		$datacart = array();
		$mdPro = new Nproducts();
		$mdCat = new Ncategories();
		//$total = 0;
		$total_real = 0;
		foreach ($cart as $key => $value) {
			$data = $mdPro->find($key);
			$category = $mdCat->find($data->CategoryID);
			$price_convert = SiteHelpers::getPricePromotion($data);

			$price_item = $price_convert * $value;
			//$total += $data->UnitPrice * $value ;
			$total_real += $price_item ;
			$datacart[$key]['image'] = $data->image == '' ? URL::to('').'/sximo/images/no_pic.png' : URL::to('').'/uploads/products/thumb/'.$data->image;
			$datacart[$key]['ProductName'] = $data->ProductName;
			$datacart[$key]['categoryname'] = $category->CategoryName != "" ?  $category->CategoryName : 'Unknow';
			$datacart[$key]['sl'] = $value;
			$datacart[$key]['price'] = number_format($price_convert,0,',','.') . 'VNĐ';
			$datacart[$key]['price_total'] = number_format($price_item,0,',','.') . 'VNĐ';
			$datacart[$key]['price_promition'] = $data->id_promotion != 0 ? '<br/><span style="color: #f00;font-weight: normal;text-decoration: line-through;">'.number_format($data->UnitPrice,0,',','.') . 'VNĐ</span><br/>' : '';
			$datacart[$key]['link'] = URL::to('')."/detail/".$data->slug . "-" . $data->ProductID . ".html";
		}
		$datas['cart'] = $datacart;
		//$datas['total'] = $total;
		$datas['total_real'] = number_format($total_real,0,',','.') . 'VNĐ';
		$datas['total'] = $total_real;
		//print_r($data);die;

		$seo['pageTitle'] = 'Cart';
		$seo['pageNote'] = 'Welcome To Our Site';
		$html = SiteHelpers::renderHtml('pages.template.cart');
		$this->layout->nest('content',$html,$datas)->with('page', $seo);
	}

	public function checkout()
	{
		$cart = Session::get('addcart');
		if(count($cart) <= 0){
			return Redirect::to('')->with('message', SiteHelpers::alert('success','Thank You , Your message has been sent !'));	
		}
		$datacart = array();
		$mdPro = new Nproducts();
		$mdCat = new Ncategories();
		//$total = 0;
		$total_real = 0;
		foreach ($cart as $key => $value) {
			$data = $mdPro->find($key);
			$category = $mdCat->find($data->CategoryID);
			$price_convert = SiteHelpers::getPricePromotion($data);

			$price_item = $price_convert * $value;
			//$total += $data->UnitPrice * $value ;
			$total_real += $price_item ;
			$datacart[$key]['image'] = $data->image == '' ? URL::to('').'/sximo/images/no_pic.png' : URL::to('').'/uploads/products/thumb/'.$data->image;
			$datacart[$key]['ProductName'] = $data->ProductName;
			$datacart[$key]['categoryname'] = $category->CategoryName != "" ?  $category->CategoryName : 'Unknow';
			$datacart[$key]['sl'] = $value;
			$datacart[$key]['price'] = number_format($price_convert,0,',','.') . 'VNĐ';
			$datacart[$key]['price_total'] = number_format($price_item,0,',','.') . 'VNĐ';
			$datacart[$key]['price_promition'] = $data->id_promotion != 0 ? '<br/><span style="color: #f00;font-weight: normal;text-decoration: line-through;">'.number_format($data->UnitPrice,0,',','.') . 'VNĐ</span><br/>' : '';
			$datacart[$key]['link'] = URL::to('')."/detail/".$data->slug . "-" . $data->ProductID . ".html";
		}
		$datas['cart'] = $datacart;
		//$datas['total'] = $total;
		$datas['total_real'] = number_format($total_real,0,',','.') . 'VNĐ';
		$datas['total'] = $total_real;

		$this->data['pageTitle'] = 'Check out';
		$this->data['pageNote'] = 'Welcome To Our Site';

		//$this->data['breadcrumb'] = 'inactive';
		$page = 'pages.template.checkout';


		$page = SiteHelpers::renderHtml($page);
		$this->layout->nest('content',$page,$datas)->with('page', $this->data);
	}

	public function getUpdatecart(){
		if($_GET['id'] != '' && $_GET['quality'] != ''){
			$id = $_GET['id'] ;
			$quality = $_GET['quality'] ;
			$cart = Session::get('addcart');
			if(isset($cart[$id])){
				$cart[$id] = $quality;
				Session::put('addcart',$cart);
				Session::save();
			}
		}
		die;
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
			$cart = Session::get('addcart');
			if(isset($cart[$id])){
				$cart[$id] = $cart[$id] + $quality;
			}
			else{
				$cart[$id] =  $quality;
			}
			
			Session::put('addcart',$cart);
			Session::save();
		}
		$output = SiteHelpers::getCart();

		echo $output;die;

	}

	public function getLoadcart(){
		$cart = Session::get('addcart');
		if(count($cart) > 0){
			$mdPro = new Nproducts();
			$datacart = array();
			foreach($cart as $key=>$val){
				$data = $mdPro->find($key);
				$price_convert = SiteHelpers::getPricePromotion($data);
				$price_item = $price_convert * $val;
				$datacart[$key]['ProductName'] = $data->ProductName;
				$datacart[$key]['image'] = $data->image != '' ? asset('uploads/products/thumb').'/'.$data->image : asset('sximo/images/no_pic.png');
				$datacart[$key]['sl'] = $val;
				$datacart[$key]['link'] = URL::to('detail').'/'.$data->slug.'-'.$data->ProductID.'.html';
				$datacart[$key]['price'] = number_format($price_convert,0,',','.').' VNĐ';
			}
			$view = View::make('pages.template.loadcart')->with('datacart', $datacart);
	    	echo $view;die;
		}else{
			echo '';die;
		}

	}

	public function getRemovecart(){
		if($_GET['id'] != ''){
			$id = $_GET['id'] ;
			$cart = Session::get('addcart');
			unset($cart[$id]);
			Session::put('addcart',$cart);
			Session::save();
		}
		$output = SiteHelpers::getCart();

		echo $output;die;
	}

	public function productdetail($alias = '',$id = ''){
		$mdPro = new Nproducts();
		$mdCat = new Ncategories();
		$mdImg = new Imagesproduct();
		$product = $mdPro->find($id);
		$cat = $mdCat->find($product->CategoryID);
		$images = $mdImg->getImagesOfProduct($product->ProductID);

		$pro_same = DB::table('products')->where('ProductID','!=',$product->ProductID)->where('status','=',1)->where('lang','=',$this->lang)->where('CategoryID','=',$product->CategoryID)->limit(10)->get();

		$data['pro_same'] = $pro_same;
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