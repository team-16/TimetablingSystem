<?php

include('PHP/init.php');

$requestID = $_POST["requestID"];

if (deleteRequest($requestID)) {
	
	echo "Deletion Completed";
	
} else {
	
	echo "Deletion Failed";
	
}

?>