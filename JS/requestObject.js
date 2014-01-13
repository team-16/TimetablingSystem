function Request () {
	//Main fields (data required for all instances)
	this.id = 0;
	this.moduleCode = "mCode";
	this.moduleTitle = "mTitle";
	
	this.priority = true;
	
	this.day = 0;
	this.startPeriod = 0;
	this.endLength = 1;
	this.weeks = "111111111111000";
	
	this.students = 200;
	this.park = 0;
	this.traditional = true;
	this.sessionType = 0;
	this.noOfRooms = 1;
	this.room = "rCode";
	
	this.status = null;
	
	this.facilities = [1, 2, 3];

}