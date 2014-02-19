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
				<input type='radio' name='viewRadio' onclick='loadListView();' checked>List View</input>
			</td>
			<td>
				<input type='radio' name='timeRadio' onclick='displayTime(true);' checked>Periods</input>
			</td>
		</tr>
		<tr>
			<td>
				<input type='radio' name='viewRadio' onclick='loadTimetableView();'>Timetable View</input>
			</td>
			<td>
				<input type='radio' name='timeRadio' onclick='displayTime(false);'>Times</input>
			</td>
		</tr>
		
	</table>
</div>

<div class='graphicalHeadings' id='gHeadings'>
	
	<table class='periodHeaderTable' id='periodHeadings'>
			
			<tr>
				
				<td>
					1
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
	
	<table class='timeHeaderTable' id='timeHeadings'>
			
			<tr>
				
				<td>
					09:00
					<p>Start</p>
				</td>
				
				<td>
					10:00
					<p>Start</p>
				</td>
				
				<td>
					11:00
					<p>Start</p>
				</td>
				
				<td>
					12:00
					<p>Start</p>
				</td>
				
				<td>
					13:00
					<p>Start</p>
				</td>
				
				<td>
					14:00
					<p>Start</p>
				</td>
				
				<td>
					15:00
					<p>Start</p>
				</td>
				
				<td>
					16:00
					<p>Start</p>
				</td>
				
				<td>
					17:00
					<p>Start</p>
				</td>
				
			</tr>
			
		</table>
		
</div>

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

<div id='requestsViewContainer'>
	
</div>

<script type='text/javascript' src='JSViews/requestsScript.js'></script>

</html>
