<?php
class ViewObject{
	private $counter;
	private $name;
	private $widgets;
	private $data = null;
	private $caption;
	
	public function __construct($name, $data){
		if($this->data == null){
			$this->data = $data;
		}
		else{
			$this->data = array_merge($this->data , $data);
		}
		$this->name = $name;
		$this->counter =0;
		$this->caption = $name;
	}
	
	//getters
	
	public function getCaption(){
		return $this->caption;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getWidget($name){
		for($i-0; $i < sizeof($this->widgets); $i++){
			if($this->widgets[$i]->getName()==$name){
				return $this->widgets[$i];
			}
		}
		return null;
	}
	
	public function getWidgets(){
		return $this->widgets;
	}
	
	public function getData($key){
		if(isset($this->data[$key])){
			return $this->data[$key];
		}
		return "";
	}
	
	// setters
	
	public function setData($key, $value){
		$this->data[$key] = $value;
	}
	
	public function setWidget($index , $widget){
		$this->widgets[$index] = $widget;
	}
	
	public function addWidget($widget){
		$this->widgets[$this->counter] = $widget;
		$this->counter++;
	}
	
	
	public function setVisible(){
		
	}
	
	public function setCaption($caption){
		$this->caption = $caption;
	}
	
	public function showWidgets(){
		for($i=0; $i < sizeof($this->getWidgets()); $i++){
			$this->getWidgets()[$i]->setVisible();
		}	
	}
	
	public static function import($templateName){
		Controller::view("/lib/".$templateName);
	}
	
}