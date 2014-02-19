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
			url: "requestsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			success: function(results) {
				requestsArray = formatJSONRequests(results, false);
			}
	});
	
}

function loadListView() {
	
	$("#lHeadings").css({"display":"inline"});
	$("#gHeadings").css({"display":"none"});
	
	listViewDisplayed = true;
	$('#requestsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, false, false, true, true, true));
	
}

function loadTimetableView() {
	
	$("#lHeadings").css({"display":"none"});
	$("#gHeadings").css({"display":"inline"});
	
	listViewDisplayed = false;
	$('#requestsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, false, false, true, true, true));
	
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