<?php

// a bit more complicated, come back to it.

function insertFacility($name){
	global $DB;
	
	if($DB->query("INSERT INTO facility (name) VALUES (:name)", array(':name' => $name))){
		return true;
	}
	
	else{
		return false;
	}
}

function updateFacility($facilityID, $name){
	global $DB;
	
	if($DB->query("UPDATE Facility SET Name = :name WHERE FacilityID = :facilityID", array(':name' => $name, ':facilityID' => $facilityID))){
		return true;
	}
	
	else{
		return false;
	}
}

function deleteFacility($facilityID){
	global $DB;
	
	if($DB->query("DELETE FROM Facility WHERE FacilityID = :facilityID", array(':facilityID' => $facilityID))){
		
		if($DB->query("DELETE FROM RoomFacility WHERE FacilityID = :facilityID", array(':facilityID' => $facilityID))){
			return true;
		}
		
		else{
			return false;
		}
	}
	
	else{
		return false;
	}
}

function getFacilities(){
	global $DB;
	
	if($DB->query("SELECT * FROM Facility ORDER BY Name")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>