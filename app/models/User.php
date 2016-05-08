<?php

class User{
	
	protected $userName, $name, $userId, $loggedIn = false;
	protected $personalData;
	protected $account;
	
	public function __construct($username){
		$this->userName = $username;
		//retrieve other information from the database
	}
	
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function getUserName(){
		return $this->userName;
	}
	
	public function getName(){
		return $this->name;
	}
}
?>