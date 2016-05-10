<?php

class RequestPool{
	
	/**
	 * 
	 * @var Request[]
	 */
	private $requests = array();
	
	/**
	 * 
	 * @var int
	 */
	private $requestPoolId;
	
	/**
	 * creates a request pool for a given id number
	 * else creates a new request pool and assigns number from database
	 * @param int $poolId
	 */
	public function __construct($poolId = null){
		
		$user = App::getInstance()->getUser();
		$dbConnection = DB::getInstance();
		
		if($poolId == null){
		
			$dbConnection->insert("requestpool", array(
					"userId"=> $user->getUserId(),
					"status" => true,	
			));
			
			$this->requestPoolId = $dbConnection->incrementCount();
			return ;
		}
		else{
			$dbConnection->get("requestpool", array("requestPoolId = ".$poolId));
			
			if($dbConnection->error()){
				echo var_dump($dbConnection);
			}
			else{
				$this->requestPoolId = $dbConnection->getFirst()->requestPoolId;
				$this->requests = null;
				// add to the observables as an observer
			}
		}
	}
	
	/**
	 * returns the request pool id
	 * @return int
	 */
	public function getRequestPoolId(){
		return $this->requestPoolId;
	}
	
	/**
	 * returns the request in the requestPool
	 * if no request exists searched the database and updates
	 * @return Request[]
	 */
	public function getRequests(){
		if($this->requests == null){
			$dbConnection = DB::getInstance();
			$dbConnection->get("requestpool_request", array( "requestPoolId = ".$this->getRequestPoolId().""));
			// create request objects
			foreach($dbConnection->result() as $requestData){
				// create and add requests to requests
				$request = new Request($requestData->requestId);
				$this->requests[sizeof($this->requests)] = $request;
			}
		}
		return $this->requests;
	}
	
	
	/**
	 * adds the request to the request pool
	 * returns true if success, false otherwise
	 * @param Request $newRequest
	 * @return boolean status
	 */
	public function addRequest($newRequest){
		
		$dbConnection = DB::getInstance();
		
		$dbConnection->insert("requestpool_request", array(
				"requestPoolId"=> $this->getRequestPoolId(),
				"requeestId" => $newRequest->getRequestId()
		));
		
		if(!$dbConnection->error()){
			$this->getRequests()[sizeof($this->getRequests())] = $newRequest;
			$newRequest->attach($this);
			return true;
		}
		return false;
	}
}