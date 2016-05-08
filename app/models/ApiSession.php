<?php
class ApiSession{
	
	private $sessionId;
	private $status;
	
	public function __construct(){
		$this->sessionId = null;
		$this->status = false;
	}
	
	/**
	 * returns the status of the api session
	 * true if authorized,
	 * false otherwise
	 * @return boolean status of the session
	 */
	public function getStatus(){
		return $this->status;
	}
	
	public function getSessionId(){
		return $this->sessionId;
	}
	
	/**
	 * creates an Api sesssion for a given user name
	 * @param String $userName
	 */
	public function createSession($userName){
		$dbConnection = DB::getInstance();
		
		$dbConnection->insert(" session ", array(" userName "=> $userName, "status" => true));
		
		$this->sessionId = $dbConnection->incrementCount();
		
		$this->status = true;
	}
	
	/**
	 * retrieves an Api session for a given user name and a session ID
	 * @param String $userName
	 * @param Int $sessionId
	 */
	public function retrieveSession($userName, $sessionId){
		$dbConnection = DB::getInstance();
		
		$dbConnection->get("session", array(" userName = '".$userName."'", " sessionId = ".$sessionId));
		
		if($dbConnection->count()==1){
			$this->sessionId = $dbConnection->getFirst()->sessionId;
			$this->status = $dbConnection->getFirst()->status;
		}
	}
	
}