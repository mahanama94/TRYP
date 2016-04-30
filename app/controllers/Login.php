<?php
class Login extends Controller{
	
	function index(){
		$this->view('/layouts/header');
		$this->view('/home/login');
		$this->view('/layouts/footer');
	}
}