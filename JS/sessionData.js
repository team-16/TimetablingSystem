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


var facilitesArray = [];


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
	
	testFacilites();
	testRequestList();
	
}

function testFacilites() {
	
	facilitesArray[0] = new Facility();
	facilitesArray[0].id = "10100";
	facilitesArray[0].name = "Whiteboard";
	
	facilitesArray[1] = new Facility();
	facilitesArray[1].id = "10101";
	facilitesArray[1].name = "Data Projector";
	
	facilitesArray[2] = new Facility();
	facilitesArray[2].id = "10102";
	facilitesArray[2].name = "OHP";
	
	
}
 
function testRequestList() {
	
	var testReq = new Request();
	
	testReq.department = department;
	
	testReq.round = roundID;
	
	testReq.id = "1234";
	testReq.moduleCode = "COB123";
	testReq.moduleTitle = "Test Module Title";
	
	testReq.priority = true;
	
	testReq.day = 2;
	testReq.startPeriod = 2;
	testReq.endPeriod = 2;
	testReq.weeks = "1111111111110000";
	
	testReq.students = 100;
	testReq.park = 0;
	testReq.traditional = true;
	testReq.sessionType = 0;
	testReq.noOfRooms = 1;
	testReq.rooms = ["J.0.01", "J.0.02"];
	
	testReq.status = null;
	
	testReq.facilities = ["10100", "10101"];
	testReq.otherReqs = "";
	
	testReq.allocatedRooms = ["J.0.02"];
	
	
	requestArray[0] = testReq;
	
	requestArray[1] = testReq;
		requestArray[1].id = "1235";
		requestArray[1].day = 3;
		requestArray[1].startPeriod = 7;
		requestArray[1].endPeriod = 8;
		requestArray[1].traditional = true;
		requestArray[1].sessionType = 2;
		requestArray[1].rooms = ["N.0.01", "N.0.03"];
		requestArray[1].facilities = [];
		requestArray[1].allocatedRooms = ["N.0.01"];
}
 