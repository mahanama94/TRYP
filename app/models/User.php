<?php

class User{
	
	protected $userName, $name, $userId;
	protected $personalData;
	protected $account;
	
	/**
	 * constructs a user for the parameters passed
	 * default register false, password null retrieves a user from the database
	 * if register true, creates a new user and updates the database
	 * @param unknown $username
	 * @param boolean $register
	 * @param unknown $password
	 */
	public function __construct($username , $register = false, $password = null){
		if(!$register){
			$dbConnection = DB::getInstance();
			$dbConnection->get("user", array("userName = '".$username."'"));
			if(!$dbConnection->error()){
				$this->userName = $username;
				$this->userId = $dbConnection->getFirst()->userId;
				$this->setName($dbConnection->getFirst()->name);
				// retrieeve otherdata from the database
			}
			else{
				$this->setName(null);
			}
		}
		else{
			// add the user to the database
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
	
	/**
	 * sets the password of the user to the password passed
	 * returns true if successfull, false otherwise
	 * @param string $password
	 * @return boolean status
	 */
	public function setPassword($password){
		$dbConnection = DB::getInstance();
		$dbConnection->update("user", "userName ='".$this->getUserName()."'", array("password"=> $password));
		if($dbConnection->error()){
			return false;
		}
		$this->password = $password;
		return true;
	}
	
	/**
	 * updates the location data of the user with the current location
	 * as the location passed
	 * @param Location $location
	 */
	public function addLocation($location){
		$dbConnection = DB::getInstance();
		
		$dbConnection->insert("user_location", array(
			"userId" => $this->getUserId(),
			"location_lat" => $location->getLatitude(),
			"location_long" => $location->getLongitude()
		));
		return (!$dbConnection->error());
	}
	
	public function getLastLocation(){
		
	}
}
?>