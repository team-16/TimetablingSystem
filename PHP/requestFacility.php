<?php

// requestFacility.php

// CREATED BY:
// Johnbastian Emilianus

// FUNCTIONALITY:
// Holds functions related to facilities mapped to requests,
// including obtaining the ID's of mapped facilities.

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

function deleteRequestFacilitiesRecords($requestID){ 
// Return IDs of facilities selected in request by user.
	global $DB;
	
	if($DB->query(
	"SELECT * FROM request_facility WHERE requestID = :requestID", 
					array(':requestID' => $requestID))) {
					
		$DB->query("DELETE FROM request_facility WHERE requestID = :requestID", 
			array(':requestID' => $requestID));
		
		return true;
		
	}
	
	else{
		return false;
	}
}

?>