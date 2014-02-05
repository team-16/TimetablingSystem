<?php

function redirect($page){

	global $config;
	header('Location: ' . $config['url'] . $page);
	
	exit();
}

?>