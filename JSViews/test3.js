$(document).ready(function() {
	
	loadListView();
	
});

var requestsArray = []
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
	$('#viewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, false, true, true, true));
	
}

function loadTimetableView() {
	
	listViewDisplayed = false;
	getCurrentRequests();
	$('#viewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, true, true, true, true));
	
}

function adHocState(btn){
		
	if(btn.id == "adHocRad") adHocMode = true;
	else adHocMode = false;
	
	if(listViewDisplayed) loadListView();
	else loadTimetableView();
		
}