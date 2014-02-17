$(document).ready(function() {
	
	getCurrentRequests();
	
});



function getCurrentRequests() {
	
	$.ajax({
			url: "requestsData.php?" +currentSessionID,
			type: "POST",
			//async: false,
			success: function(results) {
				//alert(results);
				alert(JSON.stringify(results));
			}
	});
	
}

function loadListView() {
	
}

function loadTimetableView() {
	
}