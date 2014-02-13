<?php

include('PHP/init.php');

	var_dump($_SESSION);

	if(!isLoggedIn()){
		echo("NOT logged in now!");
	}
	
	else{
		echo("WOOP WOOP! You're STILL logged in!");
	}

?>