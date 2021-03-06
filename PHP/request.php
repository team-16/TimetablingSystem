<?php

// request.php

// CREATED BY:
// Niall Rose, Benjy Evans, Shirley Kutadzaushe, Mofe Fafowora,
// Johnbastian Emilianus

// FUNCTIONALITY:
// Holds functions related to requests, including obtaining information about
// all or specific requests, editing requests and deleting request data. There
// is also functionality for returning specific types of requests eg. pending,
// allocated, rejected.

function getAllRequests(){ // Return every request's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM request ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getPendingRequests(){
// Return every pending request's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE status = 0 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getAllocatedRequests(){
// Return every allocated request's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE status = 1 ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getRejectedRequests(){
// Return every rejected request's data from database.
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
// Return every current request's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (
	SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = 
	(SELECT semesterid FROM round WHERE live = 
	1 AND adHoc = 0))) ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}


// Return various sets of filtered current request's data from database.
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

function getCurrentRequestsNotNull($deptCode){
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

function getCurrentRequestsAllocated($deptCode){
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
				AND code = moduleCode AND status = '1' 
				AND module.deptcode = :deptcode 
				ORDER BY moduleCode", array(':deptcode' => $deptCode))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getAllCurrentRequestsAllocated(){
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
				AND code = moduleCode AND status = '1' 
				ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

// LIVE = 1 , ADHOC = 1

function getCurrentRequestsNullAdHoc(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (
	SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = 
	(SELECT semesterid FROM round WHERE live = 1 AND adHoc = 0))
	) AND status IS NULL ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getCurrentRequestsNotNullAdHoc($deptCode){
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
                        			WHERE live = '1' AND adHoc = '1'))) 
				AND status IS NOT NULL AND code = moduleCode 
				AND module.deptcode = :deptcode 
				ORDER BY moduleCode", array(':deptcode' => $deptCode))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getCurrentRequestsAllocatedAdHoc($deptCode){
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
                        			WHERE live = '1' AND adHoc = '1'))) 
				AND code = moduleCode AND status = '1' 
				AND module.deptcode = :deptcode 
				ORDER BY moduleCode", array(':deptcode' => $deptCode))){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getAllCurrentRequestsAllocatedAdHoc(){
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
                        			WHERE live = '1' AND adHoc = '1'))) 
				AND code = moduleCode AND status = '1' 
				ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

// LIVE = 0 , ADHOC = 0

function getHistoryRequestsNull(){
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE roundID IN (
	SELECT id FROM round WHERE semesterID = (SELECT id FROM semester WHERE id = 
	(SELECT semesterid FROM round WHERE live = 0))
	) AND status IS NULL ORDER BY moduleCode")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getHistoryRequestsNotNull($deptCode){
	global $DB;
	
	if($DB->query("SELECT request.*, title, deptcode
					FROM request, module
					WHERE request.roundID IN 
						(SELECT id 
						FROM round 
						WHERE semesterID NOT IN 
							(SELECT semesterID 
							FROM round 
							WHERE live = 1))
					AND code = moduleCode AND status IS NOT NULL 
					AND module.deptcode = :deptcode 
					ORDER BY moduleCode", array(':deptcode' => $deptCode) )){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function getHistoryRequestsAllocated($deptCode){
	global $DB;
	
	if($DB->query("SELECT request.*, title, deptcode
					FROM request, module
					WHERE request.roundID IN 
						(SELECT id 
						FROM round 
						WHERE semesterID NOT IN
							(SELECT id 
							FROM semester 
							WHERE id IN
								(SELECT semesterid 
								FROM round 
								WHERE live = 1))) 
					AND code = moduleCode AND status = '1'
					AND module.deptcode = :deptcode 
					ORDER BY moduleCode", array(':deptcode' => $deptCode))){
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
 // Add a new request to the database. Includes tying request to selected
 // facilities via the room_facility table.
 
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
						 
						 foreach($facilities as $key => $val){
						 
							$DB->query("INSERT INTO request_facility (requestID, 
							facilityID) VALUES (:requestID, :facilityID)",
							array(
									':requestID' => $nextReqId[0]["counter"],
									':facilityID' => $val));						 
						 
						 }

						 
						 return true;
		
	}
	
	else {
		return false;
	}
	
}

function getNextRequestID(){
// Return next request ID used for adding new request to database.
	global $DB;
	
	if($DB->query("SELECT counter FROM id_counter WHERE idType = '0'")){
		return $DB->results();
	}
	
	else{
		return false;
	}

}

function updateRequest($id, $moduleCode, $priority, $day, $startPeriod, $endPeriod,
 $weeks, $noOfStudents, $parkPreference, $traditional, $sessionType, $noOfRooms,
 $roomCode, $otherRequirements, $roundID, $facilities){
 // Update a request in the database. Includes tying request to selected
 // facilities via the room_facility table.
 
	global $DB;
	
	if($DB->query("UPDATE request SET id=:id, moduleCode=:moduleCode, priority=:priority, day=:day,
	startPeriod=:startPeriod, endPeriod=:endPeriod, weeks=:weeks, noOfStudents=:noOfStudents, parkPreference=:parkPreference, traditional=:traditional,
	sessionType=:sessionType, noOfRooms=:noOfRooms, roomCode=:roomCode, otherRequirements=:otherRequirements, roundID=:roundID 
	WHERE id=:id;",
				   array(
						':id' => $id, // get id for currently edited request
						':moduleCode' => $moduleCode, // get all these values from fields in add.php after "editing request"
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
						 
						 
						 $DB->query("DELETE FROM request_facility WHERE requestID = :id", array(':id' => $id)); // Get rid of old facilities from requests
						 
						 foreach($facilities as $key => $val){ // add new facilities to the request
						 
							$DB->query("INSERT INTO request_facility (requestID, 
							facilityID) VALUES (:requestID, :facilityID)",
							array(
									':requestID' => $id,
									':facilityID' => $val));						 
						 
						 }

						 
						 return true;
		
	}
	
	else {
		return false;
	}
	
}


function incRequestID(){ // Increment next request ID by 1 in database.
	global $DB;
	
	if($DB->query("UPDATE id_counter SET counter = counter+1 WHERE idType = 0")
	){
		return true;
	}
	
	else{
		return false;
	}

}


function deleteRequest($id){ // Remove a request and it's data from database.
	global $DB;
	
	if($DB->query("SELECT * FROM request WHERE id = :id", array(':id' => $id))){
		
		deleteRequestFacilitiesRecords($id);
		deleteBookingsRecords($id);
		
		$DB->query("DELETE FROM request WHERE id = :id", array(':id' => $id));
		
		return true;
		
	}
	
	else{
		return false;
	}
	
}

?>