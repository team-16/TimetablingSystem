<?php

include('PHP/init.php');
include('requestHandler.php');

$currentFlag = $_POST["currentFlag"];

if($currentFlag == "true") {
	
	$currentResults = getCurrentRequestsNotNull(loggedDept());
	
	echo json_encode(compressWithFacilities($currentResults));
	
} else {
	
	$currentAdHocResults = getCurrentRequestsNotNullAdHoc(loggedDept());
	
	echo json_encode(compressWithFacilities($currentAdHocResults));
	
}


?>