<?php

class Controller{
	
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
	 * 
	 * @param name of the view file $name
	 * @param data to be passed to the file $data
	 */
	public function view($name, $data= []){
		// aquire view php file
		require_once '../app/views/'.$name.'.php';	

	}
	
}
?>