<?php

	include('PHP/init.php');
	
	if(!isLoggedIn()){
		echo("uh oh! you aren't logged in! time to be redirected...");
		redirectParent('login.php');
	}

?>

<html>

<div>
	Home Page
</div>


</html>