<?php

require_once 'Api.php';

class Web{
	
	private $api;
	
	public function __construct(){
		$this->api = Api::getInstance();
	}
	
	public function test(){
		$this->api->auth();
	}
}