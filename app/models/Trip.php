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
	 * Contains the request for the trip
	 * @var Request[]
	 */
	private $requests;
	
	/**
	 * rettrieves a Trip if the trip Id is passed,
	 * else creates a new trip and sets the id from the database
	 * 
	 * @param int $id
	 * @param Location $start
	 * @param Location $end
	 * @param Location[] $wayPoints
	 * @param Tag[] $tags
	 */
	public function __construct($id,$start= null , $end = null, $wayPoints = Array(), $tags = array()){
		
		$dbConnection = DB::getInstance();
		$user = App::getInstance()->getUser();
		
		if($id){
			// retrive data from database
			$dbConnection->get("trip", array("tripId = '".$id."'"));
			
			if(!$dbConnection->error()){
				$this->tripId = $id;
				$this->start = new Location($dbConnection->getFirst()->start_lat, $dbConnection->getFirst()->start_long);
				$this->end = new Location($dbConnection->getFirst()->start_lat, $dbConnection->getFirst()->start_long);
				
				// search for tags, wapoints and add
			}
		}
		else{
			/**
			 * insert to the database
			 */
			
			// trip table
			$dbConnection->insert("trip", array(
				"userId" => $user->getUserId(),
				"start_lat" => $start->getLatitude(),
				"start_long" => $start->getLongitude(),
				"end_lat" => $end->getLatitude(),
				"end_long" => $end->getLongitude(),
			));

			$this->tripId = $dbConnection->incrementCount();
			$this->start = $start;
			$this->end = $end;
			$this->waypoints = $wayPoints;
			$this->tags = $tags;
				
			//user_trip table
			$dbConnection->insert("user_trip", array(
				"userId" => $user->getUserId(),
				"tripId"=> $this->getTripId()				
			));

			
			// add tags, waypoints to the database
		}
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
	 * rerurns the requests for the trip
	 * @return Request[] $requests
	 */
	public function getRequests(){
		if($this->requests == null){
			$dbConnection = DB::getInstance();
			
			$dbConnection->get("trip_request", array("tripId = ".$this->getTripId()));
			
			foreach($dbConnection->result() as $requestData){
				$request = new Request($requestData->requestId);
			}
		}
		return $this->requests;
	}
	
	/**
	 * Updates the start location of the trip
	 * return true for success, false otherwise
	 * @param Location $location
	 * @return boolean status
	 */
	public function setStart($location){
		
		$dbConnection = DB::getInstance();
		
		$dbConnection->update("user", "tripId = '".$this->getTripId()."'", array(
					"start_lat" => $location->getLatitude(),
					"start_long" => $location->getLongitude()
		));
		
		if(!$dbConnection->error()){
			$this->start = $location;
			return true;
		}
		return false;
	}
	
	/**
	 * Updates the start location of the trip
	 * return true for success, false otherwise
	 * @param Location $location
	 * @return boolean status
	 */
	public function setEnd($location){
		$dbConnection = DB::getInstance();
		
		$dbConnection->update("user", "tripId = '".$this->getTripId()."'", array(
					"end_lat" => $location->getLatitude(),
					"end_long" => $location->getLongitude()
		));
		
		if(!$dbConnection->error()){
			$this->end = $location;
			return true;
		}
		return false;
	}
	
	/**
	 * sets the way points of the trip
	 * @param Location[] $wayPoints
	 */
	public function setWayPoints($wayPoints){
		// ADD DATABASE QUERIES
		$this->waypoints = $wayPoints;
	}
	
	/**
	 * sets the tags of the trip
	 * @param Tag[] $tags
	 */
	public function setTags($tags){
		// ADD DATABASE QUERIES
		$this->tags = $tags;
	}
	
	/**
	 * Adds the request to the Trip
	 * returns true for successs, false otherwise
	 * @param Request $request
	 * @return boolean $status
	 */
	public function addRequest($request){
		$dbConnection = DB::getInstance();
		
		$dbConnection->insert("trip_request", array(
				"tripId" => $this->getTripId(),
				"requestId" => $request->getRequestId()
		));
		if(!$dbConnection->error()){
			$this->getRequests()[sizeof($this->getRequests())] = $request;
			return true;
		}
		return false;
	}
	
	/**
	 * returns the data of the object to an array
	 * @return array 
	 */
	public function toArray(){
		// assign data to an array for database access
		$returnArray = array(
			"tripId" => $this->getTripId(),
			"start" => $this->getStart()->toArray(),
			"end" => $this->getEnd()->toArray()
		);
		
		if(!$this->getWayPoints() ==  null){
			$count = 0;
			foreach ($this->getWayPoints() as $location){
				$returnArray["wayPoints"][$count] = $location->toArray(); 
				$count++;
			}
		}
		
		if(!$this->getTags() == null){
			$count = 0;
			foreach ($this->getTags() as $tag){
				$returnArray["tags"][$count] = $tag->toArray();
			}
		}			
		return $returnArray;
	}
	
}

?>