$(document).ready(function() {
	
	loadListView();
	
});

var requestsArray = []

function getHistoryRequests() {
	
	$.ajax({
			url: "historyData.php?" +currentSessionID,
			type: "POST",
			async: false,
			success: function(results) {
				if(results != null) requestsArray = formatJSONRequests(results, false);
			}
	});
	
}

function loadListView() {
	getHistoryRequests();
	$('#requestsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, false, false, false, false, false));
}