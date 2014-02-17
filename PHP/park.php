<?php

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