<?php
class Slideshow extends BaseModel  {
	
	protected $table = 'slideshow';
	protected $primaryKey = 'slideshow_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT slideshow.* FROM slideshow  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE slideshow.slideshow_id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	public static $rules=array(
			"slideshow_name" => "required",
			"slideshow_link" => "required",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);

	public static $columnTable=array(
			"slideshow_name" => array("label"=>"Name", "type"=>"text", "name"=>"slideshow_name", "value" => ""),
			"slideshow_status" => array("label"=>"Status", "type"=>"radio", "name"=>"slideshow_status", "value" => "","option"=>array("0"=>"Disable","1"=>"Enable")),
			"slideshow_link" => array("label"=>"Name", "type"=>"text", "name"=>"slideshow_link", "value" => ""),
			"created" => array("label"=>"Created", "type"=>"date", "name"=>"created", "value" => ""),
		);

}
