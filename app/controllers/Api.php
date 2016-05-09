<?php
class Api{
	
	private $data;
	
	public function __construct(){
		$this->data = array();
	}
	
	/**
	 * Gets a new authorization for the access
	 */
	public function getAuth(){
		
		// get username and password from the request data
		//$userName = $this->data["userName"];
		//$password = $this->data["password"];
		
		$userName = "mahanama94";
		$password = "123456789";
		$app = App::getInstance();
		// get authorization from the authorizer 
		$app->getAuthorizer()->getAuth($userName, $password);
		if($app->getAuthorizer()->getStatus()){
			//authorised for the actions
			$this->data["authorization"] = "success";
			$this->data["userName"] = $userName;
			return true;
		}
		else{
			$this->data["authorization"] = "fail";
			$this->data["error"] = "NoAuthority";
			return false;
		}
	}
	
	
	// add user session info stuff later
	/**
	 * retrieve the existing user authorization
	 * @param unknown $userName
	 * @param unknown $sessionId
	 */
	public function auth($userName, $sessionId){
		$app = App::getInstance();
		$app->getAuthorizer()->retireveAuth($userName, $sessionId);
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
		$app = App::getInstance();
		
		$this->auth($userName, $sessionId);

		if($app->getAuthorizer()->getStatus()){

			$app->getRides($userName, $conditions);

			$this->data["status"] = "success";
			$this->data["tripData"] = array();
			$count =0;
			foreach($app->getTripManager()->getTripList() as $trip){
				$this->data["tripData"][$count] = $trip->toArray() + array("tripId"=>$trip->getTripId());
				$count++;
			}
		}
		else{
			$this->data["status"]="fail";
		}
		
		echo json_encode($this->data);
	}
	
	/**
	 * add a ride corresponding to the credentials provided through the post
	 */
	public function addRide(){
		
		$this->data = $_POST;
	
		//sample data 
		$tripData = array(
			"start" => array(
					"latitude" => 5.00000,
					"longitude" => 5.00000
			),
			"end" => array(
					"latitude" => 2.00000,
					"longitude" => 2.00000
			)
				
		);
		
		if(!$this->getAuth()){
			// not authorized , terminate the session
			echo json_encode($this->data);
			return;
		}
		
		$app = App::getInstance();
		$app->setUser($this->data["userName"]);
		if(!isset($tripData)){
			// trip data not set, terminate the session
			$this->data["error"] = "Trip Data not available";
			echo json_encode($this->data);
			return ;
		}
		
		if($app->addRide($tripData)){
			// ride data added successfully
			$this->data["status"] = "success";
			$this->data["tripData"] = array();
			$count =0;
			foreach($app->getTripManager()->getTripList() as $trip){
				$this->data["tripData"][$count] = $trip->toArray() + array("tripId"=>$trip->getTripId());
				$count++;
			}
		}
		else{
			$this->data["status"] = "fail";
		}
		echo json_encode($this->data);
		
	}
	
	
	public function test(){
		
		if(!$this->getAuth()){
			// not authorized , terminate the session
			echo json_encode($this->data);
			return;
		}
		
		$app = App::getInstance();
		$app->setUser($this->data["userName"]);

		$testTrip  = new Trip(new Location(8.2222, 1.0000), new Location(1.0000, 1.0000));
		$testTrip->register(App::getInstance()->getUser());
		
		echo var_dump($app);
	}
	
}