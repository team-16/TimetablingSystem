<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

	<head>

		<link href='CSS/addStyle.css' rel='stylesheet' type='text/css'>

	</head>

	<body>
	
	<script type="text/javascript">
		var moduleArray = <?php echo(json_encode(getModules(loggedDept()))); ?>;
	</script>
	
	<button type='button' onclick='$("#requestsNow").click();'>Redirect</button>
	
	<input type='radio' name="mode" onclick="adhocMode();">ad-hoc mode</input>
	<input type='radio' name="mode" onclick="normalMode();" checked>normal mode</input>
		
		<div id="wrapperAdd">

			<form id="add">

				<div class="containerDiv">
					<div id="moduleDetails" class="moduleDetailsDiv">
						<fieldset>
							<legend>Module</legend>
							<table id="moduleTable">
							<tbody>
							<tr>
							<td>
							<h4>Module Code:</h4>
							</td>
							<td>
							<h4>Priority:</h4>
							</td>
							</tr>
							<tr>
							<td>
							<select id="moduleCodeSelect" class="left1" onclick="moduleTitleGenerator();"> <!-- module code -->
								<script type="text/javascript">
									for(var i = 0; i < moduleArray.length; i++){
										var opt = document.createElement('option');
										opt.innerHTML = moduleArray[i]['code'];
										moduleCodeSelect.appendChild(opt);
									}
								</script>
							</select>
							<output id="moduleTitleOutput" class="right1">
								<!-- module title -->
							</output>
							</td>
							<td>
							<div class="formItem">
								<div id="priorityDiv" class="leftModule">
									<!--<h4>Priority:</h4>-->
									
									<div class="right1">
										<input type="checkbox" id="priority">
									</div>
								</div>
								<!--<input type ="button" onclick="getRequestValues();"></input>-->
							</div>
							</td>
							</tr>
							</tbody>
							</table>
						</fieldset>
					</div>

					<div id="timeDetails" class="timeDetailsDiv">	<!-- Time slot box -->
						<fieldset> 
							<legend>Time</legend>
							<table id="timeTable">
							<tbody>
							<tr>
							<td>
							<h4>Day:</h4>
							</td>
							<td>
							<h4>Weeks:</h4>
							</td>
							</tr>
							<tr>
							<td>
							<div class="right1" id="day">
								<!--<select id="daySelect" name="daySelect">
									<option>Monday</option>
									<option>Tuesday</option>
									<option>Wednesday</option>
									<option>Thursday</option>
									<option>Friday</option>
								</select>-->
							</div>
							</td>
							<td>
							<div class="formDiv">
								<div id="weeksDiv" class="right1">
									<input type="button" onclick="selectOdd();" value = "Odd Weeks"></input>
									<input type="button" onclick="selectEven();" value="Even Weeks"></input>
									<input type="button" onclick="select12();" value="Select 12 Weeks"></input>
									<input type="button" onclick="selectDeselectAll(false);" value="Deselect all"></input>
									<input type="button" onclick="selectDeselectAll(true);" value="Select all"></input>
								</div>
							</div>
							</td>
							</tr>
							<tr>
							<td></td>
							<td>
							<div id="weeksCheckbox">
								<!-- Weeks checkboxes to go here -->
							</div>
							</td>
							</tr>
							</tbody>
							</table>
							<div id="periodAndLengthWrapper">
								<div class="formDiv">
									<h4 style="float:left;">Period:</h4></br>
									<label id="periodT" for="amount">Start Period: </label>
									<output class= "periodNo" type="number" id="startPeriod"></output>
									<label id="periodT" for="amount"> | End Period: </label>
									<output class= "periodNo" type="number" id="endPeriod"></output>
									<!--<output type="text" id="amount" style="border:0; font-weight:bold;"></output>-->
									<div id="slider-range">
										<!-- Slider generated here -->
									</div>
								</div>
							</div>
						</fieldset> <!-- End of time slot box -->
					</div>
				</div>	<!-- End of container -->

				<div class="containerDiv">
					<div id="roomDetails" class="roomDiv">
						<fieldset> <!-- Room details box -->
							<legend>Room</legend>
							<table id="roomTable">
							<tbody>
							<tr>
							<td>
							<h4>No. of students:</h4>
							</td>
							<td>
							<h4>Traditional/Seminar:</h4>							
							</td>
							<td>
							<h4>Session Type:</h4>
							</td>
							<td>
							<h4>Park Preference:</h4>
							</td>
							</tr>
							<tr>
							<td>
							<div class="formItem">
								<div class="right1">
									 <input id= "studentsInput" name="studentsInput"  value = "1" onkeypress="return isNumberKey(event);" onkeyup ="onKeyUpCheck();">
								</div>
							</div>
							</td>
							<td>							
							<div class="formItem">
								<div class="right1">
									<select id="traditionalSeminarSelect">
										<option>Traditional</option>
										<option>Seminar</option>
								  	</select>
								</div>
							</div>
							</td>
							<td>
							<div class="formItem">
								<div class="right1">
									<select id="sessionTypeSelect">
										<option>Lecture</option>
										<option>Tutorial</option>
										<option>Lab</option>
								  	</select>
								</div>
							</div>
							</td>
							<td>
							<div class="formItem">
								<div class="right1" id ="parkPreference">
								</div>
							</div>
							</td>
							</tr>
							</tbody>
							</table>
							
							<table id="roomTable2">
							<tbody>
							<tr>
							<td>
							<h4>Building Preference:</h4>
							</td>
							<td>
							<h4>No. of rooms:</h4>
							</td>
							</tr>
							<tr>
							<td>
							<div class="formItem">
								<div class ="right1" id="buildingPreference">
								</div>
							</div>
							</td>
							<td>
							<div class="formItem">
								<div class="right1">
									 <input id= "roomsInput" name="roomsInput" onkeypress="return isNumberKey(event);" onkeyup ="onKeyUpCheckNumRooms();" value="1">
								</div>
							</div>
							</td>
							</tr>
							</tbody>
							</table>
							<div class="formItem">
								<div class ="leftRoom">
									<h4>Room Preference:</h4>
								</div></br>
								<div class="right1" name="roomPreference" id="roomPreference"></div>
								<div class="right1" name="chosenRooms" id="chosenRooms">
									<select size ="5" id="cRoomsList">
									</select>
								</div>
								<div id="roomBtnDiv" class="right1">
									<input type="button" class="roomBtn" value="Add"  onclick="addRoomToPref(document.getElementById('rooms').options[document.getElementById('rooms').options.selectedIndex].value,document.getElementById('rooms').options[document.getElementById('rooms').options.selectedIndex].text);"></br>
									<input type="button" class="roomBtn" value="Remove" onclick="removeRoomFromPref();">
								</div>
							</div>

						</fieldset>	
					</div>	<!-- End of room details box -->

					<div id="featuresDetail" class="featuresDetailDiv">
						<fieldset>	<!-- Features box -->
							<legend>Features</legend>
								<div id="roomFacilities" class="facilitiesDiv">
							<!-- content -->
								</div>
								</br>
								<div class="leftFeatures">
									<h4>Other Requirements:</h4>
								</div>
								<div id="otherRequirements">
									<textarea id="otherRequirementsTextArea" style="resize: none;" maxlength="255" rows="4" cols="50"></textarea>
								</div>
						</fieldset>	<!-- End of features box -->
						</div>
				</div> <!-- End of container -->
			</form>
		</div>
		<div class="submitDiv">
			<!-- <input type="submit" value="Submit Request" onclick="insertRequest();"> -->
			<input type="button" value="Submit Request" onclick="insertRequest();"></input>
			<input type="button" value="Cancel" onclick="location.reload();"></input>	
			<div id="submitForm" style="visibility:hidden;"></div>
		</div>
			
	</body>
		<script src='JSViews/addScript.js'></script>
		<link href='jQuery&UI/jquery-ui-1.10.3/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>
		<script src='jQuery&UI/jquery-ui-1.10.3/jquery-1.9.1.js'></script>
		<script src='jQuery&UI/jquery-ui-1.10.3/ui/jquery-ui.js'</script>
		<!--<script src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>-->

</html>
