
function weeksDecoder(weeksString){
	
	if (weeksString == undefined) return undefined;
	if (typeof weeksString != "string") return undefined;
	//if (weeksString.length != 15) return undefined;
	
	var weeksArray = [];
	
	for(var counter = 0; counter < weeksString.length; counter++){
		
		if(weeksString[counter] == "0") weeksArray[counter] = false;
		else if(weeksString[counter] == "1") weeksArray[counter] = true;
		else return undefined;
		
	}
	
	return weeksArray;
	
}

function weeksEncoder(weeksArray){
	
	var weeksString = "";
	
	for(var counter = 0; counter < weeksArray.length; counter++){
		
		if(weeksArray[counter] == true) weeksString = weeksString.concat("1");
		else if(weeksArray[counter] == false) weeksString = weeksString.concat("0");
		else return undefined;
		
	}
	
	return weeksString;
	
}

function weekReadableString(weeksArray) {
	
	var weeksList = [];
	
	
	for (var counter = 0; counter < weeksArray.length; counter++){
		
		if(weeksArray[counter] == true)weeksList.push(counter + 1);
			
	}
	
	
	var setsOfWeeksArray = [];
	var weeksSetArray = [];
	
	for (var counter = 0; counter < weeksList.length; counter++){ 
		
		if ( (weeksList[counter] + 1) != (weeksList[counter+1]) ) {
			
			weeksSetArray.push(weeksList[counter]);
			setsOfWeeksArray.push(weeksSetArray);
			weeksSetArray = [];
			
		}
		else weeksSetArray.push(weeksList[counter]);
		
	}
	
	
	var readableString = "";
	
	for (var counter = 0; counter < setsOfWeeksArray.length; counter++){
		
		var maxElement = setsOfWeeksArray[counter].length - 1;
				
		if( setsOfWeeksArray[counter][0] == setsOfWeeksArray[counter][maxElement] ){
			readableString += setsOfWeeksArray[counter][0];
		}
		else {
			readableString += setsOfWeeksArray[counter][0] + "-";
			readableString += setsOfWeeksArray[counter][maxElement];
		}
		
		if(counter != (setsOfWeeksArray.length - 1)) readableString += ", ";
		
	}
	
	return readableString;
}
