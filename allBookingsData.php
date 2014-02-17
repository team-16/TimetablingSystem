<?php

include('PHP/init.php');
include('requestHandler.php');

$currentFlag = $_POST["currentFlag"];

if($currentFlag == "true") {
	
	$currentMyBookings = getAllCurrentRequestsAllocated();
	
	echo json_encode(compressWithFacilitiesAndBookings($currentMyBookings));
	
} else {
	
	$currentAdHocMyBookings = getAllCurrentRequestsAllocatedAdHoc();
	
	echo json_encode(compressWithFacilitiesAndBookings($currentAdHocMyBookings));
	
}

?>