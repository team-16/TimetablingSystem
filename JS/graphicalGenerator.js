var liveRadio = [];

function radioToggle(btn, position){

	if(liveRadio[position] == btn){
		
		btn.parentNode.parentNode.style.borderBottom = "1px solid black";
		
		btn.checked = false;
		liveRadio[position] = null;
		
	}
	else {
		
		btn.parentNode.parentNode.style.borderBottom = "none";
		
		if (liveRadio[position] != null) liveRadio[position].parentNode.parentNode.style.borderBottom = "1px solid black";
		
		liveRadio[position] = btn;
		
	}
	
}

var liveContent = [];

function showContent(btn, contentID, position) {
	
	if(btn.checked) {
		
		if(liveContent[position] != contentID){
			
			if(liveContent[position] != null) {
				
				document.getElementById(liveContent[position]).style.height = "0px";
				document.getElementById(liveContent[position]).style.borderLeft = "none";
				document.getElementById(liveContent[position]).style.borderRight = "none";
				document.getElementById(liveContent[position]).style.borderBottom = "none";
			
			}
			
			document.getElementById(contentID).style.height = "100px";
			document.getElementById(contentID).style.borderLeft = "1px solid black";
			document.getElementById(contentID).style.borderRight = "1px solid black";
			document.getElementById(contentID).style.borderBottom = "1px solid black";
						
			liveContent[position] = contentID;
			
		}
		
	}
	else {
		
		document.getElementById(contentID).style.height = "0px";
		document.getElementById(contentID).style.borderLeft = "none";
		document.getElementById(contentID).style.borderRight = "none";
		document.getElementById(contentID).style.borderBottom = "none";
		
		liveContent[position] = null;
		
	}

}