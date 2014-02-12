function getModules() {
	
	$.getJSON("init.php echo getModules('CO')", {"rT":"full", "sqlStatement":sql}, function(results){
			
			//Makes results global so that other functions can access them
			//rankedArray = results;
			
			alert(JSON.stringify(results));
			
		}, 'json');
	
	
}