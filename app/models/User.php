<?php

class User{
	
	protected $userName, $name, $userId, $loggedIn = false;
	protected $personalData;
	protected $account;
	
	public function __construct($username){
		$this->userName = $username;
		//retrieve other information from the database
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
	
	public function setUserName($userName){
		$this->userName = $userName;
	}
	
	public function setUserId($userID){
		$this->userId = $userID;
	}
}
?>