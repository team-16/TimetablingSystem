var buildingsData = [];

$(document).ready(function() {
    buildingsData = getAllRoomsAndBuildings();
    moduleTitleGenerator();
    facilityGenerator();
    parkGenerator();
    weeksGenerator();
    buildingsGenerator();
    roomsGenerator();
    rangedSlider();
    daysGenerator();
});
    

function buildingsGenerator(){

    var fullHTML = "<select id ='buildings'>";
    var buildings = "";
    for (var i = 0; i < buildingsData.length; i++) {
        buildings += "<option id='" + buildingsData[i].name + "' onclick='roomsGenerator();'>";
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
        rooms += "<option id ='" + roomsArray[i].code + "' value ='" + roomsArray.code + "' >";
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
                    //var parentElement = document.getElementById("weeksCheckbox");
                    var fullHTML1 = "";
                    //var originalhtml = parentElement.innerHTML;
                    for(var i=1; i <= numberOfWeeks; i++)
                    {
                        var newCheckBox = "<input ";
                        newCheckBox += "type='checkbox' ";
                        //alert("2");
                        newCheckBox += "id='week " + i + "' ";
                        if (i<=12) {
                          newCheckBox += "checked";  
                        };
                        //alert("3");
                        newCheckBox += "/>" + (i);

                        fullHTML1 += newCheckBox;

                        //alert("4");
                    }
                    fullHTML1 += "<br>";
                    $("#weeksCheckbox").html(fullHTML1);
                    //alert("5");
            }

function facilityGenerator() {
    var parentElement = document.getElementById("roomFacilities");
    var fullHTML ="";
    //var oldhtml= parentElement.innerHTML;
    for (var i = 0; i < facilitiesArray.length; i++) {
        var newfacility = "<input ";
            newfacility += "type='checkbox'";
            newfacility += "id = '" + facilitiesArray[i].id + " ' ";
            newfacility += "/> " + facilitiesArray[i].name;
            fullHTML += newfacility;
    }
    $("#roomFacilities").html(fullHTML);
}

function select12(){
    for (var i = 1; i <= 12; i++) {
        var checkbox = document.getElementById("week " + i);
       if(true) checkbox.checked = true;
    }
    for(var i = 13; i <=15; i++){
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

    for (var i = 1; i <= numberOfWeeks; i++) {
    	
    	var checkbox = document.getElementById("week " + i);
    	
        if (checkAll) checkbox.checked = true;
        else checkbox.checked = false;
        
    }   
}

/*function periodsGenerator() {
    var parentElement = document.getElementById("time");
    var fullHTML = "";
    //var oldhtml = parentElement.innerHTML;
    var newPeriodsList = "<select> ";
    for (var i = 0; i < startPeriodsArray.length; i++) {
        newPeriodsList += "<option ";
        newPeriodsList += "id ='period '" + i +  ">";
        newPeriodsList += startPeriodsArray[i] + ", " + startPeriodTimesArray[i];
        newPeriodsList += "</option>";
    }
    fullHTML += newPeriodsList;
    fullHTML += "</select>";
    $("#time").html(fullHTML);
}*/

/*function lengthGenerator() {
    var parentElement = document.getElementById("time");
    var fullHTML = "";
    //var oldhtml = parentElement.innerHTML;
    var newLengthList = "<select>";
    for (var i = 0; i < endPeriodsArray.length; i++) {
        newLengthList += "<option ";
        newLengthList += "id='length " + i + "'>";
        newLengthList += endPeriodsArray[i];
        newLengthList += "</option>";
    }
    fullHTML += newLengthList;
    fullHTML += "</select>";
    fullHTML += "<br>";
    $("#")
}*/

function isNumberKey(evt)  {
         var charCode = (evt.which) ? evt.which : event.keyCode;
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

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
//function chosenRoomsListGenerator() {
//    var chosenRoom = document.getElementById("rooms");
//    var chosenRoomField = document.getElementById("chosenRooms");
//    if(true) {
//        chosenRoomField += "<option> " + chosenRoom.value + "</option>";
//    }
//}
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
	var newOption = document.createElement("option");
	newOption.value = optionValue;
	newOption.text = optionDisplayText;
	
	var check = 0;
	for(i = 0; i < document.getElementById("cRoomsList").length; i++){
		var sel = document.getElementById('cRoomsList');
		if (sel.options[i].text == document.getElementById('rooms').options[document.getElementById('rooms').options.selectedIndex].text) {
			check = 1;
		}
	}
	
	if(check == 0){ /*&& document.getElementById("cRoomsList").length < document.getElementById("roomsInput").value*/
		cRoomsList.add(newOption, null);
		return true;
	}
	
	else{
	//	alert("Number of room preferences is limited to the number of rooms you have chosen. Please change the number of rooms or remove an existing room preference.");
		return false;
	}
}

//function noRoomsVsRoomPref(){

//	if(document.getElementById("cRoomsList").length <= document.getElementById("roomsInput").value){
//		return true;
//	}
	
//	else{
//		alert("Number of room preferences is limited to the number of rooms you have chosen. Please change the number of rooms or remove an existing room preference.");
//		return false;
//	}

//}

function removeRoomFromPref(){
	cRoomsList.remove(cRoomsList.options.selectedIndex);
	return true;
}
function traditionalSeminarTruthValue(){
   var traditionalValue = document.getElementById("traditionalSeminarSelect").value;
   if(traditionalValue == "Traditional"){
    return true
   }else return false;
}
function roomCodeGather(){
    var roomsChosen = document.getElementById('cRoomsList');
    var roomsChosenArray = [];
    for (var i = 0; i < roomsChosen.length; i++) {
        roomsChosenArray.push(roomsChosen[i].text);
    }
    return roomsChosenArray;
}
function insertRequest(){
	
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
	//var roomCodeVal = "JJ.0.04";
	var roomCodeVal = roomCodeGather();
	var otherRequirementsVal = document.getElementById("otherRequirementsTextArea").value ;
	var roundIDVal = roundID ;
	
	//alert(roomCodeGather());
	
	if(roomCodeVal.length == 0){ //if no room preferences
			$.ajax({
				url: "addingrequest.php?" +currentSessionID,
				type: "POST",
				async: false,
				data: { moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
					endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
					traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:"", 
					otherRequirements:otherRequirementsVal, roundID:roundIDVal },
				success: function(results) {
					alert(results);
				}
			});	
	}
	else{ //if multiple room preferences
		for(var i = 0; i < roomCodeVal.length; i++){
				$.ajax({
					url: "addingrequest.php?" +currentSessionID,
					type: "POST",
					async: false,
					data: { moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
						endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
						traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:roomCodeVal[i], 
						otherRequirements:otherRequirementsVal, roundID:roundIDVal },
					success: function(results) {
						alert(results);
					}
				});
		}
	}
	
	$.ajax({
			url: "addingrequest2.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: { },
			success: function(results) {
				alert(results);
				$('#requests').click();
			}
	});
	
	/*alert(moduleCodeVal);
	alert(priorityVal);
	alert(dayVal);
	
	alert(startPeriodVal);
	alert(endPeriodVal);
	alert(weeksVal);
	alert(noOfStudentsVal);
	alert(parkPreferenceVal);
	alert(traditionalVal);
	alert(sessionTypeVal);
	alert(noOfRoomsVal);
	alert(roomCodeVal);
	alert(otherRequirementsVal);
	alert(roundIDVal);*/

	/*$.ajax({
		url: "addingrequest.php?" +currentSessionID,
		type: "POST",
		async: false,
		data: { moduleCode:moduleCodeVal, priority:priorityVal, day:dayVal, startPeriod:startPeriodVal, 
				endPeriod:endPeriodVal, weeks:weeksVal, noOfStudents:noOfStudentsVal, parkPreference:parkPreferenceVal,
				traditional:traditionalVal, sessionType:sessionTypeVal, noOfRooms:noOfRoomsVal, roomCode:roomCodeVal, 
				otherRequirements:otherRequirementsVal, roundID:roundIDVal },
		success: function(results) {
			alert(results);
		}
	});*/
	
	
	
	/*
	var fullHTML = '<form id="autoForm" method="post" action="addingrequest.php">';
		fullHTML +='<input type="hidden" name="moduleCode" value=document.getElementById("moduleCodeSelect").value>';
		fullHTML += '<input type="hidden" name="priority" value=document.getElementById("priority").value>';
		fullHTML += '<input type="hidden" name="day" value=document.getElementById("daySelect").value>';
		fullHTML += '<input type="hidden" name="startPeriod" value=document.getElementById("startPeriod").value>';
		fullHTML += '<input type="hidden" name="endPeriod" value=document.getElementById("endPeriod").value>';
		fullHTML += '<input type="hidden" name="weeks" value=getRequestValues()>';
		fullHTML += '<input type="hidden" name="noOfStudents" value=document.getElementById("studentsInput").value>';
		fullHTML += '<input type="hidden" name="parkPreference" value=document.getElementById("parkSelect").value>';
		fullHTML += '<input type="hidden" name="traditional" value=document.getElementById("traditionalSeminarSelect").value>';
		fullHTML += '<input type="hidden" name="sessionType" value=document.getElementById("sessionTypeSelect").value>';
		fullHTML += '<input type="hidden" name="noOfRooms" value=document.getElementById("noOfRooms").value>';
		//Needs changing to be dynamic;
		fullHTML += '<input type="hidden" name="roomCode" value="JJ.0.04">';
		fullHTML += '<input type="hidden" name="otherRequirements" value=document.getElementById("otherRequirementsTextArea").value>';
		fullHTML += '<input type="hidden" name="roundID" value=roundID>';
		fullHTML += '<input type="hidden" name="status" value="">';
		
		fullHTML += '<input type="submit">';
	fullHTML += '</form>';
	
	fullHTML += '<script type="text/javascript">';
		fullHTML += 'document.getElementById("autoForm").submit();';
	fullHTML += '</script>';
	
	$( "#submitForm" ).html(fullHTML);
	*/

}

/*function boink(){

	alert(document.getElementById("startPeriod").value);

}*/

function getRequestValues(){
    var weeksValues = [];
    for (var i = 1; i <= numberOfWeeks; i++) {
		
		var weekState = document.getElementById("week " + i).checked;
		
		if(weekState) weeksValues.push(true);
		else weeksValues.push(false);
       
    }
    
   return weeksValues;
}