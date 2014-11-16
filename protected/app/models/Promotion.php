<?php
class Promotion extends BaseModel  {
	
	protected $table = 'promotion';
	protected $primaryKey = 'id_promotion';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT promotion.* FROM promotion  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE promotion.id_promotion IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

public static $rules=array(
			"name" => "required",
			"promotion" => "required|numeric",
		);

	public static $columnTable=array(
			"id_promotion" => array("label"=>"ID", "type"=>"text", "name"=>"id_promotion", "value" => ""),
			"name" => array("label"=>"Name", "type"=>"text", "name"=>"name", "value" => ""),
			"status" => array("label"=>"Status", "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>"Disable","1"=>"Enable")),
			"promotion" => array("label"=>"Promotion", "type"=>"text", "name"=>"promotion", "value" => ""),
		);

}
