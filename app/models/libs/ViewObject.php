<?php
class ViewObject{
	private $counter;
	private $name;
	private $widgets;
	private $data;
	private $caption;
	
	public function __construct($name, $data){
		$this->data = $data;
		$this->name = $name;
		$this->counter =0;
		$this->caption = $name;
	}
	
	public function getCaption(){
		return $this->caption;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getData($path){
		if(isset($this->data[$path])){
			return $this->data[$path];
		}
		return '';
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
	
	public function addWidget($widget){
		$this->widgets[$this->counter] = $widget;
		$this->counter++;
	}
	
	public function addWidgetTo($index , $widget){
		$this->widgets[$index] = $widget;
	}
	
	public function addData($name, $value){
		$this->data[$name] = $value;
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
	
}