$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	
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
	
	listViewDisplayed = true;
	$('#myBookingsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, true, true, false, true));
	
}

function loadTimetableView() {
	
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

function duplicateRequest(indexVal){
		
	setupDuplicateRequest(requestsArray[Number(indexVal)]);
	
}

function editRequest(indexVal){
		
	setupEditRequest(requestsArray[Number(indexVal)]);
	
}