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

//INCOMPLETE
function getPendingRequests(){
	global $DB;
	
	if($DB->query("")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

//INCOMPLETE
function getAllocatedRequests(){
	global $DB;
	
	if($DB->query("")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

//INCOMPLETE
function getRejectedRequests(){
	global $DB;
	
	if($DB->query("")){
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
	
	$id = $DB->lastInsertID();
	
	if($DB->query("INSERT INTO request (id, moduleCode, priority, day,
	startPeriod, endPeriod, weeks, noOfStudents, parkPreference, traditional,
	sessionType, noOfRooms, roomCode, otherRequirements, roundID, status)
	VALUES (:id, :moduleCode, :priority, :day, :startPeriod, :endPeriod, :weeks,
	:noOfStudents, :parkPreference, :traditional, :sessionType, :noOfRooms,
	:roomCode, :otherRequirements, :roundID, :status)",
				   array(':id' => $id,
						 ':moduleCode' => $moduleCode,
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


function deleteRequest($id)
{
	global $DB;
	
	if($DB->query("SELECT request WHERE id = :id", array(':id' => $id))){
		$DB->query("DELETE FROM request WHERE id = :id", array(':id' => $id));
	}
	
	else{
		return false;
	}
	
}

?>