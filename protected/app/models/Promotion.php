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

	public function columnTable(){
		$array =array(
			"id_promotion" => array("label"=>Lang::get('core.table_id'), "type"=>"text", "name"=>"id_promotion", "value" => ""),
			"name" => array("label"=>Lang::get('core.table_name'), "type"=>"text", "name"=>"name", "value" => ""),
			"status" => array("label"=>Lang::get('core.table_status'), "type"=>"radio", "name"=>"status", "value" => "","option"=>array("0"=>Lang::get('core.disable'),"1"=>Lang::get('core.enable'))),
			"promotion" => array("label"=>Lang::get('core.table_promotion'), "type"=>"text", "name"=>"promotion", "value" => ""),
			"created" => array("label"=>Lang::get('core.table_created'), "type"=>"date", "name"=>"created", "value" => ""),
		);
		return $array;
	}

}
