<?php

class Controller{
	
	protected  $app;
	
	public function __construct(){
		$this->app = App::getInstance();
	}
	
	
	/**
	 * 
	 * @param model name $model
	 * 
	 * 	Returns the model object corresponding to the model name
	 * 	passed as the parameter
	 */
	public function model($model) {
		require_once '../app/models/'.$model.'.php';
		return new $model();
	}
	
	/**
	 * @param name of the view file $name
	 * @param data to be passed to the file $data
	 */
	public static function view($name, $data= []){
		// aquire view php file
		require_once '../app/views'.$name.'.php';	

	}
	
}
?>