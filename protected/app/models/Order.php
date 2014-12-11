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
		);
	
	public static $columnTable=array(
			"OrderID" => array("label"=>"Order ID", "type"=>"text", "name"=>"OrderID", "value" => ""),
			"name" => array("label"=>"Customer", "type"=>"text", "name"=>"name", "value" => ""),
			"phone" => array("label"=>"Phone", "type"=>"text", "name"=>"phone", "value" => ""),
			"address" => array("label"=>"Address", "type"=>"text", "name"=>"address", "value" => ""),
			"email" => array("label"=>"Email", "type"=>"text", "name"=>"email", "value" => ""),
			"status" => array("label"=>"Status", "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>"New","1"=>"Waiting","2"=>"Finish","3"=>"Destroy")),
			"provinceid" => array("label"=>"City", "type"=>"select_nola", "name"=>"provinceid", "value" => "", "model"=>"province", "id"=>"provinceid", "show" =>"name"),
			"OrderDate" => array("label"=>"Order date", "type"=>"datatime", "name"=>"OrderDate", "value" => ""),
		);

}
