<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirect('login.php');
}

?>

<html>

<div>
	Home Page - currently logged in as: <?php echo(loggedDept()); ?>
</div>


</html>