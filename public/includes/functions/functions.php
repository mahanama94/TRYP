<?php
	
	/**
	 *
	 * @param unknown $new_location
	 */
	function redirect_to($new_location){
		header("Location: ".$new_location);
		exit;
	}

	/**
	 * Checks the validity of a database query
	 * and ends the script if invalid
	 * @param $result query result from mysql
	 */
	function confirmQuery($result){
		if(!$result){
			Die("Database Query Failed");
		}
	}
	
	/**
	 * 
	 * @return unknown
	 */
	function getSubjects(){
		/* use gloabl database sonnection */
		global $connection;
		
		/*getting required subject information from the database */
		$query = "SELECT * FROM subject WHERE visible =1";
		$result = mysqli_query($connection, $query);
			
		/* Confirm the query result */
		confirmQuery($result);
		
		return $result;
	}
	
	/**
	 * 
	 * @param $subjectId subjectId to get information for the subject
	 * @return mysql-fetch-assoc for the subject, null if empty
	 */
	function getSubjects_byId($subjectId){
		/* use gloabl database sonnection */
		global $connection;
		$subjectId = mysqli_real_escape_string($connection, $subjectId);
		
		/*getting required subject information from the database */
		$query = "SELECT * FROM subject WHERE visible =1 AND id='$subjectId'";
		$result = mysqli_query($connection, $query);
			
		/* Confirm the query result */
		confirmQuery($result);
		$result = mysqli_fetch_assoc($result);
		
		if($result){
			return $result;
		}
		else{
			return null;
		}
	}
	
	/**
	 * pages from database corresponding to the subject id passed as the parameter
	 * @param $subject_id 
	 * @return result of the query to fetch details of the pages in the subject catagory
	 */
	function getPages($subjectId){
		/* use gloabl database sonnection */
		global $connection;		
		$subjectId = mysqli_real_escape_string($connection, $subjectId);
		
		/* getting required page information from the database*/
		$query = "SELECT * FROM page WHERE visible =1 and subject_id = $subjectId";
		$result = mysqli_query($connection, $query);
			
		/* Confirm the validity of the results in the query*/
		confirmQuery($result);
		
		return $result;
	}

	/**
	 * 
	 * @param unknown $pageId
	 * @return unknown|NULL
	 */
	function getPages_byId($pageId){
		/* use gloabl database sonnection */
		global $connection;
		$pageId = mysqli_real_escape_string($connection, $pageId);
	
		/*getting required subject information from the database */
		$query = "SELECT * FROM page WHERE visible =1 AND id='$pageId'";
		$result = mysqli_query($connection, $query);
			
		/* Confirm the query result */
		confirmQuery($result);
		$result = mysqli_fetch_assoc($result);
	
		if($result){
			return $result;
		}
		else{
			return null;
		}
	}
	
	
	/**
	 * 
	 */
	function findCurrentPage(){
		/*use global scope for the page description variables*/
		global $currentPage;
		global $currentSubject;
		
		if(isset($_GET["subject"])){
			$currentSubject = getSubjects_byId($_GET["subject"]);
			$currentPage = null;
		}
		else if(isset($_GET["page"])){
			$currentPage = getPages_byId($_GET["page"]);
			$currentSubject = null;
		}
		else{
			$currentSubject = null;
			$currentPage = null;
		}
	}

	
	function mysql_string_prepare($string){
		global $connection;
		return mysqli_real_escape_string($connection, $string);
	}
	
	
	function formErrors($errors = array()){
		$output ="";
		if(!empty($errors)){
			$output .= "<div class\"error\" >";
			$output .="Please fix the following errors: ";
			$output .= "<ul>";
			foreach ($errors as $key => $error){
				$output .= "<li>{$error}</li>";
			}
			$output .="</ul>";
			$output .= "</div>";
		}
		return $output;
	}
	
	
?>