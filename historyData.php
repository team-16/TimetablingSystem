<?php

include('PHP/init.php');
include('requestHandler.php');

$historyRequests = getHistoryRequestsNotNull(loggedDept());

echo json_encode(compressWithFacilities($historyRequests));

?>