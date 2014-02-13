<?php

function getRoundData(){
	global $DB;
	
	if($DB->query("SELECT * FROM round WHERE live = '1'")){
		return $DB->results();
	} 
	
	else{
		return false;
	}
}

?>