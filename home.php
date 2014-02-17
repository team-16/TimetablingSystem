<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>
<button type='button' onclick='$("#requestsNow").click();'>Redirect</button>
<div>
	Home Page - currently logged in as: <?php echo(loggedDept() . " | " . loggedDeptName()); ?>
</div>


</html>