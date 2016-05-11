<?php

class RequestManager extends Manager{
	
	/**
	 *
	 * @var RequestPool
	 */
	private $requestPool;
	
	
	public function __construct($data = null){
		parent::__construct($data);
		$this->requestPool = null;
	}
	
	public function acceptRequest($tripId, $requestId){
	
		// create request
		// sreate request pool
		// accept request
	}
	
	public function rejectRequest(){
	
		// create request
		// reject request
	}
	
	public function cancelRideRequest(){
		// create request
		// reject request
	}
}