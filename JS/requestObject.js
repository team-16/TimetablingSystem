function Request () {
	//Main fields (data required for all instances)
	this.id = 0;
	this.moduleCode = "";
	this.moduleTitle = "";
	
	this.priority = true;
	
	this.day = 0;
	this.startPeriod = 0;
	this.endLength = 1;
	this.weeks = "";
	
	this.students = 1;
	this.park = 0;
	this.traditional = true;
	this.sessionType = 0;
	this.noOfRooms = 1;
	this.room = "";
	
	this.status = null;
	
	this.facilities = [];

}