<?php

session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

global $config;
$config = array(
	'database' => array(
		'host'		=> 'localhost',
		'username'	=> 'team16',
		'password'	=> 'mpy34awd',
		'dbname'	=> 'team16'
	),
	'url' => 'http://co-project.lboro.ac.uk/team16/TimetablingSystem/'
);

// Include Database Class
require_once 'includes/Database.class.php';

// Include Functions
require_once 'includes/globalf.php';
require_once 'includes/department.php';
require_once 'includes/module.php';
require_once 'includes/facility.php';
require_once 'includes/building.php';
require_once 'includes/park.php';
//require_once 'includes/room.php';

// Create a new Database object
$DB = new Database();

?>