$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	
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
	getCurrentRequests();
	$('#resultsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, false, true, true, true));
	
}

function loadTimetableView() {
	
	listViewDisplayed = false;
	getCurrentRequests();
	$('#resultsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, false, true, true, true));
	
}

function adHocState(btn){
		
	if(btn.id == "adHocRad") adHocMode = true;
	else adHocMode = false;
	
	getCurrentRequests();
	
	if(listViewDisplayed) loadListView();
	else loadTimetableView();
		
}

function duplicateRequest(indexVal){
		
	setupDuplicateRequest(requestsArray[Number(indexVal)]);
	
}

function editRequest(indexVal){
		
	setupEditRequest(requestsArray[Number(indexVal)]);
	
}