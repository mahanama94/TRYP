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
	}
	
	/**
	 * Gets a new authorization for the access
	 * return true if authorized, false otherwise
	 * @return boolean status of authorization
	 */
	public function getAuth(){
		
		// get username and password from the request data
		//$userName = $this->data["userName"];
		//$password = $this->data["password"];
		
		$userName = "mahanama94";
		$password = "123456789";
		// get authorization from the authorizer 
		$this->app->getAuthorizer()->getAuth($userName, $password);
		if($this->app->getAuthorizer()->getStatus()){
			//authorised for the actions
			$this->data["userName"] = $userName;
			return true;
		}
		else{
			$this->response["error"]["authorization"] = "NoAuthority";
			return false;
		}
		

	}
	
	
	// add user session info stuff later
	/**
	 * retrieve the existing user authorization
	 * @param unknown $userName
	 * @param unknown $sessionId
	 */
	public function auth(){
		$this->getAuth();
		echo json_encode($this->response);
	}
	
	/**
	 * search for rides for the credentials provided through post
	 * requires username , session Id for the request
	 */
	public function getRides(){
		
		//get credentials from through http requests
		$userName = "mahanama94";
		$sessionId = '7';
		$conditions = "";
		
		$this->auth($userName, $sessionId);

		if($this->app->getAuthorizer()->getStatus()){

			$this->app->getRides($userName, $conditions);

			$this->data["status"] = "success";
			$this->data["trip"] = array();
			$count =0;
			foreach($this->app->getTripManager()->getTripList() as $trip){
				$this->data["trip"][$count] = $trip->toArray() + array("tripId"=>$trip->getTripId());
				$count++;
			}
			$this->data["tripCount"] = sizeof($this->data["trip"]);
		}
		else{
			$this->data["status"]="fail";
		}
		
		echo var_dump($this);
		echo json_encode($this->data);
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
	
	/**
	 * creates a request for a ride for a given request pool,
	 * if request pool is not provided, creates a new request pool
	 */
	public function createRequest(){
		
		
		//NOT COMPLETED
		// get data from post
		$data = array(
		
		
		);
		
		if(!$this->getAuth()){
			// not authorized , terminate the session
			echo json_encode($this->data);
			return;
		}
		
		$app = App::getInstance();
		$app->setUser($this->data["userName"]);
		
		$app = App::getInstance()->createRequest($data);
		
		echo json_encode($this->response);
	}
	
	public function test2(){
		$dbConnection = DB::getInstance();
		$dbConnection->get("requestpool_request", array( "requestPoolId = 1"));
		foreach($dbConnection->result() as $trip){
			echo var_dump($trip);
		}
		echo var_dump($dbConnection);
		
	}
	
	
	public function locationUpdate(){
		
		if($this->getAuth()){
			$this->app->setUser($this->data["userName"]);
			$this->response["status"] = $this->app->getLocationManager()->updateLocation(null);
			// get errors from the manager
		}
		echo json_encode($this->response);
		
	}
	
}