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
			data: {current:true},
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

