<?php

class LocationManager extends Manager{

	
	public function __construct($data =null){
		parent::__construct($data);
	}
	
	/**
	 * Updates the current location of the user of the app
	 * true if success, false otherwise
	 * @param array $locationData
	 * @return boolean $status
	 */
	public function updateLocation($locationData){
		
		$user = App::getInstance()->getUser();
		
		// Test Data
		$latitude = 50.0000;
		$longitude = 1000.000;
		$location = new Location($latitude, $longitude);
		return $user->addLocation($location);
		
	}
}