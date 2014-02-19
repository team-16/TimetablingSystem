<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<link href='CSS/resultsStyle.css' rel='stylesheet' type='text/css'>

<div>
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
<div class='timetableHeadings'>
	
	<table class='timeHeaderTable'>
			
			<tr>
				
				<td>
					1
					</br>
					13:00
					</br>
					-
					</br> 
					14:00
				</td>
				
				<td>
					2
				</td>
				
				<td>
					3
				</td>
				
				<td>
					4
				</td>
				
				<td>
					5
				</td>
				
				<td>
					6
				</td>
				
				<td>
					7
				</td>
				
				<td>
					8
				</td>
				
				<td>
					9
				</td>
				
			</tr>
			
		</table>
</div>

<div id='resultsViewContainer'>
	
</div>

<script type='text/javascript' src='JSViews/resultsScript.js'></script>

</html>