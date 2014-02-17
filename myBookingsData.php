<?php

include('PHP/init.php');
include('requestHandler.php');

$currentFlag = $_POST["currentFlag"];

if($currentFlag == "true") {
	
	$currentMyBookings = getCurrentRequestsAllocated(loggedDept());
	
	echo json_encode(compressWithFacilitiesAndBookings($currentMyBookings));
	
} else {
	
	$currentAdHocMyBookings = getCurrentRequestsAllocatedAdHoc(loggedDept());
	
	echo json_encode(compressWithFacilitiesAndBookings($currentAdHocMyBookings));
	
}

?>