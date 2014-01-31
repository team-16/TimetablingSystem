<?php

function getModules($deptCode){
	global $DB;
	
	$sql = 'SELECT code, title, deptcode FROM module ';
	
	if($deptCode != '**'){
		$sql .= 'WHERE deptcode = :department ';
	}
	
	$sql .= 'ORDER BY code';
	
	if($DB->query($sql, array(':department' => $deptCode))){
		
		$modules = array();
		
		foreach($DB->results() as $module){
			$modules[$module['ModuleCode']] = $module;
		}
		
		return $modules;
	}
	
	else{
		return false;
	}
}

function insertModule($moduleCode, $deptCode, $moduleTitle){
	global $DB;
	
	if($DB->query("INSERT INTO module (code, title, deptcode) VALUES (:moduleCode, :title, :departmentCode)",
		array(':moduleCode' => $moduleCode, ':departmentCode' => $deptCode, ':title' => $moduleTitle))) {
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
	
	if($DB->query("UPDATE module SET title = :Title WHERE code = :ModuleCode", array(':Title' => $moduleTitle, ':ModuleCode' => $moduleCode))){
		return true;
	} 
	
	else{
		return false;
	}
	// need another function if changing module code
}

?>