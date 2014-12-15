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
	
	public function columnTable(){
		$array =array(
			"OrderID" => array("label"=>Lang::get('core.table_id'), "type"=>"text", "name"=>"OrderID", "value" => ""),
			"name" => array("label"=>Lang::get('core.table_customer'), "type"=>"text", "name"=>"name", "value" => ""),
			"phone" => array("label"=>Lang::get('core.table_phone'), "type"=>"text", "name"=>"phone", "value" => ""),
			"address" => array("label"=>Lang::get('core.table_address'), "type"=>"text", "name"=>"address", "value" => ""),
			"email" => array("label"=>Lang::get('core.table_email'), "type"=>"text", "name"=>"email", "value" => ""),
			"status" => array("label"=>Lang::get('core.table_status'), "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>Lang::get('core.order_new'),"1"=>Lang::get('core.order_wait'),"2"=>Lang::get('core.order_finish'),"3"=>Lang::get('core.order_des'))),
			"provinceid" => array("label"=>Lang::get('core.table_city'), "type"=>"select_nola", "name"=>"provinceid", "value" => "", "model"=>"province", "id"=>"provinceid", "show" =>"name"),
			"OrderDate" => array("label"=>Lang::get('core.table_date'), "type"=>"datatime", "name"=>"OrderDate", "value" => ""),
		);
		return $array;
	}

}
