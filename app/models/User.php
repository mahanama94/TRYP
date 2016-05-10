<?php

class User{
	
	protected $userName, $name, $userId;
	protected $personalData;
	protected $account;
	
	public function __construct($username){
		
		$dbConnection = DB::getInstance();
		$dbConnection->get("user", array("userName = '".$username."'"));
		if(!$dbConnection->error()){
			$this->userName = $username;
			$this->setUserId($dbConnection->getFirst()->userId);
			$this->setName($dbConnection->getFirst()->name);
			// retrieeve otherdata from the database
		}
		else{
			$this->setName(null);
		}
	}
	
	/**
	 * returns the user Id of the user
	 */
	public function getUserId(){
		return $this->userId;
	}
	
	/**
	 * retrurns the user name of the user
	 */
	public function getUserName(){
		return $this->userName;
	}
	
	/**
	 * returns the Name of the user
	 */
	public function getName(){
		return $this->name;
	}
	
	protected function setUserName($userName){
		$this->userName = $userName;
	}
	
	protected function setUserId($userID){
		$this->userId = $userID;
	}
	
	/**
	 * sets the name of the user to the name passes
	 * returns true if successfull, false otherwise
	 * @param String $name
	 * @return boolean
	 */
	public function setName($name){
		
		$dbConnection = DB::getInstance();
		$dbConnection->update("user", "userName ='".$this->getUserName()."'", array("name"=> $name));
		if($dbConnection->error()){
			return false;
		}
		$this->name = $name;
		return true;
	}
}
?>