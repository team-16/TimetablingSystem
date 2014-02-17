<?php

function getLiveRoundData(){ // Get current live round's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM round WHERE live = '1' AND adHoc = '0'")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

function getAdHocRoundData(){ // Get current ad hoc round's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM round WHERE live = '1' AND adHoc = '1'")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}


function getroundsData(){ // Get every non-live round's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM round WHERE live = '0'")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}


?>