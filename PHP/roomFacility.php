<?php

function getRoomFacilities($roomCodeD){
	global $DB;
	
	if($DB->query("SELECT facilityID FROM room_facility WHERE roomCode = :roomCodeD", 
					array(':roomCode' => $roomCode))) {
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>