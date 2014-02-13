function sessionDataSetup(sessData) {
	
	sessionData = JSON.parse(sessData);
	
	department = sessionData.Department;
	
	liveSemesterID = sessionData.LiveSemester[0].id;
	
	liveSemester = sessionData.LiveSemester[0].semesterNumber;
	
	liveYear = sessionData.LiveSemester[0].year;
	
	numberOfWeeks = sessionData.LiveSemester[0].numberOfWeeks;
	
	/*
	
	department = "";


	roundID = "";
	
	roundNumber = 1;
	
	roundStart = new Date();
	
	roundEnd = new Date();
	
	liveSemesterID = "";
	
	liveSemester = 1;
	
	liveYear = 0;
	
	numberOfWeeks = 15;
	
	
	adHocRoundID = "";
	
	adHocStart = new Date();
	
	adHocEnd = new Date();
	
	adHocSemesterID = "";
	
	adHocSemester = 1;
	
	adHocYear = 0;
	
	adHocNumberOfWeeks = 1;
	*/
	
	alert(department);
	
	alert(liveSemesterID);
	
	alert(liveSemester);
	
	alert(liveYear);
	
	alert(numberOfWeeks);

}


function getModules(results) {
	
	
	
}