<?php

/**
 * Manages functions relating to trips
 * 
 * Add trips
 * search trips
 * 
 * @author Rajith Bhanuka
 *
 */
class TripManager{
	
	/**
	 * 
	 * @var Trip[]
	 */
	private $tripList = null;
	
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
			$trip->setId($tripData->tripId);
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
		
		$start = new Location($tripData["start"]["latitude"], $tripData["start"]["longitude"]);
		$end = new Location($tripData["end"]["latitude"], $tripData["end"]["longitude"]);
		$trip  = new Trip(null,$start, $end);
		
		//UPDATE TRIP DATA
		
		$this->getTripList()[sizeof($this->tripList)] = $trip;
		return true;
	}
	
	/**
	 * creates a trip request for the trip provided
	 * returns true for success, false otherwise
	 * @param Trip $trip
	 * @param int $requestPoolId
	 * @return boolean status
	 */
	public function createRequest($trip, $requestPoolId = null){
		
		 //check for the existance in a given pool
		if(!($requestPoolId == null)){
			$this->requestPool = new RequestPool($requestData["requestPoolId"]);
		}
		else{
			$this->requestPool = new RequestPool();
		}
		
		$request = new Request($trip);
		return ($this->requestPool->addRequest($request));
	}
}