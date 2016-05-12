<?php

class RequestManager extends Manager{
	
	/**
	 * request pool of the trip request manager
	 * @var RequestPool
	 */
	private $requestPool;
	
	public function __construct($data = null){
		parent::__construct($data);
		$this->requestPool = null;
	}
	
	/**
	 * returns the request pool of the request manager
	 * @return RequestPool
	 */
	public function getRequestPool(){
		return $this->requestPool;
	}
	
	/**
	 * creates a trip request for the trip provided
	 * returns true for success, false otherwise
	 * @param Trip $trip
	 * @param int $requestPoolId
	 * @return boolean status
	 */
	public function createRequest($tripId, $requestPoolId = null){
	
		if($requestPoolId != null){
			$this->requestPool = new RequestPool($requestPoolId);
		}
		else{
			$this->requestPool = new RequestPool();
		}
		$trip = new Trip($tripId);
		$request = new Request();
		if($trip->addRequest($request)){
			$this->requestPool->addRequest($request);
		}
		else{
			return false;
		}
	}
	
	/**
	 * rejects the request corresponding to the requestId passed
	 * @param int $requestId
	 * @return boolean $status
	 */
	public function rejectRequest($requestId){
		$request = new Request($requestId);
		$request->setStatus(false);
	}
	
	/**
	 * cancels the request by the user
	 * @param int $requestId
	 * @return boolean $status
	 */
	public function cancelRideRequest($requestId){
		$request = new Request($requestId);
		return $request->setStatus(false);
	}
	
	
	public function acceptRequest($requestId){

		// create request
		// sreate request pool
		// accept request
	}
	
}