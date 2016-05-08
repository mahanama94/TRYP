<?php

/**
 * 
 * @author Rajith Bhanuka
 *
 */
class App{
	
	/**
	 * user data for the application
	 * @var User
	 */
	private $user;
	
	/**
	 * app data for the user
	 * trip data, request data
	 * @var array()
	 */
	private $appData;
	
	/**
	 * Authorzer for the user
	 * @var Auth $authorizer
	 */
	private $authrizer;
	
	/**
	 * app instance
	 * @var App
	 */
	private static $instance = null;
	
	private function __construct(){
		$this->authorizer = new Auth();
		$this->user = null;
		$this->appData = null;
	}
	
	public static function getInstance(){
		if(self::$instance== null){
			self::$instance = new App();
			return self::$instance;
		}
		return self::$instance;
	}
	
	public function getAuthorizer(){
		return $this->authorizer;
	}
	
	public function addUser($userName, $sessionId){
		$this->user = new User($userName, $sessionId);
	}
	
	/**
	 * search for rides for a given userName with given data
	 * @param $userName
	 * @param $data
	 */
	public function getRides($userName, $data){
		$this->user= new User($userName);
		
		if((isset($data["start"])&& isset($data["end"]))){
			echo "Data included in the request";
		}
		else{
			echo "Data not included in the request";
		}
	}
	
	public function getUser(){
		return $this->user;
	}
	
	
	/*protected $controller = 'home';
	
	protected $method = 'index';

	protected $params =[]; 
	
	/**
	 * App constructor
	 * App corresponding to the user input URL is formed
	 * If not found, home/index is formed
	 */
	/*public function __construct(){
		
		echo "app created";
		
		$url = $this->parseUrl();
		
		//check for the existance of the controller
		if(file_exists('../app/controllers/'.$url[0].'php')){
			$this->controller = $url[0];
			unset($url[0]);
		}
		
		//aquire the controller
		require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;
		
		//check for the existance of method
		if(isset($url[1])){
			
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		
		$this->params = $url ? array_values($url) : [];
		
		//Call method in the controller
		call_user_func_array([$this->controller,$this->method],$this->params);
	}
	
	
	/**
	 * Filters the content in the url and return as an array
	 */
	/*public function parseUrl() {
		if(isset($_GET['url'])){
			
			return $url= explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}*/
	
}
?>