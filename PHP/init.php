<?php

session_start();

require_once 'Database.class.php';
$DB = new Database();

require_once 'credentials.php';
require_once 'globalf.php';

require_once 'building.php';
require_once 'department.php';
require_once 'facility.php';
require_once 'module.php';
require_once 'park.php';
require_once 'room.php';

?>