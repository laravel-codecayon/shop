<?php
class Ncategories extends BaseModel  {
	
	protected $table = 'categories';
	protected $primaryKey = 'CategoryID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT categories.* FROM categories  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE categories.CategoryID IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static function detail($id = ''){
		return DB::table('categories')->where('CategoryID','=',$id)->first();
	}
	
	public static $rules=array(
			"CategoryName" => "required",
			"Description" => "required",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);
	public function columnTable(){
		$array = array(
			"CategoryID" => array("label"=>Lang::get('core.table_id'), "type"=>"text", "name"=>"CategoryID", "value" => ""),
			"CategoryName" => array("label"=>Lang::get('core.table_name'), "type"=>"text", "name"=>"CategoryName", "value" => ""),
			"created" => array("label"=>Lang::get('core.table_created'), "type"=>"date", "name"=>"created", "value" => ""),
			"status" => array("label"=>Lang::get('core.table_status'), "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>Lang::get('core.disable'),"1"=>Lang::get('core.enable'))),
			//"UnitPrice" => array("label"=>"Price", "type"=>"text", "name"=>"UnitPrice", "value" => ""),
			//"CategoryID" => array("label"=>"Category", "type"=>"select", "name"=>"CategoryID", "value" => "", "model"=>"categories", "id"=>"CategoryID", "show" =>"CategoryName"),
		);
		return $array;
	}
}
