<?php

class App{
	
	private static $instance = null;
	
	
	public static function getInstance(){
		if(!isset(self::$instance)){
			self::$instance = new App();
		}
		return self::$instance;
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