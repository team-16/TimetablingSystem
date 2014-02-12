<?php

function getParks(){
	global $DB;
	
	if($DB->query("SELECT * FROM Park")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

?>