var liveSettingsRadio = [];

function settingsRadioToggle(btn, position){

	if(liveSettingsRadio[position] == btn){
		
		//btn.parentNode.parentNode.style.borderBottom = "1px solid black";
		
		btn.checked = false;
		liveSettingsRadio[position] = null;
		
	}
	else {
		
		btn.parentNode.parentNode.style.borderBottom = "none";
		
		//if (liveSettingsRadio[position] != null) liveSettingsRadio[position].parentNode.parentNode.style.borderBottom = "1px solid black";
		
		liveSettingsRadio[position] = btn;
		
	}
	
}

var liveSettingsContent = [];

function showSettingsContent(btn, contentID, position) {
	
	if(btn.checked) {
		
		if(liveSettingsContent[position] != contentID){
			
			if(liveSettingsContent[position] != null) {
				
				document.getElementById(liveSettingsContent[position]).style.maxHeight = "0px";
				document.getElementById(liveSettingsContent[position]).style.borderLeft = "none";
				document.getElementById(liveSettingsContent[position]).style.borderRight = "none";
				document.getElementById(liveSettingsContent[position]).style.borderBottom = "none";
			
			}
			
			document.getElementById(contentID).style.maxHeight = "300px";
			document.getElementById(contentID).style.borderLeft = "1px solid black";
			document.getElementById(contentID).style.borderRight = "1px solid black";
			document.getElementById(contentID).style.borderBottom = "1px solid black";
						
			liveSettingsContent[position] = contentID;
			
		}
		
	}
	else {
		
		document.getElementById(contentID).style.maxHeight = "0px";
		document.getElementById(contentID).style.borderLeft = "none";
		document.getElementById(contentID).style.borderRight = "none";
		document.getElementById(contentID).style.borderBottom = "none";
		
		liveSettingsContent[position] = null;
		
	}

}