<?php

// semester.php

// CREATED BY:
// Niall Rose, Benjy Evans, Johnbastian Emilianus

// FUNCTIONALITY:
// Holds functions related to semester, including obtaining information about
// all or specific semesters (current and historical), editing data of
// semesters and deleting data of semesters.

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

