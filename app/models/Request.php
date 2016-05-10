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
	 * @param Trip $trip
	 */
	public function __construct($trip){
		
		$dbConnection = DB::getInstance();
		
		$dbConnection->insert("request", array("status"=> true));		
		$this->requestId = $dbConnection->incrementCount();
		
		$this->status = true;
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
		$this->status = status;
		return true;
	}
}
