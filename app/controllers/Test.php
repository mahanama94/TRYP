<?php
class test extends Controller{
	
	public function bla(){
		$test =DB::getInstance()->get(" coordinates ", array(" userId = 1 "))->result();			
		//echo json_encode($test);
		$this->view("response/test", json_encode($test));
		//return $test;
	}
}
	