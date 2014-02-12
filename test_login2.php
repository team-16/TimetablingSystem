<?php

include('PHP/init.php');

	if(!isLoggedIn()){
		echo("NOT logged in!");
	}
	
	else{
		echo("WOOP WOOP! You're logged in!");
	}

?>