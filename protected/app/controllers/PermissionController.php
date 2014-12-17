<?php

class PermissionController extends BaseController {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'permission';
	
	
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		//$this->model = new Module();		

		$this->data = array(
			'pageTitle'	=>  Lang::get('core.permission') ,
			'pageNote'	=> 'Config permission for module',
		);
		$driver 		= Config::get('database.default');
		$database 		= Config::get('database.connections');
		$this->db 		= $database[$driver]['database'];
		$this->dbuser 	= $database[$driver]['username'];
		$this->dbpass 	= $database[$driver]['password'];
		$this->dbhost 	= $database[$driver]['host'];
		//$this->authValid = AuthenController::getCv();

				
	} 
		
	public function getIndex()
	{
			
			
			/*if($this->authValid['status'] =='error')
			{
				$this->data['message'] = $this->authValid['message'];
				$this->data['status'] = $this->authValid['status'];
				$this->layout->nest('content','admin.module.Login',$this->data); 
			 }	 else {*/

				$rowData = DB::table('tb_module')->where('module_type','=','addon')->where("status",'=',0)
								->orderby('module_title','asc')->get();
				$type = 'addon';

				$this->data['type']	= $type;	
				$this->data['rowData']	= $rowData;
				$this->data['module'] = $this->module;
				$this->layout->nest('content','admin.permission.index',$this->data)->with('menus', SiteHelpers::menus());
			}
	//}


	function getConfig( $id )
	{
	
		$row = DB::table('tb_module')->where('module_name', $id)
									->get();
			if(count($row) <= 0){
				return Redirect::to($this->module)
					->with('message', SiteHelpers::alert('error',Lang::get('core.not_found_module')));		
			}
			$row = $row[0];									
			$this->data['row'] = $row;			
			$this->data['module'] = $this->module;
			$this->data['module_name'] = $row->module_name;
			$config = SiteHelpers::CF_decode_json($row->module_config); 						
		
			$tasks = array(
				'is_global'		=> 'Global ',
				'is_view'		=> 'View ',
				'is_detail'		=> 'Detail',
				'is_add'		=> 'Add ',
				'is_edit'		=> 'Edit ',
				'is_remove'		=> 'Remove ',
				'is_excel'		=> 'Excel ',			
			);	
			/* Update permission global / own access new ver 1.1
			   Adding new param is_global
			   End Update permission global / own access new ver 1.1
			*/   
			if(isset($config['tasks'])) {
				foreach($config['tasks'] as $row)
				{
					$tasks[$row['item']] = $row['title'];
				}
			}
			$this->data['tasks'] = $tasks;		
			$this->data['groups'] = DB::table('tb_groups')->get();
	
			$access = array();
			foreach($this->data['groups'] as $r)		
			{
			//	$GA = $this->model->gAccessss($this->uri->rsegment(3),$row['group_id']);
				$group = ($r->group_id !=null ? "and group_id ='".$r->group_id."'" : "" );
				$GA = DB::select("SELECT * FROM tb_groups_access where module_id ='".$row->module_id."' $group");
				if(count($GA) >=1){
					$GA = $GA[0];
				}
				
				$access_data = (isset($GA->access_data) ? json_decode($GA->access_data,true) : array());
				$rows = array();
				//$access_data = json_decode($AD,true);
				$rows['group_id'] = $r->group_id;
				$rows['group_name'] = $r->name;
				foreach($tasks as $item=>$val)
				{
					$rows[$item] = (isset($access_data[$item]) && $access_data[$item] ==1  ? 1 : 0);
				}
				$access[$r->name] = $rows;
				
			
			}
			$this->data['access'] = $access;					
			$this->data['groups_access'] = DB::select("select * from tb_groups_access where module_id ='".$row->module_id."'");
			
			$this->layout->nest('content','admin.permission.config',$this->data)
								->with('menus', SiteHelpers::menus());
		}											
	//}

	function postSavepermission()
	{
		
		$id = Input::get('module_id');
		$row = DB::table('tb_module')->where('module_id', $id)
								->get();
		if(count($row) <= 0){
			return Redirect::to($this->module)
				->with('message', SiteHelpers::alert('error','Can not find module'));		
		}
		$row = $row[0];									
		$this->data['row'] = $row;	
		$config = SiteHelpers::CF_decode_json($row->module_config); 
		$tasks = array(
			'is_global'		=> 'Global ',
			'is_view'		=> 'View ',
			'is_detail'		=> 'Detail',
			'is_add'		=> 'Add ',
			'is_edit'		=> 'Edit ',
			'is_remove'		=> 'Remove ',
			'is_excel'		=> 'Excel ',			
		);	
		/* Update permission global / own access new ver 1.1
		   Adding new param is_global
		   End Update permission global / own access new ver 1.1
		   */
		
		if(isset($config['tasks'])) {
			foreach($config['tasks'] as $row)
			{
				$tasks[$row['item']] = $row['title'];
			}
		}	
		
		$permission = array();
		$groupID = Input::get('group_id');
		for($i=0;$i<count($groupID); $i++) 
		{
			// remove current group_access 			
			$group_id = $groupID[$i];
			DB::table('tb_groups_access')
							  ->where('module_id','=',Input::get('module_id'))
							  ->where('group_id','=',$group_id)
							  ->delete();	

			$arr = array();
			$id = $groupID[$i];
			foreach($tasks as $t=>$v)			
			{
				$arr[$t] = (isset($_POST[$t][$id]) ? "1" : "0" );
			
			}
			$permissions = json_encode($arr); 
			
			$data = array
			(
				"access_data"	=> $permissions,
				"module_id"		=> Input::get('module_id'),				
				"group_id"		=> $groupID[$i],
			);
			DB::table('tb_groups_access')->insert($data);	
		}
				
		return Redirect::to($this->module.'/config/'.$row->module_name)
		->with('message',SiteHelpers::alert('success',Lang::get('core.permission_note_success'))); 
		
			return Redirect::to('module')
			->with('message', SiteHelpers::alert('error',' Feature disabled on demo page '));			
	}	

}
