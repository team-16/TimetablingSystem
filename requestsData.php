<?php

include('PHP/init.php');


//function getLiveRequests() {
	
	$notSubmittedRequests = getCurrentRequestsNull();
	
	echo print_r($notSubmittedRequests);
	
	/*
	echo('<script type="text/javascript">
		alert("Hello");
		alert(JSON.stringify(' . json_encode($notSubmittedRequests) . '));
		alert("Hello");
		</script>');
	*/
	
	
	
	
//}





?>