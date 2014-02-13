<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirect('login.php');
}

?>


<?php
	/*
	echo('<script type="text/javascript">
			window.top.location.href = "http://co-project.lboro.ac.uk/team16/TimetablingSystem/login.php";
			</script>');
	
	
	echo(loggedDept() . " | " . loggedDeptName());
	*/
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="jQuery&UI/jquery-ui-1.10.3/themes/base/jquery.ui.all.css">
		<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="CSS/indexStyle.css">
		<link rel="stylesheet" type="text/css" href="CSS/accordion.css">
		<link rel="stylesheet" type="text/css" href="CSS/listViewStyle.css">
		<link rel="stylesheet" type="text/css" href="CSS/graphicalViewStyle.css">
	</head>

	<body>

		<div id='wrapper'> <!-- Replaces the body tag -->

			<header>
				<h1 class="left">Loughborough University Timetabling</h1>
				<a href="http://www.lboro.ac.uk/"><img class="logo" src="Images/lulogo.png"></a>
			</header>
			
			<nav id="menuLinks">
				<ul>
				
					<a href="home.php" id='home'>
						<li>
							Home
						</li>
					</a>
					
					<a href="add.php">
						<li>
							Add...
						</li>
					</a>
					
					<a href="requests.php">
						<li>
							Requests
						</li>
					</a>
					
					<a href="results.php">
						<li>
							Results
						</li>
					</a>
					
					<a href="mybookings.php">
						<li>
							My Bookings
						</li>
					</a>
					
					<a href="allbookings.php">
						<li>
							All Bookings
						</li>
					</a>
					
					<a href="settings.php">
						<li>
							Settings
						</li>
					</a>
					
					<a href="test.php">
						<li>
							Test
						</li>
					</a>
					
					<a href="test2.php">
						<li>
							Test 2
						</li>
					</a>
					
					<a href="test3.php">
						<li>
							Test 3
						</li>
					</a>
					
				</ul>
			</nav>
			<div id= "progressbar"> </div>
			<div id='ContentDiv'>
				<!-- Javascript injects content here -->
			</div>

		</div> <!-- wrapper close -->  

		<footer>
			<h6>Copyright lboro.ac.uk</h6>
		</footer>
		
	<!-- These probably can't stay here, but for now they work -->
	<script type='text/javascript' src='JS/constants.js'></script>
	<script type='text/javascript' src='JS/sessionData.js'></script>
	<script type='text/javascript' src='JS/dataTypeObjects.js'></script>
	<script type='text/javascript' src='JS/globalFunctions.js'></script>
	<script type='text/javascript' src='JS/dataManager.js'></script>
	<script type='text/javascript' src='JS/weeksManipulator.js'></script>
	
	<!-- 		View Generators			-->
	<script type='text/javascript' src='JS/listGenerator.js'></script>
	<script type='text/javascript' src='JS/graphicalGenerator.js'></script>
	
	<script type='text/javascript' src='jQuery&UI/jQuery.js'></script>
	<script type='text/javascript' src='jQuery&UI/jquery-ui-1.10.3/ui/jquery-ui.js'></script>
	
	<script type='text/javascript' src='JSViews/indexScript.js'></script>

	</body>
</html>
