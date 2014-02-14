var liveSettingsRadio = [];

function settingsRadioToggle(btn, position){

	if(liveSettingsRadio[position] == btn){
				
		btn.checked = false;
		liveSettingsRadio[position] = null;
		
	}
	else liveSettingsRadio[position] = btn;
	
	
}

function changePassword() {
	
	var oldpassword = $("#oldpassword").val();
	var newpassword = $("#newpassword").val();
	var confirmnewpassword = $("#confirmnewpassword").val();
	
	if (newpassword != confirmnewpassword) alert("Error: New Password not the same");
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