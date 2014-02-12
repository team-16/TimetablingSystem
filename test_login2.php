<?php

include('PHP/init.php');

	var_dump($_SESSION);

	if(!isLoggedIn()){
		echo("NOT logged in!");
	}
	
	else{
		echo("WOOP WOOP! You're logged in!");
	}

?>