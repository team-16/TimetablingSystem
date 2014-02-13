function htmlStringFormater(stringArray, newLine){
	
	var roomsString = "";
	
	for (var roomCounter = 0;  roomCounter < stringArray.length; roomCounter++){
	
		roomsString += stringArray[roomCounter];
		
		if (roomCounter != (stringArray.length - 1)){
		
			if(newLine) roomsString += "</br>";
			else roomsString += "\xa0 \xa0 \xa0 , \xa0 \xa0 \xa0";
			
		}
		
	}
	
	return roomsString;
	
}

function datetimeStringConverter(dateString) {
	
	var date = new Date();
	
	
	
	return date;
	
}