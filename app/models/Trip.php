<?php

class Trip{
	
	/**
	 * Trip Id of the Trip
	 * @var Integer
	 */
	private $tripId;
	
	/**
	 * start and end locations of the trip
	 * @var Location
	 */
	private $start, $end;
	
	/**
	 * array of intermediate waypoints
	 * @var Location[]
	 */
	private $waypoints = null;
	
	/**
	 * special tags for the trip
	 * @var Tag[] $tags
	 */
	private $tags = null;
	
	/**
	 * 
	 * @param Location $start
	 * @param Location $end
	 * @param Location[] $wayPoints
	 */
	public function __construct($start= null , $end = null, $wayPoints = Array(), $tags = array()){
		$this->start = $start;
		$this->end = $end;
		$this->waypoints = $wayPoints;
		$this->tags = $tags;
	}
	
	/**
	 * returns the Trip ID
	 * @return Integer
	 */
	public function getTripId(){
		return $this->tripId;
	}
	
	/**
	 * start location of the trip
	 * @return Location start
	 */
	public function getStart(){
		return $this->start;
	}
	
	/**
	 * end location of the trip
	 * @return Location end
	 */
	public function getEnd(){
		return $this->end;
	}
	
	/**
	 * way points of the trip
	 * @return Location[]
	 */
	public function getWayPoints(){
		return $this->waypoints;
	}
	
	/**
	 * tags of the trip
	 * @return Tag[] tags
	 */
	public function getTags(){
		return $this->tags;
	}
	
	/**
	 * sets the trip Id of the trip
	 * @param unknown $id
	 */
	public function setId($id){
		$this->tripId = $id;
	}
	/**
	 * 
	 * @param Location $location
	 */
	public function setStart($location){
		$this->start = $location;
	}
	
	/**
	 * sets the end point of the trip
	 * @param Location $location
	 */
	public function setEnd($location){
		$this->end = $location;
	}
	
	/**
	 * sets the way points of the trip
	 * @param Location[] $wayPoints
	 */
	public function setWayPoints($wayPoints){
		$this->waypoints = $wayPoints;
	}
	
	/**
	 * sets the tags of the trip
	 * @param Tag[] $tags
	 */
	public function setTags($tags){
		$this->tags = $tags;
	}
	
	/**
	 * registers the trip to the data repository
	 * returns the status of the action
	 * true if successfull, false otherwise
	 * @param  User    user
	 * @return boolean status
	 */
	public function register($user) {
		
		$app = App::getInstance();
		$dbConnection = DB::getInstance();
		
		// insert to the trip table
		$dbConnection->insert("trip", $this->toArray()+ array("userId" => $user->getUserId()));

		// update the trip number
		$this->tripId = $dbConnection->incrementCount();
		
		//insert to the user trip table
		$dbConnection->insert("user_trip", array("userId"=> $user->getUserId(), "tripId" => $this->getTripId()));
		
		echo var_dump($dbConnection);
		// INSER DATA TO OTHER TABLES
		
		
		if($dbConnection->error()){
			
			return false;
		}
		return true;
	}
	
	/**
	 * returns the data of the object to an array
	 * @return array 
	 */
	private function toArray(){
		// assign data to an array for database access
		$array = array("start_lat" => $this->start->getLatitude(), "start_long" => $this->start->getLatitude());
		$array  = $array + array("end_lat" => $this->end->getLatitude(), "end_long"=>$this->end->getLongitude());
		return $array;
	}
	
}

?>