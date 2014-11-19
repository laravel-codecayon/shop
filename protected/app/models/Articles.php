<?php
class Articles extends BaseModel  {
	
	protected $table = 'article';
	protected $primaryKey = 'article_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT article.* FROM article  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE article.article_id IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static $rules=array(
			"article_name" => "required",
			"article_description" => "required",
			"article_content" => "required",
			"cat_id" => "required",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);

	public static $columnTable=array(
			"article_name" => array("label"=>"Name", "type"=>"text", "name"=>"article_name", "value" => ""),
			"article_status" => array("label"=>"Status", "type"=>"radio", "name"=>"article_status", "value" => "","option"=>array("0"=>"Disable","1"=>"Enable")),
			"cat_id" => array("label"=>"Category", "type"=>"select", "name"=>"cat_id", "value" => "", "model"=>"article_categories", "id"=>"cat_id", "show" =>"name"),
			"created" => array("label"=>"Created", "type"=>"date", "name"=>"created", "value" => ""),
		);
	

}
