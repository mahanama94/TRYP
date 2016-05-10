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
	 * 
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
				// get requests corresponding to the request pool
			}
		}
	}
	
	
	/**
	 * 
	 * @param Request $request
	 * @return boolean 
	 */
	public function addRequest($request){
		
		$dbConnection = DB::getInstance();
		
		$dbConnection->insert("requestpool_request", array(
				"requestPoolId"=> $this->getRequestPoolId(),
				"requeestId" => $request->getRequestId(),
		))
		
	}
}