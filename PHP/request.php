<?php

function getAllRequests(){
	global $DB;
	
	if($DB->query("SELECT * FROM request ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getPendingRequests(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE status = 0 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getAllocatedRequests(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE status = 1 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getRejectedRequests(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE status = 2 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}


function insertRequest($moduleCode, $priority, $day, $startPeriod, $endPeriod,
 $weeks, $noOfStudents, $parkPreference, $traditional, $sessionType, $noOfRooms,
 $roomCode, $otherRequirements, $roundID, $status){
	global $DB;
	
	if($DB->query("INSERT INTO request (moduleCode, priority, day,
	startPeriod, endPeriod, weeks, noOfStudents, parkPreference, traditional,
	sessionType, noOfRooms, roomCode, otherRequirements, roundID, status)
	VALUES (:id, :moduleCode, :priority, :day, :startPeriod, :endPeriod, :weeks,
	:noOfStudents, :parkPreference, :traditional, :sessionType, :noOfRooms,
	:roomCode, :otherRequirements, :roundID, :status)",
				   array(':moduleCode' => $moduleCode,
				         ':priority' => $priority,
				         ':day' => $day,
						 ':startPeriod' => $startPeriod,
						 ':endPeriod' => $endPeriod,
						 ':weeks' => $weeks,
						 ':noOfStudents' => $noOfStudents,
						 ':parkPreference' => $parkPreference,
						 ':traditional' => $traditional,
						 ':sessionType' => $sessionType,
						 ':noOfRooms' => $noOfRooms,
						 ':roomCode' => $roomCode,
						 ':otherRequirements' => $otherRequirements,
						 ':roundID' => $roundID,
						 ':status' => $status))) {
		
	}
	
	else {
		return false;
	}
}


function deleteRequest($id){
	global $DB;
	
	if($DB->query("SELECT request WHERE id = :id", array(':id' => $id))){
		$DB->query("DELETE FROM request WHERE id = :id", array(':id' => $id));
	}
	
	else{
		return false;
	}
	
}

/*function copyRequestToRound($id, $newRound){
	
	global $DB;
	
	if($DB->query("SELECT request WHERE id = :id", array(':id' => $id))){
		$DB->query("INSERT INTO room (id, moduleCode, priority, day,
		startPeriod, endPeriod, weeks, noOfStudents, parkPreference, traditional,
		sessionType, noOfRooms, roomCode, otherRequirements, roundID, status)
		SELECT :id, moduleCode, priority, day,
		startPeriod, endPeriod, weeks, noOfStudents, parkPreference, traditional,
		sessionType, noOfRooms, roomCode, otherRequirements, :newround, status
		FROM room WHERE id=:id", array(':id' => $id, ':newround' => $newRound));
	}
	
	else{
		return false;
	}
} */

?>