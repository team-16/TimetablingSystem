<?php

// loadSessionData.php

// CREATED BY:
// Niall Rose, Johnbastian Emilianus, Shirley Kutadzaushe

// FUNCTIONALITY:
// Holds functions related to loading general data, including obtaining
// information about current round, semester, etc. Used by most parts of the
// system.
	
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