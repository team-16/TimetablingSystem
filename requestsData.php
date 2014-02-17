<?php

include('PHP/init.php');
include('requestHandler.php');


$currentRequests = getCurrentRequestsNull(loggedDept());
echo print("<pre>".print_r(compressWithFacilities($currentRequests) ,true)."</pre>");
//echo json_encode(compressWithFacilities($compressWithFacilities));

?>