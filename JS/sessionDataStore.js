var department = "";


var roundID = "";

var roundNumber = 1;

var roundStart = new Date();

var roundEnd = new Date();

var liveSemesterID = "";

var liveSemester = 1;

var liveYear = 0;

var numberOfWeeks = 15;


var adHocRoundID = "";

var adHocStart = new Date();

var adHocEnd = new Date();

var adHocSemesterID = "";

var adHocSemester = 1;

var adHocYear = 0;

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

	numberOfWeeks = 15;


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
	var testReq3 = new Request();
	var testReq4 = new Request();
	var testReq5 = new Request();
	
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
		testReq.otherReqs = "test other reqs";
	
		testReq.allocatedRooms = ["J.0.02"];
	
	
	requestArray[0] = testReq;
	
	
		testReq2.department = department;
	
		testReq2.round = roundID;
	
		testReq2.id = "1235";
		testReq2.moduleCode = "COB124";
		testReq2.moduleTitle = "Test Module Title";
	
		testReq2.priority = false;
	
		testReq2.day = 3;
		testReq2.startPeriod = 4;
		testReq2.endPeriod = 6;
		testReq2.weeks = [true, true, true, true, true, true, true, true, true, true, true, true, false, false, false, false];
	
		testReq2.students = 100;
		testReq2.park = 0;
		testReq2.traditional = true;
		testReq2.sessionType = 2;
		testReq2.noOfRooms = 1;
		testReq2.rooms = ["N.0.01", "N.0.03"];
	
		testReq2.status = 1;
	
		testReq2.facilities = ["10102"];
		testReq2.otherReqs = "";
	
		testReq2.allocatedRooms = ["N.0.01"];
	
	
	requestArray[1] = testReq2;
	
	
		testReq3.department = department;
	
		testReq3.round = roundID;
	
		testReq3.id = "1236";
		testReq3.moduleCode = "COB125";
		testReq3.moduleTitle = "Test Module Title";
	
		testReq3.priority = false;
	
		testReq3.day = 3;
		testReq3.startPeriod = 5;
		testReq3.endPeriod = 7;
		testReq3.weeks = [false, false, false, true, false, true, false, true, true, true, true, true, false, true, false, false];
	
		testReq3.students = 100;
		testReq3.park = 0;
		testReq3.traditional = true;
		testReq3.sessionType = 2;
		testReq3.noOfRooms = 1;
		testReq3.rooms = ["N.0.01", "N.0.03"];
	
		testReq3.status = 1;
	
		testReq3.facilities = ["10102"];
		testReq3.otherReqs = "";
	
		testReq3.allocatedRooms = ["N.0.02"];
	
	
	requestArray[2] = testReq3;
	
	
	testReq3.department = department;
	
		testReq4.round = roundID;
	
		testReq4.id = "1236";
		testReq4.moduleCode = "COB126";
		testReq4.moduleTitle = "Test Module Title";
	
		testReq4.priority = false;
	
		testReq4.day = 2;
		testReq4.startPeriod = 3;
		testReq4.endPeriod = 7;
		testReq4.weeks = [false, false, false, true, false, true, false, true, true, true, true, true, false, true, false, false];
	
		testReq4.students = 100;
		testReq4.park = 0;
		testReq4.traditional = true;
		testReq4.sessionType = 2;
		testReq4.noOfRooms = 1;
		testReq4.rooms = ["N.0.01", "N.0.03"];
	
		testReq4.status = 1;
	
		testReq4.facilities = ["10102"];
		testReq4.otherReqs = "";
	
		testReq4.allocatedRooms = ["N.0.02"];
		
	requestArray[3] = testReq4;
	
	testReq4.round = roundID;
	
		testReq5.id = "1236";
		testReq5.moduleCode = "COB123";
		testReq5.moduleTitle = "Test Module Title";
	
		testReq5.priority = false;
	
		testReq5.day = 2;
		testReq5.startPeriod = 2;
		testReq5.endPeriod = 4;
		testReq5.weeks = [false, false, false, true, false, true, false, true, true, true, true, true, false, true, false, false];
	
		testReq5.students = 100;
		testReq5.park = 0;
		testReq5.traditional = true;
		testReq5.sessionType = 2;
		testReq5.noOfRooms = 1;
		testReq5.rooms = ["N.0.01", "N.0.03"];
	
		testReq5.status = 1;
	
		testReq5.facilities = ["10102"];
		testReq5.otherReqs = "";
	
		testReq5.allocatedRooms = ["N.0.02"];
		
	requestArray[4] = testReq5;
	
}
 