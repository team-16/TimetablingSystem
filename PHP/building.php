<?php

// building.php

// CREATED BY:
// Niall Rose

// FUNCTIONALITY:
// Holds functions related to buildings, including obtaining information about
// all or specific buildings, editing data of buildings and deleting data of
// buildings.

function getBuildings(){ // Return every building's data ordered by names.
	global $DB;
	
	if($DB->query("SELECT * FROM building ORDER BY name")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function insertBuilding($buildingCode, $name, $park){ // Add new building.
	global $DB;
	
	if($DB->query("INSERT INTO building (code, name, park) VALUES (
	:buildingCode, :name, :park)",
	array(':buildingCode' => $buildingCode, ':name' => $name, ':park' => $park)
	)) {
		return true;
	}
	
	else{
		return false;
	}
}

function updateBuilding($buildingCode, $name, $park){ // Alter building data.
	global $DB;
	
	if($DB->query("UPDATE building SET name = :name, park = :park
	WHERE code = :buildingCode",
	array(
	':buildingCode' => $buildingCode, ':name' => $name, ':park' => $park))) {
		return true;
	}
	
	else{
		return false;
	}
}

function deleteBuilding($buildingCode){ // Remove building data from database.
	global $DB;
	
	if($DB->query("DELETE FROM building WHERE code = :code",
	array(':code' => $buildingCode))){
		return true;				  
	}
	
	else{
		return false;
	}
}

?>