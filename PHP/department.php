<?php

// department.php

// CREATED BY:
// Niall Rose

// FUNCTIONALITY:
// Holds functions related to departments, including obtaining information about
// all or specific departments, editing data of departments and deleting data of
// departments.

function getDepartments(){ // Return department codes and names from database.

	global $DB;
	
	if($DB->query("SELECT code, name FROM department ORDER BY code")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getDepartment($code){ // Check if department exists in database.

	global $DB;
	
	if($DB->query("SELECT code FROM department WHERE code = :code", array(
	':code' => $code))){
		return true;
	}
	
	else{
		return false;
	}
}

function insertDepartment($code, $name){ // Add a new department to database.

	global $DB;
	
	if($DB->query("INSERT INTO department (code, name) VALUES (:code, :name)",
	array(':code' => $code, ':name' => $name))){
		return true;
	}
	
	else{
		return false;
	}
}

?>