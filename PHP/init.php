<?php

// init.php

// CREATED BY:
// Niall Rose

// FUNCTIONALITY:
// Initialises database, sets up session with correct settings and initialises
// PHP scripts.

// Setup session variables to not use cookies, then begin session.
ini_set("session.use_cookies",0);
ini_set("session.use_only_cookies",0);
ini_set("session.use_trans_sid",1);
session_start();

// Init database object.
require_once 'Database.class.php';
$DB = new Database();

// Init other PHP scripts for use.
require_once 'credentials.php';
require_once 'globalf.php';

require_once 'building.php';
require_once 'department.php';
require_once 'request.php';
require_once 'facility.php';
require_once 'requestFacility.php';
require_once 'module.php';
require_once 'park.php';
require_once 'room.php';
require_once 'semester.php';
require_once 'round.php';

?>