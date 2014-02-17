<?php

include('PHP/init.php');
include('requestHandler.php');


$currentRequests = getCurrentRequestsNull(loggedDept());

echo json_encode(compressWithFacilities($currentRequests));

?>