<?php

class Partener Extends User{
	
	private $trip = array();
	
	public function __construct($user){
		parent::__construct($user);
		//get registerd trips of the user
	}
	
	
	public function createNewTrip(){
		
	}
		
}