<?php

session_start();

require_once 'includes/Database.class.php';
$DB = new Database();

require_once 'includes/credentials.php';
require_once 'includes/globalf.php';

require_once 'includes/building.php';
require_once 'includes/department.php';
require_once 'includes/facility.php';
require_once 'includes/module.php';
require_once 'includes/park.php';
//require_once 'includes/room.php';

?>