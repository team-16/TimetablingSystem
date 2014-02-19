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
			url: "resultsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: {currentFlag:(!adHocMode)},
			success: function(results) {
				requestsArray = formatJSONRequests(results, false);
			}
	});
	
}

function loadListView() {
	
	listViewDisplayed = true;
	$('#resultsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, false, true, true, true));
	
}

function loadTimetableView() {
	
	listViewDisplayed = false;
	$('#resultsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, false, true, true, true));
	
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
		
		$("#HeaderPeriods").css({"display":"inline"});
		$("#HeaderTime").css({"display":"none"});
		
	} else {
		
		$("#HeaderPeriods").css({"display":"none"});
		$("#HeaderTime").css({"display":"inline"});
		
	}
	
}

function duplicateRequest(indexVal){
		
	setupDuplicateRequest(requestsArray[Number(indexVal)]);
	
}

function editRequest(indexVal){
		
	setupEditRequest(requestsArray[Number(indexVal)]);
	
}