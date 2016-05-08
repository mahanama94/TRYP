<?php
class Account{
	
	private $accountNumber;
	private $balance;
	
	/**
	 * active status of the account
	 * @var boolean
	 */
	private $status = false;
	
	public function getBalance(){
		return $this->balance;
	}
	
	public function getStatus(){
		return $this->status;
	}
}
?>