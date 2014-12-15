<?php
class Pages extends BaseModel  {
	
	protected $table = 'tb_pages';
	protected $primaryKey = 'pageID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_pages.* FROM tb_pages  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_pages.pageID IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

	public function columnTable(){
		$array = array(
			"title" => array("label"=>Lang::get('core.table_name'), "type"=>"text", "name"=>"title", "value" => ""),
			//"alias" => array("label"=>Lang::get('core.table_slug'), "type"=>"text", "name"=>"alias", "value" => ""),
			"status" => array("label"=>Lang::get('core.table_status'), "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>Lang::get('core.disable'),"1"=>Lang::get('core.enable'))),
			//"CategoryID" => array("label"=>"Category", "type"=>"select", "name"=>"CategoryID", "value" => "", "model"=>"categories", "id"=>"CategoryID", "show" =>"CategoryName"),
			"created" => array("label"=>Lang::get('core.table_created'), "type"=>"date", "name"=>"created", "value" => ""),
		);
		return $array;
	}

}
