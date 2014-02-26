$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	displayTime(true);
	
});

var listViewDisplayed = true;
var adHocMode = false;

function getCurrentRequests() {
	 
	$.ajax({
			url: "myBookingsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: {currentFlag:(!adHocMode)},
			success: function(results) {
				if(results != null) requestsArray = formatJSONRequests(results, true);
			}
	});
		
}

function loadListView() {
	
	$("#lHeadings").css({"display":"inline"});
	$("#gHeadings").css({"display":"none"});
	
	listViewDisplayed = true;
	$('#myBookingsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, true, true, false, true));
	
}

function loadTimetableView() {
	
	$("#lHeadings").css({"display":"none"});
	$("#gHeadings").css({"display":"inline"});
	
	listViewDisplayed = false;
	$('#myBookingsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, true, true, false, true));
	
}

function adHocState(btn){
		
	if(btn.id == "adHocRad") adHocMode = true;
	else adHocMode = false;
	
	getCurrentRequests();
	
	if(listViewDisplayed) loadListView();
	else loadTimetableView();
		
}

function displayTime(period) {
	
	if(period) {
		
		$("#periodHeadings").css({"display":"inline"});
		$("#timeHeadings").css({"display":"none"});
		
	} else {
		
		$("#periodHeadings").css({"display":"none"});
		$("#timeHeadings").css({"display":"inline"});
		
	}
	
}

function duplicateRequest(indexVal){
		
	setupDuplicateRequest(requestsArray[Number(indexVal)]);
	
}

function editRequest(indexVal){
		
	setupEditRequest(requestsArray[Number(indexVal)]);
	
}