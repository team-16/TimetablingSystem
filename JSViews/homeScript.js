$(document).ready(function() {
	
	var requestsArray = [];
	getCurrentRequests();
	loadListView();
	
	
});

var listViewDisplayed = true;
var adHocMode = false;

function getCurrentRequests() {
	
	$.ajax({
			url: "resultsData.php?" +currentSessionID,
			type: "POST",
			async: false,
			data: {currentFlag:(!adHocMode)},
			success: function(results) {
				requestsArray = formatJSONRequests(results, false);
			}
	});
	
}

function loadListView() {
	
	listViewDisplayed = true;
	
	var limitedArray = requestsArray.slice(0, 4);
	
	$('#homeViewContainer').html(listViewGenerator(limitedArray, false, true, true, true, true, false, true, true, true));
	
}

function loadTimetableView() {
	
	listViewDisplayed = false;
	
	var limitedArray = requestsArray.slice(0, 4);
	
	$('#homeViewContainer').html(graphicalViewGenerator(limitedArray, true, true, true, true, false, true, true, true));
	
}

function adHocState(btn){
		
	if(btn.id == "adHocRad") adHocMode = true;
	else adHocMode = false;
	
	getCurrentRequests();
	
	if(listViewDisplayed) loadListView();
	else loadTimetableView();
		
}

function displayTime(period) {
	
	if(period) {
		
		$("#periodHeadings").css({"display":"inline"});
		$("#timeHeadings").css({"display":"none"});
		
	} else {
		
		$("#periodHeadings").css({"display":"none"});
		$("#timeHeadings").css({"display":"inline"});
		
	}
	
}

/*
function myRequestsValues () {
		
	var acceptedValue= 0;
	var rejectedValue= 0;
	var pendingValue = 0;
	
	for (var i = 0; i < requestsArray.length; i++) {
	
		if(requestsArray[i].status == 0){
			
			acceptedValue++;
			
		} else if (requestsArray[i].status == 1){
			
			rejectedValue++;
			
		} else {
			
			pendingValue++;
			
		}
		
	}
	
	$("#accepted").html(acceptedValue);
	$("#rejected").hmtl(rejectedValue);
	$("#pending").html(pendingValue);
	
}
*/