<?php

include('init.php');

//$results = getBuilding();

//print_r($results);

echo("// Testing Login Script...  ");

//change this to test login. this should fail if you change the password.
login("BS", "lel");

// change password
changePassword("BS", "lel");

// check new password works
login("BS", "lel");

?>