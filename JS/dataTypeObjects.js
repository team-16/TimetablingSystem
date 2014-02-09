//Request Object
function Request () {
	
	//Main fields (data required for all instances)
	this.department = null;
	
	this.round = null;
	
	this.id = "";
	this.moduleCode = "";
	this.moduleTitle = "";
	
	this.priority = true;
	
	this.day = 0;
	this.startPeriod = 0;
	this.endPeriod = 1;
	this.weeks = [];
	
	this.students = 1;
	this.park = 0;
	this.traditional = true;
	this.sessionType = 0;
	this.noOfRooms = 1;
	this.rooms = [];
	
	this.status = null;
	
	this.facilities = [];
	this.otherReqs = "";
	
	this.allocatedRooms = [];
	


}


function Facility () {
	
	this.id = "";
	this.name = "";
	
}

function Module () {
	
	this.code = "";
	this.title = "";
	this.shortFat = false;
	
}

function Building () {
	
	this.code = "";
	this.name = "";
	this.park = null;
	this.rooms = []; //contains array of Room Object/Data type
	
}

function Room () {
	
	this.code = "";
	this.type = null;
	this.capacity = null;
	
}

function getFacilityTitles(facilityCodesArray){
	
	var titleArray = [];
	
	for (var count in facilityCodesArray) {
				
		for(var counter = 0; counter < facilitiesArray.length; counter++){
		
			if (facilityCodesArray[count] == facilitiesArray[counter].id) titleArray.push(facilitiesArray[counter].name);
		
		}
	}
	
	return titleArray;
}