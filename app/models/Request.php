<?php

class Request{
	
	/**
	 * 
	 * @var integer
	 */
	private $requestId;
	
	/**
	 * 
	 * @var boolean
	 */
	private $status;
	
	/**
	 * Constructor 
	 * if requestId = null, a new request is created and default data is assigned
	 * else retrieves the request from database and updates the request data
	 * @param int $requestId
	 */
	public function __construct($requestId = null){
		$dbConnection = DB::getInstance();
		if($requestId == null){
			// Update request table
			$dbConnection->insert("request", array("status"=> true));
			$this->requestId = $dbConnection->incrementCount();
			$dbConnection->insert("user_request", array(
					"userId" => App::getInstance()->getUser()->getUserId(),
					"requestId" => $this->getRequestId()
			));
			$this->status = true;
		}
		else{
			// an existing request
			$dbConnection->get("request", array("requestId = ".$requestId));
			$this->requestId = $requestId;
			$this->status = $dbConnection->getFirst()->status;
		}
		

	}
	
	/**
	 * returns the request id of the request
	 * @return int requestID
	 */
	public function getRequestId(){
		return $this->requestId;
	}

	/**
	 * 
	 * @param boolean $status
	 * @return boolean
	 */
	public function setStatus($status){
		$dbConnection = DB::getInstance();
		
		$dbConnection->update("request", " requestId = '".$this->requestId."'",array("status" => $status));
		
		if($dbConnection->error()){
			return false;
		}
		$this->status = $status;
		// NOTIFY OBSERVERS
		return true;
	}
	
	public function toArray(){
		$returnArray = array(
				"requestId" => $this->getRequestId(),
				"status" => $this->getStatus()
		);
	}
	
}
?>
