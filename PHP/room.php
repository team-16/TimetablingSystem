<?php

function insertRoom($Code, $BuildingCode, $Type, $Capacity){
	global $DB;
	
	if($DB->query("INSERT INTO room (code, buildingcode, type, capacity) VALUES (:buildingcode, :name, :type, :capacity)",
	array(':code' => $Code, ':buildingcode' => $BuildingCode, ':type' => $Type, ':capacity' => $Capacity))) {
		return true;
	} 
	
	else{
		return false;
	}
}

function updateRoom($Code, $BuildingCode, $Type, $Capacity){
	global $DB;
	
	if($DB->query("UPDATE room SET buildingcode = :buildingcode, type = :type, capacity = :capacity WHERE code = :code",
	array(':code' => $Code, ':buildingcode' => $BuildingCode, ':type' => $Type, ':capacity' => $Capacity))) {
		return true;
	}
	
	else{
		return false;
	}
}

function deleteRoom($RoomID){
	global $DB;
	if($DB->query("DELETE FROM room WHERE code = :code", array(':code' => $Code))){

		if($DB->query("DELETE FROM room_facility WHERE roomCode = :code", array(':code' => $Code))){
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

function getRooms(){
	global $DB;
	
	if($DB->query("SELECT * FROM room ORDER BY code")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getRoom($Code){
	global $DB;
	
	if($DB->query("SELECT * FROM room WHERE code = :code ORDER BY code",
	array(':code' => $Code))){
		return $DB->resultsZero();
	} 

	else{
		return false;
	}
}

function getAllocatedRooms($requestID){
	global $DB;
	
	if($DB->query("SELECT allocatedRoom FROM booking WHERE requestID = :requestID", array(":requestID" => $requestID))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

?>