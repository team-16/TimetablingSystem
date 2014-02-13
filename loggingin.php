<?php

include('PHP/init.php');
login("BS", "password");

	if(!isLoggedIn()){
		session_destroy();
		redirect('login.php');
	}
	else{
		redirect("index.php");
	}
?>