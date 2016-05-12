<?php
class Api{
	
	/**
	 * app of the Api
	 * @var App
	 */
	private $app;
	/**
	 * request data for the request
	 * @var Array 
	 */
	private $data;
	
	/**
	 * response data for the request
	 * @var Array
	 */
	private $response;
	
	public function __construct(){
		$this->data = $_POST;
		$this->app = App::getInstance();
		$this->response = array();
		$this->response["error"] = array();
		//$this->data["userName"] = "malaka.14";
		//$this->data["password"] = "123654";
	}
	
	/**
	 * Gets a new authorization for the access
	 * return true if authorized, false otherwise
	 * @return boolean status of authorization
	 */
	public function getAuth(){
		
		// get username and password from the request data
		if(isset($this->data["userName"]) && isset($this->data["password"])){
			$userName = $this->data["userName"];
			$password = $this->data["password"];
			
			
			// get authorization from the authorizer 
			$this->app->getAuthorizer()->getAuth($userName, $password);
			if($this->app->getAuthorizer()->getStatus()){
				//authorised for the actions
				$this->data["userName"] = $userName;
				$this->response["authorization"] = "success";
				$this->app->setUser($this->data["userName"]);
				return true;
			}
		}
		else{
			$this->response["authorization"] = "fail";
			$this->response["error"]["authorization"] = "NoAuthority";
			return false;
		}
		

	}
	
	/**
	 * retrieve the existing user authorization
	 * @param unknown $userName
	 * @param unknown $sessionId
	 */
	public function auth(){
		$x = $this->getAuth();
		echo json_encode($this->response);
	}
	
	/**
	 * search for rides for the credentials provided through post
	 * requires username , session Id for the request
	 */
	public function getRides(){
		
		//get credentials from through http reque
		$conditions = "";
		
		if($this->getAuth()){
			
			if($this->app->getAuthorizer()->getStatus()){
	
				$this->app->getRides($this->data["userName"], $conditions);
	
				$this->response["status"] = "success";
				$this->response["trip"] = array();
				$count =0;
				foreach($this->app->getTripManager()->getTripList() as $trip){
					$this->response["trip"][$count] = $trip->toArray() + array("tripId"=>$trip->getTripId());
					$count++;
				}
				$this->response["tripCount"] = sizeof($this->response["trip"]);
			}
			else{
				$this->data["status"]="fail";
			}
		}
		echo json_encode($this->response);
	}
	
	/**
	 * add a ride corresponding to the credentials provided through the post
	 */
	public function addRide(){

		//sample data 
		$tripData = array(
			"start" => array(
					"latitude" => 5.00000,
					"longitude" => 5.00000
			),
			"end" => array(
					"latitude" => 2.00000,
					"longitude" => 2.00000
			),
			
			"dateTime" => "2016-05-20-08-30"
				
		);
		
		if(!$this->getAuth()){
			// not authorized , terminate the session
			echo json_encode($this->data);
			return;
		}
		
		$this->app->setUser($this->data["userName"]);
		if(!isset($tripData)){
			// trip data not set, terminate the session
			$this->data["error"] = "Trip Data not available";
			echo json_encode($this->data);
			return ;
		}
		
		if($this->app->addRide($tripData)){
			// ride data added successfully
			$this->response["status"] = "success";
			$lastTrip = $this->app->getTripManager()->getLastTrip();
			$this->response["tripData"] = $lastTrip->toArray();
		}
		else{
			$this->response["status"] = "fail";
		}
		
		echo json_encode($this->response);
		
	}
	
	// format the response
	
	/**
	 * creates a request for a ride for a given request pool,
	 * if request pool is not provided, creates a new request pool
	 */
	public function createRequest(){
		
		if($this->getAuth()){			
			if($this->app->createRequest($this->data)){
				$this->response["status"] = "success";
				$this->response["x"] ="aomedar";
			}
			echo json_encode($this->response);
		}
	}
	
	/**
	 * updates location of the user of the request to the location passed in post
	 */
	public function locationUpdate(){
		if($this->getAuth()){
			$this->app->setUser($this->data["userName"]);
			$this->response["status"] = $this->app->getLocationManager()->updateLocation(null);
		}
		echo json_encode($this->response);
		
	}
	
	/**
	 * rejects the request for a given requestId
	 * 
	 */
	public function rejectRequest(){
		
		$requestId = 12;
		if($this->getAuth()){
			if($this->app->rejectRequest($requestId)){
				$this->response["status"] = "success";
			}
		}
		echo json_encode($this->response);
	}
	
	public function getUserData(){
		if($this->getAuth()){
			$this->response["status"] = "success";
			$this->response["userData"] = $this->app->getUserData($this->data["userName"]);
		}
		else{
			$this->response["status"] = "fail";
		}
		echo json_encode($this->response);
	}
	
	public function cancelRequest(){
		
		$requestId = 6;
		
		if($this->getAuth()){
			if($this->app->cancelRequest($requestId)){
				$this->response["status"] = "success";
			}
			else{
				$this->response["status"] = "fail";
			}
		}
		echo json_encode($this->response);
	}
	// ------------------------ CHECK -------------------------------------------
	
	
	
}