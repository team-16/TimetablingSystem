<?php

include('PHP/init.php');
if(getDepartment($_POST["deptcode"]) && (getModule($_POST["modulecode"]) == false)){
	
	$status = insertModule($_POST["modulecode"], $_POST["deptcode"], $_POST["moduletitle"]);
	
	if($status) echo "Module Successfully Added";
	else echo "Module Addition Failed";
}

else{

	echo "Invalid Department Code";
	
}

?>