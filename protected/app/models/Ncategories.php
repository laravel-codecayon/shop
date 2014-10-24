<?php
class Ncategories extends BaseModel  {
	
	protected $table = 'categories';
	protected $primaryKey = 'CategoryID';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT categories.* FROM categories  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE categories.CategoryID IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	
	public static $rules=array(
			"CategoryName" => "required",
			"Description" => "required",
			"file" => "mimes:gif,png,jpg,jpeg|image|max:20000",
		);
}
