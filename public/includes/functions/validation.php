<?php

$errors = array();


function validatePresent($fields){
	global $errors;
	
	foreach($fields as $field => $max){
		if(!isset($_POST[$field])){
			$errors[$field] = ucfirst($field)." cant be blank";
		}
		else if ($_POST[$field]==""){
			$errors[$field] = ucfirst($field)." cant be blank";
		}
	}
}
/**
 * 
 * @param unknown $value
 * @param unknown $max
 */
function hasMaxLength($value, $max){
	return strlen($value)<=$max;
}

function validateMaxLength($fields){
	global $errors;

	foreach($fields as $field => $max){
		$value = trim($_POST[$field]);
		if(!hasMaxLength($value, $max)){
			$errors[$field] = ucfirst($field)." is too long";
		}
	}
}

/**
 * 
 * @param unknown $value
 * @param unknown $set
 */
function isIn($value, $set){
	return in_array($value, $set);
}


?>