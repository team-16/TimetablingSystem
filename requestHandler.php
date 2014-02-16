<?php

function requestsCompressor($requestsArray) {
	
	$compressedArray = array();
	
	for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
		
		$flag = false;
		
		for ($counter = 0; $counter < count($compressedArray); $counter++) {
			
			if ($compressedArray[$counter].id == $requestsArray[$rCounter].id) {
				$flag = true;
			}
			
		}
		
		if (!$flag) array_push($compressedArray, $requestsArray[$rCounter]);
		
	}
	
	
	for ($counter = 0; $counter < count($compressedArray); $counter++) {
		
		$roomsArray = array();
		
		for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
			
			if ($compressedArray[$counter].id == $requestsArray[$rCounter].id) {
								
				array_push($roomsArray, $requestsArray[$rCounter]["roomCode"]);
				
			}
			
		}
		
		$compressedArray[$counter]["roomCode"] = $roomsArray;
		
	}
	
	echo print("<pre>".print_r($compressedArray, true)."</pre>");
	
	populateRequestFacilities($compressedArray);
		
} 

function populateRequestFacilities($requestsArray) {
	
	for ($rCounter = 0; $rCounter < count($requestsArray); $rCounter++) {
		
		$facilitiesArray = array ();
		
		$results = getRequestFacilities($requestsArray[$rCounter].id);
		
		echo print("<pre>".print_r($res, true)."</pre>");
		
		for ($fCounter = 0; $fCounter < count($results); $fCounter++) {
			
			array_push($facilitiesArray, $results[$fCounter]["facilityID"]);
			
		}
		
		$requestsArray[$rCounter]["facilities"] = $facilitiesArray;
		
	}
	
	echo print("<pre>".print_r($requestsArray, true)."</pre>");
		
}

?>