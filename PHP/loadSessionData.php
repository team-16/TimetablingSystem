<?php
	
	include('init.php');
	
	$currentDept =  (loggedDept() . " | " . loggedDeptName());
	/*
	$liveSemester = getLiveSemesterData();
	$adHocSemester = getAdHocSemesterData();
	$liveRounds = getCurrentRoundsData();
	
	$allFacilities = getFacilities();
	*/
	
	$sessionData = array(
		
		"Department" => $currentDept,
		/*
		"LiveSemester" => $liveSemester,
		"AdHocSemester" => $adHocSemester,
		"LiveRounds" => $liveRounds,
		"AllFacilities" => $allFacilities
		*/
		
		"Test" => 3
		
	);
	
	echo json_encode($sessionData);
	
	//echo "Called loadSessionData.php";
	
?>