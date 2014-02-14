function sessionDataSetup(sessData) {
	
	sessionData = JSON.parse(sessData);
	
	department = sessionData.Department;
	
	if(sessionData.LiveSemester.length != 0) {
		
		liveSemesterID = sessionData.LiveSemester[0].id;
		
		liveSemester = sessionData.LiveSemester[0].semesterNumber;
		
		liveYear = sessionData.LiveSemester[0].year;
		
		numberOfWeeks = sessionData.LiveSemester[0].numberOfWeeks;
		
	}
	
	alert(sessionData.AdHocSemester[0]);
	
	/*
	if(sessionData.AdHocSemester.length != 0) {
		
		adHocSemesterID = sessionData.LiveSemester[0].id;
		
		adHocSemester = sessionData.LiveSemester[0].semesterNumber;
		
		adHocYear = sessionData.LiveSemester[0].year;
		
		adHocNumberOfWeeks = sessionData.LiveSemester[0].numberOfWeeks;
		
	}
	*/
	
	/*
	

	roundID = "";
	
	roundNumber = 1;
	
	roundStart = new Date();
	
	roundEnd = new Date();
	
	
	
	adHocRoundID = "";
	
	adHocStart = new Date();
	
	adHocEnd = new Date();
	
	
	*/
	
	alert(department);
	
	
	alert(liveSemesterID);
	
	alert(liveSemester);
	
	alert(liveYear);
	
	alert(numberOfWeeks);
	
	
	alert(adHocSemesterID);
	
	alert(adHocSemester);
	
	alert(adHocYear);
	
	alert(adHocNumberOfWeeks);

}


function getModules(results) {
	
	
	
}