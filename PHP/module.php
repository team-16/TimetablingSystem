<?php

function getModules($deptCode){ // Return every module's data from database.
	global $DB;
	
	if(is_null($deptCode)){
	
		if($DB->query(
		"SELECT code, title, deptcode FROM module ORDER BY code")){
			return $DB->results();
		}
	
		else{
			return false;
		}
	}
	
	if(!is_null($deptCode)){
	
		if($DB->query("SELECT code, title, deptcode FROM module WHERE deptcode = :deptcode ORDER BY code",
		array(':deptcode' => $deptCode))){
			return $DB->results();
		}
	
		else{
			return false;
		}
	}
}

function getModule($moduleCode){ // Check module exists in database.
	global $DB;
	
	if($DB->query("SELECT code FROM module WHERE code = :moduleCode", 
	array(":moduleCode" => $moduleCode))){
	
		return true;
	
	}
	
	else{
	
		return false;
	
	}
}

function insertModule($moduleCode, $deptCode, $moduleTitle){
// Add a new module and it's data to database.
	global $DB;
	
	if($DB->query("INSERT INTO module (code, title, deptcode) VALUES (
	:modulecode, :title, :deptcode)",
		array(':modulecode' => $moduleCode, ':deptcode' => $deptCode, 
		':title' => $moduleTitle))) {
		return true;
	} 
	
	else{
		return false;
	}
}

function updateModule($moduleCode, $moduleTitle){
// Edit a module's data in database.
	global $DB;
	
	if($DB->query("UPDATE module SET title = :title WHERE code = :modulecode", 
	array(':title' => $moduleTitle, ':modulecode' => $moduleCode))){
		return true;
	} 
	
	else{
		return false;
	}
}

?>