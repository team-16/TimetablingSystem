<?php

function getRequestFacilities($requestID){
	global $DB;
	
	if($DB->query("SELECT facilityID FROM request_facility WHERE requestID = :requestID", 
					array(':requestID' => $requestID))) {
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>