<?php

include('PHP/init.php');

//$results = getBuilding();

//print_r($results);

echo("// Testing Login Script...  ");

//change this to test login. this should fail if you change the password.
login("BS", "password");

// change password
changePassword("BS", "password");
changePassword("CG", "password");
changePassword("CM", "password");
changePassword("CO", "password");
changePassword("CV", "password");
changePassword("DS", "password");
changePassword("EA", "password");
changePassword("EC", "password");
changePassword("EL", "password");
changePassword("EU", "password");
changePassword("GY", "password");
changePassword("IS", "password");
changePassword("MA", "password");
changePassword("MM", "password");
changePassword("MP", "password");
changePassword("PH", "password");
changePassword("PS", "password");
changePassword("SA", "password");
changePassword("SS", "password");
changePassword("TT", "password");

// check new password works
login("BS", "password");

?>