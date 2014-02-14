<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirect('login.php');
}

?>

<html>

Change Password:

	<div id='changePassDiv'>
	<br>
		
		<form id="loginForm" action="changingpassword.php" method="post">
			<div id='inputDiv'>
				<div class='inputTitle' style='top:10px; left:20px;'>Username:</div>
				<div class='inputField' style='top:13px; left:140px;'>
					<input class='textField' type="text" name="username">
				</div>
				<div class='inputTitle' style='top:60px; left:20px;'>Current Password:</div>
				<div class='inputField' style='top:63px; left:140px;'>
					<input class='textField' type="password" name="password">
				</div>
				<div class='inputTitle' style='top:60px; left:20px;'>New Password:</div>
				<div class='inputField' style='top:63px; left:140px;'>
					<input class='textField' type="password" name="newPassword">
				</div>
			</div>

			<input type="submit" value="Change Password">  <!--Required for "enter to submit" to work-->
		</div>

		<div id='errorDiv'>
		<?php
		if($_POST['errorCode'] == "invalid"){
		
			echo("Invalid Login. Password was not changed. Please try again.<br>");
		
		}
		
		if($_POST['errorCode'] == "success"){
		
			echo("Password successfully changed. Please remember to use the new credentials when next logging into the system.<br>");
		
		}
		?>
		</div>		
		
		</form>
		
	</div>

</html>