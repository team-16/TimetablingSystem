<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<head>

<link href='CSS/viewStyle.css' rel='stylesheet' type='text/css'>



</head>


<div class='listHeadings' id='lHeadings'>
	
	<table class='listHeaderTable' id='listTitles'>
	
		<tr>
		
			<td id='codeField'>
				Module Code
			</td>
		
			<td id='pField'>
				P
			</td>
		
			<td id='dayField'>
				Day
			</td>
		
			<td id='periodField'>
				Period
			</td>
		
			<td id='lengthField'>
				Length
			</td>
		
			<td id='weeksField'>
				Weeks
			</td>
		
			<td id='stuField'>
				# of Students
			</td>
		
			<td id='tradField'>
				T/S
			</td>
		
		</tr>
	
	</table>
	
</div>

<div id='historyViewContainer'>
	No History
</div>

<script type='text/javascript' src='JSViews/historyScript.js'></script>

</html>
