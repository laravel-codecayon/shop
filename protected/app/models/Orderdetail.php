<?php
class Orderdetail extends BaseModel  {
	
	protected $table = 'orderdetails';
	protected $primaryKey = 'OrderDetailsID';

	public function __construct() {
		parent::__construct();
		
	}

	
}
