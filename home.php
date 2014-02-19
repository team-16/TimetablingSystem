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

<div id = "request_results">
	<table class="table" id="tallyTable">
		<tr>
			<th>accepted</th><th>rejected</th><th>pending</th>
		</tr>
		<tr>
			<td id="accepted">0</td><td id="rejected">0</td><td id="pending">0</td>
		</tr>
	</table>
	</br>
	<table class='ToggleTable'>
		<tr>
			<td>
				<input type='radio' name='resultsRadio' onclick='adHocState(this);' checked>Current</input>
			</td>
			<td>
				<input type='radio' name='viewRadio' onclick='loadListView();' checked>List View</input>
			</td>
		</tr>
		<tr>
			<td>
				<input type='radio' name='resultsRadio' onclick='adHocState(this);' id='adHocRad'>AdHoc View</input>
			</td>
			<td>
				<input type='radio' name='viewRadio' onclick='loadTimetableView();'>Timetable View</input>
			</td>
		</tr>
	</table>
</div>



<div id='homeViewContainer'>

</div>

<script type='text/javascript' src='JSViews/homeScript.js'></script>
</html>