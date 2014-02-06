function htmlStringFormater(stringArray, allocatedShow, newLine){
	
	var roomsString = "";
	
	if(allocatedShow){
		
		for (var roomCounter = 0;  roomCounter < stringArray.length; roomCounter++){
		
			roomsString += stringArray[roomCounter];
			
			if (roomCounter != (stringArray.length - 1)){
			
				if(newLine) roomsString += "</br>";
				else roomsString += "\xa0 \xa0 \xa0 , \xa0 \xa0 \xa0";
				
			}
			
		}

	}
	else{
			
		for (var roomCounter = 0;  roomCounter < stringArray.length; roomCounter++){
		
			roomsString += stringArray[roomCounter];
		
			if (roomCounter != (stringArray.length - 1)){
			
				if(newLine) roomsString += "</br>";
				else roomsString += "\xa0 \xa0 \xa0 , \xa0 \xa0 \xa0";
				
			}
			
		}
	
	}
	
	
	return roomsString;
}