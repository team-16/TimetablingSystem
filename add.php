<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirect('login.php');
}

?>

<html>

	<head>

		<link href='CSS/add.css' rel='stylesheet' type='text/css'>

	</head>

	<body>
	
	<script type="text/javascript">
		var moduleArray = <?php echo(json_encode(getModules(loggedDept()))); ?>;
		//alert(JSON.stringify(moduleArray));
	</script>
		
		<div id="wrapperAdd">

		<button id="HELLOJAVASCRIPT" onclick="checkboxGenerator(); facilityGenerator(); parkGenerator();" style="width:100%;height:50px;">LOL INTERNET</button><!-- the location of this button is irrelevant -->
			<form id="add">

				<div class="containerDiv">
					<div id="moduleDetails" class="moduleDetailsDiv">
						<fieldset>
							<legend>Module</legend>
							<select id="moduleCodeSelect" class="left1" onchange='document.getElementById("moduleTitleOutput").innerHTML = moduleArray[document.getElementById("moduleCodeSelect").selectedIndex]["title"]'> <!-- module code -->
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
						</fieldset>
					</div>

					<div id="timeDetails" class="timeDetailsDiv">	<!-- Time slot box -->
						<fieldset> 
							<legend>Time slot</legend>
							<div class="leftTime">
								<h4>Day:</h4>
							</div>
							<div class="right1">
								<select id="daySelect">
									<option>Monday</option>
									<option>Tuesday</option>
									<option>Wednesday</option>
									<option>Thursday</option>
									<option>Friday</option>
								</select>
							</div>
							<div class="formDiv">
								<div class="leftTime">
									<h4>Weeks:</h4>
								</div>
								<div id="weeksDiv" class="right1">
								</div>
							</div>

							<div id="weeksCheckbox">
								<!-- Weeks checkboxes to go here -->
							</div>

							<div id="periodAndLengthWrapper">
								<div class="formDiv">
									<div class="leftTime">
										<h4>Period:</h4>
									</div>
									<div class="right1">
										<select id="periodSelect">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>404</option>
										</select>
									</div>
								</div>
								<div class="formDiv">
									<div class="leftTime">
										<h4>Length:</h4>
									</div>
									<div class="right1">
										<select id="lengthSelect">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
										</select>
									</div>
								</div>
								<div id="slider-range">
									<!-- Slider generated here -->
								</div>
							
							</div>
						</fieldset> <!-- End of time slot box -->
					</div>
				</div>	<!-- End of container -->

				<div class="containerDiv">
					<div id="roomDetails" class="roomDiv">
						<fieldset> <!-- Room details box -->
							<legend>Room</legend>
							<div class="formItem">
								<div class="leftRoom">
									<h4>No. of students:</h4>
								</div>
								<div class="right1">
									 <input id="studentsInput" onkeypress="return isNumberKey(event);" onkeyup ="onKeyUpCheck();">
								</div>
							</div>
							
							<div class="formItem">
								<div class="leftRoom">
									<h4>Session type:</h4>
								</div>
								<div class="right1">
									<select id="traditionalSeminarSelect">
										<option>Traditional</option>
										<option>Seminar</option>
								  	</select>
								</div>
							</div>

							<div class="formItem">
								<div class="leftRoom">
									<h4>Park preference:</h4>
								</div>
								<div class="right1">
									<select id="parkSelect"></select>
								</div>
							</div>			
						</fieldset>	
					</div>	<!-- End of room details box -->
					<div id="roomFacilities" class="facilitiesDiv">
						<fieldset>	<!-- Features box -->
							<legend>Features</legend>
							<!-- content -->
						</fieldset>	<!-- End of features box -->
					</div>
				</div> <!-- End of container -->

			</form>


						<!--

						<div id= "module" class="divstyle style1" align="right"> module info <br>
								<select name ="modulecode">
									<option>COA123</option>
								</select><br>
								Traditional/Seminar<select>
									<option id="T">T</option>
									<option id="S">S</option>
								</select><br>

								Priority Booking:<input type = "radio" name="shortfat" value="true">yes
												 <input type = "radio" name="shortfat" value="false">no</br>
								No. of Students: <input type = "text" onkeypress="return isNumberKey(event);" onkeyup= "okKeyUpCheck();" id="students" value ="1"/> <br>
						</div>
						
						<div id="facilities" class="divstyle style2"> facilities <br>
						</div>
						<div id="time" class= "divstyle style3"> time <br>

							<select>
								<option>Monday</option>
								<option>Tuesday</option>
								<option>Wednesday</option>
								<option>Thursday</option>
								<option>Friday</option>
							</select><br>
							<input type="button" onclick="selectDeselectAll(false);" value = "deselect all">  <br>
							<input type="button" onclick="selectDeselectAll(true);" value = "select all"> <br>
							<input type="button" onclick="select12();" value = "select 12"> <br>
						</div>

					<input type="button" onclick="facilityGenerator(); checkboxGenerator(); periodsGenerator();
						lengthGenerator(); parkPreferenceGenerator();">

					-->
<p>placeholder</p>
		</div> <!-- end of wrapper -->

			<script src='JSViews/add.js'></script>
			<link href='jQuery&UI/jquery-ui-1.10.3/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>
  			<script src='jQuery&UI/jquery-ui-1.10.3/jquery-1.9.1.js'></script>
  			<script src='jQuery&UI/jquery-ui-1.10.3/ui/jquery-ui.js'</script>
  			<!--<script src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>-->

	</body>

</html>