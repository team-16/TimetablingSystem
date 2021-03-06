var liveGraphicalRadio = [];

function graphicalRadioToggle(btn, position){

	if(liveGraphicalRadio[position] == btn){
		
		btn.parentNode.parentNode.style.borderBottom = "1px solid black";
		
		btn.checked = false;
		liveGraphicalRadio[position] = null;
		
	}
	else {
		
		btn.parentNode.parentNode.style.borderBottom = "none";
		
		if (liveGraphicalRadio[position] != null) liveGraphicalRadio[position].parentNode.parentNode.style.borderBottom = "1px solid black";
		
		liveGraphicalRadio[position] = btn;
		
	}
	
}

var liveGraphicalContent = [];

function showGraphicalContent(btn, contentID, position) {
	
	if(btn.checked) {
		
		if(liveGraphicalContent[position] != contentID){
			
			if(liveGraphicalContent[position] != null) {
				
				document.getElementById(liveGraphicalContent[position]).style.maxHeight = "0px";
				document.getElementById(liveGraphicalContent[position]).style.borderLeft = "none";
				document.getElementById(liveGraphicalContent[position]).style.borderRight = "none";
				document.getElementById(liveGraphicalContent[position]).style.borderBottom = "none";
			
			}
			
			document.getElementById(contentID).style.maxHeight = "300px";
			document.getElementById(contentID).style.borderLeft = "1px solid black";
			document.getElementById(contentID).style.borderRight = "1px solid black";
			document.getElementById(contentID).style.borderBottom = "1px solid black";
						
			liveGraphicalContent[position] = contentID;
			
		}
		
	}
	else {
		
		document.getElementById(contentID).style.maxHeight = "0px";
		document.getElementById(contentID).style.borderLeft = "none";
		document.getElementById(contentID).style.borderRight = "none";
		document.getElementById(contentID).style.borderBottom = "none";
		
		liveGraphicalContent[position] = null;
		
	}

}

function graphicalViewGenerator(requestsArray, weekShow, sessTypeShow, facShow, statusShow, allocatedShow, dupBtnShow, editBtnShow, delBtnShow) {
	
	var graphicalHTML = "";
	var contentIDCounter = 0;
	
	for (var dayCounter = 0; dayCounter < daysArray.length; dayCounter++) {
				
		var dayRequests = getDayRequests(dayCounter, requestsArray);
		
		
		graphicalHTML += "<div class='sectionContainer'>";
		
		graphicalHTML += "<div class='dayTitle'><span style='line-height: 50px;'>";
		graphicalHTML += daysArray[dayCounter];
		graphicalHTML += "</span></div>";
		
		var rowFlag = false;
		
		do {
			
			rowFlag = false;
			
			graphicalHTML += "<div class='sectionAccordion'><table class='dayTable'><tr>";
			
			//Hidden td
			for (var periodCounter = 0; periodCounter < startPeriodsArray.length; periodCounter++) graphicalHTML += "<td id='hiddenTD'></td>";
			
			graphicalHTML += "</tr><tr>";
			
			var contentRequestsArray = [];
			
			for (var periodCounter = 0; periodCounter < startPeriodsArray.length; periodCounter++) {
									
				if(dayRequests[periodCounter].length == 0) graphicalHTML += "<td></td>";
				else {
					
					var currentRequest = dayRequests[periodCounter][0];
					
					var requestLength = endPeriodsArray[currentRequest.endPeriod] - startPeriodsArray[currentRequest.startPeriod];
					
					graphicalHTML += "<td colspan='" + requestLength + "'>";
					
					if(currentRequest.status == 1) graphicalHTML += "<label class='radioLabel requestSectionAllocated'>";
					else if(currentRequest.status == 0) graphicalHTML += "<label class='radioLabel requestSectionPending'>";
					else if(currentRequest.status == 2) graphicalHTML += "<label class='radioLabel requestSectionRejected'>";
					else  graphicalHTML += "<label class='radioLabel requestSectionDefault'>";
					
					graphicalHTML += "<input type='radio' name='";
					graphicalHTML += daysArray[dayCounter].toLowerCase() + "Radio";
					graphicalHTML += "' onclick='graphicalRadioToggle(this, " + dayCounter + ");showGraphicalContent(this, \"";
					graphicalHTML +=  daysArray[dayCounter].toLowerCase() + "Content" + (contentIDCounter++); 
					graphicalHTML +=  "\", " + dayCounter + ");'></input>";
					graphicalHTML += currentRequest.moduleCode + "</label></td>";
					
					contentRequestsArray.push(currentRequest);
					
					dayRequests[periodCounter] = (dayRequests[periodCounter]).splice(1);
					
					periodCounter += requestLength - 1;
					
				}
				
			}
			
			graphicalHTML += "</tr></table>";
			
			
			for (var contentCounter = 0; contentCounter < contentRequestsArray.length; contentCounter++) {
				
				var currentContentRequest = contentRequestsArray[contentCounter];
				
				var contentIDNumber = contentIDCounter - contentRequestsArray.length + contentCounter;
				
				if(currentRequest.status == 1) graphicalHTML += "<div class='contentSection requestContentSectionAllocated'";
				else if(currentRequest.status == 0) graphicalHTML += "<div class='contentSection requestContentSectionPending'";
				else if(currentRequest.status == 2) graphicalHTML += "<div class='contentSection requestContentSectionRejected'";
				else graphicalHTML += "<div class='contentSection requestContentSectionDefault'";
			
				graphicalHTML += " id='" + daysArray[dayCounter].toLowerCase() + "Content" + contentIDNumber + "'>";
				
				graphicalHTML += "<div class='topContentSection'>";
				
				graphicalHTML += "<table class='sectionContentTopTable'><tr>\
								<td class='titleCellTop'>Title</td>\
								<td>" + currentContentRequest.moduleTitle + "</td>";
							
				if (allocatedShow) graphicalHTML += "</tr><tr>\
								<td  class='titleCellTop'>Allocated Room(s)</td>\
								<td>" + htmlStringFormater(currentContentRequest.allocatedRooms, false) + "</td>";
				
				graphicalHTML += "</tr><tr>\
								<td  class='titleCellTop'>Room Preference(s)</td>\
								<td>" + htmlStringFormater(currentContentRequest.rooms, false) + "</td>";
				
				graphicalHTML += "</tr><tr>\
								<td  class='titleCellTop'>Weeks</td>\
								<td>" + weekReadableString(currentContentRequest.weeks) + "</td>";
				
				graphicalHTML += "</tr></table>";
				
				var indexValue = null;
				
				for(var indexCounter = 0; indexCounter < requestsArray.length; indexCounter++) {
					if(requestsArray[indexCounter] == currentRequest) indexValue = indexCounter;
				}
				
				
				if (dupBtnShow || editBtnShow || delBtnShow) {
					
					graphicalHTML += "<table class='graphicalBtnsTable'>";
					
					graphicalHTML += "<tr>";
					
					if (editBtnShow) graphicalHTML += "<td><button type='button' onclick='editRequest(" + indexValue  + "); return false;'>Edit</button></td>";
					
					if (delBtnShow)	 graphicalHTML += "<td><button type='button' onclick='deleteRequest(" + currentRequest.id  + "); return false;'>Delete</button></td>";
					
					graphicalHTML += "</tr>";
					
					if (dupBtnShow) graphicalHTML += "<tr><td colspan='2'>\
													<button type='button' onclick='duplicateRequest(" + indexValue  + ");  return false;'>Duplicate</button>\
													</td></tr>";
					
					graphicalHTML += "</table>";
				}
				
				graphicalHTML += "</div>";
				
				graphicalHTML += "<table class='sectionContentTable'><tr>"
								
				if (statusShow) graphicalHTML += "<td id='statusSection'>Status</td>";
				
				graphicalHTML += "<td id='pSection'>Priority</td>\
								<td id='stuSection'># of Students</td>\
								<td id='roomNumberSection'># of Rooms</td>\
								<td id='tradSection'>Traditional</td>\
								<td id='sessSection'>Session Type</td>\
								<td id='parkSection'>Park</td>";
					
				graphicalHTML += "</tr><tr>";
						
				if (statusShow) graphicalHTML += "<td>" + statusArray[currentContentRequest.status] + "</td>"
						
				graphicalHTML += "<td>";
				
				if(currentContentRequest.priority) graphicalHTML += "Yes";
				else graphicalHTML += "No";
				
				graphicalHTML += "</td>\
								<td>" + currentContentRequest.students + "</td>\
								<td>" + currentContentRequest.noOfRooms + "</td>\
								<td>";
				
				if(currentContentRequest.traditional) graphicalHTML+= "T</td>"; 
				else graphicalHTML+= "S</td>";
				
				graphicalHTML += "</td>\
								<td>" + sessionTypesArray[currentContentRequest.sessionType] + "</td>\
								<td>" + parksArray[currentContentRequest.park] + "</td>";
				
				graphicalHTML += "</tr></table>";
				
				graphicalHTML += "<table class='sectionContentTable' style='margin-bottom:5px;'>\
								<tr><td id='faciSection'>Facilites</td>\
								<td>Other Requirements</td>";
				
				var facilityTitles = getFacilityTitles(currentContentRequest.facilities);
				
				graphicalHTML += "</tr><tr>\
								<td>" + htmlStringFormater(facilityTitles, true) + "</td>\
								<td>" + currentContentRequest.otherReqs + "</td>";
				
				graphicalHTML += "</tr></table>";
				
				graphicalHTML += "</div>";
				
			}
			
			graphicalHTML += "</div>";
			
			for (var counter = 0; counter < dayRequests.length; counter++) if (dayRequests[counter].length != 0) rowFlag = true;
			
		} while (rowFlag);
		
		graphicalHTML += "</div>";
		
	}
	
	return graphicalHTML;
	
}

function getDayRequests (currentDay, reqArray) {
	
	var dayRequestsArray = [];
	
	//Setting up Blank 2D Array
	for (var counter = 0; counter < startPeriodsArray.length; counter++) dayRequestsArray[counter] = [];
	
	
	for (var counter = 0; counter < reqArray.length; counter++) {
		
		var currentRequest = reqArray[counter];
		
		if (currentDay == currentRequest.day) dayRequestsArray[currentRequest.startPeriod].push(currentRequest);
		
	}
	
	return dayRequestsArray;
	
}

