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
	

	public static $columnTable=array(
			"title" => array("label"=>"Name", "type"=>"text", "name"=>"title", "value" => ""),
			"alias" => array("label"=>"Slug", "type"=>"text", "name"=>"alias", "value" => ""),
			"status" => array("label"=>"Status", "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>"Disable","1"=>"Enable")),
			//"CategoryID" => array("label"=>"Category", "type"=>"select", "name"=>"CategoryID", "value" => "", "model"=>"categories", "id"=>"CategoryID", "show" =>"CategoryName"),
			"created" => array("label"=>"Created", "type"=>"date", "name"=>"created", "value" => ""),
		);

}
