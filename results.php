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
					Start
				</td>
				
				<td>
					10:00
					Start
				</td>
				
				<td>
					11:00
					Start
				</td>
				
				<td>
					12:00
					Start
				</td>
				
				<td>
					13:00
					Start
				</td>
				
				<td>
					14:00
					Start
				</td>
				
				<td>
					15:00
					Start
				</td>
				
				<td>
					16:00
					Start
				</td>
				
				<td>
					17:00
					Start
				</td>
				
			</tr>
			
		</table>
		
</div>

<div class='timetHeadings' id='lHeadings'>
	
	<table class='listHeaderTable' id='listHeadings'>
	
		<tr>
		
			<td id='depField'>
				Dep
			</td>
		
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

<div class='listHeadings' id='listTitles'>
	
</div>

<div id='resultsViewContainer'>
	
</div>

<script type='text/javascript' src='JSViews/resultsScript.js'></script>

</html>