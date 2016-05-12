<?php

require_once 'Api.php';

class Web extends Controller{
	
	private $api;
	
	public function __construct(){
	}
	
	public function login(){
		
		$request = new ApiAdapter();
		$request->setData($_POST);
		
		$request->setUrl("/api/auth");
		$result = $request->getResult();
		
		if($result["authorization"] == "success"){
			$request->setData($_POST);
			$request->setUrl("/api/getUserData");
			$data = $request->getResult();;
			$this->view("/home/index", $data);
			
		}
		else{
			$this->view('/forms/loginForm');
		}
	}
	
	public function home(){
		$request = new ApiAdapter();
	}
}