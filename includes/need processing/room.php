<?php

function insertRoom($BuildingCode, $Name, $RoomType, $SeatingType, $Capacity){
	global $DB;
	
	if($DB->query("INSERT INTO Room (BuildingCode, Name, RoomType, Capacity) VALUES (:buildingcode, :name, :roomtype, :capacity)",
	array(':buildingcode' => $BuildingCode, ':name' => $Name, ':roomtype' => $RoomType, ':capacity' => $Capacity))) {
		return true;
	} 
	
	else{
		return false;
	}
}

function updateRoom($RoomID, $BuildingCode, $Name, $RoomType, $SeatingType, $Capacity){
	global $DB;
	
	if($DB->query("UPDATE Room SET BuildingCode = :buildingcode, Name = :name, RoomType = :roomtype, Capacity = :capacity WHERE RoomID = :RoomID",
	array(':RoomID' => $RoomID, ':buildingcode' => $BuildingCode, ':name' => $Name, ':roomtype' => $RoomType, ':capacity' => $Capacity))) {
		return true;
	}
	
	else{
		return false;
	}
}

function deleteRoom($RoomID){
	global $DB;
	if($DB->query("DELETE FROM Room WHERE RoomID = :roomid", array(':roomid' => $RoomID))){

		if($DB->query("DELETE FROM RoomFacility WHERE RoomID = :roomID", array(':roomID => $roomID'))){
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
	
	if($DB->query("SELECT RoomID, Room.BuildingCode, Building.Name as BuildingName, Park, Room.Name, RoomType, Capacity FROM Room INNER JOIN Building ON Room.BuildingCode = Building.BuildingCode ORDER BY Room.Name")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getRoom($RoomID){
	global $DB;
	
	if($DB->query("SELECT RoomID, Room.BuildingCode, Building.Name as BuildingName, Park, Room.Name, RoomType, Capacity FROM Room INNER JOIN Building ON Room.BuildingCode = Building.BuildingCode WHERE RoomID = :RoomID ORDER BY Room.Name",
	array(':RoomID' => $RoomID))){
		return $DB->resultsZero();
	} 

	else{
		return false;
	}
}

?>