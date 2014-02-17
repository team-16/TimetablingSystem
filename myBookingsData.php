<?php

include('PHP/init.php');
include('requestHandler.php');


//function getLiveRequests() {
	
	$allocatedRequests = getCurrentRequestsNull(loggedDept());
	
	echo print("<pre>".print_r($allocatedRequests,true)."</pre>");
	
	echo print("<pre>".print_r(compressWithFacilities($allocatedRequests) ,true)."</pre>");
	
//}





?>