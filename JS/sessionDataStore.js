var currentSessionID = "";


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


function loadSession() {
	
	currentSessionID = document.location.href.match(/PHPSESSID=[^;]+/);
	
	$.ajax({
		url: "PHP/loadSessionData.php?" +currentSessionID,
		type: "GET",
		datatype: "json",
		data: {},
		success: function(results) {
			sessionDataSetup(results);
		}
	});
	
};

function sessionDataSetup(sessData) {
	
	sessionData = JSON.parse(sessData);
	
	department = sessionData.Department;
	
	if(sessionData.LiveSemester.length != 0) {
		
		liveSemesterID = sessionData.LiveSemester[0].id;
		
		liveSemester = sessionData.LiveSemester[0].semesterNumber;
		
		liveYear = sessionData.LiveSemester[0].year;
		
		numberOfWeeks = sessionData.LiveSemester[0].numberOfWeeks;
		
		
		roundID = sessionData.LiveRound[0].id;
		
		roundNumber = sessionData.LiveRound[0].roundNo;
		
		roundStart = datetimeStringConverter(sessionData.LiveRound[0].start);
		
		roundEnd = datetimeStringConverter(sessionData.LiveRound[0].end);
		
	}
	
	
	if(sessionData.AdHocSemester.length != 0) {
				
		adHocSemesterID = sessionData.AdHocSemester[0].id;
		
		adHocSemester = sessionData.AdHocSemester[0].semesterNumber;
		
		adHocYear = sessionData.AdHocSemester[0].year;
		
		adHocNumberOfWeeks = sessionData.AdHocSemester[0].numberOfWeeks;
		
		
		adHocRoundID = sessionData.AdHocRound[0].id;
				
		adHocStart = datetimeStringConverter(sessionData.AdHocRound[0].start);
		
		adHocEnd = datetimeStringConverter(sessionData.AdHocRound[0].end);
		
	}
	
	loadFacilities(sessionData.AllFacilities);
	
	getCurrentRoundPercentage();
	
	/*
	alert(department);
	
	alert("Live Semester");
	alert( liveSemesterID);
	
	alert(liveSemester);
	
	alert(liveYear);
	
	alert(numberOfWeeks);
	
	alert("Live Round");
	alert(roundID);
		
	alert(roundNumber);
		
	alert(roundStart);
		
	alert(roundEnd);
	
	
	alert("Ad Hoc Semester");
	alert(adHocSemesterID);
	
	alert(adHocSemester);
	
	alert(adHocYear);
	
	alert(adHocNumberOfWeeks);
	
	alert("Ad Hoc Round");
	alert(adHocRoundID);
			
	alert(adHocStart);
		
	alert(adHocEnd);
	*/

}

function getCurrentRoundPercentage(){
	
	var currentDate = new Date();
	
	var percentage = (currentDate.getTime() - roundStart.getTime()) / (roundEnd.getTime() - roundStart.getTime());
	
	alert(percentage);
}


var requestArray = [];


function setupSessionData(){
	
	testFacilities();
	testRequestList();
	
}

function testFacilities() {
	
	var facility1 = new Facility();
	facility1.id = "10100";
	facility1.name = "Whiteboard";
	
	var facility2 = new Facility();
	facility2.id = "10101";
	facility2.name = "Data Projector";
	
	var facility3 = new Facility();
	facility3.id = "10102";
	facility3.name = "OHP";
	
	facilitiesArray.push(facility1);
	facilitiesArray.push(facility2);
	facilitiesArray.push(facility3);
	
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
 