<?php
/**
 * Home controller class
 * 
 * @author Rajith Bhanuka
 *
 */
class Home extends Controller{
	
	
	public function index($name= '', $extra = []){
		$user = $this->model('User');
		$user->name = $name	;
		$this->view('home/index', ['name' => $user->name, 'extra' => $extra]);
		
	}
	
	public function test(){
		echo "Test";
	}
	
	public function bla($params){
		echo "bla";
	}
}
?>