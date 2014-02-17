$(document).ready(function() {
	
	loadListView();
	
});

var requestsArray = []

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
	getCurrentRequests();
	$('#resultsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, false, false, true, true, true));
}

function loadTimetableView() {
	getCurrentRequests();
	$('#resultsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, false, true, true, true));
}