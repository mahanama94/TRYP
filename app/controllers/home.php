<?php

/**
 * Home controller class
 * 
 * @author Rajith Bhanuka
 *
 */
class Home extends Controller{
	
	public function __constructor(){
		echo "Home controller constructor called";
	}
	
	
	public function index(){
		
		$this->view('home/index');
		
	}
	
	public function login(){
		
		$authentication = true;
		if($authentication){
			$this->view('home/myHome', ['loggedIn'=> true]);
		}
		else{
			$this->index();
		}
	}
}
?>