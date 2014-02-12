<?php

function getModules($deptCode){
	global $DB;
	
	if(is_null($deptCode)){
	
		if($DB->query("SELECT code, title, deptcode FROM module ORDER BY code")){
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

function insertModule($moduleCode, $deptCode, $moduleTitle){
	global $DB;
	
	if($DB->query("INSERT INTO module (code, title, deptcode) VALUES (:modulecode, :title, :deptcode)",
		array(':modulecode' => $moduleCode, ':deptcode' => $deptCode, ':title' => $moduleTitle))) {
		return true;
	} 
	
	else{
		return false;
	}
}

/**function deleteModule($moduleCode){
	global $DB;
	
	if($DB->query("DELETE FROM Module WHERE ModuleCode = :code", array(':code' => $moduleCode))){
		return true;
	} 
	else{
		return false;
	}
}*/

function updateModule($moduleCode, $moduleTitle){
	global $DB;
	
	if($DB->query("UPDATE module SET title = :title WHERE code = :modulecode", array(':title' => $moduleTitle, ':modulecode' => $moduleCode))){
		return true;
	} 
	
	else{
		return false;
	}
	// need another function if changing module code
}

?>