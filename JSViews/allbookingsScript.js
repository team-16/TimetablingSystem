$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	
});


var listViewDisplayed = true;
var adHocMode = false;

function getCurrentRequests() {
	
	$.ajax({
			url: "allBookingsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: {currentFlag:(!adHocMode)},
			success: function(results) {
				requestsArray = formatJSONRequests(results, true);
			}
	});
	
}

function loadListView() {
	
	listViewDisplayed = true;
	$('#allBookingsViewContainer').html(listViewGenerator(requestsArray, true, true, true, true, true, true, false, false, false));
	
}

function loadTimetableView() {
	
	listViewDisplayed = false;
	$('#allBookingsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, true, false, false, false));
	
}

function adHocState(btn){
		
	if(btn.id == "adHocRad") adHocMode = true;
	else adHocMode = false;
	
	getCurrentRequests();
	
	if(listViewDisplayed) loadListView();
	else loadTimetableView();
		
}