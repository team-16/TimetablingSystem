$(document).ready(function() {
	
	getCurrentRequests();
	
});



function getCurrentRequests() {
	
	$.ajax({
			url: "requestsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			success: function(results) {
				//alert(results);
				alert(JSON.stringify(results));
				var requestArray = formatJSONRequests(results, false);
				loadListView(requestArray);
			}
	});
	
}

function loadListView(requestArray) {
	$('#viewContainer').html(listViewGenerator(requestArray, false, true, true, true, false, false, true, true, true));
}

function loadTimetableView() {
	
}