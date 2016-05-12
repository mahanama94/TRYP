<?php

require_once 'Api.php';

class Web extends Controller{
	
	private $api;
	
	public function __construct(){
	}
	
	
	public function viewTrips(){
		echo "test";
		$request = new ApiAdapter();
		$request->setData(Session::get("userData"));
		echo var_dump(Session::get("userData"));
		
	}
	
	public function logout(){
		if(Session::exists("userData")){
			Session::delete("userData");
		}
		Redirect::to(Config::get("rewriteBase/public")."/web/login");
	}
	
	public function test(){
		echo var_dump($_POST);
	}
}