<?php
class Auth{
	
	private $apiSession;
	
	public function __construct(){
		$this->apiSession = new ApiSession();
	}
	
	/**
	 * returns the status of authorization
	 * true of authorized
	 * false otherwise
	 * @return boolean status
	 */
	public function getStatus(){
		return $this->apiSession->getStatus();
	}
	
	public function getSessionId(){
		return $this->apiSession->getSessionId();
	}
	/**
	 * gets the authority for an api session
	 * @param  $userName username of the user
	 * @param  $password password of the user
	 */
	public function getAuth($userName, $password){
		
		$dbConnection = DB::getInstance();
	
		$dbConnection->get("user", array("userName = '".$userName."'" , "password = '".$password."'"));
		
		if($dbConnection->count()==1){
			// update the apiSession object
			$this->apiSession->createSession($userName);
		}
		else{
			return;
		}
	}
	
	/**
	 * retirves the existing session for the API user
	 * @param $userName
	 * @param $sessionId
	 */
	public function retireveAuth($userName, $sessionId){
		$this->apiSession->retrieveSession($userName, $sessionId);
	}
		
}