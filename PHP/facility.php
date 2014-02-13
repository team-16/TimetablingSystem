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

function updateFacility($id, $name){
	global $DB;
	
	if($DB->query("UPDATE facility SET name = :name WHERE id = :id", array(':name' => $name, ':id' => $id))){
		return true;
	}
	
	else{
		return false;
	}
}

function deleteFacility($id){ //NEEDS FIXING
	global $DB;
	
	if($DB->query("DELETE FROM Facility WHERE id = :id", array(':id' => $id))){
		
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
	
	if($DB->query("SELECT * FROM facility ORDER BY name")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getFacilityId(){
	global $DB;
	
	if($DB->query("SELECT id FROM facility WHERE name = :name", array(':name' => $name)){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>