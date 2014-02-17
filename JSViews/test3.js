$(document).ready(function() {
	
	loadListView();
	
});

var requestsArray = []

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
	getCurrentRequests();
	$('#viewContainer').html(listViewGenerator(requestsArray, false, true, true, true, true, false, true, true, true));
}

function loadTimetableView() {
	getCurrentRequests();
	$('#viewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, true, true, true, true, true));
}