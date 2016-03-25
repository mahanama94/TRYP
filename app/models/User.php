<?php

class User implements JsonSerializable{
	private $userName, $name, $userId, $loggedIn = false;
	private $personalData;
	
	/**
	 * returns thw name of the user
	 */
	public function getName(){
		return $this->name;
	}
	
	/**
	 * returns the username of the user
	 */
	public function getUserName(){
		return $this->userName;
	}
	
	/**
	 * returns the userId of the user
	 */
	public function getUserId(){
		return $this->userId;
	}
	
	/**
	 * returns the logged in status of the user
	 */
	public function isLoggedIn(){
		return $this->loggedIn;
	}
	
	/**
	 * constructs a new user object
	 * requires username and password through post method
	 */
	public function __construct(){
		
		$dbConnection = DB::getInstance();
		
		$userName = Input::get("userName");
		$password = Input::get("password");
		
		$dbConnection->get("user", array("userName = '$userName' ", "password = '$password' "));
		
		if($dbConnection->count()==1){
			$this->loggedIn = true;
			$this->userName = $dbConnection->getFirst()->userName;
			$this->userId = $dbConnection->getFirst()->userId;
			$this->name = $dbConnection->getFirst()->name;
			//get personal data for the user
		}
		
	}
	
	public function createUser(){
		//Code to register a new user
		//update Database
		//call constructor
	}
	
	
	/**
	 * 
	 */
	public function JsonSerialize()
	{
		$vars = get_object_vars($this);
		return $vars;
	}
}
?>