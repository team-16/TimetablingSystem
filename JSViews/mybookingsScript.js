$(document).ready(function() {
	
	loadListView();
	
});

var requestsArray = []
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
	
	listViewDisplayed = true;
	getCurrentRequests();
	$('#myBookingsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, true, true, true, true));
	
}

function loadTimetableView() {
	
	listViewDisplayed = false;
	getCurrentRequests();
	$('#myBookingsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, true, true, true, true));
	
}

function adHocState(btn){
		
	if(btn.id == "adHocRad") adHocMode = true;
	else adHocMode = false;
	
	if(listViewDisplayed) loadListView();
	else loadTimetableView();
		
}