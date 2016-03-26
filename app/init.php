<?php
session_start();


require_once 'models/App.php';
require_once 'core/Controller.php';


/**
 *	Configuration data for 
 *		DataBase connectivity
 *		Cookie handling 
 *		Session handling
 *
 *	Configuration data can be retrieved through the methods provided in 
 *	Config class
 */
$GLOBALS['config'] = array(
		'mysql' => array(
				'host' => '127.0.0.1',
				'username' => 'root',
				'password' => '',
				'db' => 'tryp'
		),
		'remember' => array(
				'cookieName' => 'hash',
				'cookieExpiry' => 604800
		),
		'session' => array(
				'sessionName' => 'user',
				'tokenName' => 'token'
		),
		'rewriteBase' => array(
			'public'=> 'http://localhost/test/TRYP/public' 	
		)

);



/**
 * Autoloading clases when required
 *
 */
spl_autoload_register(function($class){ require_once '/models/'.$class.'.php';});


	require_once 'core/RouteController.php';
	
	// create routecontroller for the application
	
	$routeController = RouteController::getInstance();
	$routeController->route();


	//require_once '../functions/sanitize.php';

	/**
	 * Checks for the Cookies and creates a user accordingly
	 */
	/*if(Cookie::exists(Config::get("remember/cookie_name")) && !Session::exists(Config::get("session/session_name"))){
		$hash = Cookie::get(Config::get("remember/cookie_name"));
		$hashCheck = DB::getInstance()->get("user_session", array(" hash = $hash "));

		if($hashCheck->count()){
		 $user = new User($hashCheck->first->id);
		 $user->login;
		}
	}
	
*/	

?>