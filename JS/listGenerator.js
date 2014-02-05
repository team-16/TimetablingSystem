function listViewGenerator(depShow, weekShow, sessTypeShow, facShow, statusShow, 
						allocatedShow, dupBtnShow, editBtnShow, delBtnShow){
	
	var requestResults = requestArray;
	
	var listHTML = "<div class='accordian'>";
	
	
	
	for(var counter = 0; counter < requestResults.length; counter++){
		
		listHTML += "<label class='accordianSection'>";
		
		listHTML += "<input type='checkbox'>";
		
		listHTML += "Question";
		
		listHTML += "<div class='accordianContent'>";
		
		listHTML += "content";
		
		listHTML += "</div>";
		
		listHTML += "</label>";
		
		
	}
	
	listHTML += "</div>";
	
	
}
	
