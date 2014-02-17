var liveSettingsRadio = [];

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
	var chosenRoom = $( "#room_insert_roomcode" ).val();
	var buildingCode = "";
	var roomType = Room.code(chosenRoom).type;
	var roomCapacity = Room.code(chosenRoom).capacity;
	
	for (var i = 0; i < buildingsData.length; i++) {
		for(var j = 0; j < buildingsData.length; j++)
		if(buildingsData[i].rooms[j] == chosenRoom){
			buildingCode = buildingsData[i].code;
		}
	}
	
	$( "#room_insert_buildingcode" ).html(buildingCode);
	$( "#room_insert_roomtype" ).html(roomType);
	$( "#room_insert_roomcapacity" ).html(roomCapacity);

}