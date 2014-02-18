<?php

include('PHP/init.php');
if(updateRoom($_POST["deptcode"], $BuildingCode, $Type, $Capacity)){
	
	//$status = insertModule($_POST["modulecode"], $_POST["deptcode"], $_POST["moduletitle"]);
	
	//if($status) echo "Module Successfully Added";
	//else echo "Module Addition Failed";
	echo "Room Successfully Updated";
}

else{

	echo "Room Edit Failed";
	
}

?>