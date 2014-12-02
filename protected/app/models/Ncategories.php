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
	public static $columnTable=array(
			"CategoryID" => array("label"=>"ID", "type"=>"text", "name"=>"CategoryID", "value" => ""),
			"CategoryName" => array("label"=>"Name", "type"=>"text", "name"=>"CategoryName", "value" => ""),
			"created" => array("label"=>"Created", "type"=>"date", "name"=>"created", "value" => ""),
			"status" => array("label"=>"Status", "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>"Disable","1"=>"Enable")),
			//"UnitPrice" => array("label"=>"Price", "type"=>"text", "name"=>"UnitPrice", "value" => ""),
			//"CategoryID" => array("label"=>"Category", "type"=>"select", "name"=>"CategoryID", "value" => "", "model"=>"categories", "id"=>"CategoryID", "show" =>"CategoryName"),
		);
}
