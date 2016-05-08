<?php

/**
 * Home controller class
 * 
 * @author Rajith Bhanuka
 *
 */
class Home extends Controller{
	
	public function __constructor(){
		
	}
	
	/**
	 * Default controller
	 */
	public function index(){
		
		//$this->view('/layouts/topNav');
		//$this->view('/layouts/sideNav');
		//$this->view("/maps/basicMap");
		//$this->view("/profile/profileMini");
		//$this->view('/layouts/footer');
		$this->view('/forms/loginForm');
		
	}
	
	/**
	 * Login controller
	 * Provides login functionality through get methods
	 * Adds a user to the App
	 */
	public function myHome(){
		
		//$this->view('/home/login');
		//$_POST["userName"] = "rajith.bhanuka";
		//$_POST["password"] = "123456";
		
		
		//$this->app->show();
		echo var_dump($_SESSION);
	}
	
	
	public function login(){
		echo "Login screen";
		$_POST["userName"] = "mahanama94";
		$_POST["password"] = "123456789";
		
		$this->app->loginUser($_POST["userName"], $_POST["password"]);
		Redirect::to(Config::get("rewriteBase/public")."/home/myHome");
		// display the login screen, forgot password, register
	}
	
	
	public function register(){
		$_POST["userName"] = "bhanuka.14";
		$_POST["password"] = "123456";
		
		$this->app->registerUser($_POST["userName"], $_POST["password"], null);
		$this->app->loginUser($_POST["userName"], $_POST["password"]);
		//if registration successfull , redirect to the home
		if(Session::exists("userName")){
			Redirect::to(Config::get("rewriteBase/public")."/home/myHome");
		}
		else{
			//else refirect to the login screen
			Redirect::to(Config::get("rewriteBase/public")."/home/login");
		}
			
		
		
	}
	
	public function test(){
		echo var_dump($_SESSION);
	}
	
	public function arduino_update(){
		$latitude = doubleval(Input::get('latitude'));
		$longitude = doubleval(Input::get('longitude'));
		
		DB::getInstance()->insert('coordinates', array('userId' => 1, 'latitude'=> $latitude, 'longitude' => $longitude));
		echo "called";
	}
}
?>