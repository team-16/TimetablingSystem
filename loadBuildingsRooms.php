<?php
	
	include('PHP/init.php');
	
	$allBuildings =  getBuildings();
	$allRooms = getRooms();
	
	$buildingRooms = array(
		
		"Buildings" => $allBuildings,
		"Rooms" => $allRooms
				
	);
	
	echo json_encode($buildingRooms);
	
	
?>