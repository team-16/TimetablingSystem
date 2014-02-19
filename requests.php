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

<div>
	<table class='ToggleTable'>
		<tr>
			<td>
				<input type='radio' name='resultsRadio' onclick='adHocState(this);' checked>Current</input>
			</td>
			<td>
				<input type='radio' name='viewRadio' onclick='loadListView();' checked>List View</input>
			</td>
			<td>
				<input type='radio' name='timeRadio' onclick='displayTime(true);' checked>Periods</input>
			</td>
		</tr>
		<tr>
			<td>
				<input type='radio' name='resultsRadio' onclick='adHocState(this);' id='adHocRad'>AdHoc View</input>
			</td>
			<td>
				<input type='radio' name='viewRadio' onclick='loadTimetableView();'>Timetable View</input>
			</td>
			<td>
				<input type='radio' name='timeRadio' onclick='displayTime(false);'>Times</input>
			</td>
		</tr>
		
	</table>
</div>
	
<div id='requestsViewContainer'>
	
</div>

<script type='text/javascript' src='JSViews/requestsScript.js'></script>

</html>
