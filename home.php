<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/homeStyle.css">
	
</head>

<div>
	<h2>Welcome: <?php echo(loggedDept() . " | " . loggedDeptName()); ?> </h2> 	
</div>

<div id = "request_results" style = "width:30%;">
	<table class="CSSTableGenerator">
		<tr>
			<td>accepted</td><td>rejected</td><td>pending</td>
		</tr>
		<tr>
			<td id="accepted">0</td><td id="rejected">0</td><td id="pending">0</td>
		</tr>
	</table>
</div>

<div id='homeViewController'>

</div>

<script type='text/javascript' src='JSViews/homeScript.js'></script>
</html>