<?php

// facility.php

// CREATED BY:
// Niall Rose, Johnbastion Emilianus, Benjy Evans

// FUNCTIONALITY:
// Holds functions related to facilities, including obtaining information about
// all or specific facilities, editing data of facilities and deleting data of
// facilities.

function insertFacility($name){ // Add new room facility to database.
	global $DB;
	
	if($DB->query("INSERT INTO facility (name) VALUES (:name)", array(
	':name' => $name))){
		return true;
	}
	
	else{
		return false;
	}
}

function updateFacility($id, $name){ // Edit existing facility in database.
	global $DB;
	
	if($DB->query("UPDATE facility SET name = :name WHERE id = :id", array(
	':name' => $name, ':id' => $id))){
		return true;
	}
	
	else{
		return false;
	}
}

function deleteFacility($id){ // Delete a room facility from database.
	global $DB;
	
	if($DB->query("DELETE FROM Facility WHERE id = :id", array(':id' => $id))){
		
		if($DB->query("DELETE FROM RoomFacility WHERE FacilityID = :facilityID", 
		array(':facilityID' => $facilityID))){
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

function getFacilities(){ // Return every facilitie's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM facility ORDER BY name")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getFacilityId(){ // Return room facilitie's id from database.
	global $DB;
	
	if($DB->query("SELECT id FROM facility WHERE name = :name", array(
	':name' => $name))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>