<?php
class TripManager{
	
	private $tripList;
	private $count;
	
	public function __construct(){
		$this->tripList = array();
		$this->count = 0;
	}
	
	/**
	 * returns the trips in trip manager as an array
	 * @return Trip[]
	 */
	public function getTrips(){
		return $this->tripList;
	}
	
	public function getCount(){
		return $this->count;
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
			
			$trip = new Trip();
			$trip->setStart(new Location($tripData->start_lat, $tripData->start_long));
			$this->tripList[$this->getCount()] = $trip;
			$this->count = $this->count +1;
			// retrive and update data for the trip object created
		}
		
		if($this->tripList == null){
			return false;
		}
		return true;
		
	}
	
	/**
	 * creates a trip corresponding to the data passed
	 * @param unknown $tripData
	 */
	public function createTrip($tripData){
		
		// some data
		$start = new Location(0.00, 0.0000);
		$end = new Location(80.0000, 80.000);
		// some waypoints and tags
		
		$trip  = new Trip($start, $end);
		
		$user = new User("mahanama94");
		$user->setUserId(3);
		$trip->register($user);
	}
	
}