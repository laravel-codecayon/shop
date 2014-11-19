<?php
class News extends BaseModel  {
	
	protected $table = 'news';
	protected $primaryKey = 'news_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT news.* FROM news  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE news.news_id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static $rules=array(
			"news_name" => "required",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);

	public static $columnTable=array(
			"news_name" => array("label"=>"Name", "type"=>"text", "name"=>"news_name", "value" => ""),
			"news_status" => array("label"=>"Status", "type"=>"radio", "name"=>"news_status", "value" => "","option"=>array("0"=>"Disable","1"=>"Enable")),
			//"CategoryID" => array("label"=>"Category", "type"=>"select", "name"=>"CategoryID", "value" => "", "model"=>"categories", "id"=>"CategoryID", "show" =>"CategoryName"),
			"created" => array("label"=>"Created", "type"=>"date", "name"=>"created", "value" => ""),
		);
	

}
