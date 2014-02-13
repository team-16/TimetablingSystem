<?php
	
	include('init.php');
	
	$currentDept =  loggedDept();
	$liveSemester = getLiveSemesterData();
	$adHocSemester = getAdHocSemesterData();
	$liveRounds = getCurrentRoundsData();
	
	$allFacilities = getFacilities();
	
	
	$sessionData = array(
		
		"Department" => $currentDept,
		"LiveSemester" => $liveSemester,
		"AdHocSemester" => $adHocSemester,
		"LiveRounds" => $liveRounds,
		"AllFacilities" => $allFacilities
				
	);
	
	echo json_encode($sessionData);
		
?>