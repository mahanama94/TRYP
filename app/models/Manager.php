<?php
class Manager{
	
	/**
	 * stores all the manager related information
	 * @var array()
	 */
	protected $data;
	
	public function __construct($data = null){
		$this->data = $data;
	}
}