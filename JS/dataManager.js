function getModules() {
	
	alert("something");
	
	$.get("init.php echo getModules('CO')", {}, function(results){
			
		alert("something2");
		//Makes results global so that other functions can access them
		//rankedArray = results;
		
		alert(JSON.stringify(results));
			
	}, 'json');
	
	
}