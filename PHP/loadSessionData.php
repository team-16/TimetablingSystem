<?php
	
	include('init.php');
	
	$currentDept =  loggedDept();
	$liveSemester = getLiveSemesterData();
	$adHocSemester = getAdHocSemesterData();
	$liveRound = getLiveRoundData();
	$adHocRound = getAdHocRoundData();
	
	$allFacilities = getFacilities();
	
	
	$sessionData = array(
		
		"Department" => $currentDept,
		"LiveSemester" => $liveSemester,
		"AdHocSemester" => $adHocSemester,
		"LiveRound" => $liveRound,
		"AdHocRound" => $adHocRound,
		"AllFacilities" => $allFacilities
				
	);
	
	echo json_encode($sessionData);
		
?>