function getModules() {
	
	$.get("view.php", {"rT":"full", "sqlStatement":sql}, function(results){
			
			//Makes results global so that other functions can access them
			rankedArray = results;
			
			//Calls populate table to use data to create results table
			populateTable();
			
		}, 'json');
	
	
}