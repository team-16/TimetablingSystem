<?php

function redirect($page){

	header('Location: ' . 'http://co-project.lboro.ac.uk/team16/TimetablingSystem/' . $page . '?' . SID);
	
	exit();
}

function redirectLogin(){
	
	echo('<script type="text/javascript">
				 window.location = "http://co-project.lboro.ac.uk/team16/TimetablingSystem/login.php";
		</script>');
	
	exit();
	
}

function redirectParent($page){

	echo('<script type="text/javascript">window.top.location.href = "http://co-project.lboro.ac.uk/team16/TimetablingSystem/login.php";</script>');
}

?>