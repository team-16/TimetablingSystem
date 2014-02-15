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


function getAllRoomsWithBuildings() {
	
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
	
}