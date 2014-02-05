
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