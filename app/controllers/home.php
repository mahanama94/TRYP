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
		$this->view('home/index');
		
	}
	
	public function login(){
		
		App::getInstance()->retrieveUser();
		
		$testUser1 = App::getInstance()->getUsers()[0];
		
		$users = ["user" => $testUser1];
		
		$json = json_encode($users);
		
		if($testUser1->isLoggedIn()){
			$this->view('home/myHome', [$json]);
		}
		else{
			$this->index();
		}
	}
}
?>