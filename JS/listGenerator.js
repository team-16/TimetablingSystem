function listViewGenerator(requestArray, depShow, weekShow, sessTypeShow, facShow, statusShow, allocatedShow, dupBtnShow, editBtnShow, delBtnShow){
		
	var requestResults = requestArray;
	
	var listHTML = "<div class='accordion'>";
		
	for(var counter = 0; counter < requestResults.length; counter++){
		
		var currentRequest = requestResults[counter];
		
		listHTML += "<label class='accordionSection requestCard'>";
		
		listHTML += "<input type='checkbox'>";
		
		
		listHTML += "<div class='requestHeaderDiv'>";
		
		listHTML += "<table class='requestHeaderTable'>";
					
		listHTML += "<tr>";
		
		if(depShow) listHTML += "<td id='depField'>" + currentRequest.department + "</td>";
		
		listHTML += "<td id='codeField'>" + currentRequest.moduleCode + "</td>"
		
		listHTML += "<td id='pField'>"; 
		
		if(currentRequest.priority) listHTML += "Yes";
		else listHTML += "No";
		
		listHTML += "</td>";
		
		listHTML += "<td id='dayField'>" + daysArray[currentRequest.day] + "</td>\
					<td id='periodField'>" + startPeriodsArray[currentRequest.startPeriod] + "</td>\
					<td id='lengthField'>" + ( endPeriodsArray[currentRequest.endPeriod] - startPeriodsArray[currentRequest.startPeriod] )+ "</td>\
					<td id='weeksField'>" + weekReadableString(currentRequest.weeks) + "</td>\
					<td id='stuField'>" + currentRequest.students + "</td>\
					<td id='tradField'>";
					
		if(currentRequest.traditional) listHTML+= "T</td>"; 
		else listHTML+= "S</td>";
						
		listHTML += "</tr><tr>";
		
		listHTML += "<td colspan='3'><u>";
			if(allocatedShow) listHTML += "Allocated Room(s)";
			else listHTML += "Room Preference(s)";
		listHTML += "</u></td>";
					
		listHTML += "<td colspan='";
			if(depShow) listHTML += "6";
			else listHTML += "5";
		listHTML += "'>";
		
		if(allocatedShow) listHTML += htmlStringFormater(currentRequest.allocatedRooms, false);
		else listHTML += htmlStringFormater(currentRequest.rooms, false);
		
		listHTML += "</td></tr>";
						
		listHTML += "</table>";
		
		listHTML += "<table class='listBtnsTable'><tr>";
		
		if (editBtnShow) listHTML += "<td><button type='button' onclick='return false;'>Edit</button></td>";
						
		listHTML += "<td><button type='button' onclick='return false;'>Delete</button></td></tr>";
						
		listHTML += "<tr><td colspan='2'><button type='button' onclick='return false;'>Duplicate</button></td></tr></table>";
		
		
		listHTML += "</div>";
		
		
		listHTML += "<div class='accordionContent requestCardContent'>";
		
				
		listHTML += "<table class='requestContentsTable'><tr>\
					<td id='titleField'>Title</td>\
					<td id='sessField'>Session Type</td>\
					<td id='parkField'>Park</td>\
					<td id='roomNumberField'># of Rooms</td>";
					
		if(statusShow) listHTML += "<td id='statusField'>Status</td>";
		
		listHTML += "</tr><tr>";
		
		listHTML += "<td id='titleContentField'>" + currentRequest.moduleTitle + "</td>\
					<td>" + sessionTypesArray[currentRequest.sessionType] + "</td>\
					<td>" + parksArray[currentRequest.park] + "</td>\
					<td>" + currentRequest.noOfRooms + "</td>";
		
		if(statusShow) listHTML += "<td>" + statusArray[currentRequest.status] + "</td>";
		
		listHTML += "</tr></table></br>";
		
		listHTML += "<table class='requestContentsTable' style='margin-bottom:5px;'><tr>";
		
		if(allocatedShow) listHTML += "<td id='roomPrefField'>Room Preference(s)</td>";
		
		listHTML += "<td id='faciField'>Facilites</td>\
					<td id='otherReqsField'>Other Requirements</td>\
					</tr><tr>";
		
		if(allocatedShow) listHTML += "<td>" + htmlStringFormater(currentRequest.rooms, true) + "</td>";
		
		var facilityTitles = getFacilityTitles(currentRequest.facilities);
						
		listHTML += "<td>" + htmlStringFormater(facilityTitles, true) + "</td>\
					<td>" + currentRequest.otherReqs + "</td>";
		
		listHTML += "</tr></table>";
		
		listHTML += "</div>";
		
		listHTML += "</label>";
		
	}

	listHTML += "</div>";
	
	return listHTML;
}
	
