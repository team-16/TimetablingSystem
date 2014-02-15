<?php

function getBuildings(){
	global $DB;
	
	if($DB->query("SELECT * FROM building ORDER BY name")){
		return $DB->results();
	}
	
	else{
		return false;
	}
}

function insertBuilding($buildingCode, $name, $park){
	global $DB;
	
	if($DB->query("INSERT INTO building (code, name, park) VALUES (:buildingCode, :name, :park)",
	array(':buildingCode' => $buildingCode, ':name' => $name, ':park' => $park))) {
		return true;
	}
	
	else{
		return false;
	}
}

function updateBuilding($buildingCode, $name, $park){
	global $DB;
	
	if($DB->query("UPDATE building SET name = :name, park = :park WHERE code = :buildingCode",
	array(':buildingCode' => $buildingCode, ':name' => $name, ':park' => $park))) {
		return true;
	}
	
	else{
		return false;
	}
	// need another update mechanism for if changing building code too.	
}

function deleteBuilding($buildingCode){
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