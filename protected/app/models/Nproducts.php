<?php
class Nproducts extends BaseModel  {
	
	protected $table = 'products';
	protected $primaryKey = 'ProductID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT products.* FROM products  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE products.ProductID IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static $rules=array(
			"ProductName" => "required",
			"UnitPrice" => "numeric",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);
	
	public static $columnTable=array(
			"ProductID" => array("label"=>"ID", "type"=>"text", "name"=>"ProductID", "value" => ""),
			"ProductName" => array("label"=>"Name", "type"=>"text", "name"=>"ProductName", "value" => ""),
			"UnitPrice" => array("label"=>"Price", "type"=>"text", "name"=>"UnitPrice", "value" => ""),
			"CategoryID" => array("label"=>"Category", "type"=>"select", "name"=>"CategoryID", "value" => "", "model"=>"categories", "id"=>"CategoryID", "show" =>"CategoryName"),
			"id_promotion" => array("label"=>"Promotion", "type"=>"select", "name"=>"id_promotion", "value" => "", "model"=>"promotion", "id"=>"id_promotion", "show" =>"name"),
			"created" => array("label"=>"Created", "type"=>"date", "name"=>"created", "value" => ""),
		);

}
