<?php
class TripManager{
	
	private $tripData = array();
	
	public function getTrips(){
		// acccess database
		$dbConnection = DB::getInstance();
		$dbConnection->get("trip");
		
		var_dump($dbConnection->result());
		foreach($dbConnection->result() as $tripData){
			
			$trip = new Trip();
			$trip->setStart(new Location($tripData->start_lat, $tripData->start_long));
			
			
		}
	
	}
}