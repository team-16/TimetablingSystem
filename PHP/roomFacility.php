<?php

// roomFacility.php

// CREATED BY:
// Benjy Evans

// FUNCTIONALITY:
// Holds functions related to facilities mapped to rooms, including obtaining the
// ID's of mapped facilities.

function getRoomFacilities($roomCodeD){
// Return a room's facilities from database.
	global $DB;
	
	if($DB->query("SELECT facilityID FROM room_facility WHERE roomCode = 
	:roomCodeD", 
					array(':roomCode' => $roomCode))) {
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>