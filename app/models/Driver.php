<?php

class Driver extends User{
	
	private $trip = array();
	private $driverLicense;
	
	public function __construct($username){
		parent::__construct($username);
	}
	
	
	public function createNewTrip($tripData){
		$start = $tripData["start"];
		$end = $tripData["end"];
		$trip = new Trip($start, $end);
		if(isset($tripData["wayPoints"])){
			$trip->setWayPoints($tripData["wayPoints"]);
		}
		$trip->register($this);
	}
		
}