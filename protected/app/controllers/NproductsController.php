<?php
class NproductsController extends BaseController {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'Nproducts';
	static $per_page	= '10';
	
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Nproducts();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
		$this->lang = Session::get('lang') == '' ? CNF_LANG : Session::get('lang');
		$this->data = array(
			'pageTitle'	=> 	Lang::get('core.product'),
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'Nproducts',
			'trackUri' 	=> ''	
		);
			
				
	} 

	
	public function getIndex()
	{	
		if($this->access['is_view'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
				
		// Filter sort and order for query 
		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'ProductID'); 
		$order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null(Input::get('search')) ? $this->buildSearch() : '');
		$filter .=  " AND lang = '$this->lang'";
		// End Filter Search for query 
		
		// Take param master detail if any
		$master  = $this->buildMasterDetail(); 
		// append to current $filter
		$filter .=  $master['masterFilter'];
	
		
		$page = Input::get('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null(Input::get('rows')) ? filter_var(Input::get('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = Paginator::make($results['rows'], $results['total'],$params['limit']);		
		
		
		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();	
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit']; 
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= SiteHelpers::viewColSpan($this->info['config']['grid']);

		$test 						= $this->model->columnTable();
		$arr_search 				= SiteHelpers::arraySearch(Input::get('search'));
		foreach($arr_search as $key=>$val){
			if($key != "sort" && $key != "order" && $key != "rows"){
				$test[$key]['value'] = $val;
			}
		}
		$this->data['test'] = $test;
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		$this->data['masterdetail']  = $this->masterDetailParam(); 
		$this->data['details']		= $master['masterView'];
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
		$this->layout->nest('content','Nproducts.index',$this->data)
						->with('menus', SiteHelpers::menus());
	}		

	function postDownloads()
	{
		if($this->access['is_excel'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));

		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'ProductID'); 
		$order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
		$data = DB::table('products');
		if($_POST['ProductID'] != ''){
			$data->where('ProductID',"LIKE","%".$_POST['ProductID']."%");
		}
		if($_POST['ProductName'] != ''){
			$data->where('ProductName',"LIKE","%".$_POST['ProductName']."%");
		}
		if($_POST['UnitPrice'] != ''){
			$data->where('UnitPrice',"LIKE","%".$_POST['UnitPrice']."%");
		}
		if($_POST['CategoryID'] != ''){
			$data->where('CategoryID',"=",$_POST['CategoryID']);
		}
		if($_POST['id_promotion'] != ''){
			$data->where('id_promotion',"=",$_POST['id_promotion']);
		}
		if($_POST['status'] != ''){
			$data->where('status',"=",$_POST['status']);
		}
		$data = $data->get();
		$content = $this->data['pageTitle'];
		$content .= '<table border="1">';
		$content .= '<tr>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_id').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_name').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_price').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_category').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_promotion').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_status').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_created').'</th>';
		$content .= '</tr>';
		
		foreach ($data as $item)
		{
			$promotion = SiteHelpers::getNamePromotion($item->id_promotion);
			$promotion = count($promotion) > 0 ? $promotion->name : '';
			$status = $item->status == 1 ? Lang::get('core.enable') : Lang::get('core.disable');
			$content .= '<tr>';
			$content .= '<td>'. $item->ProductID . '</td>';
			$content .= '<td>'. $item->ProductName . '</td>';
			$content .= '<td>'. $item->UnitPrice . '</td>';
			$content .= '<td>'. SiteHelpers::getNameCat($item->CategoryID). '</td>';
			$content .= '<td>'. $promotion . '</td>';
			$content .= '<td>'. $status . '</td>';
			$content .= '<td>'.date('Y-m-d',$item->created) . '</td>';
			$content .= '</tr>';
		}
		$content .= '</table>';
		@header('Content-Type: application/ms-excel');
		@header('Content-Length: '.strlen($content));
		@header('Content-disposition: inline; filename="'.$title.' '.date("d/m/Y").'.xls"');
		
		echo $content;
		exit;
	}
	

	function getAdd( $id = null)
	{
		
		if($id =='')
		{
			if($this->access['is_add'] ==0 )
			return Redirect::to('')->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		}	
		
		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
			return Redirect::to('')->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
		}				
			
		$id = ($id == null ? '' : SiteHelpers::encryptID($id,true)) ;
		
		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('products'); 
		}
		/* Master detail lock key and value */
		if(!is_null(Input::get('md')) && Input::get('md') !='')
		{
			$filters = explode(" ", Input::get('md') );
			$this->data['row'][$filters[3]] = SiteHelpers::encryptID($filters[4],true); 	
		}
		$list_image = array();
		if($id != ""){
			$MD_imagesproduct = new Imagesproduct();
			$list_image = $MD_imagesproduct->getImagesOfProduct($id);
		}
		

		/* End Master detail lock key and value */
		$this->data['list_image'] = $list_image;
		$this->data['masterdetail']  = $this->masterDetailParam(); 
		$this->data['filtermd'] = str_replace(" ","+",Input::get('md')); 		
		$this->data['id'] = $id;
		$this->layout->nest('content','Nproducts.form',$this->data)->with('menus', $this->menus );	
	}
	
	function getShow( $id = null)
	{
	
		if($this->access['is_detail'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
					
		$ids = (is_numeric($id) ? $id : SiteHelpers::encryptID($id,true)  );
		$row = $this->model->getRow($ids);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('products'); 
		}
		$this->data['masterdetail']  = $this->masterDetailParam(); 
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->layout->nest('content','Nproducts.view',$this->data)->with('menus', $this->menus );	
	}	
	
	function postSave( $id =0)
	{

		$trackUri = $this->data['trackUri'];
		$rules = Nproducts::$rules;
		//print_r(Input::all());die;
		$validator = Validator::make(Input::all(), $rules);
		//SiteHelpers::globalXssClean();
		if ($validator->passes()) {
			$data = $this->getDataPost('products');
			if(!is_null(Input::file('file')))
			{
				$file = Input::file('file');
				$destinationPath = './uploads/products/';
				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension(); //if you need extension of the file
				$newfilename = Input::get('ProductName').'_'.time().'.'.$extension;
				$uploadSuccess = Input::file('file')->move($destinationPath, $newfilename);
				if( $uploadSuccess ) {
				    $data['image'] = $newfilename;
				    $orgFile = $destinationPath.'/'.$newfilename;
				    $thumbFile = $destinationPath.'/thumb/'.$newfilename;
				    SiteHelpers::resizewidth("152",$orgFile,$thumbFile);
				    if(Input::get('action') != "")
				    {
				    	$data_old = $this->model->getRow(Input::get('action'));
				    	@unlink(ROOT .'/uploads/products/'.$data_old->Picture);
				    	@unlink(ROOT .'/uploads/products/thumb/'.$data_old->Picture);
				    }
				}
			}


			$data['SupplierID'] = "1";
			$data['created'] = time();
			$data['slug'] =  SiteHelpers::seoUrl( trim($data['ProductName']));
			$data['created'] =  time();
			
			$ID = $this->model->insertRow($data , Input::get('ProductID'));
			if(Input::file('multi_file')[0] != "")
			{
				$model_img_pro = new Imagesproduct();
				$rm_image = Input::get('remove_image');
				$arr_img_rm = $rm_image != "" ? $rm_image : array();
				foreach($_FILES['multi_file']['tmp_name'] as $key => $tmp_name ){
					$file_name = $_FILES['multi_file']['name'][$key];

					if(!in_array($file_name,$arr_img_rm)){
						$file_size =$_FILES['multi_file']['size'][$key];
					    $file_tmp =$_FILES['multi_file']['tmp_name'][$key];
					    $file_type=$_FILES['multi_file']['type'][$key];
					    $explode_name = explode(".", $file_name) ;
					    $path_image = './uploads/images_product/';
					    $newname = "image_".$key.time().'.'.$explode_name[1];
					    if(move_uploaded_file($file_tmp,$path_image.$newname)){
					    	$model_img_pro->insertRow(array("name"=>$newname,"id_product"=>$ID),"");
					    	SiteHelpers::resizewidth("300",$path_image.$newname,$path_image."thumb/".$newname);
					    }
					}
				}
			}

			// Input logs
			if( Input::get('ProductID') =='')
			{
				$this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfull");
				$id = SiteHelpers::encryptID($ID);
			} else {
				$this->inputLogs(" ID : $ID  , Has Been Changed Successfull");
			}
			// Redirect after save	
			$md = str_replace(" ","+",Input::get('md'));
			$redirect = (!is_null(Input::get('apply')) ? 'Nproducts/add/'.$id.$trackUri :  'Nproducts'.$trackUri );
			return Redirect::to($redirect)->with('message', SiteHelpers::alert('success',Lang::get('core.note_success')));
		} else {
			return Redirect::to('Nproducts/add/'.$id)->with('message', SiteHelpers::alert('error',Lang::get('core.note_error')))
			->withErrors($validator)->withInput();
		}	
	
	}

	public function postDestroy()
	{
		if($this->access['is_remove'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));		
		// delete multipe rows 
		//$this->model->destroy(Input::get('id'));
		$this->inputLogs("ID : ".implode(",",Input::get('id')).Lang::get('core.note_success_delete'));

		foreach(Input::get('id') as $idpro){
			$data_pro = $this->model->getRow($idpro);
			$images = DB::table('images_product')->where('id_product',$idpro)->get();
			@unlink(ROOT .'/uploads/products/'.$data_pro->image);
			@unlink(ROOT .'/uploads/products/thumb/'.$data_pro->image);
			foreach($images as $image){
				@unlink(ROOT .'/uploads/images_product/'.$image->name);
				@unlink(ROOT .'/uploads/images_product/thumb/'.$image->name);
			}
			
			$images = DB::table('images_product')->where('id_product',$idpro)->delete();
		}

		// redirect
		Session::flash('message', SiteHelpers::alert('success',Lang::get('core.note_success_delete')));
		return Redirect::to('Nproducts?md='.Input::get('md'));
	}

	public function getDelimage(){
		$idimg = Input::get('idimg');
		if($idimg == "")
			die;

		$model_img_pro = new Imagesproduct();
		$img = $model_img_pro->find($idimg);
		if(count($img) <= 0)
			die;
		@unlink(ROOT .'/uploads/images_product/'.$img->name);
		@unlink(ROOT .'/uploads/images_product/thumb/'.$img->name);
		$model_img_pro->destroy($idimg);
		die;
	}
		
}