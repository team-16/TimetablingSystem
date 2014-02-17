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

/////////////////////////////////

function getCurrentRequests(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 1 AND adHoc = 0))) ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

// LIVE = 1 , ADHOC = 0

function getCurrentRequestsNull($deptCode){
	global $DB;
	
	if($DB->query("SELECT request.*, title, deptcode
					FROM request, module
					WHERE request.roundID IN 
						(SELECT id 
						FROM round
       					WHERE semesterID = 
        					(SELECT id 
                				FROM semester 
                				WHERE id = 
                					(SELECT semesterid 
                    				FROM round 
                        			WHERE live = '1' AND adHoc = '0'))) 
				AND status IS NULL AND code = moduleCode 
				AND module.deptcode = :deptcode 
				ORDER BY moduleCode", array(':deptcode' => $deptCode))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getCurrentRequestsNotNull(){
	global $DB;
	
	if($DB->query("SELECT request.*, title, deptcode
					FROM request, module
					WHERE request.roundID IN 
						(SELECT id 
						FROM round
       					WHERE semesterID = 
        					(SELECT id 
                				FROM semester 
                				WHERE id = 
                					(SELECT semesterid 
                    				FROM round 
                        			WHERE live = '1' AND adHoc = '0'))) 
				AND status IS NOT NULL AND code = moduleCode 
				AND module.deptcode = :deptcode 
				ORDER BY moduleCode", array(':deptcode' => $deptCode))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getCurrentRequestsAllocated(){
	global $DB;
	
	if($DB->query("SELECT request.*, title, deptcode
					FROM request, module
					WHERE request.roundID IN 
						(SELECT id 
						FROM round
       					WHERE semesterID = 
        					(SELECT id 
                				FROM semester 
                				WHERE id = 
                					(SELECT semesterid 
                    				FROM round 
                        			WHERE live = '1' AND adHoc = '0'))) 
				AND code = moduleCode AND status = 1 
				AND module.deptcode = :deptcode 
				ORDER BY moduleCode", array(':deptcode' => $deptCode))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

// LIVE = 1 , ADHOC = 1

function getCurrentRequestsNullAdHoc(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 1 AND adHoc = 0))) AND status IS NULL ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getCurrentRequestsNotNullAdHoc(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 1 AND adHoc = 0))) AND status IS NOT NULL ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getCurrentRequestsAllocatedAdHoc(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 1 AND adHoc = 0))) AND status = 1 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

// LIVE = 0 , ADHOC = 0

function getHistoryRequestsNull(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 0))) AND status IS NULL ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getHistoryRequestsNotNull(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 0))) AND status IS NOT NULL ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getHistoryRequestsAllocated(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = (SELECT semesterid FROM round WHERE live = 0))) AND status = 1 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

/////////////////////////////////

function insertRequest($moduleCode, $priority, $day, $startPeriod, $endPeriod,
 $weeks, $noOfStudents, $parkPreference, $traditional, $sessionType, $noOfRooms,
 $roomCode, $otherRequirements, $roundID, $facilities){
	global $DB;
	$nextReqId = getNextRequestID();
	
	if($DB->query("INSERT INTO request (id, moduleCode, priority, day,
	startPeriod, endPeriod, weeks, noOfStudents, parkPreference, traditional,
	sessionType, noOfRooms, roomCode, otherRequirements, roundID)
	VALUES (:id, :moduleCode, :priority, :day, :startPeriod, :endPeriod, :weeks,
	:noOfStudents, :parkPreference, :traditional, :sessionType, :noOfRooms,
	:roomCode, :otherRequirements, :roundID)",
				   array(
						':id' => $nextReqId[0]["counter"],
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
						 ':roundID' => $roundID))) {
						 
						 for($i = 0; i < count($facilities); $i=$i+1){
						 
							$DB->query("INSERT INTO request_facility (requestID, 
							facilityID) VALUES (:requestID, :facilityID)",
							array(
									':requestID' => $nextReqId[0]["counter"],
									':facilityID' => $facilities[i]));						 
						 
						 }

						 
						 return true;
		
	}
	
	else {
		return false;
	}
	
}

function getNextRequestID(){
	global $DB;
	
	if($DB->query("SELECT counter FROM id_counter WHERE idType = '0'")){
		return $DB->results();
	}
	
	else{
		return false;
	}

}

function incRequestID(){
	global $DB;
	
	if($DB->query("UPDATE id_counter SET counter = counter+1 WHERE idType = 0")){
		return true;
	}
	
	else{
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