<?php

// requestHandler.php

// CREATED BY:
// Johnbastian Emilianus

// FUNCTIONALITY:
// Holds functions related to maintaining and sanitising request data, primarily
// for JSON handling and manipulation.

function compressWithFacilities($requestsArray) {
	
	return populateRequestFacilities(requestsCompressor($requestsArray));
	
}

function compressWithFacilitiesAndBookings($requestsArray) {
	
	$facilitatedRequests = populateRequestFacilities(requestsCompressor
	($requestsArray));
	
	return populateAllocatedRooms($facilitatedRequests);
	
}


function requestsCompressor($requestsArray) {
	
	$compressedArray = array();
	
	for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
		
		$noDuplicate = true;
		
		for ($counter = 0; $counter < count($compressedArray); $counter++) {
			
			if ($compressedArray[$counter]["id"] == 
			$requestsArray[$rCounter]["id"]) {
				$noDuplicate = false;
			}
			
		}
		
		if ($noDuplicate) array_push($compressedArray,$requestsArray[$rCounter]);
		
	}
	
	
	for ($counter = 0; $counter < count($compressedArray); $counter++) {
		
		$roomsArray = array();
		
		for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
			
			if ($compressedArray[$counter]["id"] == 
			$requestsArray[$rCounter]["id"]) {
								
				array_push($roomsArray, $requestsArray[$rCounter]["roomCode"]);
				
			}
			
		}
		
		$compressedArray[$counter]["roomCode"] = $roomsArray;
		
	}
	
	
	return $compressedArray;
	
} 

function populateRequestFacilities($requestsArray) {
	
	for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
		
		$facilitiesArray = array ();
		
		$results = getRequestFacilities($requestsArray[$rCounter]["id"]);
				
		for ($fCounter = 0; $fCounter < count($results); $fCounter++) {
			
			array_push($facilitiesArray, $results[$fCounter]["facilityID"]);
			
		}
		
		$requestsArray[$rCounter]["facilities"] = $facilitiesArray;
		
	}
	
	//echo print("<pre>".print_r($requestsArray, true)."</pre>");
	
	return $requestsArray;
		
}

function populateAllocatedRooms($requestsArray) {
	
	for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
		
		$allocatedRoomsArray = array ();
		
		$results = getAllocatedRooms($requestsArray[$rCounter]["id"]);
				
		for ($arCounter = 0; $arCounter < count($results); $arCounter++) {
			
			array_push($allocatedRoomsArray,$results[$arCounter]["allocatedRoom"]);
			
		}
		
		$requestsArray[$rCounter]["allocatedRooms"] = $allocatedRoomsArray;
		
	}
	
	return $requestsArray;
	
}

?>