<?php
class ApiSession{
	
	private $sessionId;
	private $status;
	
	public function __construct(){
		$this->sessionId = null;
		$this->status = false;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function getSessionId(){
		return $this->sessionId;
	}
	
	public function createSession($userName){
		$dbConnection = DB::getInstance();
		$dbConnection->action(" SELECT MAX(sessionId) as MAX ", " session ", array("userName = '".$userName."'"));
		$sessionId = $dbConnection->getFirst()->MAX;
		settype($sessionId, "int");
		$dbConnection->insert(" session ", array(" userName "=> $userName, " sessionId" => $sessionId+1, " status "=> true));
		$this->sessionId = $sessionId + 1;
		$this->status = true;
	}
	
	public function retrieveSession($userName, $sessionId){
		$dbConnection = DB::getInstance();
		
		$dbConnection->get("session", array(" userName = '".$userName."'", " sessionId = ".$sessionId));
		
		if($dbConnection->count()==1){
			$this->sessionId = $dbConnection->getFirst()->sessionId;
			$this->status = $dbConnection->getFirst()->status;
		}
	}
	
}