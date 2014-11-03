<?php
class Imagesproduct extends BaseModel  {

	protected $table = 'images_product';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
	}

	public function getImagesOfProduct($id){
		$result = DB::select(" SELECT * FROM {$this->table} WHERE id_product = {$id} ORDER BY id");
		return $result;
	}
}
