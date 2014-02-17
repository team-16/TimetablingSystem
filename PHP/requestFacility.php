<?php

function getRequestFacilities($requestID){ 
// Return IDs of facilities selected in request by user.
	global $DB;
	
	if($DB->query(
	"SELECT facilityID FROM request_facility WHERE requestID = :requestID", 
					array(':requestID' => $requestID))) {
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>