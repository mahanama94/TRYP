<?php

class Trip implements Sp{
	
	private $start, $end;
	private $waypoints;
	
	public function __construct($start , $end, $wayPoints = Array()){
		$this->start = $start;
		$this->end = $end;
		$this->waypoints = $wayPoints;
		
	}
	
}

?>