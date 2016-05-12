<?php
class User extends Controller{
	
	public function login(){
		
		$request = new ApiAdapter();
		$request->setData($_POST);
		
		$request->setUrl("/api/auth");
		$result = $request->getResult();
		
		if(isset($result["authorization"])&& $result["authorization"] == "success"){
			$request->setData($_POST);
			$request->setUrl("/api/getUserData");
			Session::put("userData", $request->getResult()["userData"]);
			Redirect::to(Config::get("rewriteBase/public")."/User/index");
			
		}
		else{
			$this->view('/forms/loginForm');
		}
	}
	
	public function index(){
		if(Session::exists("userData")){
			$this->view("/layouts/header");
			$this->view("/layouts/topNav");
			$this->view("/layouts/footer");
		}
		else{
			Redirect::to(Config::get("rewriteBase/public")."/user/login");
		}
	}
	
	public function logout(){
		if(Session::exists("userData")){
			Session::delete("userData");
		}
		Redirect::to(Config::get("rewriteBase/public")."/user/login");
	}
	
}