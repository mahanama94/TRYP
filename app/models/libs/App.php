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
	 * @var TripManager
	 */
	private $tripManager;

	private function __construct(){
		$this->authorizer = new Auth();
		$this->user = null;
		$this->appData = null;
		$this->tripManager = new TripManager();
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
	 */
	public function getAuthorizer(){
		return $this->authorizer;
	}
	
	/**
	 * adds user tot the app
	 * @param String $userName
	 * @param Int $sessionId
	 */
	public function addUser($userName, $sessionId){
		$this->user = new User($userName, $sessionId);
	}
	
	/**
	 * search for rides for a given userName with given data
	 * @param string $userName
	 * @param data $data
	 */
	public function getRides($userName, $data){
		$this->user= new User($userName);
		
		if(!(isset($data["start"])&& isset($data["end"]))){
			echo "Data included in the request";
			
			if($this->tripManager->findTrips()){
				echo "Trips found";
		
			}
			else{
				echo "No trips found";
			}
		}
		else{
			echo "Data not included in the request";
		}
	}
	
	public function addRide(){
		$this->tripManager->createTrip("someData");
		echo var_dump($this);
	}
	
	/**
	 * returns the user of the app
	 */
	public function getUser(){
		return $this->user;
	}
	
}
?>