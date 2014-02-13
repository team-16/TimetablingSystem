<?php

function getCurrentRoundsData(){
	global $DB;
	
	if($DB->query("SELECT * FROM round WHERE live = '1'")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

function getroundsData(){
	global $DB;
	
	if($DB->query("SELECT * FROM round WHERE live = '0'")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}


?>