var buildingsData = [];
var amountOfWeeks = numberOfWeeks;
var userRoundID = roundID;

var preFillRequest = null;
var editCurrentRequest = false;

$(document).ready(function loadPage() {
	
    buildingsData = getAllRoomsAndBuildings();
    
    moduleTitleGenerator();
    facilityGenerator();
    parkGenerator();
    weeksGenerator();
    buildingsGenerator();
    roomsGenerator();
    rangedSlider();
    daysGenerator();
        
    if(duplicateRequestFlag || editRequestFlag) prefillPage();
    
});

function normalMode(){
    
    if(true) {
        amountOfWeeks = numberOfWeeks;
        userRoundID = roundID;
    }
    
    weeksGenerator();
    
}
    
function adhocMode(){
    if(true) {
        amountOfWeeks = adHocNumberOfWeeks;
        userRoundID = adHocRoundID;
    }
    weeksGenerator();

}

function buildingsGenerator(){

    var fullHTML = "<select id ='buildings' onchange='roomsGenerator();'>";
    var buildings = "";
    for (var i = 0; i < buildingsData.length; i++) {
        buildings += "<option id='" + buildingsData[i].name + "'>";
        buildings += buildingsData[i].code + ", " + buildingsData[i].name + "</option>";
       
    };
        fullHTML += buildings;
        fullHTML += "</select>";
        $( "#buildingPreference" ).html(fullHTML);
}

function roomsGenerator(){
    
    var chosenBuilding = document.getElementById("buildings").selectedIndex;  
    var fullHTML ="<select size = '5' id='rooms'>";
    var rooms = "";
    
    var roomsArray = buildingsData[chosenBuilding].rooms;
    
    for (var i = 0; i < roomsArray.length; i++) {
        rooms += "<option id ='" + roomsArray[i].code + "' value ='" + roomsArray[i].code + "' >";
        rooms += roomsArray[i].code  + "</option>";
		
    };
    fullHTML += rooms;
    fullHTML += "</select>";
    $( "#roomPreference" ).html(fullHTML);
    
}

function moduleTitleGenerator(){
    
    $("#moduleTitleOutput").html(moduleArray[document.getElementById("moduleCodeSelect").selectedIndex]["title"]);
    
}

function weeksGenerator() {
		
		var fullHTML1 = "";
		
		for(var i=1; i <= amountOfWeeks; i++)
		{
			var newCheckBox = "<input ";
			newCheckBox += "type='checkbox' ";
			
			newCheckBox += "id='week " + i + "' ";
			if (i<=12) {
			  newCheckBox += "checked";  
			}
			
			newCheckBox += "/>" + (i);

			fullHTML1 += newCheckBox;
			
		}
		
		fullHTML1 += "<br>";
		
		$("#weeksCheckbox").html(fullHTML1);
		
}

/*function facilityGenerator() {
   
    var parentElement = document.getElementById("roomFacilities");
    var fullHTML ="";
    
    for (var i = 0; i < facilitiesArray.length; i++) {
        var newfacility = "<input ";
            newfacility += "type='checkbox'";
            newfacility += "id = '" + facilitiesArray[i].id + "' ";
            newfacility += "/> " + facilitiesArray[i].name;
            fullHTML += newfacility;
    }
    
    $("#roomFacilities").html(fullHTML);
    
}*/
function facilityGenerator() {
   
    var fullHTML ="<table> <tr>";
	var count = 0;
    
    for (var i = 0; i < facilitiesArray.length; i++) {
		if(count == 5){
			fullHTML += "</tr><tr>";
			count = 0;
		}
         fullHTML += "<td><input ";
            fullHTML += "type='checkbox'";
            fullHTML += " id = '" + facilitiesArray[i].id + "' ";
            fullHTML += "/> " + facilitiesArray[i].name + "</td>";
			count++;
    }
	
	fullHTML += "</tr></table>";
	alert(fullHTML);
    
    $("#roomFacilities").html(fullHTML);
    
}
function select12(){
    
    for (var i = 1; i <= regularWeeks; i++) {
        var checkbox = document.getElementById("week " + i);
       if(true) checkbox.checked = true;
    }
    
    for(var i = (regularWeeks + 1); i <= amountOfWeeks; i++){
        var checkbox = document.getElementById("week " + i);
        if (true) checkbox.checked = false;
    }
    
}

function selectOdd(){
    
    selectDeselectAll(false);
    
    for (var i = 1; i <= regularWeeks; i+=2) {
        var checkbox = document.getElementById("week " + i);
        if (true) checkbox.checked = true;
    }
    
}

function selectEven(){
	
	selectDeselectAll(false);
    
    for (var i = 2; i <= regularWeeks; i+=2) {
        var checkbox = document.getElementById("week " + i);
        if (true) checkbox.checked = true;
    }
    
}

function selectDeselectAll(checkAll) {

    for (var i = 1; i <= amountOfWeeks; i++) {
    	
    	var checkbox = document.getElementById("week " + i);
    	
        if (checkAll) checkbox.checked = true;
        else checkbox.checked = false;
        
    } 
      
}


function isNumberKey(evt)  {
	
	var charCode = (evt.which) ? evt.which : event.keyCode;
	
	if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;

	return true;
	
}

function parkGenerator(){

	var fullHTML ="";
	var newParkPreference = "<select id='parkSelect' name ='parkSelect'>";

    for (var i = 0; i < parksArray.length; i++) {
        newParkPreference += "<option ";
        newParkPreference += "id='" + parksArray[i] + "'>";
        newParkPreference += parksArray[i];
        newParkPreference += "</option>"; 
    }
    
    newParkPreference += "</select>";
    fullHTML += newParkPreference;
    $("#parkPreference").html(fullHTML);
    
}

function plsNoZero() {
	
	var input = document.getElementById("studentsInput").value.charAt(0);
	if (input == "0") document.getElementById("studentsInput").value = "1";
	
}

function maxValue(){
    var value = document.getElementById("studentsInput").value;
    if(value > 500) {document.getElementById("studentsInput").value ="1"};
}

function onKeyUpCheck(){
	
	plsNoZero();    
    maxValue();
    
}

function maxValueNumRooms(){
	
    var value = document.getElementById("roomsInput").value;
    if(value > 5) {document.getElementById("roomsInput").value ="1"};
    
}

function onKeyUpCheckNumRooms(){

    plsNoZero();    
    maxValueNumRooms();
    
}

function rangedSlider() {
	
	$( "#slider-range" ).slider({
		
        range: true,
        min: 1,
        max: 10,
        values: [ 1, 2 ],
        slide: function( event, ui ) {
            if(ui.values[1] == ui.values[0]) return false;
            $( "#amount" ).val(  + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            $( "#startPeriod" ).val( + ui.values[ 0 ] );
            $( "#endPeriod" ).val( + ui.values[ 1 ] );
        }

    });
	
	$( "#amount" ).val( + $( "#slider-range" ).slider( "values", 0 ) +
	" - " + $( "#slider-range" ).slider( "values", 1 ) );
	$( "#startPeriod" ).val(+ $("#slider-range").slider("values", 0) );
	$( "#endPeriod" ).val(+ $("#slider-range").slider("values", 1) );
	
}

function daysGenerator(){
    
    var daysList="<select id='daySelect'>";
    
    for (var i = 0; i < daysArray.length; i++) {
        daysList += "<option id='" + daysArray[i] + "'>";
        daysList += daysArray[i];
        daysList += "</option>";
    }
    
    daysList += "</select>";
    
    $( "#day" ).html(daysList);
}
	
function addRoomToPref(optionValue,optionDisplayText){
	/*
	var newOption = document.createElement("option");
	newOption.value = optionValue;
	newOption.text = optionDisplayText;
	*/
	var check = true;
	for(i = 0; i < document.getElementById("cRoomsList").length; i++){
		var sel = document.getElementById('cRoomsList');
		if (sel.options[i].text == document.getElementById('rooms').options[document.getElementById('rooms').options.selectedIndex].text) {
			check = false;
		}
	}
	
	if(check){ /*&& document.getElementById("cRoomsList").length < document.getElementById("roomsInput").value*/
		//cRoomsList.add(newOption, null);
		$("#cRoomsList").append("<option value='" + optionValue + "'>" + optionDisplayText + "</options>");
		return true;
	}
	
	else{
	//	alert("Number of room preferences is limited to the number of rooms you have chosen. Please change the number of rooms or remove an existing room preference.");
		return false;
	}
	
}


function removeRoomFromPref(){
	
	document.getElementById("cRoomsList").remove(document.getElementById("cRoomsList").selectedIndex);
	
	return true;
	
}

function traditionalSeminarTruthValue(){
   
   var traditionalValue = document.getElementById("traditionalSeminarSelect").value;
   
   if(traditionalValue == "Traditional") return true;
   else return false;
   
}

function roomCodeGather(){

    var roomsChosen = document.getElementById('cRoomsList');
    var roomsChosenArray = [];
    
    for (var i = 0; i < roomsChosen.length; i++) {
        roomsChosenArray.push(roomsChosen[i].text);
    }
    
    return roomsChosenArray;
    
}

function facilityIDGather(){

	var facilityID = [];

	$("#roomFacilities :checked").each(function() {

		facilityID.push(Number(this.id));

	});
	
	return facilityID;


}

function submitRequest(){
	
	if(editCurrentRequest) updateRequest();
	else insertRequest();
		
}

function insertRequest(){
	
	var moduleCodeVal = moduleArray[document.getElementById("moduleCodeSelect").selectedIndex]["code"];
	var priorityVal = document.getElementById("priority").checked;
	var dayVal = document.getElementById("daySelect").selectedIndex;
	var startPeriodVal = (document.getElementById("startPeriod").value) - 1;
	var endPeriodVal = (document.getElementById("endPeriod").value) - 2;
	var weeksVal = weeksEncoder(getRequestValues());
	var noOfStudentsVal = document.getElementById("studentsInput").value;
	var parkPreferenceVal = document.getElementById("parkSelect").selectedIndex;
	var traditionalVal = traditionalSeminarTruthValue();
	var sessionTypeVal = document.getElementById("sessionTypeSelect").selectedIndex;
	var noOfRoomsVal = document.getElementById("roomsInput").value;
	var roomCodeVal = roomCodeGather();
	var otherRequirementsVal = document.getElementById("otherRequirementsTextArea").value ;
	var roundIDVal = userRoundID ;
	var facilityIDVal = JSON.stringify(facilityIDGather());
	
	//alert(facilityIDVal);
	//if no room preferences
	if(roomCodeVal.length == 0){ 
			$.ajax({
				url: "addingrequest.php?" +currentSessionID,
				type: "POST",
				async: false,
				data: { moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
					endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
					traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:"", 
					otherRequirements:otherRequirementsVal, roundID:roundIDVal, facilityID:facilityIDVal },
				success: function(results) {
					//alert(results);
				}
			});	
	}
	else {
		//if multiple room preferences
		for(var i = 0; i < roomCodeVal.length; i++){
			
			if(i == 0){
				$.ajax({
					url: "addingrequest.php?" +currentSessionID,
					type: "POST",
					async: false,
					data: { moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
						endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
						traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:roomCodeVal[i], 
						otherRequirements:otherRequirementsVal, roundID:roundIDVal, facilityID:facilityIDVal },
					success: function(results) {
						//alert(results);
					}
				});
			}
			
			else{
				$.ajax({
					url: "addingrequest.php?" +currentSessionID,
					type: "POST",
					async: false,
					data: { moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
						endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
						traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:roomCodeVal[i], 
						otherRequirements:otherRequirementsVal, roundID:roundIDVal, facilityID:"" },
					success: function(results) {
						//alert(results);
					}
				});				
			
			}
		}
	}
	
	$.ajax({
			url: "addingrequest2.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: { },
			success: function(results) {
				alert(results);
			}
	});
	
	$("#viewRequests").click();

}

function updateRequest(){
	
	var moduleCodeVal = moduleArray[document.getElementById("moduleCodeSelect").selectedIndex]["code"];
	var priorityVal = document.getElementById("priority").checked;
	var dayVal = document.getElementById("daySelect").selectedIndex;
	var startPeriodVal = (document.getElementById("startPeriod").value) - 1;
	var endPeriodVal = (document.getElementById("endPeriod").value) - 1;
	var weeksVal = weeksEncoder(getRequestValues());
	var noOfStudentsVal = document.getElementById("studentsInput").value;
	var parkPreferenceVal = document.getElementById("parkSelect").selectedIndex;
	var traditionalVal = traditionalSeminarTruthValue();
	var sessionTypeVal = document.getElementById("sessionTypeSelect").selectedIndex;
	var noOfRoomsVal = document.getElementById("roomsInput").value;
	var roomCodeVal = roomCodeGather();
	var otherRequirementsVal = document.getElementById("otherRequirementsTextArea").value ;
	var roundIDVal = userRoundID ;
	var facilityIDVal = JSON.stringify(facilityIDGather());
	
	alert(facilityIDVal);
	//if no room preferences
	if(roomCodeVal.length == 0){ 
			$.ajax({
				url: "editingrequest.php?" + currentSessionID,
				type: "POST",
				async: false,
				data: { id:preFillRequest.id, moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
					endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
					traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:"", 
					otherRequirements:otherRequirementsVal, roundID:roundIDVal, facilityID:facilityIDVal },
				success: function(results) {
					alert(results);
				}
			});	
	}
	else {
		//if multiple room preferences
		for(var i = 0; i < roomCodeVal.length; i++){
			
			$.ajax({
				url: "editingrequest.php?" + currentSessionID,
				type: "POST",
				async: false,
				data: { id:preFillRequest.id, moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
					endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
					traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:roomCodeVal[i], 
					otherRequirements:otherRequirementsVal, roundID:roundIDVal, facilityID:facilityIDVal },
				success: function(results) {
					alert(results);
				}
			});
			
		}
	}
	
	$("#viewRequests").click();
	
}

function getRequestValues(){
    
    var weeksValues = [];
    
    for (var i = 1; i <= numberOfWeeks; i++) {
		
		var weekState = document.getElementById("week " + i).checked;
		
		if(weekState) weeksValues.push(true);
		else weeksValues.push(false);
       
    }
    
   return weeksValues;
   
}

function prefillPage(){
			
	preFillRequest = temporaryRequestStore;
	
	if(editRequestFlag) editCurrentRequest = true;
	
	duplicateRequestFlag = false;
	editRequestFlag = false;
	
	temporaryRequestStore = null;
	
    var index = null;
    
    for(var counter = 0; counter < moduleArray.length; counter++) {
    	
    	if(moduleArray[counter]["code"] == preFillRequest.moduleCode) index = counter;
    	
    }
        
    document.getElementById("moduleCodeSelect").selectedIndex = index;
    moduleTitleGenerator();
    
    document.getElementById("priority").checked = preFillRequest.priority;
    
    document.getElementById("daySelect").selectedIndex = preFillRequest.day;
    
	for(var i = 1; i <= amountOfWeeks; i++){
		
		var checkbox = document.getElementById("week " + i);
		
		if (preFillRequest.weeks[i-1] != null) checkbox.checked = preFillRequest.weeks[i-1];
		
    }
    
    $("#slider-range").slider("values", 0, startPeriodsArray[preFillRequest.startPeriod]);
    $("#startPeriod").val(startPeriodsArray[preFillRequest.startPeriod]);
    $("#slider-range").slider("values", 1, endPeriodsArray[preFillRequest.endPeriod]);
	$("#endPeriod").val(endPeriodsArray[preFillRequest.startPeriod]);
    
    $("#studentsInput").val(preFillRequest.students);
    
    if(editCurrentRequest) {
    	
    	document.getElementById("traditionalSeminarSelect").selectedIndex = + !preFillRequest.traditional;
	
		document.getElementById("sessionTypeSelect").selectedIndex = preFillRequest.sessionType;
	
		document.getElementById("parkSelect").selectedIndex = preFillRequest.park;
		
		var preFillRooms = preFillRequest.rooms;
	
		for(var i = 0; i < preFillRooms.length; i++){
		
			$("#cRoomsList").append("<option value='" + preFillRooms[i] + "'>" + preFillRooms[i] + "</options>");
				
		}
	
		$("#roomsInput").val(preFillRequest.noOfRooms);
	
	
		var preFillFacilities = preFillRequest.facilities;
	
		for(var i = 0; i < preFillFacilities.length; i++){
		
			 document.getElementById(preFillFacilities[i]).checked = true;
				
		}
	
		$("#otherRequirementsTextArea").val(preFillRequest.otherReqs);
    	
    	$("#submitBtn").val("Save Request Changes");
    }
    
}

