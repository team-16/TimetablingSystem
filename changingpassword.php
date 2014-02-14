<?php

include('PHP/init.php');
if(authenticate($_POST["password"], $_POST["username"])){
	
	$status = changePassword($_POST["username"], $_POST["newPassword"]);
	
	if($status) echo "Password Successfully Changed";
	else echo "Password Change Failed";
	
}

else{
	
	echo "Invalid Password";
	
}

?>