<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<div>
	Home Page - currently logged in as: <?php echo(loggedDept() . " | " . loggedDeptName()); ?>
</div>


</html>