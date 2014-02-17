var liveSettingsRadio = [];
var buildingsData = [];

/*$(document).ready(function loadPage() {
    buildingsData = getAllRoomsAndBuildings();
    roomsGenerator();
});

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
    
}*/



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
	
	var chosenRoom = $( "#room_insert_roomcode2" ).val();
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