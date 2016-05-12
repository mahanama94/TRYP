<?php

/**
 * 
 * @author Rajith Bhanuka
 *
 */
class App{
	
	/**
	 * user data for the application
	 * @var User
	 */
	private $user;
	
	/**
	 * app data for the user
	 * trip data, request data
	 * @var array()
	 */
	private $appData;
	
	/**
	 * Authorzer for the user
	 * @var Auth $authorizer
	 */
	private $authorizer;
	
	/**
	 * app instance
	 * @var App
	 */
	private static $instance = null;
	
	/**
	 * 
	 * @var TripManager
	 */
	private $tripManager = null;
	
	/**
	 * 
	 * @var RequestManager
	 */
	private $requestManager = null;
	
	/**
	 * User manager of the app
	 * @var UserManager
	 */
	private $userManager;
	
	/**
	 * 
	 * @var LocationManager $locationManager
	 */
	private $locationManager;

	/**
	 * constructor
	 */
	private function __construct(){
		$this->authorizer = new Auth();
	}
	
	/**
	 * returns the instance of the App
	 */
	public static function getInstance(){
		if(self::$instance== null){
			self::$instance = new App();
			return self::$instance;
		}
		return self::$instance;
	}
	
	/**
	 * returns the Authorizer of the app
	 * @return Auth authorizer
	 */
	public function getAuthorizer(){
		return $this->authorizer;
	}
	
	/**
	 * returns the user of the app
	 * @return User app user
	 */
	public function getUser(){
		return $this->user;
	}
	
	/**
	 * returns the trip manager of the app
	 * @return TripManager trip manager
	 */
	public function getTripManager(){
		if($this->tripManager == null){
			$this->tripManager = new TripManager();
		}
		return $this->tripManager;
	}
	
	/**
	 * returns the location manager of the app
	 * @return LocationManager
	 */
	public function getLocationManager(){
		if($this->locationManager == null){
			$this->locationManager = new LocationManager();
		}
		return $this->locationManager;
	}
	
	/**
	 * returns the request manager of the app
	 * @return RequestManager
	 */
	public function getRequestManager(){
		if($this->requestManager == null){
			$this->requestManager = new RequestManager();
		}
		return $this->requestManager;
	}
	
	/**
	 * returns the user manager of the app
	 * @return UserManager
	 */
	public function getUserManager(){
		if($this->userManager == null){
			$this->userManager = new UserManager();
		}
		return $this->userManager;
	}
	/**
	 * adds user tot the app
	 * @param String $userName
	 */
	public function setUser($userName){
		$this->user = new User($userName);
	}
	
	
	/**
	 * sets the value passed as the value corresponding to the key 
	 * @param string $key
	 * @param  $value
	 */
	public function setAppData($key, $value){
		$this->appData[$key] = $value;
	}
	
	/**
	 * search for rides for a given userName with given data
	 * @param string $userName
	 * @param data $data
	 */
	public function getRides($userName, $data = null){
		$this->user= new User($userName);
		
		// check for the availability of data
		if(!(isset($data["start"])&& isset($data["end"]))){
			// data availabe in th request
			
			if($this->getTripManager()->findTrips()){
				// trips found
		
			}
			else{
				//No trips found
			}
		}
		else{
			// data not included in the request
		}
	}
	
	/**
	 * adds a ride corresponding to the data passed through parameters
	 * returns the state of the add ride request
	 * true if success, false otherwise
	 * @param array() $data
	 * @return boolean status
	 */
	public function addRide($data){
		return $this->getTripManager()->createTrip($data);
	}
	
	
	/**
	 * creates a new request for a given trip
	 * @param array $data
	 * @return boolean $status
	 */
	public function createRequest($data){

		// check data - check the existance of a poolID
		return $this->getRequestManager()->createRequest($data["tripId"], $data["requestPoolId"]);
	}
	
	/**
	 * rejects the request passed through the paramters
	 * returns true if success, false otherwise
	 * @param int $requestId
	 * @return boolean $state
	 */
	public function rejectRequest($requestId){
		return $this->getRequestManager()->rejectRequest($requestId);
	}
	
	public function cancelRequest($requestId){
		return $this->getRequestManager()->cancelRideRequest($requestId);
	}
}
?>