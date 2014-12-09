<?php
class Order extends BaseModel  {
	
	protected $table = 'orders';
	protected $primaryKey = 'OrderID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT orders.* FROM orders  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE orders.OrderID IS NOT NULL   ";
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
			"OrderID" => array("label"=>"Order ID", "type"=>"text", "name"=>"OrderID", "value" => ""),
			"CustomerID" => array("label"=>"Customer", "type"=>"text", "name"=>"CustomerID", "value" => ""),
			"OrderDate" => array("label"=>"Order date", "type"=>"datatime", "name"=>"OrderDate", "value" => ""),
		);

}
