<?php include('PHP/init.php'); ?>

<!DOCTYPE html>

<html>

<meta http-equiv='X-UA-Compatible' content='IE=Edge'></meta>

<head><title>Timetabling System</title></head>

<link rel="stylesheet" type="text/css" href="CSS/loginStyle.css">

	
	<div id='loginDiv'>
	
		<div id='loginTitle'>TimeTabling System Login</div>
		
		<form id="loginForm" action="loggingin.php" method="post">
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
		<?php if($_POST['errorCode'] == "invalid"){
		
			echo("Invalid Login. Please try again.<br><br>If you have forgotten your username and/or password, please contact the system administrator.<br>");
		
		}
		
		//if($_POST['errorCode'] == "invalid"){
		
		//	echo("Successfully logged out.<br>");
		
		//}
		?>
		</div>
		<br/>
		
		
		<div id='loginBtn' onclick="document.forms['loginForm'].submit();">
			Login
			<input type="submit" style="visibility:hidden">  <!--Required for "enter to submit" to work-->
		</div>		
		
		</form>
		
	</div>
	
	
</html>