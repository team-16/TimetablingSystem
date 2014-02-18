var liveSettingsRadio = [];
var buildingsData = [];

$(document).ready(function loadPage() {
    buildingsData = getAllRoomsAndBuildings();
    roomsGenerator();
});

function roomsGenerator(){
    
   // var chosenBuilding = document.getElementById("buildings").selectedIndex;  // Needs updating, JBizzle
    var fullHTML = "<select id='room_insert_roomcode2' onchange='autopopulateRoomDetails();'>";
    var rooms = "";
    
    var roomsArray = []; //buildingsData[chosenBuilding].rooms; // This needs updating too, JBizzle2DaNizzleFoShizzleWivABitOfDrizzle
    
    for (var bCounter = 0; bCounter < buildingsData.length; bCounter++) {
    	
    	var currentRoomsArray = buildingsData[bCounter].rooms;
    	
    	for (var rCounter = 0; rCounter < currentRoomsArray.length; rCounter++) {
    		
    		roomsArray.push(currentRoomsArray[rCounter]);
    		
   		}
   		
    }
    
    for (var i = 0; i < roomsArray.length; i++) {
    	
        rooms += "<option id ='" + roomsArray[i].code + "' value ='" + roomsArray[i].code + "' >";
        rooms += roomsArray[i].code  + "</option>";
		
    }
    
    fullHTML += rooms;
    fullHTML += "</select>";
    $( "#roomDropdownTd" ).html(fullHTML);
    
}



function settingsRadioToggle(btn, position){

	if(liveSettingsRadio[position] == btn){
				
		btn.checked = false;
		liveSettingsRadio[position] = null;
		
	}
	else{ liveSettingsRadio[position] = btn;}
	
	
}

function changePassword() {
	
	var oldpassword = $("#oldpassword").val();
	var newpassword = $("#newpassword").val();
	var confirmnewpassword = $("#confirmnewpassword").val();
	
	if (newpassword != confirmnewpassword){ alert("Error: New Password not the same");}
	else {
		
		$.ajax({
			url: "changingpassword.php?" +currentSessionID,
			type: "POST",
			data: { username:department, password:oldpassword, newPassword:newpassword },
			success: function(results) {
				alert(results);
			}
		});
		
	}
	
	$("#oldpassword").val("");
	$("#newpassword").val("");
	$("#confirmnewpassword").val("");
	
}

function editRoom() {

	var Code = $("#room_insert_roomcode2").val();
	var BuildingCode = $("#room_insert_buildingcode2").val();
	var Type = $("#room_insert_roomtype2").val();
	var Capacity = $("#room_insert_roomcapacity2").val();
	
		$.ajax({
			url: "editroom.php?" +currentSessionID,
			type: "POST",
			data: { Code:Code, BuildingCode:BuildingCode, Type:Type, Capacity:Capacity },
			success: function(results) {
				alert(results);
			}
		});

}

function insertModule() {
	
	var modulecode = $("#modulecode").val();
	var deptcode = $("#deptcode").val();
	var moduletitle = $("#moduletitle").val();
	
		$.ajax({
			url: "insertmodule.php?" +currentSessionID,
			type: "POST",
			data: { modulecode:modulecode, deptcode:deptcode, moduletitle:moduletitle },
			success: function(results) {
				alert(results);
			}
		});
	
	$("#oldpassword").val("");
	$("#newpassword").val("");
	$("#confirmnewpassword").val("");
	
}
function autopopulateRoomDetails() {
	
	var buildingsData = getAllRoomsAndBuildings();
	
	var chosenRoom = document.getElementById("room_insert_roomcode2").options[document.getElementById("room_insert_roomcode2").selectedIndex].value;
	//alert(chosenRoom);
	var buildingCode = "";
	var roomType = null;
	var roomCapacity = null;
	
	for (var i = 0; i < buildingsData.length; i++) {
		for(var j = 0; j < buildingsData[i].rooms.length; j++)
		if(buildingsData[i].rooms[j].code == chosenRoom){
			buildingCode = buildingsData[i].code;
			roomType = buildingsData[i].rooms[j].type;
			roomCapacity = buildingsData[i].rooms[j].capacity;
		}
	}
	
	$( "#room_insert_buildingcode2" ).val(buildingCode);
	$( "#room_insert_roomtype2" ).val(roomType);
	$( "#room_insert_roomcapacity2" ).val(roomCapacity);

}