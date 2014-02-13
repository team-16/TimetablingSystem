<?php

include('PHP/init.php');
login("BS", "password");

	if(!isLoggedIn()){
		redirect('login.php');
	}
	else{
		redirect("index.php");
	}
?>