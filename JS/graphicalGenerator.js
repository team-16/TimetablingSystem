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
				
				document.getElementById(liveContent[position]).style.maxHeight = "0px";
				document.getElementById(liveContent[position]).style.borderLeft = "none";
				document.getElementById(liveContent[position]).style.borderRight = "none";
				document.getElementById(liveContent[position]).style.borderBottom = "none";
			
			}
			
			document.getElementById(contentID).style.maxHeight = "300px";
			document.getElementById(contentID).style.borderLeft = "1px solid black";
			document.getElementById(contentID).style.borderRight = "1px solid black";
			document.getElementById(contentID).style.borderBottom = "1px solid black";
						
			liveContent[position] = contentID;
			
		}
		
	}
	else {
		
		document.getElementById(contentID).style.maxHeight = "0px";
		document.getElementById(contentID).style.borderLeft = "none";
		document.getElementById(contentID).style.borderRight = "none";
		document.getElementById(contentID).style.borderBottom = "none";
		
		liveContent[position] = null;
		
	}

}

function graphicalViewGenerator(requestsArray, weekShow, sessTypeShow, facShow, statusShow, allocatedShow, dupBtnShow, editBtnShow, delBtnShow) {
	
	var graphicalHTML = "";
	
	alert("Test");
	
	for (var dayCounter = 0; dayCounter < daysArray.length; dayCounter++) {
		
		alert("Test1");
		
		var dayRequests = getDayRequests(dayCounter, requestsArray);
		
		var rowsRequired = 1;
		
		for (var arraySet in dayRequests) if (arraySet.length > rowsRequired) rowsRequired = arraySet.length;
		
		alert(rowsRequired);
		
		graphicalHTML += "<div class='sectionContainer'>";
		
		graphicalHTML += "<div class='dayTitle'><span style='line-height: 50px;'>";
		graphicalHTML += daysArray[dayCounter];
		graphicalHTML += "</span></div>";
		
		
		for (var rowCounter = 0; rowCounter < rowsRequired; rowCounter++) {
			
			alert("Test2");
			
			graphicalHTML += "<div class='sectionAccordion'><table class='dayTable'><tr>";
			
			//Hidden td
			for (var periodCounter = 0; periodCounter < startPeriodsArray.length; periodCounter++) graphicalHTML += "<td id='hiddenTD'></td>";
			
			graphicalHTML += "</tr><tr>";
			
			alert("Test2.1");
			
			for (var periodCounter = 0; periodCounter < startPeriodsArray.length; periodCounter++) {
								
				if(dayRequests[periodCounter].length == 0) graphicalHTML += "<td></td>";
				else {
					
					var currentRequest = dayRequests[periodCounter][0];
					
					var requestLength = endPeriodsArray[currentRequest.endPeriod] - startPeriodsArray[currentRequest.startPeriod];
					
					graphicalHTML += "<td colspan='" + requestLength + "'><label class='radioLabel'>\
									<input type='radio' name='";
					graphicalHTML += daysArray[dayCounter].toLowerCase() + "Radio";
					graphicalHTML += "' onclick='radioToggle(this, " + dayCounter + ");showContent(this, \"";
					graphicalHTML +=  daysArray[dayCounter].toLowerCase() + "Content" + "2"; 
					graphicalHTML +=  "\", " + dayCounter + ");'></input>";
					graphicalHTML += currentRequest.moduleCode + "</label></td>";
					
					dayRequests[periodCounter] = dayRequests[periodCounter].splice(0, 1);
					
					periodCounter += requestLength - 1;
					
				}
				
				
			}
						
			
			graphicalHTML += "</tr></table>";
			
			graphicalHTML += "</div>";
			
		}
		
		/*
		
		
		
		
		
		
		
		
		for (var periodCounter = 0; periodCounter < startPeriodsArray; periodCounter++) {
		
		
			
			for (var requestCounter = 0; requestCounter < dayRequests.length; requestCounter++) {
			
				if (dayRequests[requestCounter].startPeriod == periodCounter){
				
				
				
				}
			
			
			}
		
		
			if (dayRequests){
		
			}
			
			graphicalHTML += "<td></td>";
			
			
		}
		
		graphicalHTML += "</tr></table>";
		//for (var requestCounter = 0; requestCounter < dayRequests.length; requestCounter++) {
	
		//}
		
		*/
		
		graphicalHTML += "</div>";
	}
	
	/*		
					<td>
						<label class='radioLabel'>
							<input type='radio' name='mondayRadio' onclick='radioToggle(this, 0);showContent(this, "mondayContent1", 0);'></input>
							COB123
						</label>
					</td>
				
					<td colspan='2'>
						<label  class='radioLabel'>
							<input type='radio' name='mondayRadio' onclick='radioToggle(this, 0);showContent(this, "mondayContent2", 0);'></input>
						</label>
					</td>
				
					<td>
					4
					</td>
				
					<td>
					5
					</td>
				
					<td>
					6
					</td>
				
					<td>
					7
					</td>
				
					<td>
					8
					</td>
				
					<td>
					9
					</td>
					
				</tr>
				
			</table>
			
			<div class='contentSection' id='mondayContent1'>
			
				<div class='topContentSection'>
				
					<table class='sectionContentTopTable'>
						
							<tr>
						
								<td class='titleCellTop'>
									Title
								</td>
						
								<td>
									Test Module Title
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Allocated Room(s)
								</td>
						
								<td>
									J.0.01
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Room Preference(s)
								</td>
						
								<td>
									J.0.01, J.0.02
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Weeks
								</td>
						
								<td>
									1-2, 4-5, 7-8, 10-11, 13-14, 16
								</td>
							
							</tr>
						
					</table>
				
					<table class='graphicalBtnsTable'>
					
						<tr>
					
							<td>
								<button type='button' onclick='return false;'>Edit</button>
							</td>
					
							<td>
								<button type='button' onclick='return false;'>Delete</button>
							</td>
					
						</tr>
					
						<tr>
							<td colspan='2'>
								<button type='button' onclick='return false;'>Duplicate</button>
							</td>
						</tr>
					
					</table>
					
				</div>
				
				<table class='sectionContentTable'>
					
					<tr>
						
						<td id='statusSection'>
							Status
						</td>
						
						<td id='pSection'>
							Priority
						</td>
					
						<td id='stuSection'>
							# of Students
						</td>
						
						<td id='roomNumberSection'>
							# of Rooms
						</td>
						
						<td id='tradSection'>
							Traditional
						</td>
						
						<td id='sessSection'>
							Session Type
						</td>
					
						<td id='parkSection'>
							Park
						</td>
					
					</tr>
					
					
					<tr>
						
						<td>
							Allocated
						</td>
						
						<td>
							Yes
						</td>
					
						<td>
							120
						</td>
						
						<td>
							1
						</td>
					
						<td>
							T
						</td>
						
						<td>
							Lecture
						</td>
					
						<td>
							Central
						</td>
						
					</tr>
						
				</table>
												
				<table class='sectionContentTable' style='margin-bottom:5px;'>
				
					<tr>
						
						<td id='faciSection'>
							Facilites
						</td>
						
						<td>
							Other Requirements
						</td>
						
					</tr>
					
					<tr>
						
						<td>
							list
						</td>
						
						<td>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Cras facilisis tellus vitae lacinia porta. 
							In in nunc turpis. Suspendisse luctus ipsum a nisi consequat porttitor.
						</td>
						
					</tr>
					
				</table>
				
				
			</div>
			
			<div class='contentSection' id='mondayContent2'>
				Test
			</div>
			
		</div>
		
	*/
	
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

