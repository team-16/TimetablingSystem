function loadFacilities(jsonFacilitiesArray) {
	
	for(var counter = 0; counter < jsonFacilitiesArray.length; counter++) {
		
		var facility = new Facility();
		
		facility.id = jsonFacilitiesArray[counter].id;
		facility.name = jsonFacilitiesArray[counter].name;
		
		facilitiesArray[counter] = facility;
		
	}
	
}

function getModules(results) {
	
	
	
}


function getAllRoomsAndBuildings() {
	
	var buildingRoomsArray = [];
	
	var jsonResults = null;
	
	$.ajax({
		url: "loadBuildingsRooms.php?" +currentSessionID,
		type: "POST",
		data: {},
		async: false,
		success: function(results) {
			jsonResults = results;
		}
	});
	
	alert(JSON.stringify(jsonResults));
	
	jsonResults = JSON.parse(jsonResults);
	
	var jsonBuildingsArray = jsonResults.Buildings;
	alert(jsonBuildingsArray);
	
	var jsonRoomsArray = jsonResults.Rooms;
	alert(jsonRoomsArray);
	
	for(var buildingCounter = 0; buildingCounter < jsonBuildingsArray.length; buildingCounter++) {
		
		var currentBuilding = new Building();
		
		currentBuilding.code = jsonBuildingsArray[buildingCounter].code;
		currentBuilding.name = jsonBuildingsArray[buildingCounter].name;
		currentBuilding.park = Number(jsonBuildingsArray[buildingCounter].park);
		
		alert(currentBuilding.name + " : " + parksArray[currentBuilding.park]);
		
		currentBuilding.rooms = getAllRoomsInBuilding(currentBuilding.code, jsonRoomsArray);
		
		buildingRoomsArray.push(currentBuilding);
		
	}
	
	return buildingRoomsArray;
	
}

function getAllRoomsInBuilding(buildingCode, jsonRooms) {
	
	var roomsInBuilding = [];
	
	for(var roomCounter = 0; roomCounter < jsonRooms.length; roomCounter++) {
		
		if(buildingCode == jsonRooms[roomCounter].buildingcode) {
			
			var currentRoom = new Room();
			
			currentRoom.code = jsonRooms[roomCounter].code;
			currentRoom.type = Number(jsonRooms[roomCounter].type);
			currentRoom.capacity = Number(jsonRooms[roomCounter].capacity);
			
			alert(currentRoom.code + " : " + currentRoom.type + " : " + currentRoom.capacity);
			
			roomsInBuilding.push(currentRoom);
			
		}
		
	}
	
	return roomsInBuilding;
	
}


