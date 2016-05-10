<?php
class TripManager{
	
	private $tripList;
	private $count;
	
	/**
	 * 
	 * @var Request
	 */
	private $requestPool;
	
	public function __construct(){
		$this->tripList = array();
		$this->count = 0;
	}
	
	/**
	 * returns the trips in trip manager as an array
	 * @return Trip[]
	 */
	public function getTripList(){
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
			$trip->setId($tripData->tripId);
			$trip->setStart(new Location($tripData->start_lat, $tripData->start_long));
			$trip->setEnd(new Location($tripData->end_lat, $tripData->end_long));
			
			// retrive and update data for the trip object created
			
			$this->tripList[$this->getCount()] = $trip;
			$this->count = $this->count +1;
			
		}
		
		if($this->tripList == null){
			return false;
		}
		return true;
		
	}
	
	/**
	 * creates a trip corresponding to the data passed
	 * @param array() $tripData
	 */
	public function createTrip($tripData){
		
		$start = new Location($tripData["start"]["latitude"], $tripData["start"]["longitude"]);
		$end = new Location($tripData["end"]["latitude"], $tripData["end"]["longitude"]);
		$trip  = new Trip(null,$start, $end);
		
		//UPDATE TRIP DATA
		
		/*if(!$trip->register(App::getInstance()->getUser())){
			App::getInstance()->setAppData("Error", true);
			App::getInstance()->setAppData("Error data", "cannot register the app");
			return false;
		}*/
		$this->tripList =  Array();
		$this->tripList[0] = $trip;
		return true;
	}
	
	/**
	 * creates a trip request for the request data provided
	 * @param array() $requestData
	 */
	public function createRequest($requestData){
		
		// check pool number
		$this->requestPool = new RequestPool();
		
		// check reuest data
		// create request
		// add request
	}
	
}