<?php
class Location{
	
	private $latitude, $longitude;

	
	public function __construct($latitude, $longitude){
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}
	
	/**
	 * returns the latitude of the location
	 */
	public function getLatitude(){
		return $this->latitude;
	}
	
	/**
	 * returns the longitude of the location
	 */
	public function getLongitude(){
		return $this->longitude;
	}
	
	/**
	 * returns the location as an array
	 * @return array
	 */
	public function toArray(){
		return array(
				"latitude" => $this->getLatitude(),
				"longitude" => $this->getLongitude()
		);
	}
	
}