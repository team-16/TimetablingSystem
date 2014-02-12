<?php

function getDepartments(){
	global $DB;
	
	if($DB->query('SELECT code, name FROM department ORDER BY code')){
		
		$departments = array();
		
		foreach($DB->results() as $department){
			$departments[$department['DepartmentCode']] = $department['Name'];
		}
		
		return $departments;
	}
	
	else{
		return false;
	}
}

?>