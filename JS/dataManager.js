function getModules() {
	
	alert("something");
	
	var results = json.parse("<php echo getModules(NULL); ?>");
	
	alert(JSON.stringify(results));
	
	
	/*
	$.get("init.php", {}, function(resultsX){
			
		alert("something2");
		//Makes results global so that other functions can access them
		//rankedArray = results;
		
		alert(JSON.stringify(resultsX));
			
	}, 'json');
	*/
	
}