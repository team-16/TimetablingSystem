
function weeksDecoder(weeksString){
	
	if (weeksString == undefined) return undefined;
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
	
	
}