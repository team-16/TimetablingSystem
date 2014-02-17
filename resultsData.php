<?php

include('PHP/init.php');
include('requestHandler.php');

$currentFlag = $_POST["current"];

if($currentFlag) {
	
	$currentRequests = getCurrentRequestsNull();
	
} else {
	
	
}

//function getLiveRequests() {
	/*
	$notSubmittedRequests = getCurrentRequestsNull();
	
	echo print("<pre>".print_r($notSubmittedRequests,true)."</pre>");
	
	compressWithFacilities($notSubmittedRequests);
	*/
	
	$allocatedRequests = getCurrentRequestsAllocated();
	
	echo print("<pre>".print_r($allocatedRequests,true)."</pre>");
	
	compressWithFacilitiesAndBookings($allocatedRequests);
	
	
	/*
	echo('<script type="text/javascript">
		alert("Hello");
		alert(JSON.stringify(' . json_encode($notSubmittedRequests) . '));
		alert("Hello");
		</script>');
	*/
	
	
	
	
//}





?>