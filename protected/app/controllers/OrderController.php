<?php
class OrderController extends BaseController {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'order';
	static $per_page	= '10';
	
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Order();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	Lang::get('core.order'),
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'order',
			'trackUri' 	=> ''	
		);
			
				
	} 

	
	public function getIndex()
	{
		if($this->access['is_view'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
				
		// Filter sort and order for query 
		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'OrderID'); 
		$order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null(Input::get('search')) ? $this->buildSearch() : '');
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
		

		$test 						= $this->model->columnTable();
		$arr_search 				= SiteHelpers::arraySearch(Input::get('search'));
		foreach($arr_search as $key=>$val){
			if($key != "sort" && $key != "order" && $key != "rows"){
				$test[$key]['value'] = $val;
			}
		}
		$this->data['test'] = $test;
		
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
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		$this->data['masterdetail']  = $this->masterDetailParam(); 
		$this->data['details']		= $master['masterView'];
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
		$this->layout->nest('content','order.index',$this->data)
						->with('menus', SiteHelpers::menus());
	}		
	
	function getUpdateorder(){
		if($this->access['is_edit'] ==0 ){
			echo "0";die;
		}
		if($_REQUEST['id'] == '' || $_REQUEST['qual'] == '' || $_REQUEST['order'] == ''){
			echo "0";die;
		}
		$id = $_GET['id'];
		$qua = $_GET['qual'];
		$order = $_GET['order'];
		if($qua == 0){
			DB::table('orderdetails')->where('ProductID','=',$id)->where("OrderID","=",$order)
									->delete();
			$this->inputLogs("OrderID : ".$order."ProductID : ".$id."  , Has Been Removed Successfull");
			echo "2";die;
		}else{
			DB::table('orderdetails')->where('ProductID','=',$id)->where("OrderID","=",$order)
									->update(array('Quantity'=> $qua));
			$this->inputLogs("OrderID : ".$order."ProductID : ".$id."  , Has Been Update");
			echo "1";die;
		}

	}

	function getDelorder(){
		if($this->access['is_edit'] ==0 ){
			echo "0";die;
		}
		if($_REQUEST['id'] == '' || $_REQUEST['order'] == ''){
			echo "0";die;
		}
		$id = $_GET['id'];
		$order = $_GET['order'];
		DB::table('orderdetails')->where('ProductID','=',$id)->where("OrderID","=",$order)
									->delete();
		$this->inputLogs("OrderID : ".$order."ProductID : ".$id."  , Has Been Removed Successfull");
		echo "2";die;

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
		$items = DB::table("orderdetails")->where("OrderID","=",$id)->get();
		$this->data['items'] = $items;
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('orders'); 
		}
		/* Master detail lock key and value */
		if(!is_null(Input::get('md')) && Input::get('md') !='')
		{
			$filters = explode(" ", Input::get('md') );
			$this->data['row'][$filters[3]] = SiteHelpers::encryptID($filters[4],true); 	
		}
		/* End Master detail lock key and value */
		$this->data['masterdetail']  = $this->masterDetailParam(); 
		$this->data['filtermd'] = str_replace(" ","+",Input::get('md')); 		
		$this->data['id'] = $id;
		$this->layout->nest('content','order.form',$this->data)->with('menus', $this->menus );	
	}
	
	function getShow( $id = null)
	{
	
		if($this->access['is_detail'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));
					
		$ids = (is_numeric($id) ? $id : SiteHelpers::encryptID($id,true)  );
		$row = $this->model->getRow($ids);
		$items = DB::table("orderdetails")->where("OrderID","=",$ids)->get();
		$this->data['items'] = $items;
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('orders'); 
		}
		$this->data['masterdetail']  = $this->masterDetailParam(); 
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		$this->layout->nest('content','order.view',$this->data)->with('menus', $this->menus );	
	}	
	
	function postDownloads()
	{
		if($this->access['is_excel'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));

		$sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'OrderID'); 
		$order = (!is_null(Input::get('order')) ? Input::get('order') : 'desc');
		$data = DB::table('orders');
		if($_POST['OrderID'] != ''){
			$data->where('OrderID',"LIKE","%".$_POST['OrderID']."%");
		}
		if($_POST['name'] != ''){
			$data->where('name',"LIKE","%".$_POST['name']."%");
		}
		if($_POST['email'] != ''){
			$data->where('email',"LIKE","%".$_POST['email']."%");
		}
		if($_POST['phone'] != ''){
			$data->where('phone',"LIKE","%".$_POST['phone']."%");
		}
		if($_POST['address'] != ''){
			$data->where('address',"=",$_POST['address']);
		}
		if($_POST['status'] != ''){
			$data->where('status',"LIKE","%".$_POST['status']."%");
		}
		if($_POST['provinceid'] != ''){
			$data->where('provinceid',"=",$_POST['provinceid']);
		}
		$data = $data->get();
		$content = $this->data['pageTitle'];
		$content .= '<table border="1">';
		$content .= '<tr>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_id').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_name').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_phone').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_email').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.sex').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_city').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_district').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_ward').'</th>';
		$content .= '<th style="background:#f9f9f9;">'.Lang::get('core.table_date').'</th>';
		$content .= '</tr>';
		
		foreach ($data as $item)
		{
			$content .= '<tr>';
			$content .= '<td>'. $item->OrderID . '</td>';
			$content .= '<td>'. $item->name . '</td>';
			$content .= '<td>'. $item->phone . '</td>';
			$content .= '<td>'. $item->email . '</td>';
			$content .= '<td>'. SiteHelpers::getSex($item->sex) . '</td>';
			$content .= '<td>'. SiteHelpers::getNameaddress($item->provinceid,'province',"provinceid") . '</td>';
			$content .= '<td>'. SiteHelpers::getNameaddress($item->districtid,'district',"districtid") . '</td>';
			$content .= '<td>'. SiteHelpers::getNameaddress($item->wardid,'ward',"wardid") . '</td>';
			$content .= '<td>'. $item->OrderDate . '</td>';
			$content .= '</tr>';
		}
		$content .= '</table>';
		@header('Content-Type: application/ms-excel');
		@header('Content-Length: '.strlen($content));
		@header('Content-disposition: inline; filename="'.$title.' '.date("d/m/Y").'.xls"');
		
		echo $content;
		exit;
	}

	function postSave( $id =0)
	{
		//$trackUri = $this->data['trackUri'];
		$rules = $this->validateForm();
		$validator = Validator::make(Input::all(), $rules);	
		if ($validator->passes()) {
			$data = $this->getDataPost('orders');
			unset($data['lang']);
			$ID = $this->model->insertRow($data , Input::get('OrderID'));
			// Input logs
			if( Input::get('OrderID') =='')
			{
				$this->inputLogs("New Entry row with ID : $ID  , Has Been Save Successfull");
				$id = SiteHelpers::encryptID($ID);
			} else {
				$this->inputLogs(" ID : $ID  , Has Been Changed Successfull");
			}
			// Redirect after save	
			$md = str_replace(" ","+",Input::get('md'));
			$redirect = (!is_null(Input::get('apply')) ? 'order/add/'.$id.'?md='.$md :  'order?md=' );
			return Redirect::to($redirect)->with('message', SiteHelpers::alert('success',Lang::get('core.note_success')));
		} else {
			return Redirect::to('order/add/'.$id.'?md='.$md)->with('message', SiteHelpers::alert('error',Lang::get('core.note_error')))
			->withErrors($validator)->withInput();
		}	
	
	}
	
	public function postDestroy()
	{
		
		if($this->access['is_remove'] ==0) 
			return Redirect::to('')
				->with('message', SiteHelpers::alert('error',Lang::get('core.note_restric')));		
		// delete multipe rows 
		$this->model->destroy(Input::get('id'));
		$this->inputLogs("ID : ".implode(",",Input::get('id'))."  , Has Been Removed Successfull");
		// redirect
		Session::flash('message', SiteHelpers::alert('success',Lang::get('core.note_success_delete')));
		return Redirect::to('order?md='.Input::get('md'));
	}			
		
}