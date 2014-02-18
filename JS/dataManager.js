function loadFacilities(jsonFacilitiesArray) {
	
	for(var counter = 0; counter < jsonFacilitiesArray.length; counter++) {
		
		var facility = new Facility();
		
		facility.id = jsonFacilitiesArray[counter].id;
		facility.name = jsonFacilitiesArray[counter].name;
		
		facilitiesArray[counter] = facility;
		
	}
	
}


function formatJSONRequests(jsonReqArray, allocatedFlag) {
	
	jsonReqArray = JSON.parse(jsonReqArray);
	
	var requestsArray = [];
	
	for(var reqCounter = 0; reqCounter < jsonReqArray.length; reqCounter++) {
		
		var currentRequest = new Request();
		
		currentRequest.department = jsonReqArray[reqCounter]["deptcode"];
	
		currentRequest.round = Number(jsonReqArray[reqCounter]["roundID"]);
	
		currentRequest.id = Number(jsonReqArray[reqCounter]["id"]);
		currentRequest.moduleCode = jsonReqArray[reqCounter]["moduleCode"];
		currentRequest.moduleTitle = jsonReqArray[reqCounter]["title"];
		
		if (Number(jsonReqArray[reqCounter]["priority"]) == 1) currentRequest.priority = true;
		else currentRequest.priority = false;
		
		currentRequest.day = Number(jsonReqArray[reqCounter]["day"]);
		currentRequest.startPeriod = Number(jsonReqArray[reqCounter]["startPeriod"]);
		currentRequest.endPeriod = Number(jsonReqArray[reqCounter]["endPeriod"]);
		currentRequest.weeks = weeksDecoder(jsonReqArray[reqCounter]["weeks"]);
		
		currentRequest.students = Number(jsonReqArray[reqCounter]["noOfStudents"]);
		currentRequest.park = Number(jsonReqArray[reqCounter]["parkPreference"]);
		currentRequest.traditional = Number(jsonReqArray[reqCounter]["traditional"]);
		currentRequest.sessionType = Number(jsonReqArray[reqCounter]["sessionType"]);
		currentRequest.noOfRooms = Number(jsonReqArray[reqCounter]["noOfRooms"]);
		
		var requestRoomsArray = jsonReqArray[reqCounter]["roomCode"];
		
		for (var rCounter = 0; rCounter < requestRoomsArray.length; rCounter++) {
			
			currentRequest.rooms.push(requestRoomsArray[rCounter]);
			
		}
		
		
		if (jsonReqArray[reqCounter]["status"] != null) currentRequest.status = Number(jsonReqArray[reqCounter]["status"]);
	
		var requestFacilityArray = jsonReqArray[reqCounter]["facilities"];
		
		for (var fCounter = 0; fCounter < requestFacilityArray.length; fCounter++) {
			
			currentRequest.facilities.push(requestFacilityArray[fCounter]);
			
		}
		
		currentRequest.otherReqs = jsonReqArray[reqCounter]["otherRequirements"];
	
		if(allocatedFlag) {
			
			var allocatedRoomArray = jsonReqArray[reqCounter]["allocatedRooms"];
			
			for (var aCounter = 0; aCounter < allocatedRoomArray.length; aCounter++) {
				
				currentRequest.allocatedRooms.push(allocatedRoomArray[aCounter]);
				
			}
			
		}
		
		requestsArray.push(currentRequest);
		
	}
	
	return requestsArray;
	
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
	
	//alert(JSON.stringify(jsonResults));
	
	jsonResults = JSON.parse(jsonResults);
	
	var jsonBuildingsArray = jsonResults.Buildings;
	
	var jsonRoomsArray = jsonResults.Rooms;
	
	for(var buildingCounter = 0; buildingCounter < jsonBuildingsArray.length; buildingCounter++) {
		
		var currentBuilding = new Building();
		
		currentBuilding.code = jsonBuildingsArray[buildingCounter].code;
		currentBuilding.name = jsonBuildingsArray[buildingCounter].name;
		currentBuilding.park = Number(jsonBuildingsArray[buildingCounter].park);
		
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
			
			roomsInBuilding.push(currentRoom);
			
		}
		
	}
	
	return roomsInBuilding;
	
}

function deleteRequest(requestID) {
	
	requestID = Number(requestID);
	
	$.ajax({
		url: "requestDeletionManager.php?" + currentSessionID,
		type: "POST",
		data: {requestID:requestID},
		success: function(results) {
			alert(results);
		}
	});
	
	
}
