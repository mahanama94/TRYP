<?php

class ApiAdapter{
	
	private $options;
	
	private $url;
	
	private $result;
	
	
	public function __construct(){
		$this->options = array('http' =>
				array(
						'method'  => 'POST',
						'header'  => 'Content-type: application/x-www-form-urlencoded',
						'content' => null
				)
		);
		$this->url = null;
		$this->result = null;
	}
	
	public function setData($data){
		$this->options["http"]["content"] = http_build_query($data);
	}
	
	public function getResult(){
		$context  = stream_context_create($this->options);
		$this->result = file_get_contents($this->url, false, $context);
		return json_decode($this->result, true);
	}
	
	public function setUrl($path){
		$this->url = Config::get("rewriteBase/public")."$path";
	}
	
}