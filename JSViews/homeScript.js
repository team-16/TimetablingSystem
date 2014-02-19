$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	
});

function getCurrentRequests() {
	
	$.ajax({
			url: "resultsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: {currentFlag:true},
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



function myRequestsValues (requests) {
	
	var acceptedValue= 0;
	var rejectedValue= 0;
	var pendingValue = 0;
	
	for (var i = 0; i < requests.length; i++) {
		if(requests[i].status == 0){
			acceptedValue++;
		} else if (requests[i].status == 1){
			rejectedValue++;
		} else pendingValue++;
	}
	
	$("#accepted").html(acceptedValue);
	$("#rejected").hmtl(rejectedValue);
	$("#pending").html(pendingValue);
	
}