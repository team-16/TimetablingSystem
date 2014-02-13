<?php

include('PHP/init.php');
if(authenticate($_POST["password"], $_POST["username"])){
	login($_POST["username"], $_POST["password"]);
	
	redirect("index.php");
}

else{

	session_destroy();
	redirect('login.php');	
	
}

?>