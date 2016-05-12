<?php

/**
 * Manages functions relating to trips
 * 
 * Add trips
 * Search trips
 * Retrieve trips
 * 
 * @author Rajith Bhanuka
 *
 */
class TripManager extends Manager{
	
	/**
	 * 
	 * @var Trip[]
	 */
	private $tripList = null;
	
	/**
	 * 
	 * @var Trip
	 */
	private $lastTrip = null;
	
	/**
	 * Constructor
	 * creates a trip manager with an empty $requestPool and a $tripList
	 */
	public function __construct($data = null){
		parent::__construct($data);
		$this->tripList = null;
	}
	
	/**
	 * returns the trips in trip manager as an array relating to the user of the app
	 * @return Trip[]
	 */
	public function getTripList(){
		
		$dbConnection = DB::getInstance();
		$dbConnection->get("user_trip", array("userId = ". App::getInstance()->getUser()->getUserId()));
		
		foreach($dbConnection->result() as $tripData){
			$trip = new Trip($tripData->tripId);
			$this->tripList[sizeof($this->tripList)] = $trip;
		}
		return $this->tripList;
	}
	
	/**
	 * returns the last trip registered by the user of the application
	 * @return Trip $lastTrip
	 */
	public function getLastTrip(){
		if($this->lastTrip == null){
			$this->lastTrip = $this->getTripList()[sizeof($this->getTripList()) - 1];
		}
		return $this->lastTrip;
	}
	
	/**
	 * finds trips corresponding to the conditions passed as parameters
	 * returns the state of the search
	 * true if found false otherwise
	 * @param array $conditions
	 * @return boolean 	state of search 
	 */
	public function findTrips($conditions = array()){
		
		// acccess database
		$dbConnection = DB::getInstance();
		
		// get trips from the database,  add statements to make the selections satisfy the 
		//conditions
		$dbConnection->get("trip");

		foreach($dbConnection->result() as $tripData){
			
			$trip = new Trip($tripData->tripId);
			$trip->setStart(new Location($tripData->start_lat, $tripData->start_long));
			$trip->setEnd(new Location($tripData->end_lat, $tripData->end_long));
			
			// retrive and update data for the trip object created
			
			$this->tripList[sizeof($this->tripList)] = $trip;
		}
		
		if($this->tripList == null){
			return false;
		}
		return true;
		
	}
	
	/**
	 * creates a trip corresponding to the data passed
	 * returns true for success, false otherwise
	 * @param array() $tripData
	 * @return boolean status
	 */
	public function createTrip($tripData){
		
		// check for the existance of data in the trip data return false
		$start = new Location($tripData["start"]["latitude"], $tripData["start"]["longitude"]);
		$end = new Location($tripData["end"]["latitude"], $tripData["end"]["longitude"]);
		$trip  = new Trip(null,$start, $end);
		//UPDATE TRIP DATA
		$this->lastTrip = $trip;
		$this->getTripList()[sizeof($this->getTripList())] = $trip;
		return true;
	}
	
	/**
	 * returns the trip for the given TripId
	 * @param int $tripId
	 * @return Trip
	 */
	public function getTrip($tripId){
		return new Trip($tripId);
	}
	
	public function cancelTrip($tripId){
		//$trip = new Trip($tripId);
		// crete trip
		// get the user of the trip
		// if current user and user same, delete
	}
}