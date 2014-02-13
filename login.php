<?php include('PHP/init.php'); ?>

<html>

<link rel="stylesheet" type="text/css" href="CSS/loginStyle.css">

	
	<div id='loginDiv'>
	
		<div id='loginTitle'>TimeTabling System Login</div>
		
		<form action="loggingin.php" method="post">
			<div id='inputDiv'>
				<div class='inputTitle' style='top:10px; left:20px;'>Username:</div>
				<div class='inputField' style='top:13px; left:140px;'>
					<input class='textField' type="text" name="username">
				</div>
				<div class='inputTitle' style='top:60px; left:20px;'>Password:</div>
				<div class='inputField' style='top:63px; left:140px;'>
					<input class='textField' type="password" name="password">
				</div>
			</div>
		
		
		<div id='errorDiv'>
			Invalid Login. Please try again.
			<br><br>
			If you have forgotten your username and/or password, please contact system administrator.
		</div>
		
		<!--
		<div id='loginBtn'>
			Login
		</div>
		-->
		<input type="submit">Login</input>
		
		</form>
		
	</div>
	
	
</html>