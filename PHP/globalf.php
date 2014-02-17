<?php

function redirect($page){ // General redirect to inputted page.

	header('Location: ' . 
	'http://co-project.lboro.ac.uk/team16/TimetablingSystem/' . $page . '?' . 
	SID);
	
	exit();
}

function redirectLogin(){ // Redirect window to login page.
	
	echo('<script type="text/javascript">
		window.location = 
		"http://co-project.lboro.ac.uk/team16/TimetablingSystem/login.php";
		</script>');
	
	exit();
	
}

function redirectParent($page){ // Redirect parent window to login page.

	echo('<script type="text/javascript">window.top.location.href = 
	"http://co-project.lboro.ac.uk/team16/TimetablingSystem/login.php";
	</script>');
}

?>