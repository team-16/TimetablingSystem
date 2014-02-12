<?php

function redirect($page){

	global $config;
	header('Location: ' . 'http://co-project.lboro.ac.uk/team16/TimetablingSystem/' . $page);
	
	exit();
}

?>