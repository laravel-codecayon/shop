<?php
class DevelopmentController extends BaseController {

	protected $layout = "layouts.sximo.index";

	
	public function __construct() {
		parent::__construct();

			
				
	} 

	
	public function getIndex()
	{

		$data = array(
			'items' => DB::table('devproducts')->get()
		);	
		$this->layout->nest('content','development.index',$data);
	}		
	
	public function getRoadmap( $id ) {
		$data = array(
			'roadmaps' => DB::table('devroadmap')->where("itemid",'=',$id )->get(),
			'version' => DB::table('devversion')->where("itemid",'=',$id )->orderby('versionid','desc')->get(),
			'itemid'	=> $id
		);	
		$this->layout->nest('content','development.roadmap',$data);	
	}
	
	public function getIssues(  $id) {
		$data = array(
			'issues' => DB::table('devissue')->where("itemid",'=',$id )->get(),
			'version' => DB::table('devversion')->where("itemid",'=',$id )->orderby('versionid','desc')->get(),
			'itemid'	=> $id
		);	
		$this->layout->nest('content','development.issue',$data);		
	}


		
		
}