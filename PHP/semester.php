<?php

function getLiveSemesterData(){ // Get current semester's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM semester WHERE id = 
	(SELECT semesterID FROM round WHERE live = '1' AND adHoc = '0')")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

function getAdHocSemesterData(){
// Get current ad hoc semester's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM semester WHERE id = 
	(SELECT semesterID FROM round WHERE live = '1' AND adHoc = '1')")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

?>

