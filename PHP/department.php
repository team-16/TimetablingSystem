<?php

function getDepartments(){
	global $DB;
	
	if($DB->query('SELECT DepartmentCode, Name FROM Department ORDER BY DepartmentCode')){
		
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