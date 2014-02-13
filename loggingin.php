<?php

include('PHP/init.php');
login($_POST["username"], $_POST["password"]);

	if(!isLoggedIn()){
		session_destroy();
		redirect('login.php');
	}
	else{
		redirect("index.php");
	}
?>