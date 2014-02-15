$(document).ready(function() {
	alert("loaded");
    
    rangedSlider();
    facilityGenerator();
    rangedSlider(); 
    facilityGenerator();
    parkGenerator();
    weeksGenerator();
    
});


function weeksGenerator() {
                    var parentElement = document.getElementById("weeksCheckbox");
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
    testFacilities();
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

function periodsGenerator() {
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
}

function lengthGenerator() {
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
}

function isNumberKey(evt)  {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
}

function parkGenerator(){
var parentElement = document.getElementById("parkSelect");
var fullHTML ="";
var oldhtml = parentElement.innerHTML;
var newParkPreference = "";

    for (var i = 0; i < parksArray.length; i++) {
        newParkPreference += "<option ";
        newParkPreference += "id='" + parksArray[i] + "'>";
        newParkPreference += parksArray[i];
        newParkPreference += "</option>"; 
    }

    fullHTML += newParkPreference;
    $("#parkSelect").html("fullHTML");
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
function rangedSlider() {
    var periodSelect = document.getElementById('periodSelect');
    var lengthSelect = document.getElementById('lengthSelect');
    $( "#slider-range" ).slider({
        range: true,
        min: 1,
        max: 10,
        values: [ periodSelect.value, lengthSelect.value ],
        slide: function( event, ui ) {
            $( "#amount" ).val(  + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
        });
        $( "#amount" ).val( + $( "#slider-range" ).slider( "values", 0 ) +
        " - " + $( "#slider-range" ).slider( "values", 1 ) );
}