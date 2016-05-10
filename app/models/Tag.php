<?php
class Tag{
	
	private $name;
	
	/**
	 * 
	 * @param unknown $name
	 */
	public function __construct($name){ 
		
		$dbConnection = DB::getInstance();
		$dbConnection->get("trip_tag", array("tag = '".$name."'"));
		
		if($dbConnection->count()==0){
			$dbConnection->insert("user");
		}
		else{
			$this->name = $name;
		}
	}
	
	public function getDayta(){
		return $this->data;
	}
	
}