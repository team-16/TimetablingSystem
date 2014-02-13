<?php

	include('PHP/init.php');
	
	if(!isLoggedIn()){
		echo("uh oh!");
		//redirectParent('login.php');
	}

?>

<html>

<div>
	Home Page
</div>


</html>