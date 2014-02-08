var department = "";


var roundID = "";

var roundNumber = 1;

var roundStart = new Date();

var roundEnd = new Date();

var roundSemesterID = "";

var roundSemester = 1;

var roundYear = 1111;

var numberOfWeeks = 1;


var adHocRoundID = "";

var adHocStart = new Date();

var adHocEnd = new Date();

var adHocSemesterID = "";

var adHocSemester = 1;

var adHocYear = 1111;

var adHocNumberOfWeeks = 1;


var facilitiesArray = [];





var requestArray = [];

 
function setupSessionData(){

	department = "CO";


	roundID = "12345";

	roundNumber = 1;

	roundStart = new Date();

	roundEnd = new Date();

	roundSemesterID = "789";

	roundSemester = 2;

	roundYear = 2014;

	numberOfWeeks = 16;


	adHocRoundID = "12344";

	adHocStart = new Date();

	adHocEnd = new Date();

	adHocSemesterID = "788";

	adHocSemester = 1;

	adHocYear = 2014;

	adHocNumberOfWeeks = 15;
	
	testFacilities();
	testRequestList();
	
}

function testFacilities() {
	
	facilitiesArray[0] = new Facility();
	facilitiesArray[0].id = "10100";
	facilitiesArray[0].name = "Whiteboard";
	
	facilitiesArray[1] = new Facility();
	facilitiesArray[1].id = "10101";
	facilitiesArray[1].name = "Data Projector";
	
	facilitiesArray[2] = new Facility();
	facilitiesArray[2].id = "10102";
	facilitiesArray[2].name = "OHP";
	
	
}
 
function testRequestList() {
	
	var testReq = new Request();
	var testReq2 = new Request();
	
	testReq.department = department;
	
	testReq.round = roundID;
	
	testReq.id = "1234";
	testReq.moduleCode = "COB123";
	testReq.moduleTitle = "Test Module Title";
	
	testReq.priority = true;
	
	testReq.day = 2;
	testReq.startPeriod = 2;
	testReq.endPeriod = 2;
	testReq.weeks = [true, true, true, true, true, true, true, true, true, true, true, true, false, false, false, false];
	
	testReq.students = 100;
	testReq.park = 0;
	testReq.traditional = true;
	testReq.sessionType = 0;
	testReq.noOfRooms = 1;
	testReq.rooms = ["J.0.01", "J.0.02"];
	
	testReq.status = 0;
	
	testReq.facilities = ["10100", "10101"];
	testReq.otherReqs = "";
	
	testReq.allocatedRooms = ["J.0.02"];
	
	
	requestArray[0] = testReq;
	
	
	testReq2.department = department;
	
	testReq2.round = roundID;
	
	testReq2.id = "1235";
	testReq2.moduleCode = "COB123";
	testReq2.moduleTitle = "Test Module Title";
	
	testReq2.priority = false;
	
	testReq2.day = 3;
	testReq2.startPeriod = 7;
	testReq2.endPeriod = 8;
	testReq2.weeks = [true, true, true, true, true, true, true, true, true, true, true, true, false, false, false, false];
	
	testReq2.students = 100;
	testReq2.park = 0;
	testReq2.traditional = true;
	testReq2.sessionType = 2;
	testReq2.noOfRooms = 1;
	testReq2.rooms = ["N.0.01", "N.0.03"];
	
	testReq2.status = 1;
	
	testReq2.facilities = [];
	testReq2.otherReqs = "";
	
	testReq2.allocatedRooms = ["N.0.01"];
	
	requestArray[1] = testReq2;
	requestArray[2] = testReq;
	requestArray[3] = testReq2;
	
}
 