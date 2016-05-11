<?php

/**
 * Manages functions relating to the users
 * 		
 * 		Retrieving user data for the user, other users
 * 		Updating data of the user
 * 		Add comments for other users	
 * 		
 * @author Rajith Bhanuka
 *
 */
class UserManager extends Manager{
	
	/**
	 * contains the data relating to the usermanager request
	 * @var array()
	 */
	private $profileData;
	
	/**
	 * constructor
	 * @param unknown $data
	 */
	public function __construct($data){
		parent::__construct($data);
		$this->profileData = null;
	}
	
	/**
	 * retrieves the profile data of the current user of the application
	 */
	public function getMyData(){
		$user = App::getInstance()->getUser();
		$this->data["personalData"] = $user->getPersonalData();
		
		// add other types of data from the user
	}
	
	/**
	 * retrieves profile data for the user of the user name passed
	 * @param string $userName
	 */
	public function getProfileData($userName){
		$user = new User($username);
		$this->data["personalData"] = $user->getPersonalData();
	
		// get other types of data from the user
	}
	
	/**
	 * retrives the comments made on the user of the username
	 * @param String $userName
	 */
	public function getComments($userName){
	
	}
	
	public function updateMyData($updataData){
		$user = App::getInstance()->getUser();
		$this->data["personalData"] = $user->setPersonalData();
		
		// add other types of data update on user
	}
	
	/**
	 * add comment as the user of the app for the commentee passed as parameters
	 * @param String $commentee
	 * @param String $comment
	 */
	public function addComment($commentee, $comment){
		
		// addd to database
	}
	
}

