$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	
});



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
	$('#requestsViewContainer').html(listViewGenerator(requestsArray, false, true, true, true, false, false, true, true, true));
}

function loadTimetableView() {
	getCurrentRequests();
	$('#requestsViewContainer').html(graphicalViewGenerator(requestsArray, true, true, true, false, false, true, true, true));
}

function duplicateRequest(indexVal){
	
	setupDuplicateRequest(requestsArray[Number(indexVal)]);
	
}

function editRequest(indexVal){
	
	setupEditRequest(requestsArray[Number(indexVal)]);
	
}