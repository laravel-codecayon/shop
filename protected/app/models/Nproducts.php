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
			"SupplierID" => "required",
			"CategoryID" => "required",
			"UnitPrice" => "numeric",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);
	
	public static $columnTable=array(
			"ProductID" => array("label"=>"ID", "type"=>"text", "name"=>"ProductID", "value" => ""),
			"ProductName" => array("label"=>"Name", "type"=>"text", "name"=>"ProductName", "value" => ""),
			"UnitPrice" => array("label"=>"ID", "type"=>"text", "name"=>"UnitPrice", "value" => ""),
		);

}
