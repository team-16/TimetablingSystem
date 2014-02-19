$(document).ready(function() {
	
	var requestsArray = [];
	getHistoryRequests();
	loadListView();
	
});



function getHistoryRequests() {
	
	$.ajax({
		url: "historyData.php?" + currentSessionID,
		type: "POST",
		async: false,
		success: function(results) {
			if(results != null) requestsArray = formatJSONRequests(results, false);
		}
	});
	
}

function loadListView() {
	
	$('#historyViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, false, false, true, false, false));
	
}