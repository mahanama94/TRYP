<?php
class Api{
	
	private $data;
	
	public function __construct(){
		$this->data = array();
	}
	
	/**
	 * Gets a new authorization for the access
	 * @param $userName
	 * @param $passWord
	 */
	public function getAuth(){
		
		// get username and password from the request data
		$userName = "mahanama94";
		$password = "123456789";	
		$app = App::getInstance();
		// get authorization from the authorizer 
		$app->getAuthorizer()->getAuth($userName, $password);
	}
	
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
	 * search for rides for the credentials provided
	 */
	public function getRides(){
		
		//get credentials from through http requests
		$userName = "mahanama94";
		$sessionId = '7';
		
		$app = App::getInstance();
		
		$this->auth($userName, $sessionId);

		if($app->getAuthorizer()->getStatus()){

			$this->data["status"]="success";
			$data = null;
			$app->getRides($userName, $data);
		}
		else{
			$this->data["status"]="fail";
			echo "fail";	
		}
		
		echo json_encode($this->data);
	}
	
	public function test(){
		$userName = "mahanama94";
		$sessionId = '7';
		
		$app = App::getInstance();
		
		$this->auth($userName, $sessionId);
		App::getInstance()->addUser($userName, $sessionId);

		App::getInstance()->addUser("mahanama94", 2);

		$testTrip  = new Trip(new Location(8.2222, 1.0000), new Location(1.0000, 1.0000));
		$testTrip->register(App::getInstance()->getUser());
	}
	
	public function test2(){
		$manager = new TripManager();
		$manager->getTrips();
	}
}