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
		
		$this->view('/layouts/topNav');
		$this->view('/layouts/sideNav');
		$this->view("/maps/basicMap");
		$this->view("/profile/profileMini");
		$this->view('/layouts/footer');
		
		
	}
	
	/**
	 * Login controller
	 * Provides login functionality through get methods
	 * Adds a user to the App
	 */
	public function myHome(){
		
		App::getInstance()->retrieveUser();
		
		$userData = json_encode(App::getInstance()->getUsers()[0]->getUserData());
		
		if(!isset($userData['loggedIn'])){
			$this->view('/layouts/header');
			$this->view('/home/myHome', $userData);
			$this->view('/layouts/footer');
		}
		else{
			Redirect::to(Config::get("rewriteBase/public")."/home/login");
		}
		
	}
	
	
	public function login(){
		$this->view('/home/login');
	}
	
	
	public function register(){
		$this->view("/home/register");
	}
	
	public function arduino_update(){
		$latitude = doubleval(Input::get('latitude'));
		$longitude = doubleval(Input::get('longitude'));
		
		DB::getInstance()->insert('coordinates', array('userId' => 1, 'latitude'=> $latitude, 'longitude' => $longitude));
		echo "called";
	}
}
?>