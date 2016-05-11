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
	 * Trip manager of the app
	 * @var Manager
	 */
	private $Manager;
	
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
		$this->user = null;
		$this->appData = null;
		$this->tripManager = new TripManager();
		$this->locationManager = new LocationManager();
		//$this->userManager = new UserManager();
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
		return $this->tripManager;
	}
	
	/**
	 * returns the location manager of the app
	 * @return LocationManager
	 */
	public function getLocationManager(){
		return $this->locationManager;
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
		
		if(!(isset($data["start"])&& isset($data["end"]))){
			// data availabe in th request
			
			if($this->tripManager->findTrips()){
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
		return $this->tripManager->createTrip($data);
	}
	
	
	public function createRequest($data){
		$this->tripManager->createRequest($data);
	}
}
?>