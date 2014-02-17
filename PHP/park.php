<?php

// park.php

// CREATED BY:
// Shirley Kutadzaushe

// FUNCTIONALITY:
// Holds functions related to parks, including obtaining information about
// all parks.

function getParks(){ // Return every park's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM Park")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

?>